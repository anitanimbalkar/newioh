<style type="text/css">
input.textbox {
	padding-left:2px;
	border:none;
	border-bottom: 1px solid #909090;
	word-spacing:0;
	font-size: 8pt;
	word-wrap:no;
	height: 13px;
	overflow: hidden;
	width:auto;
	vertical-align:top;
	font-style:normal;
	font-family: verdana;
	font-color::#0000FF;
	margin-right:0px;
	padding-right:0px;
	line-height: 12px;

}
form input,form textarea {
	outline:none;
	font-family:serif;
	color:#0000ff;
	font-weight:bold;
	font-size:13px;
}
span {
	font-size:8pt;
	color:black;	
	
}

</style>
<script type="text/javascript">
		$(document).ready(function(){
				var nodes = document.getElementById("divleft").childNodes;
				for(var i=0;i<nodes.length;i++)
				{
					if(nodes[i].nodeName == "H3")
					{
						val = nodes[i].clientWidth -  nodes[i].childNodes[0].offsetWidth;
						 nodes[i].childNodes[1].childNodes[0].style.width = (val-10) +"px";
					}
				}
				var nodes = document.getElementById("divright").childNodes;
				for(var i=0;i<nodes.length;i++)
				{
					if(nodes[i].nodeName == "H3")
					{
						val = nodes[i].offsetWidth -  nodes[i].childNodes[0].offsetWidth;
						 nodes[i].childNodes[1].childNodes[0].style.width = (val-10) +"px";
					}
				}
			
		});
	function cleartxtitem()
	{
		var nodes = document.getElementById("divleft").childNodes;
		for(var i=0;i<nodes.length;i++)
		{
			if(nodes[i].nodeName == "H3")
			{
				 nodes[i].childNodes[1].childNodes[0].value="";
			}
		}
		var nodes = document.getElementById("divright").childNodes;
		for(var i=0;i<nodes.length;i++)
		{
			if(nodes[i].nodeName == "H3")
			{
				 nodes[i].childNodes[1].childNodes[0].value="";
			}
		}
	}
function trim(str) {
	return str.replace(/^\s+|\s+$/g,"");
}
function getval(textbox)
{
	document.getElementById("txtval").value=textbox.value;		
}
function settval(textbox)
{	
	textbox.value =$("#txtval").val();
}	
 function dump(obj) {
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
function addchkitem(checkbox)
{
	
	var label=checkbox.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value;
	//alert( checkbox.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value) ;
	
	if(checkbox.checked)
		{	
		if(label.length == 0)	
		{				
			label = $(checkbox).parent().parent().children(0).children(0).html();
			}		
		else
		label = label+ ","+ $(checkbox).parent().parent().children(0).children(0).html();
		checkbox.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value = label;	 
	}
	if(!checkbox.checked)
	{
		label = $(checkbox).parent().parent().children(0).children(0).html();
		var selectedtext = checkbox.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value;				
		if(selectedtext.indexOf(label)!= '-1' )
			{	
			if(selectedtext.indexOf(","+ label)!= '-1' )
				selectedtext= selectedtext.replace(","+ label,'');
			else	
			selectedtext= selectedtext.replace(label,'');
			if(selectedtext.indexOf(',')==0 )
				selectedtext= selectedtext.replace(',','');
			checkbox.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value = selectedtext;	 
			}			
		}
			
	}	
function addtxtitem(text)
{
	var label= trim( text.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value);	
			
	var textlabel = trim( $(text).parent().parent().children(0).children(0).html());
	if( label.indexOf(textlabel)== '-1' )
	{
		if(label.length == 0)	
		{				
			label = textlabel +"="+ trim($(text).val());
			}		
		else
		label =trim( label)+ ","+ textlabel +"="+ trim($(text).val());
		text.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value = label;	 
	}
	else
	{				
		if(label.indexOf(textlabel)==0)//check for first element
		{	
			if(label.indexOf(',') == '-1')
			{
				if( $(text).val().length == 0)
					label = '';
				}							
			else 
			{
				var replacetext = label.substring(label.indexOf(textlabel),label.indexOf(',', label.indexOf(textlabel)));
				if($(text).val() == '')
					label = label.replace(replacetext+",",'');
				else					
				label = label.replace(replacetext, textlabel+"="+$(text).val());
			}
		}
		else
		{
			if( label.indexOf(',', label.indexOf(textlabel))== '-1' )//check if last element
			{
				var replacetext = label.substring(label.indexOf(textlabel),label.length);
				if($(text).val() == '')
					label = label.replace(","+ replacetext,'');
				else					
				label = label.replace(replacetext,textlabel+"="+$(text).val());				
			}
			else
			{	
				var replacetext = label.substring(label.indexOf(textlabel),label.indexOf(',', label.indexOf(textlabel)));
				if($(text).val() == '')
					label = label.replace(","+ replacetext,'');
				else					
				label = label.replace(replacetext,textlabel+"="+$(text).val());
			}
		}
		text.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].nextSibling.childNodes[0].value =label ;
	}
}
function saveexamination(appid)
{
	var array = new Array();
	e = document.getElementById("Examination").getElementsByTagName("input");
	for(var i=0;i<e.length;i++)
	{
		if(e[i].type == "text"){
			array[i] = new Array(2);
			array[i][0] = e[i].name;
			array[i][1] = e[i].value;
		}else if(e[i].type == "checkbox"){
			array[i] = new Array(2);
			array[i][0] = e[i].name;
			array[i][1] = e[i].checked;
		}
	}
	$.ajax({
			  url: "/ayushman/cpatient/create?appid="+appid,
			  type: 'POST',
			  data: {"val": JSON.stringify(array)},
			  success: function( data ) {
			  		//alert("success :/ayushman/cpatientexamination/save");
				},
				error : function(){alert("error while inserting examinations");}					
			  });	
}
function getexaminationrecords(appid)
{
	
	$.ajax({
			  url: "/ayushman/Cpatientexamination/getbyappid?appid="+appid,
			  success: function( data ) {
			  		var arrdata =eval('(' + data + ')');
					div = document.getElementById("Examination").getElementsByTagName("input");
					for(var i=0;i<div.length;i++)
					{
						if(div[i].type == "text"){
							div[i].setAttribute('readonly','readonly');
							if(arrdata[div[i].name] != undefined)
							{
								if(arrdata[div[i].name] != 0){
									div[i].value = arrdata[div[i].name];
									addtxtitem(div[i]);
								}									
							}
								
						}else if(div[i].type == "checkbox"){
							div[i].setAttribute('disabled','true');
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
				},
				error : function(){alert("error while getting examination records");}					
			  });	
}
</script>

<ul>

	<div class="panes">
	<div class="page" id="Examination" style="width:100%;height:auto;" > 	
	<input type="hidden" id="txtval" value="" />	
<ul>
<div id="divleft" style="width:50%; height=auto; overflow:auto; float:left; " >

<h3 class="trigger"><span>General</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
	<tr><td><label style="width:100%;">
	BP (supine)   </label></td><td>
	<input type="text" class="text" name="bpsupine_c" onchange="addtxtitem(this)" /> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	BP (sitting)   </label></td><td>
	<input type="text" class="text" name="bpsitting_c" onchange="addtxtitem(this)"/> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	BP (standing)   </label></td><td>
	<input type="text" class="text" name="bpstanding_c" onchange="addtxtitem(this)"/> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Temp   </label></td><td>
	<input type="text" class="text" name="temperature_c" onchange="addtxtitem(this)"/> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Pulse Rate   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="pluserate_c" /> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Pulse Rhythm   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="pluserhythm_c" /> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Pulse Volume   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="plusevolume_c" /> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Pulse Type   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="plusetype_c" /> </td> </tr>
	
</li>
<!-- <li class="required">
	<tr><td><label style="width:100%;">
	Hemoglobin   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="hemoglobin_c" /> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Sugar Before Food   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="sugarbeforefood_c" /> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Sugar After Food   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="sugarafterfood_c" /> </td> </tr>
	
</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Age   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="age_c" /> </td> </tr>
	
</li> -->
<li class="required" style="display:none;">
	<tr style="display:none;"><td><label style="width:100%;">
	Height   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="height_c" /> </td> </tr>
	
</li>
<li class="required" >
	<tr style="display:none;"><td><label style="width:100%;">
	Weight   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="weight_c" /> </td> </tr>
	
</li>
<li class="required" style="display:none;">
	<tr style="display:none;"><td><label style="width:100%;">
	Bmi   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="bmi_c" /> </td> </tr>
	
</li>
<li class="required" style="display:none;">
	<tr style="display:none;"><td><label style="width:100%;">
	Whr   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="whr_c" /> </td> </tr>
	
</li> 
<li class="required" style="display:none;">
	<tr style="display:none;"><td><label style="width:100%;">
	Heart Rate   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="heartrate_c" /> </td> </tr>
	
</li> 
</table>
</div>


<h3 class="trigger"><span>Eye</span><span><input type="text" onfocus="getval(this)"  onchange="settval(this)" class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Conj Injection</label></td><td> <input type="checkbox" class="select" name="conjInjection_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Styes</label></td><td> <input type="checkbox" class="select" name="styes_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Trachomas</label></td><td> <input type="checkbox" class="select" name="trachomas_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Cornea</label></td><td> <input type="checkbox" class="select" name="cornea_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Pallor</label></td><td> <input type="checkbox" class="select" name="pallor_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Icterus</label></td><td> <input type="checkbox" class="select" name="eyeicterus_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Visual Acuity</label></td><td> <input type="checkbox" class="select" name="visualacuity_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Color vision</label></td><td> <input type="checkbox" class="select" name="colorvision_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Pressure</label></td><td> <input type="checkbox" class="select" name="pressure_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Fundus</label></td><td> <input type="checkbox" class="select" name="fundus_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"  onchange="addtxtitem(this)" name="othereyeproblems_c" /> </td> </tr>
	
</li>
</table>
</div>

<h3 class="trigger"><span>Nose</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Deviated Septum</label></td><td> <input type="checkbox" class="select" name="deviatedseptum_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Polyps</label></td><td> <input type="checkbox" class="select" name="nosepolyps_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Turbinate swelling</label></td><td> <input type="checkbox" class="select" name="turbinateswelling_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
<li class="required">
<tr><td><label style="width:100%;">Discharge</label></td><td> <input type="checkbox" class="select" name="nosedischarge_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Boils</label></td><td> <input type="checkbox" class="select" name="boils_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Ear</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Discharge </label></td><td> <input type="checkbox" class="select" name="eardischarge_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Wax</label></td><td> <input type="checkbox" class="select" name="wax_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Hearing</label></td><td> <input type="checkbox" class="select" name="hearing_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Mouth & Pharynx</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Lips</label></td><td> <input type="checkbox" class="select" name="lips_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Tongue</label></td><td> <input type="checkbox" class="select" name="tongue_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Ulcers</label></td><td> <input type="checkbox" class="select" name="ulcers_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Leukoplakia</label></td><td> <input type="checkbox" class="select" name="leukoplakia_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Tonsils</label></td><td> <input type="checkbox" class="select" name="tonsils_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Granular Pharyngitis</label></td><td> <input type="checkbox" class="select" name="granularpharyngitis_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="othermouthproblems_c" /> </td> </tr>
	
</li>
</table>
</div>

<h3 class="trigger"><span>Teeth</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Missing teeth</label></td><td> <input type="checkbox" class="select" name="missingteeth_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Discoloration</label></td><td> <input type="checkbox" class="select" name="discoloration_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="otherteethproblems_c" /> </td> </tr>	
</li>
</table>
</div>

<h3 class="trigger"><span>Gums</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Tenderness</label></td><td> <input type="checkbox" class="select" name="gumtenderness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Bleeding</label></td><td> <input type="checkbox" class="select" name="bleeding_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Discharge</label></td><td> <input type="checkbox" class="select" name="discharge_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="othergumproblems_c" /> </td> </tr>	
</li>
</table>
</div>

<h3 class="trigger"><span>Face</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Puffiness</label></td><td> <input type="checkbox" class="select" name="puffiness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Oedema</label></td><td> <input type="checkbox" class="select" name="oedema_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Acne</label></td><td> <input type="checkbox" class="select" name="acne_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Rash</label></td><td> <input type="checkbox" class="select" name="facerash_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="otherfaceproblems_c" /> </td> </tr>	
</li>
</table>
</div>

<h3 class="trigger"><span>Neck</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Thyromegaly</label></td><td> <input type="checkbox" class="select" name="thyromegaly_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Thyroid nodules</label></td><td> <input type="checkbox" class="select" name="thyroidnodules_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Bruits</label></td><td> <input type="checkbox" class="select" name="bruits_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">JVP</label></td><td> <input type="checkbox" class="select" name="jvp_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Lymphandenopathy</label></td><td> <input type="checkbox" class="select" name="lymphandenopathy_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Carotid Pulse</label></td><td> <input type="checkbox" class="select" name="carotidpulse_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Respiratory Inspection</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Respiratory Rate</label></td><td> <input type="checkbox" class="select" name="respiratoryrate_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Bulges</label></td><td> <input type="checkbox" class="select" name="respiratoryinspectionbulges_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Deformity</label></td><td> <input type="checkbox" class="select" name="respiratoryinspectiondeformity_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Skin Crepitus</label></td><td> <input type="checkbox" class="select" name="skincrepitus_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Chest Wall tenderness</label></td><td> <input type="checkbox" class="select" name="chestwalltenderness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Rhonchi</label></td><td> <input type="checkbox" class="select" name="rhonchi_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Crepitations</label></td><td> <input type="checkbox" class="select" name="crepitations_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Abnormal Sound</label></td><td> <input type="checkbox" class="select" name="abnormalsound_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="otherspercussionauscultationproblems_c" /> </td> </tr>	
</li>
</table>
</div>

<h3 class="trigger"><span>Cardiac Inspection</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /> </span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Bulges</label></td><td> <input type="checkbox" class="select" name="bulges_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Visible pulsations</label></td><td> <input type="checkbox" class="select" name="visiblepulsations_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Palpation - Apex beat</label></td><td> <input type="checkbox" class="select" name="apexbeat_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Palpation - Thrills</label></td><td> <input type="checkbox" class="select" name="thrills_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Palpation - sound</label></td><td> <input type="checkbox" class="select" name="palpablesound_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Percussion - Stern dullness</label></td><td> <input type="checkbox" class="select" name="parasternal dullness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Percussion - Cardiac borders</label></td><td> <input type="checkbox" class="select" name="cardiacborders_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Auscultation - Tachy</label></td><td> <input type="checkbox" class="select" name="tachy_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Auscultation - Brady</label></td><td> <input type="checkbox" class="select" name="brady_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Murmur</label></td><td> <input type="checkbox" class="select" name="murmur_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Gallop</label></td><td> <input type="checkbox" class="select" name="gallop_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Heart sound - 1st</label></td><td> <input type="checkbox" class="select" name="heartsounds_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Heart sound - 2nd</label></td><td> <input type="checkbox" class="select" name="heartsounds_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Heart sound - 3rd</label></td><td> <input type="checkbox" class="select" name="heartsounds_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Heart sound - 4th</label></td><td> <input type="checkbox" class="select" name="heartsounds_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="otherauscultationproblems_c" /> </td> </tr>
	
</li>
</table>
</div>

<h3 class="trigger"><span>Abdomen Inspection</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" />
 </span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Hernial orifice</label></td><td> <input type="checkbox" class="select" name="hernialorifice_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Visible lumps</label></td><td> <input type="checkbox" class="select" name="visiblelumps_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Tenderness</label></td><td> <input type="checkbox" class="select" name="palpationtenderness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Rebound</label></td><td> <input type="checkbox" class="select" name="rebound_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Palpable mass</label></td><td> <input type="checkbox" class="select" name="palpablemass_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Hepatomagaly</label></td><td> <input type="checkbox" class="select" name="hepatomagaly_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Splenomegaly</label></td><td> <input type="checkbox" class="select" name="splenomegaly_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Ascites</label></td><td> <input type="checkbox" class="select" name="ascites_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Aortic/renal bruit</label></td><td> <input type="checkbox" class="select" name="aeortic_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Genito Urinary</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" />
 </span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label >External Genitalia</label></td><td> <input type="checkbox" class="select" name="externalgenitalia_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Vesicles/ulcerations /mass</label></td><td> <input type="checkbox" class="select" name="vesicles_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Vaginal/Penile Discharge</label></td><td> <input type="checkbox" class="select" name="vaginal_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Testicular Mass/Tenderness</label></td><td> <input type="checkbox" class="select" name="testicularmass_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="othergenitourinaryproblems_c" /> </td> </tr>
	
</li>
</table>
</div>

</div>



<div  id="divright"  style="width:50%;  height=auto; overflow:auto; float:right;">
<h3 class="trigger"><span>Rectal examination</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Piles</label></td><td> <input type="checkbox" class="select" name="piles_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Fissure</label></td><td> <input type="checkbox" class="select" name="fissure_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Anal tags</label></td><td> <input type="checkbox" class="select" name="analtags_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Prolapse</label></td><td> <input type="checkbox" class="select" name="prolapse_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Rectal mass</label></td><td> <input type="checkbox" class="select" name="rectalmass_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Prostate</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Prostate</label></td><td> <input type="text" class="select" name="prostate_c" onchange="addchkitem(this);" /> </td> </tr>

</li>
</table>
</div>


<h3 class="trigger"><span>Per vaginal examination</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Polyps</label></td><td> <input type="checkbox" class="select" name="polyps_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Lumps</label></td><td> <input type="checkbox" class="select" name="lumps_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Adenexal Mass</label></td><td> <input type="checkbox" class="select" name="adenexalmass_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Uterine mass</label></td><td> <input type="checkbox" class="select" name="uterinemass_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Breast</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Skin retraction</label></td><td> <input type="checkbox" class="select" name="skinretraction_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Mass</label></td><td> <input type="checkbox" class="select" name="mass_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Axillary glands</label></td><td> <input type="checkbox" class="select" name="axillaryglands_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Nipple discharge</label></td><td> <input type="checkbox" class="select" name="nippledischarge_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Extremities</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Para spinal spasm</label></td><td> <input type="checkbox" class="select" name="paraspinalspasm_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Tenderness spine</label></td><td> <input type="checkbox" class="select" name="tendernessspine_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Lumps /indentations</label></td><td> <input type="checkbox" class="select" name="anylumpsindentations_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Passive Movement</label></td><td> <input type="checkbox" class="select" name="passivemovement_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Sensations</label></td><td> <input type="checkbox" class="select" name="backsensations_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">edema-pitting/non-pitting</label></td><td> <input type="checkbox" class="select" name="edemapitting_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Varicose veins</label></td><td> <input type="checkbox" class="select" name="varicoseveins_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Joints</label></td><td> <input type="checkbox" class="select" name="joints_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Crepitus</label></td><td> <input type="checkbox" class="select" name="crepitus_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Deformity</label></td><td> <input type="checkbox" class="select" name="deformity_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Tenderness</label></td><td> <input type="checkbox" class="select" name="tenderness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Inflamed, red,</label></td><td> <input type="checkbox" class="select" name="inflamed_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Movements</label></td><td> <input type="checkbox" class="select" name="movements_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Examination of feet</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Temp</label></td><td> <input type="checkbox" class="select" name="temp_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Pulses</label></td><td> <input type="checkbox" class="select" name="pulses_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="otherfeetproblems_c" /> </td> </tr>	
</li>
</table>
</div>

<h3 class="trigger"><span>Skin</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Body hair</label></td><td> <input type="checkbox" class="select" name="bodyhair_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Rash</label></td><td> <input type="checkbox" class="select" name="rash_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Cyanosis</label></td><td> <input type="checkbox" class="select" name="cyanosis_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Icterus</label></td><td> <input type="checkbox" class="select" name="icterus_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Lesions</label></td><td> <input type="checkbox" class="select" name="lesions_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Nails</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Platynychia</label></td><td> <input type="checkbox" class="select" name="platynychia_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Clubbing</label></td><td> <input type="checkbox" class="select" name="clubbing_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Lymph glands</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Neck</label></td><td> <input type="checkbox" class="select" name="neck_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Axillary</label></td><td> <input type="checkbox" class="select" name="axillary_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Inguinal</label></td><td> <input type="checkbox" class="select" name="inguinal_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Neurological</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Orientation</label></td><td> <input type="checkbox" class="select" name="orientation_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Gait</label></td><td> <input type="checkbox" class="select" name="gait_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Gaze</label></td><td> <input type="checkbox" class="select" name="gaze_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Abnormal movements</label></td><td> <input type="checkbox" class="select" name="abnormalmovements_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Action tremors</label></td><td> <input type="checkbox" class="select" name="actiontremors_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Nystagmus</label></td><td> <input type="checkbox" class="select" name="nystagmus_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Power</label></td><td> <input type="checkbox" class="select" name="power_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Tone</label></td><td> <input type="checkbox" class="select" name="tone_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Reflexes</label></td><td> <input type="checkbox" class="select" name="reflexes_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Coordination</label></td><td> <input type="checkbox" class="select" name="coordination_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Sensations</label></td><td> <input type="checkbox" class="select" name="sensations_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="otherneurologicalproblems_c" /> </td> </tr>
	</li>
</table>
</div>

<h3 class="trigger"><span>Psycological</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Mood</label></td><td> <input type="checkbox" class="select" name="mood_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Appearance</label></td><td> <input type="checkbox" class="select" name="appearance_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Anxiety</label></td><td> <input type="checkbox" class="select" name="anxiety_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Restlessness</label></td><td> <input type="checkbox" class="select" name="restlessness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Irritability</label></td><td> <input type="checkbox" class="select" name="irritability_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Depression</label></td><td> <input type="checkbox" class="select" name="depression_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
	<tr><td><label style="width:100%;">
	Others   </label></td><td>
	<input type="text"  class="text"   onchange="addtxtitem(this)" name="otherpsychologicalproblems_c" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Diabetes-new</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Increased thirst?</label></td><td> <input type="checkbox" class="select" name="increasedthirst_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Dry mouth?</label></td><td> <input type="checkbox" class="select" name="drymouth_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Decreased appetite? </label></td><td> <input type="checkbox" class="select" name="decreasedappetite_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Nausea or vomiting?</label></td><td> <input type="checkbox" class="select" name="nauseaorvomiting_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Abdominal pain?</label></td><td> <input type="checkbox" class="select" name="abdominalpain_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Frequent urination at night?</label></td><td> <input type="checkbox" class="select" name="frequenturinationatnight_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Morning headaches?</label></td><td> <input type="checkbox" class="select" name="morningheadaches_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Night sweats?</label></td><td> <input type="checkbox" class="select" name="nightsweats_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Lightheadedness?</label></td><td> <input type="checkbox" class="select" name="lightheadedness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Shakiness or weakness</label></td><td> <input type="checkbox" class="select" name="shakinessorweakness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Intense hunger?</label></td><td> <input type="checkbox" class="select" name="intensehunger_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Fainting attacks?</label></td><td> <input type="checkbox" class="select" name="faintingattacks_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Tingling?</label></td><td> <input type="checkbox" class="select" name="tingling_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Numbness?</label></td><td> <input type="checkbox" class="select" name="numbness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Vision problems?</label></td><td> <input type="checkbox" class="select" name="visionproblems_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr ><td><label style="width:100%;">Feel you are walking on cotton wool?</label></td><td> <input type="checkbox" class="select" name="feelyouarewalkingoncottonwool_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr ><td style="width:90%;"><label style="width:100%;"> Non healing wounds and ulcers?</label></td><td> <input type="checkbox" class="select" name="nonhealingwoundsandulcers_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Fungal infection?</label></td><td> <input type="checkbox" class="select" name="fungalinfection_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Urinary infection?</label></td><td> <input type="checkbox" class="select" name="urinaryinfection_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Vaginal discharge?</label></td><td> <input type="checkbox" class="select" name="vaginaldischarge_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Non responding cough?</label></td><td> <input type="checkbox" class="select" name="nonrespondingcough_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;"> Diarrhoea?</label></td><td> <input type="checkbox" class="select" name="diarrhoea_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr ><td><label style="width:100%;">Any history of unconsciousness?</label></td><td> <input type="checkbox" class="select" name="anyhistoryofunconsciousness_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Any hospitalisations?</label></td><td> <input type="checkbox" class="select" name="anyhospitalisations_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Diabetes -old</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container">
<table width="100%">
<li class="required">
<tr><td style="width:90%;"><label style="width:100%;">Do you understand your disease?</label></td><td> <input type="checkbox" class="select" name="doyouunderstandyourdisease_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr style="height:40px;"><td><label style="width:100%;">How many years back your diabetes first detected?</label></td><td> <input type="checkbox" class="select" name="howmanyyearsbackyourdiabetesfirstdetected_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">What treatment were you given initially?</label></td><td> <input type="checkbox" class="select" name="whattreatmentweryougiveninitially_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">How often do you test your sugar level? </label></td><td> <input type="checkbox" class="select" name="howoftendoyoutestyoursugarlevel_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">How do you test your own sugar level:</label></td><td> <input type="checkbox" class="select" name="howdoyoutestyoursugarlevel_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr ><td><label style="width:100%;">Do you own a Glucometer</label></td><td> <input type="checkbox" class="select" name="doyouownaglucometer_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr style="height:40px;"><td><label style="width:100%;">Do you eat/drink special diabetic food items?</label></td><td> <input type="checkbox" class="select" name="doyoueatordrinkspecialdiabeticfooditems_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr style="height:40px;"><td><label style="width:100%;">Has your doctor ever informed you that your diabetes can cause c</label></td><td> <input type="checkbox" class="select" name="isyourdiabetescancausecomplications_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr style="height:40px;"><td><label style="width:100%;">During the past one year, has your doctor examined your feet?</label></td><td> <input type="checkbox" class="select" name="inlastyearhasyourdoctorexaminedyourfeet_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">How frequently does your doctor conduct blood tests for complica</label></td><td> <input type="checkbox" class="select" name="bloodtestfrequecy_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr style="height:40px;"><td><label style="width:100%;">Have you got the retina of your eyes checked in the past year?</label></td><td> <input type="checkbox" class="select" name="retinacheckedinlast year_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr ><td><label style="width:100%;">Do you get your HbAIC checked regularly?</label></td><td> <input type="checkbox" class="select" name="doyougetyourhbaiccheckedregularly_c" value="true" onchange="addchkitem(this);" /> </td> </tr>
</li>
</table>
</div>

<h3 class="trigger"><span>Physical Activities</span><span><input type="text"  onfocus="getval(this)"  onchange="settval(this)"  class="textbox" /></span></h3>
<div class="toggle_container" id="divcon">
<table width="100%">
<li class="required">
<tr><td><label style="width:100%;">Walking </label></td><td> <input type="checkbox" class="select" name="walking_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Swimming</label></td><td> <input type="checkbox" class="select" name="swimming_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Gym </label></td><td> <input type="checkbox" class="select" name="gym_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Yoga </label></td><td> <input type="checkbox" class="select" name="yoga_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Games </label></td><td> <input type="checkbox" class="select" name="games_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Home - treadmill </label></td><td> <input type="checkbox" class="select" name="treadmill_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Exercise bike</label></td><td> <input type="checkbox" class="select" name="exercisebike_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
<li class="required">
<tr><td><label style="width:100%;">Aerobic</label></td><td> <input type="checkbox" class="select" name="aerobic_c" value="true" onchange="addchkitem(this);" /> </td> </tr>

</li>
</table>
</div>



</div>
<li class="clearfix">	
<!--	<button type="button" onclick="saveexamination();" name="save">Save </button>-->
</li>
</ul>
</div>
</div><!--panes-->
</ul>
