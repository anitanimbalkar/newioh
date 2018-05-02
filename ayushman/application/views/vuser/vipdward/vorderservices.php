<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
 $(document).ready(function() {
$(function() {
	$( "#tabs" ).tabs();
			$( "#acceptdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0});
		});
	});
function actionformatter( cellvalue, options, rowObject )
	{	
			var testid =$(rowObject).children()[0].firstChild.data;
			//var rate =$(rowObject).children()[3].firstChild.data;
			//alert(rate);
		return '<a href="#" onclick="openacceptaction('+testid+','+cellvalue+');"><font color="#0000FF">Accept</font></a>';
	}

		function openacceptaction(testid,rate)
	{
						
			var patid = document.getElementById('patId').value;
			//var admitdate =$(rowObject).children()[2].firstChild.data;
			var qty = document.getElementById('qty').value;
			var acceptdate = document.getElementById('acceptdate').value;
			alert(qty);
   			 if (confirm("Do you Really want to accept?") == true) {
    		    $.ajax({
				type: "get",
				url: "/ayushman/cipdwardpatient/saveorder?patid="+patid+"&patid="+patid+"&testid="+testid+"&qty="+qty+"&rate="+rate+"&acceptdate="+acceptdate,
				
				success:function( data ){
					console.log(data);
				},
				error:
				function(){
					showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
				},
			});
    		} else {
    		    x = "You pressed Cancel!";
    		}
    		window.location.reload();
    }
		
function checkactionformatter( cellvalue, options, rowObject )
	{
		return '<input class="item" type="checkbox"  id="btnpermission"  />';
	}

	function qtyactionformatter( cellvalue, options, rowObject )
	{
		return '<input class="item" value=1 type="number" id="qty" size=4 />';
	}

	function dateactionformatter( cellvalue, options, rowObject )
	{
	return '<input id="acceptdate"  value=<?php echo date('"d M Y"'); ?>  />';
	}

</script>
<div id="contentdiv" style="width:831px;overflow-y:auto;">
	<div id="tabs" style="float:left;vertical-align:top;height:auto;width:825px;position:relative;overflow-y:auto;background:transparent;border:none;">
		<ul class="tabholder" style="background-color:none;background:none;border:none;">		
			<li class="TopBtn_bg"><a href="#tabs-1" >Services</a></li>
			<li class="TopBtn_bg"><a href="#tabs-2">Orders Placed</a></li>
	</ul>
	    <input id = "patId" name="patId" value="<?php echo "$patid"; ?>" type="hidden" >

		<div id="tabs-1" style="height:auto;padding-left:2px;padding-top:2px;">	
				<table border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td style="width:818px;">
							<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
								<tr>
									<td >
				<?php
					$userid =  $userid;
					$patjqgridrequest= Request::factory('xjqgridcomponent/index');
					$patjqgridrequest->post('name','catalogs');
					$patjqgridrequest->post('height','250');
					$patjqgridrequest->post('width','810');
					$patjqgridrequest->post('sortname','Catagory');
					$patjqgridrequest->post('sortorder','asc');
					$patjqgridrequest->post('tablename','catalog');//used for jqgrid
					$patjqgridrequest->post('columnnames', 'id,LabTestName,id,SellingPrice,SellingPrice');//used for jqgrid
					$patjqgridrequest->post('whereclause',"[pathologistid,=,".$pathologistid."]");//used for jqgrid
					$columninfo = '[{"name":"id","index":"id","hidden":true},
									{"name":"Test Name","index":"LabTestName","width":5},
									{"name":"Date","formatter":dateactionformatter,"index":"SellingPrice","width":5,"editable":true},
									{"name":"Quantity","formatter":qtyactionformatter,"index":"SellingPrice","width":5,"editable":true},
									{"name":"Action","index":"accept","width":5,"align":"left","editable":false,"formatter":actionformatter},

									]';

					$patjqgridrequest->post('columninfo', $columninfo);
					//if save,edit,delete we dont want in jqgrid set it to false
					$patjqgridrequest->post('editbtnenable','false');
					$patjqgridrequest->post('deletebtnenable','false');
					$patjqgridrequest->post('savebtnenable','false');
					$patjqgridrequest->post('search','true');
					if($previousvalues != null)
						$previousvaluessearch = $previousvalues['search']; 
					else
					 	$previousvaluessearch = "";
					$patjqgridrequest->post('previousvaluessearch',$previousvaluessearch);	
					echo $patjqgridrequest->execute(); ?>
				
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
		</div>
		<div id="tabs-2" style="height:auto;padding-left:2px;padding-top:2px;" >	
			<table border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:818;">
						<table width="100%" height="100%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
											$userid =  $userid;
											$patjqgridrequest= Request::factory('xjqgridcomponent/index');
											$patjqgridrequest->post('name','wardchargedetails');
											$patjqgridrequest->post('height','250');
											$patjqgridrequest->post('width','810');
											$patjqgridrequest->post('sortname','chargename');
											$patjqgridrequest->post('sortorder','asc');
											$patjqgridrequest->post('tablename','wardchargedetail');//used for jqgrid
											$patjqgridrequest->post('columnnames', 'chargename,quantity,chargedate');//used for jqgrid
											$patjqgridrequest->post('whereclause',"[patientid,=,".$patid."]");//used for jqgrid
											$columninfo = '[
															{"name":"Test Name","index":"chargename","width":5},
															{"name":"Quantity","index":"quantity","width":5,"editable":true},
															{"name":"Date","index":"chargedate","width":5,"align":"center","editable":false},

															]';

											$patjqgridrequest->post('columninfo', $columninfo);
					//if save,edit,delete we dont want in jqgrid set it to false
											$patjqgridrequest->post('editbtnenable','false');
											$patjqgridrequest->post('deletebtnenable','false');
											$patjqgridrequest->post('savebtnenable','false');
											$patjqgridrequest->post('search','true');
												if($previousvalues != null)
											$previousvaluessearch = $previousvalues['search']; 
												else
					 						$previousvaluessearch = "";
											$patjqgridrequest->post('previousvaluessearch',$previousvaluessearch);	
											echo $patjqgridrequest->execute(); ?>
											</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
<!-- <div id="acceptaction" title="Delivery date">
		<form id="acceptactionform">
			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:100%;"></td>
				</tr>
				<tr>
					<td style="width:50%;height:50px;valign:top;">
						<label  style="font-size:9pt;height:15pt;">Delivery date :</label>
						<input id="deliverydate1" readonly="readonly" style="margin-left:5px;width:200px;height:15pt;border:none;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;"/>
					</td>
				</tr>
			</table>
		</form>
		<input id="orderid" type = "hidden"/>
	</div>

 --><div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>
