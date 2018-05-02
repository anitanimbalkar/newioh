<script src="/ayushman/assets/js/jquery.textarea-expander.js"></script>
	
<style type="text/css">
.disable{
	pointer-events: none;
	cursor: default;
}

.textbox {
background:transparent;
border:none;
border-bottom:1px solid;
border-color:black;
}
.firsttcell{
	line-height:17px;
}
.secondcell{
	line-height:14px;
}
</style>
<script type="text/javascript">

$(document).ready(function(){			
	$('.firsttcell').change(function() {
		sectionheading =  trim($(this).parent().parent().parent().parent().parent().prev().html());
		
		sectionheadingtext = sectionheading.replace('■ ','');
		sectionheadingtext = sectionheadingtext.replace(' → ','');
		//alert(sectionheadingtext);
	    var symtext = trim(document.getElementById("sympexaminations_c").value);
		//span = ($(this).parent().next().children(0).children(0).children(1));
		span = (this.parentNode.nextSibling.children[0].children[1]);		
		ardata = checkforallselected(span);
	
		allselectflag=0;
		for(x=0;x<ardata.length;x++)
		{			
			if(ardata[x]!='')
			{
				allselectflag++;
			}
		}
		if(allselectflag == ardata.length)
		{
			selectedtext="";
			for (i=0;i<span.children.length;i++)
			{
				if(span.children[i].type== 'radio' && span.children[i].tagName=='INPUT')
				{
				}
				else if(span.children[i].tagName=='INPUT' && span.children[i].type== 'text' )
				{
					inputval = span.children[i].value;
					selectedtext = selectedtext +trim(inputval)+" ";
				}
				else if(span.children[i].tagName== 'SELECT' )
				{
					selectval =$("#"+span.children[i].id+" option:selected").text();
					selectedtext = selectedtext +trim(selectval)+" ";
				}
				else if(span.children[i].tagName == 'LABEL' )
				{
					labelval = span.children[i].innerHTML;
					selectedtext = selectedtext + trim(labelval) +" ";
				}	
			}
			if(symtext.indexOf(selectedtext)>=0 )
			{
				
				var replacetext = symtext.substring(symtext.indexOf(selectedtext),symtext.indexOf('□',symtext.indexOf(selectedtext))+1);
				//alert("replacetext = "+replacetext +" $selectedtext = "+selectedtext);
				symtext= symtext.replace(replacetext,'');
			}
		}
		if(symtext.indexOf(sectionheadingtext)=='-1' )
		{
			symtext =trim( symtext+"\n"+ sectionheading) +" → ";
		}		
		for (i=0;i< this.children.length;i++)
		{
			if(this.children[i].type== 'radio')
			{
				radioval = $('input[name='+this.children[i].name+']:checked').val();
				if(symtext.indexOf(radioval) =='-1' )
				{
					symtext = symtext+" "+radioval+" ";
					$("textarea#sympexaminations_c").val(symtext+"□ ");
				}	
			}
		}
		$('#sympexaminations_c').focus();
	});
	$('.secondcell').change(function() {
		var symtext = (document.getElementById("sympexaminations_c").value);
		sectionheading = trim($(this).parent().parent().parent().parent().parent().prev().html());
		
		if(symtext.indexOf(sectionheading)=='-1' )
		{
			symtext =trim( symtext+"\n"+sectionheading) +" → ";
		}
		ardata = checkforallselected(this.children[1]);		
		allselectflag=0;
		for(x=0;x<ardata.length;x++)
		{			
			if(ardata[x]!='')
			{
				allselectflag++;
			}
		}
		//alert(allselectflag+" " +ardata.length);
		if(allselectflag == ardata.length)
		{
			span = this.children[1]; selectedtext="";
			for (i=0;i<span.children.length;i++)
			{
				if(span.children[i].type== 'radio' && span.children[i].tagName=='INPUT')
				{
				}
				else if(span.children[i].tagName=='INPUT' && span.children[i].type== 'text' )
				{
					inputval = span.children[i].value;
					selectedtext = selectedtext +trim(inputval)+" ";
				}
				else if(span.children[i].tagName== 'SELECT' )
				{
					selectval =$("#"+span.children[i].id+" option:selected").text();
					selectedtext = selectedtext +trim(selectval)+" ";
				}
				else if(span.children[i].tagName == 'LABEL' )
				{
					labelval = span.children[i].innerHTML;
					selectedtext = selectedtext + trim(labelval) +" ";
				}	
			}
			defaultradio = ($(this).parent().prev().children(0).children(0));			
			if(symtext.indexOf($(defaultradio).val())>=0 )
			{
				replacetext =$(defaultradio).val();
				symtext= symtext.replace(replacetext+" □",'');
			}
			if(symtext.indexOf(selectedtext)>=0  ) //check if selcted text is already present in textarea
			{
				document.getElementById("sympexaminations_c").value = symtext;
			}
			else
				document.getElementById("sympexaminations_c").value = symtext+selectedtext+"□ ";
			
				
		}
		$('#sympexaminations_c').focus();		
	});
});
function checkforallselected(span)
{
	ardata	= new Array;k=0;
	for (i=0;i<span.children.length;i++)
	{	
		//alert(span.children[i] );
		if(span.children[i].tagName=='INPUT' && span.children[i].type== 'text' )
		{
			inputval = span.children[i].value;
			ardata[k] =trim(inputval);	
			k++;
		}
		else if(span.children[i].tagName== 'SELECT' )
		{
			selectval =$("#"+span.children[i].id+" option:selected").text();
			ardata[k] = trim(selectval);
			k++;
		}
		
	}
	return (ardata);
}
function trim(str) {
	return str.replace(/^\s+|\s+$/g,"");
}
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);
}

function changebgcolor(tr)
{
	tr.style.background = "#cccccc";
}
function resetcolor(tr)
{
	tr.style.background = "transparent";
	//alert("helo...");
}
function togglesubdiv(divheader)
{
	contentdiv = $(divheader).next();
	$(contentdiv).animate({
					height: 'toggle'
			}, 100, function() {
						
	});
}

function enableslection(togglebtn)
{
	if(togglebtn.checked == true)
	{
		$(togglebtn).next().removeClass("disable");
	}
}
</script>
<div id="symptomaticforms"  class="BG" style="height:185px;width:auto;overflow-y:auto; box-shadow: 0px 0px 10px #000000;">

	<div id='genexdiv'  >
		<div id='header' class='Leftmenuheading' style='height:22px;width:98%; float: left; font-family: tahoma; padding:0px; '>General Examinations <img src='/ayushman/assets/images/close.png' style='float:right; height:20px; width:20px;vertical-align:center;'  onclick='closeall()' ></img></div>
		
		<div id='symptomaticreviewcontent' style='height:100%;width:98%; float: left; font-family: tahoma;font-size:9pt ;'>
		<?php 
			$i=0;
			foreach($arrforms as $key=> $arrsections)
			{
				foreach($arrsections as $sectionnm => $arrquestion)
				{
					$sectionheading = " <div id='wrapperdiv' style='padding-left:5px; width:100%;height:auto;overflow:hidden;margin-bottom:5px;margin-top:5px;'> <div style='width=100%;height:16px;background-color:#e9e9e9;cursor:pointer;text-align:left; ' title='Click to Maximise and Minimise' onclick='togglesubdiv(this)' > "." ■  ".$sectionnm ."</div>";
					echo $sectionheading;
					$sectioncontent = "<div id='content' style='padding-left:10px; width:100%:height:auto; font-size:8pt;font-family:tahoma;display:none; ' >";
					$sectioncontent =$sectioncontent. "<table width='100%' border='0' cellpadding='0' cellspacing='0' >";
					echo $sectioncontent;
					$k=0;
					foreach($arrquestion as $qus => $arrqusdtls)
					{
						$selectid="";$selectend="";$seconcellinputstatement="";
						$rowstatement = "<tr onmouseover='changebgcolor(this)' onmouseout='resetcolor(this)' onmouseleave='resetcolor(this)' style='line-height:12px;font-size: 8pt;' ><td width='120' style='border-bottom:1px dotted #A7A9AB;text-align:left;font-size: 8pt;' > →  ".$arrqusdtls['questions']."</td> <td width='140px' style='border-bottom:1px dotted #A7A9AB;font-size: 8pt;' ><div class='firsttcell' style='text-align:left;' ><input type='radio' name=".$arrqusdtls['questionsid']." value='".$arrqusdtls['quesansdefalutval']." '/>".$arrqusdtls['quesansdefalutval']."</div></td><td style='border-bottom:1px dotted #A7A9AB;'><div class='secondcell' style='text-align:left;'> <input type='radio' onchange='enableslection(this)' name=".$arrqusdtls['questionsid']." /><span  class='disable'>";
						 $selectid = '';$statement="";$position =0;$quesposflag=0;$counter=0;
						foreach($arrqusdtls['suggestedanswers'] as $suggansid => $ansdtls)
						{						
							$select="";
							if($ansdtls['position'] &&  $ansdtls['inputtype']=='option')
							{							
								if($selectid == '' || $selectid==null)	
								{
									$selectid = $arrqusdtls['questionsid']."n".$ansdtls['position'] ;
									$select = "<select style='margin-left:2px;margin-right:2px;width:auto;color:#0000FF; font-size:8pt;' id= '".$selectid."' >";
								}								
								if(!($selectid == $arrqusdtls['questionsid']."n".$ansdtls['position'] ) )	
								{									
									$select = "<select style='margin-left:2px;margin-right:2px;width:auto;color:#0000FF; font-size:8pt;' id= '".$arrqusdtls['questionsid']."n".$ansdtls['position']."' >";
								}
								$ansarr = explode(';', $ansdtls['answer']);
								for($x=0;$x<sizeof($ansarr);$x++ )
								{
									if($x==0)
										$seconcellstatement="<option> </option>" ;
									$seconcellstatement=$seconcellstatement."<option> ".$ansarr[$x]."</option>" ;
								}
								$select = $select . $seconcellstatement . "</select>";	//complete select statement tag
								if($ansdtls['anslabelpos'] != '' || $ansdtls['anslabelpos'] != NULL)
								{
									if( $ansdtls['anslabelpos']=='before')
										$select = "<label>".$ansdtls['anslabel']."</label> " .$select;
									elseif($ansdtls['anslabelpos']=='after')
										$select = $select . "<label>". $ansdtls['anslabel']."</label> " ;
								}
								$statement = $statement. $select;
														
							}
							elseif($ansdtls['inputtype']=='text')
							{
								$seconcellinputstatement ="<input class='textbox' style='width:".$ansdtls['width'] ."px; margin-left:2px;margin-right:2px;color:#0000FF; font-size:8pt;' type='text' width='50' /> ";
								if($ansdtls['anslabelpos'] != '' || $ansdtls['anslabelpos'] != NULL)
								{
									if( $ansdtls['anslabelpos']=='before')
										$seconcellinputstatement = "<label>".$ansdtls['anslabel']."</label> " .$seconcellinputstatement;
									elseif($ansdtls['anslabelpos']=='after')
										$seconcellinputstatement = $seconcellinputstatement . "<label>". $ansdtls['anslabel']."</label> " ;
								}
								$statement=$statement.$seconcellinputstatement;		
							}	
									
						}
						$k++;
						
						echo $rowstatement.$statement ."</span></div></td>";
						echo "</tr>";
					}
					echo "</table></div>";
					echo "</div>";//wrapper div
				}
			}
		?>
			
		</div>
	</div>

</div><!--examinationforms-->		