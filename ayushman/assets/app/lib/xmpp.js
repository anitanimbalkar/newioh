function xmpp(){
	con = null;
	this.callback = null;
	isConnected = false;
	connectionStatus = 'started';
	conInfo = new Object();
	this.init = init;
    this.quit = quit;
    this.sendMsg 		= sendMsg;
	this.connect 		= connect; 
	this.changestatus 	= changestatus; 
	this.connectionStatus 		= connectionStatus; 
	this.mustSendMsg = mustSendMsg;
	
	function handleIQ(aIQ) {
		con.send(aIQ.errorReply(ERR_FEATURE_NOT_IMPLEMENTED));
	}
	
	function handleMessage(aJSJaCPacket) {
		try{
			var node = aJSJaCPacket.getChild("delay",'urn:xmpp:delay');
			if(node != null)
			{
				return false;
			}
			var node = aJSJaCPacket.getChild("received",'urn:xmpp:receipts');
			if(node != null)
			{
				id = aJSJaCPacket.getID();
				callback.response("Successfull", id);
				return false;
			}
			var node = aJSJaCPacket.getChild("offline",'');
			if(node != null)
			{
				var node2 = aJSJaCPacket.getChild("request",'urn:xmpp:receipts');
				if(node2 == null)
				{
					id = aJSJaCPacket.getID();
					callback.response("Failed", id);
					return false;
				}
				else
				{
					var aMsg = new JSJaCMessage();
					aMsg.setTo(aJSJaCPacket.getFromJID());
					aMsg.setID(aJSJaCPacket.getID());
					aMsg.appendNode(aMsg.buildNode('received',{'xmlns':'urn:xmpp:receipts','id':aJSJaCPacket.getID().htmlEnc()}));
					con.send(aMsg);
				}
			}
			callback.message(aJSJaCPacket.getBody().htmlEnc());
		}catch (e){
		}
	}
	
	function handlePresence(aJSJaCPacket) {
		presence = '';
		if (!aJSJaCPacket.getType() && !aJSJaCPacket.getShow()) {
			presence = 'online';
		}else if(aJSJaCPacket.getType() == 'subscribe'){
			var p = new JSJaCPresence();
			p.setType('subscribe');
			p.setTo(aJSJaCPacket.getFromJID());
			con.send(p);

			var p = new JSJaCPresence();
			p.setType('subscribed');
			p.setTo(aJSJaCPacket.getFromJID());
			con.send(p);
		}else if(aJSJaCPacket.getType() == 'unsubscribe'){
			var p = new JSJaCPresence();
			p.setType('unsubscribe');
			p.setTo(aJSJaCPacket.getFromJID());
			con.send(p);

			var p = new JSJaCPresence();
			p.setType('unsubscribed');
			p.setTo(aJSJaCPacket.getFromJID());
			con.send(p);
		}else {
			if (aJSJaCPacket.getType() === 'unavailable')
				presence = 'online';
			else if (aJSJaCPacket.getType() === 'online')
				presence = 'online';
			else if(aJSJaCPacket.getType() === 'busy')
				presence = 'busy';
			else if (aJSJaCPacket.getType() === 'conference')
				presence = 'conference';
			else
				presence = 'offline';
		}
		jid = aJSJaCPacket.getFromJID();
		callback.presence(jid._node+'@'+jid._domain,presence);
	}
	
	function handleError(e) {
		if (con.connected())
			con.disconnect();
	}
	
	function handleStatusChanged(status) {
		connectionStatus = status;
	}

	function handleConnected() {
		isConnected = true;
		connectionStatus = 'connected';
		con.send(new JSJaCPresence());
		callback.connected();
	}

	 function handleDisconnected() {
		callback.disconnected();
		isConnected = false;
		connectionStatus = 'disconnected';
	}

	function handleIqVersion(iq) {
		con.send(iq.reply([
						iq.buildNode('name', 'jsjac ioh'),
						iq.buildNode('version', JSJaC.Version),
						iq.buildNode('os', navigator.userAgent)
					]));
		return true;
	}

	function handleIqTime(iq) {
	  var now = new Date();
	  con.send(iq.reply([iq.buildNode('display',
									  now.toLocaleString()),
						 iq.buildNode('utc',
									  now.jabberDate()),
						 iq.buildNode('tz',
									  now.toLocaleString().substring(now.toLocaleString().lastIndexOf(' ')+1))
						 ]));
	  return true;
	}
	
	function doLogin(httpbindurl,domain,username,password,register) {
	  try {
			// setup args for contructor
			conInfo = new Object();
			oArgs = new Object();
			oArgs.httpbase = httpbindurl;
			oArgs.timerval = 2000;
			conInfo.httpbase = httpbindurl;
			conInfo.timerval = 2000;
			if (typeof(oDbg) != 'undefined')
			  oArgs.oDbg = oDbg;
			con = new JSJaCHttpBindingConnection(oArgs);

			setupCon(con);
			
			// setup args for connect method
			oArgs = new Object();
			oArgs.domain 	= domain;
			oArgs.username 	= username;
			oArgs.resource 	= Math.floor((Math.random()*100)+1);
			oArgs.pass 		= password;
			oArgs.register 	= register;
			
			conInfo.domain 	= domain;
			conInfo.username 	= username;
			conInfo.resource 	= oArgs.resource;
			conInfo.pass 		= password;
			conInfo.register 	= register;
			con.connect(oArgs);
		} catch (e) {
			//alert('dologin()  exception:'+e.toString());
		} finally {
			return false;
		}
	}

	function unsubscribe(jid){
		var p = new JSJaCPresence();
		p.setType('unsubscribe');
		p.setTo(jid);
		con.send(p);
		var p = new JSJaCPresence();
		p.setType('unsubscribed');
		p.setTo(jid);
		con.send(p);
	}

	function setupCon(con) {
		con = con;
		con.registerHandler('message',handleMessage);
		con.registerHandler('presence',handlePresence);
		con.registerHandler('iq',handleIQ);
		con.registerHandler('onconnect',handleConnected);
		con.registerHandler('onerror',handleError);
		con.registerHandler('status_changed',handleStatusChanged);
		con.registerHandler('ondisconnect',handleDisconnected);
		con.registerIQGet('query', NS_VERSION, handleIqVersion);
		con.registerIQGet('query', NS_TIME, handleIqTime);
	}

	function sendMsg(toid,message) {
		if (message == '' || toid == '')
			return false;
		if (toid.indexOf('@') == -1)
			toid.value += '@' + con.domain;
		try {
			var aMsg = new JSJaCMessage();
			aMsg.setTo(new JSJaCJID(toid));
			aMsg.setBody(message);
			con.send(aMsg);
			return false;
		} catch (e) {
			//alert('sendMsg() Error: '+e.message); 
			return false;
		}
	}
	
	function mustSendMsg(toid,message,msgid){
		if (message == '' || toid == '')
			return false;
		if (toid.indexOf('@') == -1)
			toid.value += '@' + con.domain;
		try {
			var aMsg = new JSJaCMessage();
			aMsg.setTo(new JSJaCJID(toid));
			aMsg.setBody(message);
			aMsg.setID(msgid);
			aMsg.appendNode(aMsg.buildNode('request',{'xmlns':'urn:xmpp:receipts'}));
			xNode = aMsg.buildNode('x',{'xmlns':'jabber:x:event'});
			xNode.appendChild(aMsg.buildNode('offline'));
			aMsg.appendNode(xNode);
			con.send(aMsg);
			return false;
		} catch (e) {
			alert('sendMsg() Error: '+e.message);
			return false;
		}
	}
	
	function changestatus(status){
		var p = new JSJaCPresence();
		p.setType(status);
		con.send(p);
	}
	
	function quit() {
		var p = new JSJaCPresence();
		p.setType("unavailable");
		con.send(p);
		con.disconnect();
	}

	function init(helper) {
		callback = helper;
		try { // try to resume a session
			if (JSJaCCookie.read('btype').getValue() == 'binding')
				con = new JSJaCHttpBindingConnection({'oDbg':oDbg});
			else
				con = new JSJaCHttpPollingConnection({'oDbg':oDbg});
			setupCon(con);
		}catch (e) {} // reading cookie failed - never mind
	}
	
	function connect(httpbindurl,domain,username,password,register){
		if(isConnected == false){
			doLogin(httpbindurl,domain,username,password,register);
		}
	}	

}
onerror = function(e) { 
	//alert('on error');
  return false; 
};