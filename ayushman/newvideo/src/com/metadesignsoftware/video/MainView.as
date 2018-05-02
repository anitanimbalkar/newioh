package com.metadesignsoftware.video
{
	import com.ghostwire.ui.controls.uiVSlider;
	import com.ghostwire.ui.controls.uiLabel;
	import com.soma.ui.ElementUI;
	import com.soma.ui.layouts.HBoxUI;
	import com.soma.ui.layouts.VBoxUI;
	import com.soma.ui.vo.GapUI;
	import com.soma.ui.vo.PaddingUI;
	import com.ghostwire.ui.controls.uiSlider;
	import com.ghostwire.ui.data.uiRange;
	import com.ghostwire.ui.data.uiModel;
	import com.ghostwire.ui.controls.uiLabelButton;
	import com.ghostwire.ui.enums.ALIGN;
	import com.ghostwire.ui.containers.uiWindow;
	import com.ghostwire.ui.enums.WINDOW;
	import flash.display.Stage;
	import flash.events.FocusEvent;
	import flash.events.NetStatusEvent;
	import flash.events.TimerEvent;
	import flash.media.Video;
	import flash.net.NetStream;
	import flash.display.Shape;
	import flash.events.Event;
	import flash.events.KeyboardEvent;
	import flash.events.MouseEvent;
	import flash.geom.Matrix;
	import flash.text.TextField;
	import flash.text.TextFieldType;
	import flash.display.GradientType;
	import flash.display.Sprite;
	import flash.media.Camera;
	import flash.system.Security;
	import flash.system.SecurityPanel;
	import flash.text.TextFormat;
	import flash.utils.Timer;
	import flash.display.Loader;
	import flash.net.URLRequest;
	import flash.display.Bitmap;
	import flash.external.ExternalInterface;
	
	  
	public class MainView extends Sprite
	{
		// constants
		private var videoBgColor:uint =  0x66FFFF;
		private var borderColor:uint = 0xa8c8d9;
		private var numVideos:int ;
		private var videoHeight:int ;
		private var videoWidth: int ;
		private var lineStyleWidth:int = 0;
		private var videoPadding:int = 0;
		private var videos:Array = new Array(Video) ;
		
		// boxes to draw border around video.
		private var boxes:Array = new Array(Shape);
		private var mainPane:VBoxUI ;
		private var chatPane:VBoxUI ;
		private var videoPane:HBoxUI ;
		private var container:VBoxUI ;
		public var volSlider:uiSlider;
		public var model:uiModel;
		public var lbox:VBoxUI;
		public var inputMessage:TextField;
		public var sendbutton:uiLabelButton = new uiLabelButton("Send");
		public var audioOnlyIcon:Loader;
		public var settingsIcon:Loader;
		public var volumeIcon:Loader;
		public var speedIcon:Loader;
		private var mainPaneHeight:Number = 480;
		private var mainpaneWidth:Number = 300;
		private var mainVideoLocation:Number;
		private var isMain:Boolean = false;
		private var roleId:int;
		private var speedtestTimer:Timer;
		private var mainVideo:Sprite;
		private var settingsWindow:uiWindow;
		public var msgbox:Sprite;
		public var messagelist:TextField = new TextField();
		private var matrix:Matrix;
		private var myFormat:TextFormat = new TextFormat("Tahoma", 50);
		
		public function MainView(numVideos:int,videoWidth:int,videoHeight:int,roleId:int) 
		{
			this.numVideos = numVideos;
			this.videoHeight = videoHeight;
			this.videoWidth = videoWidth;
			this.mainVideoLocation = roleId-1;
			this.roleId = roleId;
			//ExternalInterface.call("console.log", " !!! ");
		}
		
		public function createView(videoLocation:int):void
		{
			var i:int;
			createVideoBoxes();
			makeBackground();
			stage.invalidate();
			
			mainPane = new VBoxUI(stage, mainpaneWidth, mainPaneHeight);
			mainPane.x = 0;
			mainPane.y = 30;
			mainPane.graphics.lineStyle(2, borderColor);
			mainPane.graphics.moveTo(300, 0);
			mainPane.graphics.lineTo(300, 300);
			
			mainPane.childrenAlign = VBoxUI.ALIGN_TOP_CENTER;
			mainPane.childrenGap = new GapUI(20, 25);
			container = new VBoxUI(mainPane, mainpaneWidth, mainpaneWidth );
			container.x = 0;
			container.y = 0;
			container.childrenAlign = VBoxUI.ALIGN_TOP_CENTER;
			
			mainVideo = boxes[mainVideoLocation];
			mainVideo.height = 210;
			mainVideo.width = 280;
			mainVideo.x = 10;
			mainVideo.y = 5;
			container.addChild(mainVideo);
			
			videoPane= new HBoxUI(mainPane, (numVideos-1) * (70), 85 );
			videoPane.ratio = ElementUI.RATIO_IN;
			videoPane.childrenGap = new GapUI(10, 10);
			videoPane.childrenPadding = new PaddingUI(10, 10, 10, 10);
			videoPane.childrenAlign = HBoxUI.ALIGN_CENTER_LEFT;
			videoPane.x = 40;
			container.addChild(videoPane);
			
			addChild(mainPane);
			mainPane.addChild(container);		
			volSlider = new uiSlider(new uiRange(0.5,0,1));
			volSlider.x = 130;
			volSlider.y = mainVideo.height+92;
			volSlider.width = 100;
			addChild(volSlider)
			
			var camera:Camera = Camera.getCamera();
			ExternalInterface.call("console.log", camera.width + " " + camera.height);
			//mainVideo.width = 320;
			//mainVideo.height = 240;
			//camera.setMode(mainVideo.width, mainVideo.height, 60);
			videos[videoLocation].attachCamera(camera);
			
			if (videoLocation != mainVideoLocation)
			{
				videoPane.addChild(boxes[videoLocation]);
			}
			
			audioOnlyIcon = new Loader();
			audioOnlyIcon.contentLoaderInfo.addEventListener(Event.COMPLETE, onaudioiconLoadComplete);
			audioOnlyIcon.load(new URLRequest("assets/images/video_on.png"));	
			
			volumeIcon = new Loader();
			volumeIcon.contentLoaderInfo.addEventListener(Event.COMPLETE, onspeakerLoadComplete);
			volumeIcon.load(new URLRequest("assets/images/speaker_on.png"));			
			
			settingsIcon = new Loader();
			settingsIcon.contentLoaderInfo.addEventListener(Event.COMPLETE, onsettingsiconLoadComplete);
			settingsIcon.load(new URLRequest("assets/images/Settings_Icon.png"));			
			settingsIcon.addEventListener(MouseEvent.CLICK, on_btnClick);
			
			speedIcon = new Loader();
			speedIcon.contentLoaderInfo.addEventListener(Event.COMPLETE, onspeediconLoadComplete);
			speedIcon.load(new URLRequest("assets/images/meter_icon.png"));			
			
			var seprator:Loader = new Loader();
			seprator.load(new URLRequest("assets/images/separator.png"));
			seprator.x = -40;
			seprator.y = mainVideo.height+112;
			
			addChild(seprator);
			
			createMessenger();
			mainPane.refresh();
			videoPane.refresh();
		}

		private function onaudioiconLoadComplete(event:Event):void 
		{
			var bitmapImage:Bitmap = event.target.content;
			bitmapImage.smoothing = true; // APPLY SMOOTHING
			audioOnlyIcon.x = 70; // X Placement
			audioOnlyIcon.y = mainVideo.height+98;; // Y Placement
			var bmpContainer:Sprite = new Sprite(); // can receive mouse events, for example:
			bmpContainer.buttonMode = true; // this just makes it show the hand cursor, and is not necessary for the mouse events to work
			bmpContainer.addChild(audioOnlyIcon);
			addChild(bmpContainer);
		}
		private function onsettingsiconLoadComplete(event:Event):void 
		{
			var bitmapImage:Bitmap = event.target.content;
			bitmapImage.smoothing = true; // APPLY SMOOTHING
			settingsIcon.x = 10; // X Placement
			settingsIcon.y = mainVideo.height+95; // Y Placement
			var bmpContainer:Sprite = new Sprite(); // can receive mouse events, for example:
			bmpContainer.buttonMode = true; // this just makes it show the hand cursor, and is not necessary for the mouse events to work
			bmpContainer.addChild(settingsIcon);
			addChild(bmpContainer);
		}
		private function onspeakerLoadComplete(event:Event):void 
		{
			var bitmapImage:Bitmap = event.target.content;
			bitmapImage.smoothing = true; // APPLY SMOOTHING
			volumeIcon.x = 100; // X Placement
			volumeIcon.y = mainVideo.height+98; // Y Placement
			var bmpContainer:Sprite = new Sprite(); // can receive mouse events, for example:
			bmpContainer.buttonMode = true; // this just makes it show the hand cursor, and is not necessary for the mouse events to work
			bmpContainer.addChild(volumeIcon);
			bmpContainer.name = "Mute Audio";
			addChild(bmpContainer);
		}
		private function drawSeprator(event:Event):void 
		{
			//ExternalInterface.call("console.log", "vdjbkjfsiob");
			var bitmapImage:Bitmap = event.target.content;
			bitmapImage.smoothing = true; // APPLY SMOOTHING
			speedIcon.x = 10; // X Placement
			speedIcon.y = 10;; // Y Placement
			
			var bmpContainer:Sprite = new Sprite(); // can receive mouse events, for example:
			bmpContainer.buttonMode = true; // this just makes it show the hand cursor, and is not necessary for the mouse events to work
			bmpContainer.addChild(speedIcon);
			addChild(bmpContainer);
		}
		private function onspeediconLoadComplete(event:Event):void 
		{
			var bitmapImage:Bitmap = event.target.content;
			bitmapImage.smoothing = true; // APPLY SMOOTHING
			speedIcon.x = 40; // X Placement
			speedIcon.y = mainVideo.height+98;; // Y Placement
			
			var bmpContainer:Sprite = new Sprite(); // can receive mouse events, for example:
			bmpContainer.buttonMode = true; // this just makes it show the hand cursor, and is not necessary for the mouse events to work
			bmpContainer.addChild(speedIcon);
			addChild(bmpContainer);
		}
		private function on_btnClick(evt:MouseEvent):void
		{
			Security.showSettings(SecurityPanel.PRIVACY);
		}
		private function on_close(evt:Event):void
		{
		}
		public function MessageBox(message:String):void 
		{
		  msgbox = new Sprite();

          // drawing a white rectangle
          msgbox.graphics.beginFill(0xF4FA58); // white
		  msgbox.graphics.drawRoundRectComplex(mainVideo.width-150,mainVideo.height+20, 150, 60, 10, 10, 10, 10);
          msgbox.graphics.endFill();
 
          // drawing a black border
          msgbox.graphics.lineStyle(2, 0xFF0000, 100);  // line thickness, line color (black), line alpha or opacity
		  msgbox.graphics.drawRoundRectComplex(mainVideo.width-150,mainVideo.height+20, 150, 60, 10, 10, 10, 10);
		  
          var textfield:TextField = new TextField();
		  textfield.setTextFormat(myFormat);
          textfield.text = message;
		  textfield.width = 149;
		  textfield.x = mainVideo.width-147;
		  textfield.y = mainVideo.height+20;
		  textfield.wordWrap = true;
		  textfield.multiline = true;
          addChild(msgbox);   
          msgbox.addChild(textfield);
		  var killer:Timer = new Timer(3000);
		  killer.addEventListener(TimerEvent.TIMER, closeMessageBox);
		  killer.start();
        }
		public function closeMessageBox(e:TimerEvent):void 
		{
			trace(1);
			removeChild(msgbox);
		}
		
		
		public function createMessenger():void 
		{
			//create a box for Text chat
			var box:Sprite = new Sprite();
			mainPane.addChild(box);
		
			box.graphics.lineStyle(3, borderColor, 1, false, "normal", null, null, 3);
			box.graphics.beginFill(borderColor);
			box.graphics.drawRoundRectComplex(box.x, box.y, mainVideo.width-10, 125, 1, 1, 1, 1);
			box.graphics.endFill();
			messagelist.setTextFormat(myFormat);
			messagelist.width = mainVideo.width-11;
			messagelist.height = 90;
			messagelist.scrollV = 1;
			messagelist.x = 1;
			messagelist.y = 4;
			messagelist.wordWrap = true;
			messagelist.multiline = true;
			messagelist.background = true;
			messagelist.backgroundColor = 0xffffff;
			messagelist.border = false;
			messagelist.scrollV = 1;
			box.addChild(messagelist);
			
			
			//create a textbox to enter message
			inputMessage = new TextField();
			inputMessage.setTextFormat(myFormat);
			inputMessage.border = false;
			inputMessage.width = mainVideo.width-16;
			inputMessage.height = 20;
			inputMessage.wordWrap = true;
			inputMessage.multiline = true;
			inputMessage.x = 3;
			inputMessage.y = 101;
			inputMessage.background = true;
			inputMessage.multiline = true;
			inputMessage.backgroundColor = 0xFFFFFF;
			inputMessage.addEventListener(KeyboardEvent.KEY_DOWN, keyListener);
			inputMessage.type = TextFieldType.INPUT;
			inputMessage.textColor = 0x999999
			box.addChild(inputMessage);
		}
		
		public function displaymessage(message:String):void 
		{	
			messagelist.text = messagelist.text + "\n" + message;
			messagelist.scrollV=messagelist.scrollV + 10;
		}
		public function clearInputBox():void 
		{	
			inputMessage.text = "";			
		}
		
		private function keyListener(event:KeyboardEvent):void 
		{
			if (event.keyCode == 13)
			{
			}
		}
		
		public function createVideoBoxes() :void
		{
			var i:int;
			for (i = 0; i < numVideos; i++)
			{
				//ExternalInterface.call("console.log","in createVideoBoxes i=" +i);
				var video: Video = new Video();
				videos[i] = video;
				video.x = 1;
				video.y = -6;
				video.height = 68;
				video.width = 68;
				
				//now put it in a box 
				var box:Sprite = new Sprite();
				boxes[i] = box;
				box.graphics.lineStyle(1, borderColor, 1, false, "normal", null, null, 3);
				box.graphics.drawRoundRectComplex(0, -7, 70, 70, 1, 1, 1, 1);
				box.addChild(video);
				boxes[i] = box;
				videos[i] = video;
			}
		}
		
		public function showVideo(videoId:int) : void
		{
			var box:Sprite;
			if (!isMain) 
			{
				try
				{
					container.removeChild(mainVideo);
				}
				catch (e:Error) 
				{
				}
				mainVideo = boxes[videoId];
				mainVideo.height = 210;
				mainVideo.width = 280;
				mainVideo.x = 10;
				mainVideo.y = 5;
				
				container.addChildAt(mainVideo, 0);
				if (mainVideoLocation == roleId - 1) 
				{
					box = boxes[mainVideoLocation];
					box.width = 70;
					box.height = 70;
				
					videoPane.addChildAt(box, 0);
					videoPane.refresh();
				}
				isMain = true;
				mainVideoLocation = videoId;
			}
			else
			{		
				box = boxes[videoId];
				videoPane.addChildAt(box, videoPane.numChildren - 1);
				videoPane.refresh();
			}
		}
		
		public function hideVideoAt(i:int) : void
		{	
			var video:Video = videos[i];
			var box:Sprite = boxes[i];
			if (videos[i] == null)
			{
				throw new Error("video already removed");
			}
			if (i == mainVideoLocation) 
			{
				container.removeChild(mainVideo);
				isMain = false;
				mainVideo = boxes[roleId - 1];
				mainVideo.width = 280;
				mainVideo.height = 210;
				mainVideo.x = 10;
				mainVideo.y = 5;
				container.addChildAt(mainVideo, 0);
				videoPane.removeChild(box);
				videoPane.refresh();
				return;
			}
			else 
			{
				videoPane.removeChild(box);
				videoPane.refresh();
			}
		}
		
		public function makeBackground():void
		{
			var type:String = GradientType.LINEAR;
			var colors:Array = [0xCCFFFF, 0x003366];
			var alphas:Array = [1, 1];
			var ratios:Array = [0, 255];
			var spreadMethod:String = "Pad";
			var interp:String = "linearrgb";
			var focalPtRatio:Number = 0;
			matrix = new Matrix();
			var boxRotation:Number = Math.PI/2; // 90??
			var tx:Number = 25;
			var ty:Number = 0;
			matrix.createGradientBox(mainpaneWidth, mainPaneHeight, boxRotation, tx, ty);
			var square:Shape = new Shape;
			
			square.graphics.drawRoundRectComplex(0, 0, mainpaneWidth, mainPaneHeight, 5, 5, 5, 5);
			addChild(square);	
		}
	
		public function detectKeyDown(event:KeyboardEvent):void 
		{
		  if(event.keyCode == 17)
			{	
			}
		}
		
		public function detectKeyUp(event:KeyboardEvent):void 
		{
			if(event.keyCode == 17)
			{	
			}
		}
		public function getTextFromJavaScript(str:String):void 
		{		
		}
		
		public function getVideos(): Array
		{
			return videos;
		}
	}
}