function add_consultation_timing(add_button_object){
  var clinic_div = $(add_button_object).parent().parent();
  var schedule_object_id = $(clinic_div).find('.schedule_id').val(); 
  var footer_div = $(add_button_object).parent();
  var schedule_questions_div = $(clinic_div).find('.schedule_questions');
  if($(schedule_questions_div).length == 0){
    schedule_questions_div = $('#schedule_questions').clone();
    $(schedule_questions_div).find('.popup_schedule_id').val(schedule_object_id);
    $(schedule_questions_div).find('.popup_consultation_timing_id').val(null);
    $(schedule_questions_div).removeAttr('id');
    $(schedule_questions_div).insertAfter($(footer_div).prev()).show();
    var clinic_id = $(clinic_div).find('.clinic_id').val();
    add_validation(schedule_questions_div);
    var input_weekdays = $(schedule_questions_div).find('.input_weekdays');
    $(input_weekdays).multiselect({
    });
    $(".ui-multiselect-menu").css("width","200px");
    $(schedule_questions_div).find('.timepicker_noPeriodLabels').timepicker({
      showPeriodLabels: false,
      defaultTime: '9:00'
    });
    if(clinic_id == -1){
      make_changes_for_online(schedule_questions_div);
    }
  }
  $(schedule_questions_div).show();
  $(footer_div).hide();
  //parent.setIframeHeight(document.getElementById('icontent'));
}

$('#schedule_questions').submit(function(){});

function save_consultation_timing(done_button_object){
  var schedule_form = $(done_button_object).parent().parent();
  var weekdays_obj = $(schedule_form).find('.input_weekdays').val();
  var start_time = $(schedule_form).find('[name="input_start_time"]').val();
  var end_time = $(schedule_form).find('[name="input_end_time"]').val();
  var error_flag = false;
  if(start_time == '' || end_time == ''){
    error_flag = true;
  }
  if(start_time >= end_time){
    showMessage('250','50','Error' ,'Please ensure that the start time is before the end time.','error','id');
    error_flag = true;
  }
  if(weekdays_obj != null){
    var weekdays = '';
    for(var x=0;x<weekdays_obj.length-1;x++){
      weekdays = weekdays + (weekdays_obj[x]) +",";
    }
    weekdays = weekdays + weekdays_obj[weekdays_obj.length - 1]
    $(schedule_form).find('.hidden_input_weekdays').val(weekdays);
  }
  else{
    showMessage('250','50','Error' ,'Please choose week days to proceed.','error','id');
    $(schedule_form).find('.hidden_input_weekdays').val('');
    error_flag = true;
  }
  var consultation_duration = $(schedule_form).find('.input_consultation_duration').val();
  if(consultation_duration == 'select'){
    error_flag = true;
  }
  $('#schedule_questions').submit();
  if(error_flag == false){
    $.ajax({
        type: "post",
        url: "/ayushman/cbasicschedule/save",
        data: $(schedule_form).serialize(),
        success:function( data ){
          if(data == 0){
            location.reload();
          }
          else{
            showMessage('250','50','Error' ,'Please ensure that timings do not overlap with any existing consultation timings.','error','id');
          }
        },
        error:function(){
          showMessage('250','50','Error' ,'Error occured.Please try again.','error','id');
        },
    });
  }
}

function edit_consultation_timing(edit_object){
  var consultation_info_table = $(edit_object).parent().parent().parent();
  
  var consultation_timing_div = $(consultation_info_table).parent();
  var clinic_div = $(consultation_timing_div).parent();
  var consultation_timing_parent = $(consultation_timing_div).parent();
  var clinic_id = $(clinic_div).find('.clinic_id').val();

  var schedule_questions_div = $(consultation_timing_parent).find('.schedule_questions');
  if($(schedule_questions_div).length == 0){
    schedule_questions_div = $('#schedule_questions').clone();
    $(schedule_questions_div).removeAttr('id');
    $(schedule_questions_div).insertAfter(consultation_timing_div);
    add_validation(schedule_questions_div);
    var schedule_id = $(clinic_div).find('.schedule_id').val();
    var consultation_timing_id = $(consultation_timing_div).find('.consultation_timing_id').val();
	console.log(consultation_timing_id);
    var timing = $(consultation_info_table).find('.timing').text().split('-');
    $(schedule_questions_div).find('.input_start_time').val(timing[0]);
    $(schedule_questions_div).find('.input_end_time').val(timing[1]);
    $(schedule_questions_div).find('.input_consultation_duration').val($(consultation_info_table).find('.slot_duration').text().split(' ')[0]);
    $(schedule_questions_div).find('.input_standby').val($(consultation_info_table).find('.standby').text());
    $(schedule_questions_div).find('.popup_schedule_id').val(schedule_id);
    $(schedule_questions_div).find('.popup_consultation_timing_id').val(consultation_timing_id);
    $(schedule_questions_div).find('.input_weekdays').multiselect({
    });
    $(".ui-multiselect-menu").css("width","200px");
    $('.timepicker_noPeriodLabels').timepicker({
			    showPeriodLabels: false
    });
    if(clinic_id == -1){
      make_changes_for_online(schedule_questions_div);
    }
  }
  $(schedule_questions_div).show();
  $(consultation_timing_div).hide();
  var applied_to = $(consultation_info_table).find('.applied_to').text();
  var mode = $(consultation_info_table).find('.mode').text().split(' ');
  //parent.setIframeHeight(document.getElementById('icontent'));
}

function delete_consultation_timing(delete_object){
  var consultation_info_table = $(delete_object).parent().parent().parent();
  var consultation_timing_div = $(consultation_info_table).parent();
  var clinic_div = $(consultation_timing_div).parent();
  var schedule_object_id = $(clinic_div).find('.schedule_id').val();
  var consultation_timing_id = $(consultation_timing_div).find('.consultation_timing_id').val();
  delete_timing(schedule_object_id, consultation_timing_id, 1);
}

function delete_timing(schedule_object_id,consultation_timing_id, conflict_flag){
  $.ajax({
      url: "/ayushman/cbasicschedule/delete/get?schedule_id="+encodeURIComponent(schedule_object_id)+"&consultation_timing_id="+encodeURIComponent(consultation_timing_id)+"&conflict_flag="+conflict_flag,
			success:function( data ){
        if(data == 'appointments pending'){
          $('#conflict_schedule_id').val(schedule_object_id);
          $('#conflict_consultation_timing_id').val(consultation_timing_id);
          $('#delete_timing').dialog('open');
        }
        else{
          location.reload();
        }
			},
			error:function(){
				showMessage('250','50','Error' ,'Error occured . Please contact your system administrator.','error','id');
			},
  });
}

function cancel_edit(cancel_object){
  var schedule_questions_div = $(cancel_object).parent().parent().parent();
  $(schedule_questions_div).parent().find('.consultation_block').show();
  $(schedule_questions_div).hide();
  $(schedule_questions_div).parent().find('.footer').show();
 // parent.setIframeHeight(document.getElementById('icontent'));
}

function add_validation(schedule_questions_div){
  var random_number = Math.random().toString();
  var time_stamp = new Date().getTime().toString();
  
  var start_time_element = $(schedule_questions_div).find('.input_start_time');
  $(start_time_element).attr('id', ('input_start_time'+random_number+time_stamp));
  var start_time_val = new LiveValidation($(start_time_element).attr('id'), {onlyOnSubmit: true });
  start_time_val.add( Validate.Presence );
  
  var end_time_element = $(schedule_questions_div).find('.input_end_time');
  $(end_time_element).attr('id', ('input_end_time'+random_number+time_stamp));
  var end_time_val = new LiveValidation($(end_time_element).attr('id'), {onlyOnSubmit: true });
  end_time_val.add( Validate.Presence );
  
  var consultation_duration_element = $(schedule_questions_div).find('.input_consultation_duration');
  $(consultation_duration_element).attr('id', ('input_consultation_duration'+random_number+time_stamp));
  var consultation_duration_val = new LiveValidation($(consultation_duration_element).attr('id'), {onlyOnSubmit: true });
  consultation_duration_val.add(Validate.presence);
  consultation_duration_val.add( Validate.Numericality, {onlyInteger: true } );
}

function make_changes_for_online(schedule_questions_div){
  $(schedule_questions_div).find('.input_allow_online').val('Yes');
  $(schedule_questions_div).find('.input_allow_home').val('No');
  $(schedule_questions_div).find('.online').hide();
  $(schedule_questions_div).find('.home_visit').hide();
}

function delete_anyway(action){
  var conflict_flag = 0;
  var schedule_object_id = $('#conflict_schedule_id').val();
  var consultation_timing_id = $('#conflict_consultation_timing_id').val();
  if(action == 1){ //retain appointments
    conflict_flag = 2;
  }
  else if(action == 0){ //cancel appointments
    conflict_flag = 3;
  }
  delete_timing(schedule_object_id, consultation_timing_id, conflict_flag);
}
