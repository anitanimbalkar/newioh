function show_more_slots(button_object){
  clinic_div = $(button_object).parent().parent().parent().parent().parent().parent();
  doctor_div = $(clinic_div).parent();
  doctor_id  = $(doctor_div).find('.doctor_id').val();
  $(clinic_div).find('.doctor_id').val(doctor_id);
  form = $(clinic_div).find('.show_more');
  $(form).attr('action', '/ayushman/callslotsforclinic/view');
  $(form).submit();
}
function book_earliest_appointment(book_object){
  var clinic_div = $(book_object).parent().parent().parent().parent().parent().parent().parent();
  var doctor_div = $(clinic_div).parent();
  var doctor_id = $(doctor_div).find('.doctor_id').val();
  $(clinic_div).find('.doctor_id').val(doctor_id);
  var form = $(clinic_div).find('.show_more');
  var appointment_type = $(form).find('.appointment_type').val();
  console.log(appointment_type);
  if(appointment_type == 'W'){
    wait_form_object = form;
    $('#waiting_app').dialog('open');
  }
  else{
    book_appointment(form);
  }
}
function book_appointment(form_object){
  $(form_object).attr('action', '/ayushman/cappointment/finalize');
  $(form_object).submit();
}
