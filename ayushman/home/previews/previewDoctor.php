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
   <img style="width:auto; Height:auto;" src="/<?php echo @$_COOKIE["header_image"]; ?>" alt="header">
   <?php } else { ?>
     <p> Please upload the header image. </p>	 
	 <?php } ?>
  </div>
  <div style="width:100%;">
    
   <div style="padding:10px;font-weight: bold;width:30%;float:left;">
   IOH ID : 126</br>
   Name Of The Patient : Vijay 
   Mobile No. : 888888888<br>
   Age/Gender : 54/<br>
   Reference Id : 7<br>
   Referred By : Self
   </div>
   <div style="padding:10px;font-weight: bold;width:40%;float:right;">Order Number : </br>
   Order Date : </br>
   Sample collection place : baner<br>
   Sample collection date : 09-07-2015<br>
   Sample Id :    45<br>
   <label for="Datetxt1" style="float:left;width:38%;">Test Date* :</label>
      10-09-2015
   </div> 
   <div style="width:10%;">
   &nbsp;
   </div>
   <hr>
  </div>
  <div  style="width:900px;border-color:black;">
   <div style="width:900px;">
    <div  class="parametervalues" style="width:45%;"><label style="line-height:15px;"> Parameter names</label></div>
    <div  class="parametervalues" style="width:20%;"><label style="line-height:15px;">Parameter values</label></div>
    <div class="parametervalues" style="width:15%;"><label style="line-height:15px;">Units</label></div> 
    <div class="parameternames" style="width:15%;"><label style="line-height:15px;">Reference Values</label></div>
   </div>
   
  </div>
  <div id="content1" class="container" style="border:0; border-bottom:1px solid;">

   <!-- ngRepeat: parameter in test.parameters --><div ng-repeat="parameter in test.parameters" class="ng-scope">
    <div class="parameternames" style="width:45%;"><label for="280" style="line-height:15px;" class="ng-binding">Erythrocytes [#/volume] in Blood by Automated</label>
    </div>
    <div class="parametervalues" style="width:30%;">
     <div class="parameternames">
      1200
      
     </div>
     <div class="parametervalues">
      
      Mg/s
     </div>
     
    </div>
    <div class="parameternames" style="width:2%;">&nbsp;</div>
    <div class="parametervalues" style="width:13%;">
      1000-1400
     </div>
   </div>
  </div><!-- end ngRepeat: parameter in test.parameters -->
  
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
     <img  src="/<?php echo @$_COOKIE["signature_image"]; ?>" width="170" height="50" alt="Sign"/>
	 <?php } else { ?>
     <p> Please upload the signature image. </p>	 
	 <?php } ?>
    </div>
   </div>
  </div>
  <div style="width:100%;">
   <div style="width:100%;float:left;"><br>
   <?php if(isset($_COOKIE["footer_image"])) {?>
   <img style="width:auto;Height:auto;" src="/<?php echo @$_COOKIE["footer_image"]; ?>" alt="footer"/>
   <?php } else { ?>
     <p> Please upload the footer image. </p>	 
	 <?php } ?>
   </div>
  </div> 
 </div> 

</body>
</HTML>