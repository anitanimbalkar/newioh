 <style type="text/css">
  
div.container {
	background-color: #eee;
	border: 1px solid red;
	margin: 5px;
	padding: 5px;
}
div.container ol li {
	list-style-type: disc;
	margin-left: 20px;
}
div.container { display: none }
.container label.error {
	display: inline;
}
form.cmxform label.error, label.error {
    color: red;
    font-style: italic;
}
form.cmxform { width:100%; }
form.cmxform label.error {
	display: block;
	margin-left: 1em;
	width: auto;
}
 
    .watermarkOn {
        color: #CCCCCC;
        font-style: italic;
    }

  .ui-datepicker { width: 14em; padding: .2em .2em 0; display: none; }
.ui-datepicker table {width: 100%; font-size: .7em; border-collapse: collapse; margin:0 0 .4em; } 
.ui-widget {  font-size: 0.8em;}

 </style>
 
<script type="text/javascript">

$(document).ready(function() {


	//social habbits smoking, alcohol,tobacco
	dropdown = document.getElementById("smoking");
	itemToSelect =  "<?php echo $objpatient->smoking_c;  ?>";
	for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
    {    
      if (dropdown.options[iLoop].value == itemToSelect)
      {
        dropdown.options[iLoop].selected = true;
        break;
      }
    }
	dropdown = document.getElementById("alcohol");
	itemToSelect =  "<?php echo $objpatient->alcohol_c;  ?>";
	for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
    {    
      if (dropdown.options[iLoop].value == itemToSelect)
      {
        dropdown.options[iLoop].selected = true;
        break;
      }
    }
	dropdown = document.getElementById("tobacco");
	itemToSelect =  "<?php echo $objpatient->tobacco_c;  ?>";
	for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
    {    
      if (dropdown.options[iLoop].value == itemToSelect)
      {
        dropdown.options[iLoop].selected = true;
        break;
      }
    }
	/*
$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " 
						 );
				}
			}
		});
	});	
	*/
	$(function() {
		$( "#tabs" ).tabs();
	});
$("#tabs").tabs()
		$('#tabs-1').change(function() {
  				document.getElementById("savelbl").style.display = "none";
			});
		$('#tabs-3').change(function() {
  				document.getElementById("saveallergylbl").style.display = "none";
			});
		$('#tabs-5').change(function() {
  				document.getElementById("savesociallbl").style.display = "none";
			});
			

});

function savesocialhabbits()
{
	var tobacco = document.getElementById("tobacco");
	tobacco= tobacco.options[tobacco.selectedIndex].text;
	//alert(tobacco);
	var alcohol = document.getElementById("alcohol");
	alcohol= alcohol.options[alcohol.selectedIndex].text;
	var smoking = document.getElementById("smoking");
	smoking= smoking.options[smoking.selectedIndex].text;
	$.ajax({
		url: '/ayushman/cpatienthistory/savesocialhabbits?userid=<?= $user->id;?>&tobacco='+tobacco+'&alcohol='+alcohol+'&smoking='+smoking	,
		type:'POST',
		success:  function(data) {document.getElementById("savesociallbl").style.display = "block";},
		error : function(){alert("error while updating social habbits ");}		
	});
}

</script>

<div id="body_contantpatientpage"  style="width:828px; height:800px;overflow-y:auto; " > 
 
 <div id="tabs" style="float:left;vertical-align:top;height:auto;width:99%;position:relative;overflow-y:auto;none repeat scroll 0 0 #E8E8E8;border:0px;background:transparent;">
 <ul class="tabholder" style="background-color:none;background:none;border:none;">		
		
		<li class="TopBtn_bg"><a href="/ayushman/cpatientallergy/patientallergy">Allergy</a></li>
		<li class="TopBtn_bg"><a href="#tabs-5">Social Habits</a></li>	
		<li class="TopBtn_bg"><a href="/ayushman/cpatientimmunization/patientimmunization">Immunization</a></li>	
		<li class="TopBtn_bg"><a href="/ayushman/cpatientpastillness/patientpastillness">Personal  History</a></li>	
		<li class="TopBtn_bg"><a href="/ayushman/cpatientfamilyhistory/patientfamilyhistory">Family History</a></li>			
	</ul>
	
	<div id="tabs-5" style="height:auto;">
	 <table width="95%" class="bodytext">	 
	<!--Patient Social Habits -->
	<tr ><td colspan="8"><div  align="center"  style="height:11pt;width:85%;padding-top:2px;font-size:9pt;"  class="Leftmenuheading"><label  style="font-family:Verdana, Arial, Helvetica, sans-serif; "> Patient Social Habits</label></div></td> </tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td> </tr>
	 			 <tr   >
				 <td align="left" width="100px" >Smoking   </td>                     
                      <td style="font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" align="left" ><select style="width:150px;font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" id="smoking">
					  <option value="Chain smoker">Chain smoker</option>
                        <option value="Never">Never</option>
                        <option value="Rarely">Rarely</option>
                        <option value="Regularly">Regularly</option>                        
                      </select></td>
                   </tr>
				  <tr   >
                      <td align="left" >Alcohol </td>
                      <td style="font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" align="left" ><select style="width:150px;font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" id="alcohol">
					  <option value="1-2 pegs a day">1-2 pegs a day</option>
                        <option value=">more than 2 pegs daily">more than 2 pegs daily</option>
                        <option value="Never">Never</option>
                        <option value="Rarely">Rarely</option>                        
                      </select></td>
                   </tr>
				   <tr   >
                      <td align="left" >Tobacco </td>
                      <td align="left" style="font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;"><select style="width:150px;font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" id="tobacco">
                        <option value="Never">Never</option>
                        <option value="Occasionally">Occasionally</option>
                        <option value="Regularly">Regularly</option>
                      </select></td>
                   </tr>
				<tr  > 			           
                  <td colspan ="3"  >
				  <label id="savesociallbl" style="font-weight:bold;display:none; ">  Social habits have been saved.</label>
				  </td>                              
            </tr>
			 <tr >
			 <td colspan="4" style="float:left;">
						<input type="button"  class="button" height="22" style="width: 80px; height: 25px; " value="Save" onclick="savesocialhabbits()"/>
			</td></tr>
		</table>			  
	</div>
	
</div>

 </div>
   