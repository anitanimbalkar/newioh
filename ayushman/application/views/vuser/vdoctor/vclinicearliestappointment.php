<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/takeappointment.js"></script>
<div style="width:99%; line-height:40px; float:left; padding:7px;" class="bodytext_bold">
  <form class = 'show_more' method="post" enctype="multipart/form-data"  action="/ayushman/callslotsforclinic/view"> 
  <input type='hidden' class='doctor_id' name='doctor_id' value=''/>
  <input type='hidden' class='clinic_id' name='clinic_id' value='<?php echo $clinic_details['address_id']; ?>'/>
  <input type='hidden' class='earliest' name='start_time' value='<?php echo isset($earliest_appointment['start_time'])?$earliest_appointment['start_time']:''; ?>'/>
  <input type='hidden' name='display_time' value='<?php echo isset($earliest_appointment["display_time"])?$earliest_appointment["display_time"]:''; ?>' />
  <input type='hidden' name='end_time' value="<?php echo isset($earliest_appointment['end_time'])?$earliest_appointment['end_time']:''; ?>" />
  <input type='hidden' name='charge_type' value="<?php echo isset($earliest_appointment['charge_type'])?$earliest_appointment['charge_type']:''; ?>" />
  <input type='hidden' name='clinic_name' value='<?php echo $clinic_details['name']; ?>'/>
  <input type='hidden' class='appointment_type' name='appointment_type' value="<?php echo isset($earliest_appointment['appointment_type'])?$earliest_appointment['appointment_type']:''; ?>" />
  <table>
	<tr>
      <td class="bodytext_normal" colspan="3" width='38%' style='font-size:1.1em;'>
		<?php echo strtoupper($clinic_details['name']); 
		echo '</br><span class="bodytext_normal">('.$clinic_details['address']['line1_c'].', '.$clinic_details['address']['nearlandmark_c'].', '.$clinic_details['address']['location_c'].', '.$clinic_details['address']['city_c'].', '.$clinic_details['address']['state_c'].').</br>Phone :'.$clinic_details['address']['isdphone_c'].'-'.$clinic_details['address']['phone_c'].'</span>'; ?>
		 <?php
			if(isset($earliest_appointment["display_time"])){
			  $clinic_earliest_view = Request::factory('callslotsforclinic/view');
			  $clinic_earliest_view->post("clinic_id",$clinic_details['address_id']);
			  $clinic_earliest_view->post("display_time",$earliest_appointment["display_time"]);
			  $clinic_earliest_view->post("clinic_name",$clinic_details['name']);
			  echo $clinic_earliest_view->execute(); 
			 }else{
				echo 'Schedule is not set for this clinic';
			 }
		?>
	  </td> 
    </tr>
  </table>
  </form>
</div>
