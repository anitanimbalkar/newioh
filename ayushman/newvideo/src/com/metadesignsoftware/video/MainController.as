package com.metadesignsoftware.video
{
	import com.ghostwire.ui.controls.uiDialog;
	import com.ghostwire.ui.controls.uiScrollBar;
	import com.reintroducing.utils.QueryString;
	import flash.display3D.textures.Texture;
	import flash.events.ErrorEvent;
	import flash.events.KeyboardEvent;
	import flash.events.UncaughtErrorEvent;
	import flash.net.NetStream;
	import flash.net.SharedObject;
	import flash.utils.describeType;
	import flash.utils.Dictionary;
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	import flash.events.NetStatusEvent;
	import flash.net.NetConnection;
	import flash.media.Video;
	import com.ghostwire.ui.events.uiEvent;
	import flash.events.Event;
	import com.ghostwire.ui.data.uiRange;
	import flash.net.URLRequest;
	import flash.net.URLVariables;
	import flash.net.URLRequestMethod;
	import flash.net.URLLoader;
	import flash.net.URLLoaderDataFormat;
	import flash.utils.Timer;
	import flash.events.TimerEvent;
	import flash.system.Security;
	import flash.text.TextField;
	import flash.external.ExternalInterface;
	import flash.events.FocusEvent;
	/**
	 * ...
	 * @author pradeep
	 */
	public class MainController extends Sprite
	{
		// parameters from browser
		private var playStreamIds:Array 					=	new Array(int);
		private var roleId:int 								=	0;
		private var callId:int 								=	0;
		private var userName:String 						= 	"";
		
		private var mainView:MainView ;
		private var videoServerUrl:String 					=	"";
		// helper objects
		private var netConnection:NetConnection;
		private var publisher:Publisher;
		private var player:Player;
		private var notifierObject:SharedObject;
		private var messenger:Messenger;
		
		private var publishingStreamid:int;
		private var playingStreamids:Array 					=	new Array(int);
		private var numVideos:int 							=	5;
		private var videoHeight:int							=	170;
		private var videoWidth: int 						=	210;
		private var onlineParticipants:Dictionary			= 	new Dictionary();
		private var connectionStatus:Boolean				=	false;
		private var isAudioCall:Boolean				=	true;
		private var isMute:Boolean				=	true;
		private var checkconnectionTimer:Timer = new Timer(2000, 0);
		private var promptText:String = "Type here for chat....";
		public function MainController():void
		{
			
			try
			{
				Security.loadPolicyFile("http://www.ayushman.co:8080/crossdomain.xml");
				collectRequestParams();
				// add me to online participants
				onlineParticipants[roleId.toString()]= new Object(); // currently adding an object. Later, this can have many things.
				mainView	= new MainView(numVideos, videoWidth, videoHeight,roleId);
				addChild(mainView);
				mainView.createView(roleId-1);
				//mainView.showStatus("Welcome " + userName);
				mainView.audioOnlyIcon.addEventListener(MouseEvent.CLICK, calltypeHandler);
				mainView.volumeIcon.addEventListener(MouseEvent.CLICK, volumeHandler);
				mainView.volSlider.addEventListener(Event.CHANGE, volumesliderHandler);
				//mainView.qualitySlider.addEventListener(Event.CHANGE, qualitysliderHandler);
				//mainView.microSlider.addEventListener(Event.CHANGE, microsliderHandler);
				//mainView.sendbutton.addEventListener(MouseEvent.CLICK, this.sendMessage, false, 0, true);
				mainView.speedIcon.addEventListener(MouseEvent.CLICK, this.speedtestListner);
				mainView.inputMessage.addEventListener(KeyboardEvent.KEY_DOWN, keyListener);
				mainView.inputMessage.addEventListener(KeyboardEvent.KEY_UP, keyUpListener);
				mainView.inputMessage.text = promptText;
				mainView.inputMessage.addEventListener(FocusEvent.FOCUS_IN, inputFocuseHandel);
				mainView.inputMessage.addEventListener(FocusEvent.FOCUS_OUT, inputFocuseHandel);
				//check connection after 2 sec once it is closed, failed. stop timer if it is connected.
				checkconnectionTimer.addEventListener(TimerEvent.TIMER, timerListener);
				if (roleId != 1)
					mainView.audioOnlyIcon.visible = false ;
				speedtest();
			}catch (e:Error)
			{
				//ExternalInterface.call("console.log","error in getting parameters :" + e.message);
				//mainView.showStatus(e.message);
				throw e;
			}
			
			

			videoServerUrl = "rtmp://www.ayushman.co/openmeetings/Room" + callId;			
			//ExternalInterface.call("console.log",videoServerUrl);
			// connect to the video server. successful connection will trigger a success event, on which we publish ourself
			netConnection = new NetConnection();			
			connectToVideoServer();
		}
		private function inputFocuseHandel(e:FocusEvent):void 
		{
			ExternalInterface.call("console.log", 111);
			switch (e.type) {
				case FocusEvent.FOCUS_IN:
					 if (mainView.inputMessage.text == promptText) {
						mainView.inputMessage.text = "";
						mainView.inputMessage.textColor = 0x000000;
					 }
				break;
			 case FocusEvent.FOCUS_OUT:
				 if (mainView.inputMessage.text == "") {
					 mainView.inputMessage.text = promptText;
					 mainView.inputMessage.textColor = 0x999999;
				 }
			break;
			}
			
		}
		
		
		private function keyListener(event:KeyboardEvent):void 
		{
			if (event.keyCode == 13)
			{
				if(!(trim(mainView.inputMessage.text) == ""))
				{
					this.messenger.send(this.userName + ": " + mainView.inputMessage.text);
				}
				mainView.clearInputBox();
			}
		}
		private function keyUpListener(event:KeyboardEvent):void 
		{
			if (event.keyCode == 13)
			{
				mainView.clearInputBox();
			}
		}
		private function timerListener (e:TimerEvent):void {
			//ExternalInterface.call("console.log","connectionStatus"+connectionStatus);
			if (!connectionStatus)
			{
				connectToVideoServer();
			}
		}
		private function speedtestListner(e:MouseEvent):void 
		{
			speedtest();
		}
		
		private function speedtest ():void {
			var requestVars:URLVariables = new URLVariables();
			requestVars.object_name = "key1";
			requestVars.cache = new Date().getTime();
			var request:URLRequest = new URLRequest();
			request.url = "http://www.ayushman.co:8080/speed.php";
			request.method = URLRequestMethod.GET;
			request.data = requestVars;
			var loader:URLLoader = new URLLoader(request);
			loader.dataFormat = URLLoaderDataFormat.TEXT;
			loader.addEventListener(Event.COMPLETE, loaderCompleteHandler);
		}
		
		public function sendMessage(event:MouseEvent): void
		{
			if(!(trim(mainView.inputMessage.text) == ""))
				{
					this.messenger.send(this.userName + ": " + mainView.inputMessage.text);
				}
				mainView.clearInputBox();
		}
		public function messageReceived(message:String):void 
		{
			displaymessage(message);
		}
		private function trim( s:String ):String
		{
		  return s.replace( /^([\s|\t|\n]+)?(.*)([\s|\t|\n]+)?$/gm, "$2" );
		}
		public function displaymessage(message:String):void 
		{			
			mainView.displaymessage(message);
		}
		public function microsliderHandler(event:Event): void
		{
			this.publisher.setMicVolume((event.target).range.value);
		}
		public function qualitysliderHandler(event:Event): void
		{
			this.publisher.setQuality((event.target).range.value);
		}
		public function loaderCompleteHandler(e:Event):void
		{
			//ExternalInterface.call("console.log",'in loaderCompleteHandler event before');
			if (Number((e.target.data).split("-")[1]) < 64)
			{
				//mainView.showStatus("Download speed is less than recommended speed. Speed is :" + (e.target.data).split("-")[1]+". Please turn of video.");
				mainView.MessageBox("Download speed is less than recommended speed. Speed is :" + (e.target.data).split("-")[1]+". Please turn off video.");
				//ExternalInterface.call("console.log","Download speed is less than recommended speed. Speed is :" + (e.target.data).split("-")[1]);
				this.publisher.audioOnly(true);
				this.notifierObject.send("callHandler", true);
			}else {
				//mainView.showStatus("Download speed is more than recommended speed. Speed is :" + (e.target.data).split("-")[1]+". You may turn on Video.");
				mainView.MessageBox("Download speed is more than recommended speed. Speed is :" + (e.target.data).split("-")[1]+". You may turn on Video.");
				//ExternalInterface.call("console.log","Download speed is greater than recommended speed. Speed is :" + (e.target.data).split("-")[1]);
				this.publisher.audioOnly(false);
				this.notifierObject.send("callHandler", false);
			}
			//ExternalInterface.call("console.log",'in loaderCompleteHandler event before');
		}
		
		
		public function collectRequestParams() :void
		{
			var req:QueryString = QueryString.getInstance();

			//ExternalInterface.call("console.log","role id is " + req.getValue("roleId"));
			roleId 				= new Number(req.getValue("roleId"));

			//ExternalInterface.call("console.log","callId is " + req.getValue("callId"));
			callId				= new Number(req.getValue("callId"));

			//ExternalInterface.call("console.log","name is " + req.getValue("name"));
			userName =  req.getValue("name");
		}
		private function connectToVideoServer(): void
		{
			//ExternalInterface.call("console.log","url is ["+videoServerUrl+"]");
			netConnection.addEventListener(NetStatusEvent.NET_STATUS, this.onNetConnectionStatus);
			netConnection.connect(videoServerUrl);
			netConnection.client = this;
		}

		private function onNetConnectionStatus(event:NetStatusEvent):void {
			//ExternalInterface.call("console.log","in onNetConnectionStatus event is" +event.info.code);
            switch (event.info.code) {
                case "NetConnection.Connect.Success":
						publishPlayAndAssociate();
						connectionStatus = true;
						if(checkconnectionTimer.running)
							checkconnectionTimer.stop();
			        break;
                case "NetConnection.Connect.Closed":
					// TODO put reconnect logic
                    //ExternalInterface.call("console.log","closed: " + videoServerUrl);
					connectionStatus = false;
					if(!checkconnectionTimer.running)
						checkconnectionTimer.start();
                    break;
                case "NetConnection.Connect.Failed":
					// TODO put reconnect logic
                    //ExternalInterface.call("console.log","could not connect to: " + videoServerUrl);
					connectionStatus = false;
					if(!checkconnectionTimer.running)
						checkconnectionTimer.start();
                    break;
            }
        }
		
		public function calltypeHandler(event:MouseEvent): void
		{
			//ExternalInterface.call("console.log","calltype handlers");
			if (isAudioCall)
			{
				this.publisher.audioOnly(true);
				this.notifierObject.send("callHandler", true);
				isAudioCall = false;
				mainView.audioOnlyIcon.load(new URLRequest("assets/images/video_off.png"));
			}else
			{
				this.publisher.audioOnly(false);
				this.notifierObject.send("callHandler", false);
				isAudioCall = true;
				mainView.audioOnlyIcon.load(new URLRequest("assets/images/video_on.png"));
			}
		}
		public function volumeHandler(event:MouseEvent): void
		{
			ExternalInterface.call("console.log","calltype handlers");
			if (isMute)
			{
				this.publisher.setSpeakerVolume(0);
				isMute = false;
				mainView.volumeIcon.load(new URLRequest("assets/images/speaker_off.png"));
				
			}else
			{
				this.publisher.setSpeakerVolume(mainView.volSlider.range.value);
				isMute = true;
				mainView.volumeIcon.load(new URLRequest("assets/images/speaker_on.png"));
			}
		}
		public function volumesliderHandler(event:Event): void
		{
			this.publisher.setSpeakerVolume((event.target).range.value);
			if (isMute == false) {
				isMute = true;
				mainView.volumeIcon.load(new URLRequest("assets/images/speaker_on.png"));
			}
			if ((event.target).range.value == 0) {
				isMute = false;
				mainView.volumeIcon.load(new URLRequest("assets/images/speaker_off.png"));
			}
		}
		public function callHandler(value:Boolean): void
		{
			this.publisher.audioOnly(value);
		}

		private function publishPlayAndAssociate() :void 
		{	
			try
			{
				messenger = new Messenger(netConnection,this);
				publisher = new Publisher(roleId, videoWidth, videoHeight, this, netConnection);
				publisher.publish();

				// based on the knowledge that the all knowing controller has
				// decide which streams need to be played.
				var streamIds:Array = new Array;
				var j:int = 1;
				var ctr:int = 0;
				for (j = 1; j < 6; j++)
				{
					if (j != roleId)
					{	
						
						streamIds[ctr] = j;
						ctr++;
						
					}
				}
				player    = new Player(streamIds, netConnection, this);
				player.playStreams();

				// associate streams to corresponding videos
				var arrStreams:Dictionary = player.getStreams();
				var videos:Array = mainView.getVideos();
				var videoctr:int = 0;
				for (videoctr = 0; videoctr < numVideos; videoctr++)
				{
					if ((videoctr+1) == roleId)
					{
						continue;
					}
					var netStream:NetStream = arrStreams[videoctr+1];
					if (netStream == null)
					{
						throw new Error("Error while displaying played videos, videoctr is" + videoctr);
					}
					var video:Video = videos[videoctr];
					video.attachNetStream(netStream);
				}
				notifierObject = SharedObject.getRemote("room", this.netConnection.uri, false);
				notifierObject.client = this;
				notifierObject.addEventListener("roomHandler", roomHandler);
				notifierObject.addEventListener("calltypeHandler",calltypeHandler);
				this.notifierObject.connect(netConnection);
			} catch (e:Error)
			{
				//ExternalInterface.call("console.log","error in handling success " + e.message + " " +e.getStackTrace());
			}
		}
		// invoked whenever self or others publish or play
		public function onNetStreamStatus(event:NetStatusEvent) : void
		{
			if(event.info.code == "NetStream.Play.PublishNotify")
			{
				if (onlineParticipants[event.info.details.toString()] != null)
					return;
				onlineParticipants[event.info.details.toString()] = new Object();
				//ExternalInterface.call("console.log","got a notification... someone is knocking at the door....");
				// someone has started playing. The stream name is given in info.info.details
				mainView.showVideo(new Number(event.info.details).valueOf()-1);
				
				// TODO: send message "i am here" to whoever has joined, so that they can update their ui.
				notifierObject.send("roomHandler", roleId);
			}
			else if(event.info.code == "NetStream.Play.UnpublishNotify")
			{
				mainView.hideVideoAt(new Number(event.info.details).valueOf()-1);
				delete onlineParticipants[event.info.details.toString()];
				// someone has stopped playing. The stream name is given in info.info.details
				
			}
		}
		public var roomHandler:Function = function (event:int): void
		{
			if (event == roleId || onlineParticipants[event.toString()] != null)
				return;
			onlineParticipants[event.toString()] = new Object();
			//ExternalInterface.call("console.log","in roomHandler, info is [" + event + "]"); 
			mainView.showVideo(new Number(event)-1);
		}
		
	
// TODO. These are event handlers mandated by Flash api. Need to find out what they stand for!
		public  var roomDisconnect:Function= function(id:Number):void
		{

		}
		public  var closeStream:Function= function(id:Number):void
		{

		}
		public  var setId:Function= function(id:Number):void
		{

		}

		private function onUncaughtError(e:UncaughtErrorEvent):void
		{
			var uid:uiDialog = new uiDialog();
			// Do something with your error.
			if (e.error is Error)
			{
				var error:Error = e.error as Error;
				//ExternalInterface.call("console.log",error.errorID, error.name, error.message);
				uid.show("Error " + error.message);
			}
			else
			{
				var errorEvent:ErrorEvent= e.error as ErrorEvent;
				//ExternalInterface.call("console.log",errorEvent.errorID);
			}
		}		
		
		public function getOnlineParticipants():flash.utils.Dictionary
		{
			return onlineParticipants;
		}

	}
	
}