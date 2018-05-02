			function showMessage(width, height,title,message,type,id)
			{
				$id = id;
				if ( $.browser.msie ) {
				
					$('#message').dialog({
						autoOpen: false,
						modal: true,
						height: "auto",
						show:"drop",
						hide: "drop",
						width:  "auto",
						at:"bottom",
						resize: "auto",
						position:['middle',200],
						resizable: false
					});
					$(".ui-dialog-titlebar").hide();
					$('#message').dialog( "option", "position", "center" );
				}else{
				
					$('#message').dialog({
						autoOpen: false,
						modal: true,
						height: "auto",
						show:"drop",
						hide: "drop",
						width: "auto",
						at:"bottom",
						resize: "auto",
						position:['middle',200],
						resizable: false
					});
					$(".ui-dialog-titlebar").hide();
					$('#message').dialog( "option", "position", "center" );
				}
				
				if(type == "error")
				{	
					$('#message').dialog({title:"Error : "+title});
					$('#message').find('#heading').html('<div class="bodytext_bold">&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;&nbsp;Error<img src="/ayushman/assets/images/Close_Icon.png" style="float:right; height:15px; width:15px;vertical-align:center;" onclick=$("#message").dialog("close"); ></img></div>');

					$('#message').find('#content').html(message);
					$('#message').find('#icon').html('<img src="/ayushman/assets/images/error_large.png"/>');
					$('#message').find('#buttons').html('<input type="button" onclick=$("#message").dialog("close"); style="height:25px; width:100px;" class="button" value="Ok" />');
					// $('#message').click(function(){
						// $('#message').dialog('close');
						// return false;
					// });					
				}else if(type == "information")
				{	
					$('#message').dialog({title:"Info : "+title});
					$('#message').find('#heading').html('<div class="bodytext_bold">&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;&nbsp;Information<img src="/ayushman/assets/images/Close_Icon.png" style="float:right; height:15px; width:15px;vertical-align:center;" onclick=$("#message").dialog("close"); ></img></div>');

					$('#message').find('#icon').html('<img src="/ayushman/assets/images/info.png"/>');
					$('#message').find('#buttons').html('<input type="button" class="button" onclick=$("#message").dialog("close"); style="height:25px; width:100px;" value="Ok" />');
				}else if(type == "warning")
				{	
					$('#message').dialog({title:"Warning : "+title});
					$('#message').find('#heading').html('<div class="bodytext_bold">&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;&nbsp;Warning<img src="/ayushman/assets/images/Close_Icon.png" style="float:right; height:15px; width:15px;vertical-align:center;" onclick=$("#message").dialog("close"); ></img></div>');

					$('#message').find('#icon').html('<img src="/ayushman/assets/images/warning-icon.png"/>');
					$('#message').find('#buttons').html('<input type="button" class="button" onclick=$("#message").dialog("close"); style="height:25px; width:100px;" value="Ok" />');
				}else if(type == "confirmation")
				{	
					$('#message').dialog({title:"Confirmation : "+title});
					$('#message').find('#heading').html('<div class="bodytext_bold">&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;&nbsp;Confirmation<img src="/ayushman/assets/images/Close_Icon.png" style="float:right; height:15px; width:15px;vertical-align:center;" onclick=$("#message").dialog("close"); ></img></div>');
					$('#message').find('#icon').html('<img src="/ayushman/assets/images/question-icon.png"/>');
					$('#message').find('#buttons').html('<input type="button" class="button" onclick=closeDialog($id,"no"); style="height:23px; width:100px;" value="No" />&nbsp;&nbsp;<input type="button" class="button" onclick=closeDialog($id,"yes"); style="height:23px; width:100px;" value="Yes" />&nbsp;&nbsp;');
				}else if(type == "done")
				{	
					$('#message').dialog({title:"Done successfully : "+title});
					
					$('#message').find('#heading').html('<div class="bodytext_bold">&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;&nbsp;Success<img src="/ayushman/assets/images/Close_Icon.png" style="float:right; height:15px; width:15px;vertical-align:center;" onclick=$("#message").dialog("close"); ></img></div>');

					$('#message').find('#icon').html('<img src="/ayushman/assets/images/ok.png"/>');
					$('#message').find('#buttons').html('<input type="button" class="button" onclick=$("#message").dialog("close"); style="height:25px; width:100px;" value="Ok" />');
				}else if(type == "choose")
				{	
					$('#message').dialog({title:"Done successfully : "+title});
					$('#message').find('#heading').html('<div class="bodytext_bold">&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;&nbsp;Select <img src="/ayushman/assets/images/Close_Icon.png" style="float:right; height:15px; width:15px;vertical-align:center;" onclick=$("#message").dialog("close"); ></img></div>');

					$('#message').find('#icon').html('<img src="/ayushman/assets/images/ok.png"/>');
					$('#message').find('#buttons').html('<input type="button" class="button" onclick=closeDialog($id,"yes"); style="height:25px; width:100px;" value="Ok" />');
				}
				$('#message').css({'font-size':'11px'});
				clearTimeout(t);
				$('#message').find('#content').html(message);
				$('#message').find('#content').css({valign:'center','font-size':'11px','font-family': 'tahoma,Helvetica,sans-serif'});
				$('#message').find('#content').height(height);
				$('#message').find('#content').width(width);
				$('#message').dialog('open');
				$('#message').dialog( "option", "zIndex", 3999 );
				$('#message').dialog( "option", "stack", true );
				$('#message').focus();
			}
			var t;
			function showNotification(width, height,title,message,type,id,miliseconds)
			{
			
				if ( $.browser.msie ) {
				
					$('#notification').dialog({
						autoOpen: false,
						modal: true,
						height: "'"+Number(height+30)+"px'",
						show:"fade",
						hide: "fade",
						width: Number(width+100)+"px'",
						title:"Notification",
						at:"center",
						resize: "auto",
						resizable: false
					});
					
				}else{
				
					$('#notification').dialog({
						autoOpen: false,
						modal: true,
						height: "auto",
						show: "fade",
						hide: "fade",
						width: "auto",
						at:"center",
						resize: "auto",
						resizable: false
					});
				}
				$('#notification').dialog( "option", "height", 100);
				$(".ui-dialog-titlebar").hide();
				if(type == 'timer')
				{
					$('#notification').find('#notificationicon').html('<img src="/ayushman/assets/images/waiting.png"/>');
				}
				else
				{
					$('#notification').find('#notificationicon').html('<img src="/ayushman/assets/images/notification_icon.png"/>');
				}
				//$('#notification').dialog('close');
				$('#notification').find('#buttons').html('');
				$('#notification').css({border:'2px solid',valign:'center', borderColor:'#FFA500',padding:'5px'});
				$('#notification').dialog( "option", "position", "center" );
				$('#notification').dialog( "option", "modal", false );
				clearTimeout(t);
				t = setTimeout("$('#notification').dialog('close');", miliseconds);
				$('#notification').find('#notificationcontent').html(message);
				$('#notification').find('#notificationcontent').css({valign:'center','font-size':'11px','font-family': 'tahoma,Helvetica,sans-serif'});
				$('#notification').find('#notificationcontent').height(height);
				$('#notification').find('#notificationcontent').width(width);
				$('#notification').dialog('open');	
				$('#notification').dialog( "option", "zIndex", 3999 );
				$('#notification').dialog( "option", "stack", true );
				$('#notification').focus();
			}
			function closeDialog(id,confirmation)
			{
				$("#message").dialog("close");
				Confirmation_Event(id,confirmation);
			}
