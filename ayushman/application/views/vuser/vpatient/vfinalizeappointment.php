<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<style type="text/css">
  .footer{
      clear:both;
      height:40px;
      line-height:40px;
      background-color:#ecf8fb;
      border-top:1px solid #a8c8d9;
      margin-top:25px;
      padding-right:10px;
  }
  .footerButton{
      margin-top:7px;
      margin-right:4px;
  }
  .AppDetails{
    width:100%; 
    float:left; 
    padding:13px;
  }
  .describe_textarea{
    width:96%; 
    margin-top:10px; 
    resize:none;
  }
  .doctor_info{
    width:100%; 
    float:left; 
    padding:7px; 
    background-color:#ecf8fb; 
    border-bottom:1px solid #b5d5e3;
  }
  .doctorClinic_info{
    width:100%; 
    float:left; 
    padding:7px;
  }
  .doctor_pic{
    width:11.5%; 
    padding:5px; 
    float:left; 
    border-right:1px solid #a8c8d9;
  }
</style>

<html>
  <div class="table_roundBorder" style="float:left;width:98%;margin:auto;padding-bottom:5px;">
    <div class="Heading_Bg" style="width:99%; line-height:25px;">Confirm Appointment Details</div>
    <div class="table_roundBorder" style="margin:10px; width:97%;">
    <div class="doctor_pic">
      <img src="<?php if($search_doctor_object->photo){echo $search_doctor_object->photo;} else {echo '/ayushman/assets/images/pic02.png';}?>" width="85" height="100">
    </div>
    <div style="width:85%; float:left;">
      <div class="doctor_info">
        <label class="bodytext_bold"> Name : </label>
        <label class="bodytext_normal"><?php echo $search_doctor_object->doctorname; ?> </label>
        <label class="bodytext_normal">(<?php echo $search_doctor_object->education_c; ?>)</label>
        <label class="bodytext_bold">Specialization  : </label>
        <label class="bodytext_normal"><?php echo $search_doctor_object->specialization_c; ?></label>
      </div>
      <div class="doctorClinic_info">
        <label class="bodytext_bold" style='font-size:1em'> Clinic Name : </label> 	
        <label class="bodytext_normal" style='font-size:1em'> <?php echo $clinic_name; ?> </label>
        <br />
        <label class="bodytext_bold" style='font-size:1em'>Clinic Address  : </label>
        <label class="bodytext_normal" style='font-size:1em'>
          <?php echo $clinic_address_object->line1_c . ', ' . $clinic_address_object->nearlandmark_c . ', ' . $clinic_address_object->location_c . ', '. $clinic_address_object->city_c . '.'; ?>
        </label>
      </div>
    </div>
    <div style = 'clear:both'></div>
  </div>
  <div style="width:98%;">
    <div style="width:100%;margin:7px;">
      <FIELDSET class="table_roundBorder" style="padding:0px">
        <LEGEND class="bodytext_bold" style="font-size:100%">Appointment Details</LEGEND>
        <div class="AppDetails">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="27%" height="30" class="bodytext_bold">Appointment Time</td>
              <td width="37%" class="bodytext_bold" style='font-size:1em'>:&nbsp; <?php echo date('d M Y H:i', strtotime($display_time)); ?></td>
              <td width="18%" class="bodytext_bold">Appointment Charges</td>
              <td id='appointment_charges' width="18%" class="bodytext_normal">:&nbsp;</td>
            </tr>
            <tr>
              <td height="30" class="bodytext_bold">Charge Type</td>
              <td class="bodytext_bold" style='font-size:1em'>: &nbsp;<?php echo $charge_type?></td>
              <td class="bodytext_bold">Platform Usage Charges</td>
              <td id='platform_usage_charges' class="bodytext_normal">:&nbsp;</td>
            </tr>
	    <tr>
              <td height="30" class="bodytext_bold">Visit Type</td>
              <td class="bodytext_bold" style='font-size:1em'>:&nbsp;<select id='visit_type' class='textarea'  onchange='set_incidence_input(this);'>
                  <option >First Time</option>
                  <option >Follow-up</option>
                </select>
              </td>
              <td class="bodytext_bold">Online Booking Charges(non refundable)</td>
              <td id='online_booking_charges' class="bodytext_normal">: &nbsp;</td>
            </tr>
	   <tr>
		<td height="30">
                <label class="bodytext_bold">Please enter a name for this visit</label>
              </td>
               <td height="30" id='incidence_first' class="bodytext_bold" style='font-size:1em'>
                    : &nbsp;<input name="textfield" type="text" class="textarea" maxlength='50' autocomplete="off" id="input_incidence_name" />
              </td>
              <td height="30" id='incidence_follow' style='display:none' class="bodytext_bold" style='font-size:1em'>:&nbsp;<select name="textfield" class="textarea" id="input_incidence_select" style='width:150px'>
                  <?php foreach ($object_incidents as $object_incident) { ?>
                    <option value='<?php echo $object_incident->id ?>'><?php echo $object_incident->incidentsname_c . ', '. date("d M Y", strtotime($object_incident->incidentdate_c)); ?></option>
                  <?php } ?>
                </select>
              </td>
              <td class="bodytext_bold">Service Tax (non refundable) (<?php echo $servicetax; ?>%)</td>
              <td id='servicetaxonayushmancharges' class="bodytext_normal">: &nbsp;</td>
            </tr>
            <tr>
              <td height="30" class="bodytext_bold">&nbsp;</td>
              <td class="bodytext_normal">&nbsp;
                &nbsp;
              </td>
              <td class="bodytext_bold">Total Charges</td>
              <td id='total_charges' class="bodytext_normal">: &nbsp;</td>
            </tr>
            <tr>
              <td colspan='2' height="30" id='incidence_first'>
                &nbsp;
              </td>
              <td colspan='2' height="30" id='incidence_follow' style='display:none'>
                &nbsp;
              </td>
              <td class="bodytext_bold">Current Balance</td>
              <td class="bodytext_normal">: &nbsp;Rs. <?php echo $user_net_balance; ?></td>
            </tr>
          </table>
        </div>
        <div class="AppDetails">
          <label class="bodytext_bold">Please describe your reason for this appointment.</label><br>
            <textarea rows="5" class="describe_textarea" id='description'></textarea>
        </div>
        <div class="footer">
          <button class="button footerButton" style="float:right;vertical-align:middle;" onclick='prepare_book_form()'>Confirm and Book</button>
        </div>
      </FIELDSET>
    </div>
  </div>
  <form id='appointment_book_form' method="post" enctype="multipart/form-data"  action="/ayushman/cappointment/book"> 
    <input type='hidden' name = 'display_time' value='<?php echo $display_time; ?>' />
    <input type='hidden' name = 'start_time' value='<?php echo $start_time; ?>' />
    <input type='hidden' name = 'end_time' value='<?php echo $end_time; ?>' />
    <input type='hidden' id='form_visit_type' name = 'visit_type' value='' />
    <input type='hidden' name = 'doctor_id' value='<?php echo $search_doctor_object->doctorid; ?>' />
    <input type='hidden' name = 'clinic_id' value='<?php echo $clinic_address_object->id; ?>' />
    <input type='hidden' id='form_incident' name= 'incident' value='' ?>
    <input type='hidden' name='charge_type' value='<?php echo $charge_type ?>' />
    <input type='hidden' id='payment_mode' name='payment_mode' value=''/>
    <input type='hidden' name='clinic_name' value='<?php echo $clinic_name; ?>'/>
    <input type='hidden' name='appointment_type' value='<?php echo $appointment_type?>' />
	<input type='hidden' id='descriptions' name='descriptions' value='' />
	<input type='hidden' name='ayushmancharges' id="ayushmancharges" value='' />
	<input type='hidden' name='servicetax_ayushmancharges' id='servicetax_ayushmancharges' value='' />
	<input type='hidden' name='totalcharges' id='totalcharges' value='' />
	<input type='hidden' name='appointmentcharges' id='appointmentcharges' value='' />

  </form>
  <div id='paymentmode'>
    <p>You can make payment online or pay at the time of consultation. Select appropriate option and proceed.<br/><form><input type="radio" id="onlinepayment" name="payment" value="1" >Pay online.</input><br /><input type="radio"  name="payment" id="inclinicpayment" value="0" checked >Pay at the time of appointment.</input></form></p>
    <p>IOH Service charges will be deducted online even if you select 'Pay at the time of appointment' option.</p>
  </div>
  <div id='redirect'>
    <p class='bodytext_bold'>You don't have sufficient balance to book this appointment.<br/>Would you like to recharge your account?<br/></p>
  </div>
</html>

<script type='text/javascript'>
  function set_incidence_input(select_object){
    visit_type = $(select_object).val();
    if(visit_type == 'Follow-up'){
      $('#incidence_first').hide();
      $('#incidence_follow').show();
      set_fees();
    }
    if(visit_type == 'First Time'){
      $('#incidence_follow').hide();
      $('#incidence_first').show();
      set_fees('First Time');
    }
  }

  function set_payment_mode(){
    var role = '<?php echo $role; ?>';
    if(role == 'patient'){
      var consultation_mode = '<?php echo $mode ?>';
      if(consultation_mode == 'In-clinic'){
        $('#paymentmode').dialog('open'); 
      }
      else{
        $('#payment_mode').val(1);
        book_appointment();
      }
    }
    else{
      $('#payment_mode').val(0);
      $('#appointment_book_form').submit();
    }
  }

  function prepare_book_form(){
    var visit_type = $('#visit_type').val();
	
	var description =$('#description').val();
	$('#descriptions').val(description);
    $("#form_visit_type").val(visit_type);
    if(visit_type == 'First Time'){
      var incidence_name = $('#input_incidence_name').val();
      if(incidence_name == ''){
        showMessage('250','50','Error' ,'Please enter a name for this visit.','error','id');
      }
      else{
        $('#form_incident').val(incidence_name);
        set_payment_mode();
      }
    }
    else if (visit_type == 'Follow-up'){
      $('#form_incident').val($('#input_incidence_select').val());
      set_payment_mode();
    }
  }

  function book_appointment(){
    var payment_mode = ($('#payment_mode').val());
    var total_fees = $('#totalcharges').val();
    var ayushman_charges = parseFloat($('#ayushmancharges').val()) + parseFloat($('#servicetax_ayushmancharges').val());
    if(payment_mode == 1 && parseFloat(total_fees)> parseFloat('<?php echo $user_net_balance; ?>')){
      $('#redirect').dialog('open');
    }
    else if(payment_mode == 0 && parseFloat(ayushman_charges)> parseFloat('<?php echo $user_net_balance; ?>')){
      $('#redirect').dialog('open');
    }
    else{
      $('#appointment_book_form').submit();
    }
  }
  
  function redirect_to_recharge(){
    $('#appointment_book_form').attr('action','/ayushman/cappointment/redirect');
    $('#appointment_book_form').submit();
  }

  $(document).ready(function(){
    set_fees('First Time'); 
    $('#paymentmode').dialog({
      autoOpen: false,
      draggable: false,
      modal: true,
      title: 'Payment Mode',
      width:'500',
      height:'300',
      buttons: {
        "Ok": function () {
          $('#payment_mode').val($('input[name="payment"]:checked').val());
          $(this).dialog('close');
          book_appointment();
        },
        "Cancel": function () {
          $(this).dialog('close');
        }
      }
    });
    jQuery("#paymentmode").dialog('option', 'position', [150,150]);
    $('#redirect').dialog({
      autoOpen: false,
      draggable: false,
      modal: true,
      title: 'Insufficient Balance',
      width:'500',
      height:'200',
      buttons: {
        "Yes": function () {
          $(this).dialog('close');
          redirect_to_recharge();
        },
        "No": function () {
          $(this).dialog('close');
        }
      }
    });
    jQuery("#redirect").dialog('option', 'position', [150,150]);
	
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

  function set_fees(visit_type){
    var consultation_mode = '<?php echo $mode; ?>';
    var consultation_fees;
    var usage_charges;
	var servicetax = <?php echo $servicetax; ?>;
    if(consultation_mode == 'In-clinic'){
      if(visit_type == 'First Time'){
        consultation_fees = '<?php echo $object_fees->firsttimefeesinclinic_c; ?>';
      }
      else{
        consultation_fees = '<?php echo $object_fees->followupfeesinclinic_c; ?>';
      }
      usage_charges = '<?php echo $user_plan_charges->usagechargesinclinic?>';
	    }
    else{
      if(visit_type == 'First Time'){
        consultation_fees = '<?php echo $object_fees->firsttimefees_c; ?>';
      }
      else{
        consultation_fees = '<?php echo $object_fees->followupfees_c; ?>';
      }
      usage_charges = '<?php echo $user_plan_charges->usagechargesonline_c; ?>';
    }
	var ayushman_charges = '<?php echo $user_plan_charges->servicecharges_c ?>';//service charges
	servicetaxon_ayushmancharges = (parseFloat(usage_charges) + parseFloat(ayushman_charges))*parseFloat(servicetax)/100;

    $('#appointment_charges').text(": Rs. "+consultation_fees);
    var total_ayushman_charges = parseFloat(usage_charges) + parseFloat(ayushman_charges);
    var total_charges = parseFloat(consultation_fees) + total_ayushman_charges + servicetaxon_ayushmancharges;
    $('#total_charges').text(": Rs. "+total_charges);
	$('#online_booking_charges').text(": Rs. " + ayushman_charges);
	$('#platform_usage_charges').text(": Rs. " + usage_charges);
	$('#servicetaxonayushmancharges').text(": Rs. " + servicetaxon_ayushmancharges.toFixed(2));

	$("#ayushmancharges").val(total_ayushman_charges);
	$('#servicetax_ayushmancharges').val(servicetaxon_ayushmancharges);
	$('#totalcharges').val(total_charges);
	$('#appointmentcharges').val(consultation_fees);

  }
</script>
