<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">		
		<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/jquery.flexbox.css" />
		
		<script type="text/javascript" src="/ayushman/assets/js/jquery.flexbox.js"></script>
		
		
		
		
		<script type="text/javascript">
		 function refreshgrid()
	{	
		var eles = $('#gridMain');
		for(var i=0;i<eles.length;i++)
		{
			$("#"+eles[i].id.replace('idjqgrid','')+'list').trigger( 'reloadGrid' );
		}

	}
		 function Rejecttest(id)
	{ //alert(id);
		 $.ajax({
        type: "GET",
        url: "/ayushman/cmasterdatavalidation/Rejecttest?id="+id,
        success: function(data) {
           alert("Disease Rejected");
		   refreshgrid();
          
        }
           
        }); 
	
		
	}
			$(function() {
			var tests = {};
		tests.results=<?php echo $arraytest; ?>;
		tests.total = tests.results.length;
		var mydata=<?php echo $gridfortest; ?>;
		  var lastsel2;
jQuery("#gridMain").jqGrid({
    datatype: "local",
    data: mydata,
    pager: '#pagernav',
    sortname: 'id',
    sortorder: "desc",
    sortable: true,
    height: 300,
	localReader : {id:'id'},
    editurl: 'clientArray',
	onSelectRow: function(id){
      if(id && id!==lastsel2){
       	jQuery('#gridMain').restoreRow(lastsel2);		
        jQuery('#gridMain').editRow(id,true);					
          lastsel2=id;
		  //alert(id);
      }
    },
    colNames: ['Id', 'Testname', 'Genericname', 'Sample','Action'],
colModel:[ {name:'id',index:'id',key: true, width:90},
{name:'amount',index:'amount', width:120, align:"Left", editable: true},
 {name:'Country',index:'Country', width:300, classes:"countryHolder", align:"Left",editable: true
 ,edittype:'custom',editoptions:{custom_element:myelem,custom_value:myval}
 },
  {name:'tax',index:'tax', width:120, align:"Left", editable: true},
  {name:"action",index:"id",width:200,editable:false,formatter:setaction},
 ],
   
});
jQuery("#gridMain").jqGrid('navGrid', '#pagernav', {add:false,edit:false,del:false});

	function setaction(cellvalue, options, rowObject)
	{	//console.log($(rowObject).children()[3].firstChild.data);
		//var temp = $(rowObject).children()[3].firstChild.data;
		console.log(cellvalue);
		return '<a  id="fancybox-manual-c" href="javascript:;" onclick="approvetest('+cellvalue+');" ><font color="blue">Approve</font></a> / <a  id="fancybox-manual-d" href="javascript:;" onclick="Rejecttest('+cellvalue+');" ><font color="blue">Reject</font></a>';
		
	}
	 function approvetest(id)
	{ 
		 $.ajax({
        type: "GET",
        url: "/ayushman/cmasterdatavalidation/approvediagnosis?id="+id,
        success: function(data) {
           alert("Disease Approved And Updated");
		   refreshgrid();
          
        }
           
        }); 
	
		
	}
	
function myelem(value,options){
   var $ret = $('<div id="country"></div>');
        $ret.flexbox(tests, {  
        initialValue: value,         
        paging: {  
            pageSize: 10  
        }  
        });  
//console.log($ret);		
   return $ret;
}

function myval(elem){
	var z=$('#country_input').val();
	console.log(z);
    return  $('#country_input').val();
}
	
});
</script>

<style type="text/css">
		body{
text-align:center;
}

		#gridMain td.countryHolder{
		overflow:visible;
		margin-bottom:20px;
		}
		#gridMain .ffb-input{
				height: 24px;
		}
		#gview_gridMain .ui-jqgrid-bdiv{
		overflow-y: scroll;
overflow-x: hidden;
		}
		</style>

<div style="width:835px;height:560px;" > 
<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
    <table border="0" cellpadding="0" cellspacing="0" valign="top">
		<tr>
			<td colspan="3" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;
			Validate Master Data</td>
		</tr>
		<tr>
			<td style="width:98%;padding-top:5px;">
				<table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  	<td height="30" colspan="6" align="left" valign="middle" class="bodytext_normal"style="padding-top: 20px;" >
						  	<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
							<tr>&nbsp;Select Master Table:
						<select name="status" onchange="$('#searchform').submit();" class="textarea" id="status" >
						<option value="drugmaster"<?php if($previousvalues != null)echo ( $previousvalues['status']=='drugmaster')?'selected':''; ?> >Medicine</option>
						<option value = 'testmaster'<?php if($previousvalues != null) echo ($previousvalues['status']=='testmaster')?'selected':''; ?>>Investigations</option>
						<option value='diagnosis'<?php if($previousvalues != null) echo ($previousvalues['status']=='diagnosis')?'selected':''; ?>>Diagnosis</option>
						<option value='Symptoms'<?php if($previousvalues != null) echo ($previousvalues['status']=='Symptoms')?'selected':''; ?>>Symptoms</option>
						</select>
							</tr>
							</table>
						</td>
						
				</tr>
				</table>
		</td>			
	</tr>
<table id="gridMain"></table>
<div id="pagernav"></div>
<div id="testData" style="margin:0 auto"></div>
</form>
</div>	
	
	