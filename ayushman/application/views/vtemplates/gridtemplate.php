<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My First Grid</title>

<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 75%;
}
</style>
 
	<?php foreach($styles as $file => $type) { echo HTML::style($file, array('media' => $type)), "";  }?>
	<?php foreach($scripts as $file) { echo HTML::script($file, NULL, TRUE), ""; }?>
 
<script type="text/javascript">
  <?php echo $gridfunctions;?>
</script>

</head>
<body>
<table id="list"></table> 
<div id="pager"></div> 

</body>
</html>