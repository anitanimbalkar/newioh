package com.metadesignsoftware.video
{
	import flash.display.DisplayObject;
	import flash.display.Sprite;
	import flash.events.NetStatusEvent;
	import flash.media.Camera;
	import flash.media.Microphone;
	import flash.media.H264Level;
	import flash.media.H264Profile;
	import flash.media.H264VideoStreamSettings;
	import flash.media.MicrophoneEnhancedMode;
	import flash.media.MicrophoneEnhancedOptions;
	
	import flash.media.SoundTransform;
	import flash.media.Video;
	import flash.net.NetConnection;
	import flash.net.NetStream;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.media.SoundMixer;
	import flash.media.SoundCodec;
	/**
	 * ...
	 * @author pradeep
	 */
	public class Publisher 
	{
		private var streamWidth:int				=	280;
		private var streamHeight:int 			= 	210;
		private var streamfps:int				=	30;
		private var streamquality:int 			=	90;
		private var streamrate:int 				=	22;		
		private var netStream:NetStream 		= 	null;
		private var streamId:int 				=	1;
		public  var mute:Boolean				= 	false;
		private var controller:MainController	= 	null;
		private var camera:Camera 				= 	Camera.getCamera();
		private var mike:Microphone 			= 	Microphone.getEnhancedMicrophone();
		private var netConnection:NetConnection = 	null;

		
		public function Publisher(streamId:int, streamWidth:int,streamHeight:int, controller:MainController, netConnection:NetConnection) : void
		{
			//this.streamWidth          	= streamWidth;
			//this.streamHeight      		= streamHeight;
			this.controller           	= controller;
			this.netConnection		  	= netConnection;
			this.streamId				= streamId;
			netStream					= null;
			initialise("0","0");
		}
		
		public function initialise(camIndex:String, micIndex:String) : void
		{
			// video settings
			//TODO: use the specified camera and mike index
			camera = Camera.getCamera();
			camera.setMode(Number(this.streamWidth),Number(this.streamHeight),Number(this.streamfps),true);
			camera.setKeyFrameInterval(15);
			// audio settings
			mike = Microphone.getEnhancedMicrophone();
			mike.enableVAD = true;
			mike.codec = SoundCodec.SPEEX;
			mike.framesPerPacket = 1;
			mike.rate = 16;
			mike.gain = 50;
			mike.encodeQuality = 6;
			mike.soundTransform = new SoundTransform(1, 0);
			mike.setLoopBack(false);
			mike.setSilenceLevel(0, 3600000);
			mike.setUseEchoSuppression(true);
		}
		
		public function publish() : void
		{
			try
			{
				//trace("publishing.....");
				if (netStream != null)
				{
					//trace("stream id is not null");
					this.netStream.close();
				}
				
				netStream = new NetStream(netConnection);

				var h264Settings:H264VideoStreamSettings = new H264VideoStreamSettings();
				h264Settings.setProfileLevel(H264Profile.BASELINE, H264Level.LEVEL_3_1);
				netStream.videoStreamSettings = h264Settings;
				
				netStream.client = controller;
				// let controller handle events, since he knows best.
				netStream.addEventListener(NetStatusEvent.NET_STATUS, controller.onNetStreamStatus);
				netStream.attachCamera(this.camera);
				netStream.attachAudio(this.mike);
				
				//trace("stream id is " + streamId.toString());
				netStream.publish(streamId.toString(),"live");	
			} catch (e:Error )
			{
				//trace(e.getStackTrace());
			}
		}
		
		public function publishmeAgain(_nc:NetConnection) : void
		{
			
		}
		
		public function audioOnly(value:Boolean) : void
		{
			//trace("i am in audioOnly function " + value);
			if(value)
				this.netStream.attachCamera(null);
			else 
				this.netStream.attachCamera(this.camera);
		}
		
		public function setSpeakerVolume(value:Number) : void
		{
			//trace("sound : " + value);
			var transform1:SoundTransform=new SoundTransform();
			transform1.volume = value; // goes from 0 to 1
			flash.media.SoundMixer.soundTransform = transform1;
		}
		public function setMicVolume(value:int) : void
		{
			mike.gain = value;
		}
		
		public function setQuality(value:int):void 
		{
			this.camera.setQuality(0,this.streamquality);
		}
		
		public function toggleMute() : void
		{
			
		}
		
		public function changeSettings(value:int):void
		{
		}
	
	}
}