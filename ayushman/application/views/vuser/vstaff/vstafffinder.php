<script type="text/javascript">

function city_value(val) {
	$.ajax({
		 url: "/ayushman/cstafffinder/selectedcity?city="+val,
			success: function( data ) {
				var location =JSON.parse(data);

				for(var iter = document.staffsearchform.location.length -1; iter >= 0; --iter)
				{
				 removeItemInList(iter);
				}
				//alert(location);
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
	}else 
	if(cellvalue == 'false')
	{
		return "Not Available";
	}else
	{
		return "No Information provided";
	}
}	
</script>
<div id="body_contantstaffpage" style="height:500px; width:828px"> 
	<table border="0" align="left" cellpadding="0" cellspacing="0">
       <tr>
			<td style="width:98%;" >
				<table width="100%" height="30px" border="0" cellpadding="0" cellspacing="0">
					<td style="width:1%;" >&nbsp;</td>
					<td/>
						<td class="bodyheading">Search for Staff</td>
					</tr>
				</table>   
			</td>
        </tr>
		<tr>
            <td style="width:800px;padding-top:7px;valign:top;" align="left">
            	<form id="staffsearchform" name="staffsearchform" action="searchbuttononclick" method="post" accept-charset="utf-8">
					<table style="width:500px;">
						<tr>
							<td width="60px">
								<input  name="textfield" style="margin-top:0px;" onfocus="if(this.value == 'Name') { this.value = ''; }" type="text" value="Name" />
							</td>
							<td width="120px">
								<select name="city" class="city" id="citylistbox" onchange="city_value(this.value)"> 
									<option value="">City</option>
									<?PHP  
										foreach ($array_city as $city) { 										
										echo "<option  value=\"{$city}\">{$city}</option>";
										} 
									?>
								</select>
							</td>
							<td width="80px">
								<select name="location" class="location"  id ="location">
									<option>Locality</option>
								</select>
							</td>
								<td width="150px">
								<select name="qualification" class="qualification"  id ="qualification">
									<option value="Qualification">Qualification</option>
										<?PHP  
										foreach ($array_qual as $qualification) { 										
										print "<option  value=\"{$qualification}\">{$qualification}</option>";
										} 
									?>
								</select>
							</td>
								
						
							<td width="70px" align="right" valign="top">
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
								$searchstaffjqgridrequest= Request::factory('xjqgridcomponent/index');
								$searchstaffjqgridrequest->post('name','search');
								$searchstaffjqgridrequest->post('height','280');
								$searchstaffjqgridrequest->post('width','810');
								$searchstaffjqgridrequest->post('sortname','staffid');
								$searchstaffjqgridrequest->post('tablename','searchedstaff');
								$url = "/ayushman/cdoctorfavoritestaff/addtofavorite?userid=".$userid."&staffid=<staffid>&staffuserid=<staffuserid>";
								$searchstaffjqgridrequest->post('columnnames', 'staffid,staffname,location_c,city_c,qualification_c,[(/ayushman/assets/images/add_button.png) {'.urlencode($url).'}]');
								$searchstaffjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
								$columninfosearch = '[
														{"name":"staffid","index":"staffid","hidden":true},
														{"name":"Name","index":"staffname","width":100,"hidden":false},
														{"name":"locality","index":"location_c","width":50},
														{"name":"City","index":"city_c","width":50},
														{"name":"Qualification","index":"qualification_c","width":50},
												{"name":"Add","index":"ADD","width":25,"align":"center","editable":true,"formatter":"link"}
													]';
								$searchstaffjqgridrequest->post('columninfo', $columninfosearch);
								$searchstaffjqgridrequest->post('editbtnenable','false');
								$searchstaffjqgridrequest->post('deletebtnenable','false');
								$searchstaffjqgridrequest->post('savebtnenable','false');
								echo $searchstaffjqgridrequest->execute(); ?>
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