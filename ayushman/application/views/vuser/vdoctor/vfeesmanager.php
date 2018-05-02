<html>
<head>
<title>Doctor Fees...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">

<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/responsive.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery.textarea-expander.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<style type="text/css">
	.ui-datepicker { width: 14em; padding: .2em .2em 0; display: none; }
	.ui-datepicker table {width: 100%; font-size: .7em; border-collapse: collapse; margin:0 0 .4em; } 
	.ui-widget {  font-size: 0.8em;}
	.form-control{ font-size:12px;}
	a:visited {
		color: #00aca9;
	}
</style>
<script type="text/JavaScript">
	function submitform()
	{
		$('#hfcollectfees').val($("#collectfees").is(':checked'));
		$('#feesform').submit();
		
	}
	$(function() {
		$( "#effectivedate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0, gotoCurrent: true});
		var m_names = new Array("Jan", "Feb", "Mar", 
		"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
		"Oct", "Nov", "Dec");

		var d = new Date();
		var curr_date = d.getDate();
		var curr_month = d.getMonth();
		var curr_year = d.getFullYear();
		$( "#effectivedate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
		getscheduledfees('scheduled');
		getfees('active');
	});
	function getfees(status)
	{
		$.ajax({
		  url: "/ayushman/cfeesmanager/get?status="+status+"&userid="+document.getElementById("userid").value,
		  success: function( data ) {
				data =  JSON.parse(data);
				if(data['type'] == 'error')
					showMessage('550','200','Retrieving Fees',data['data'],data['type'],'id');
				else
				{
					var fees = new Array();
					fees = JSON.parse(data['data']);
					if(fees.length == 0)
					{
						$('#currentfeestable').hide();
					}
					else{
						$('#currentfeestable').show();
					}
					for(var i=0; i< fees.length; i++)
					{
						$('#firsttime'+i).val('Rs. '+fees[i]['firsttime']+'/-');
						$('#followup'+i).val('Rs. '+fees[i]['followup']+'/-');
						$('#extension'+i).val('Rs. '+fees[i]['extension']+'/-');

						$('#firsttimeinclinic'+i).val('Rs. '+fees[i]['firsttimeinclinic']+'/-');
						$('#followupinclinic'+i).val('Rs. '+fees[i]['followupinclinic']+'/-');
						var date = fees[i]['effectivedate'];
    					date = date.replace("-"," ");
    					date = date.replace("-"," ");
						$('#currentfeeseffectivedate').val(date);
						if(fees[i]['collectfees'] == 1)
							$('#collectcurrentfees').attr('checked',true);
						else
							$('#collectcurrentfees').attr('checked',false);
					}
				}
				resize();
			},
			error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
		});
	}
	function clearfeestructure()
	{
		for(var i=0; i< 3; i++)
		{
			$('#schedulefirsttime'+i).val('');
			$('#schedulefollowup'+i).val('');
			$('#scheduleextension'+i).val('');

			$('#schedulefirsttimeinclinic'+i).val('');
			$('#schedulefollowupinclinic'+i).val('');
		}
		$( "#effectivedate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0, gotoCurrent: true});
		var m_names = new Array("Jan", "Feb", "Mar", 
		"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
		"Oct", "Nov", "Dec");

		var d = new Date();
		var curr_date = d.getDate();
		var curr_month = d.getMonth();
		var curr_year = d.getFullYear();
		$( "#effectivedate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
	}
	
	function copy()
	{
		getscheduledfees('active')
	}
	function dump(obj) {
		var out = '';
		for (var i in obj) {
			out += i + ": " + obj[i] + "\n";
		}
		alert(out);
		// or, if you wanted to avoid alerts...
		/* var pre = document.createElement('pre');
		pre.innerHTML = out;
		document.body.appendChild(pre)*/
	}
	function getscheduledfees(status)
	{
		$.ajax({
		  url: "/ayushman/cfeesmanager/get?status="+status+"&userid="+document.getElementById("userid").value,
		  success: function( data ) {
				data =  JSON.parse(data);
				if(data['type'] == 'error')
					showMessage('550','200','Retrieving Fees',data['data'],data['type'],'id');
				else
				{
					fees = JSON.parse(data['data']);
					for(var i=0; i< fees.length; i++)
					{
						$('#schedulefirsttime'+i).val(fees[i]['firsttime']);
						$('#schedulefollowup'+i).val(fees[i]['followup']);
						$('#scheduleextension'+i).val(fees[i]['extension']);

						$('#schedulefirsttimeinclinic'+i).val(fees[i]['firsttimeinclinic']);
						$('#schedulefollowupinclinic'+i).val(fees[i]['followupinclinic']);
						if(status == 'active')
						{
							var m_names = new Array("Jan", "Feb", "Mar", 
							"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
							"Oct", "Nov", "Dec");
							var d = new Date();
							var curr_date = d.getDate();
							var curr_month = d.getMonth();
							var curr_year = d.getFullYear();
							$( "#effectivedate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
						}
						else
						{
							
							var date = fees[i]['effectivedate'];
    						date = date.replace("-"," ");
    						date = date.replace("-"," ");
							$('#effectivedate').val(date);
						}	
						if(fees[i]['collectfees'] == 1)
							$('#collectfees').attr('checked',true);
						else
							$('#collectfees').attr('checked',false);
					}
				}
			},
			error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
		});
	}

	$(document).ready(function() {
		validation();
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('350','80','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
		
	});
	function validation()
	{
		for(var i=0; i< 3; i++)
		{
			var textbox = new LiveValidation('schedulefirsttime'+i, {onlyOnSubmit: true });
			textbox.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
			
			var textbox = new LiveValidation('schedulefollowup'+i, {onlyOnSubmit: true });
			textbox.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
			
			var textbox = new LiveValidation('scheduleextension'+i, {onlyOnSubmit: true });
			textbox.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
			
			var textbox = new LiveValidation('schedulefirsttimeinclinic'+i, {onlyOnSubmit: true });
			textbox.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
			
			var textbox = new LiveValidation('schedulefollowupinclinic'+i, {onlyOnSubmit: true });
			textbox.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
		}
	}
	
</script>
</head>
<body>
	<div class="panel" style="width:98%;height:auto;">
		<form id="feesform" method="post" enctype="multipart/form-data" action="/ayushman/cfeesmanager/save"  >
		
			<div class="row editformHeader">
				<div class="col-sm-4 col-md-4"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;New Fee Structure</img></div>
			</div>									
		
		<div class="col-sm-12 bodytext_normal" style="margin-top:10px;text-align:right;color: #5cb1b6;"><a href="#" onclick="getscheduledfees('active');">Copy current fee structure</a>&nbsp;/&nbsp;<a href="#" onclick="getscheduledfees('scheduled');">Scheduled fee structure</a></div>	
			
		<div class="row feemanagerblock">				
			<div class="col-sm-10 bodytext_bold"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8">Consultation Charges (Standard)</img></div>
			<div class="col-sm-10 bodytext_normal"><u>Online / Phone</u></div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">First Time(Rs.)</label>	
				<div class="col-sm-6"><input id="schedulefirsttime0" name="firsttimestandardonline" type="text" class="form-control" size="10"></div>	
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Follow Up(Rs.)</label>
				<div class="col-sm-6"><input id="schedulefollowup0" name="followupstandardonline" type="text" class="form-control" size="10"></div>
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Extension(Rs.)</label>
				<div class="col-sm-6"><input id = "scheduleextension0" name="standardonlineext" type="text" class="form-control" size="10"></div>
			</div>
			
			<div class="col-sm-10 bodytext_normal"><u>In Clinic</u></div>	
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">First Time(Rs.)</label>	
				<div class="col-sm-6"><input id="schedulefirsttimeinclinic0" name="firsttimestandardinclinic" type="text" class="form-control" size="10"></div>
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Extension(Rs.)</label>			
				<div class="col-sm-6"><input id="schedulefollowupinclinic0" name="followupstandardinclinic" type="text" class="form-control" size="10"></div>	
			</div>			
		</div>
		<div class="row feemanagerblock">				
			<div class="col-sm-10 bodytext_bold"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8">Consultation Charges (Premium)</img></div>
			<div class="col-sm-10 bodytext_normal"><u>Online / Phone</u></div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">First Time(Rs.)</label>	
				<div class="col-sm-6"><input id="schedulefirsttime1" name="firsttimepremiumonline" type="text" class="form-control" size="10"></div>	
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Follow Up(Rs.)</label>
				<div class="col-sm-6"><input id="schedulefollowup1" name="followuppremiumonline" type="text" class="form-control" size="10"></div>
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Extension(Rs.)</label>
				<div class="col-sm-6"><input id="scheduleextension1" name="premiumonlineext" type="text" class="form-control" size="10"></div>
			</div>
			
			<div class="col-sm-10 bodytext_normal"><u>In Clinic</u></div>	
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">First Time(Rs.)</label>	
				<div class="col-sm-6"><input id="schedulefirsttimeinclinic1" name="firsttimepremiuminclinic" type="text" class="form-control" size="10"></div>
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Extension(Rs.)</label>			
				<div class="col-sm-6"><input id="schedulefollowupinclinic1" name="followuppremiuminclinic" type="text" class="form-control" size="10"></div>	
			</div>			
		</div>
		<div class="row feemanagerblock">				
			<div class="col-sm-10 bodytext_bold"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8">Consultation Charges (Concessional)</img></div>
			<div class="col-sm-10 bodytext_normal"><u>Online / Phone</u></div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">First Time(Rs.)</label>	
				<div class="col-sm-6"><input id="schedulefirsttime2" name="firsttimehappyhoursonline" type="text" class="form-control" size="10"></div>	
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Follow Up(Rs.)</label>
				<div class="col-sm-6"><input id="schedulefollowup2" name="followuphappyhoursonline" type="text" class="form-control" size="10"></div>
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Extension(Rs.)</label>
				<div class="col-sm-6"><input id="scheduleextension2" name="happyhoursonlineext" type="text" class="form-control" size="10"></div>
			</div>
			
			<div class="col-sm-10 bodytext_normal"><u>In Clinic</u></div>	
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">First Time(Rs.)</label>	
				<div class="col-sm-6"><input id="schedulefirsttimeinclinic2" name="firsttimehappyhoursinclinic" type="text" class="form-control" size="10"></div>
			</div>
			<div class="col-sm-4">	
				<label class="col-sm-6 control-label">Extension(Rs.)</label>			
				<div class="col-sm-6"><input id="schedulefollowupinclinic2" name="followuphappyhoursinclinic" type="text" class="form-control" size="10"></div>	
			</div>
		</div>
		<div class="row col-sm-12" style="margin-top:10px;">	
			<div class="col-sm-4">
				<label class="col-sm-7 control-label">Effective Date :</label> 
				<div class="col-sm-4"><input id="effectivedate" readonly="readonly" name="effectivedate" type="text" value="DD MM YYYY" style="width:80px;" size="20"/></div>
			</div>
			
			<div class="col-sm-4"><input id="collectfees" checked name="collectfees" type="checkbox"  size="10"><label>Allow patient to pay at clinic</label></input></div>
			
			<div class="col-sm-3">
				<div class="col-sm-4"><input type="button" class="regnbutton" style="width:50px;" value="Save" onclick="submitform();"></div>
				<div class="col-sm-2"><input type="button" class="regnbutton" style="width:50px;" onclick="clearfeestructure();" value="Reset"></div>
			</div>
		</div>
		
		<div id="currentfeestable" >
				
			<div class="row feemanagerblock">				
				<div class="col-sm-10 bodytext_bold"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8">Consultation Charges (Standard)</img></div>
				<div class="col-sm-10 bodytext_normal"><u>Online / Phone</u></div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">First Time(Rs.)</label>	
					<div class="col-sm-6"><input id="firsttime0" readonly="readonly" type="text" class="form-control" size="10"></div>	
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Follow Up(Rs.)</label>
					<div class="col-sm-6"><input id="followup0" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Extension(Rs.)</label>
					<div class="col-sm-6"><input id = "extension0" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				
				<div class="col-sm-10 bodytext_normal"><u>In Clinic</u></div>	
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">First Time(Rs.)</label>	
					<div class="col-sm-6"><input id="firsttimeinclinic0" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Extension(Rs.)</label>			
					<div class="col-sm-6"><input id="followupinclinic0" readonly="readonly" type="text" class="form-control" size="10"></div>	
				</div>			
			</div>
			<div class="row feemanagerblock">				
				<div class="col-sm-10 bodytext_bold"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8">Consultation Charges (Premium)</img></div>
				<div class="col-sm-10 bodytext_normal"><u>Online / Phone</u></div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">First Time(Rs.)</label>	
					<div class="col-sm-6"><input id="firsttime1" readonly="readonly" type="text" class="form-control" size="10"></div>	
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Follow Up(Rs.)</label>
					<div class="col-sm-6"><input id="followup1" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Extension(Rs.)</label>
					<div class="col-sm-6"><input id="extension1" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				
				<div class="col-sm-10 bodytext_normal"><u>In Clinic</u></div>	
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">First Time(Rs.)</label>	
					<div class="col-sm-6"><input id="firsttimeinclinic1" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Extension(Rs.)</label>			
					<div class="col-sm-6"><input id="followupinclinic1" readonly="readonly" type="text" class="form-control" size="10"></div>	
				</div>			
			</div>
			<div class="row feemanagerblock">				
				<div class="col-sm-10 bodytext_bold"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8">Consultation Charges (Concessional)</img></div>
				<div class="col-sm-10 bodytext_normal"><u>Online / Phone</u></div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">First Time(Rs.)</label>	
					<div class="col-sm-6"><input id="firsttime2" readonly="readonly" type="text" class="form-control" size="10"></div>	
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Follow Up(Rs.)</label>
					<div class="col-sm-6"><input id="followup2" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Extension(Rs.)</label>
					<div class="col-sm-6"><input id="extension2" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				
				<div class="col-sm-10 bodytext_normal"><u>In Clinic</u></div>	
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">First Time(Rs.)</label>	
					<div class="col-sm-6"><input id="firsttimeinclinic2" readonly="readonly" type="text" class="form-control" size="10"></div>
				</div>
				<div class="col-sm-4">	
					<label class="col-sm-6 control-label">Extension(Rs.)</label>			
					<div class="col-sm-6"><input id="followupinclinic2" readonly="readonly" type="text" class="form-control" size="10"></div>	
				</div>
			</div>
			<div class="row col-sm-12" style="margin-top:10px;">	
				<div class="col-sm-4">
					<label class="col-sm-7 control-label">Effective Date :</label> 
					<div class="col-sm-4"><input id="currentfeeseffectivedate" readonly="readonly" type="text" value="DD MM YYYY" style="width:80px;" size="20"/></div>
				</div>
				
				<div class="col-sm-4"><input id="collectcurrentfees" checked name="collectcurrentfees" type="checkbox" disabled size="10"><label>Allow patient to pay at clinic</label></input></div>
				
				<div class="col-sm-4">
					<label>Note - Extension Charges for every 5 min.</label>
				</div>
			</div>
		</div>
		<input id="collectfees" name="hfcollectfees" type="hidden"/>
		<input name="userid" id="userid" type="hidden" value="<?php echo $userid;?>"/>
	</form> 
	</div>	
	<div style="display:none;">
		<div class="bodytext_error" id="errorlistdiv">
			<?= Arr::path($errors, 'error'); ?>
		</div>
	</div>
	<div style="display:none;">
		<div class="bodytext_normal" id="messagelistdiv">
			<?= Arr::path($messages,'success'); ?>
		</div>
	</div>
</body>
</html>