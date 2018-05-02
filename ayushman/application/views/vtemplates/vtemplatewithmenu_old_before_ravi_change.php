<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>India Online Health</title>
    <style type="text/css"></style>
    <script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"> </script>
    <script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"> </script>
    <link href="/ayushman/assets/css/ayushman fn 1.css" rel="stylesheet" type="text/css" />
    <link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" rel="stylesheet" />
    <link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
    <link type="text/css" href="/ayushman/assets/css/ui.jqgrid.css" rel="stylesheet" />
    <script src="/ayushman/assets/app/lib/main.js"></script>
    <script type="text/javascript" src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"> </script>
    <link type="text/css" href="/ayushman/assets/css/ui.multiselect.css" rel="stylesheet" />
    <script type="text/javascript" src="/ayushman/assets/js/i18n/grid.locale-en.js"> </script>
    <script type="text/javascript" src="/ayushman/assets/js/xmpp.js"> </script>
    <script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
    <script src='/ayushman/assets/js/jsjac/jsjac.js'> </script>
    <script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, target-densitydpi=320, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script src="/ayushman/assets/app/lib/angular/angular.js"></script>
        <script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
        <script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
        <script src="/ayushman/assets/app/lib/angular/angular-animate.js"></script>
        <script src="/ayushman/assets/app/lib/angular/angular-cookies.js"></script>
        <script src="/ayushman/assets/app/lib/angular/angular-resource.js"></script>
        <script src="/ayushman/assets/app/lib/angular/angular-route.js"></script>
        <script src="/ayushman/assets/app/js/app.js"></script>
        <script src="/ayushman/assets/app/js/directives.js"></script>
        <script src="/ayushman/assets/app/js/createDialog.js"></script>
        <script src="/ayushman/assets/app/js/controllers/notificationctrl.js"></script>
        <script src="/ayushman/assets/app/js/controllers/visitsctrl.js"></script>
        <script src="/ayushman/assets/app/js/services/emrservice.js"></script>
        <script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
        <script src="/ayushman/assets/app/js/controllers/visitqueryctrl.js"></script>
        <script src="/ayushman/assets/app/js/services/xmppservice.js"></script>
		<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">

            <style type="text/css">
                a:link {
                color: #054471;}
        .text{
                font-family:Arial, Helvetica, sans-serif;
            font-size:10px;
            color:#054471;
            text-align:center;
            vertical-align:middle;
            font-weight:500;
            line-height: 7.5pt;
        }
            </style>
            <style type="text/css">
                td.content_td_maximize{
                border: 1px solid rgba(0,0,0,0.5);
            border-radius: 2px 2px 2px 2px;
            background: #ffffff;
            width:auto; height:1000px; position:absolute; vertical-align:top;float:left;top:3px;
        }
        td.content_td_minimize{
                width:83%; height:90%; position:relative; vertical-align:top;
        }
        .ui-autocomplete { height: 250px; overflow-y: scroll; overflow-x: hidden;}
        .ui-menu .ui-menu-item a {
                font-size:12px;
            display: block;
            line-height: 14px;
            padding: 0.2em 0.4em;
            text-decoration: none;
        }
        .ui-jqgrid .ui-jqgrid-bdiv {
                position: relative;
            margin: 0em;
            padding:0;
            /*overflow: auto;*/
            overflow-x:hidden;
            overflow-y:auto;
            text-align:left;
        }
        @media only screen and (max-width : 900px) and (min-width : 799px) {
            .iframe-content-width {
                width: 74% !important;
            }
        }
        @media only screen and (max-width : 800px) and (min-width : 768px) {
            .iframe-content-width {
                width: 83% !important;
            }
        }
        @media screen and (max-width: 980px) {
            .container-ipad-width {
                width: 100% !important;
            }
        }
        @media screen and (max-width: 360px) {
            .header-info {
                width: 224px !important;
                display: inline-block;
                margin: 0 auto;
                position: absolute !important;
            }
        }
            </style>
            <script type="text/javascript">

                function showroles() {
                document.getElementById("roles").classList.toggle("show");
            }
            function getInternetExplorerVersion() {
                var rv = -1; // Return value assumes failure.

                if (navigator.appName == 'Microsoft Internet Explorer') {
                var ua = navigator.userAgent;
                var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");

                if (re.exec(ua) != null) {
                rv = parseFloat( RegExp.$1 );
            }
            }
            return rv;
            }

            function checkVersion() {
                if (navigator.appName == 'Microsoft Internet Explorer') {
                var msg = "You're not using Internet Explorer.";
                var ver = getInternetExplorerVersion();

                if ( ver > -1 ) {
                if ( ver >= 9.0 ) {
                msg = "You're using a recent copy of Internet Explorer."
            }
                else {
                msg = "You should upgrade your copy of Internet Explorer.";
            window.location.href="/ayushman/cerror/browsers";
            }
            }
            }else if(navigator.appName == 'Netscape'){

            }else {
                window.location.href = "/ayushman/cerror/browsers";
            }
            }
            </script>
            <script type="text/JavaScript">
                //	getcontent();
                function getieversion()
                {
                var nAgt = navigator.userAgent;
                var ieversion="";
                verOffset=nAgt.indexOf("MSIE");
                fullVersion = nAgt.substring(verOffset+5);
                fullVersion = fullVersion.split(';');
                ieversion = fullVersion[0];
                return ieversion;
            }
            function openDialog(url, width, height,obj){
                $.fancybox({
                    'width': width,
                    'height': height,
                    'autoScale': false,
                    'transitionIn': 'fade',
                    'transitionOut': 'fade',
                    'type': 'iframe',
                    'href': url,
                    'showCloseButton': true,
                    'afterClose' : function(){
                        if(obj != undefined){
                            if(obj.fancyboxclosed != undefined){
                                obj.fancyboxclosed(obj);
                            }
                        }
                    }
                });
        }
        function openPdfDialog(url, width, height,obj){
                $.fancybox.open({
                    href : url,
                    type : 'iframe',
                    iframe: {
                        preload : false
                    },
                    'width'		: width,
                    'height'		: height
                });
        }
        function getcontent(src)
                {
                    $('#icontent').animate({'height':500})
                if (navigator.appName == 'Microsoft Internet Explorer') {
                window.frames[0].document.execCommand('Stop');
            }else if(navigator.appName == 'Netscape'){
                window.frames[0].document.execCommand('Stop');

            }else{
                window.frames[0].stop();
            }
            $(".ui-dialog-titlebar").hide();
            $('.selector').dialog({ position: 'top' });
            $('#loading').dialog("open");
            $('#icontent').attr('src',window.location.protocol+"//"+window.location.hostname+":"+window.location.port+src);
            /*if($('#icontent').contents().get(0).location.href.indexOf('cemrdashboard') != -1 || $('#icontent').contents().get(0).location.href.indexOf('cemrdashboard/view') != -1)
             {
             maximizeframe('maximize');
             }else{
             maximizeframe('minimize');
             }*/
            /*$.ajax({
             url: "/ayushman/csessionhandler/removefollowuplink",
             success: function( data ) {

             },
             error : function(){
             }
             });*/
        }
        function MM_preloadImages() { //v3.0
                var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
        }

        function MM_swapImgRestore() { //v3.0
                var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
        }

        function MM_findObj(n, d) { //v4.01
                var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
            if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
            if(!x && d.getElementById) x=d.getElementById(n); return x;
        }

        function MM_swapImage() { //v3.0
                var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                    if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
        }

            </script>
            <script  type="text/javascript">
                var servername = '<?= $arr_xmpp["servername"]; ?>';
                var user_id = '<?= $objuser->id ?>';
                var xmpp_pass = '<?= $objuser->xmpppassword_c ?>';

                var TimerID = null;
                var xmppclient = null;
                var helper = null;
                function changestatus(status){
                if(helper.isConnected != false)
                    xmppclient.changestatus(status);
            }
            function Confirmation_Event(id,confirmation)
                {
                if(id == 'connecttocall')
                {
                if(confirmation == 'yes')
                {
                    getcontent('/ayushman/cemrdashboard/view?appid='+$('#connectappid').val().split('-')[0]+'&role=pat&name=patient');
                }else if(confirmation == 'no')
                {
                    sendmsgfromtemplate('connecttocallrejected',$('#connectappid').val().split('-')[1]);
                }
            }
            if(id == 'connecttocallasrelative')
                {
                if(confirmation == 'yes')
                {
                    sendmsgfromtemplate('relativeaccepted',$('#connectrelativeappid').val().split('-')[1]);
                    getcontent('/ayushman/cemrdashboard/view?appid='+$('#connectrelativeappid').val().split('-')[0]+'&role=relative&name=relative');
                }else if(confirmation == 'no')
                {
                    sendmsgfromtemplate('relativerejected',$('#connectrelativeappid').val().split('-')[1]);
                }
            }
        }

        $(document).ready(function() {
                //checkVersion();
                getcontent("<?= $url; ?>");
            var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
            if(is_chrome)
                {
                    document.getElementById('chromeabsent').innerHTML = "";
            }
            else
                {
                    document.getElementById('chromeabsent').visible = true;
            }
            var role="<?php echo $urole ?>";

            if(role=="patient")
                {
                    $("#Helps").show();
            }
            else
                {

                    $("#Helps").hide();
            }
            var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
            var eventer = window[eventMethod];
            var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
            eventer(messageEvent,function(e) {

            },false);

            //Initialize xmpp and connect
            if(xmppclient == null){
                xmppclient = new xmpp();
                xmppclient.callback = helper;
                helper ={
                connected: function () {
                this.isConnected = true;
                    },
                    isConnected : false,
                    connectionStatus: 'started',
                    jidwithpresence : new Array(),
                    presence: function (jid,presence) {
                jid = jid.replace('@','-');
                        this.jidwithpresence[jid.split('-')[0]] = presence;
                        setPresenceToJID(jid,presence);
                        setpresenceiniframe();
                    },
                    message: function(message){
                if(message.indexOf('Query') != -1){
                angular.bootstrap(document, ['app']);
                        }
                        if(message.indexOf('calling') != -1){
                $('#connectappid').val(message.split('-')[1] +'-'+message.split('-')[2]);
                            if(($('#icontent').contents().get(0).location.href.indexOf('cemrdashboard/view') == -1)){
                showMessage('250','50','Calling.......','Doctor is connected to appointment and waiting for you.<br/> Do you want to connect to the conference?','confirmation','connecttocall');
                            }else{
                showNotification('400','70','Connected...','Doctor is connected to conference','timer','timernotification',2000);
                            }
                        }
                        else if(message.indexOf('inviting') != -1){
                $('#connectrelativeappid').val(message.split('-')[1] +'-'+message.split('-')[2]);
                            showMessage('250','50','Calling.......','Doctor is inviting you to join an ongoing consultation.<br/> Do you want to connect to the conference?','confirmation','connecttocallasrelative');
                        }
                        else if(message.indexOf('connecttocallrejected') != -1){
                //showNotification('400','70','Rejected...','Patient rejected the call.','timer','timernotification',2000);
                document.getElementById('icontent').contentWindow.msg_handler("Rejected Call");
                        }
                        else if(message.indexOf('relativerejected') != -1){
                document.getElementById('icontent').contentWindow.msg_handler("Relative Rejected Call");
                        }
                        else if(message.indexOf('relativeaccepted') != -1){
                document.getElementById('icontent').contentWindow.msg_handler("Relative Accepted Call");
                        }
                        else{
                document.getElementById('icontent').contentWindow.checkmsg(message);
                        }
                    },
                    response: function(response, id)
                {
                    document.getElementById('icontent').contentWindow.responseHandler(response, id);
                    },
                    disconnected :function (){
                this.isConnected = false;
                        this.jidwithpresence['<?= $objuser->id ?>'] = 'offline';
                        setPresenceToJID('<?= $objuser->id ?>-<?= $arr_xmpp["servername"]; ?>','offline');
                        this.connectionStatus = 'started';
                        connectxmpp();
                        resetxmppstatus();
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
                };
                xmppclient.init(helper);
                connectxmpp();
            }
        });
        function pagebusy(){
                $("body").css("cursor", "wait");
            $(".ui-dialog-titlebar").hide();
            $('#loading').dialog("open");
        }
        function pageloaded(){
                $('#loading').dialog("close");
            $(".ui-dialog-titlebar").hide();
            $("body").css("cursor", "default");
        }
        function setPresenceToJID(jid,presence)
                {
                    elements = document.getElementsByTagName('img');
            for(var i=0; i<elements.length;i++)
                {
                if((elements[i].id == 'img_presence_'+jid.split('-')[0]) && (presence == 'online'))
                    elements[i].src = "/ayushman/assets/images/online.gif";
                if((elements[i].id == 'img_presence_'+jid.split('-')[0]) && (presence == 'offline'))
                    elements[i].src = "/ayushman/assets/images/offline.gif";
                if((elements[i].id == 'img_presence_'+jid.split('-')[0]) && (presence == 'busy'))
                    elements[i].src = "/ayushman/assets/images/busy.png";
                if((elements[i].id == 'img_presence_'+jid.split('-')[0]) && (presence == 'conference'))
                    elements[i].src = "/ayushman/assets/images/conference.png";
            }
            setpresenceiniframe();
        }
        function resetxmppstatus()
                {
                for (jid in helper.jidwithpresence)
                {
                var myIFrame = document.getElementById('icontent');
                elements = myIFrame.contentWindow.document.getElementsByTagName('img');
                for(var i=0; i<elements.length;i++)
                {
                if(elements[i].id == 'img_presence_'+jid)
                    elements[i].src = "/ayushman/assets/images/offline.gif";
            }
        }
    }
    function showhelp()

                {
                    $("#helppanel").toggle("fast");
        }
        function closehelp()
                {
                    $("#helppanel").hide("fast");
        }
        function setpresenceiniframe()
                {
                for (x in helper.jidwithpresence)
                {
                var myIFrame = document.getElementById('icontent');
                elements = myIFrame.contentWindow.document.getElementsByTagName('img');
                jid = x;
                presence = helper.jidwithpresence[x];
                for(var i=0; i<elements.length;i++)
                {
                if((elements[i].id == 'img_presence_'+jid) && (presence == 'online'))
                    elements[i].src = "/ayushman/assets/images/online.gif";
                if((elements[i].id == 'img_presence_'+jid) && (presence == 'offline'))
                    elements[i].src = "/ayushman/assets/images/offline.gif";
                if((elements[i].id == 'img_presence_'+jid) && (presence == 'busy'))
                    elements[i].src = "/ayushman/assets/images/busy.png";
                if((elements[i].id == 'img_presence_'+jid) && (presence == 'conference'))
                    elements[i].src = "/ayushman/assets/images/conference.png";
            }
        }
    }

    function  sendmsgfromtemplate(messagebody,jid){
                xmppclient.sendMsg(jid+'@<?= $arr_xmpp["servername"]; ?>',messagebody);
        }

        function  mustsendmsgfromtemplate(messagebody,jid,msgid){
                xmppclient.mustSendMsg(jid+'@<?= $arr_xmpp["servername"]; ?>',messagebody,msgid);
        }

        function connectxmpp(){
                clearTimeout(TimerID);
            switch(helper.getstatus())
                {
                case 'started':
                    clearTimeout(TimerID);
                    TimerID = self.setTimeout('connectxmpp();',1000);
                    helper.connectionStatus = 'connect';
                    break;
                case 'connect':
                    clearTimeout(TimerID);
                    var url = window.location.protocol+'//'+window.location.hostname+':5280/http-bind';
                    xmppclient.connect(url,'<?= $arr_xmpp["servername"]; ?>','<?= $objuser->id ?>','<?= $objuser->xmpppassword_c ?>',false);
                    break;
                case 'connected':
                    clearTimeout(TimerID);
                    TimerID = self.setTimeout('connectxmpp();',15000);
                    helper.connectionStatus = 'connected';
                    break;
                case 'disconnected':
                    clearTimeout(TimerID);
                    TimerID = self.setTimeout('connectxmpp();',6000);
                    helper.connectionStatus = 'connect';
                    break;
                default :
                    clearTimeout(TimerID);
                    TimerID = self.setTimeout('connectxmpp();',6000);
                    break;
            }
        }
            </script>
            <script type="text/javascript">
                function logoutnow(){
                window.location.href="/ayushman/cuser/logout";
            }
            $(window).unload(function() {
                xmppclient.quit();
            });

            function iframeloaded()
                {
                if($('#icontent').contents().get(0).location.href.indexOf('cemrdashboard') != -1 )
                {
                    changestatus('busy');
            maximizeframe('maximize');
            }else if($('#icontent').contents().get(0).location.href.indexOf('cemrdashboard/view') != -1){
                changestatus('conference');
            maximizeframe('maximize');
            }
            else if($('#icontent').contents().get(0).location.href.indexOf('cconsultation') != -1 )
                {
                    changestatus('busy');
            maximizeframe('maximize');
            }else if($('#icontent').contents().get(0).location.href.indexOf('cconsultation/view') != -1){
                changestatus('conference');
            maximizeframe('maximize');
            }else{
                changestatus('online');
            maximizeframe('minimize');
            }
            $('#loading').dialog("close");
            if(helper.isConnected)
                {
                    setpresenceiniframe();
            }
            }
            maximizeframe = function(message) {
                if(message == 'maximize')
                {
                var width = ((0.99)*($(window).width()))+"px";
                var height = ((0.9)*($(window).height()))+"px";
                document.getElementById("content_td_frame").style.height="545px";
                document.getElementById("content_td_frame").style.width=width;
                document.getElementById("contenttable").style.height="620px";
                document.getElementById("contenttable").style.width=width;
                document.getElementById("icontent").style.height="620px";
                document.getElementById("icontent").style.width=width;
                $('#tableclass').removeAttr('class');
                $('#footerHead').hide();
                $('#footerBody').hide();
                $('#breadcrumb').hide();
                $('#menu').hide();

                }else if(message == 'minimize'){
                $('#tableclass').attr('class','');
            //document.getElementById("content_td_frame").style.height="90%";
            //document.getElementById("content_td_frame").style.width="83%";
            //document.getElementById("contenttable").style.height="auto";
            //document.getElementById("contenttable").style.width='1000px';
            document.getElementById("icontent").style.position="relative";
            //document.getElementById("icontent").style.float='center';
            document.getElementById("icontent").style.top='0px';
            document.getElementById("icontent").style.left='0px';
            //document.getElementById("icontent").style.height='450px';
            //document.getElementById("icontent").style.width='830px';
            $('#menu').show();
            $('#footerHead').show();
            $('#footerBody').show();
            $('#breadcrumb').show();
            // sizeIFrame();
            setIframeHeight(document.getElementById('icontent'));
            }
            }
            function setIframeHeight(iframe) {
                ieversion = getieversion();
            nAgt = navigator.userAgent;
            var targetlen;
            if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
                if (iframe) {
                var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
                if (iframeWin.document.body) {
                iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
            //alert(iframe.height);
            var helpFrame = jQuery("#icontent");
            helpFrame.height(Number(iframe.height)+Number(10));
            }
            }
            }else{
                sizeIFrame();
            /*var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
             if (iframeWin.document.body) {
             iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
             var helpFrame = jQuery("#icontent");
             helpFrame.height(Number(iframe.height)+Number(10));
             }*/
            }
            };
            function sizeIFrame() {
                var helpFrame = jQuery("#icontent");
                var innerDoc = (helpFrame.get(0).contentDocument) ? helpFrame.get(0).contentDocument : helpFrame.get(0).contentWindow.document;
                //helpFrame.height(innerDoc.body.scrollHeight);
                setIframeHeightInPx(innerDoc.body.scrollHeight);
                }
                function setIframeHeightInPx(height) {
				if(height < 700){
                $('#icontent').animate({'height':'700'});
            }else{
                $('#icontent').animate({'height':height});
            }
            }


            $(function(){



                $("#loading").hide();
            var currenturl=window.location.href;
            // Dialog
            $('#dialog').dialog({
                autoOpen: false,
                show: "blind",
                hide: "explode",
                width: "auto",
                modal: true,
                height: "auto",
                resize: "auto",
                resizable: false,
                width: 600,
                buttons: {
                "Submit": function() {
                $.ajax({
                    type: "POST",
                    data: $("#feedbacktext").serialize(),
                    url: "/ayushman/cfeedback/savefeedback?&currenturl="+currenturl,
                    success: function() {
                        $('#loading').dialog('close');
                        window.location.reload();
                    }
                });
            $(this).dialog("close");
            $('#loading').dialog('open');
            },
            "Cancel": function() {
                $(this).dialog("close");

            }
            }
            });

            $('#loading').dialog({
                autoOpen: false,
                show: "fade",
                hide: "fade",
                modal: true,
                height: "30",
                resizable: false,
                width: "100px"
            });



            // Dialog Link
            $('#feedback_link').click(function(){
                $('#dialog').dialog('open');
            $('#dialog').focus();
            return false;
            });

            /*$(".right-nemu").click(function () {
             $("#demo").show("slow");
             });

             $('body').click( function() {
             e.stopPropagation();
             $('#demo').hide("slow");
             });*/

            // Hide all the elements in the DOM that have a class of "box"


            // Make sure all the elements with a class of "clickme" are visible and bound
            // with a click event to toggle the "box" state
            $('.right-nemu').each(function() {
                $(this).show(0).on('click', function(e) {
                    // This is only needed if your using an anchor to target the "box" elements
                    e.preventDefault();

                    // Find the next "box" element in the DOM
                    $(this).next('#right-menu').slideToggle('fast');
                });
            });


            });


            </script>

</head>
<body style="margin: 0;padding: 0;">
<div id="chromeabsent" class="bodytext_normal" style="display:none;vertical-align:top;width:100%;z-index:1005;float:middle;top:1px;position:absolute;" align="center"  ><span style="border:2px solid #f0c36d;background-color:#f9edbe;" ><a href="#" onclick="var win=window.open('http://www.google.com/chrome/', '_blank');  win.focus();"><strong>&nbsp;&nbsp;Works best with chrome browser.&nbsp;&nbsp;</strong></a></span></div>
<div id="javascriptenabled" class="bodytext_normal" style="vertical-align:top;width:100%;z-index:1005;float:middle;top:1px;position:fixed;" align="center"  >
    <noscript>
			<span style="border:2px solid #f0c36d;background-color:#f9edbe;padding:10px;"  >
				<strong> For full functionality of this site, it is necessary to enable JavaScript. Please enable javascript and refresh</strong>
			</span>
        <style type="text/css"> #body { display:none; } </style>
    </noscript>
</div>


<div class="top-header">
    <div class="col-xs-2 left-menu-btn" style="padding: 0 !important">

    </div>
    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-8 header-info">
        <a class="top-logo" href="/ayushman/cdashboard/view">
            <img border="0" src="/ayushman/assets/images/Logo.png" width="165" height="33">
                <span> India online health </span>
        </a>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 user-logout-icon">
        <button type="button" class="right-nemu">
            <img src="/ayushman/assets/images/user.png" />
        </button>
        <div id="right-menu" class="right-menu-section">
            <div class="pull-left welcome-user"><span class="bodytext_normal welcome-section">Welcome&nbsp;<img id="img_presence_<?= $objuser->id; ?>" src="/ayushman/assets/images/offline.gif" name="presence" />&nbsp;<?= $user.' '.$objuser->lastname_c.' [IOH ID : '.$objuser->id.']'; ?></span>&nbsp;</div>
            <div class="links-section">
                <ul>
                    <li><div class="notifications-section" xmlns:ng="http://angularjs.org" id="ng-app" ng-app="app" ng-strict-di><notifications></notifications></div></li>
                    <li><img src="/ayushman/assets/images/help_new.png" /><a href="javascript://" onclick="showhelp();"><strong> Help </strong></a></li>
                    <li><img src="/ayushman/assets/images/feedback-new.png" /><a href="javascript://" id="feedback_link"><strong>Feedback</strong></a></li>
                    <li><img src="/ayushman/assets/images/logout.png" /><a href="javascript://" onclick="logoutnow();"><strong>Log Out</strong></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>




<!--<table border="0" cellpadding="0" cellspacing="0"  style="vertical-align:top;height:36px;z-index:1000; margin: 0;padding: 0;width: 100%;background:url('/ayushman/assets/images/headerimage.png');background-repeat:repeat-x;float:center;top:0px;position:fixed;">
    <tr >
        <td style="vertical-align:top;">
            <table  width="1000px" border="0" cellspacing="0" cellpadding="0" align="center" >
                <tr>
                    <td width="178" align="center"><a href="/ayushman/cdashboard/view"><img border="0" src="/ayushman/assets/images/Logo.png" width="165" height="33"></a></td>
                    <td width="720">
                        <div style="float:right; padding-right:5px;  padding-top: 10px;" ><span class="bodytext_normal">Welcome&nbsp;<img id="img_presence_<?= $objuser->id; ?>" src="/ayushman/assets/images/offline.gif" name="presence" />&nbsp;<?= $user.' '.$objuser->lastname_c.' [IOH ID : '.$objuser->id.']'; ?></span>&nbsp;</div>

                        <div style="float:right;  padding-right: 15px;position:absolute;right: 50%;  top: -4px;" xmlns:ng="http://angularjs.org" id="ng-app" ng-app="app" ng-strict-di><notifications></notifications></div>

                    </td>
                    <td width="120" align="right" valign="middle" class="bodytext_normal">
                        <a href="#" onclick="logoutnow();"><strong>Log Out</strong>&nbsp;&nbsp;|&nbsp;&nbsp;</a><a href="#" id="feedback_link"><strong>Feedback</strong></a>
                    </td>
                    <td id="Helps">
                        <img id="help" style="cursor:pointer" name="help" src="/ayushman/assets/images/help.png"  height="38" onclick="showhelp();" />
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>-->


<div id="body">
    <div id="helppanel" style="z-index: 5;border: 2px solid rgb(21, 110, 142);width: 645px;position: fixed;float: right;right: 8px;display: none;background: white;">
        <div style="color: #11587E;">
            <h1 style="padding-left: 25px;">Getting Started</h1>
            <div style="padding-left: 10px;">This image shows you how easy it is to get started here.</div>
            <div style="padding-left: 10px;">Just click on the steps one by one and we'll take you there.</div>
            </div>
            <table id="Table_01" width="480" height="262" border="0" cellpadding="0" cellspacing="0" style="padding-left:15%;">
                <tr>
                    <td >&nbsp;</td>
                    <td align="right" style="float: right;margin-right: -442px;"><a href="#" name="xy" style="color:white;"  onclick="closehelp()"><img src="/ayushman/assets/images/closed.png" width="27" height="25" border="0" style="margin-top: -116px;" /></a></td>
                </tr>
                <tr>
                    <td colspan="12">
                        <img src="/ayushman/assets/images/HowItWorks_01.png" width="479" height="21" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="1" height="21" alt=""></td>
                </tr>
                <tr >
                    <td rowspan="6">
                        <img src="/ayushman/assets/images/HowItWorks_02.png" width="14" height="240" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cplanmanager/showselectedplan');" style="cursor:pointer" class="text">Choose Plan</td>
                    <td  colspan="2" rowspan="4">
                        <img src="/ayushman/assets/images/HowItWorks_04.png" width="31" height="139" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cdoctordirectory/view');"colspan="2" style="cursor:pointer" class="text">Create your Panel of Doctor</td>
                    <td colspan="2" rowspan="4">
                        <img src="/ayushman/assets/images/HowItWorks_06.png" width="27" height="139" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cappointmenteditor/bookappointment');" style="cursor:pointer" class="text">Fix appoitment with your doctor</td>
                    <td colspan="3" rowspan="2">
                        <img src="/ayushman/assets/images/HowItWorks_08.png" width="128" height="30" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="1" height="26" alt=""></td>
                </tr>
                <tr>
                    <td onclick="closehelp();getcontent('/ayushman/cplanmanager/showselectedplan');" rowspan="5">
                        <img src="/ayushman/assets/images/HowItWorks_09.png" width="93" height="214" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cdoctordirectory/view');" colspan="2" rowspan="3">
                        <img src="/ayushman/assets/images/HowItWorks_10.png" width="93" height="113" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cappointmenteditor/bookappointment');" rowspan="3">
                        <img src="/ayushman/assets/images/HowItWorks_11.png" width="93" height="113" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="1" height="4" alt=""></td>
                </tr>
                <tr>
                    <td rowspan="4">
                        <img src="/ayushman/assets/images/HowItWorks_12.png" width="20" height="210" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cpatientdashboard/view');"class="text" style="cursor:pointer">Consult your Doctor Online / In clinic</td>
                    <td rowspan="4">
                        <img src="/ayushman/assets/images/HowItWorks_14.png" width="11" height="210" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="1" height="26" alt=""></td>
                </tr>
                <tr>
                    <td onclick="closehelp();getcontent('/ayushman/cpatientdashboard/view');" rowspan="3">
                        <img src="/ayushman/assets/images/HowItWorks_15.png" width="97" height="184" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="1" height="83" alt=""></td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <img src="/ayushman/assets/images/HowItWorks_16.png" width="23" height="101" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cpatientrequistiontests/view');"class="text" style="cursor:pointer" colspan="2" class="text">Place order for <br>
                        Diagnostic tests</td>
                    <td colspan="2" rowspan="2">
                        <img src="/ayushman/assets/images/HowItWorks_18.png" width="27" height="101" alt=""></td>
                    <td onclick="closehelp();getcontent('/ayushman/cpatientmedicines/view');"class="text" style="cursor:pointer" colspan="2" class="text">Place order for <br>
                        Medicines</td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="1" height="26" alt=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <img src="/ayushman/assets/images/HowItWorks_20.png" width="97" height="75" alt=""></td>
                    <td colspan="2">
                        <img src="/ayushman/assets/images/HowItWorks_21.png" width="97" height="75" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="1" height="75" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="14" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="93" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="23" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="8" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="89" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="4" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="23" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="4" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="93" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="20" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="97" height="1" alt=""></td>
                    <td>
                        <img src="/ayushman/assets/images/spacer.gif" width="11" height="1" alt=""></td>
                    <td></td>
                </tr>
            </table>

        </div>

        <div id="mainpagetable">

            <div id="breadcrumb" class="container container-ipad-width" >
                <div class="breadcrumb-text">
                    <a class="bodytext_normal">
                        <?= $breadcrumb ?>
                    </a>
                </div>
                <div style="float:right;width:83%;text-align:right;padding-right:7px;" class="bodytext_bold">
                    <!-- <strong><a title="Click Here" href="/ayushman/cayushcaremanager/guide"><img src="/ayushman/assets/images/new-red.jpg" border="0" style="height:13px;" />Ayushman announces special program for senior citizens <em style="color:#090;">AyushCare</em> - a peace of mind for children living away </a></strong>-->
                </div>


            </div>
            <?php if($source != null) { ?>
            <div id = "userInfo" class="table_roundBorder" style = "background-color:#f59e16;" align="middle">
                <label class="bodytext_bold" >You are operating on behalf of <?= $user.' '.$objuser->lastname_c.' [IOH ID : '.$objuser->id.']'; ?></label>
                <a href="/ayushman/cuser/switchToPrimary" class="bodytext_normal">Switch Back</a>
            </div>
            <?php } ?>

            <div id="contenttable" >
                <div id="body_bg8rdpage" align="center">
                    <div class="container container-ipad-width">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 no-padding">
                            <div class="slidemenu">
                                <input type="checkbox" id="menuBtn" />
                                <label class="menu__button" for="menuBtn"></label>
                                <label class="menu__close" for="menuBtn"></label>
                                <div class="menu">
                                    <div class="menu__container">
                                        <nav>
                                            <ul>
                                                <li><?php $filename ="v". $urole."menu.php";include($filename); ?></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="content_td_frame" class="content_td_minimize"  style="padding:0;valign:top;height:auto;">
                            <div id="tableclass">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 right-padding-0 iframe-content-width" style="padding-right:0px;">
                                    <div id="content_div_frame" style="padding-top:0px;vertical-align: top;">
                                        <iframe  frameborder="0" id="icontent" name="icontent" onload="" scrolling="no" frameborder="0px">

                                        </iframe>
                                        <!--<div id="content" style="width:100%;height:100%;margin-top:0px;vertical-align: top;">

                                    </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--	<table border="0" id="footerHead" cellpadding="0" cellspacing="0"  style="vertical-align:top;height30px; margin: 0;padding: 0;width: 100%;">
        <tr>
            <td height="30" bgcolor="#2D7A9E">
                <table width="1000px" border="0" align="center" cellpadding="0" cellspacing="0" style="vertical-align:top;" >
                    <tr>
                        <td>
                            <div id="footer" align="center">

                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="18%" height="30" style="text-align:center;"  class="BlueBandFooterHeading">COMPANY</td>
                                        <td width="18%" valign="right"  style="text-align:center;" class="BlueBandFooterHeading">FAQs</td>
                                        <td width="18%" valign="right"  style="text-align:center;" class="BlueBandFooterHeading">POLICIES</td>
                                        <td width="10%" valign="right" style="text-align:center;"  class="BlueBandFooterHeading">FEEDBACK</td>
                                        <td width="18%" valign="right" style="text-align:center;"  class="BlueBandFooterHeading">CONTACT INFORMATION </td>
                                        <td width="18%" valign="right" style="text-align:center;"  class="BlueBandFooterHeading">About</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
        <table border="0" id="footerBody" cellpadding="0" cellspacing="0"  style="vertical-align:top;height:90px; margin: 0;padding: 0;width: 100%;">
            <tr>
                <td height="90px" bgcolor="#ffffff" style="vertical-align: top;">
                    <table width="1000px" border="0" align="center" cellpadding="0" cellspacing="0" style="vertical-align:top;" >
                        <tr>
                            <td width="18%" height="30" style="text-align:left;vertical-align:top;" class="BlueBandtext" >
                                <table border="0" align="center" cellpadding="0" cellspacing="0" style="vertical-align:top;">
                                    <tr><td width="40%">&nbsp;</td>
                                        <td width="60%"><a href="/ayushman/home/Mission.shtml" class="bodytext_normal">Mission</a><br />
                                            <a href="/ayushman/home/Mission.shtml" class="bodytext_normal">Leaders</a><br />
                                        </td>
                                    </tr></table>
                            </td>
                            <td width="18%" valign="right"  style="text-align:left;vertical-align:top;" class="bodytext_normal">&nbsp;</td>
                            <td width="18%" valign="right"  class="bodytext_normal" style="text-align:center;">
                                <table border="0" align="center" cellpadding="0" cellspacing="0" style="vertical-align:top;text-align:left;">
                                    <tr><td width="40%">&nbsp;</td>
                                        <td width="85%">
                                            <a href="/ayushman/home/Terms of Use.shtml" class="bodytext_normal">Terms of Use</a><br />
                                            <a href="/ayushman/home/Privacy Policy.shtml" class="bodytext_normal">Privacy Policy</a><br />
                                            <a href="/ayushman/home/Return Policy.shtml" class="bodytext_normal">Return Policy</a><br />
                                            <a href="/ayushman/home/Disclaimer.shtml" class="bodytext_normal">Disclaimer</a></td>
                                    </tr>
                                </table>
                            </td>
                            <td width="10%" valign="right"  style="text-align:center;" class="bodytext_normal">&nbsp;</td>
                            <td width="18%" valign="right"  style="text-align:left;padding-left:50px;" class="bodytext_normal" align="left">
                                <span class="bodytext_normal" ><strong>Ayushman Pvt. Ltd.</strong></span><br />
                                5-6/A, Ramyanagari,<br />Bibwewadi,Pune - 411037<br />Tel. &nbsp;&nbsp;&nbsp;: +91 20 2422 5288 <br />Email : <a href="javascript:void(0)">info@indiaonlinehealth.com</a>
                            </td>
                            <td width="18%" align="center" valign="top" class="bodytext_normal">
                                <?php $version = Kohana::$config->load('version'); echo $version['version']; ?><br />
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table> -->
    <?php foreach($styles as $file => $type) { echo HTML::style($file, array('media' => $type)), "";  }?>
    <?php foreach($scripts as $file) { echo HTML::script($file, NULL, TRUE), ""; }?>

        <div id="lzsplash" style="position:absolute;width: 0%; height: 0%;top:0px;display:none;" align="center">
            <p id="lzsplashp">
                <img id="loadstatusimage" src="/ayushman/assets/images/ajax-loader.gif" />
                <br />
                <br />
                <font id="loadstatus" class="statusFont">Please enable JavaScript in order to use this application.</font>
            </p>
        </div>
        <div id="dialog" title="Help us with your feedback"><form id="feedbackid" >
            <table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
                <tr>
                    <td style="width:100%;font-size:10.4pt;" class="bodytext_normal">Comments</td>

                </tr>
                <tr>
                    <td class="bodytext_normal" style="width:100%;height:250px;"><textarea  class="bodytext_normal" id="feedbacktext" name="feedbacktext" style="background-color:white;width:95%;height:240px;resize: none;font-size:12px !important;color:black;" onfocus="this.value = '';" ></textarea></td>

                </tr>
            </table>
        </form>
        </div>


        <div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
            <img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
        </div>
    </div>
</body>
<script type="text/javascript" src="/ayushman/assets/js/jquery.jqGrid.min.js"></script>

</html>

</div>
<div><input id="xmppgridload" name="xmppgridload" type = "hidden"/></div>
<input id="connectappid" name="connectappid" type = "hidden"/>
    <input id="connectrelativeappid" name="connectrelativeappid" type = "hidden"/>
    <div id="message" style="-moz-border-radius: 2px;height:auto; -webkit-border-radius:2px; -khtml-border-radius: 2px; border-radius:2px;font-size:11px;font-family: tahoma,Helvetica,sans-serif;background-color:#ffffff;" >
    <table>
        <tr valign="center">
            <td width="auto" valign="top">
                <div id='icon' style="height:100%;width:100%;background-color:#ffffff;">

                </div>
            </td>
            <td valign="center">
                <div id='content' valign="center" style="valign:center;height:100%;width:100%;" style="font-size:11px;font-family: tahoma,Helvetica,sans-serif;background-color:#ffffff;">

                </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <div id='buttons' style="align:center;height:100%;width:100%;background-color:#ffffff;">

                </div>
            </td>
        </tr>
    </table>
    </div>
