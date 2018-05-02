<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">

<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/setschedule.js"></script>
<style type="text/css">
  fieldset{
    padding:0px;
  }
  .footer{
		clear:both;
		height:43px;
		line-height:26px;
		background-color:#ecf8fb;
		border-top:1px solid #a8c8d9;
		margin-top:5px;
	}
	.footerButton{
		
		margin-right:10px;
	}
</style>

<div class="table_roundBorder clinic" style="margin-top: 10px;">
  <legend class="formHeader" ><?php echo $clinic_name; ?></legend>
  <input type='hidden' class='schedule_id' value = '<?php echo $current_clinic_schedule_object->refscheduleid_c ?>' />
  <input type='hidden' class='clinic_id' value= '<?php echo $clinic_id ?>' />
  <?php 
    $schedule_helper = new helper_schedulehelper();
    $consultation_timing_ids = $schedule_helper->get_consultation_timing_ids($current_clinic_schedule_object->refscheduleid_c);
    if($consultation_timing_ids !== null){
      $count = 1;
      foreach($consultation_timing_ids as $consultation_timing_id){
        $consultation_timing_view = Request::factory('cconsultationtiming/view');
        $consultation_timing_view->post("consultation_timing_id", $consultation_timing_id);
        $consultation_timing_view->post("clinic_id", $clinic_id);
        echo $consultation_timing_view->execute(); 
        if($count < count($consultation_timing_ids)){
          echo '<div style="color:#A8C8D9;width:96%;margin:auto;"><HR style="height:0.3px;color:#A8C8D9;"></div>';
          $count++;
        }
      }
    }
    else{
      echo '<p class="bodytext_boldblue" style="margin:5px;">Please click on Add Consultation Timing to begin.</p>';
    }
  ?>
  <div class="footer" style="text-align:right;">
    <input type="button" class="footerButton" style="font-family: Arial, sans-serif;border-radius: 5px;background: #00aca9;color: #fff;	text-align: center;	font-size:12px;	padding: 0px 5px;	text-decoration: none;" onclick='add_consultation_timing(this)' value='Add Consultation Timing'/>
  </div>
</div>
