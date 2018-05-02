<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function setwidth(iframe){
	$(iframe).contents().height($(iframe).contents().height()-50);
	$(iframe).height('500px');
	$(iframe).width($(iframe).contents().width()-100);
}
</script>
<div style="width:100%;overflow-y:auto;">
	<?php 
		for($i=0;$i<count($arrTestReports);$i++){
			echo $arrTestReports[$i];
		}
	?>
</div>