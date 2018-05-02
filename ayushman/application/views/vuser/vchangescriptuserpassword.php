<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(function(){
			var username = new LiveValidation('username',{onlyOnSubmit: true });
			username.add( Validate.Length, { minimum: 4} );
			username.add( Validate.Length, { maximum: 32} );
			username.add( Validate.Presence );		
					
			var oldpassword = new LiveValidation('oldpassword',{onlyOnSubmit: true });
			oldpassword.add( Validate.Length, { minimum: 8} );
			oldpassword.add( Validate.Length, { maximum: 20} );
			oldpassword.add( Validate.Presence );		
					
			var password = new LiveValidation('password',{onlyOnSubmit: true });
			password.add( Validate.Length, { minimum: 8} );
			password.add( Validate.Length, { maximum: 20} );
			password.add( Validate.Presence );
		
			var password_confirm = new LiveValidation('password_confirm', {onlyOnSubmit: true });
			password_confirm.add( Validate.Confirmation, { match: 'password' } );
			password_confirm.add( Validate.Length, { minimum: 8} );
			password_confirm.add( Validate.Length, { maximum: 20} );
			password_confirm.add( Validate.Presence );
			
			
			$("#loading").hide();
						
				
				var name="<?php echo $objuser->Firstname_c; ?>";
				var newusername, usernamestring,returnstring;
				usernamestring="Here are some suggestions.<br/>";
				if(name!="")
				{
					
					$( "#loading" ).dialog({ modal: false });
					$('#loading').dialog('open');
					var count =1;
					var ischeck= 0;
					while (count< 4)
					{
						switch(ischeck)
						{
							case 0:newusername = "<?php echo $objuser->Firstname_c ?>";
								break;
							
							default:var randumNumber=Math.floor((Math.random()*1000)+1);
								newusername = "<?php echo $objuser->Firstname_c ?>"+randumNumber;
								break;
						}
						returnstring = findusername(newusername);
						newusername = newusername.toLowerCase();
						if (returnstring == "valid")
						{
							usernamestring = usernamestring+" <a onclick='selectedname(this)' style='cursor:pointer;'>"+newusername+"</a><br/>";
							count ++;
						}
						ischeck++;
					}
					
					document.getElementById("possiblenames").innerHTML=usernamestring;
					
				}
				
				document.getElementById("firsttime").value="true";
				if($.trim($('#errorlistdiv').html()) != "")
					showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			
				
			});
			
			function checkUsername(username)
			{
				
				$("#loading").siblings('div.ui-dialog-titlebar').remove();
				$( "#loading" ).dialog({ modal: false });
				$('#loading').dialog('open');
				
				$.ajax({
					url: "/ayushman/cregistrar/checkusernameavailability?username="+username.value,
					success: function(data) {
						$('#loading').dialog('close');
						if(data=="invalid"){
							document.getElementById("usernameerror").style.display = "block";
						}
						else{
							document.getElementById("usernameerror").style.display = "none";
							$('#country').focus();
						}
						$( "#loading" ).dialog({ modal: true });
					},
					error : function(){
						$('#loading').dialog('close');
						$( "#loading" ).dialog({ modal: true });
					}
				});	
			}
			
			function selectedname(name)
			{
				checkUsername(name.innerHTML);
				document.getElementById("username").value = name.innerHTML;
			
			}
			
			function findusername(newusername)
			{
				var returnstring;
				$.ajax({
					url: "/ayushman/cregistrar/checkusernameavailability?username="+newusername,
					async: false,
					success: function(data) {
						$('#loading').dialog('close');
						if(data =="invalid"){
							returnstring = "invalid";
						}
						else{
							returnstring = "valid";
						}
					},
					error : function(){
						returnstring= "invalid";
					}
					});
				return returnstring;
			}
		</script>


<div id="body_contantpatientpage" style="width:828px; height:500px;"> 
	<table>
		<tr>
			<td style="width:825px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="160" class="Heading_Bg">&nbsp;
							<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Change account details only once</strong>
						</td>
					</tr>
				</table> 
			</td>
		</tr>
	</table>
	<div class="table_roundBorder" style="background-color:#ecf8fb;width: 98%;margin-left: 6;">
		<div class="bodytext_bold" style="margin:15px;font-size:12px; line-height:20px;">
			Enter a new password for your <em>IndiaOnlineHealth</em>, We highly recommend you create a unique password - one that you don't use for any other websites. Password has must be 8 character long
		</div>
	</div>
	
	<form id="usenameform" autocomplete="off" action="savescriptuserchanges" method="post" >
       	 <div class="table_roundBorder"  id ="changeusername" style="width: 98%;margin-left: 6;margin-top: 12px;height: 250;">
		<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;padding:10px;">
			<tr>
				<td style="width:15%;" class="bodytext_normal">Username</td>
				<td style="width:85%;" ><input  id="username" name="username" type="text" class="textarea"  size="25" value="<?php echo $objuser->username; ?>" placeholder="* e.g john12bass" onblur="checkUsername(this)"  autocomplete="on" maxlength="45"  /><lable id="usernameerror" style="color: #CC0000;display:none;font-weight: normal;font-family: tahoma,Helvetica,sans-serif;font-size: 11px;margin: 0 0 0 5px;" >&nbsp;&nbsp;&nbsp;Please write other Username.</lable></td>
			</tr>
			<tr>
				<td style="width:15%;" class="bodytext_normal"></td>
				<td style="width:85%;padding-top:7px;padding-bottom:7px;" ><div id="possiblenames" class="bodytext_normal"  style="border: 1px solid #2D7A9E;border-radius:5px;padding:10px;width:180px;"; ></div></td>
			</tr>
			<tr>
				<td style="width:15%;" class="bodytext_normal">Old password</td>
				<td style="width:85%;" ><input  id="oldpassword"  type="password" name="oldpassword" type="text" class="textarea"  size="25"   maxlength="45"  />&nbsp;&nbsp;&nbsp;<font color="#CC0000" style="font-weight: normal;font-family: tahoma,Helvetica,sans-serif;font-size: 11px;margin: 0 0 0 " ><?= Arr::get($errors, 'oldpassword'); ?></font></td>
			</tr>
			<tr>
				<td style="width:15%;" class="bodytext_normal">New password</td>
				<td style="width:85%;" ><input  id="password"  type="password" name="password" type="text" class="textarea"  size="25"   maxlength="45"   />&nbsp;&nbsp;&nbsp;<font color="#CC0000" style="font-weight: normal;font-family: tahoma,Helvetica,sans-serif;font-size: 11px;margin: 0 0 0 " ><?= Arr::get($errors, 'password'); ?></font></td>
			</tr>
			<tr>
				<td style="width:15%;" class="bodytext_normal">Confirm New Password</td>
				<td style="width:85%;" ><input  id="password_confirm"  type="password" name="password_confirm" type="text" class="textarea"  size="25"   maxlength="45"  />&nbsp;&nbsp;&nbsp;<font color="#CC0000" style="font-weight: normal;font-family: tahoma,Helvetica,sans-serif;font-size: 11px;margin: 0 0 0 " ><?= Arr::get($errors, 'password_confirm'); ?></font></td>
			</tr>
			<tr>
				<td colspan="2" class="bodytext_normal"><hr/><input type="hidden" id="userid" name="userid" value="<?php echo $objuser->id; ?>" ><input type="hidden" id="firsttime" name="firsttime" value="true" ></td>	
			</tr>
			
		</table>
		<div class="footer" style="padding-right:10px; height:45px;padding-left:10px;" >
            		<input class="button" type="submit"  style="width:100px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="changeusernamebutton"  value="save" readonly="true" />
           	</div>
		
	</div>
	</form>
	

	
</div>
