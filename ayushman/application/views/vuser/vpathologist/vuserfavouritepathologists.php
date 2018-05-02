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

<script type="text/javascript">
	selectedRow = "";
	$(document).ready(function() {
		$('#move-up').click(moveUp);
		$('#move-down').click(moveDown);
		$(".lblchemist").each(function(index, element){
			$(this).text(index+1+". ");
		});
	});
	
	function RemovefromPanel(pid){
		$("body").css("cursor", "progress");
		$.ajax({
			url: "/ayushman/cpathologistdirectory/removefromfavorite?pid="+pid,
			success: function( data ) {
				location.reload();
			},
			error : function(){alert("error while setting priority");}					
		});	
	}
	function moveUp() {
		if(selectedRow == ''){
			alert('Please select Diagnostic center in the list');
		}
		if(!$(selectedRow).prev().hasClass('header')){
			$(selectedRow).insertBefore($(selectedRow).prev());
		}
		changePriority();
	}
	function select(row){
		selectedRow = row;
		$(row).siblings().removeClass('selecteditem');
		$(row).addClass('selecteditem');
	}
	function moveDown() {
		if(selectedRow == ''){
			alert('Please select Diagnostic center in the list');
		}
		if(!$(selectedRow).next().hasClass('footer')){
			$(selectedRow).insertAfter($(selectedRow).next());
		}
		changePriority();
	}
	function changePriority(){		
		$(".lblchemist").each(function(index, element){
			$(this).text(index+1+". ");
		});
		$(".hfchemistid").each(function(index,element) {
			$.ajax({
				url:"/ayushman/csettings/setpathologistpriority?index="+index+'&pathologist='+this.value,
				success: function( data ) {
					
				},
				error : function(){alert("error while setting priority");}					
			});	
		});
	}
	function alloworders(checkbox){
		
		var atLeastOneIsChecked = $('input[id="btnpermission"]:checked').length > 0;

		if(atLeastOneIsChecked == true){
			$('#move-up').show();
			$('#move-down').show();
			$('#Note').show();
			
		}else{
			$('#move-up').hide();
			$('#move-down').hide();
			$('#Note').hide();
		}
		
		$.ajax({
			url: "/ayushman/csettings/setDiagnosticLabpermission?permission="+atLeastOneIsChecked,
			success: function( data ) {
			},
			error : function(){alert("error while setting permission");}					
		});	
		changePriority();
	}
function city_value(val) {
	$.ajax({	
		 url: "/ayushman/cpathologistdirectory/selectlocation?city="+val,
			success: function(data) {
				var location =JSON.parse(data);
				for(var iter = document.pathologistsearchform.location.length -1; iter >= 0; --iter)
				{
				 removeItemInList(iter);
				}
				additemtolocation("Locality");
				for(i=0;i< location.length;i++)
				{
					var list = document.getElementById("location").options;
					additemtolocation(location[i]);
				}
			},
			error : function()
			{
				alert("error while selecting city tests");
			}					
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
function setavailability( cellvalue, options, rowObject )
{
	if(cellvalue == 'true')
	{
		return "Available";
	}
	else if(cellvalue == 'false')
	{
		return "Not Available";
	}
	else
	{
		return "NA";
	}
}
function statusnameformatter(cellvalue, options, rowObject )
	{
		var pathologistuserid =$(rowObject).children()[9].firstChild.data;
		return '<image id="img_presence_'+pathologistuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}	
</script>

<script type="text/javascript">
	jQuery.browser = {};
	(function () {
		jQuery.browser.msie = false;
		jQuery.browser.version = 0;
		if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
			jQuery.browser.msie = true;
			jQuery.browser.version = RegExp.$1;
		}
	})();
	var $j = $.noConflict(true);
	
	function addpathologist( cellvalue, options )
	{
		console.log("1");
		 var pathologistid = 0;
		 var pathologistuserid = 0;
		 var userid = <?php echo $userid; ?>;
		 var urole = '<?php echo $urole; ?>';
        for(var i =0; i < options.rows.length; i++){
            if(options.rows[i].pathologistuserid==cellvalue){
               pathologistid = options.rows[i].pathologistid;
			   pathologistuserid = options.rows[i].pathologistuserid;
            }
        }
	
		return'<a href="/ayushman/cpathologistdirectory/addtofavorite?userid='+userid+'&pid='+pathologistid+'&pathologistuserid='+pathologistuserid+'&role='+urole+'" > Add</a>'
	}
	
</script>
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
 <?php $searchresult_json = json_encode($resultgrid); ?>
<script>	      
	jQuery(function($){
		$('#Doctorsearch').footable({
			"columns": [
         		{"name":"pathologistid","align":"right","title":"Pathologistid","visible":false,"width":100,"hidden":true},
				{"name":"pathologistname","align":"left","title":"Name"},
				{"name":"city_c","title":"City","align":"left"},
				{"name":"location_c","title":"Locality","align":"left","visible":false},
				{"name":"testsoffered_c","title":"Tests offered ","align":"left","hidden":true,"visible":false},
				{"name":"workinghours_c","title":"Working Hours","align":"right","breakpoints":"xs"},
				{"name":"pickupfacility_c","align":"right","title":"Sample pickup facility","breakpoints":"xs"},
				{"name":"accreditation_c","align":"left","title":"Accreditation","breakpoints":"xs"},
				{"name":"pathologistuserid","align":"left","formatter":"addpathologist","title":"Action","sortable":false,"breakpoints":"xs"},
				{"name":"pathologistid","align":"right","title":"pathologistuserid","index":"pathologistuserid","hidden":true,"visible":false,"breakpoints":"xs"}				
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
<style>
	.col-1-5, .col-full {padding:0px;float:left; display: inline-block;font-family: tahoma,Helvetica,sans-serif;font-size: 13px;}
	.item:hover {background:#a6c9e2;}
	.col-1-5{width:20%;margin:0px;}
	.col-full{width:100%;}
	.item{padding:5px;color:#11587E;border-top: 1px solid #c5dbec;}
	.selecteditem{float:left; display: inline-block;font-family: tahoma,Helvetica,sans-serif;font-size: 13px;background:#a6c9e2;}
</style>
<div class="dignostic-container">
	<!--<table border="0" align="left" cellpadding="0" cellspacing="0" style=" width:100%">
		<tr>
			<td  class="Heading_Bg">&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/><strong>&nbsp;&nbsp;My Diagnostic Centers</strong>
			</td>
        </tr>
	</table>-->	
	<div class="" >
		<div class="row">			
			<div class="col-xs-12 col-sm-12 col-md-12">		
				<div id="selected-items" class="col-full bodytext_normal"  style="float:left;margin:10px;<?php if($urole == 'staff'){echo 'display:none';}?>">
					<input class="item" type="checkbox"  onclick="alloworders(this);"  <?php if($permission == 1){echo 'checked';}else{echo '';} ?> id="btnpermission" /><Label for="btnpermission" >Allow <i style="color:blue;">IndiaOnlineHealth</i> to place an order automatically to my following prefered Diagnostic center, when I finish consultation with My Doctor.</label>
				</div>
			</div>
		</div>		
		<div id="selected-items" class="col-full">
			<div class="row">		
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">						
					<div class="bodytext_error" style="margin:5px;" id="Note">Select a Diagnostic center in the list and set priority using '^' or 'v' button</div>
				</div>
			</div>
					<div id="selected-items-select" class="col-full">
						<div class="row">					
							<div class="col-full " style="min-height: 10px;font-weight: bold;padding: 5px;background: rgba(215, 222, 224,.2);color: black;text-align: left;">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">	
									<div>Diagnostic Center Name</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">	
									<div>Tests offered</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">		
									<div>Sample Pickup Facility</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">		
									<div>Area Covered</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">		
									Action
									<div style="float:right"><input type="button" title="Move Up"   id="move-up" value=" ^ " /></div>
								</div>
							</div>	
						</div>
						<?PHP  
							foreach ($pathologists as $pathologist) { 	
								print
									'<div onclick="select(this);" class="col-full item">'.
										'<div class="row">'.
											'<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'.
												'<div ><label class="lblchemist"></label>'.ucwords($pathologist->pathologistname).'</br>&nbsp;&nbsp;&nbsp;+91-'.$pathologist->number.'<input type="hidden" class="hfchemistid" value="'.$pathologist->pathologistid.'" /></div>'.
											'</div>'.
											'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.	
												'<div>'.(ucwords($pathologist->testsoffered_c)=='NA'?'-':ucwords($pathologist->testsoffered_c)).'</div>'.
											'</div>'.
											'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.	
												'<div>'.($pathologist->pickupfacility_c=='true'? 'Available':'Not Available').'</div>'.
											'</div>'.
											'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.												
												'<div >'.ucwords($pathologist->city_c).(ucwords($pathologist->areacovered) != ''?'&nbsp;('.ucwords($pathologist->areacovered).')':'').'&nbsp;</div>'.
											'</div>'.
											'<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'.	
												'<div >'.'<a href="javascript:void(0)" style="color:blue" onclick="RemovefromPanel('.$pathologist->pathologistid.')">Remove from Panel</a>'.'</div>'.
											'</div>'.
										'</div>'.
									'</div>';
							}
							if(count($pathologists) == 0){
								print
								'<div class="row">'.	
									'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">'.
										'<div style="text-align:center;" class="col-full item">No Diagnostic center in your panel. </div>';
									'</div>'.
								'</div>';
							}
						?>
						<div class="col-full footer">
							<div style="float:right">.
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">	
										<input type="button" title="Move Down" style="width: 27px;"  id="move-down" value=" v " />
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
	<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;margin-bottom: 1px;">
			
		<tr style="height:10px">
			<td width="160" style="height:10px" ><HR style="height:0.5px"/>
			</td>						
		</tr>
		<tr>
			<td width="950px;" class="Heading_Bg">&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7" /><strong>&nbsp;&nbsp;Search Diagnostic Centers</strong>
			</td>						
		</tr>			
	</table>
		<div class="clearfix">&nbsp;</div>	
		<div class="container" width="160" style="margin:10px;margin-top:10px;">
			<form id="pathologistsearchform" name="pathologistsearchform" action="searchbuttononclick" method="post" accept-charset="utf-8">
				<div class="row">			
					<div class="col-xs-6 col-sm-2 col-md-2" style=" padding-right: 1px; ">					
						<input class="textarea" style="width:99%" type="text" name="centername"   placeholder="Center Name" value="<?php if ($previousvalues != null)if (isset($previousvalues['centername'])) echo $previousvalues['centername'];?>" />
					</div>
					<div class="col-xs-6 col-sm-1 col-md-1" style=" padding-right: 1px; ">	
						<select name="city" class="textarea" style="width:99%" id="citylistbox" onchange="city_value(this.value)"> 
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
					<div class="col-xs-6 col-sm-2 col-md-2">		
						<select name="location" class="textarea" style="width:99%" id ="location" width="50px">
									<option value="">Locality</option>
								</select>
					</div>
					<div class="col-xs-6 col-sm-2 col-md-2">			
								<select name="workinghours" style="width:99%" class="textarea"   id ="workinghours" >
									<option value="0" <?php if($previousvalues != null)echo ( $previousvalues['workinghours']=='0')?'selected':''; ?> >Working hours</option>
									<option value="1" <?php if($previousvalues != null)echo ( $previousvalues['workinghours']=='1')?'selected':''; ?>>Day</option>
									<option value="2" <?php if($previousvalues != null){echo ( $previousvalues['workinghours']=='2')?'selected':''; }?>>Day-Night</option>
								</select>
					</div>
					<div class="col-xs-6 col-sm-2 col-md-2">	
						<select name="testsoffered" class="textarea"  style="width:99%" id ="testsoffered">
									<option value="">Tests Offered</option>
										<?PHP  
										foreach ($array_testsoffered as $testsoffered) { 
										 $isselected = '';
										if ($previousvalues != null) {
											$isselected = ($previousvalues['testsoffered'] == $testsoffered) ? 'selected' : '';}
																			if($testsoffered != 'NA')												
											print "<option  \" value=\"{$testsoffered}\" " . $isselected .">{$testsoffered}</option>";
										} 
									?>
								</select>
					</div>
					<div class="col-xs-6 col-sm-2 col-md-2" style=" padding-right: 1px; ">	
						<select name="accreditation" class="textarea" style="width:99%" id ="accreditation">
									<option value="" >Accreditation</option>
										<?PHP  
										foreach ($array_accreditation as $accreditation) 
										{ 
										$isselected = '';
										if ($previousvalues != null) {
											$isselected = ($previousvalues['accreditation'] == $accreditation) ? 'selected' : '';}
											if($accreditation != "NA")										
												print "<option  \" value=\"{$accreditation}\" " . $isselected .">{$accreditation}</option>";
										} 
									?>
								</select>
					</div>
					<div class="col-xs-6 col-sm-1 col-md-1 " style="float:right;">								
						<input type="submit" style="margin-left: 15px; border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat; " class=""   value="" name="name"/>
					</div>	
				</div>
			</form>
		</div>	
		<div class="demo-container hide-footable-sorting">
			<div class="tab-content">
				<div>
					<div class="tab-pane active" id="demo">
						<table id ="Doctorsearch" data-paging-size="10" data-paging-limit="" class="table" data-sorting="true" data-paging="true"></table>
					</div>
				</div>
			</div>
		</div>
</div>