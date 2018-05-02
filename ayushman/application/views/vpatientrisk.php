<script type="text/javascript" src="/ayushman/assets/js/jquery.tools.min.js"></script>


<div id='risk_display' style='text-align:left;'>
<table >
  <?php $counter=count($patient_risks_obj);$i=0; foreach ($patient_risks_obj as $patient_risk_obj) { $i++; ?>
    <tr>
      <input type='hidden' class='risk_id' value='<?php echo $patient_risk_obj->id; ?>' />
      <td style='font-size:1em;color:red;'>
        <?php echo $patient_risk_obj->risktext_c; ?>
      </td>
      <td>
        <?php if($patient_risk_obj->refwriterid_c == $writer_obj->id) { ?>
          <img src ='/ayushman/assets/images/edit-icon.png' title='Click to edit this' onclick='edit_risk(this);' />
          <img src ='/ayushman/assets/images/delete-icon.png' title='Click to delete this' onclick='delete_risk(this);' />
        <?php } else { ?>
          <img class='info_img' src ='/ayushman/assets/images/information-icon.png' />
          <div class='tooltip'>
            <table border="0" cellpadding="0" cellspacing="0" style="border:1px solid #a8c8d9;padding:5px;">
              <tr>
                <td rowspan="3" align="center" valign="middle" class="bodytext_bold" style="padding-right:5px; border-right:1px solid #a8c8d9;">
                  <img src="/ayushman/assets/images/pic02.png" width="30" height="35"/>
                </td>
                <td class="bodytext_bold" style="padding-left:15px;">Name: </td>
                <td class="bodytext_normal" style='padding-left:5px;'><?php echo $all_other_editors_info[$patient_risk_obj->refwriterid_c]; ?></td>
              </tr>
              <tr>
                <td class="bodytext_bold" style="padding-left:15px;">Edited On: </td>
                <td class="bodytext_normal" style='padding-left:5px;'><?php if($patient_risk_obj->editedon_c != '') {echo date('d-M-Y',strtotime($patient_risk_obj->editedon_c));} else {echo date('d-M-Y',strtotime($patient_risk_obj->createdon_c));}?></td>
              </tr>
            </table>
          </div>
        <?php } ?>
      </td>
    </tr>
    <?php if ($i == $counter) { ?>
      <tr><td>
      <img id='add_button' src ='/ayushman/assets/images/add-risk-icon.png' title='Click to add a risk' onclick='add_new_risk()' />
      </td></tr>
    <?php } ?>
  <?php } ?>
</table>
</div>
<div id='risk_edit' style='width:100%;display:none'>
  <form id="risk_form" method="post" enctype="multipart/form-data" style='margin-bottom:0.5em;'>
    <input type='hidden' name = 'patient_id' value = '<?=$patient_id?>' />
    <input type='hidden' name = 'app_id' value = '<?=$app_id?>' />
    <input type='hidden' id='risk_id' name = 'risk_id' value='' />
    <textarea id='risk_text' name='risk_text' class='small_text' rows='2'></textarea>
  </form>
  <button id='save_button' class='button' onclick='save_risk()'>Save</button>
</div>
<style type='text/css'>
  .tooltip {
    display:none;
    background-color: white;
    font-size:11px;
    color:#fff;
  }
</style>
<script type='text/javascript'>
  $(document).ready(function(){
    $('.info_img').tooltip({position: 'bottom right'});
  });
  function delete_risk(img_element){
    var row_element = $(img_element).parent().parent();
    var risk_id = $(row_element).find('.risk_id').val();
    $.ajax({
      type: "get",
      url: "/ayushman/cpatientrisk/delete/get?risk_id="+risk_id,
      success: function(data) {
        $(row_element).remove();
      },
      error: function(){
        $('#notification').show();
        $('#notification_message').text('An error occurred while deleting risk. Please try again.');
        setTimeout($('#notification').hide(), 1000);
      }
    });
  }
  function add_new_risk(){
    $('#risk_edit').show(500);
    $('#add_button').hide();
    $('#risk_text').focus();
  }
  function edit_risk(img_element){
    var row_element = $(img_element).parent().parent();
    var risk_id = $(row_element).find('.risk_id').val();
    var risk_text = $(img_element).parent().prev().text().trim();
    $('#risk_id').val(risk_id);
    $('#risk_text').val(risk_text);
    add_new_risk();
  }
  function show_writer_info(img_element){
    alert('show info for this writer');
  }
  function save_risk(){
    var risk_text = $('#risk_text').val().trim();
    if(risk_text != ''){
      $('#notification').show();
      $('#notification_message').text('Saving Data...');
      $.ajax({
        type: "post",
        url: "/ayushman/cpatientrisk/addRisk",
        data: $('#risk_form').serialize(),
        success: function(data) {
          $('#risk_tile').empty();
          $('#risk_tile').html(data);
          $('#notification').show();
          $('#notification_message').text('Data saved successfully!');
          setTimeout("$('#notification').hide()", 1000);
        },
        error: function(){
          $('#notification').show();
          $('#notification_message').text('An error occurred. Please try again.');
          setTimeout($('#notification').hide(), 1000);
        }
      });
    }
  }
</script>
