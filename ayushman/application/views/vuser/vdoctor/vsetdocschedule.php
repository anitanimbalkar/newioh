<script type="text/javascript">

$(document).ready(function(){
	
			 $.ajax({
				 url: "/ayushman/cdoctorcalendar/getappcal?doctorid=<?=$doctorid;?> ",
				 success: function( data ) {
				 //alert(data);
				 var target = document.getElementById("divappcal");
				 target.innerHTML = "";
									var newFrame = document.createElement("iframe");
									newFrame.setAttribute("src", window.location.protocol +"//"+ window.location.host +"/TDE_AppCalendar/admin/index.php?id="+data+"&username=test&password=test&Submit=Enter");
									newFrame.style.width = 768+"px"; 
		   							newFrame.style.height = 538+"px";
									newFrame.setAttribute("frameBorder", "0");
									newFrame.frameBorder = "0"; 
									target.appendChild(newFrame);	
				  },
			error : function(){alert("error while adding appintmentid ");}					
				});		
	
});
</script>

<div id="body_contantpatientpage" style="width:828px; height:auto;"> 
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="100%" class="bodyheading">Set Schedule</td>
                                </tr>
                          </table> 
          
          <table width="100%" border="0" align="center"  valign="middle"cellpadding="0" cellspacing="0"> 
              <tr>
              <td><table width="100%" border="1" cellspacing="0" cellpadding="0" valign="middle">
                  <tr><td style="width:100%;align:center">
                   <div id="divappcal"  align="center"  style="height:auto;width:auto;"></div> 
                  </td></tr>
              </table></td>
            	</tr>
          </table>
</div>
