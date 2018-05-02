<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">
<!-- CUSTOM CSS -->
<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css"/>
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css"/>
<link href="/ayushman/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link type="text/css" href="/ayushman/assets/css/toggle.css" rel="stylesheet" media="screen" />
<link type="text/css" href="/ayushman/assets/css/tabs.css" rel="stylesheet" media="screen" />

<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
<script src="/ayushman/assets/js/jquery.tools.min.js"></script>
<script src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/xaccordianfunctions.js"></script>
<script src="/ayushman/assets/js/jquery.metadata.js" type="text/javascript"></script>
<script src="/ayushman/assets/js/jquery.supertextarea.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />


<script type="text/javascript">
	$(function()
		{
			$( "input[name=dob]" ).datepicker({yearRange: "-80:-20",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
		}
	);
	
	$(document).ready
	(
		function()
		{
			resize();
			if($.trim($('#errorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			if($.trim($('#messagelistdiv').html()) != "")
				showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
			
			$(".toggle_container").hide();	
			//$("h3.trigger").click(function(){
			//	$(this).toggleClass("active").next().slideToggle("fast");
			//});
			
			dropdown = document.getElementById("selgender");
			itemToSelect = "<?= $objuser->gender_c?>";
			for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		    {
				if (dropdown.options[iLoop].value == itemToSelect)
				{
					dropdown.options[iLoop].selected = true;
					break;
				}
	    	}	
			
			dropdown = document.getElementById("practicesince");
			itemToSelect = "<?= $objdoctor->practicesince_c?>";
			for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		    {
				if (dropdown.options[iLoop].value == itemToSelect)
				{
					dropdown.options[iLoop].selected = true;
					break;
				}
	    	}	 
								
			setdoctorselcetdvalues('iddoclang',<?=json_encode( $arrdoclang);?> );
			setdoctorselcetdvalues('idqualification',<?=json_encode( $arrdoctoreducations);?> )	;
			setdoctorselcetdvalues('iddomain',<?=json_encode( $arrdocdomain);?> );
			setdoctorselcetdvalues('idspecialization',<?=json_encode( $arrspecialization);?> );
			
			var firstnm = new LiveValidation('firstnm',{onlyOnSubmit: true });
			firstnm.add( Validate.Presence );
			firstnm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var middlenm = new LiveValidation('middlenm',{onlyOnSubmit: true });
			middlenm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var lastnm = new LiveValidation('lastnm',{onlyOnSubmit: true });
			lastnm.add( Validate.Presence );
			lastnm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
			DOB_c.add( Validate.Presence );
			
			var selgender = new LiveValidation('selgender',{onlyOnSubmit: true });
			selgender.add( Validate.Presence );
		}
	);


	function onclickdocedu(){
		if($( "#doclang" ).css('display') == 'block')
		{
			$('#doclang').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docdom" ).css('display') == 'block')
		{
			$('#docdom').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docspec" ).css('display') == 'block')
		{
			$('#docspec').prev().toggleClass("active").next().slideToggle("fast");
		}
		$( "#docedu" ).prev().toggleClass("active").next().slideToggle();
		
	}
	function onclickdocdomain(){
		if($( "#doclang" ).css('display') == 'block')
		{
			$('#doclang').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docedu" ).css('display') == 'block')
		{
			$('#docedu').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docspec" ).css('display') == 'block')
		{
			$('#docspec').prev().toggleClass("active").next().slideToggle("fast");
		}
		$( "#docdom" ).prev().toggleClass("active").next().slideToggle();
	}
	function onclickdocspec(){
		if($( "#doclang" ).css('display') == 'block')
		{
			$('#doclang').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docedu" ).css('display') == 'block')
		{
			$('#docedu').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docdom" ).css('display') == 'block')
		{
			$('#docdom').prev().toggleClass("active").next().slideToggle("fast");
		}
		$( "#docspec" ).prev().toggleClass("active").next().slideToggle();
	}
	function onclickdoclang(){
		if($( "#docdom" ).css('display') == 'block')
		{
			$('#docdom').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docedu" ).css('display') == 'block')
		{
			$('#docedu').prev().toggleClass("active").next().slideToggle("fast");
		}
		if($( "#docspec" ).css('display') == 'block')
		{
			$('#docspec').prev().toggleClass("active").next().slideToggle("fast");
		}
		$( "#doclang" ).prev().toggleClass("active").next().slideToggle();
	}

	function setProfileValue()
	{
		var iframe = document.getElementById('docprofileframe');
		var innerDoc = iframe.contentDocument || iframe.contentWindow.document;
		var profileforpat = innerDoc.getElementById("profileforpat").value;
		$('#doctorprofile').attr("value",profileforpat);
	}

	function setsize(f)
	{
		var body = f.contentDocument.body;
		body.style.padding = 0;
		body.style.margin = 0;
		body.style.background = "transparent";
	}
	
	function setdoctorselcetdvalues(divid,arrdata)
	{	
		div = document.getElementById(divid).getElementsByTagName("input");
		for(var i=0;i<div.length;i++)
		{
			if(div[i].type == "text")
			{
				if(arrdata[div[i].id] != undefined)
				{
					if(arrdata[div[i].id] != 0)
					{
						div[i].value = arrdata[div[i].name];
						addtxtitem(div[i]);
					}									
				}
				
			}
			else if(div[i].type == "checkbox")
			{
				if(arrdata[div[i].id] != undefined)
				{
					if(arrdata[div[i].id] == 0)
					{
						div[i].checked = false;
					}
					else
					{
						div[i].checked = true;
						addchkitem(div[i]);
					}									
				}								
			}
		}
	}
	function openuploader(){
		openDialog("/ayushman/cimagedisplay/uploadimage?userid=<?= $objuser->id; ?>",800,800,this);
	}
	function fancyboxclosed()
	{
		setTimeout(updatephoto,2250);
	}
	function updatephoto(){
		$.ajax({
			url: "/ayushman/cuser/getmyprofile?id="+<?= $objuser->id; ?>,
			success: function( data ) {
				obj = JSON.parse(data);
				$('#profilepic').attr("src", obj.userinfo.PatientPhoto);
			},
			error : function(){showMessage('550','200','Retrieving user information',"Could not retrieve user information.",'error','id');}
		});	
	}	
</script>
<div id="divdoceditprofile"  class="panel" style="max-width:100%;">
	<div class="row editformHeader">
		<div class="col-sm-4 col-md-4"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Edit Profile</div>
		<div class="rightheader col-sm-8 col-md-6">Created / Updated On:<?php if ((strtotime($objuser->profileeditdate_c)))  echo date('d M Y',strtotime($objuser->profileeditdate_c)) ;  ?></div>
		
	</div>		
	<div id="doctorprofiletable" style="width:100%;border:1px solid #eee;">
		<form role="form"  class="form-horizontal" style="margin-left:20px;" id="docregistartion" method="post" enctype="multipart/form-data"  action="/ayushman/cdoctorprofile/savedoctordetails">
			<div class="row">	
			  <div class="col-sm-6 col-md-6"><div class="form-group">	
					<label class="col-md-6 control-label">User Name:&nbsp;</label><span class="bodytext_normal"><?php echo $objuser->username;?></span>
			  </div></div>
		      <div class="col-sm-6 col-md-6"><div class="form-group">		
					<label class="col-md-6 control-label">Email:&nbsp;</label><span class="bodytext_normal"><?php echo $objuser->email;?></span>			 
			  </div></div>			  
		      <div class="col-sm-6 col-md-6"><div class="form-group">	
					<label class="col-md-6 control-label">Registration Number:&nbsp; </label><span class="bodytext_normal"><?php echo $objdoctor->RMPnumber_c;?></span>
			  </div></div>
		      <div class="col-sm-6 col-md-6"><div class="form-group">	
					<label class="col-md-6 control-label">Date of Registration:&nbsp; </label><span class="bodytext_normal"><?php  if ((strtotime($objdoctor->RMPnumberdateofissue_c)))  echo date('d M Y',strtotime($objdoctor->RMPnumberdateofissue_c)) ;?></span>
			  </div></div>
			  <div class="col-sm-6 col-md-6"><div class="form-group">	
					<label class="col-md-6 control-label">IndiaOnlineHealth ID:&nbsp;</label><span class="bodytext_normal"><?php echo $objuser->id;?></span>
			  </div></div>
		      <div class="col-sm-6 col-md-6"><div class="form-group">	
					<label class="col-md-6 control-label">Registration Valid Till:&nbsp; </label><span class="bodytext_normal"><?php echo date('d M Y',strtotime($objdoctor->RMPnumberdateofexpiry_c)) ;?></span>
			  </div></div>
			  <div class="col-sm-6 col-md-6"><div class="form-group">	
					<label class="col-md-6 control-label">Contact Number:&nbsp;</label><span class="bodytext_normal"><?php echo $objuser->isdmobileno1_c.'-'.$objuser->mobileno1_c; ?></span>
			  </div></div>
		      <div class="col-sm-6 col-md-6"><div class="form-group">	
					<label class="col-md-6 control-label">Registering Authority:&nbsp; </label><span class="bodytext_normal"><?php echo $objdoctor->medicalcouncilwhereregistered_c ;?></span>
			  </div></div>
			  <div class="col-sm-4 col-md-4">
				<div class="form-group">	
					<label class="col-md-4 control-label" for="firstnm">First Name *</label>
					 <div class="col-md-8">
						<input id="firstnm" name="Firstname_c" value="<?php echo trim($objuser->Firstname_c); ?>" class="form-control" autocomplete="on" maxlength="45" tabindex="1"  />
					</div>
				</div>
			  </div>
			  <div class="col-sm-4 col-md-4">
				<div class="form-group">	
					<label class="col-md-4 control-label" for="middlenm">Middle Name</label>
					 <div class="col-md-8">
						<input id="middlenm" name="middlename_c" value="<?php echo trim($objuser->middlename_c);?>" class="form-control" autocomplete="on" maxlength="45" tabindex="2" />
					</div>
				</div>
			  </div>
			  <div class="col-sm-4 col-md-4">
				<div class="form-group">	
					<label class="col-md-4 control-label" for="lastnm">Last Name *</label>
					 <div class="col-md-8">
						<input id="lastnm" name="lastname_c" value="<?php echo trim($objuser->lastname_c);?>" class="form-control" autocomplete="on" maxlength="45" tabindex="3" />
					</div>
				</div>
			  </div>
			  <div class="col-sm-4 col-md-4">
				<div class="form-group">	
					<label class="col-md-4 control-label" for="DOB_c">Date of Birth* :</label>
					 <div class="col-md-8">
						<input id="DOB_c" name="dob" readonly="readonly" value="<?php if ((strtotime($objuser->DOB_c))) echo  date('d M Y',strtotime( $objuser->DOB_c)) ;?>" class="form-control" tabindex="4" />
					</div>
				</div>
			  </div>
			  <div class="col-sm-4 col-md-4">
				<div class="form-group">	
					<label class="col-md-4 control-label" for="selgender">Gender *</label>
					 <div class="col-md-8">
						<select id="selgender" name="gender_c" class="form-control">
						<option value="">-----Select Gender-----</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					</div>
				</div>
			  </div>
			  <div class="col-sm-4 col-md-4">
				<div class="form-group">	
					<label class="col-md-4 control-label" for="practicesince">Practicing since :</label>
					<div class="col-md-8"><select id="practicesince" name="practicesince_c" class="form-control">
						<?php
							$currentYear =date('Y'); 
							 for($i=$currentYear;$i>1950;$i--)
							 {
								echo "<option value='$i'>$i</option>";
							 }
						
						?>
						</select>
					</div>
				</div>
			  </div>
			  <div class="col-sm-12 col-md-12">
			  <div class="form-group">	
				<div class="col-md-6">
				  <div id="wizard" style=" height:auto;position:absolute; border:none;background: #FAFAFA;" >
					<div id="idqualification" >
						<input type="hidden" id="txtval" value="" />
						<h3 class="trigger" onclick="onclickdocedu();"><span class="bodytext">Qualification:&nbsp;</span><span><input type="text" onfocus="getval(this)" onclick="resize();" onchange="settval(this)" class="noborder truncate" onmouseover="this.title=this.value;"/></span></h3>
						<div id="docedu" class="toggle_container" style="width:40%;top:4px;left:100px;z-index:1;position:relative;background: #FAFAFA;" >				  
							<table width="100%">
								<?php
								foreach($arrdoctoreducation as $key=> $val)
								{
									echo "<li class='required'><tr ><td width='300px' ><label>".$val."</label></td><td><input type='checkbox' style='float:left;' class='select' name='arrayDocEdus[]'  onclick='addchkitem(this);'  value=".$key." id=".$key." /> </td></tr></li>";				
								}
								//echo ' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="arrayDocEdus[others]"  /> </td> </tr></li>';
								?>
							</table>
						</div>
					</div>
				  </div>				
				</div></div></div>
			  <div class="col-sm-12 col-md-12" style="margin-top:20px;">
			   <div class="form-group">	
				<div class="col-md-6">	
					<div id="wizard" style=" height:auto;position:absolute; border:none;background: #FAFAFA;" >
					<div id="iddomain" >
						<input type="hidden" id="txtval" value="" />
						<h3 class="trigger" onclick="onclickdocdomain();"><span class="bodytext">Practice Domain:&nbsp;</span><span><input type="text" onfocus="getval(this)" onclick="resize();" onchange="settval(this)" class="noborder truncate" onmouseover="this.title=this.value;"/></span></h3>
						<div id="docdom" class="toggle_container" style="width:40%;top:5px;left:100px;z-index:1;position:relative;background: #FAFAFA;display:block;" >				  
							<table width="100%">
								<?php
								foreach($arrdoctordomainmaster as $key=> $val)
								{
									echo "<li class='required'><tr ><td width='300px' ><label>".$val."</label></td><td><input type='checkbox' style='float:left;' class='select' name='arrayDocDomains[]'  onclick='addchkitem(this);'  value=".$key." id=".$key." /> </td></tr></li>";				
								}
								//echo ' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="arrayDocDomains[others]" /> </td> </tr></li>';
								?>
							</table>
						</div>
					</div>
				</div>
			  </div></div></div>		
		      <div class="col-sm-12 col-md-12" style="margin-top:20px;">
			   <div class="form-group">	
				<div class="col-md-12 col-sm-12">
				  <div id="wizard" style=" height:auto;position:absolute; border:none;background: #FAFAFA;" >
					<div id="idspecialization" >
						<input type="hidden" id="txtval" value="" />
						<h3 class="trigger" onclick="onclickdocspec();"><span class="bodytext">Specialization:&nbsp;</span><span><input type="text" onfocus="getval(this)" onclick="resize();" onchange="settval(this)" class="noborder truncate" onmouseover="this.title=this.value;"/></span></h3>
						<div id="docspec" class="toggle_container" style="width:40%;top:5px;left:100px;z-index:1;position:relative;background: #FAFAFA;" >				  
							<table width="100%">
								<?php
								foreach($arrspecializationmaster as $key=> $val)
								{
									echo "<li class='required'><tr ><td width='300px'><label>".$val."</label></td><td><input type='checkbox' style='float:left;' class='select' name='arrayDocSpecs[]'  onclick='addchkitem(this);'  value=".$key." id=".$key." /> </td></tr></li>";			
								}
								//echo ' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="arrayDocSpecs[others]" /> </td> </tr></li>';
								?>
							</table>
						</div>
					</div>
				</div>
			  </div></div></div>
			  <div class="col-sm-12 col-md-12" style="margin-top:20px;">
			   <div class="form-group">	
				<div class="col-md-6">	
					<div id="wizard" style=" height:auto;position:absolute; border:none;background: #FAFAFA;" >
					<div id="iddoclang" >
						<input type="hidden" id="txtval" value="" />
						<h3 class="trigger" onclick="onclickdoclang();"><span class="bodytext">Languages:&nbsp;</span><span><input type="text" onfocus="getval(this)" onclick="resize();" onchange="settval(this)" class="noborder truncate" onmouseover="this.title=this.value;"/></span></h3>
						<div id="doclang" class="toggle_container" style="width:40%;top:5px;left:100px;z-index:1;position:relative;background: #FAFAFA;" >				  
							<table width="100%">
								<?php
								foreach($arrlanguage as $key=> $val)
								{
									echo "<li class='required'><tr><td width='300px' ><label>".$val."</label></td><td><input type='checkbox' style='float:left;' class='select' name='arrayDocLangs[]'  onclick='addchkitem(this);'  value=".$key." id=".$key." /> </td></tr></li>";			
								}
								//echo ' <li class="required"><tr><td><label > Others(Comma seperate values)</label></td><td><input type="text"   value=""  onchange="addtxtitem(this)" name="arrayDocLangs[others]" /> </td> </tr></li>';
								?>
							</table>
						</div>
					</div>
				</div>
				</div></div></div>
			  <div class="col-sm-8 col-md-8" style="margin-top:20px;">
			   <div class="form-group">	
				<div class="col-md-6">
					<iframe name="docprofileframe" id="docprofileframe" frameborder="0"  vspace="0" hspace="0" scrolling="no" width="100%" frameborder="0" src="/ayushman/cimagedisplay/uploadtext?userid=<?= $objuser->id; ?>&docprofile=<?=$objdoctor->doctorprofile_c ?>" onload="setsize(this)"  allowtransparency="true" ></iframe>
					<input type="hidden" name="doctorprofile_c" id="doctorprofile" maxlength="999"/>
			  </div></div></div>
			  <div class="col-sm-4 col-md-4" style="margin-top:20px;">
			   <div class="form-group">	
				<div class="col-md-6">
					<span tabindex="-1">
							<img src="<?php echo $objuser->photo_c;?>" id="profilepic"  style="height:156px;box-shadow:10px 14px 19px #888888;" alt="Thumbnail Preview" id="thumb_preview" />
						</span><br/><br/>
						<input type="button" value="Change Profile Picture" onclick="openuploader();" />
				</div>
			   </div>
			  </div>
			  <div></div>
			  <div class="col-sm-4 col-md-4" style="margin-top:20px;">
			   <div class="form-group">	
				<div class="col-md-6">
					<input onclick="setProfileValue();" type="submit" class="regnbutton" value="Save Profile"/>
				</div>
			   </div>
			  </div>
			</div>
			
		</form>
	</div>
</div>

<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
	</div>
</div>

<div style="display:none;">
	<div class="bodytext" id="messagelistdiv">
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>
