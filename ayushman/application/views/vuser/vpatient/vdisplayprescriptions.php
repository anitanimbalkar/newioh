<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function setwidth(iframe){
	$(iframe).contents().height($(iframe).contents().height()-50);
	$(iframe).height($(iframe).contents().height() - ($(iframe).contents().height()*20/100));
	$(iframe).width($(iframe).contents().width()-100);
}
</script>
<div style="width:100%;overflow-y:auto;">
	<?php 
		for($i=0;$i<count($arrPrescriptions);$i++){
			echo $arrPrescriptions[$i];
		}
	?>
</div>