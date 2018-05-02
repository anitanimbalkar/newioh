   	    <style type="text/css">
   	    	#stepmenu td:hover{
   	    		background-color:#D1E8F7;
   	    		box-shadow:2px 7px 19px #888888;
   	    	}
   	    </style>
   		<script type="text/javascript">
		function divhide()
		{
			var div=document.getElementById('stepmenu');
			div.style.display ='none';
			hopscotch.endTour(tour);
		}
		</script>
		
   	<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
	<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
 
   	    <div id="stepmenu" style="box-shadow:2px 7px 19px #888888;background:white;width:170px;position:fixed;float:right;right:1px;top:200px;z-index:1;width:100px;">
         <div id="table_heading" style="height:38px;background:rgb(156,216,36);padding:10px;padding-right:4px;" ><font  size="3" color="white" style="position:absolute">STEPS</font><?php if($flag=='1'){echo '<a href="javascript:void(0);" style=" float:right;" onclick="divhide()" class="hopscotch-bubble-close hopscotch-close">X</a>';}?></div>
           <table width="inherit" class='table_roundBorder' style="max-height:100%;width:100%;" >
             	<?php 
             	$color=array();
             	$i='0';
            		foreach ($step_names as $val){
   	          			$array=explode(',',$val);
  						$color[$i]='#ffffff';
   	      				foreach($obj_userRegsteps as $obj_userRegstep){
   	      					if($obj_userRegstep->refuseruspstepsid_c == $array[2]){
   	      						$color[$i]='#A9F5A9';
   	      					}
  	      				}
                    	echo '<tr  bgcolor="';echo $color[$i]; echo'" style="border-bottom:1px solid #9cd4f9;cursor:pointer;">
                    	<td width="100%" height="60" class="bodytext_bold menu" align="left" style="padding:5px;"><a class="greenhilite" href="';echo $array[1];echo' " >';
                    	$str = ($color[$i] == '#A9F5A9')?'<span><h5>'.$array[0].'</h5></span>':'<span id="menu'.$array[2].'"><h5>'.$array[0].'</h5></span>';
                    	echo  $str;
                    	echo '</td></tr>';
                    ++$i;
                    }
                ?>
       	
       	<script type="text/javascript">
       	function fancyboxclosed(obj){
       		alert('fancyboxclosed');
       	}
       	$(document).ready(function(){
       	
        tour = {
   		 id: "hello-hopscotch",
 	  		 i18n: {
        			stepNums : [<?php if($flag=='1'){echo '""'.','.'""'.','.'""'.','.'""'.','.'""';}?>]
 				},
    	steps: [
      
      		{
        		title: "Upload your Certificate",
        		content: "This is mandatory step to activate your account.",
     		    target: "#menu1",
     		    fixedElement:true,
     		    delay:1000,
		        placement: "left"
	         },
      		{
        		title: "Edit Profile",
  			    content: "Add your personal info which is mandatory to activate account.",
 		        target: "#menu2",
 		        fixedElement:true,
				delay:1000,
 		        placement: "left"
 		     },
      
  		    {
		        title: "Set Clinics",
 		        content: "Here you can add your clinics details.",
		        target: "#menu3",
		        fixedElement:true,
		        placement: "left"
		      },
      		{
        		title: "Set Working Hours",
  			    content: "Set working hours to each clinic which you have added.",
 		        target: "#menu4",
 		        fixedElement:true,
 		        placement: "left"
 		     },
      		{
        		title: "Set Consultation Fees",
  			    content: "Set online & in-clinic consultation fees.",
 		        target: "#menu5",
 		        fixedElement:true,
 		        placement: "left"
 		     }
			    ],
			    showPrevButton: true,
			    scrollTopMargin:400
			    
		  };
	  hopscotch.startTour(tour,0);
       })
       </script>
          </table>
  	</div>
     