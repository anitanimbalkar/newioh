<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<div style="width:98%;margin:auto;">
  <div style='width:100%;'>
    <input type='hidden' class='doctor_id' value='<?php echo $search_doctor_object->doctorid; ?>' />
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
