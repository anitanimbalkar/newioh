<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css"></style>
		<link href="/ayushman/assets/css/ayushman fn 1.css" rel="stylesheet" type="text/css" />		
		<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" type="text/css" media="screen" href="/ayushman/assets/css/ui.jqgrid.css" />
		
		<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
		<script src="/ayushman/assets/js/jquery-ui.min.js"></script>		
		<script src="/ayushman/assets/js/i18n/grid.locale-en.js" type="text/javascript"></script>
		<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
    	<script src="/ayushman/assets/js/jquery.jqGrid.min.js" type="text/javascript"></script>
	
	<body>
<?php 
		
				$patjqgridrequest= Request::factory('xjqgridcomponent/index');
				$patjqgridrequest->post('name',$xjqgridname);
				$patjqgridrequest->post('height','80');
				$patjqgridrequest->post('width','660');
				$patjqgridrequest->post('sortname','id');
				$patjqgridrequest->post('sortorder','desc');
				$patjqgridrequest->post('tablename',$viewnm);//used for jqgrid
				$patjqgridrequest->post('columnnames', 'id,patientid,disease,ageatthattime_c,medicationtaken_c,diseaseduration_c,remark_c');
				$patjqgridrequest->post('whereclause',"[patientid,=,".$userid."][relativeid,=,".$patrelativeid."]");//used for jqgrid
				$columninfo = '[
				{"name":"id","index":"id","width":100,"hidden":true},
				{"name":"patientid","index":"patientid","width":100,"hidden":true},
				{"name":"Major Illness","index":"disease","width":150},
				{"name":"Age","index":"ageatthattime_c","width":50,"align":"left"},
				{"name":"Treatment","index":"medicationtaken_c","width":80,"align":"left"},
				{"name":"Disease Duration","index":"diseaseduration_c","width":120,"align":"left"},
				{"name":"Remark","index":"remark_c","width":140}]';
				$patjqgridrequest->post('columninfo', $columninfo);
				//details for edit, save and delete
				$patjqgridrequest->post('editbtnenable','false');
				$patjqgridrequest->post('deletebtnenable','false');
				$patjqgridrequest->post('savebtnenable','false');				
				$formcolmodel = '{
				"tablenm":"'.$tablename.'","jqgrididcol":"id", "wherecol":"refpatrelpastillnesspatrelaiveid_c","whereval":'.$patrelativeid.',"colmodel":[
				{"colnm":"id","displaynm":"id","hidden":"true","autocomplete":"false","width":"10"},
				{"colnm":"refpatrelativepatientid_c","displaynm":"id","hidden":"true","autocomplete":"false","width":"10","value":'.$patientid.'},
				{"colnm":"refpatrelpastillnesspatrelaiveid_c","displaynm":"id","hidden":"true","autocomplete":"false","width":"10","value":'.$patrelativeid.'},
				{"colnm":"refpatrelpastillnessdiseaseasid_c","displaynm":"Illness","hidden":"false","autocomplete":"true","tablenm":"diseasemasters","column":"diseasename_c","width":"80"},
				{"colnm":"ageatthattime_c","displaynm":"Age","hidden":"false","autocomplete":"false","width":"10"},
				{"colnm":"diseaseduration_c","displaynm":"Disease Duration","hidden":"fasle","autocomplete":"false","width":"80"},
				{"colnm":"remark_c","displaynm":"Remark","hidden":"false","autocomplete":"false","width":"100"}
				]}';
				$patjqgridrequest->post('formcolmodel',$formcolmodel);
		echo $patjqgridrequest->execute(); 
?>
</body>
</html>