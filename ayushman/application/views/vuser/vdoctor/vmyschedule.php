<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <div style="float:left;width:99.6%;padding-bottom:5px;min-height:50px;">
      <div style="width:99.6%;">
        <div style="width:100%;margin:auto">
          <?php 
            if($object_doctors){
              foreach($object_doctors as $object_doctor){
                $doctor_earliest_view = Request::factory('cdoctorearliestappointment/view');
                $doctor_earliest_view->post("object_doctor",$object_doctor);
                echo $doctor_earliest_view->execute(); 
                echo '<br/>';
              }
            }
            else{
              echo 'Please add a doctor to your network.';
            }
          ?>
        </div>
      </div>
  </div>
  <div id='waiting_app'>
    <p class='bodytext_bold'>You have selected a waiting appointment.<br/>You may have to wait a little longer before the doctor can consult you. You can click on Show More Timings to view available scheduled appointments.<br/>Do you want to proceed?<br/></p>
  </div>
</body>

<script type='text/javascript'>
  var wait_form_object;

  $(document).ready(function(){
   $('#waiting_app').dialog({
      autoOpen: false,
      draggable: false,
      modal: true,
      title: 'Waiting Appointment',
      width:'500',
      height:'200',
      buttons: {
        "Yes": function () {
          $(this).dialog('close');
          book_appointment(wait_form_object);
        },
        "No": function () {
          $(this).dialog('close');
        }
      }
    });
    jQuery("#waiting_app").dialog('option', 'position', [150,150]);
  });
</script>

