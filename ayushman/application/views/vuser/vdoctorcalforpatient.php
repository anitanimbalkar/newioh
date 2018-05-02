

<script type="text/javascript" src="/TDE_AppCalendar/public.js"></script>

<script>initAppCalendar("cal<?php echo $appcalid?>",1,2,"ENG",{m1:"Please, select your appointment."});</script>
<body >
<input name="selDaycal<?php echo $appcalid?>" type="hidden" id="selDaycal<?php echo $appcalid?>"/>
<input name="selMonthcal<?php echo $appcalid?>" type="hidden" id="selMonthcal<?php echo $appcalid?>" />
<input name="selYearcal<?php echo $appcalid?>" type="hidden" id="selYearcal<?php echo $appcalid?>" />
<input name="selHourcal<?php echo $appcalid?>" type="hidden" id="selHourcal<?php echo $appcalid?>" />
<input name="selMinutecal<?php echo $appcalid?>" type="hidden" id="selMinutecal<?php echo $appcalid?>" />
<div style="z-index:1000;">
    <div id="cal<?php echo $appcalid?>Container"></div>
</div>

