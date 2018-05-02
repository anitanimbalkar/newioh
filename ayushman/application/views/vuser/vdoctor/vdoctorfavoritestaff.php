<script type="text/javascript">

$(document).ready(function() {
var add=<?= $checkadd ?>;

if(add==1){
	parent.sendmsgfromtemplate('pullgriddata','<?= $staffidadded ?>');	
}
	
});
	function city_value(val) {
		$.ajax({
			 url: "/ayushman/cstafffinder/selectedcity?city="+val,
				success: function( data ) {
					var location =JSON.parse(data);
					
					for(var iter = document.staffsearchform.location.length -1; iter >= 0; --iter)
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
		}else 
		if(cellvalue == 'false')
		{
			return "Not Available";
		}else
		{
			return "No Information provided";
		}
	}	
	function statusnameformatter(cellvalue, options, rowObject ){
			var chemistuserid =$(rowObject).children()[8].firstChild.data;
			return '<image id="img_presence_'+chemistuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}
</script>
<div id="body_contant23pagemax" style="padding:0px;" width="828px">
	<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:828px;">
		<tr>
	   		<td>
	   			<table border="0" align="left" cellpadding="0" style="padding-top:5px;" cellspacing="0" style="width:100%;">
     	 <tr style="padding:0px;">
     	 <td>
	  			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:828px;">
       					<tr  style="padding:0px;">
       	 				<td>&nbsp;</td>
          				 <td style="width:98%;" >
            				<table width="100%" height="20px" border="0" cellpadding="0" cellspacing="0">
          		 					<tr  style="padding:0px;">
            						<td class="bodyheading">My Staff</td>
          							</tr>
        					</table>   
            			</td>
      				  <td>
						&nbsp;
		</td>
        </tr>
        </table>
        </td>
        </tr>
        <tr style="padding:0px;">
     	 <td style="width:98%;">
      
					<table width="100%" height="36" cellpadding="0" cellspacing="0" >
						<tr  style="padding:0px;">
						<td>
								<?php
							$favoritestaffjqgridrequest= Request::factory('xjqgridcomponent/index');
							$favoritestaffjqgridrequest->post('name','favoritestaffbydoctordetail');
							$favoritestaffjqgridrequest->post('height','120');
							$favoritestaffjqgridrequest->post('width','810');
							$favoritestaffjqgridrequest->post('sortname','staffuserid');
							$favoritestaffjqgridrequest->post('tablename','favoritestaffbydoctordetail');
							$favoritestaffjqgridrequest->post('columnnames', 'doctorid,staffid,staffname,city_c,location_c,qualification_c,status,[(/ayushman/assets/images/-icon.png) {'.urlencode("/ayushman/cdoctorfavoritestaff/remove?userid=".$userid."&staffid=<staffid>&staffuserid=<staffuserid>").'} ],staffuserid');
							$favoritestaffjqgridrequest->post('whereclause',"[doctorid,=,".$doctorid."]");
							$columninfosearch = '[
							{"name":"doctorid","index":"doctorid","hidden":true},
							{"name":"staffid","index":"staffid","hidden":true},
							{"name":"Name","index":"staffname","width":140,"hidden":false,"formatter":statusnameformatter},
							{"name":"City","index":"city_c","width":75},
							{"name":"Locality","index":"location_c","width":75},
							{"name":"Qualification","index":"qualification_c","width":100},
							{"name":"Status","index":"status","width":100},	{"name":"Remove","index":"REMOVE","width":80,"align":"center","editable":true,"formatter":"link"},{"name":"staffuserid","index":"staffuserid","hidden":true}]';
							$favoritestaffjqgridrequest->post('columninfo', $columninfosearch);
							$favoritestaffjqgridrequest->post('editbtnenable','false');
							$favoritestaffjqgridrequest->post('deletebtnenable','false');
							$favoritestaffjqgridrequest->post('savebtnenable','false');
							echo $favoritestaffjqgridrequest->execute(); ?>
					</td>
				</tr>
						
			</table>
			</td></tr>
			<tr style="padding:0px;" >
       	 	<td style="padding:0px;">
			<hr style="color:#909090;"/>
		</td>
        </tr></table>
   			</td>
   		</tr>
   		<tr>
   			<td>
   	 			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:828px;">
       <tr>
       	 <td>&nbsp;</td>
           <td style="width:98%;" >
            	<table width="100%" height="20px" border="0" cellpadding="0" cellspacing="0">
          		 <tr>
            		<td class="bodyheading">Search for Staff</td>
          		</tr>
        		</table>   
            </td>
        <td>
			&nbsp;
		</td>
        </tr>
        </table>
        	</td>
        </tr>
        <tr>
        	<td>
        		<table border="0" align="left" cellpadding="0" style="padding:0 5px;" cellspacing="0" style="width:100%;">
   	 <tr>
            <td style="width:800px;paddings:0 5px;valign:top;" align="left">
            	<form id="staffsearchform" name="staffsearchform" action="searchbuttononclick" method="post" accept-charset="utf-8">
					<table border="0px;" style="width:550px;">
						<tr>
							<td style="width:90px;">
								<input  name="textfield" style="margin-top:0px;" onfocus="if(this.value == 'Name') { this.value = ''; }" type="text" value="Name" />
							</td>
							<td style="width:90px;">
								<select name="city" class="city" id="citylistbox" onchange="city_value(this.value)"> 
									<option value="">City</option>
									<?PHP  
										foreach ($array_city as $city) { 										
										print "<option  value=\"{$city}\">{$city}</option>";
										} 
									?>
								</select>
							</td>
							<td style="width:90px;">
								<select name="location" class="location"  id ="location">
									<option>Locality</option>
								</select>
							</td>
							<td style="width:90px;">
								<select name="qualification" class="qualification" id="qualification"> 
									<option value="Qualification">Qualification</option>
									<?PHP  
										foreach ($array_qual as $qual) { 										
										print "<option  value=\"{$qual}\">{$qual}</option>";
										} 
									?>
								</select>
							</td>
							
							
						
							
							<td  align="right" valign="top" style="width:90px;">
								<input type="submit" style="width:65px;height:20px;margin-left:10px;" class="button" value="Search" name="name"/>
							</td>
						</tr>
					</table>
				</form>
			</td>
          	 <td style="width:1%;" >&nbsp;</td>
        </tr>
        </table>
        	</td>
        </tr>
        <tr>
        	<td>
				<table border="0" align="left" cellpadding="0" style="padding:0 5px;" cellspacing="0" style="width:100%;">
					 <tr>
						 <td style="width:98%;">
								<table width="100%" height="36" cellpadding="0" cellspacing="0" >
									<tr>
									<td>
											
											<?php
											$searchchemistjqgridrequest= Request::factory('xjqgridcomponent/index');
											$searchchemistjqgridrequest->post('name','search');
											//$searchdocjqgridrequest->post('label','Search Doctor Result');
											$searchchemistjqgridrequest->post('height','120');
											$searchchemistjqgridrequest->post('width','810');
											$searchchemistjqgridrequest->post('sortname','staffuserid');
											$searchchemistjqgridrequest->post('tablename','searchedstaff');
											if($urole == "doctor"){$url = "/ayushman/cdoctorfavoritestaff/addtofavorite?userid=".$userid."&staffid=<staffid>&staffuserid=<staffuserid>";}
											$searchchemistjqgridrequest->post('columnnames', 'staffuserid,staffid,staffname,city_c,location_c,qualification_c,[(/ayushman/assets/images/add_button.png) {'.urlencode($url).'}],[View{'.urlencode("#").'}]');
											$searchchemistjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
											$columninfosearch = '[
																	{"name":"staffuserid","index":"staffuserid","hidden":true},
																	{"name":"staffid","index":"staffid","width":100,"hidden":true},
																	{"name":"Name","index":"staffname","width":100},
																	{"name":"City","index":"city_c","width":50},
																	{"name":"Location","index":"location_c","width":50},
																	{"name":"Qualification","index":"qualification_c","width":100},
																	{"name":"Add As Favourite","index":"ADD","width":20,"align":"center","editable":true,"formatter":"link"}
																
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
					</tr>
				 </table>
   	 		</td>
   	 </tr>
   	
        </table>
</div>
