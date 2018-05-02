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
					})
				$("#userselect")
				.bind("keydown", function( event ) {
						if ( event.keyCode === $.ui.keyCode.ENTER ) {
						searchsp();
					}
		})	   
		$('#exportall').click(function() {
				$('#serviceproviderform').attr("action", "exportall");  //change the form action
				$('#exportto').val('excel');
				$('#serviceproviderform').submit();  // submit the form
		});
		$('#exportgenerat').click(function() {
				$('#serviceproviderform').attr("action", "exportgenerated");  //change the form action
				$('#exportto').val('excel');
				$('#serviceproviderform').submit();  // submit the form
		});
		$('#exportreject').click(function() {
				$('#serviceproviderform').attr("action", "exportrejected");  //change the form action
				$('#exportto').val('excel');
				$('#serviceproviderform').submit();  // submit the form
		});
		if('<?php echo $searchstat; ?>' == 'all'){		
			document.getElementById("allbtn").style.background = "orange";	
			$("#a").show();
			$("#b").hide();
			$("#c").hide();
		}
		if('<?php echo $searchstat; ?>' == 'Generated'){		
			document.getElementById("generatedbtn").style.background = "orange";	
			$("#a").hide();
			$("#b").show();
			$("#c").hide();
		}
		if('<?php echo $searchstat; ?>' == 'Rejected'){		
			document.getElementById("rejectbtn").style.background = "orange";
			$("#a").hide();
			$("#b").hide();
			$("#c").show();
		}		
	});
function actionFormatter(cellvalue, options, rowObject )
	{
		var recestatus = $(rowObject).children()[4].firstChild.data;
		var iohid = $(rowObject).children()[5].firstChild.data;
		var invid ="'"+$(rowObject).children()[0].firstChild.data+"'";
		console.log(invid);
		if(recestatus == 'Generated'){
				return ' <a style="color:blue;" href="#" onclick="invoiceview('+invid+');">View</a>';
		}	
		if(recestatus == 'Rejected'){
				return '<a style="color:blue;" href="#" onclick="invoiceview('+invid+');">View</a>';
		}
	}
	function invoicecancel(invid){
		document.getElementById('invoicenumber').value = invid;
		$("#takereason").dialog({
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 420,
		dialogClass: 'ui-dialog-osx',
		});	
	}
function invoiceview(invid)
	{
		var id = invid;
		parent.window.openDialog('/ayushman/cinvoice/generateprint?invid='+invid,850,600); 	
	}	
function rejectinvoice(){
		if(document.getElementById('textreason').value != ''){
			var invoiceid = document.getElementById('invoicenumber').value;
			var reasonforcancel = document.getElementById('textreason').value;
				$.ajax({
					cache: false ,
					url: "/ayushman/cinvoicesales/cancelinvoice?invoiceid="+invoiceid+"&reasonforcancel="+reasonforcancel,
					success: function(data ) {	
						var data =  JSON.parse(data);    
															
							location.reload();							
					},
				});	
		}else{
				showNotification('300','20','Reason','Please enter Reason of rejection','notification','diaconfirmation',5000);
		}
	}
function searchsp(){
		$('#serviceproviderform').attr("action", "search"); 
		$('#serviceproviderform').submit();
	}	
function depositedetails(spid){
		var fdate = '';
		var tdate = '';
		window.location='/ayushman/cinvoice/viewinvoicedetails?spid='+spid+'&fdate='+fdate+'&tdate='+tdate;
	}
function searchbydate(){	
			$('#serviceproviderform').attr("action", "searchbydateall"); 
			$('#serviceproviderform').submit();
	}
function searchbydateall(){	
			$('#serviceproviderform').attr("action", "searchbydateall"); 
			$('#serviceproviderform').submit();
	}
function searchbydategenerated(){
			$('#serviceproviderform').attr("action", "searchgenerated");
			$('#serviceproviderform').submit();
	}
function searchbydaterejected(){
			$('#serviceproviderform').attr("action", "searchrejected"); 
			$('#serviceproviderform').submit();
	}	
function searchbydate(){
			var stat2 = document.getElementById('statdefine').value;
			if('<?php echo $searchstat; ?>' == 'all'){					
				$('#serviceproviderform').attr("action", "searchbydateall"); 
				$('#serviceproviderform').submit();
			}
			if('<?php echo $searchstat; ?>' == 'Generated'){					
				$('#serviceproviderform').attr("action", "searchgenerated"); 
				$('#serviceproviderform').submit();
			}
			if('<?php echo $searchstat; ?>' == 'Rejected'){					
				$('#serviceproviderform').attr("action", "searchrejected"); 
				$('#serviceproviderform').submit();
			}			
	}
function createinvoice(){
	window.location.href="/ayushman/cinvoicesearch/view";		
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
<input type="hidden" id="statdefine" value="<?php echo $searchstat; ?>"/>	              
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp; <strong>Invoices</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
			<br/>	
	<table width="100%" >	
		<tr> 
			<td>
				<input id="allbtn" type="button" class="button" style="width:120px" onclick="searchbydateall();" value="All"/>
				<input id="generatedbtn" type="button" class="button" style="width:120px" onclick="searchbydategenerated();" value="Generated" />
				<input id="rejectbtn" type="button" class="button" style="width:120px" onclick="searchbydaterejected();" value="Rejected"/>
			</td>				
		</tr>		
	</table>			
		
	<form id="serviceproviderform" method="POST" enctype="multipart/form-data" action="">			
		<br/>
		<table width="100%">	
				<tr class="Bodytext_bold" >
					<td height="20" style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;"><b>Search Options:</b> </td>
					<td><span class="bodytext_normal">Invoice no</span> &nbsp; <input title="Enter Invoice number" name="invno" id="invno" placeholder="Enter invoice number" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['invno'])) echo $previousvalues['invno'];?>" class="textarea" size="17"/></td>
					<td><span class="bodytext_normal">From</span> &nbsp; <input  title="Enter From date " name="from" id="from" placeholder="From date" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="textarea" size="17"/></td>
					<td><span class="bodytext_normal">To &nbsp; <input name="to"  title="Enter To date " id="to" type="text" placeholder="To date"  value="<?php if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="textarea" size="17"/></td>
					<td align="right"><input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchbydate();"/>
					</td>
					<td id="a" align="right">
						<input type="button" style="width:120px" id="exportall" class="button" style="visibility:hidden;" value="Export to Excel"/>
					</td>
					<td id="b" align="right">
						<input type="button" style="width:120px" id="exportgenerat" class="button" style="visibility:hidden;" value="Export to Excel">
					</td>
					<td id="c" align="right">
						<input type="button" style="width:120px"  id="exportreject" class="button" style="visibility:hidden;" value="Export to Excel"/>
					</td>	
					<input type="hidden" type="hidden" id="exportto" name="exportto" value="" />
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
								$adminjqgridrequest->post('sortname','sortdate');
								$adminjqgridrequest->post('sortorder','desc');
								$adminjqgridrequest->post('tablename','allinvoice');//used for jqgrid
								$adminjqgridrequest->post('columnnames','invoiceid,invoicedate,spname,csrname,status,spuserid,totalnetamt,invoiceid');//used for jqgrid
								$adminjqgridrequest->post('whereclause',$whereclause);
								$columninfo ='[{"name":"Invoice no", "index":"invoiceid","width":80, "hidden":false,"align":"left"},
												{"name":"Date", "index":"invoicedate","width":60,"hidden":false,"align":"left"},
												{"name":"Name", "index":"spname","width":80,"hidden":false,"align":"left"},
												{"name":"Generated by", "index":"csrname","width":80,"hidden":false,"align":"left"},
												{"name":"Status", "index":"status","width":40,"hidden":false,"align":"left"},
												{"name":"IOHid", "index":"spuserid","width":60, "hidden":true,"align":"right"},
												{"name":"Amount (&#x20B9;)", "index":"totalnetamt","width":60, "hidden":false,"align":"right"},
												{"name":"Action","index":"invoiceid","width":100,"align":"left","formatter":actionFormatter,"align":"left"},]';
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
		<div id="takereason" style="display:none;" title="Reject reason">
					<table border="1" height="130px" width="415px">	
						<tr><td>
							<table >
								<tr>
									<td  class="bodytext_bold">Enter the Reason</td>
									<td>:</td>
									<td colspan="2"><textarea row="25" name="textreason" id="textreason" value="" style="margin: 0px; height: 47px; width: 196px;"></textarea></td>
									<td><button name="cancelreason" id="cancelreason" class="button bodytext_bold"style="width: 80px;" onclick="rejectinvoice()">Ok</button></td>
								</tr>	
									<input type="hidden" id="invoicenumber" name="invoicenumber" value=""/>
							</table>
						</td></tr>	
					</table>
		</div>
	</form>			
</div>