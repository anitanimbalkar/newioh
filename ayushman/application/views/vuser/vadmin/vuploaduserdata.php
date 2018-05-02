<?php //echo $msg; 
if($msg != "")
echo "
<script type=\"text/javascript\">
window.alert('$msg');
</script>
";
?>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js">
</script>
<script type="text/javascript">
  function importtransactions(file)
  {
    document.getElementById("lblimageerror").style.display = "none";
    ext = (file.value).split('.');
    
    
    $("#submit").trigger("click");
    
  }
  $(document).ready(function() {
    
    //alert("hi");
    if($.trim($('#errorlistdiv').html()) != "")
      showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
    if($.trim($('#messagelistdiv').html()) != "")
    {
      showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
    }
  }
                   );
</script>

<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;">
  
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              Upload User Data
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td width="50%">
        <form action="">
          <input type="button"  value="Download Format" onclick="window.location.href='/ayushman/cuploaduserdata/download'"/>
          
        </form>
      </td>
      <td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">
        <form id="catalogform" method="post" enctype="multipart/form-data" action="/ayushman/cuploaduserdata/upload" >
          Upload Zip File
          <input type="file" name="zip_file" id="file" value="Choose File" onchange="importtransactions(this)" class="bodytext_normal"/>
          
          <label class="bodytext_normal">
          </label>
          <label id="lblimageerror" style="display:none;" class="bodytext_error">
            Import transactions in .xml format only...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </label>
          <input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
        </form>
      </td>
    </tr>
	</table>
	<table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="padding-top:1px;" >
        <HR style="height:0.5px;width:815px"/>
      </td>
      <td >
        &nbsp;
      </td>
    </tr>
  </table>
</div>

<div style="display:none;height:0px;">
  <div class="bodytext_error" id="errorlistdiv">
    <?= Arr::path($errors,'error'); ?>
  </div>
</div>

<div style="display:none;height:0px;">
  <div class="bodytext_normal" id="messagelistdiv">
    <?= Arr::path($messages,'message'); ?>
  </div>
</div>
