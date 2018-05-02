<html>
<head>
	<title>Billing Plan Details</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
			<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
				<link href="/ayushman/assets/css/footable.core.css" rel="stylesheet" type="text/css"/>
				<link href="/ayushman/assets/css/footable-demos.css" rel="stylesheet" type="text/css"/>
				<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
				<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
				<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
				<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>
				<script src="/ayushman/assets/js/jquery-ui.min.js"></script>

				<script type="text/JavaScript">
					$(document).ready(function() {
					showdetails(<?php echo $planid; ?>);
            if($.trim($('#errorlistdiv').html()) != "")
                showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()) + '</br>You will not be able to create, edit the plan. </br>Please Contact system administrator.','error','errordialogboxid');
            if($.trim($('#messagelistdiv').html()) != "")
                showNotification('400','150','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
        });
        function showdetails(planid)
					{
						getplan(planid);
        }
        function getplan(planid)
					{
					if(planid == -1)
					{
						clear();
            }else{
					$.ajax({
						url: "/ayushman/cplanmanager/getplandetails?planid="+planid,
						success: function( data ) {
							data =  JSON.parse(data);
							if(data['type'] == 'error')
								showMessage('550','200','Retrieving plan',data['data'],data['type'],'id');
							else
							{
								plandetails = data['data'];
								element = document;
								elements = element.getElementsByTagName("label");
								for(var i=0; i<elements.length; i++)
								{
									if(plandetails[elements[i].id] != undefined)
									{
										elements[i].innerHTML = plandetails[elements[i].id];
									}
								}
								elements = element.getElementsByTagName("input");
								for(var i=0; i<elements.length; i++)
								{
									if(plandetails[elements[i].id] != undefined)
									{
										elements[i].value = plandetails[elements[i].id];
									}
								}
							}
						},
						error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
					});
            }
        }

				</script>

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div class="tab-section clearfix">
	<ul>
		<li>
			<a class="active-tab" href="javascript://"> Plan Details </a>
		</li>
		<!--<li>
			<a href="/ayushman/caccountstatement/viewFootable"> Statements </a>
		</li>
		<li>
			<a href="/ayushman/crecharge/view">Recharge  </a>
		</li>-->
	</ul>
</div>
<div class="slect-plan-section dignostic-container">

	<table style="width:100%; height:100%;" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td align="left" valign="top" class="body_bg">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<!--<tr>
					<td colspan="4"><table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">Selected Plan</td>
						</tr>
					</table></td>
				</tr>-->
                    <!--<tr>
					<td colspan="4" style="padding-left:7px; padding-right:7px; padding-top:7px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="4%">&nbsp;</td>
							<td width="18%" height="30" align="center" valign="middle" class="Rounded_buttonOrenge"><a href="#" style="color:#FFFFFF">Plan Details </a></td>
							<td width="2%">&nbsp;</td>
							<td width="18%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue"><a href="/ayushman/caccountstatement/view"  style="color:#FFFFFF">Statements</a></td>
							<td width="2%">&nbsp;</td>
							<td width="18%" align="center" valign="middle" class="Rounded_buttonBlue"><a href="/ayushman/crecharge/view" style="color:#FFFFFF">Recharge</a></td>
							<td width="38%">&nbsp;</td>
						</tr>
					</table>
					</td>
				</tr>-->




					<tr>
						<td colspan="4">
							<style type="text/css">
								table.imagetable {
								font-family: verdana,arial,sans-serif;
                                    font-size:11px;
                                    color:#333333;
                                    border-width: 1px;
                                    border-color: #5c91b1;
                                    border-collapse: collapse;
                                }
                                table.imagetable th {
								background:#5c91b1;
                                    border-width: 1px;
                                    padding: 0px;
                                    border-style: solid;
                                    border-color: #5c91b1;
                                }
                                table.imagetable td {
								border-width: 1px;
                                    padding: 0px;
                                    height:30px;
                                    border-style: solid;
                                    -moz-border-radius:2px;
                                    -webkit-border-radius:2px;
                                    -opera-border-radius:2px;
                                    -khtml-border-radius:2px;
                                    border-radius:2px;
                                    border-color: #5c91b1;
                                }
							</style>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
								<tr>
									<td height="29" align="center" valign="middle"><style type="text/css">
										table.imagetable {
										font-family: verdana,arial,sans-serif;
                                            font-size:11px;
                                            color:#333333;
                                            border-width: 1px;
                                            border-color: #5c91b1;
                                            border-collapse: collapse;
                                        }
                                        table.imagetable th {
										background:#5c91b1;
                                            border-width: 1px;
                                            padding: 0px;
                                            border-style: solid;
                                            border-color: #5c91b1;
                                        }
                                        table.imagetable td {
										border-width: 1px;
                                            padding: 0px;
                                            height:40px;
                                            border-style: solid;
                                            -moz-border-radius:2px;
                                            -webkit-border-radius:2px;
                                            -opera-border-radius:2px;
                                            -khtml-border-radius:2px;
                                            border-radius:2px;
                                            border-color: #5c91b1;
                                        }
									</style>

										<!--<div class="demo-container">
											<div class="tab-content">
												<div class="tab-pane active" id="demo">
													<table class="table demo" data-filter="#filter" data-page-size="5">
														<thead>
														<tr>
															<th data-hide="phone, tablet">
																Order Number
															</th>
															<th data-hide="phone,tablet">
																Order Date
															</th>
															<th data-toggle="true">
																Candidate Name
															</th>
															<th data-hide="phone" data-name="Package">
																Package
															</th>
															<th>
																Status
															</th>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td>10001</td>
															<td>05/10/2014</td>
															<td>Vik Raghavan</td>
															<td>Premiere</td>
															<td data-value="1"><span class="status-metro status-active" title="Active">Pending</span></td>
														</tr>
														<tr>
															<td>10001</td>
															<td>15/10/2014</td>
															<td>Vik Raghavan</td>
															<td>Premiere</td>
															<td data-value="2"><span class="status-metro status-disabled" title="Disabled">Pending</a></span></td>
								</tr>
								<tr>
									<td>10001</td>
									<td>08/10/2014</td>
									<td>Mandar Kulkarni</td>
									<td>Premiere</td>
									<td data-value="3"><span class="status-metro status-suspended" title="Suspended"><a href="#">View Report</a></span>
									</td>
								</tr>
								<tr>
									<td>10001</td>
									<td>20/10/2014</td>
									<td>Vik Raghavan</td>
									<td>Premiere</td>
									<td data-value="2"><span class="status-metro status-disabled" title="Disabled">Pending</span></td>
								</tr>
								<tr>
									<td>10001</td>
									<td>25/10/2014</td>
									<td>Mandar Kulkarni</td>
									<td>Premiere</td>
									<td data-value="3"><span class="status-metro status-suspended" title="Suspended"><a href="#">View Report</a></span>
									</td>
								</tr>
								<tr>
									<td>10001</td>
									<td>07/10/2014</td>
									<td>Vik Raghavan</td>
									<td>Premiere</td>
									<td data-value="2"><span class="status-metro status-disabled" title="Disabled">Pending</span></td>
								</tr>
								<tr>
									<td>10001</td>
									<td>02/10/2014</td>
									<td>Mandar Kulkarni</td>
									<td>Premiere</td>
									<td data-value="3"><span class="status-metro status-suspended" title="Suspended"><a href="#">View Report</a></span>
									</td>
								</tr>
								<tr>
									<td>10001</td>
									<td>01/10/2014</td>
									<td>Vik Raghavan</td>
									<td>Premiere</td>
									<td data-value="2"><span class="status-metro status-disabled" title="Disabled">Pending</span></td>
								</tr>
								<tr>
									<td>10001</td>
									<td>11/10/2014</td>
									<td>Mandar Kulkarni</td>
									<td>Premiere</td>
									<td data-value="3"><span class="status-metro status-suspended" title="Suspended"><a href="#">View Report</a></span>
									</td>
								</tr>
								<tr>
									<td>10001</td>
									<td>18/10/2014</td>
									<td>Vik Raghavan</td>
									<td>Premiere</td>
									<td data-value="2"><span class="status-metro status-disabled" title="Disabled">Pending</span></td>
								</tr>
							</tbody>
							<tfoot class="hide-if-no-paging">
							<tr>
								<td colspan="5">
									<div class="pagination pagination-centered"></div>
								</td>
							</tr>
							</tfoot>
				</table>
</div>


</div>
</div> -->


<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="imagetable select-plan-table" >
	<tr>
		<td width="50%" height="60" align="left" valign="middle" class="Blue_Gradient_Bg"><span class="bodytext_bold">Plan Name</span></td>
		<td width="50%" align="left" valign="middle" class="bodytext_normal"><span class="style5"><label name="planname" id="planname"></label></span></td>
	</tr>
	<tr>
		<td width="50%" align="left" class="Blue_Gradient_Bg"><span class="bodytext_bold">Description</span></td>
		<td width="50%" align="left" valign="middle" class="bodytext_normal"><label name="plandescription" id="plandescription"></label></td>
	</tr>
	<tr>
		<td width="50%" align="left" class="Blue_Gradient_Bg"><span class="bodytext_bold">Reg. Charges</span></td>
		<td width="50%" align="left" valign="middle" class="bodytext_normal">Rs.<label name="regcharges" id="regcharges"></label></td>
	</tr>
	<tr >
		<td width="50%" align="left" class="Blue_Gradient_Bg"><span class="bodytext_bold">Subscription Charges</span></td>
		<td width="50%" class="bodytext_normal">Rs.<label id="subcharges" id="subcharges" ></label>&nbsp;&nbsp;For Every&nbsp;<label align="left" id="duration" id="duration" ></label>&nbsp;Months.</td>
	</tr>
	<!--	  <tr >
	<td align="center"><span class="bodytext_bold">Periodicity</span></td>
	<td colspan="5" class="bodytext_normal" style="padding-left:20px; text-align:left"> <label align="left" id="duration" id="duration" ></label>&nbsp;Months</td>
</tr> -->
	<tr >
		<td width="50%" align="left"><span class="bodytext_bold">Service Charges for fixing appointment (per appointment)</span></td>
		<td width="50%" class="bodytext_normal">Rs.<label id="servicecharges" id="servicecharges" ></label></td>
	</tr>
	<tr >
		<td width="50%" align="left"><span class="bodytext_bold">Service Charges for Cancelling appointment (per appointment)</span></td>
		<td width="50%" class="bodytext_normal">Rs.<label id="servicecharges" id="servicecharges" ></label></td>
	</tr>
	<tr >
		<td width="50%" align="left"><span class="bodytext_bold">Service Charges for Placing Diagnostic Order (per order)</span></td>
		<td width="50%" class="bodytext_normal">Rs.<label id="servicecharges" id="servicecharges" ></label></td>
	</tr>



	<!--<tr>
	<td class="Blue_Gradient_Bg">&nbsp;</td>
	<td class="Blue_Gradient_Bg"><span class="bodytext_bold">Online Consultation</span></td>
	<td align="center" valign="middle" class="Blue_Gradient_Bg"><span class="bodytext_bold">Phone Consultation</span></td>
	<td class="Blue_Gradient_Bg"><span class="bodytext_bold">In Clinic Consultation</span></td>

	<td class="Blue_Gradient_Bg">&nbsp;</td>
</tr>-->
	<tr>
		<td width="50%" height="60" class="Blue_Gradient_Bg"><span class="bodytext_bold">Platform Usage Charges During Consultation<br>
									</span><span class="bodytext_normal" color="red">(Upto 10 Mins.)</span></td>
		<td width="50%">
			<table class="platform-charges-col">
				<tr>
					<td width="14%" align="center" valign="middle" class="bodytext_normal">
						<span class="col-label">Online</span>
						<span class="bodytext_normal">Rs.<label align="left" id="onlinecharges"></label></span>
					</td>
					<td width="14%" align="center" valign="middle" class="bodytext_normal">
						<span class="col-label">Phone</span>
						<span class="bodytext_normal">Rs.<label align="left" id="phonecharges"></label></span>
					</td>
					<td width="17%" align="center" valign="middle" class="bodytext_normal in-clinic">
						<span class="col-label">In Clinic</span>
						<span class="bodytext_normal">Rs.<label align="left" id="cliniccharges"></label></span>
					</td>
				</tr>
			</table>
		</td>

	</tr>
	<tr>
		<td width="50%" height="60" class="Blue_Gradient_Bg"><span class="bodytext_bold">Extended Usage Charge<br>
								</span><span class="bodytext_normal">(per 5 min. of extension)</span></td>
		<td class="extended-charge-col" width="50%">
			<table>
				<tr>
					<td class="bodytext_normal" align="center" valign="middle">
						<span class="col-label">Online</span>
						<span  class="bodytext_normal">Rs.<label align="left" id="onlinecharges"></label></span>
					</td>
					<td align="center" valign="middle" class="bodytext_normal">
						<span class="col-label">Phone</span>
						<span class="bodytext_normal">Rs.<label align="left" id="phonecharges"></label></span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table></td>
</tr>
</table>
</td>
</tr>
</table>
<div style="padding-bottom:10px;" >
	<table class="select-plan-col" width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="50%" align="left" width="60%" height="50%" valign="middle" class="bodytext_normal" >To associate or disassociate with corporate account, <a onclick="parent.getcontent('/ayushman/ccorporateaccountmanager/showMemberValidationForm');" href="javascript:void(0);"><font class="bodytext_bold" color="blue">Click Here</font></a></td>
			<td width="50%" align="center" align="middle" >
				<a onclick="window.location = '/ayushman/cplanselector/view'" id="selectbutton" class="button selcet-plan-btn" href="#">Select Plan</a>
			</td>
		</tr>
	</table>
</div>
<div class="clearfix" style="margin-bottom:20px">&nbsp;</div>
</td>
</tr>
</table>
</div>
<input name="iscorporatemember" id="iscorporatemember" value="<?php echo $isCorporateMember; ?>" type="hidden"/>
<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors, 'plan'); ?>
	</div>
	</div>
	<div style="display:none;">
		<div class="bodytext_normal" id="messagelistdiv">
			<?= Arr::path($messages,'noplan') ; ?>
            <?= Arr::path($messages,'message'); ?>

		</div>
	</div>

	<script src="/ayushman/assets/js/footable.js" type="text/javascript"></script>
	<!--<script src="/ayushman/assets/js/footable.sort.js" type="text/javascript"></script>
	<script src="/ayushman/assets/js/footable.filter.js" type="text/javascript"></script>
	<script src="/ayushman/assets/js/footable.paginate.js" type="text/javascript"></script>
	<script src="/ayushman/assets/js/footable.bookmarkable.js" type="text/javascript"></script>-->
	<script type="text/javascript">
		$(function () {
		$('table').footable({bookmarkable: { enabled: true }}).bind({
			'footable_filtering': function (e) {
				var selected = $('.filter-status').find(':selected').text();
				if (selected && selected.length > 0) {
					e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
					e.clear = !e.filter;
				}
			},
			'footable_filtered': function() {
				var count = $('table.demo tbody tr:not(.footable-filtered)').length;
				$('.row-count').html(count + ' rows found');
			}
		});

	$('.clear-filter').click(function (e) {
		e.preventDefault();
	$('.filter-status').val('');
	$('table.demo').trigger('footable_clear_filter');
	$('.row-count').html('');
	});

	$('.filter-status').change(function (e) {
		e.preventDefault();
	$('table.demo').data('footable-filter').filter( $('#filter').val() );
	});
	});
	</script>

	</body>
	</html>
