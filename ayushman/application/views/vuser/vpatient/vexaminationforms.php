<link type="text/css" href="/ayushman/assets/css/toggle.css" rel="stylesheet" media="screen" />
<link type="text/css" href="/ayushman/assets/css/tabs.css" rel="stylesheet" media="screen" />
	<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
	<script src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/xaccordianfunctions.js"></script>
	
<style type="text/css">
input.textbox {
	padding-left:2px;
	border:none;
	border-bottom: 1px solid #909090;
	word-spacing:0;
	font-size: 8pt;
	word-wrap:no;
	width:auto;
	height: 13px;
	overflow: hidden;
	vertical-align:top;
	font-style:normal;
	font-family: verdana;
	font-color:#0000FF;
	margin-right:0px;
	padding-right:0px;
	line-height: 12px;
	color: #0000FF;
    font-size: 8pt;
    font-weight: bold;
	font-family: Verdana,Arial,Helvetica,sans-serif;
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
ul{
 width:250px;
 overflow:auto;
}
</style>
<script type="text/javascript">

$(document).ready(function(){			
			
			$(".toggle_container").hide();
	
			$("h3.trigger").click(function(){
				$(this).toggleClass("active").next().slideToggle("fast");
			});
			var nAgt = navigator.userAgent;
			var ieversion="";
			for(i=0;i< <?= sizeof($arrforms)?>; i++ )
			{
				var nodes = document.getElementById("divleft"+i).getElementsByTagName('H3') ;
				
				if ((verOffset=nAgt.indexOf("MSIE"))!=-1) 
				{
					 browserName = "Microsoft Internet Explorer";
					 fullVersion = nAgt.substring(verOffset+5);
					 fullVersion = fullVersion.split(';');
					 ieversion = fullVersion[0];
					if(ieversion <='9.0')
					{					
						for(var j=0;j<nodes.length;j++)
						{
							
							if(nodes[j].nodeName == "H3")
							{
							//alert( nodes[j].clientWidth +"  "+  nodes[j].childNodes[0].offsetWidth);
							//break;
								val = nodes[j].clientWidth -  nodes[j].childNodes[0].offsetWidth;
								 nodes[j].childNodes[1].childNodes[0].style.width = (val-35) +"px";
							}
						}
					
						
						document.getElementById("idform"+i).style.width=document.getElementById("idform"+i).parentNode.clientWidth;
						document.getElementById("idform"+i).style.display="none";
						document.getElementById("idform"+i).style.width=document.getElementById("idform"+i).parentNode.clientWidth;
						//document.getElementById("idform"+i).clientWidth=document.getElementById("idform"+i).parentNode.clientWidth;
					}
				}
				else
				{
					for(var j=0;j<nodes.length;j++)
					{
						if(nodes[j].nodeName == "H3")
						{
							val = nodes[j].offsetWidth -  nodes[j].childNodes[0].offsetWidth;
							 nodes[j].childNodes[1].childNodes[0].style.width = (val-35) +"px";
						}
					}
					
					document.getElementById("idform"+i).style.width=document.getElementById("idform"+i).parentNode.offsetWidth;
					document.getElementById("idform"+i).offsetWidth=document.getElementById("idform"+i).parentNode.offsetWidth;
					 //alert( document.getElementById("idform"+i).offsetWidth + " and "+document.getElementById("idform"+i).parentNode.offsetWidth);
					document.getElementById("idform"+i).style.display="none";
					document.getElementById("idform"+i).style.width=document.getElementById("idform"+i).parentNode.offsetWidth;
					document.getElementById("idform"+i).offsetWidth=document.getElementById("idform"+i).parentNode.offsetWidth;
			 	}
				 
			}
		for(x=0 ;x< <?php echo sizeof($arrforms); ?>;x++ )
		{
			
			$('#idform'+x).change(function() {
				var nAgt = navigator.userAgent;
				var ieversion= getieversion();	
				if ((verOffset=nAgt.indexOf("MSIE"))!=-1 && (ieversion <='8.0')) 
				{
					image= this.previousSibling.children[0].children[0];
				}
				else
				{
					image= this.previousSibling.previousSibling.children[0].children[0];
				}				
				$(image).show();
				
			});
			
		}		
	});

function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);
}
function saveexaminationformdtls(appid)
{
	var array = new Array();
	e = document.getElementById("examinationforms").getElementsByTagName("input");
	for(var i=0;i<e.length;i++)
	{
		if(e[i].type == "text"){
			
			if(e[i].value && e[i].name)
			{
			//alert(e[i].value);
				array[i] = new Array(2);
				array[i][0] = e[i].name;
				array[i][1] = e[i].value;
			}			
		}else if(e[i].type == "checkbox"){
		
			if(e[i].checked)
			{
			//alert(e[i].checked);
				array[i] = new Array(2);
				array[i][0] = e[i].name;
				array[i][1] = "yes";
			}			
		}
	}
	$.ajax({
			  url: "/ayushman/cexaminationform/saveexaminationform?appid="+appid,
			  data: {"val": JSON.stringify(array)},
			  success: function( data ) {
			  		//alert("success :/ayushman/cpatientexamination/save");
				},
				error : function(){alert("error while inserting examinations");}					
			  });	
		
}

</script>
<div id="examinationforms" style="height:auto;width:100%; overflow:auto;">
<div id="wizard" style=" height:auto;width:100%; border:none;background: none repeat scroll 0 0 transparent;" >
	<?php 
	//echo "<br>".date('m/d/Y h:i:s a', time());
		//echo "<br>".microtime();
	$i=0;
	  foreach($arrforms as $key=> $arrquestion)
	  {
	  ?>
		<div id="divheader<?= $i;?>" onclick="toggleSectionHeight(this)" style="height:auto; " oncha>
		<?php $divhd= "<h3  style='border:none;padding:2px 0px 2px 10px;background: -moz-linear-gradient(top, #9e9393, #FFFFFF);background: -webkit-gradient(linear, left top, left bottom, from(#9e9393), to(#FFFFFF)); display:block; background-color:#9e9393; width:100%; height:20px; margin:0px;margin:0px; font-size:8pt;font-family: Verdana,Arial,Helvetica,sans-serif;'><img id='indication". $i."' style='display:none;' src='/ayushman/assets/images/red_point.png' > ".$key."<img id='slideimg' style='float: right; padding-right: 11px;' src='/ayushman/assets/images/slidedown.gif'></h3>";
		echo $divhd; ?>	
		</div> 
		<div id="idform<?= $i;?>" style="width:100%;" >
		<input type="hidden" id="txtval" value="" />
			<table width="99%">
			   <ui>
				 <tr><td>
			<div id="divleft<?= $i;?>" style="float:left;width:100%;">
				<?php  
					$arraysize = sizeof($arrquestion);
					$count = 0;
					$j=-1;
					foreach($arrquestion as $key=> $val)
					{ 
						$j++;
						
						 ?>
						 <div id="id<?= $j;?>"  style="width:100%;">
						<?php $div= '<h3 class="trigger"><span style="line-height:21px;margin-left:0px; font-weight:normal;">'.$key.'</span><span><input type="text" onfocus="getval(this)"  onchange="settval(this)" class="textbox" style="width:99%;" /></span></h3>' ;
						echo $div;
						?>	
					   	
							<div class="toggle_container">				  
								<table width="100%" border="0" cellpadding="0" cellspacing="0" >
								<?php $str="";$k=0; $color;
										
									foreach($val as $key=> $value)
									{	if($k % 2){$color="#e9e9e9";}
										else{$color="#dddddd";}
									
										if($value['fieldtype'] =='text')	
										{
											$str = "<li class='required'><tr style=background:".$color."><td><label>".$value['questions']."</label></td><td style='padding-right:10px;padding-top:3px;padding-bottom:3px;'><input type='text' onchange='addtxtitem(this)' class='text' name=".$value['id'];		
											echo $str ." /> </td></tr></li>";
										}
										else if($value['fieldtype'] =='checkbox')	
										{
											$str = "<li class='required'><tr style=background:".$color." ><td><label>".$value['questions']."</label></td><td style='padding-right:10px;padding-top:3px;padding-bottom:3px;' ><input type='checkbox' class='select'  value='true' onclick='addchkitem(this);' name=".$value['id'];		
											echo $str ." /> </td></tr></li>";
										}	
										else if($value['fieldtype'] =='select')	
										{
											$str = "<li class='required'><tr style=background:".$color." ><td><label>".$value['questions']."</label></td><td style='padding-right:10px;padding-top:3px;padding-bottom:3px;' ><select  onchange='addchkitem(this);' name=".$value['id'];		
											echo $str ." ></select> </td></tr></li>";
										}	
										$k++;				
									}
								  ?>
								</table>
							</div><!--toggle_container-->
						</div><!--ids-->
				<?php	
					$count = $count +1;
					
					}?>
			</div>
			
			 </td> </tr>
		        </ui>   
			</table>
			
		</div>
	<?php	$i++;}	
	//echo microtime();
	?>	
	</div><!--wizard-->
</div><!--examinationforms-->		