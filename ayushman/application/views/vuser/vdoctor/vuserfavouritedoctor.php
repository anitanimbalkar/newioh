<html>
<head>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" href="/ayushman/assets/css/toggle.css" rel="stylesheet" media="screen" />
<link type="text/css" href="/ayushman/assets/css/tabs.css" rel="stylesheet" media="screen" />

<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />

<!-- START: css for using footable instead of jqgrid -->
<link href="/ayushman/assets/cssF/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.bootstrap.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.standalone.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.standalone.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.filtering.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.filtering.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.paging.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.paging.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.sorting.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.sorting.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/cssF/footable.bootstrap.min.css">


<script src="/ayushman/assets/jsF/jquery.min.js"></script>
<script src="/ayushman/assets/jsF/jquery-ui.js"></script>
<!-- Add in FooTable itself -->

<script src="/ayushman/assets/jsF/footable.core.min.js"></script>
<script src="/ayushman/assets/jsF/footable.core.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.min.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.min.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
		$('.select-btn').click(function() {
			$('html, body').animate({ scrollTop: 0 }, 1000);
			$('body').addClass('apply-modal-body')
		});
	});
	function city_value(val) 
	{
		$.ajax({
			 url: "/ayushman/cdoctordirectory/selectlocation?city="+val,
				success: function( data ) 
				{
					var location =JSON.parse(data);
					for(var iter = document.doctorsearchform.location.length -1; iter >= 0; --iter)
					{
				 		removeItemInList(iter);
					}
					additemtolocation("Locality");
					for(i=0;i<location.length;i++)
					{
						additemtolocation(location[i]);
					}
					<?php
						if ($previousvalues != null && $previousvalues['location'] != 'Locality') { 
							echo "$('#location').val('".$previousvalues['location']."');";
						}
					?>
					
				},
				error : function(){alert("error while selecting city tests");}					
			});	
	}
	function removeItemInList(i)
	{
		var list  = document.getElementById('location');
		list.remove(i);
	}
	function additemtolocation (locationvalue)
	{  
		var opt = document.createElement("option");
		opt.text =locationvalue
		opt.value = locationvalue;
		document.getElementById("location").options.add(opt);       
	}
	function statusnameformatter(cellvalue, options, rowObject )
	{
			var druserid =$(rowObject).children()[1].firstChild.data;
			return '<image id="img_presence_'+druserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}
	function addtojabbercontact(userid)
	{
		var jid=createjid(userid);
		//addtocontact(jid);
	}
	$(document).ready(function(){ 
	
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
		$(".toggle_container").hide();	
		$("h3.trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("fast");
		});
		<?php
			if ($previousvalues != null && $previousvalues['city'] != null) { 
				echo "city_value('".$previousvalues['city']."');";
			}
		?>
		
	});
	

	function viewdotorprofile( cellvalue, options )
	{
		 var docuserid = 0;
        for(var i =0; i < options.rows.length; i++){
            if(options.rows[i].doctoruserid==cellvalue){
               docuserid = options.rows[i].doctoruserid;
            }
        }
		
		return'<a href="/ayushman/cdoctorprofile/displaytopatient?userid='+docuserid+'&back=cpatientfavoritedoctor" > View</a>'
	}
		function removedoctor( cellvalue, options )
	{
		 var docuserid = 0;
		 var docid = 0;
		 var userid = <?php echo $userid; ?>;
		 var urole = '<?php echo $urole; ?>';
		 
        for(var i =0; i < options.rows.length; i++){
            if(options.rows[i].doctoruserid==cellvalue){
               docuserid = options.rows[i].doctoruserid;
			   docid = options.rows[i].doctorid;
            }
        }		 
		
		return'<a href="/ayushman/cdoctordirectory/removefromfavorite?userid='+userid+'&doctorid='+docid+'&doctoruserid='+docuserid+'&role='+urole+'"> Remove </a>'
	}
	function Adddoctor( cellvalue, options )
	{
		 var docuserid = 0;
		 var docid = 0;
		 var userid = <?php echo $userid; ?>;
		 var urole = '<?php echo $urole; ?>';
		 
        for(var i =0; i < options.rows.length; i++){
            if(options.rows[i].userid==cellvalue){
			   docuserid = options.rows[i].userid;
			    docid = options.rows[i].doctorid;
            }
        }					
		return'<a href="/ayushman/cdoctordirectory/adddoctortofavorite?userid='+userid+'&doctorid='+docid+'&doctoruserid='+docuserid+'&role='+urole+'"> Add </a>'
	}
	function doctorprofile( cellvalue, options )
	{
		 var docuserid = 0;
        for(var i =0; i < options.rows.length; i++){
            if(options.rows[i].userid==cellvalue){
               docuserid = options.rows[i].userid;
            }
        } 		
		return'<a href="/ayushman/cdoctorprofile/displaytopatient?userid='+docuserid+'&back=cpatientfavoritedoctor"> View </a>'
	}
</script>
 <?php $result_json = json_encode($result); ?>
<script>
	// All jqgrid columns defined here and data selected in controller in an array
	
	jQuery(function($){
		$('#DTUpcomingAppointment').footable({							 		
		"columns" :[{"title":"Doctor id","align":"right","name":"doctorid","hidden":true,"visible":false,"align":"left"},
					{"title":"User id","name":"doctoruserid","hidden":true,"visible":false,"align":"left"},
					{"title":"Name","name":"doctorname","align":"left"},
					{"title":"Specialization","name":"specialization_c","align":"left"},
					{"title":"Qualification","name":"education_c","align":"left","breakpoints":"xs"},
					{"title":"City","name":"city_c","align":"left","breakpoints":"xs"},
					{"title":"Language","name":"languages_c","breakpoints":"xs"},
					{"title":"Exp(Yr)","name":"experience","align":"left","editable":true,"breakpoints":"xs"},
					{"title":"Profile","name":"doctoruserid","sortable":false,"align":"left","formatter":viewdotorprofile,"breakpoints":"xs"},
					{"title":"Action","name":"doctoruserid","align":"left","sortable":false,"formatter":removedoctor,"breakpoints":"xs"},],
			"rows":<?php echo $result_json ?>				
		});
	});
	 	      
	jQuery(function($){
		$('#Doctorsearch').footable({
			"columns": [
         		{"name":"doctorid","title":"Dotorid","visible":false,"width":100,"hidden":true},
				{"name":"doctorname","title":"Name"},
				{"name":"specialization_c","title":"Specialization"},
				{"name":"education_c","title":"Qualification","breakpoints":"xs"},
				{"name":"city_c","title":"City","breakpoints":"xs"},
				{"name":"languages_c","title":"Language","breakpoints":"xs"},
				{"name":"experience","title":"Exp(Yr)","breakpoints":"xs"},
				{"name":"userid","title":"Action","sortable":false,"formatter":Adddoctor,"breakpoints":"xs"},
				{"name":"userid","title":"Profile","sortable":false,"formatter":doctorprofile,"breakpoints":"xs"}				
			],
			"rows":<?php echo $searchresult_json;?>
		});
	});
</script>
 <style>

a:link {
    color: blue;
}

a:visited {
    color: blue;
}

a:hover {
    color: hotpink;
}

a:active {
    color: red;
}


</style>
</head>	
<body >
<div class="dignostic-container">
<!--<table width="100%">
		<tr>
			<td  class="Heading_Bg">&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/><strong>&nbsp;&nbsp;My Doctors</strong>
			</td>
        </tr>
</table>-->
<input type="hidden" id="editappid" name="editappid" value=""/>

<div class="demo-container hide-footable-sorting">
		<div class="tab-content">
			<div>
				<div class="tab-pane active" id="demo">
					<table id ="DTUpcomingAppointment" data-paging-size="10" data-paging-limit="" class="table" data-sorting="true" data-paging="true"></table>
				</div>
			</div>
		</div>
</div>

	
		
				<table width="100%" style="margin-bottom: 1px;">	
					<tr>
						<td width="160" class="Heading_Bg">&nbsp;
							<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7" /><strong>&nbsp;&nbsp;Search for Doctor</strong>
						</td>						
					</tr>
				</table>
		<div class="clearfix">&nbsp;</div>	
<div class="container" style="max-width: 950px;">
		<form id="doctorsearchform" name="doctorsearchform" action="searchbuttononclick" method="post" accept-charset="utf-8">
			<div class="row">			
				<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
							<input  name="textfield" style="width:99%" class="textarea" type="text"  placeholder="Name" value="<?php if ($previousvalues != null)if (isset($previousvalues['textfield'])) echo $previousvalues['textfield'];?>"  />
						</div>
						<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
										<select name="specialization"  class="textarea"  id="specialization" style="width:100%;"> 
											<option value="" selected="" >Specialization</option>
											<?PHP  
												foreach ($array_specialization as $specialization) {
												 $isselected = '';
						if ($previousvalues != null) {
							$isselected = ($previousvalues['specialization'] == $specialization) ? 'selected' : '';}
													print "<option  \" value=\"{$specialization}\" " . $isselected .">{$specialization}</option>";
												} 
											?>
										</select>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
									<select name="city"  id="city" class="textarea"  onchange="city_value(this.value)" style="width:100%;"> 
											<option value="">City</option>
											<?PHP  
												foreach ($array_city as $city) { 
													$isselected = '';
						if ($previousvalues != null) {
							$isselected = ($previousvalues['city'] == $city) ? 'selected' : '';}
												if($city != 'NA')										
													print "<option  \" value=\"{$city}\" " . $isselected .">{$city}</option>";
												} 
											?>
										</select>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
										<select name="location" class="textarea"  id ="location" style="width:100%;" >
											<option value="" selected=""  >Locality</option>
										</select>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
										<select name="language" class="textarea"  id="language" style="width:100%;"> 
											<option value="" selected="" >Language</option>
											<?PHP  
												foreach ($array_language as $language) { 
												$isselected = '';
						if ($previousvalues != null) {
							$isselected = ($previousvalues['language'] == $language) ? 'selected' : '';}
													if($language != 'N.A')											
														print "<option  \" value=\"{$language}\" " . $isselected .">{$language}</option>";
												} 
											?>
										</select>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
							
							<input type="submit" class="" style="margin-left: 15px; border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat; " value="" name="name"/>
						</div>
				
			</div>
		</form>
			
		</div>
		
		<div class="demo-container hide-footable-sorting">
					<div class="tab-content">
						<div>
							<div class=" tab-pane active" id="demo">
								<table id ="Doctorsearch" data-paging-size="10" data-paging-limit="" class="table tab1" data-sorting="true" data-paging="true"></table>
							</div>
						</div>
					</div>
				</div>
		
		<div style="display:none;">
			<div class="bodytext_normal" id="messagelistdiv">
				<?= Arr::path($message,'notremove'); ?>
			</div>
		</div>
</div>
</body>
</html>