<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">

<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/setschedule.js"></script>
<style type="text/css">
  .timingView{
    width:20%;
    float:left;
    margin-left:5px;
  }
  .time_text{
    font-size:1em;
  }
  .numOfPatients{
    width:20%;
    float:left;
  }
  .consultation_block{
    width:94%;
    margin:auto;
  }
  .action{
    cursor: pointer;
  }
  .textsize{
		font-size:12px;
  }
</style>
  <div class="consultation_block" style='padding:15px;'>
    <input type='hidden' class='consultation_timing_id' value='<?php echo $consultation_timing_object->id; ?>' />
    <div width="100%">
		<div class="row">
		  <div class="col-sm-3 bodytext_boldblue timing" style="padding-left:7px;"><?php echo substr($consultation_timing_object->starttime_c,0,5); ?> - <?php echo substr($consultation_timing_object->endtime_c,0,5); ?></div>
		  <p class="col-sm-3 bodytext_boldblue textsize">Slot Duration:<span class="bodytext_normalblue  textsize"><?php echo $consultation_timing_object->longvisitduration_c ?> mins</span></p>
		  <p class="col-sm-4 bodytext_boldblue textsize">Applied To:<span class="bodytext_normalblue  textsize"><?php echo $consultation_timing_object->applicableon_c ?></span></p>
		</div>
		<div class="row">
		 <div class="col-sm-3" style="padding-left:7px;"></div>
		 <p class="col-sm-3 bodytext_boldblue textsize" >Stand by per hour:<span class="bodytext_normalblue  textsize"> <?php echo $consultation_timing_object->waitperhour_c ?></span></p>
		 <p class="col-sm-3 bodytext_boldblue textsize" >Mode: <span class="bodytext_normalblue  textsize">
				<?php
				  if($clinic_id == -1){
					echo 'Online';
				  }
				  else{
					echo 'Inclinic ';
					if($consultation_timing_object->allowonline_c){
					  echo 'Online ';
					}
					if($consultation_timing_object->allowhome_c){
					  echo 'Home Visit';
					}
				  }
				?>
         </span></p>		 
		 <p class="col-sm-3 bodytext_bold textsize"><a  style="color:blue;" class='action' onclick='delete_consultation_timing(this);'>Delete</a></p>
         <p style='display:none'><a class='action' onclick='edit_consultation_timing(this);'>Edit</a></p>
		</div>
	</div>
</div>


