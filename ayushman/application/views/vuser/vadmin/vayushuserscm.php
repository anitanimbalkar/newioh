<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<style> 
	.ui-jqgrid .ui-pg-input
	{
		height: 13px;
		line-height: 13px;
	
	
	}

</style>

 <script type="text/javascript">
 
	$(document).ready(function() {
		$('#export').click(function() {
    			$('#searchform').attr("action", "export");  //change the form action
			$('#exportto').val('excel');
			$('#searchform').submit();  // submit the form
		});
		$('#loading').dialog
		({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		 
		
		$(function() 
		{
			$( "#from" ).datepicker({ changeMonth: true,changeYear: true,maxDate:'0',  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
										 "Apr", "May", "Jun", "Jul", "Aug", "Sep", 
										 "Oct", "Nov", "Dec");

				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				if($('#from').val() == '')
				{
					if(curr_month == 0)
					{
					$( "#from" ).val(curr_date + " " + m_names[11] + " " + (curr_year - 1));
					}
					else
					{
					$( "#from" ).val(curr_date + " " + m_names[curr_month-1] + " " + curr_year);
					}
						
				}
			
			$( "#to" ).datepicker({ changeMonth: true,changeYear: true,maxDate:'0',  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
										 "Apr", "May", "Jun", "Jul", "Aug", "Sep", 
										 "Oct", "Nov", "Dec");

				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				
				if($('#to').val() == '')
				{
					$( "#to" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
				}
			});
				
			if($.trim($('#errorlistdiv').html()) != "")
			{
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			}
			
			if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
			typechanged($('#durationtype'),false);
			$('#loading').dialog("close");
			
			
	});
	function setaction( cellvalue, options, rowObject )
	{	//console.log($(rowObject).children()[3].firstChild.data);
		var temp = $(rowObject).children()[3].firstChild.data;
		if(temp=="Verified" || temp=="Active")
		return '<a  id="fancybox-manual-c" href="javascript:;" onclick="suspendprofile('+cellvalue+');" ><font color="blue">Suspend</font></a> / <a  id="fancybox-manual-d" href="javascript:;" onclick="reset('+cellvalue+');" ><font color="blue">Reset Password</font></a>';
		else if(temp=="Unverified"||temp=="New")
		return '<a  id="fancybox-manual-a" href="javascript:;" onclick="activateprofile('+cellvalue+');" ><font color="blue">Activate</font></a> / <a  id="fancybox-manual-d" href="javascript:;" onclick="suspendprofile('+cellvalue+');" ><font color="blue">Reject</font></a>';
		else
		return '<a  id="fancybox-manual-a" href="javascript:;" onclick="activateprofile('+cellvalue+');" ><font color="blue">Activate</font></a> / <a  id="fancybox-manual-d" href="javascript:;" onclick="reset('+cellvalue+');" ><font color="blue">Reset Password</font></a>';
	}
	function actionviewformatter (cellvalue, options, rowObject )
	{ 
		if($('#role').val() == 'patient'){
			return '<a  id="fancybox-manual-b" href="javascript:;" onclick="showprofile('+cellvalue+');" ><font color="blue">View Profile</font></a>/</br><a  id="fancybox-manual-b" href="javascript:;" onclick="buildPatientNetwork('+cellvalue+');" ><font color="blue">View Network</font></a>';
		}else{
			return '<a  id="fancybox-manual-b" href="javascript:;" onclick="showprofile('+cellvalue+');" ><font color="blue">View Profile</font></a>';
		}
		
	}
	function buildPatientNetwork(patientuserid){
		parent.openDialog("/ayushman/cpatientprofile/listnetwork?id="+patientuserid, '900','1024px');
	}
	function showprofile(id)
	{
		
	parent.openDialog('/ayushman/cshowprofile/showprofile?userid='+id,800,600);
		
	}
	function reset(id)
	{ 
		 $.ajax({
        type: "GET",
        url: "/ayushman/cayushusers/reset?userid="+id,
        success: function(data) {
           alert("Password reset and SMS and Email is sent to user");
		   refreshgrid();
          
        }
           
        }); 
	
		
	}
	function activateprofile(id)
	{ 
		document.getElementById("userid").value=id;
		$("#dialog-message2").dialog({
		modal: true,
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		});
		
	}
	function suspendprofile(id)
	{	
		document.getElementById("idioh").value=id;
		$("#dialog-message").dialog({
		modal: true,
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		
});
		
		
		
	}
	function savenote()
	{	$.ajax({
        type: "POST",
        url: "/ayushman/cayushusers/activateprofile",
		data:$('#note').serialize(),
        success: function(data) {
			//console.log(data);
           alert("Profile Activated/Re-activated Successfully");
		    $("#dialog-message2").dialog( "close" );
		   refreshgrid();
          
        }
           
        });
		
	}
	function savereason()
	{
		$.ajax({
        type: "POST",
        url: "/ayushman/cayushusers/savereason",
		data:$('#bill').serialize(),
        success: function(data) {
           alert("Profile suspended Successfully.");
		    $("#dialog-message").dialog( "close" );
		   refreshgrid();
          
        }
           
        }); 
	
		//$('#bill').submit();
		
	}
	function typechanged(select, submit)
	{
		if($(select).find(":selected").val() == 'custom')
		{
		$('#dates').show();
		submit = false;
		}	
		else
		{
		$('#dates').hide();
		}
		if(submit != false)
		{
			$('#searchform').submit();
		}
	}
	
	
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:670px;padding:3px;"> 
	
	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">

	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<td style="width:99%;" colspan="4" class="Heading_Bg">
				India Online Health users
			</td>
			
		</tr>
		<tr>
			<td align="left" valign="center" width="25%" class="bodytext_normal" style="padding-bottom: 5px; padding-top: 10px">&nbsp;Select Type: 
					<select name="role" onchange="$('#searchform').attr('action', 'search');$('#searchform').submit();" class="textarea" id="role" >
							<option value='patient' <?php
								if ($previousvalues != null)
									echo ($previousvalues['role'] == 'patient') ? 'selected' : '';
								?>  >Patient
							</option>
						
						</select>
			</td>
			
			 
					<td align="left" valign="center" width="20%" class="bodytext_normal"style="padding-top: 6px">&nbsp;Status: 
					<select name="activationstatus"  id="activationstatus" class="textarea"  onchange="$('#searchform').attr('action', 'search');$('#searchform').submit();" style="width:80px;"> 
									<option value=''> All </option>
									<?PHP
foreach ($array_status as $statusa) {
    $isselected = '';
    if ($previousvalues != null) {
        $isselected = ($previousvalues['activationstatus'] == $statusa) ? 'selected' : '';
    }
    print "<option  \" value=\"{$statusa}\" " . $isselected . ">{$statusa}</option>";
}
?>
					</select>
			</td>
			
			<td align="left" valign="center" width="30%" class="bodytext_normal" style="padding-top: 6px">Registered During: 
			
			<select name="durationtype" onchange="$('#searchform').attr('action', 'search');typechanged(this)" class="textarea" id="durationtype" >
						<option value = '' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == '') ? 'selected' : '';
?>   >All</option>
						<option value='lastmonth' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'lastmonth') ? 'selected' : '';
?>  >Last Month</option>
						<option value='last2month' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'last2month') ? 'selected' : '';
?>  >Last 2 Month</option>
						<option value='last3month' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'last3month') ? 'selected' : '';
?>  >Last 3 Month</option>
						<option value='lastyear' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'lastyear') ? 'selected' : '';
?>  >Last Year</option>
						<option value='custom' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'custom') ? 'selected' : '';
?>  >Custom Range</option>
						</select>
			</td>
			 <td align="left" width=45% valign="center" class="bodytext_normal">
					<div id="dates"  style=" width: 100%;padding-left: 30px;padding-bottom: 7px; ">
							 <table style="width:100%;" >
<tr style="width:100%; padding-top: 14px;">
<td style="width:40%">
From <input type="text" name="from" id="from" class="textarea" style="width:70%" readonly placeholder="select date" value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="bodytext_normal"/>
</td>
<td style="width:40%"> To <input type="text" name="to" id="to" class="textarea" style="width:70%;" readonly placeholder="select date" value="<?php
if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="bodytext_normal"/>
</td>
<td style="width:20%">
<input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
</td>

</tr>
</table>

					
					</div>
			
			  </td>

			  
    	</tr>
		<tr>
			<td style="width:99%;" colspan="4">
				<hr style="border-top: dotted 1px #11587E" />
			</td>
		</tr>

		<tr>
		<td  colspan="4"align="right" valign="bottom">
					<table>
							
							<td width="52" class="bodytext_bold" align="right">Search :</td>
						  	<td width="150" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:77%;" value="<?php
					if ($previousvalues != null)
					if (isset($previousvalues['search']))
					echo $previousvalues['search'];
					?>" class="bodytext_normal"/><input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						  	<td width="120" align="right">
									<input type="button" id="export" class="button" style="float:right;margin-right:10px;height:25px" value="Export to Excel" />
									<input type="hidden" id="exportto" name="exportto" value="" />
							</td>
						
					</table>

			</td>
		</tr>
		
		<tr  class="bodytext_normal" align="right"  width="100%">    
			<td colspan="4" valign="top">
				<?php
$consumers = Request::factory('xjqgridcomponent/index');
$consumers->post('name', 'viewusers');
$consumers->post('height', '320');
$consumers->post('width', '810');
$consumers->post('sortname', 'username');
//$consumers->post('sortname', 'registerdate');
$consumers->post('sortorder', 'desc');
$consumers->post('tablename', 'viewusers');
$consumers->post('columnnames', 'id,username,contactnumber,activationstatus,registerdate,date_reg,id,id');
$consumers->post('whereclause', $whereclause); //used for jqgrid

$columninfosearch = '[
								{"name":"Id","index":"id","hidden":false,"width":5},
								{"name":"Name", "index":"username", "hidden":false,"width":20},				
								{"name":"Contact No.","index":"contactnumber","hidden":false,"width":15},
								{"name":"Status","index":"activationstatus","hidden":false,"width":10},
								{"name":"Registered On", "index":"date_reg", "hidden":false,"width":12},
								{"name":"V","index":"date_reg","hidden":true},
								{"name":"View profile","index":"id","hidden":false,"align":"center","sortable":false,"width":10,"formatter":actionviewformatter},
								{"name":"Action","index":"id","width":28,"hidden":false,"formatter":setaction}
								

							]';
$consumers->post('columninfo', $columninfosearch);
$consumers->post('editbtnenable', 'false');
$consumers->post('deletebtnenable', 'false');
$consumers->post('savebtnenable', 'false');
echo $consumers->execute();
?>
			</td>
		</tr>
	</table>
	
	</form>
  </div>
  <div id="dialog-message" title="Suspend User" style="display: none;">
  <form id="bill" action ="/ayushman/cayushusers/savereason" method="post">
    <div style="margin-left: 23px;">
        <p>
           Please mention reason behind the suspension of this account.
            <br /><br />
           <input id="reason"  name="reason" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
		   <input type="hidden" id="idioh"  name="idioh" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
        </p>
		<input type="button" id="btnsave" value="Save" onclick="savereason();"/>
		</div>
		</form>
</div>

 <div id="dialog-message2" title="Activate User Note" style="display: none;">
  <form id="note" action ="/ayushman/cayushusers/activateprofile" method="post">
    <div style="margin-left: 23px;">
        <p>
           Note for Activation/Re-activation of this account.
            <br /><br />
           <input id="note"  name="note" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
		   <input type="hidden" id="userid"  name="userid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
        </p>
		<input type="button" id="btnsave" value="Save" onclick="savenote();"/>
		</div>
		</form>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors, 'error'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages, 'message'); ?>
	</div>
</div>
