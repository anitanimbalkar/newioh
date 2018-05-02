<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/ayushman/assets/css/consultation.css" rel="stylesheet" type="text/css"/>

<style type='text/css'>
  .main-wrapper{
    height: 420px;
    margin: auto;
    margin-top: 3em;
    width: 91%;
  }
  .full-screen{
    width: 100%;
  }
  .left-wrapper{
    height: 100%;
    width: 30%;
    float:left;
    overflow: hidden;
    padding: 0px;
    margin: 0.3em;
  }
  .other-wrapper{
    height: 100%;
    width: 65%;
    float:left;
  }
  .wrapper{
    height: 48.5%;
    width: 48.5%;
    float:left;
    overflow: hidden;
    margin: 0.3em;
  }
  .top{
    height: 100%;
    cursor: pointer;
  }
  .bottom{
    height: 100%;
    cursor: pointer;
    background-color: #ffffff;
    overflow:auto;
  }
  .tile-content{
    width: 95%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    color: white;
    font-size: 2em;
    font-weight: 300;
    padding-top: 1em;
  }
  .tile-content p{
    margin: 0px;
    padding: 0px;
  }
  .content{
    height: 100%;
    display:hidden;
  }
  .small_text{
    outline-color: transparent;
    outline-style: none;
		background: url(/ayushman/assets/images/textarea_line.png) repeat;
		width: 90%;
		line-height: 18px;
		padding: 2px 10px;
		margin-left:20px;
		font-family:tahoma, Helvetica, sans-serif;
		font-size:11px;
		color:#11587E;
		text-align:justify;
    resize: none;
  }
  .notification{
    display: none;
    position: fixed;
    top: 0;
    left: 40%;
    background-color: #FAFAAA;
    font-weight: bold;
  }
  body{
		background: url(/ayushman/assets/images/consult_back.png) repeat;
  }
  .tile-text{
    font-size: 0.5em;
    font-weight: normal;
    text-align: left;
  }
  .heading{
    width:100%;
    height:40px;
    background-color: #095883;
    margin-bottom: 10px;
    font-size: 18px;
    color:white;
  }
  .tile-head{
    color:white;
    text-align:center;
    font-size: 2em;
  }
</style>

<body>
<input id="isConsultationPage" type="hidden" value="true"/>
  <div id='notification' class='notification'>
    <span id='notification_message' style="border:2px solid #f0c36d;background-color:#f9edbe;" class='bodytext_bold'></span>
  </div>
  <div id='main-div' class='main-wrapper'>
    <div class='left-wrapper'>
      <div class='emr-wrapper' id='view_emr_tile' style='background-color: #2FB1BE;height:100%;width:100%'>
        <div class='top'>
          <div class='tile-content'>
            <img src="<?php if($object_patient->photo_c == ''){echo '/ayushman/assets/images/pic02.png';}else{echo $object_patient->photo_c;} ?>" width="125" height="150" style='display:block;margin:auto'/>
            <p style='margin-top:0.5em'><?= $appointmentinfo->Patientname; ?></p>
            </p>Age: <?= $appointmentinfo->age; ?></p>
            <p><?= $appointmentinfo->incidentsname_c; ?></p>
          </div>
        </div>
        <div class='bottom' onclick='show_frame(this)'>
          <div class='tile-content' style='color:#2FB1Be'>
            <p class='frame_msg'>Click to View EMR</p>
            <div style='display:none'>
                <div class="heading">
                  <div class="popuptile" style='float:left;margin-left:10px;line-height:40px;'>EMR</div>
                  <img id="close" alt="close" src="/ayushman/assets/images/close-icon.png" align="Right" width="45px" height="100%" style="cursor: pointer" onclick='hide_frame(this);' />
                </div>
                <iframe id="view_emr_frame" class='frame' style=" position: relative;z-index: 0;" scrolling="auto" frameborder="0" width="100%" height="570px;"></iframe>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class='other-wrapper'>
      <div class='wrapper'>
        <div id='notes-tile' class='bottom' onclick='show_notes()' style='' title='Click to edit notes'>
          <div class='tile-head' style='background-color:#BEA881'>NOTES</div>
          <div class='tile-content' style='color:#BEA881;padding-top:0px;' >
            <?php if ($object_doctornote->notes_c != '') { ?>
              <p id='notes' class='tile-text' style='margin-top:10px;'><?php echo $object_doctornote->notes_c; ?></p>
            <?php } else { ?>
              <p id='notes'>Click to add notes for this patient</p>
            <? } ?>
          </div>
        </div>
        <div class='content' onmouseout='save_notes(this);'>
          <form id="notes_form" method="post" enctype="multipart/form-data">
            <input type='hidden' name = 'appointment_id' value = '<?=$appid?>' />
            <textarea id='notes_text' name='notes_text' class='small_text' rows='10'><?php echo $object_doctornote->notes_c; ?></textarea>
          </form>
        </div>
      </div>
      <div class='wrapper' id='examination_tile'>
        <div class='top' style='background-color: #8BBA30'>
          <div class='tile-content'>
            <p>Examination</p>
          </div>
        </div>
        <div class='bottom' onclick='show_frame(this)'>
          <div class='tile-content' style='color:#8BBA30'>
            <p class='frame_msg'>Click to begin examination.</p>
            <div style='display:none'>
              <div class="heading">
                <div class="popuptile" style='float:left;margin-left:10px;line-height:40px;'>Examination</div>
                <img id="close" alt="close" src="/ayushman/assets/images/close-icon.png" align="Right" width="45px" height="100%" style="cursor: pointer" onclick='hide_frame(this);' />
              </div>
              <iframe id="examination_frame" class='frame' style=" position: relative;z-index: 0;" scrolling="auto" frameborder="0" width="100%" height="850px;"></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class='wrapper'>
        <div class='bottom'>
          <div class='tile-head' style='background-color:red'>Risk Factors</div>
          <div id='risk_tile' class='tile-content' style='color:red;padding-top:0px;'>
            <p id='empty_risk' style='display:none'>Click to add risk factors</p>
            <div id='full_risk' style='height:80%;width:100%;margin-top:5px;display:none;'>
            <?php 
              $patient_risk_view = Request::factory('cpatientrisk/view');
              $patient_risk_view->post("patient_id",$object_patient->id);
              echo $patient_risk_view->execute(); 
            ?>
            </div>
          </div>
        </div>
      </div>
      <div class='wrapper' id='track_sheet_tile'>
        <div class='top' style='background-color: #2FB1Be'>
          <div class='tile-content'>
            <p>Tracksheets</p>
          </div>
        </div>
        <div class='bottom' onclick='show_frame(this)'>
          <div class='tile-content' style='color:#2FB1Be'>
            <p class='frame_msg'>Click to View Trackheets</p>
            <div style='display:none'>
              <div class="heading">
                <div class="popuptile" style='float:left;margin-left:10px;line-height:40px;'>TrackSheet</div>
                <img id="close" alt="close" src="/ayushman/assets/images/close-icon.png" align="Right" width="45px" height="100%" style="cursor: pointer" onclick='hide_frame(this);' />
              </div>
              <iframe id="track_sheet_frame" class='frame' style=" position: relative;z-index: 0;" scrolling="auto" frameborder="0" width="100%" height="600px"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script type='text/javascript'>
  var default_height;
  var default_width;
  var other_default_width;
  var other_default_height;
  function endConsultation(){
    parent.maximizeframe('minimize');
    parent.window.location="/ayushman/cdashboard/view";
  }
  function hide_frame(img_element){
    $('#main-div').removeClass('full-screen');
    $('#main-div').addClass('main-wrapper');
    //$('.main-wrapper').css('height','420px');
    var bottom_tile = $(img_element).parent().parent().parent().parent();
    var id = $(bottom_tile).parent().attr('id');
    var iframe = $(bottom_tile).find('.frame');
    var frame_parent = $(iframe).parent();
    var frame_msg = $(bottom_tile).find('.frame_msg');
    $(iframe).parent().hide();
    $(frame_msg).show();
    var other_wrapper = $(bottom_tile).parent().parent();
    $(other_wrapper).siblings().show(100);
    $(other_wrapper).animate({
      'width':other_default_width,
      'height':other_default_height},
      0,
      function(){}
    );
    $(bottom_tile).parent().siblings().show(100);
    if(id == 'view_emr_tile'){
      $(bottom_tile).parent().animate({
        'width': other_default_width,
        'height': other_default_height},
        100,
        function (){}
      );
    }
    else{
      $(bottom_tile).parent().animate({
        'width': default_width,
        'height': default_height},
        100,
        function (){}
      );
    }
    $(bottom_tile).siblings().show();
    $(bottom_tile).attr("onclick","set_onclick(this)");
    $(bottom_tile).css("height",other_default_height);
    $(bottom_tile).find('.tile-content').css('padding-top', '1em');
    var wrapper_element = $(bottom_tile).parent();
    $(wrapper_element).mouseleave(function(){
      mouse_leave_handler(this);
    });
  }
  function set_onclick(element){
    $(element).attr('onclick','show_frame(this)');
  }
  function show_frame(bottom_tile){
    var wrapper_tile = $(bottom_tile).parent();
    var tile_name = $(wrapper_tile).attr('id');
		var iframe = $(bottom_tile).find('.frame');
    var action = Array();
    action['track_sheet_tile'] =  window.location.protocol+"//"+window.location.hostname+":"+window.location.port+'/ayushman/ctracksheet/view/get/?app_id='+"<?php echo $appid ?>" ;
    action['examination_tile'] =  window.location.protocol+"//"+window.location.hostname+":"+window.location.port+'/ayushman/cemrdashboard/view/get/?appid='+"<?php echo $appid ?>"+'&name='+ "<?php echo $name ?>";
    action['view_emr_tile'] =  window.location.protocol+"//"+window.location.hostname+":"+window.location.port+'/ayushman/cpatienthistorydisplay/displaydemographic?appointmentid=<?php echo $appid; ?>&controller=cemrdashboard&back=false&showall=true&patientid=<?php echo $appointmentinfo->refappfromid_c; ?>','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650';
    var src = action[tile_name];
		$(iframe).attr('src', src);
    $(bottom_tile).find('.frame_msg').hide();
    $(iframe).parent().show();
    var other_wrapper = $(bottom_tile).parent().parent();
    $(other_wrapper).siblings().hide(100);
    other_default_width = $(other_wrapper).css('width');
    other_default_height = $(other_wrapper).css('height');
    other_default_height.substr(0, other_default_height.length-2);
    var frame_height = $(iframe).css('height');
    $(other_wrapper).animate({
      'width':'100%',
      'height':frame_height},
      0,
      function(){}
    );
    $(bottom_tile).parent().siblings().hide(100);
    $('#main-div').removeClass('main-wrapper');
    $('#main-div').addClass('full-screen');
    var width = $(other_wrapper).css('width');
    var height = $(other_wrapper).css('height');
    height = parseInt(height.substr(0, height.length-2)) + 50 + 'px';
    $(bottom_tile).parent().animate({
      'width': width,
      'height': height},
      100,
      function (){}
    );
    $(bottom_tile).siblings().hide();
    $(bottom_tile).removeAttr('onclick');
    $(wrapper_tile).unbind('mouseleave');
    $(bottom_tile).css('height','950px');
    $(bottom_tile).find('.tile-content').css('padding-top', '0px');
    parent.setIframeHeight(iframe);
  }
  function checkmsg(message){
    document.getElementById('examination_frame').contentWindow.low_msg_handler(message);
  }
  function mouse_enter_handler(element){
    var height = $(element).css('height');
    var top_element = $(element).find('.top');
    $(top_element).animate({
      'margin-top': '-'+height},
      200,
      function (){});
  }
  function mouse_leave_handler(element){
    var wrapper_element = $(element).parent();
    var top_element = $(wrapper_element).find('.top');
    $(top_element).animate({
      'margin-top': 0},
      200,
      function (){});
  }
  $(document).ready(function(){
    var risk_count = <?php echo $risk_count ?>;
    set_risk_display(risk_count);
    default_height = $('.wrapper').css('height');
    default_width = $('.wrapper').css('width');
    default_emr_height = $('#view_emr_tile').css('height');
    default_emr_width = $('#view_emr_tile').css('width');
    $('.wrapper').mouseenter(function(){
      mouse_enter_handler(this);
    });
    $('.wrapper').mouseleave(function(){
      mouse_leave_handler(this);
    });
    $('.emr-wrapper').mouseenter(function(){
      mouse_enter_handler(this);
    });
    $('.emr-wrapper').mouseleave(function(){
      mouse_leave_handler(this);
    });
  });
  function set_risk_display(risk_count){
    if(risk_count == 0){
      $('#empty_risk').show();
      $('#full_risk').hide();
      $('#risk_tile').attr('onclick','add_risk()');
      $('#risk_display').hide();
    }
    else{
      $('#empty_risk').hide();
      $('#full_risk').show();
    }
  }
  function add_risk(){
    $('#empty_risk').hide();
    $('#full_risk').show();
    add_new_risk();
  }
  function show_notes(){
    $('#notes-tile').hide();
    $('#notes_text').show();
    $('#notes_text').focus();
  }
  function save_notes(content_element){
    var notes_text = $('#notes_text').val().trim();
    $('#notification').show();
    $('#notification_message').text('Saving Data...');
    $.ajax({
      type: "post",
      url: "/ayushman/cconsultation/saveDoctorNotes",
      data: $('#notes_form').serialize(),
      success: function(data) {
        $('#notification').show();
        $('#notification_message').text('Data saved successfully!');
        if(notes_text != ''){
          $('#notes').text(notes_text);
          $('#notes').addClass('tile-text');
        }
        else{
          $('#notes').text('Click to add notes for this patient.');
          $('#notes').removeClass('tile-text');
        }
        $('#notes-tile').show();
        $('#notes_text').hide();
        setTimeout("$('#notification').hide()", 1000);
      },
      error: function(){
        $('#notification').show();
        $('#notification_message').text('An error occurred. Please try again.');
        setTimeout($('#notification').hide(), 1000);
      }
    });
  }
</script>
