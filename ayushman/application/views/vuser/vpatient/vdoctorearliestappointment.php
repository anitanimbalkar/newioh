<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<div class="table_roundBorder" style="width:98%;margin:auto;">
  <div style='width:100%;'>
    <div style='width:5%;float:left;border-right:1px solid #b5d5e3;'>
      <img src="<?php if($search_doctor_object->photo){echo $search_doctor_object->photo;} else {echo '/ayushman/assets/images/pic02.png';}?>" style='heigth:40px;width:40px;' />
    </div>
    <div style="width:94%; float:left; padding-left:7px; line-height:42px; background-color:#ecf8fb; border-bottom:1px solid #b5d5e3;" class="bodytext_bold">
      Name :   <span class="bodytext_normal"><?php echo $search_doctor_object->doctorname; ?> </span>( <span class="bodytext_normal"><?php echo $search_doctor_object->education_c; ?> </span>) 
      Specialization    :   <span class="bodytext_normal"><?php echo $search_doctor_object->specialization_c; ?> </span>
      <button class="button" style="float:right;margin-top:5px;margin-right:5px;display:none;">View Calendar</button>
      <input type='hidden' class='doctor_id' value='<?php echo $search_doctor_object->doctorid; ?>' />
    </div>
    <?php
      if($clinics_details !== null){
        foreach($clinics_details as $clinic_details){
          $clinic_earliest_view = Request::factory('cclinicearliestappointment/view');
          $clinic_earliest_view->post("object_doctor",$object_doctor);
          $clinic_earliest_view->post("clinic_details", $clinic_details);
          echo $clinic_earliest_view->execute(); 
        }
      }
      else{
        echo '<p class="bodytext_bold">The doctor has not set up any clinics yet.</p>';
      }
    ?>
  </div>
  <div style='clear:both'></div>
</div>
