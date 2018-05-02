<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type='text/javascript' src='/ayushman/assets/js/jquery-ui.multidatespicker.js'></script>
<style type="text/css">
	td{
		padding-left:10px;
}
.bottom-border{
	border-bottom:1px solid #b5d5e3;
}
</style>
<div class="Heading_Bg" style="width:99%;line-height:25px;">Fix An Appointment</div>

<div class="table_roundBorder" style="width:98%;margin:auto;margin-top:7px;">
  <div style='width:10%;float:left;'>
    <img src="<?php echo $doctorinfo['PatientPhoto']; ?>" style='max-width:100%' />
  </div>
  <div style='width:90%;float:left;'>
    <div style="width:99%; padding-left:7px; line-height:40px; background-color:#ecf8fb; border-bottom:1px solid #b5d5e3;" class="bodytext_bold">
      <label class="bodytext_bold"> Name : </label>
      <label class="bodytext_normal"><?php echo $search_doctor_object->doctorname; ?> </label>
      <label class="bodytext_normal">(<?php echo $search_doctor_object->education_c; ?>)</label>
      <label class="bodytext_bold">Specialization  : </label>
      <label class="bodytext_normal"><?php echo $search_doctor_object->specialization_c; ?></label>
    </div>
    <div style="width:99%; padding-left:7px; line-height:40px;" class="bodytext_bold">
      <label class="bodytext_bold"> Clinic Name : </label> 	
      <label class="bodytext_normal"><?php echo $clinic_name; ?> </label>
      <label class="bodytext_bold">Clinic Address  : </label>
      <label class="bodytext_normal"><?php echo $clinic_address_object->line1_c . ', ' . $clinic_address_object->nearlandmark_c . ', ' . $clinic_address_object->location_c . ', '. $clinic_address_object->city_c . '.'; ?></label>
    </div>
  </div>
  <div style='clear:both'></div>
</div>
<hr style="width:100%; height:0.5px;"/>

<div class="table_roundBorder" style="margin:10px; width:97%;">
  <div style="width:98%; padding:7px; background-color:#ecf8fb; border-bottom:1px solid #b5d5e3;display:none">
    <label class="bodytext_bold"> Visit Type &nbsp; :</label>
    <select style="width:15%; margin-left:5px;" class="textarea"><option>First Time</option></select>
    <label class="bodytext_bold" style="margin-left:25px;">Charge-Type  : </label>
    <select style="width:15%; margin-left:5px;" class="textarea"><option>Any</option></select>
  </div>
  <div style="width:98%; padding:7px; background-color:#ecf8fb; border-bottom:1px solid #b5d5e3;">
    <label class="bodytext_bold"> Choose Date &nbsp; :</label>
    <input name="selected_date" readonly="readonly"  value="<?php echo $current_date ?>" type="text" class="textarea" onchange='get_slots(this)' />
  </div>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td id='left_pane' width="4%" rowspan="2" align="center" bgcolor="#ecf8fb" style="padding-left:0px;cursor:pointer" title='Not Allowed'>
          <a href="#"><img id='left_arrow' src="/ayushman/assets/images/inactive_left_arrow.png" border="0" width="25" height="25"></a>
      </td>
      <?php foreach($all_appointments_in_week as $key=>$value) { ?>
        <td width="13%" height="40" class="bottom-border" bgcolor=<?php if($key % 2 == 0) {echo "#ECF8FB";} else {echo "#FFFFFF";} ?>>
            <label id = '<?php echo $key."_day"; ?>' class="bodytext_bold"><?php echo $all_appointments_in_week[$key]['day_name']; ?></label><br />
            <label id = '<?php echo $key."_date"; ?>' class="bodytext_normal"><?php echo $all_appointments_in_week[$key]['date']; ?></label>
        </td>
      <?php } ?>
      <td id='right_pane' width="4%" rowspan="2" align="center" bgcolor="#ecf8fb" style="padding-left:0px;cursor:pointer" title='Get appointments for next week' onclick='get_later_appointments()'>
          <a href="#"><img id='right_arrow' src="/ayushman/assets/images/active_right_arrow.png" width="25" border="0" height="25" onclick='get_later_appointments()'></a>
      </td>
    </tr>
    <tr>
    <?php foreach($all_appointments_in_week as $key=>$value) { ?>
      <td id='<?php echo $key."_slots"; ?>' height="150" valign="top" style="padding-top:10px;" bgcolor=<?php if($key % 2 == 0) {echo "#ECF8FB";} else {echo "#FFFFFF";} ?> >
        <?php $appointments = $all_appointments_in_week[$key]['appointments']; if($appointments != null){ foreach($appointments as $appointment){ ?>
          <div style='margin:2px;'>
            <?php if($appointment['appointment_type'] == 'S') { ?>
              <button class='button' onclick='check_if_waiting_appointment(this);'><?php echo date('H:i', strtotime($appointment['display_time'])) ?></button>
            <?php } else { ?>
              <button class='orangebutton' onclick='check_if_waiting_appointment(this);'><?php echo date('H:i', strtotime($appointment['start_time'])) ?></button>
            <?php } ?>
            <form class='appointment_book_form' method="post" enctype="multipart/form-data"  action="/ayushman/cappointment/book"> 
              <input type='hidden' name='start_time' value="<?php echo $appointment['start_time'] ?>" />
              <input type='hidden' name='end_time' value="<?php echo $appointment['end_time'] ?>" />
              <input type='hidden' name='charge_type' value="<?php echo $appointment['charge_type'] ?>" />
              <input type='hidden' name='clinic_name' value="<?php echo $clinic_name ?>" />
              <input type='hidden' name='doctor_id' value='<?php echo $search_doctor_object->doctorid ?>' />
              <input type='hidden' name='clinic_id' value='<?php echo $clinic_id ?>' />
              <input type='hidden' name='appointment_type' class='appointment_type' value="<?php echo $appointment['appointment_type']; ?>" />
              <input type='hidden' name='display_time' value="<?php echo $appointment['display_time']; ?>" />
            </form>
          </div>
        <?php }}else{ ?>
          <label class='bodytext_bold'>No Slots</label>
        <?php } ?>
      </td>
    <?php } ?>
    </tr>
  </table>

  <div id='waiting_app'>
    <p class='bodytext_bold'>You have selected a waiting appointment.<br/>You may have to wait a little longer before the doctor can consult you.<br/>Do you want to proceed?<br/></p>
  </div>
</div>

<script type='text/javascript'>
  function get_slots(date_picker_object){
    var date_text = $(date_picker_object).val();
    get_all_slots(date_text, null);
  }
  $(function(){
			$( "input[name=selected_date]" ).datepicker({
        yearRange: "-0:+1",
        changeMonth: true,
        changeYear: true,  
        dateFormat: 'dd M yy',
        minDate: create_date_object('<?php echo date('d-M-Y', strtotime($earliest_date)) ?>'),
        maxDate: create_date_object('<?php echo date('d-M-Y', strtotime('+1 year', strtotime($current_date))) ?>'),
      });
  });
  var waiting_form_object;
  function get_earlier_appointments(){
    date_text = $('#1_date').text();
    get_all_slots(date_text, 'earlier');
  }
  function get_later_appointments(){
    date_text = $('#7_date').text();
    get_all_slots(date_text, 'later');
  }
  function get_all_slots(date_text, direction){
    $.ajax({
      url: "/ayushman/callslotsforclinic/get_all_slots/get?date="+encodeURIComponent(date_text)+"&clinic_id="+encodeURIComponent('<?php echo $clinic_id ?>')+"&doctor_id="+encodeURIComponent('<?php echo $search_doctor_object->doctorid ?>')+"&direction="+encodeURIComponent(direction),
			success:function( json_slots ){
        var slots = eval("("+json_slots+")");
        var day_count = 1;
        for(var i in slots){
          $('#'+day_count+'_date').text(slots[i]['date']);
          $('#'+day_count+'_slots').empty();
          var slots_container=$("<div></div>");
          var appointments = slots[i]['appointments'];
          if(appointments == null || appointments.length == 0){
            var no_slots = $("<label class='bodytext_bold'>No Slots</label>");
            $(no_slots).appendTo($(slots_container));
          }
          else{
            for(var k in appointments){
              var display_time = appointments[k]['display_time'].split(' ')[1];
              var app_display_time = appointments[k]['display_time'].replace(' ',',');
              var app_start_time = appointments[k]['start_time'].replace(' ',',');
              var app_end_time = appointments[k]['end_time'].replace(' ',',');
              var class_name = 'button';
              if(appointments[k]['appointment_type'] == 'W'){
                class_name = 'orangebutton';
              }
              var one_slot = $("<div style='margin:2px;'> <button class='"+class_name+"' onclick='check_if_waiting_appointment(this);'>"+display_time.substring(0,5)+"</button><form class='appointment_book_form' method='post' enctype='multipart/form-data'  action='/ayushman/cappointment/book'><input type='hidden' name='start_time' value="+app_start_time+" /><input type='hidden' name='display_time' value="+app_display_time+" /><input type='hidden' name='end_time' value="+app_end_time+" /><input type='hidden' name='charge_type' value="+appointments[k]['charge_type']+" /><input type='hidden' name='clinic_name' value='<?php echo $clinic_name ?>' /><input type='hidden' name='appointment_type' class='appointment_type' value="+appointments[k]['appointment_type']+" /><input type='hidden' name='doctor_id' value='<?php echo $search_doctor_object->doctorid ?>' /><input type='hidden' name='clinic_id' value='<?php echo $clinic_id ?>' /></div></form>");
            $(one_slot).appendTo($(slots_container));
            }
          }
          $('#'+day_count+'_slots').html($(slots_container).html());
          day_count++;
        }
        var new_lower_date = create_date_object($('#1_date').text());
        var new_upper_date = create_date_object($('#7_date').text());
        var earliest_date = create_date_object('<?php echo date('d-M-Y', strtotime($earliest_date)) ?>');
        var max_date = create_date_object('<?php echo date('d-M-Y', strtotime('+1 year', strtotime($current_date))) ?>');
        if(new_lower_date <= earliest_date){
          $('#left_arrow').attr('src', '/ayushman/assets/images/inactive_left_arrow.png');
          $('#left_arrow').removeAttr('onclick');
          $('#left_pane').attr('title', 'Not Allowed');
          $('#left_pane').removeAttr('onclick');
        }
        else{
          $('#left_arrow').attr('src', '/ayushman/assets/images/active_left_arrow.png');
          $('#left_arrow').attr('onclick', 'get_earlier_appointments()');
          $('#left_pane').attr('title', 'Get appointments for previous week');
          $('#left_pane').attr('onclick', 'get_earlier_appointments()');
        }
        if(new_upper_date >= max_date){
          $('#right_arrow').attr('src', '/ayushman/assets/images/inactive_right_arrow.png');
          $('#right_arrow').removeAttr('onclick');
          $('#right_pane').attr('title', 'Not Allowed');
          $('#right_pane').removeAttr('onclick');
        }
        else{
          $('#right_arrow').attr('src', '/ayushman/assets/images/active_right_arrow.png');
          $('#right_arrow').attr('onclick', 'get_later_appointments()');
          $('#right_pane').attr('title', 'Get appointments for next week');
          $('#right_pane').attr('onclick', 'get_later_appointments()');
        }
        parent.setIframeHeight(document.getElementById('icontent'));
			},
			error:function(){
				showMessage('250','50','Error' ,'Error occured . Please contact your system administrator.','error','id');
			},
    });
  }
  function create_date_object(date_string){
    date_string = date_string.split('-');
    date_string = date_string[0] + ' ' + date_string[1] + ' ' + date_string[2];
    date_object = new Date(date_string);
    return date_object;
  }
  function check_if_waiting_appointment(button_object){
    var form_object = $(button_object).next();
    var appointment_type = $(form_object).find('.appointment_type').val();
    if(appointment_type == 'W'){
      waiting_form_object = form_object;
      $('#waiting_app').dialog('open');
    }
    else{
      book_appointment(form_object);
    }
  }
  function book_appointment(form_object){
      $(form_object).attr('action','/ayushman/cappointment/finalize');
      $(form_object).submit();
  }

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
          book_appointment(waiting_form_object);
        },
        "No": function () {
          $(this).dialog('close');
        }
      }
    });
    jQuery("#waiting_app").dialog('option', 'position', [150,150]);
	// Code to scroll to top 
	var url = window.location.href;
    console.log(url);
    if( url.indexOf('#') < 0 ) {
        window.location.replace(url + "#");
    } else {
        window.location.replace(url);
    }
	//-------------------------------------
  });
</script>
