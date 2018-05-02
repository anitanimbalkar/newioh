<link href="/ayushman/assets/css/ayushman fn 1.css" rel="stylesheet" type="text/css" />		
		<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" type="text/css" media="screen" href="/ayushman/assets/css/ui.jqgrid.css" />
		
		<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
		<script src="/ayushman/assets/js/jquery-ui.min.js"></script>		
		<script src="/ayushman/assets/js/i18n/grid.locale-en.js" type="text/javascript"></script>
		
    	<script src="/ayushman/assets/js/jquery.jqGrid.min.js" type="text/javascript"></script>
	
<script type="text/javascript">
	function testsformatter( cellvalue, options, rowObject )
	{
		console.log(cellvalue)
		arr = cellvalue.split('----');
		string = '<table style="border:none; width:100%;">';
		testname = '';
		if($(rowObject).children()[1].firstChild != null)
			isdicom = $(rowObject).children()[1].firstChild.data;
		else
			isdicom = null;
		
		if($(rowObject).children()[2].firstChild != null)
			reportid = $(rowObject).children()[2].firstChild.data;
		else
			reportid = null;
		
		
		//string = string+' <tr style="border:none;"><td style="border:none;" class="bodytext_normal"><span class="bodytext_normal">&nbsp;</span></td><td style="border:none;" class="bodytext_normal"> - <a href="javascript:void(0);" style="width:100%;" title="Click to open" onclick=openreport("'+cellvalue+'");  >'+cellvalue+'</a></td></tr>';
		string = string+' <tr style="border:none;"><td style="border:none;" class="bodytext_normal"><span class="bodytext_normal">&nbsp;</span></td><td style="border:none;" class="bodytext_normal"> - <a href="javascript:void(0);" style="width:100%;" title="Click to open" onclick=openreport("'+cellvalue+'","'+isdicom+'","'+reportid+'");>'+cellvalue+'</a></td></tr>';
		string = string + "</table>";
		return string;
	}
	function openreport(value,isdicom,reportid){
		if (isdicom==1)
		{
			window.open("/ayushman/cdicomviewer/view?reportid="+reportid);
		}
		else
		{
			window.open('/ayushman/files/Documents/'+value);
		}
		
				
	}
	function resize(){
		parent.resize();
	}
</script>


 <div id="showdetailedreport" style="width:730px;overflow-y:auto;height:auto; "  >
 	<table>
		<tr>
		<td>&nbsp; </td>
		<td>
			<div id="detailedreport" ></div>
			<?php
			$id = $id;
			//this is emr grid for showing detailed tests report of a single test.
			$detailtestreport= Request::factory('xjqgridcomponent/index');
			$detailtestreport->post('name','detailedreports');
			$detailtestreport->post('height','150');
			$detailtestreport->post('width','660');
			$detailtestreport->post('sortname','orderid');
			$detailtestreport->post('sortorder','asc');
			$detailtestreport->post('tablename','detailedtests');//used for jqgrid
			$detailtestreport->post('columnnames', 'orderid,dicomflag,reportid,reports');//used for jqgrid
			$detailtestreport->post('whereclause',"[orderid,=,$id]");//used for jqgrid
			$columninfo = 	'[	
								{"name":"Order No.","index":"orderid","width":20,"align":"center"},	
								{"name":" ","index":"dicomflag","hidden":true,"width":80},
								{"name":" ","index":"reportid","hidden":true,"width":80},
								{"name":"Reports","index":"reports","hidden":false,"width":80,"formatter":testsformatter}
							]';
			$detailtestreport->post('columninfo', $columninfo);
			$detailtestreport->post('editbtnenable','false');
			$detailtestreport->post('deletebtnenable','false');
			$detailtestreport->post('savebtnenable','false');
			echo $detailtestreport->execute(); 
			 ?>
		
		</td>
		
		</tr>
	</table>
 </div>
