<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/jquery-ui-multiselect.css" />
<script type="text/javascript" src="/ayushman/assets/js/jquery-multiselect.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-multiselect.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.multiselect.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/ayushman/assets/css/formstyle.css" rel="stylesheet" type="text/css"/>
<script src="/ayushman/assets/js/formmodule.js"></script>
<script src="/ayushman/assets/js/formmodulevalidation.js"></script>

<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>

<body style="height:100%;">
	<div id="target" class="formtarget" style="font-size:100%; width:75%"></div>
	<br /><br />
	<input type="button" value="Show Form" onclick="showForm('vitals','examinations')"/>
</body>

<script type="text/javascript">
	function showForm(formName, formType)
	{
		$('#target').children().hide();
		if($('#'+formName).length != 0)
			$('#'+formName).show();
		else
		{
			var form = new formmodule();
			form.showForm(formName,formType,"target");
		}
	}
	
</script>
