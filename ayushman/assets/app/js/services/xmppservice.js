angular.module('app.services')
    .service('xmppService',
	     ['$rootScope',
		 function ($rootScope) {
		     var xmppclient = null;
		     var helper = null;
		     var TimerID = null;
		     var jidwithpresence = new Array();
		     var responseObj = {};
		     var connectxmpp = function(){
			 clearTimeout(TimerID);
			 switch(helper.getstatus())
			 {
			 case 'connected':
			     clearTimeout(TimerID);
			     break;
			 case 'disconnected':
			     clearTimeout(TimerID);
			     var url = window.location.protocol+'//'+window.location.hostname+':5280/http-bind';
			     xmppclient.connect(url,servername,user_id,xmpp_pass,false);
			     TimerID = setTimeout(connectxmpp, 5000);
			     break;
			 default :
			     clearTimeout(TimerID);
			     break;
			 }
		     }
		     return {
			 getResponse: function(){
			     return responseObj;
			 },
			 getPresence: function(){
			     return jidwithpresence;
			 },
			 sendMessage: function(messagebody, jid){
			     xmppclient.sendMsg(jid+'@'+servername,messagebody);
			 },
			 mustSendMessage: function(messagebody, jid, msgId){
			     xmppclient.mustSendMsg(jid+'@'+servername,messagebody, msgId);
			 },
			 initializeXmpp: function(){
			     if(xmppclient == null){
				 xmppclient = new xmpp();
				 xmppclient.callback = helper;
				 helper ={
				     connected: function () {
					 this.isConnected = true;
					 this.connectionStatus = "connected";
				     },
				     isConnected : false,
				     connectionStatus: 'disconnected',
				     presence: function (jid,presence) {
					 var jid = jid.replace('@','-');
					 jid = jid.split('-')[0];
					 jidwithpresence[jid] = presence;
					 $rootScope.$broadcast("update_presence");
				     },
				     message: function(message){
					 $rootScope.$broadcast(message);
				     },
				     response: function(response, id){
					 responseObj.val = response;
					 responseObj.id = id; 
					 $rootScope.$broadcast('response');
				     },
				     disconnected :function (){
					 this.isConnected = false;
					 this.connectionStatus = 'disconnected';
					 jidwithpresence[user_id] = 'offline';
					 $rootScope.$broadcast("update_presence");
					 connectxmpp();
				     },
				     setstatus :function (status){
					 this.connectionStatus = status;
				     },
				     getstatus : function(){
					 return this.connectionStatus;
				     },
				     changestatus : function(status){
					 xmppclient.changestatus(status);
				     }
				 }
				 xmppclient.init(helper);
				 connectxmpp();
			     }
			 }
		     };
		 }]);
