<style type="text/css">
   .evenTableRow {
       background:rgb(236, 248, 251) !important; color:#11587E;
   }
   .oddTableRow  {
       background:#ffffff !important;color:#11587E;
   }      
</style>
		
<style type="text/css">
.buttonstyle {
	height: 25px;
border-radius: 4px;
border: 0;
cursor: pointer;
font-family: Arial,Helvetica,sans-serif;
font-size: 10pt;
color: white;
vertical-align: middle;
}
.ui-jqgrid .ui-jqgrid-bdiv {
  position: relative; 
  margin: 0em; 
  padding:0; 
  /*overflow: auto;*/ 
  overflow-x:hidden; 
  overflow-y:auto; 
  text-align:center !important;
}
</style>
<script type="text/javascript">
function ModifyGridDefaultStyles() {  
   $("#<?php echo $name;?>list"+" tr").removeClass("ui-widget-content");
   $("#<?php echo $name;?>list"+" tr:nth-child(even)").addClass("evenTableRow");
   $("#<?php echo $name;?>list" + " tr:nth-child(odd)").addClass("oddTableRow");
}
$(document).ready(function() {
			if(<?=  $savebtnenable;?>==true)
			{				
				//alert("in create div");
				<?php echo $name;?>createaddformdiv();	
				$( "#<?php echo $name;?>"+"add" ).draggable();
				$( "#<?php echo $name;?>"+"add" ).resizable({ maxHeight: 250 ,maxWidth:500, minHeight:160, minWidth:220});
			}	
		
			if(<?=$editbtnenable;?>==true)	
			{
				<?php echo $name;?>createeditformdiv();
				$( "#<?php echo $name;?>"+"edit" ).draggable();
				$( "#<?php echo $name;?>"+"edit" ).resizable({ maxHeight: 250 ,maxWidth:500, minHeight:160, minWidth:220});
				<?php echo $name;?>getcompletedata(); 				
			}
			if(<?=  $deletebtnenable;?>==true)
			{				
				//alert("in create div");<?php echo $name;?>deletediv
				<?php echo $name;?>createdeletediv();
				$( "#<?php echo $name;?>deletediv" ).draggable();	
			}	
			var local = '<?= $datatype;?>';
			var groupby = '<?=  $groupby;?>';
			
			var flag = '<?=  $flag;?>';
			
			var columns = eval('(' + <?php print json_encode($columns); ?> + ')');
			//$.parseJSON( <?php print json_encode($columns); ?>);
			//alert("<?php echo $groupby;?>");
	
	if(flag =='set'){
		
					if(local =='' || local != 'local')
			{
				  $("#<?php echo $name;?>list").jqGrid({
				 
						url:'/ayushman/xjqgriddatagenerator/generate?table=<?php echo $tablename;?>&data=<?php echo $data; ?>&template=<?php echo $useTemplate; ?>&columns=<?php echo $columnnames;?>&whereclause=<?php echo $whereclause;?>&groupby='+groupby,
						datatype: 'xml',
					
						mtype: 'GET',
						pager: '#<?php echo $name;?>pager',
						colModel :columns,						
            			sortable:true,
						rowNum:100,
						rowList:[100,200,300],
						viewrecords: true,
						gridview: true,
						//height: Number('<?php echo $height;?>'),
						height: 'auto',
						width: '<?php echo $width;?>',
						caption: '<?php echo $label;?>',
						sortname: '<?php echo $sortname;?>',
						sortorder: '<?php echo $sortorder;?>',

					   	grouping:true,
						
					   	groupingView : {
							groupField :['<?php echo $group_name;?>'],
							groupCollapse: true
   						},

						loadComplete:function(){
							if(resize() != undefined)
						     resize();
						},
						gridComplete: function() {
							var recs = parseInt($("#<?php echo $name;?>list").jqGrid('getGridParam','reccount'));
							if (isNaN(recs) || recs == 0) {

							}
							ModifyGridDefaultStyles();       
						}
				  });
					$("#<?php echo $name;?>list").parents('div.ui-jqgrid-bdiv').css("min-height","100px");
			}else{
				  $("#<?php echo $name;?>list").jqGrid({
						datatype: local,
						colModel :columns,
						
						viewrecords: true,
						sortable:true,
						gridview: true,
					//	height: '<?php echo $height;?>',
						height: 'auto',
						width: '<?php echo $width;?>',
						caption: '<?php echo $label;?>',
						sortname: '<?php echo $sortname;?>',
						sortorder: '<?php echo $sortorder;?>',
					   	grouping:true,
						groupCollapse: true,
					   	groupingView : {
							groupField :['<?php echo $group_name;?>'],
							groupCollapse: true
   						},

						loadComplete:function(){
						  // ModifyGridDefaultStyles();         
						},
						gridComplete: function() {
							var recs = parseInt($("#<?php echo $name;?>list").jqGrid('getGridParam','reccount'));
							if (isNaN(recs) || recs == 0) {

							}
							ModifyGridDefaultStyles();       
						}
				  });
				  $("#<?php echo $name;?>list").parents('div.ui-jqgrid-bdiv').css("min-height","100px");
			}

		
		}
	else{
			if(local =='' || local != 'local')
			{
				  $("#<?php echo $name;?>list").jqGrid({
				 
						url:'/ayushman/xjqgriddatagenerator/generate?table=<?php echo $tablename;?>&data=<?php echo $data; ?>&template=<?php echo $useTemplate; ?>&columns=<?php echo $columnnames;?>&whereclause=<?php echo $whereclause;?>&groupby='+groupby,
						datatype: 'xml',
					
						mtype: 'GET',
						pager: '#<?php echo $name;?>pager',
						colModel :columns,						
            			sortable:true,
						rowNum:15,
						rowList:[15,30,45],
						viewrecords: true,
						gridview: true,
						//height: Number('<?php echo $height;?>'),
						height: 'auto',
						width: '<?php echo $width;?>',
						caption: '<?php echo $label;?>',
						sortname: '<?php echo $sortname;?>',
						sortorder: '<?php echo $sortorder;?>',
						loadComplete:function(){
							if(resize() != undefined)
						     resize();
						},
						gridComplete: function() {
							var recs = parseInt($("#<?php echo $name;?>list").jqGrid('getGridParam','reccount'));
							if (isNaN(recs) || recs == 0) {

							}
							ModifyGridDefaultStyles();       
						}
				  });
					$("#<?php echo $name;?>list").parents('div.ui-jqgrid-bdiv').css("min-height","100px");
			}else{
				  $("#<?php echo $name;?>list").jqGrid({
						datatype: local,
						colModel :columns,
						
						viewrecords: true,
						sortable:true,
						gridview: true,
					//	height: '<?php echo $height;?>',
						height: 'auto',
						width: '<?php echo $width;?>',
						caption: '<?php echo $label;?>',
						sortname: '<?php echo $sortname;?>',
						sortorder: '<?php echo $sortorder;?>',
	
						loadComplete:function(){
						  // ModifyGridDefaultStyles();         
						},
						gridComplete: function() {
							var recs = parseInt($("#<?php echo $name;?>list").jqGrid('getGridParam','reccount'));
							if (isNaN(recs) || recs == 0) {

							}
							ModifyGridDefaultStyles();       
						}
				  });
				  $("#<?php echo $name;?>list").parents('div.ui-jqgrid-bdiv').css("min-height","100px");
			}
	}
					
});
	function dump(obj)
	{
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
function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

function <?php echo $name;?>closedeletediv()
{
	$("#<?php echo $name;?>deletediv").hide(500);
}

function <?php echo $name;?>deleterecord()
{
	var formcolmodel=$.parseJSON( <?php print json_encode($formcolmodel); ?>);
	tablenm=formcolmodel.tablenm; idcol=formcolmodel.jqgrididcol;
	var grdelete = jQuery("#<?php echo $name;?>list").jqGrid('getGridParam','selrow');
	$.ajax({
				  url: "/ayushman/xjqgriddatagenerator/deleterecord?tablenm="+tablenm+"&idcol="+idcol+"&idval="+grdelete,
				  success: function() {
						$("#<?php echo $name;?>deletediv").hide(500);
						
	$("#<?php echo $name;?>list").trigger("reloadGrid");
	<?php echo $name;?>getcompletedata(); 					
					},
					error : function(){alert("error while deleting record");}
				  });
	
}
function <?php echo $name;?>createdeletediv()
{
	 $('<div id="<?php echo $name;?>deletediv"  style="border:2px #4D87AD; border-radius: 5px 5px 5px 5px; background:#FFFDF4; padding:5px; z-index:950; position: absolute; top: bottomTop; left: centre;  height:150px; width:200px; display:none";  title="Delete"></div>').prependTo('#<?php echo $name;?>idjqgrid');
	divheader = "<div id=<?php echo $name;?>deletedivheader' class='Leftmenuheading' style='height:22px;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif; padding:0px; '>Delete..</div>";		
		$(divheader).appendTo('#<?php echo $name;?>deletediv');		
		 divclose = "<img src='/ayushman/assets/images/close.png' style='float:right; height:20px; width:20px;vertical-align:center;' onclick='closedeletediv()' ></img>";		
		$(divclose).appendTo('#<?php echo $name;?>deletedivheader');
		$(' <p>Delete Selected Record?</p> <br><br> <input type="button" onclick="<?php echo $name;?>deleterecord()" value="Delete"/><input type="button" value="Cancel" onclick="<?php echo $name;?>closedeletediv()"/>').appendTo('#<?php echo $name;?>deletediv');	
}
function <?php echo $name;?>showdeletediv()
{
	var grdelete = jQuery("#<?php echo $name;?>list").jqGrid('getGridParam','selrow');
	//alert(grdelete);
	if( grdelete == null ) 
		alert("Please Select Row to delete!");
	else
		$("#<?php echo $name;?>deletediv").show();
}
function <?php echo $name;?>getcompletedata()
{
	formcolmodel = $("#<?php echo $name;?>editformcolmodel").val();
		var formcolmodel=$.parseJSON( formcolmodel);	
		var colnms = "";
		var j=0;
		for(var i=0;i<formcolmodel.colmodel.length ;i++)
		{			
			colnms = colnms+formcolmodel.colmodel[i].colnm+",";	
			
		}
		//alert(autocompletedtls[1].tablenm);
		colnms =  colnms.slice(0,colnms.length-1);
		$.ajax({
				  url: "/ayushman/xjqgriddatagenerator/getdata?tablenm="+formcolmodel.tablenm+"&wherecol="+formcolmodel.wherecol+"&whereval="+formcolmodel.whereval+"&colnms="+colnms,
				success: function( data ) {
					//$("#<?php echo $name;?>editcompletedata").val() =$.parseJSON( data);
					document.getElementById("<?php echo $name;?>editcompletedata").value =  data;
					
					},
					error : function(){alert("error while getting complete data for edit");}
			 });
}


function <?php echo $name;?>showeditformdiv()
{
	type="edit";
	<?php echo $name;?>cleareditform();
	var gr = jQuery("#<?php echo $name;?>list").jqGrid('getGridParam','selrow');
	if( gr == null )
	  alert("Please Select Row");
	else
	{	
		
		formcolmodel = $("#<?php echo $name;?>editformcolmodel").val();
		var formcolmodel=$.parseJSON( formcolmodel);
		var colnms = "";
		var j=0;
		var autocompletedtls= new Array();
		for(var i=0;i<formcolmodel.colmodel.length ;i++)
		{	
			if(formcolmodel.colmodel[i].autocomplete == 'true')
			{
				autocompletedtls[j] = new Array(3);
				//alert(formcolmodel.colmodel[i].column+","+formcolmodel.colmodel[i].colnm+","+formcolmodel.colmodel[i].tablenm);
				 autocompletedtls[j]["colnm"]=formcolmodel.colmodel[i].colnm;
				 autocompletedtls[j]["tablenm"]=formcolmodel.colmodel[i].tablenm;
				 autocompletedtls[j]["column"]=formcolmodel.colmodel[i].column;
				 j++;
			}
		}
		
					completedata = $.parseJSON($("#<?php echo $name;?>editcompletedata").val());
					
					
					var selectedrowdata = "";
					for(j=0;j< completedata.length;j++)
					{
						if(completedata[j][formcolmodel.jqgrididcol]==gr)
						{
							selectedrowdata= completedata[j];							
						}
					}					
					/*
					for(k=0;k<autocompletedtls.length;k++)
					{
					$.ajax({
				  			url: "/ayushman/xjqgriddatagenerator/getvaluefrmid?tablenm="+ autocompletedtls[k]["tablenm"]+"&column="+autocompletedtls[k]["column"]+"&id="+selectedrowdata[felements[i].id],
							success: function( data ) 
							{
								var felements = document.getElementById("<?php echo $name;?>"+"form").elements;
								for(i=0; i<felements.length; i++)
								{	
									fieldtype = felements[i].type.toLowerCase();	
									var fieldvalue="" ;
									if(fieldtype == 'text' || fieldtype == 'hidden')	
									{							
										if(!(isBlank(felements[i].id)))
										{
											if(felements[i].id == autocompletedtls[k]["colnm"])
											{
												felements[i].value = data;
											}
											else
									 			felements[i].value = selectedrowdata[felements[i].id];	
										}
									}
								}
							
							},error : function(){alert("error while getting data for id");}
			 			});							
					}	
					*/
					var felements = document.getElementById("<?php echo $name;?>"+"edit"+"form").elements;
					for(i=0; i<felements.length; i++)
					{	
						fieldtype = felements[i].type.toLowerCase();	
						var fieldvalue="" ;
						
						if(fieldtype == 'text')
						{								
							if(!(isBlank(felements[i].id)))
							{								
								for(k=0;k<autocompletedtls.length;k++)
								{
									if(felements[i].id == autocompletedtls[k]["colnm"])
									{
																	
										$.ajax({
				  url: "/ayushman/xjqgriddatagenerator/getvaluefrmid?tablenm="+ autocompletedtls[k]["tablenm"]+"&column="+autocompletedtls[k]["column"]+"&id="+selectedrowdata[felements[i].id]+"&tblcolnm="+autocompletedtls[k]["colnm"],
				success: function( data ) {
											data = data.split('@#');
											//document.getElementById("autocompletedata").value = data;
											var felements = document.getElementById("<?php echo $name;?>"+"edit"+"form").elements;
											for(i=0; i<felements.length; i++)
											{	
												fieldtype = felements[i].type.toLowerCase();	
												var fieldvalue="" ;
												if(fieldtype == 'text')
												{			
													//alert(felements[i].id );				
													if(!(isBlank(felements[i].id)))
													{	
														if(felements[i].id == data[1])
														{
															//alert(felements[i].id );
															felements[i].value = data[0];
															break;
														}
													}
												}
											}
											//$("#<?php echo $name;?>").show(1000);
										},
										error : function(){alert("error while getting data");}
			 						 });
									// felements[i].value = document.getElementById("autocompletedata").value;
									}
									else
									{
										felements[i].value = selectedrowdata[felements[i].id];								  
										
									}
									
								}								
								 	
							}
							//alert( selectedrowdata[felements[i].id]);
							//alert(felements[i].nextSibling.type);
							felements[i].nextSibling.name = felements[i].id;
								felements[i].nextSibling.value = selectedrowdata[felements[i].id];
						}
						if(fieldtype == 'hidden' && fieldtype.name !=null)			
						{						
							   felements[i].value = selectedrowdata[felements[i].id];	
							//alert(felements[i].id+"="+selectedrowdata[felements[i].id]) ;
						}						
					}
					
					$("#<?php echo $name;?>"+"edit").show();		
					$("#<?php echo $name;?>"+"edit"+"span").show();
	}		
}

function <?php echo $name;?>clearform()
{
	var frm_elements = document.getElementById( "<?php echo $name;?>"+"add"+"form").elements;
	for(i=0; i<frm_elements.length; i++)
	{
	    field_type = frm_elements[i].type.toLowerCase();
		if(field_type == 'text')
		{
			frm_elements[i].value = "";
			frm_elements[i].nextSibling.value = "";
		}
			
	}
}
function <?php echo $name;?>cleareditform()
{
	var frm_elements = document.getElementById( "<?php echo $name;?>"+"edit"+"form").elements;
	for(i=0; i<frm_elements.length; i++)
	{
	    field_type = frm_elements[i].type.toLowerCase();
		if(field_type == 'text')
			frm_elements[i].value = "";
	}
}
function <?php echo $name;?>closeall()	
{
	$("#<?php echo $name;?>"+"add").hide(1000);
	$("#<?php echo $name;?>"+"add"+"successspan").hide(1000);	
}
function <?php echo $name;?>closewithreloadall()
{
	$("#<?php echo $name;?>"+"add").hide(1000);
	$("#<?php echo $name;?>"+"add"+"successspan").hide(1000);
	$("#<?php echo $name;?>list").trigger("reloadGrid");
	<?php echo $name;?>getcompletedata();
}
function <?php echo $name;?>editcloseall()	
{
	$("#<?php echo $name;?>"+"edit").hide(1000);
	$("#<?php echo $name;?>"+"edit"+"successspan").hide();
}
function <?php echo $name;?>showformdiv()
{
	$("#<?php echo $name;?>"+"add").show(1000);	
	$("#<?php echo $name;?>"+"add"+"span").show();
	<?php echo $name;?>clearform();
}

function <?php echo $name;?>createeditformdiv()
	{		//alert( "<?php echo $name;?>");
	var formname = "<?php echo $name;?>"+"edit";
		$("<div id='"+formname+"' style='border:1px solid #BEB1A7; border-radius: 5px 5px 5px 5px; background:#EDE9E2; padding:5px; z-index:950; position: absolute; top: bottomTop; left: bottomLeft;  height:180px; width:40%;display:none;'  ></div>").prependTo('#<?php echo $name;?>idjqgrid');
		divheader = "<div id='"+formname+"header' class='Leftmenuheading' style='height:22px;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif; padding:0px; '>";
	
		 divheader = divheader+ "Edit..</div> ";
		$(divheader).appendTo('#'+formname);	
		 divclose = "<img src='/ayushman/assets/images/close.png' style='float:right; height:20px; width:20px;vertical-align:center;' onclick='<?php echo $name;?>editcloseall()' ></img>";
		
		$(divclose).appendTo('#'+formname+'header');
		$("<div id='"+formname+"content'  style='height:85%;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif;font-size:9pt;'></div> ").appendTo('#'+formname);

			$("<span id='"+formname+"successspan' style=position:absolute;display:none;'>Record has been updated sucessfully. Select table row to update records<br><br><br><br> <input type='button' value='Cancel' onclick='<?php echo $name;?>editcloseall()'/> </span>").appendTo('#'+formname+'content');
			
			$("<span id='"+formname+"span'  style='height:78%;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif;font-size:9pt;'></span> ").appendTo('#'+formname+'content'); 
	
			 $("<form id='"+formname+"form' method='POST'  action='javascript:void(false)' onsubmit='<?php echo $name;?>editrecord()' style='height:98%;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif;font-size:9pt;'></form> ").appendTo('#'+formname+'span');
		
		//create elements in form
		var formcolmodel=$.parseJSON( <?php print json_encode($formcolmodel); ?>);		
			//alert(formcolmodel);
				$("<input type='hidden' id='"+formname+"completedata'  />").appendTo('#'+formname+'span');
		$("<input type='hidden' id='"+formname+"formcolmodel' value='"+ <?php print json_encode($formcolmodel); ?>+"' />").appendTo('#'+formname+'span');

		string = "<table style='float:left; height:78%%;width:98%;'>";
		for(i=0;i<formcolmodel.colmodel.length ;i++)
		 {		 	
		 	if(formcolmodel.colmodel[i].hidden=='true')
				string =string + "<input type='hidden' name = "+ formcolmodel.colmodel[i].colnm +" id = "+ formcolmodel.colmodel[i].colnm +" value="+formcolmodel.colmodel[i].value+" />";
			else
			{				
				if(formcolmodel.colmodel[i].autocomplete == 'true')
				{					
					string =string + "<tr><td><label>"+ formcolmodel.colmodel[i].displaynm +"</label> </td><td> "+" : "+"</td><td>";
					autotext= "<input type='text' id='"+formcolmodel.colmodel[i].colnm+"' width='40%'  /><input type='hidden'/>";
					//alert(autotext);
					string =string +autotext+" </td></tr>";
					
				}
				else 
					string =string + "<tr><td><label>"+ formcolmodel.colmodel[i].displaynm +"</label> </td><td> "+" : "+"</td><td><input type='text' id='"+formcolmodel.colmodel[i].colnm+"' width="+formcolmodel.colmodel[i].width+"px onchange='assignvalue(this)' /><input type='hidden'/></td></tr>";
			}		 		
		 }
		 string = string +" </table>";		
		 $(string).appendTo('#'+formname+'form');
		
		divbtns = "<table style='float:right;height:22%;width:98%;'><td><input type='submit' id='formsubmit' value='Submit'  />&nbsp;&nbsp;<input type='button' id='formcancel' ";

		 divbtns = divbtns+ "onclick='<?php echo $name;?>editcloseall()' value='Cancel' /> </td> </table>";	 
		  $(divbtns).appendTo('#'+formname+'form');
		   //attach autocomplete
		  var felements = document.getElementById(formname+ "form").elements;
		  for(j=0; j<felements.length; j++)
	      {	
			fieldtype = felements[j].type.toLowerCase();
			if(fieldtype == 'text')
			{								
				if(!(isBlank(felements[j].id)))
				{
					 for(i=0;i<formcolmodel.colmodel.length ;i++)
					 {	
					 		if( (formcolmodel.colmodel[i].colnm==felements[j].id) && (formcolmodel.colmodel[i].autocomplete == 'true'))
							{	
								$(felements[j]).autocomplete({source:"/ayushman/cautocompletedata/retrievedata?tablenm="+formcolmodel.colmodel[i].tablenm+"&colnm="+formcolmodel.colmodel[i].column,select: function(event, ui) {
																	this.nextSibling.value = ui.item.id;
																	this.nextSibling.name = this.id;
										} });
					 		}
					} 
				}
			}				
		  }
	}
	
	function <?php echo $name;?>createaddformdiv()
	{		//alert( "<?php echo $name;?>");
	var formname = "<?php echo $name;?>"+"add";
		$("<div id='"+formname+"' style='border:1px solid #BEB1A7; border-radius: 5px 5px 5px 5px; background:#EDE9E2; padding:5px; z-index:950; position: absolute; top: bottomTop; left: bottomLeft;  height:180px; width:40%;display:none;'  ></div>").prependTo('#<?php echo $name;?>idjqgrid');
		divheader = "<div id='"+formname+"header' class='Leftmenuheading' style='height:22px;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif; padding:0px; '>";
		
		 divheader = divheader+ "Add..</div> ";

		$(divheader).appendTo('#'+formname);

		 divclose = "<img src='/ayushman/assets/images/close.png' style='float:right; height:20px; width:20px;vertical-align:center;' onclick='<?php echo $name;?>closeall()' ></img>";
	
		$(divclose).appendTo('#'+formname+'header');
		$("<div id='"+formname+"content'  style='height:85%;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif;font-size:9pt;'></div> ").appendTo('#'+formname);
			$("<span id='"+formname+"successspan' style=position:absolute;display:none;'>Record has been added.<br>Do you want to add new record? <br><br><br><br><input type='button' value='Yes' onclick='<?php echo $name;?>showspancontent()'/> <input type='button' value='No' onclick='<?php echo $name;?>closewithreloadall()'/> </span>").appendTo('#'+formname+'content');

			$("<span id='"+formname+"span'  style='height:78%;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif;font-size:9pt;'></span> ").appendTo('#'+formname+'content'); 

			  $("<form id='"+formname+"form' method='POST'  action='javascript:void(false)' onsubmit='<?php echo $name;?>addrecord()' style='height:98%;width:98%; float: left; font-family: Verdana,Arial,Helvetica,sans-serif;font-size:9pt;'></form> ").appendTo('#'+formname+'span');
		//create elements in form
		var formcolmodel=$.parseJSON( <?php print json_encode($formcolmodel); ?>);		
			//alert(formcolmodel.value);
		$("<input type='hidden' id='"+formname+"formcolmodel' value='"+<?php print json_encode($formcolmodel); ?>+"' />").appendTo('#'+formname+'span');
		string = "<table style='float:left; height:78%%;width:98%;'>";
		for(i=0;i<formcolmodel.colmodel.length ;i++)
		 {		 	
		 	if(formcolmodel.colmodel[i].hidden=='true')
				string =string + "<input type='hidden' name = "+ formcolmodel.colmodel[i].colnm +" id = "+ formcolmodel.colmodel[i].colnm +" value="+formcolmodel.colmodel[i].value+" />";
			else
			{				
				if(formcolmodel.colmodel[i].autocomplete == 'true')
				{					
					string =string + "<tr><td><label>"+ formcolmodel.colmodel[i].displaynm +"</label> </td><td> "+" : "+"</td><td>";
					autotext= "<input type='text' id='"+formcolmodel.colmodel[i].colnm+"' width='80px'  /><input type='hidden'/>";
					//alert(autotext);
					string =string +autotext+" </td></tr>";
					
				}
				else 
					string =string + "<tr><td><label>"+ formcolmodel.colmodel[i].displaynm +"</label> </td><td> "+" : "+"</td><td><input type='text' id='"+formcolmodel.colmodel[i].colnm+"' width="+formcolmodel.colmodel[i].width+"px onchange='assignvalue(this)' /><input type='hidden'/></td></tr>";
			}		 		
		 }
		 string = string +" </table>";		
		 $(string).appendTo('#'+formname+'form');
		 
		divbtns = "<table style='float:right;height:22%;width:98%;'><td><input type='submit' id='formsubmit' value='Submit'  />&nbsp;&nbsp;<input type='button' id='formcancel' ";
		 divbtns = divbtns+ "onclick='<?php echo $name;?>closeall()' value='Cancel' /> </td> </table>";
	 
		  $(divbtns).appendTo('#'+formname+'form');
		  //attach autocomplete
		  var felements = document.getElementById(formname+ "form").elements;
		  for(j=0; j<felements.length; j++)
	      {	
			fieldtype = felements[j].type.toLowerCase();
			if(fieldtype == 'text')
			{								
				if(!(isBlank(felements[j].id)))
				{
					 for(i=0;i<formcolmodel.colmodel.length ;i++)
					 {	
					 		if( (formcolmodel.colmodel[i].colnm==felements[j].id) && (formcolmodel.colmodel[i].autocomplete == 'true'))
							{	
								$(felements[j]).autocomplete({source:"/ayushman/cautocompletedata/retrievedata?tablenm="+formcolmodel.colmodel[i].tablenm+"&colnm="+formcolmodel.colmodel[i].column,select: function(event, ui) {
																	this.nextSibling.value = ui.item.id;
																	this.nextSibling.name = this.id;
										} });
					 		}
					} 
				}
			}				
		  }
		 
		  
	}
	function assignvalue(textbox)
	{
		//alert(textbox.value);
		textbox.nextSibling.value  = textbox.value;
		textbox.nextSibling.name  = textbox.id;
		
	}
	
	function <?php echo $name;?>addrecord()
	{
		var array = new Array();
	//alert($("#tablnm").val())	;
	//array('tablenm'=>$("#tablnm").val());
		formcolmodel = $("#<?php echo $name;?>addformcolmodel").val();
		var formcolmodel=$.parseJSON( formcolmodel);
		//dump(formcolmodel);
		e = document.getElementById("<?php echo $name;?>"+"add"+"form").getElementsByTagName("input");
		var i=0;
		for(i=0;i<e.length;i++)
		{
		/*	if(e[i].type == "text"){
				array[i] = new Array(2);
				array[i][0] = e[i].id;
				array[i][1] = e[i].value;
				//alert(e[i].value);
			}else */
			 if(e[i].type == "hidden"){
				array[i] = new Array(2);
				array[i][0] = e[i].name;
				array[i][1] = e[i].value;
			}
		}
		array.push(['tablnm',formcolmodel.tablenm]);
		//alert(JSON.stringify(array));
		
		$.ajax({
				  url: "/ayushman/xjqgriddatagenerator/savedata",
				  type:'POST',
				  data: {"val": JSON.stringify(array)},
				  success: function( data ) {
							//alert(data);
							//alert($("#<?php echo $name;?>addspan").html());
						$("#<?php echo $name;?>"+"addspan").hide();
						$("#<?php echo $name;?>"+"addsuccessspan").show();
					},
					error : function(){alert("error while saving data");}
				  });
	}
	function <?php echo $name;?>editrecord()
	{
		var array = new Array();
		e = document.getElementById("<?php echo $name;?>"+"edit"+"form").getElementsByTagName("input");
		formcolmodel = $("#<?php echo $name;?>editformcolmodel").val();
		var formcolmodel=$.parseJSON( formcolmodel);
		jqgrididcol= formcolmodel.jqgrididcol;
		selectedrowid = jQuery("#<?php echo $name;?>list").jqGrid('getGridParam','selrow');
		var i=0;
		for(i=0;i<e.length;i++)
		{
			 if(e[i].type == "hidden"){
			 //alert(jQuery("#<?php echo $name;?>list").jqGrid('getGridParam','selrow') +" and "+e[i].name);
				 if(!(selectedrowid == e[i].value))
				 {
				 	array[i] = new Array(2);
					array[i][0] = e[i].name;
					array[i][1] = e[i].value;
				 }				
			}
		}
		array.push(['tablnm',formcolmodel.tablenm]);
		array.push(['wherecolnm',jqgrididcol]);
		array.push(['whereval',selectedrowid]);
		//alert(JSON.stringify(array));
		//dump(array);
		$.ajax({
				  url: "/ayushman/xjqgriddatagenerator/saveediteddata",
				  type:'POST',
				  data: {"val": JSON.stringify(array)},
				  success: function( data ) {
							//alert(data);
							//alert($("#<?php echo $name;?>addspan").html());
						$("#<?php echo $name;?>"+"edit"+"span").hide();
						$("#<?php echo $name;?>"+"edit"+"successspan").show();
						
	$("#<?php echo $name;?>list").trigger("reloadGrid");
	<?php echo $name;?>getcompletedata(); 					
					},
					error : function(){alert("error while saving data");}
				  });
	}
	function <?php echo $name;?>showspancontent()
	{
		$("#<?php echo $name;?>"+"add"+"span").show();
		$("#<?php echo $name;?>"+"add"+"successspan").hide();
		$("#<?php echo $name;?>list").trigger("reloadGrid");
		<?php echo $name;?>getcompletedata(); 
		<?php echo $name;?>showformdiv();
	}
	function refreshgrid()
	{	
		var eles = $('.xjqgridclass');
		for(var i=0;i<eles.length;i++)
		{
			$("#"+eles[i].id.replace('idjqgrid','')+'list').trigger( 'reloadGrid' );
		}

	}
	</script>
<div id="<?php echo $name;?>idjqgrid" class="xjqgridclass" style="position:relative; " >
	<table>
	<tr><td>
	<?php if ( $savebtnenable == 'true')
	{?> <input type="button" style=" font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif; " value="Add New Row" width="120" onclick="<?php echo $name;?>showformdiv()" id="<?php echo $name;?>btnsave" /> <?php } ?>
	<?php if ( $editbtnenable == 'true')
	{?> <input type="button" style=" font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif;" value="Edit" width="80" onclick="<?php echo $name;?>showeditformdiv()" id="<?php echo $name;?>btnedit" /> <?php } ?>
	<?php if ( $deletebtnenable == 'true')
	{?> <input type="button" style=" font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif; " value="Delete" width="80" onclick="<?php echo $name;?>showdeletediv()" id="<?php echo $name;?>btndelete" /> <?php } ?>
	</td> </tr>
	<tr><td></td> </tr>
	<tr><td>
	<table id="<?php echo $name;?>list"></table>
	<div id="<?php echo $name;?>pager"></div> <input type="hidden" id="autocompletedata"/>
	</td> </tr>
	</table>
</div>

