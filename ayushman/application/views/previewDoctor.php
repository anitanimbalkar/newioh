<HTML>
<Head>
<style>
 .ui-autocomplete 
{  margin-top: 0px !important;
      top: 60px !important;
}
.ui-datepicker {
  width: 30% ! important;
}
.container{
 float:left;
 width:100%;
 padding-left: 10px;
 padding-top: 10px;
 border:1px solid;
 padding-bottom: 10px;
}
.parameternames{
 float:left;
 width:59%;
 text-align:left;
 margin-left:1% ! important;
}
.parametervalues{
 float:left;
 width:40%;
 text-align:left;
}
.regnformcontrol{
 width:100%;
}
.formelements{
margin-left:1% ! important;
}
</Style>
</Head>
<body>
 <input type="hidden" id="orderid" value="<?php echo @$orderid; ?>"/>
 <div  style="max-width:900px; width:100%;margin:0px auto 0px auto;" > 
  <div style="width:100%;">
  <?php if(isset($_COOKIE["header_image"])) {?>
   <img style="width:auto; Height:auto;" src="<?php echo @$_COOKIE["header_image"]; ?>" alt="header">
   <?php } else { ?>
     <p> Please upload the header image. </p>	 
	 <?php } ?>
  </div>
  <div style="width:100%;">
    
   <div style="padding:10px;font-weight: bold;width:40%;float:left;">
   Vijay Gaikwad (Male, 25 Yrs)</br>
   
   </div>
   <div style="padding:10px;font-weight: bold;width:30%;float:right;">16 Feb 2016 05:55pm </br>
  
   </div> 
   <div style="width:10%;">
   &nbsp;
   </div>
   <hr>
  </div>
  <div  style="width:900px;border-color:black;">
   <div style="width:900px;">
    <div  class="parametervalues" style="width:45%; size:20pt;"><label style="line-height:15px;"> Rx</label></div>
  
   </div>
   
  </div>
  <div id="content1" class="container" style="border:0; border-bottom:1px solid;">

   <!-- ngRepeat: parameter in test.parameters --><div ng-repeat="parameter in test.parameters" class="ng-scope">
    <div class="parameternames" style="width:35%;"><label for="280" style="line-height:15px;" class="ng-binding">Paracetamol</label>
    </div>
    <div class="parametervalues" style="width:20%;">
     <div class="parameternames">
      (1-1-0) X 5 days
      
     </div>
    
     
    </div>
    <div class="parameternames" style="width:2%;">&nbsp;</div>
    <div class="parametervalues" style="width:30%;">
      Not on Empty Stomach
     </div>
   </div>
  </div><!-- end ngRepeat: parameter in test.parameters --><br>
  
  
   <div style="width:900px;">
    <div  class="parametervalues" style="width:45%; size:20pt;"><label style="line-height:15px;"> INVESTIGATIONS</label></div>
  
   </div><br><br><br>
  
  <div >
   <div>
   &nbsp;
   </div>
   <div style="width:100%;">
    <div style="float:left;width:80%;">
    Prepared By : Anyone
    </div>
    <div style="float:right;width:24%;">
    <b>Dr. Anita Nimbalkar</b>
       M.B.B.S
    </div>
   </div>
   <div style="width:100%;">
    <div style="float:left;width:80%;">
    &nbsp;
    </div>
    <div style="float:right;width:24%;margin-top:-20px;">     
     Signature        
    </div>
   </div>
   <div style="width:100%;">
    <div style="width:60%;">
    &nbsp;
    </div>
    <div style="float:right;width:25%;margin-left:-50px;">
	 <?php if(isset($_COOKIE["signature_image"])) {?>
     <img  src="<?php echo @$_COOKIE["signature_image"]; ?>" width="170" height="50" alt="Sign"/>
	 <?php } else { ?>
     <p> Please upload the signature image. </p>	 
	 <?php } ?>
    </div>
   </div>
  </div>
  <div style="width:100%;">
   <div style="width:100%;float:left;"><br>
   <?php if(isset($_COOKIE["footer_image"])) {?>
   <img style="width:auto;Height:auto;" src="<?php echo @$_COOKIE["footer_image"]; ?>" alt="footer"/>
   <?php } else { ?>
     <p> Please upload the footer image. </p>	 
	 <?php } ?>
   </div>
  </div> 
 </div> 

</body>
</HTML>