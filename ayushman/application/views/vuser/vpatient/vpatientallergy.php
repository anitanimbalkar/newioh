<style type="text/css">

  input.textbox {
	padding-left:2px;
	border:none;
	background-color:transparent;
	border-bottom: 1px solid #909090;
	word-spacing:0;
	font-size: 8pt;
	word-wrap:no;
	height: 17px;
	overflow: hidden;
	width:auto;
	vertical-align:top;
	font-style:normal;
	font-family: tahoma,Helvetica,sans-serif;
	font-color::#0000FF;
	margin-right:0px;
	padding-right:0px;
	line-height: 12px;
	width:450px;

}
</style>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/xaccordianfunctions.js"></script>
<link type="text/css" href="/ayushman/assets/css/toggle.css" rel="stylesheet" media="screen" />
<link type="text/css" href="/ayushman/assets/css/tabs.css" rel="stylesheet" media="screen" />

<script type="text/javascript">

$(document).ready(function() {
$(".toggle_container").hide();
	
	$("h3.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
		});
//add already  checked items of allegry into textbox
setpatallergyvalues('wizard',<?=json_encode( $arrpatallergy);?> )	;

$('#patientallergy').change(function() {
				  document.getElementById("saveallergylbl").style.display = "none";
			});
});

function setpatallergyvalues(divid,arrdata)
{
	div = document.getElementById(divid).getElementsByTagName("input");
	for(var i=0;i<div.length;i++)
	{		
		if(div[i].type == "text"){
			
			if(arrdata[div[i].name] != undefined)
			{
				if(arrdata[div[i].name] != 0){
					div[i].value = arrdata[div[i].name];
					addtxtitem(div[i]);
				}									
			}
				
		}else if(div[i].type == "checkbox"){
			
			if(arrdata[div[i].name] != undefined)
			{
				if(arrdata[div[i].name] == 0)
					div[i].checked = false;
				else{
					div[i].checked = true;
					addchkitem(div[i]);
				}									
			}								
		}
	}
}

function saveallergies()
	{
		 foodelements= document.getElementById("idfood").getElementsByTagName('input');
		 food= new Array;k=0;
		 for(i=0;i<foodelements.length;i++)
		 {
		 	if(foodelements[i].checked) 
			{				
				food[k]=new Array();				
				food[k][0] = foodelements[i].name;
				food[k][1] = foodelements[i].value;
				k++;
			}
			if(foodelements[i].type=='text' && foodelements[i].name=="others" && foodelements[i].value!="") 
			{	
				arotherfood =new Array()	;
				arotherfood =  (foodelements[i].value).split(",")  ;
				otherfood = new Array(); 
				for(j=0;j< arotherfood.length;j++ )
				{
					x=0;
					otherfood[x] = new Array(); 
					otherfood[x][0] = "food";
					otherfood[x][1] = arotherfood[j];
					
					food[k]=new Array();				
					food[k][0] = "other"+j ;
					food[k][1] = otherfood[x] ;
					k++;x++;
				}			
				
			}
			
		 }	
		 
		 drugelements= document.getElementById("iddrug").getElementsByTagName('input');
		 drug= new Array;k=0;
		 for(i=0;i<drugelements.length;i++) 
		 {
		 	if(drugelements[i].checked)
			{
				drug[k]=new Array();
				drug[k][0] = drugelements[i].name;
				drug[k][1] = drugelements[i].value;
				k++;
			}
			if(drugelements[i].type=='text' && drugelements[i].name=="others" && drugelements[i].value!="") 
			{	
				arotherdrug =new Array()	;
				otherdrug = new Array(); 
				arotherdrug =  (drugelements[i].value).split(",")  ;
				for(j=0;j< arotherdrug.length;j++ )
				{
					x=0;
					otherdrug[x] = new Array(); 
					otherdrug[x][0] = "drug";
					otherdrug[x][1] = arotherdrug[j];
					drug[k]=new Array();				
					drug[k][0] = "other"+j ;
					drug[k][1] = otherdrug[x];
					k++;
				}			
				
			}
		 }	
		 animalelements= document.getElementById("idanimal").getElementsByTagName('input');
		 animal= new Array;k=0;
		 for(i=0;i<animalelements.length;i++)
		 {
		 	if(animalelements[i].checked)
			{
				animal[k]=new Array();
				animal[k][0] = animalelements[i].name;
				animal[k][1] = animalelements[i].value;
				k++;
			}
			if(animalelements[i].type=='text' && animalelements[i].name=="others" && animalelements[i].value!="") 
			{	
				arotheranimal =new Array()	;
				otheranimal = new Array();
				arotheranimal =  (animalelements[i].value).split(",")  ;
				for(j=0;j< arotheranimal.length;j++ )
				{
					x=0;
					otheranimal[x] = new Array();
					otheranimal[x][0]="animal";
					otheranimal[x][1]=arotheranimal[j];
					animal[k]=new Array();				
					animal[k][0] = "other"+j ;
					animal[k][1] = otheranimal[x];
					k++;
				}			
				
			}
		 }	
		 plantelements= document.getElementById("idplant").getElementsByTagName('input');
		 plant= new Array;k=0;
		 for(i=0;i<plantelements.length;i++)
		 {
		 	if(plantelements[i].checked)
			{
				plant[k]=new Array();
				plant[k][0] = plantelements[i].name;
				plant[k][1] = plantelements[i].value;
				k++;
			}
			if(plantelements[i].type=='text' && plantelements[i].name=="others" && plantelements[i].value!="") 
			{	
				arotherplant =new Array()	;
				otherplant = new Array()	;
				arotherplant =  (plantelements[i].value).split(",")  ;
				otherplant = new Array()	;
				for(j=0;j< arotherplant.length;j++ )
				{
					x=0;
					otherplant[x] = new Array()	;
					otherplant[x][0]= "plant";
					otherplant[x][1]= arotherplant[j];
					
					plant[k]=new Array();				
					plant[k][0] = "other"+j ;
					plant[k][1] = otherplant[x];
					k++; x++;
				}			
				
			}
		 }
		 arrayval = '<?=  $arrpatallergystr; ?>';
		 arr = [food,plant,animal,drug];
		 arr = JSON.stringify(arr);
		 		
		 //alert(arr.toString());
					
		$.ajax({
			url: '/ayushman/cpatienthistory/saveallergies?userid=<?= $objpatient->id;?>&allergies='+arr+'&arrayval='+arrayval,
			type:'POST',
			success:  function(data) {document.getElementById("saveallergylbl").style.display = "block";},
			error : function(){alert("error while updating patient allergies ");}		
		});
		
	}
</script>

<div id="patientallergy" style="height:auto; overflow:auto;">
	<div id="wizard" style="width:100%;height:auto; border:none;background: none repeat scroll 0 0 transparent; " >
	<input type="hidden" id="txtval" value="" />
	<table width="100%" class="bodytext">
			<tr ><td colspan="13"><div class="Leftmenuheading" align="center" style="height:11pt;width:85%;padding-top:2px;font-size:9pt;">
<label style="font-family:tahoma,Helvetica,sans-serif;padding-left:200px ;  "> Patient Allergies</label></div></td> </tr>	
			<tr><td>&nbsp;</td> </tr>	
			<tr><td>
		   <ui>
		    <tr><td>
			<div id="idfood" >
				   	<h3 class="trigger" style="width:620px;"><span style="line-height:21px;">Food Allergies</span><span><input style="font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" type="text" onfocus="getval(this)"  onchange="settval(this)" class="textbox" /></span></h3>
				<div class="toggle_container">				  
				 	<table width="100%">
					  <?php $str="";$k=0;
					 foreach($food as $key=> $val)
					 {
					 	$str = "<li class='required'><tr><td><label>".$val."</label></td><td><input type='checkbox' style='float:left;' class='select' name=".$key."  onclick='addchkitem(this);'  value=".$val;							
							echo $str ." /> </td></tr></li>";
						$k++;				
					 }
					$txt=' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="others" /> </td> </tr></li>';
					echo $txt;
					  ?>
					</table>
				</div>
			  </div>
            </td> </tr>
             <tr><td>
			 <div id="iddrug">
                   	<h3 class="trigger" style="width:620px;"><span style="line-height:21px;">Drug Allergies</span><span><input style="font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" type="text" onfocus="getval(this)"  onchange="settval(this)" class="textbox" /></span></h3>
				<div class="toggle_container">	
					  <table width="100%">
					  <?php $str="";$k=0;
					 foreach($drug as $key=> $val)
					 {
					 	$str = "<li class='required'><tr width='100%'><td><label>".$val."</label></td><td><input type='checkbox' name=".$key."  onclick='addchkitem(this);' value=".$val;					
						echo $str ." /> </td></tr></li>";
						$k++;				
					 }
					 $txt=' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="others" /> </td> </tr></li>';
					echo $txt;
					  ?>
					 </table>
					</div>
				</div>
              </td> </tr>
               <tr><td>
			   <div id="idplant" >
                   	<h3 class="trigger" style="width:620px;"><span style="line-height:21px;">Plant Allergies</span><span><input style="font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" type="text" onfocus="getval(this)"  onchange="settval(this)" class="textbox" /></span></h3>
				<div class="toggle_container">	
					  <table width="100%">
					  <?php $str="";$k=0;
					 foreach($plant as $key=> $val)
					 {
					 	$str = "<li class='required'><tr ><td><label>".$val."</label></td><td><input type='checkbox' name=".$key."  onclick='addchkitem(this);' value=".$val;
							echo $str ." /> </td></tr></li>";
						$k++;				
					 }
					$txt=' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="others" /> </td> </tr></li>';
					echo $txt;
					  ?>
					  </table>
				</div>
				</div>
              </td> </tr>
               <tr><td>
			   <div id="idanimal" >
                   	<h3 class="trigger" style="width:620px;"><span style="line-height:21px;">Animal Allergies</span><span><input style="font-size:9pt;font-family:Verdana,Arial,Helvetica,sans-serif;" type="text" onfocus="getval(this)"  onchange="settval(this)" class="textbox" /></span></h3>
				<div class="toggle_container">
				<table width="100%">	
					  <?php $str="";$k=0;
					 foreach($animal as $key=> $val)
					 {
					 	$str = "<li class='required'><tr width='100%'><td><label>".$val."</label></td><td><input type='checkbox' name=".$key."  onclick='addchkitem(this);'  value=".$val;
							echo $str ." /> </td></tr></li>";
						$k++;				
					 }
					$txt=' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="others" /> </td> </tr></li>';
					echo $txt;
					  ?>
					  </table>
				</div>
				</div>
              </td> </tr>                    
       	 </ui>
		</td> </tr> 
			<tr>
				<td>&nbsp;</td>
			</tr>
            <tr >                
               <td >
				  <label id="saveallergylbl"  style="font-weight:bold;display:none; ">  Patient alleries have been saved.</label>
				 </td>                              
            </tr>
			 <tr>			 
			 	<td >
					<input type="button"  class="button" height="22" style="width: 80px; height: 25px; " value="Save" onclick="saveallergies()"/></td>
			</tr>   
	</table>
	</div>
</div>