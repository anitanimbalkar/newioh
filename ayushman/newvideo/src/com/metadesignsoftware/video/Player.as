package com.metadesignsoftware.video
{
	
	import flash.events.NetStatusEvent;
	import flash.media.H264VideoStreamSettings;
	import flash.media.SoundMixer;
	import flash.media.Camera;
	import flash.media.SoundTransform;
	import flash.media.Video;
	import flash.media.Microphone;
	import flash.net.NetConnection;
	import flash.net.NetStream;
	import flash.utils.Dictionary;

	/**
	 * ...
	 * @author pradeep
	 */
	public class  Player
	{
		
		private var arrStreams:Dictionary					=	null ;
		private var streamIds:Array;
		private var boolStreamsInited:Boolean				=	false ;
		private var netConnection:NetConnection;
		private	var	controller:MainView;
		
		public function Player(streams:Array, netConnection:NetConnection, controller:MainController)
		{
			try
			{
				this.netConnection 		= netConnection;
				arrStreams 				= new Dictionary();
				streamIds 				= new Array(int);
				var i:int 				= 0;
				
				for (i = 0; i < streams.length; i++)
				{
					trace("creating stream id " + streams[i]);
					streamIds[i] = streams[i];
					try
					{
						var netStream:NetStream = new NetStream(netConnection);
						arrStreams[streams[i].toString()] =  netStream;
						netStream.client = controller;
						netStream.addEventListener(NetStatusEvent.NET_STATUS,controller.onNetStreamStatus);			
					
					}
					catch (e1:Error)
					{
						trace("error creating netstream in player");
						throw e1;
					}

				}
			} catch (e:Error)
			{
				trace("error creating Player " + e.message);
				throw e;
			}
		}
		
		

		public function getStreams() : Dictionary
		{
			return arrStreams;
		}
		
		public function playStreams() : void
		{
			var i:int = 0;
			for (var key:String in arrStreams) 
			{
				trace("playing stream [" + key +"]");
				arrStreams[key].play(key,-1);
			}
		}
		
		public function stopPlayStreams(broadcaStstream:int) : void
		{
			var i:int = 0;
			for (i = 0; i < arrStreams.length; i++)
			{
				arrStreams[i].close(i+1);
			}
			
		}
		
		public function setAudioVolume(value:int): void
		{
			value = value/100;
			var transform1:SoundTransform=new SoundTransform();
			transform1.volume=value; // goes from 0 to 1
			flash.media.SoundMixer.soundTransform=transform1;

		}
		
	}
	
}