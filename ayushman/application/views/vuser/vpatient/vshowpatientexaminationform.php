<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
		<script src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/jquery.textarea-expander.js"></script>
<script src="/ayushman/assets/js/xaccordianfunctions.js"></script>
<style type="text/css">
textarea {
    resize: none;
    overflow: auto;
	overflow-y:hidden;
	height:auto;
    padding: 0;
    outline: none;
	color: #0000FF;
    font-size: 8pt;
    font-weight: bold;
	font-family: Verdana,Arial,Helvetica,sans-serif;
}
</style>
<script type="text/javascript">

$(document).ready(function(){
			
	});

function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);
}
function getexaminationformvalues(appid)
{
	cleartxtitem();
	$.ajax({
		url: "/ayushman/cpatientexamination/getexaminationdtls?appid="+appid,
			  success: function( data ) {
			  alert(data);
			  },
				error : function(){alert("error while getting examination records");}					
			  });
}
function cleartxtitem()
{
	items= document.getElementById("examinationforms").getElementsByTagName("textarea");
	//dump(items);
	for(i=0;i<items.length;i++)
	{
		items[i].value="";
	}
	
}

</script>
<div id="examinationforms" style="height:auto;width:100%;">
<table width="100%" height="auto" style="boder:0px;"> 
<?php 
	//echo "<br>".date('m/d/Y h:i:s a', time());
		//echo "<br>".microtime();
	$i=0;
	//var_dump($arrforms);
		foreach($arrforms as $key=> $arrsection)
	  	{
			$text="";
	  ?>	
	  		<tr height="auto">
	  		<td height="auto">
	  		<div id="divcontainer<?= $i;?>" style="width:100%;height:auto; ">
				<div id="divheader<?= $i;?>" onclick="toggleSectionHeight(this)"  style="padding-right:8px;">
					
					<?php $divhd= "<h3  style='border:none;padding:2px 0px 2px 10px;background: -moz-linear-gradient(top, #9e9393, #FFFFFF);background: -webkit-gradient(linear, left top, left bottom, from(#9e9393), to(#FFFFFF)); display:block; background-color:#9e9393; width:99%; height:20px; margin:0px;margin:0px; font-size:8pt;font-family: Verdana,Arial,Helvetica,sans-serif;'><img id='indication". $i."' style='display:none;' src='/ayushman/assets/images/red_point.png' > ".$key."<img id='slideimg' style='float: right; padding-right: 1px;' src='/ayushman/assets/images/slidedown.gif'></h3>";
		echo $divhd; ?>	
				</div> 
				<div id="idcontent<?= $i;?>" style="width:100%;overflow:hidden ;" >
				<?php 
				$text= '<textarea style="float:left;width:99%;text-decoration:underline;border:none;"  class="expand">';
				foreach($arrsection as $section=> $arrquestion)
				{
					
					$text = $text.$section.'=> ';
					foreach($arrquestion as $key=> $val)
					{
						$text = $text.$key.'='.$val.'; ';
					}
					$text = $text. "\n";
				?>
				
					 
				<?php
				}
					$text = $text.'</textarea>' ;
					echo $text;
				?>
				</div><!--idcontent-->
				</div><!--divcontainer-->
			</td> 
			</tr> 
				<?php	
					$i++;
			
		}
		?>	
	</table>	
	<!-- <input type="button" value="save" onclick="getexaminationformvalues('11')"/>	-->
</div><!--examinationforms-->		