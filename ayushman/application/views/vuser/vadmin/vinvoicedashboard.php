<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
$(document).ready(function() {$(function() {
			$( "#from" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");

		
			$( "#to" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			
			$( "#Receiptdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			
			});	
		$("#name")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchsp();
			}
		  }
		)
		$("#userselect")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchsp();
			}
		  }
		)
			
	});
function searchsp(){
		$('#serviceproviderform').attr("action", "search"); 
		$('#serviceproviderform').submit();
	}	
function newpagefunction(cellvalue, options, rowObject){
		var name = $(rowObject).children()[1].firstChild.data;
		var spid = $(rowObject).children()[0].firstChild.data;
		return ' <a style="color:blue;" href="#" onclick="depositedetails('+spid+')" >'+name+'</a>';
	}	
function depositedetails(spid){
		var fdate = '';
		var tdate = '';
		var recptinvno = '';
		window.location='/ayushman/cinvoice/viewinvoicedetails?spid='+spid+'&fdate='+fdate+'&tdate='+tdate+'&recptinvno='+recptinvno;
	}	
</script>
<style>
hr {
    display: block;
    -webkit-margin-before: 0.5em;
    -webkit-margin-after: 0.5em;
    -webkit-margin-start: auto;
    -webkit-margin-end: auto;
    border-style: inset;
    border-width: 1px;
}
</style>
	<div id="body_contantpatientpage" style="width:100%; "> 
			<input type="hidden" id="statdefine" value="<?php echo $searchstat; ?>" />
	  
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;  Accounts</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
		
	<form id="serviceproviderform" method="POST" enctype="multipart/form-data" action="search">			
		<br/>
		<table >	
				<tr class="Bodytext_bold" >
					<td height="20" style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;"><b>Search Options:</b> </td>
					<td> &nbsp;
							<select name="userselect"  class="textarea" id="userselect" value="">
										<option value = 'select' <?php
								if ($previousvalues != null)
									echo ($previousvalues['userselect'] == 'select') ? 'selected' : '';
								?>   >Select</option>
										<option value='serviceprovider' <?php
								if ($previousvalues != null)
									echo ($previousvalues['userselect'] == 'serviceprovider') ? 'selected' : '';
								?>  >Service provider </option>
										<option value='consumer' <?php
								if ($previousvalues != null)
									echo ($previousvalues['userselect'] == 'consumer') ? 'selected' : '';
								?>  >Consumer</option>				
							</select>							
					</td>
					<td><span class="bodytext_normal">Name</span> &nbsp; <input name="name" id="name" placeholder="Enter name" type="text" class="textarea" value="<?php if ($previousvalues != null)if (isset($previousvalues['name']))echo $previousvalues['name'];?>"/></td>
					<td align="right"><input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchsp();"/></td>			
				</tr>								
			</table>
		<table>		
				<tr>
				<td style="width:98%;" >
					<div id="doctorappointmentsgrid" >
						<div id="admingrid" align=center >
					
						<?php				
							$adminjqgridrequest= Request::factory('xjqgridcomponent/index');
							$adminjqgridrequest->post('name','csrtransaction'); // name of gqgrid without space
							$adminjqgridrequest->post('height','320');
							$adminjqgridrequest->post('width','830');
							$adminjqgridrequest->post('sortname','spnameofcenter');
							$adminjqgridrequest->post('sortorder','asc');
							$adminjqgridrequest->post('tablename','allserviceprovider');//used for jqgrid
							$adminjqgridrequest->post('columnnames','spuserid,spnameofcenter,mobileno,type');//used for jqgrid
							$adminjqgridrequest->post('whereclause',$whereclause);
							$columninfo ='[{"name":"IOH id", "index":"spuserid","width":40, "hidden":false,"align":"left"},
											{"name":"Name", "index":"spnameofcenter","width":80, "formatter":newpagefunction,"hidden":false,"align":"left"},
											{"name":"Contact no.", "index":"mobileno","width":80,"hidden":false,"align":"left"},
											{"name":"Type", "index":"type","width":80, "hidden":false,"align":"left"},]';
							$adminjqgridrequest->post('columninfo', $columninfo);					
							$adminjqgridrequest->post('editbtnenable','false');
							$adminjqgridrequest->post('deletebtnenable','false');
							$adminjqgridrequest->post('savebtnenable','false');
							echo $adminjqgridrequest->execute(); ?>
			</div>
				
				</div>
				</td>
				<td width="1%">&nbsp;</td>
				</tr>
				<tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr><tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr><tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr><tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</form>	
	<div id="dialog-message3" title="Transaction details" style="display: none;" >
			<fieldset style="background-color: rgb(236, 248, 251);">
					<legend  class="bodytext_bold">TRANSACTION DETAILS</legend>
						 <table width="100%">
							<tr>
								<td class="bodytext_bold">Transaction id</td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="trxid" id="trxid" class="textarea" type="text"/></td>
								<td class="bodytext_bold">Pay Mode </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="paymode" id="paymode" class="textarea" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">Transaction Amount  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="trxamt" id="trxamt" class="textarea" type="text"/></td>
								<td class="bodytext_bold">Status </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="States" id="States" class="textarea" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">FSE Name  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="fsename" id="fsename" class="textarea" type="text"/></td>
							
							</tr>
							<tr>
								<td class="bodytext_bold">All Receipts  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="6"><textarea readonly cols="100" rows="50"  name="allreceipt" id="allreceipt" class="textarea" type="text"></textarea></td>
								
							</tr>
							
						</table>
				</fieldset>	
	</div>
			
</div>