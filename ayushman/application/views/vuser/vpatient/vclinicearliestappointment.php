<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/takeappointment.js"></script>
<div style="width:99%; line-height:40px; float:left; padding:7px;" class="bodytext_bold">
  <form class = 'show_more' method="post" enctype="multipart/form-data"  action="/ayushman/callslotsforclinic/view"> 
  <input type='hidden' class='doctor_id' name='doctor_id' value=''/>
  <input type='hidden' class='clinic_id' name='clinic_id' value='<?php echo $clinic_details['address_id']; ?>'/>
  <input type='hidden' class='earliest' name='start_time' value='<?php if(isset($earliest_appointment['start_time'])){ echo $earliest_appointment['start_time'];}  ?>'/>
  <input type='hidden' name='display_time' value='<?php if(isset($earliest_appointment["display_time"])){ echo $earliest_appointment["display_time"];}  ?>' />
  <input type='hidden' name='end_time' value="<?php if(isset($earliest_appointment['end_time'])){ echo $earliest_appointment['end_time'];}  ?>" />
  <input type='hidden' name='charge_type' value="<?php if(isset($earliest_appointment['charge_type'])){ echo $earliest_appointment['charge_type'];}  ?>" />
  <input type='hidden' name='clinic_name' value='<?php echo $clinic_details['name']; ?>'/>
  <input type='hidden' class='appointment_type' name='appointment_type' value="<?php if(isset($earliest_appointment['appointment_type'])){ echo $earliest_appointment['appointment_type'];} ?>" />
  <table>
    <tr>
      <td class="bodytext_bold"  style='font-size: 15px;;width: 42%'><?php echo ucfirst($clinic_details['name']); ?> <div  class='bodytext_normal' name='clinic_id' style="font-size: 15px;" ><?php echo ucfirst($clinic_details['address']['line1_c']." ".$clinic_details['address']['nearlandmark_c']." ".$clinic_details['address']['location_c']." ".$clinic_details['address']['city_c']." ".$clinic_details['address']['state_c'].". <br/>Phone: ".$clinic_details['address']['phone_c']); ?></div></td> 
      <td class="bodytext_normal" style='font-size:1.1em;'>
	  <div  class='bodytext_normal' style="font-size: 15px;" >Earliest appointment on
      <?php if(isset($earliest_appointment['appointment_type'])){if ($earliest_appointment['appointment_type'] == 'S') { ?> 
        <input type='button' class="button" style='cursor:pointer; height:20px;' title="Confirm appointment" onclick='book_earliest_appointment(this);' value="<?php	if($earliest_appointment['display_time']) {echo date('d M Y H:i',strtotime($earliest_appointment['display_time']));} else{echo ("Not Provided");} ?>" /></div>
		<?php } else { ?>
        <input type='button' class="orangebutton" style='cursor:pointer; height:20px;' title="Waiting appointment" onclick='book_earliest_appointment(this);' value="<?php echo date('d M Y H:i',strtotime($earliest_appointment['display_time']));?>" /></div></td>
      <?php } } else {?>
		<input type='button' class="button" style='cursor:pointer; height:20px;' value="<?php echo "Timings Not Provided"; ?>" /></td>
		<?php }?></td>
      
		
      <td class='bodytext_normal'  style='font-size:1em; width: 25%'>
	  <?php if(isset($earliest_appointment['appointment_type'])) { ?>
	  <a style="cursor:pointer;color: blue;font-size: 15px !important;" onclick='show_more_slots(this);'>Show More Timings</a>
	  <?php } else {?>
	  <a style="cursor:pointer" >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</a>
	  <?php }?>
	  </td>
    </tr>
  </table>
  </form>
</div>
