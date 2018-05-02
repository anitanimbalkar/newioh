<html>
<head>
<title>Billing Statement</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<script type="text/JavaScript">
	$(document).ready(function() {$(function() {
			$( "#fromdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");

				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				if(curr_month == 0){
				  $( "#fromdate" ).val(curr_date + " " + m_names[11] + " " + (curr_year - 1));
				}else{
				    $( "#fromdate" ).val(curr_date + " " + m_names[curr_month-1] + " " + curr_year);
				}
			$( "#todate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				$( "#todate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
			});
			$('#benificiary').autocomplete({source:"/ayushman/cautocompletedata/retrieve?query=select distinct(benificiery) as value, 1 as id from statements where benificiery",
					select: function(event, ui) {
					
											},
					minLength: 2,
					disabled: false
				});
	});
	
</script>
</head>
<body bgcolor="#FFFFFF" style="body_bg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<div  style="width:828px;border:none; height:500px; padding:3px;" style="content_bg">
  		<table width="99%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="4">
					<table width="99%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="99%" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7" />&nbsp;&nbsp;Statements</td>
						</tr>
					</table>
				</td>
					</tr>
					<tr>
						<td colspan="4">
								<table width="99%" border="0" cellspacing="0" cellpadding="0" style="margin:4px;">
									 <tr>
										  <td align="left" valign="middle" class="search_Bg">
											<form id="searchform" method="post" enctype="multipart/form-data"  action="/ayushman/caccountstatement/view"  >
												<table width="100%" border="0" cellspacing="0" style="padding:10px;" cellpadding="3px">
													<tr>
														<td align="left"><span class="bodytext_normal">From</span></td>
														<td align="left"><input name="fromdate" id="fromdate" type="text" value="" class="textarea" size="17"/></td>
														<td align="left"><span class="bodytext_normal">To</span></td>
														<td align="left"><input name="todate" id="todate" type="text" value="" class="textarea" size="17"/></td>
														<td align="left"><span class="bodytext_normal">Transaction Type</span></td>
														<td width="8%">
															<select name="transactiontype" size="1" style="width:100px;" class="textarea">
																<option value="Select">Select</option>
																<option value="Credit">Credit</option>
																<option value ="Debit">Debit</option>
															</select>
														</td>
													</tr>
													<tr>
														<td align="left"><span class="bodytext_normal">Benificiary</span></td>
														<td align="left"><input name="benificiary" id="benificiary" type="text" value="" class="textarea" size="17"/></td>
														<td align="left"><span class="bodytext_normal">Transaction</span></td>
														<td align="left">
															<select name="description" size="1" style="width:150px;" class="textarea">
																<option>Select</option>
																<?PHP  
																	foreach ($types as $type) { 										
																		print "<option  \" value=\"{$type->typename_c}\">{$type->typename_c}</option>";
																	} 
																?>
															</select>
														</td>
														<td align="left">&nbsp;</td>
														<td align="left"><span class="bodytext_normal"><input type="submit" class="button" value="Search" /></span></td>
														
													</tr>
											  </table>
											</form>
										  </td>
										  </tr>
										  <tr>
											  <td width="100%"><?php
													//this is emr grid for patient we can put this in other page
													$userid = $userid;
													
													$plansgrid= Request::factory('xjqgridcomponent/index');
													$plansgrid->post('name','statements');
													$plansgrid->post('height','220');
													$plansgrid->post('width','820');
													$plansgrid->post('sortname','statementcode');
													$plansgrid->post('sortorder','desc');
													$plansgrid->post('tablename','statements');//used for jqgrid
													$plansgrid->post('columnnames', 'statementcode,datetime,description,benificiery,credit,debit,netbalance');//used for jqgrid
													$plansgrid->post('whereclause',$whereclause);//used for jqgrid
													$columninfo = '[
																		{"name":"Transaction Id","index":"transactionid","width":100,"hidden":false},							
																		{"name":"Date & Time","index":"datetime","width":120,"hidden":false},
																		{"name":"Descriptions","index":"description","width":120,"hidden":false},
																		{"name":"Payee/Payer","index":"benificiery","width":120,"hidden":false},
																		{"name":"Credit (Rs.)","index":"credit","width":60,"hidden":false,"align":"right"},
																		{"name":"Debit (Rs.)","index":"debit","width":60,"hidden":false,"align":"right"},
																		{"name":"Net Balance (Rs.)","index":"netbalance","width":120,"hidden":false,"align":"left"}
																	]';			
													$plansgrid->post('columninfo', $columninfo);
													$plansgrid->post('editbtnenable','false');
													$plansgrid->post('deletebtnenable','false');
													$plansgrid->post('savebtnenable','false');
													echo $plansgrid->execute(); ?>
												<!--	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
														<tr>
															<td colspan="4">
																&nbsp;
															</td>
														</tr>
														<tr>
															<td width="50px">&nbsp;</td>
															<td width="auto" align="center" valign="middle" ><img src="/ayushman/assets/images/Btn_EmailPDF.png" width="103" height="21">&nbsp;<img src="/ayushman/assets/images/Btn_PDF.png" width="64" height="21">&nbsp;<img src="/ayushman/assets/images/BtnPrint.png" width="64" height="21"></td>
															<td width="100px" align="center" valign="middle">&nbsp;</td>
															<td width="50px" align="center" valign="middle">&nbsp;</td>
														</tr>
													</table> -->
												</td>
											</tr>
										<tr>
										  <td width="23%">&nbsp;</td>
										  <td width="28%">&nbsp;</td>
										  <td width="27%">&nbsp;</td>
										  <td width="22%">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>