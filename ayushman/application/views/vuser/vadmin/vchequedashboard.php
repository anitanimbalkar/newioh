<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
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
				
			$('#export').click(function() {
    			$('#receiptform').attr("action", "export");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
		});
	$("#type")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		  }
		)
	$("#from")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		  }
		)
	$("#to")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		  }
		)
		if('<?php echo $type; ?>' == 'all'){  
			document.getElementById("allbtn").style.background = "orange";	
		}else if('<?php echo $type; ?>' == 'cleared'){
			document.getElementById("clearbtn").style.background = "orange";	
		}else if('<?php echo $type; ?>' == 'notcleared'){
			document.getElementById("notclearbtn").style.background = "orange";	
		}else if('<?php echo $type; ?>' == 'pendding'){
			document.getElementById("penddingbtn").style.background = "orange";	
		}
	});
function urlformatter( cellvalue, options, rowObject ){
	return '<a href="'+cellvalue+'" >'+cellvalue+'</a>';
}
function actionFormatter(cellvalue, options, rowObject )
	{
		var pat_id = $(rowObject).children()[1].firstChild.data;
		var appointment_id = $(rowObject).children()[1].firstChild.data;
		var dr_id = $(rowObject).children()[0].firstChild.data;
		var chequeid = $(rowObject).children()[1].firstChild.data;
		var chequestatus = $(rowObject).children()[4].firstChild.data;
			if(chequestatus == 'pendding'){
					return '<a style="color:blue;" href="#" onclick="clearedcheque('+chequeid+')">Cleared</a><a style="color:blue;" href="#" onclick="cancelcheque('+chequeid+')" >/Not cleared</a>';
			}else if(chequestatus == 'cleared'){
					return '';
			}else if(chequestatus == 'notcleared'){
					return '';
			}
	}
	function clearedcheque(chequeid){
			$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/clearedcheque?chequeid="+chequeid,
					success: function(data ) {	
						var data =  JSON.parse(data);
						location.reload();
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
	function cancelcheque(chequeid){
			$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/cancelcheque?chequeid="+chequeid,
					success: function(data ) {	
						var data =  JSON.parse(data);
						location.reload();
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
function searchbydate(){	
			$('#receiptform').attr("action", "search"); 
			$('#receiptform').submit();
	}
function searchbydatependding(){
			$('#receiptform').attr("action", "searchbydatependding"); 
			$('#receiptform').submit();
	}
function searchbydateall(){
			$('#receiptform').attr("action", "search"); 
			$('#receiptform').submit();
	}
function searchbydateclear(){	
			$('#receiptform').attr("action", "searchclear"); 
			$('#receiptform').submit();
	}
function searchbydatenotclear(){	
			$('#receiptform').attr("action", "searchnotclear"); 
			$('#receiptform').submit();
	}
</script>
	<div id="body_contantpatientpage" style="width:100%; height:420 px;"> 
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp; Cheques</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
		<td width="1%">&nbsp;</td>
<form id="receiptform" method="post" enctype="multipart/form-data" action="search">
		<table width="100%" >	
		<tr>
			<td>
				<input id="allbtn" type="button" class="button" onclick="searchbydateall();" style="width:110px" value="All"/>
				<input id="penddingbtn" type="button" class="button" onclick="searchbydatependding();" style="width:110px" value="Pendding"/>
				<input id="clearbtn" type="button" class="button" onclick="searchbydateclear();" style="width:110px" value="Cleared" />
				<input id="notclearbtn" type="button" class="button" onclick="searchbydatenotclear();" style="width:110px" value="Not cleared"/>
			</td>	
		</tr>		
	</table>
	
		<table>	
			
			<tr class="Bodytext_bold" >
				<td height="30"  style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;"><b>Search Options: </b> </td>
				<td>
							
				</td>	
				<td><span class="bodytext_normal">From</span><input name="from" title="Enter From date" id="from" placeholder="From date" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="textarea" size="17"/></td>
				<td><span class="bodytext_normal">To<input name="to" id="to" title="Enter To date" type="text" placeholder="To date" value="<?php if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="textarea" size="17"/></td>
				<td align="left"><input type="button" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchbydate();"/></td>			
				<!--<td align="left"><input type="button" id="export" class="button" value="Export to Excel"/></td>
				<td align="left"><a href="/ayushman/ccashreceipt/viewnewreceipt"><input type="button" class="button" value="New Receipt"/></a></td>-->
				<input type="hidden" id="exportto" name="exportto" value="" />
			</tr>
		
	</table>
		
	 <table>
		<tr>
		<td width="1%">&nbsp;</td>
		<td style="width:98%;" >
    		<div id="doctorappointmentsgrid" >
				<div id="admingrid" align=center >
    		
					<?php
					$adminjqgridrequest= Request::factory('xjqgridcomponent/index');
					$adminjqgridrequest->post('name','ayushchqdds'); // name of gqgrid without space
					$adminjqgridrequest->post('height','320');
					$adminjqgridrequest->post('width','830');
					$adminjqgridrequest->post('sortname','chequedate_c');
					$adminjqgridrequest->post('sortorder','asc');
					$adminjqgridrequest->post('tablename','ayushchqdd');//used for jqgrid
					$adminjqgridrequest->post('columnnames','chequedate_c,chequeno_c,bankname_c,chequedate_c,status_c,branchname_c,chequeno_c');//used for jqgrid
					$adminjqgridrequest->post('whereclause', $whereclause);
					$columninfo ='[{"name":"Cheque date", "index":"chequedate_c","width":60, "hidden":false,"align":"center"},
									{"name":"Cheque/Draft No.", "index":"chequeno_c","width":60, "align":"left"},
									{"name":"Bank Details","index":"bankname_c","width":100,"align":"left","hidden":false},
									{"name":"Date of deposit","index":"chequedate_c","width":60,"align":"left"},
									{"name":"Cheque status","index":"status_c","width":50,"align":"left"},
									{"name":"Bank Name","index":"branchname_c","width":50,"align":"left"},
									{"name":"Action","index":"chequeno_c","width":100,"align":"left","formatter":actionFormatter,"align":"left"},]';
					
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
	</div>