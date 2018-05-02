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
	function exporttoexcel()
	{
		var whereclause = "";
		switch($('#accounttype').val())
		{
			case 'collectionaccountuserid':
				whereclause = '[accountcode,=,<?php echo $collection; ?>]';
				break;
			case 'provisionaccountuserid':
				whereclause = '[accountcode,=,<?php echo $provision; ?>]';
				break;
			case 'ayushmanincomeuserid':
				whereclause = '[accountcode,=,<?php echo $income; ?>]';
				break;
		}
		window.location = "/ayushman/caccountstatement/export?table=statements&columns=statementcode,datetime,description,benificiery,credit,debit,netbalance&whereclause="+whereclause+"&groupby=&sidx=statementcode&sord=desc";
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
</script>
</head>
<body bgcolor="#FFFFFF" style="body_bg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<div  style="width:828px;border:none; height:380px; padding-left:0px;" style="content_bg">
  		<table width="820px" border="0" cellspacing="0" cellpadding="0" style="padding:3px;">
		<tr>
			<td align="left" valign="top" style="padding:0px;width:814px;">
				<table width="814px" border="0" cellspacing="0" cellpadding="0" style="padding:0px;">
					<tr>
						<td width="99%" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Statement</td>
					</tr>
					<tr>
						<td style="padding:0px;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									 <tr>
										  <td align="left" valign="middle" class="search_Bg">
											<form id="searchform" method="post" enctype="multipart/form-data"  action="/ayushman/caccountstatement/viewadminstatements"  >
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="5%" height="30" align="right"><span class="bodytext_normal">From : </span></td>
													<td width="15%">&nbsp;
														<input name="fromdate" id="fromdate" type="text" class="textarea" value="" size="17"/>
													</td>
													<td width="5%" height="30" align="right"><span class="bodytext_normal" >To : </span></td>
													<td width="15%">&nbsp;
														<input name="todate" id="todate" class="textarea" type="text" value="" size="17"/>
													</td>
													<td width="13%" align="right" class="bodytext_normal">Transaction Type :</td>
													<td width="8%">&nbsp;
														<select name="transactiontype" size="1" style="width:100px;" class="textarea">
															<option value="Select">Select</option>
															<option value="Credit">Credit</option>
															<option value ="Debit">Debit</option>
														</select>
													</td>
													<td width="15%" rowspan="2">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td width="10%">&nbsp;</td>
																<td width="75%" align="center" valign="middle" >&nbsp;</td>
																<td width="50%" align="center" valign="middle">&nbsp;</td>
															</tr>
															<tr>
																<td width="10%">&nbsp;</td>
																<td  width="75%" align="left"><span class="bodytext_normal"><input style="width:100%;" type="submit" class="button" value="Search" /></span></td>
																<td width="50%" align="center" valign="middle">&nbsp;</td>
															</tr>
															<tr>
																<td width="10%">&nbsp;</td>
																<td width="75%" align="center" valign="middle" >&nbsp;</td>
																<td width="50%" align="center" valign="middle">&nbsp;</td>
															</tr>
															<tr>
																<td width="10%">&nbsp;</td>
																<td width="75%" align="center" valign="middle" class="button" onclick="exporttoexcel();">Export to .xls</td>
																<td width="50%" align="center" valign="middle">&nbsp;</td>
															</tr>
															<tr>
																<td width="10%">&nbsp;</td>
																<td width="75%" align="center" valign="middle" >&nbsp;</td>
																<td width="50%" align="center" valign="middle">&nbsp;</td>
															</tr>
														</table>
													</td>
											</tr>
											<tr>
											  <td height="30" align="right"><span class="bodytext_normal">Benificiary : </span></td>
											  <td>&nbsp;
												<input name="benificiary" id="benificiary" class="textarea" type="text" size="17"/></td>
											  <td height="30" align="right"><span class="bodytext_normal">Transaction : </span></td>
											  <td>&nbsp;
												 <select name="description" size="1" style="width:150px;" class="textarea">
													<option>Select</option>
													<?PHP  
														foreach ($types as $type) { 										
															print "<option  \" value=\"{$type->typename_c}\">{$type->typename_c}</option>";
														} 
													?>
												</select></td>
												<td width="13%" align="right" class="bodytext_normal">Select Account :</td>
												<td width="8%">&nbsp;
													<select name="accounttype" id="accounttype" size="1" style="width:100px;" class="textarea">
														<option value="collectionaccountuserid">Collection account</option>
														<option value="provisionaccountuserid">Provision account</option>
														<option value ="ayushmanincomeuserid">Ayushman Income</option>
													</select>
												</td>
											  </tr>
											
										  </table>
										  </form>
										  </td>
										  </tr>
										  <tr>
											  <td><?php
													//this is emr grid for patient we can put this in other page
													$userid = $userid;
													
													$plansgrid= Request::factory('xjqgridcomponent/index');
													$plansgrid->post('name','statements');
													$plansgrid->post('height','250');
													$plansgrid->post('width','815');
													$plansgrid->post('sortname','statementcode');
													$plansgrid->post('sortorder','desc');
													$plansgrid->post('tablename','statements');//used for jqgrid
													$plansgrid->post('columnnames', 'statementcode,datetime,description,benificiery,credit,debit,netbalance');//used for jqgrid
													$plansgrid->post('whereclause',$whereclause);//used for jqgrid
													$columninfo = '[
																		{"name":"Transaction Id","index":"transactionid","width":12,"hidden":false},							
																		{"name":"Date & Time","index":"datetime","width":18,"hidden":false},
																		{"name":"Descriptions","index":"description","width":10,"hidden":false},
																		{"name":"Primary Beneficiery","index":"benificiery","width":10,"hidden":false},
																		{"name":"Credit","index":"credit","width":10,"hidden":false,"align":"right"},
																		{"name":"Debit","index":"debit","width":10,"hidden":false,"align":"right"},
																		{"name":"Net Balance","index":"netbalance","width":30,"hidden":false,"align":"center"}
																	]';			
													$plansgrid->post('columninfo', $columninfo);
													$plansgrid->post('editbtnenable','false');
													$plansgrid->post('deletebtnenable','false');
													$plansgrid->post('savebtnenable','false');
													echo $plansgrid->execute(); ?>
													<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
														<tr>
															<td colspan="4">
																&nbsp;
															</td>
														</tr>
														<tr>
															<td width="40%" align="center" valign="middle" >&nbsp;</td>
															<td width="20%" >&nbsp;</td>
															<td width="40%" align="center" valign="middle">&nbsp;</td>
														</tr>
													</table>
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