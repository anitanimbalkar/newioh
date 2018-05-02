<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		$('#addpopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#pendingActivationPopup').dialog({
			//position: "top",
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "50%",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
	
		
		$(".ui-dialog-titlebar").hide();

	});


	function removestaff(staffid,staffname)
	{
	 	document.getElementById("removestaffid").value = staffid;
	 	showMessage('250','50','Remove Staff','Do you really want to remove '+staffname+' from staff list ?','confirmation','removestaffpopup');
	}
	
	function Confirmation_Event(id,confirmation)
	{
		var staffid = document.getElementById("removestaffid").value;
		if(id == 'removestaffpopup')
		{
			if(confirmation == 'yes')
			{	
				document.body.style.cursor='wait';
				$.ajax({
				  url: "/ayushman/cstaffdirectory/removestaff?staffid="+staffid,
					success: function( data ) {
						window.location = "/ayushman/cstaffdirectory/view";
					},
					error : function(){alert("error while getting complete data for edit");}
			 });
			}
		}
	}

	function checkEmail(email){
	$(".ui-dialog-titlebar").hide();
	$( "#loading" ).dialog({ modal: false });
	$('#loading').dialog('open');
	$.ajax({
		url: "/ayushman/cstaffdirectory/checkemailavailabilityforstaff?email="+email.value,
		success: function(data) {
			$('#loading').dialog('close');
			if(data=="invalid"){
				document.getElementById("linkemailerror").style.display = "block";
				document.getElementById("emailavailability").value = 'invalid';

			}
			else{
				document.getElementById("linkemailerror").style.display = "none";
				document.getElementById("emailavailability").value = 'valid';

			}
			$( "#loading" ).dialog({ modal: true });
		},
		error : function(){
			$('#loading').dialog('close');
			$( "#loading" ).dialog({ modal: true });
			showMessage('250','50','Check email id availability','Error occured while checking email id availability, Please contact system administrator.','error','errordialogboxid');
		}
	});
	}
	
	function addstaff()
	{
		email=document.getElementById("linkemailid").value;
		if((email != "") && (document.getElementById("emailavailability").value == 'valid' ))//email text area is blank;
		{
			$.ajax({
				url: "/ayushman/cstaffdirectory/addstaff?email="+email,
				success: function(data) {
					$('#addpopup').dialog('close');
					$('#loading').dialog('close');
					window.location = "/ayushman/cstaffdirectory/view";
				},
				error : function(){
					$('#loading').dialog('close');
					$( "#loading" ).dialog({ modal: true });
					showMessage('250','50','Check email id availability','Error occured while adding new staff, Please contact system administrator.','error','errordialogboxid');
				}
			});
		}
		else//email text area is blank;
		{
			alert('Email id must be filled and unique.');
			
		}
	}
	
	function openAddStaff()
	{
		document.getElementById('linkemailid').value="";
		$('#addpopup').dialog('open');
	}
	
	function showPendingactivation(){
		$("#pendingActivationResult").empty();
		$.ajax({
				url: "/ayushman/cstaffdirectory/showpendingactivation",
				success: function(jsonSearchResults) {
					searchResults = eval("("+jsonSearchResults+")");
					if(searchResults.length == 0){
						$("<td class='bodytext_bold' colspan='6' align='middle'>No Results Found</td>").appendTo($("#relativeResult"));
						$("#pendingActivationPopup").dialog("open");
					}
					else{
						for(var i=0;i<searchResults.length;i++){
							if(i % 2 != 0)
								var result = $("<tr id=result"+i+"></tr>");
							else
								var result = $("<tr id=result"+i+" style = 'background-color:#ecf8fb;'></tr>");
							$("<td width='5%' class='bodytext_normal' align='middle'>"+(i+1)+"</td>").appendTo(result);
							$("<td width='70%' class='bodytext_normal' align='middle'>"+searchResults[i].email+"</td>").appendTo(result);
							var mailid= "'"+searchResults[i].email+"'";
							$('<td width="25%" class="bodytext_normal" align="middle"><a onclick ="cancelinvitation('+mailid+');" href="javascript:void(0);">Cancel Invitation</a></td>').appendTo(result);
							$(result).appendTo($("#pendingActivationResult"));
						}
						$("#pendingActivationPopup").dialog("open");
					}
				},
				error : function(){
					$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#pendingActivationResult"));
					$("#pendingActivationPopup").dialog("open");
				}
			});
	}
	function cancelinvitation(email)
	{
		$.ajax({
				url: "/ayushman/cstaffdirectory/cancelinvitation?email="+email,
				success: function(data) {
					window.location = "/ayushman/cstaffdirectory/view";
				},
				error : function(){
					showMessage('550','200','Canceling Invitation ',"Could not Cancel Invitation.",'error','id');
				}
		});
	}	
</script>
<div  style="width:828px;height:560px;" >
<input type="hidden" name='emailavailability' id = 'emailavailability' /> 
													
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%" >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;My Staff</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:10px;">
			<div >
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					</tr>
						<td height="25" colspan="4" align="left" class="bodytext_normal" valign="middle" style="border-bottom:1px solid #a8c8d9;padding-left:10px;padding-left:10px;padding-bottom:10px;" >
							<input type="button" class="button" value="Add Staff" style="width:100px;height:23px;" onclick="openAddStaff();" />
						</td>
					</tr>
					<tr>
						<td height="auto" colspan="4" align="left" valign="middle" >
							<?php
								$objstaff = ORM::factory('favoritestaffbydoctordetail')->where('doctorUserId','=',Auth::instance()->get_user()->id)->where('status','=','accepted')->find_all()->as_array();
								$message = 'No Staff in the network';
								if(count($objstaff) == 0){
									echo '<div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:2px;height:20px;vertical-align:left;" align="center" class="bodytext_bold" >'.$message.'</div>';
								}else{
									echo '<div width="100%" height="auto" ><ul id="navlist">';
									foreach($objstaff as $staff)
									{
										echo '<li name="listitems" style="margin-top:5px;" >';
										$staffList= Request::factory('cstaffcomponent/view');
										$staffList->post("height",'25');
										$staffList->post("width",'800');
										$staffList->post("staffUserId",$staff->staffuserid);
										echo $staffList->execute(); 
										echo '</li>';
									}
									echo '</ul></div>';
								}
							?>			
						</td>
					</tr>
					<tr >	
						<td height="10">&nbsp;<input type="hidden" id="removestaffid" />
						</td>		
					</tr>

					<tr>
						<td height="25" colspan="2" align="left" class="bodytext_normal" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-left:10px;">
							Total Number of staff : <?php echo count($objstaff); ?>
						</td>
						
						<td height="25" colspan="2" align="right" class="bodytext_bold" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-right:20px;"  onclick="showPendingactivation();">
							<?php if($pendingActivationNumber > 0)  
								echo "<u style='cursor:pointer;'>View Pending Activation ( $pendingActivationNumber )</u>";
							?>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</div>
<div id="pendingActivationPopup" style="width:500px; background-color:#ffffff;" class="table_roundBorder">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; margin-bottom:10px;">
		&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
		<label id="relativeHeading" class="bodytext_bold">Pending activation</label>
		<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" style="cursor:pointer;padding-right:5px;" onclick="$('#pendingActivationPopup').dialog('close');"/></label>
	</div>
	<div style="max-height:375px;overflow:auto;margin-top:5px;">
		<table id = "pendingActivationResult" style="width:100%;">
		</table>
	</div>
</div>
<div id="addpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="42%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Add Staff</td>
				<td width="53%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
					<img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="$('#addpopup').dialog('close');"/>
				</td>
			</tr>
	</table>
	
	<form id="linkform" method="post" enctype="multipart/form-data"  action="link"  >
	<input type="hidden" value='' id="linkrelativeid" name="linkrelativeid" />

	<div id="contentdiv" style="height:100px;overflow-y:auto;overflow-x:hidden;"  >
		<table>
			<tr>
				<td width="70px" class="bodytext_normal" style="padding-left:10px;vertical-align:top;padding-top:5px;">
					Email
				</td>
				<td width="370px">
					:&nbsp;<input  type="text" class="textarea" style="width:200px;" onblur="checkEmail(this)" maxlength="45"  value="<?php if($previousvalues != null)if(isset($previousvalues['linkemailid']))echo $previousvalues['linkemailid']; ?>" id="linkemailid" name="linkemailid" /> <div id="linkemailerror" style="display:none;" class="bodytext_error">&nbsp;&nbsp;&nbsp;Email must be unique. Please write other email ID.</div>
				</td>
			</tr>

			
		</table>
        </div>
	<div class="bodytext_normal" align="right" style="height:25px;border-top:1px solid #a8c8d9;background: #ecf8fb;padding-top:5px; padding-right:10px;vartical-align:middle;align:right;">
		<input type="button" class="button" value="Cancel" style="width:100px;height:20px;" onclick="$('#addpopup').dialog('close');" />
		<input type="button" class="button" value="Add" style="width:100px;height:20px;" onclick="addstaff();" />
	</div>
	</form>
</div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
