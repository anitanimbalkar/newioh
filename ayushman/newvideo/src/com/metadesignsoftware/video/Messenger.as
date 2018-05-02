package com.metadesignsoftware.video 
{
	import flash.net.NetConnection;
	import flash.net.SharedObject;
	import flash.external.ExternalInterface;

	/**
	 * ...
	 * @author ...
	 */
	
	public class Messenger 
	{
		private var netConnection:NetConnection;
		private var messengerObject:SharedObject;
		private var controller:Object;
		public var messagereceived:Function;
		public function Messenger(_netConnection:NetConnection, _controller:Object) 
		{
			this.netConnection = _netConnection;
			this.messengerObject = SharedObject.getRemote("chat", this.netConnection.uri, true);
			this.messengerObject.connect(this.netConnection);
			this.messengerObject.client = this;
			this.controller = _controller;
			this.messengerObject.addEventListener("messengerHandler",messengerHandler);
		}
		public function messengerHandler(message:String):void 
		{
			controller.messageReceived(message);
		}
		public function send(message:String):void 
		{
			this.messengerObject.send("messengerHandler",message);
		}
	}
}
