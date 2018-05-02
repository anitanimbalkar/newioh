<script type="text/javascript">
function city_value(val) {
	$.ajax({
		 url: "/ayushman/cchemistdirectory/selectedcity?city="+val,
			success: function( data ) {
				var location =JSON.parse(data);
				for(var iter = document.chemistsearchform.location.length -1; iter >= 0; --iter)
				{
				 	removeItemInList(iter);
				}
				additemtolocation("Locality");
				for(i=0;i< location.length;i++)
				{
					var list = document.getElementById("location").options;
					additemtolocation(location[i]);
				}
			},
			error : function(){alert("error while selecting city tests");}					
		});	
}

function removeItemInList(i)
{
    var list  = document.getElementById('location');
    list.remove(i);
}
function additemtolocation (locationvalue)
{  
    var opt = document.createElement("option");
    opt.text =locationvalue
    opt.value = locationvalue;
    document.getElementById("location").options.add(opt);       
}
function setavailability( cellvalue, options, rowObject )
{
	if(cellvalue == 'true')
	{
		return "Available";
	}else if(cellvalue == 'false')
	{
		return "Not Available";
	}else
	{
		return "No Information provided";
	}
}	
</script>
<div id="body_contantpatientpage" style="height:500px; width:828px"> 
	<table border="0" align="left" cellpadding="0" cellspacing="0">
       <tr>
			<td style="width:98%;" >
				<table width="100%" height="30px" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td style="width:1%;" >&nbsp;</td>
						<td class="bodyheading">Search for Chemist</td>
					</tr>
				</table>   
			</td>
        </tr>
		<tr>
            <td style="width:800px;padding-top:7px;valign:top;" align="left">
            	<form id="chemistsearchform" name="chemistsearchform" action="searchbuttononclick" method="post" accept-charset="utf-8">
					<table style="width:550px;">
						<tr>
							<td width="80px">
								<input  name="textfield" style="margin-top:0px;" onfocus="if(this.value == 'Name') { this.value = ''; }" type="text" value="Name" />
							</td>
							<td width="50px">
								<select name="city" class="city" id="citylistbox" onchange="city_value(this.value)"> 
									<option value="">City</option>
									<?PHP  
										foreach ($array_city as $city) { 										
										print "<option  value=\"{$city}\">{$city}</option>";
										} 
									?>
								</select>
							</td>
							<td width="50px">
								<select name="location" class="location"  id ="location">
									<option>Locality</option>
								</select>
							</td>
							<td width="80px">
								 <select name="homedeliveryfacility" class="location"  id ="homedeliveryfacility">
									<option value="" selected="">Home Delivery Facility</option>
									<option value="true"  >Available</option>
									<option value="false"  >Not Available</option>
								</select>
							</td>
							<td width="70px" align="left" valign="top">
								<input type="submit" style="width:65px;height:20px;margin-left:10px;" class="button" value="Search" name="name"/>
							</td>
						</tr>
					</table>
				</form>
			</td>
          	<td style="width:1%;" >&nbsp;</td>
        </tr>
		<tr>
			<td style="width:98%;">
				<table width="100%" height="36" cellpadding="0" cellspacing="0" >
					<tr>
						<td>
							<?php
								$searchchemistjqgridrequest= Request::factory('xjqgridcomponent/index');
								$searchchemistjqgridrequest->post('name','search');
								//$searchdocjqgridrequest->post('label','Search Doctor Result');
								$searchchemistjqgridrequest->post('height','280');
								$searchchemistjqgridrequest->post('width','810');
								$searchchemistjqgridrequest->post('sortname','chemistuserid');
								$searchchemistjqgridrequest->post('tablename','searchedchemist');
								if($urole == "doctor"){$url = "/ayushman/cdoctorfavoritechemist/addtofavorite?userid=".$userid."&chemistid=<chemistid>&chemistuserid=<chemistuserid>";}else if($urole=="patient"){$url = "/ayushman/cpatientfavoritechemist/addtofavorite?userid=".$userid."&chemistid=<chemistid>&chemistuserid=<chemistuserid>";}else if($urole=="staff"){$url = "/ayushman/cstafffavoritechemist/addtofavorite?userid=".$userid."&chemistid=<chemistid>&chemistuserid=<chemistuserid>";}
								$searchchemistjqgridrequest->post('columnnames', 'chemistuserid,chemistid,medicalname,city,location,workinghours,homedeliveryfacility,WeeklyOffday,[(/ayushman/assets/images/add_button.png) {'.urlencode($url).'}],[View{'.urlencode("#").'}]');
								$searchchemistjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
								$columninfosearch = '[
														{"name":"chemistuserid","index":"chemistuserid","hidden":true},
														{"name":"chemistid","index":"chemistid","width":100,"hidden":true},
														{"name":"Name","index":"medicalname","width":100},
														{"name":"City","index":"city","width":50},
														{"name":"Location","index":"location","width":50},
														{"name":"Working Hours","index":"workinghours","width":100},
														{"name":"Home Delivery","index":"homedeliveryfacility","width":100,"formatter":setavailability},	
														{"name":"Weekly Off Day","index":"WeeklyOffday","width":100},	
														{"name":"Add As Favourite","index":"ADD","width":20,"align":"center","editable":true,"formatter":"link"},
														{"name":"Profile","index":"profile","width":30,"align":"center","editable":true,"formatter":"link"}
													]';
								$searchchemistjqgridrequest->post('columninfo', $columninfosearch);
								$searchchemistjqgridrequest->post('editbtnenable','false');
								$searchchemistjqgridrequest->post('deletebtnenable','false');
								$searchchemistjqgridrequest->post('savebtnenable','false');
								echo $searchchemistjqgridrequest->execute(); ?>
						</td>
					</tr>
				</table>
			</td>
		 	<td style="width:1%;" >&nbsp;</td>
		</tr>
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:98%;">&nbsp;</td>
			<td style="width:1%;" >&nbsp;</td>
		</tr>
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:98%;">&nbsp;</td>
			<td style="width:1%;" >&nbsp;</td>
		</tr>
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:98%;">&nbsp;</td>
			<td style="width:1%;" >&nbsp;</td>
		</tr>
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:98%;">&nbsp;</td>
			<td style="width:1%;" >&nbsp;</td>
		</tr>
		
    </table>
 </div>