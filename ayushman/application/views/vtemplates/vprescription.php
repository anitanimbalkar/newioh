<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/ayushman/assets/app/css/new_main.css">
<title>Prescription</title>
</head>
<body class="lgtbox">
<!--LIGHTBOX VISIT SUMMARY-->
<div id="SummaryBox">
<div class="lgtBoxSummary" style="width:98%;">
	<div class="topDetails">
    	<h2>Visit Summary</h2>

	<?php if($prescription['complaint'] != '') { ?>
        <h3>Symptom / Main Complaint</h3>
        <p><?php echo $prescription['complaint']; ?></p>
        <hr />
	<? } ?>

	<?php if($prescription['vitals'] != '') { ?>
        <h3>Vital Signs</h3>
        <p><?php echo $prescription['vitals']; ?></p>
        <hr />
	<? } ?>

	<?php if($prescription['symptoms'] != '') { ?>
        <h3>Symptomatic Review of Systems</h3>
        <p><?php echo $prescription['symptoms']; ?></p>
        <hr />
	<? } ?>

	<?php if($prescription['examinations'] != '') { ?>
        <h3>Examinations</h3>
        <p><?php echo $prescription['examinations']; ?></p>
	<? } ?>
    </div>
    <div class="botDetails"> 
	<?php if($prescription['diagnosis'] != '') { ?>
        <h3>Diagnosis</h3>
        <p><?php echo $prescription['diagnosis']; ?></p>
        <hr />
	<? } ?>

	<?php if($prescription['investigation'] != '') { ?>
        <h3>Investigations suggested</h3>
        <p><?php echo $prescription['investigation']; ?></p>
        <hr />
	<? } ?>

	<?php if($prescription['prescription'] != '') { ?>
        <h3>Rx Prescription</h3>
        <p><?php echo $prescription['prescription']; ?></p>
        <hr />
	<? } ?>

	<?php if($prescription['follow'] != '') { ?>
        <h3>Follow up / Advice</h3>
        <p><?php echo $prescription['follow']; ?></p>
        <hr />
	<? } ?>

    </div>
<br>
</div>
</div>
</body>
</html>
