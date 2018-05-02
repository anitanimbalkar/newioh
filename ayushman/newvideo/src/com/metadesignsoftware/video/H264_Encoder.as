package com.metadesignsoftware.video
{
	import flash.display.DisplayObject;
	import flash.display.Sprite;
	import flash.events.NetStatusEvent;
	import flash.media.//ExternalInterface.call(;
	import flash.media.Microphone;
	import flash.media.MicrophoneEnhancedMode;
	import flash.media.H264Level;
	import flash.media.H264Profile;
	import flash.media.H264VideoStreamSettings;
	import flash.media.Video;
	import flash.net.NetConnection;
	import flash.net.NetStream;
	import flash.text.TextField;
	import flash.text.TextFormat;
		
	[SWF( width="940", height="880" )]
	public class H264_Encoder extends Sprite
	{
		private var nc:NetConnection;
		private var ns_out:NetStream;
		private var ns_in:NetStream;
		private var cam://ExternalInterface.call( = //ExternalInterface.call(.get//ExternalInterface.call(();
		private var mike:Microphone = Microphone.getEnhancedMicrophone();
		private var vid_out:Video;
		private var vid_in:Video;
		private var metaText:TextField = new TextField();
		private var vid_outDescription:TextField = new TextField();
		private var vid_inDescription:TextField = new TextField();
		private var metaTextTitle:TextField = new TextField();
		
		private var publisher:Publisher = null;
		private var player:Player = null;
		public  var setId:Function= function(id:Number):void
		{

	//Alert.show(id+"","DAME");
		}
		public function H264_Encoder()
		{
			initConnection();
		}
		
		private function initConnection():void
		{
			nc = new NetConnection();
			nc.addEventListener(NetStatusEvent.NET_STATUS, onNetStatus);
			nc.connect("rtmp://ayushman.co/openmeetings/Room1");
			nc.client = this;	
		}
			
		protected function onNetStatus(event:NetStatusEvent):void
		{ 
			trace(event.info.code);
			if(event.info.code == "NetConnection.Connect.Success")
			{ 
				publish(); 
				displayPublishingVideo(); 
				displayPlaybackVideo();
			}
		}
		
		protected function publish():void
		{  
			ns_out = new NetStream(nc); 
			
			ns_out.attach//ExternalInterface.call((cam);  
			var h264Settings:H264VideoStreamSettings = new H264VideoStreamSettings();
			h264Settings.setProfileLevel(H264Profile.BASELINE, H264Level.LEVEL_3_1);
			
			//  ALTHOUGH FUTURE VERSIONS OF FLASH PLAYER SHOULD SUPPORT SETTING ENCODING PARAMETERS
			//  ON h264Settings BY USING THE setQuality() and setMode() METHODS, FOR NOW YOU MUST SET 
			//  SET THE PARAMETERS ON THE //ExternalInterface.call( FOR: BANDWITH, QUALITY, HEIGHT, WIDTH, AND FRAMES PER SECOND.
			
			//	h264Settings.setQuality(30000, 90); 
			//	h264Settings.setMode(320, 240, 30);
			
			//cam.setQuality(0, 90);
			cam.setMode(320, 240, 30, true);
			cam.setKeyFrameInterval(15);
			mike.codec = "Speex";
			mike.enableVAD = true;
			mike.encodeQuality = 6;
			mike.setUseEchoSuppression(true);
			mike.noiseSuppressionLevel = -15;
			mike.gain = 70;
			ns_out.attachAudio(mike);
			ns_out.videoStreamSettings = h264Settings;
	//		trace(ns_out.videoStreamSettings.codec + ", " + h264Settings.profile + ", " + h264Settings.level);
			ns_out.publish("mp4:webCam.f4v", "live");
			
			var metaData:Object = new Object();
			metaData.codec = ns_out.videoStreamSettings.codec;
			metaData.profile =  h264Settings.profile;
			metaData.level = h264Settings.level;
			metaData.fps = cam.fps;
			metaData.bandwith = cam.bandwidth;
			metaData.height = cam.height;
			metaData.width = cam.width;
			metaData.keyFrameInterval = cam.keyFrameInterval;
			metaData.copyright = "Metadesign Software";
			ns_out.send("@setDataFrame", "onMetaData", metaData);
			onMetaData(metaData);
		}
				
		protected function displayPublishingVideo():void 
		{ 
			vid_out = new Video(); 
			vid_out.x = 300; 
			vid_out.y = 10;
			vid_out.width = cam.width;
			vid_out.height = cam.height;
			vid_out.attach//ExternalInterface.call((cam); 
			addChild(vid_out); 
			metaText.x = 0;
			metaText.y = 55;
			metaText.width = 300;
			metaText.height = 385;
			metaText.background = true;
			metaText.backgroundColor = 0x1F1F1F;
			metaText.textColor = 0xD9D9D9;
			metaText.border = true;
			metaText.borderColor = 0xDD7500;
			addChild(metaText);
			metaTextTitle.text = "\n             - Encoding Settings -";
			var stylr:TextFormat = new TextFormat();
			stylr.size = 18;
			metaTextTitle.setTextFormat(stylr);
			metaTextTitle.textColor = 0xDD7500;
			metaTextTitle.width = 300;
			metaTextTitle.y = 10;
			metaTextTitle.height = 50;
			metaTextTitle.background = true;
			metaTextTitle.backgroundColor = 0x1F1F1F;
			metaTextTitle.border = true;
			metaTextTitle.borderColor = 0xDD7500;
			vid_outDescription.text = "\n\n\n\n                    Live video from webcam \n\n" +
									"	              Encoded to H.264 in Flash Player 11 on output";
			vid_outDescription.background = true;
			vid_outDescription.backgroundColor = 0x1F1F1F;
			vid_outDescription.textColor = 0xD9D9D9;
			vid_outDescription.x = 300;
			vid_outDescription.y = cam.height;
			vid_outDescription.width = cam.width;
			vid_outDescription.height = 200;
			vid_outDescription.border = true;
			vid_outDescription.borderColor = 0xDD7500;
			addChild(vid_outDescription);
			addChild(metaTextTitle);
		}
		
	protected function displayPlaybackVideo():void
		{ 
			ns_in = new NetStream(nc); 
			ns_in.client = this;
			ns_in.play("mp4:webCam.f4v"); 
			vid_in = new Video(); 
			vid_in.x = vid_out.x + vid_out.width; 
			vid_in.y = vid_out.y; 
			vid_in.width = cam.width;
			vid_in.height = vid_out.height;
			vid_in.attachNetStream(ns_in); 
			addChild(vid_in);
			vid_inDescription.text = "\n\n\n\n                  H.264-encoded video \n\n" + 
				"                  Streaming from Flash Media Server";
			vid_inDescription.background = true;
			vid_inDescription.backgroundColor =0x1F1F1F;
			vid_inDescription.textColor = 0xD9D9D9;
			vid_inDescription.x = vid_in.x;
			vid_inDescription.y = cam.height;
			vid_inDescription.width = cam.width;
			vid_inDescription.height = 200;
			vid_inDescription.border = true;
			vid_inDescription.borderColor = 0xDD7500;
			addChild(vid_inDescription);
		}
		
		
		public function onBWDone():void
		{

		}
		
		public function onMetaData( o:Object ):void	
		{

			try
			{
		for (var settings:String in o)
			{
				trace(settings + " = " + o[settings]);
				metaText.appendText("\n" + "    " + settings.toUpperCase() + "   =   " + o[settings] + "\n");
			}
			} catch (error:Error)
			{
				messageBox("error");
			}
		}
		
		private function messageBox(text:String):void {

         var msgbox:Sprite = new Sprite();

          // drawing a white rectangle
          msgbox.graphics.beginFill(0xFFFFFF); // white
          msgbox.graphics.drawRect(0,0,300,20); // x, y, width, height
          msgbox.graphics.endFill();
 
          // drawing a black border
          msgbox.graphics.lineStyle(2, 0x000000, 100);  // line thickness, line color (black), line alpha or opacity
          msgbox.graphics.drawRect(0,0,300,20); // x, y, width, height
        
          var textfield:TextField = new TextField();
          textfield.text = text;

          addChild(msgbox)   
          addChild(textfield)
        }
	
	}
}
