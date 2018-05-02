

	<div id="patimmunization" style="height:auto;">
	<table width="95%">
			
	<!--Patient Immunization details -->
	<tr><td colspan="13"><div  align="center"  style="height:11pt;width:85%;padding-top:2px;font-size:9pt;"  class="Leftmenuheading"><label  style="font-family:Verdana, Arial, Helvetica, sans-serif; "> Patient Immunization History</label></div></td> </tr>	
			
			<tr   width="100%">    
                 <td colspan="5" >
				 	<?php
			
 				$userid =  $user->id;
				$patjqgridrequest= Request::factory('xjqgridcomponent/index');
				$patjqgridrequest->post('name','patimmu');
				$patjqgridrequest->post('height','300');
				$patjqgridrequest->post('width','620');
				$patjqgridrequest->post('sortname','id');
				$patjqgridrequest->post('sortorder','desc');
				$patjqgridrequest->post('tablename','patientimmunizationdetails');//used for jqgrid
				$patjqgridrequest->post('columnnames', 'id,patientid,Immunization,datewhentaken_c,ageatImmunization_c,remark_c');//used for jqgrid
				$patjqgridrequest->post('whereclause',"[patientid,=,".$userid."]");//used for jqgrid
				$columninfo = '[
				{"name":"id","index":"id","width":100,"hidden":true},
				{"name":"patientid","index":"patientid","width":100,"hidden":true},
				{"name":"Immunization","index":"Immunization","width":140,"editable":true},
				{"name":"Date","index":"datewhentaken_c","width":70,"align":"left","editable":true},
				{"name":"Age","index":"ageatImmunization_c","width":60,"align":"left","editable":true},
				{"name":"Remark","index":"remark_c","width":120,"editable":true}]';
				$patjqgridrequest->post('columninfo', $columninfo);
				//details for edit, save and delete
				$patjqgridrequest->post('editbtnenable','true');
				$patjqgridrequest->post('deletebtnenable','true');
				$patjqgridrequest->post('savebtnenable','true');				
				$formcolmodel = '{
				"tablenm":"patientimmunizations","jqgrididcol":"id", "wherecol":"refpatimmpatientsid_c","whereval":'.$objpatient->id.',"colmodel":[
				{"colnm":"id","displaynm":"id","hidden":"true","autocomplete":"false","width":"10"},
				{"colnm":"refpatimmpatientsid_c","displaynm":"id","hidden":"true","autocomplete":"false","width":"10","value":'.$objpatient->id.'},
				{"colnm":"refpatimmunizationid_c","displaynm":"Immunization","hidden":"false","autocomplete":"true","tablenm":"immunizationmasters","column":"Immunizationname_c","width":"80"},
				{"colnm":"ageatImmunization_c","displaynm":"age at  Immunization","hidden":"false","autocomplete":"false","width":"10"},
				{"colnm":"datewhentaken_c","displaynm":"Date when taken[yy-mm-dd]","hidden":"fasle","autocomplete":"false","width":"80"},
				{"colnm":"remark_c","displaynm":"Remark","hidden":"false","autocomplete":"false","width":"100"}
				]}';
				$patjqgridrequest->post('formcolmodel',$formcolmodel);
		echo $patjqgridrequest->execute(); 
			
		?>
			
			
				 </td>
			 </tr>
			 </table>
		<!-- End Patient Immunization details -->	 
	</div>



   