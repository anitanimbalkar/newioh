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
		$('.select-btn').click(function() {
			$('html, body').animate({ scrollTop: 0 }, 1000);
			$('body').addClass('apply-modal-body')
		});
		$('#move-up').click(moveUp);
		$('#move-down').click(moveDown);
		$(".lblchemist").each(function(index, element){
			$(this).text(index+1+". ");
		});
	});
	function RemovefromPanel(chemistid){
		$("body").css("cursor", "progress");
		$.ajax({
			url: "/ayushman/cchemistdirectory/removefromfavorite?chemistid="+chemistid,
			success: function( data ) {
				location.reload();
			},
			error : function(){alert("error while setting priority");}					
		});	
	}
	function select(row){
		selectedRow = row;
		$(row).siblings().removeClass('selecteditem');
		$(row).addClass('selecteditem');
	}
	function moveUp() {
		if(selectedRow == ''){
			alert('Please select Chemist in the list');
		}
		if(!$(selectedRow).prev().hasClass('header')){
			$(selectedRow).insertBefore($(selectedRow).prev());
		}
		changePriority();
	}

	function moveDown() {
		if(selectedRow == ''){
			alert('Please select Chemist in the list');
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
			console.log(index + ' '+this.value);
			$.ajax({
				url: "/ayushman/csettings/setchemistpriority?index="+index+'&chemist='+this.value,
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
			url: "/ayushman/csettings/setpermission?permission="+atLeastOneIsChecked,
			success: function( data ) {
			},
			error : function(){alert("error while setting permission");}					
		});	
		changePriority();
	}
	function city_value(val) {
		$.ajax({
			url: "/ayushman/cchemistdirectory/selectlocation?city="+val,
			success: function( data ) {
				var location =JSON.parse(data);	
				for(var iter = document.chemistsearchform.location.length -1; iter >= 0; --iter)
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
			error : function(){alert("error while selecting Location");}					
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
		}else 
		if(cellvalue == 'false')
		{
			return "Not Available";
		}else
		{
			return "NA";
		}
	}	
	function statusnameformatter(cellvalue, options, rowObject )
	{
			var chemistuserid =$(rowObject).children()[10].firstChild.data;
			return '<image id="img_presence_'+chemistuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}
	function addchemist( cellvalue, options )
	{		
		 var chemistid = 0;
		 var chemistuserid = 0;
		 var userid = <?php echo $userid; ?>;
		 var urole = '<?php echo $urole; ?>';
        for(var i =0; i < options.rows.length; i++){
            if(options.rows[i].chemistid==cellvalue){
               chemistid = options.rows[i].chemistid;
			   chemistuserid = options.rows[i].chemistuserid;
            }
        }	
		return'<a href="/ayushman/cchemistdirectory/addtofavorite?userid='+userid+'&chemistid='+chemistid+'&chemistuserid='+chemistuserid+'&role='+urole+'" > Add</a>'
	}
</script>

<style>
	.col-1-5, .col-full {padding:0px;float:left; display: inline-block;font-family: tahoma,Helvetica,sans-serif;font-size: 13px;}
	.item:hover {background:#a6c9e2;}
	.col-1-5{width:20%;margin:0px;}
	.col-full{width:100%;}
	.item{padding:5px;color:black;border-top: 1px solid #c5dbec;}
	.header {min-height:10px;font-weight:bold;padding:5px;background:rgba(215, 222, 224,.2);color:black;text-align:left}
	.footer {min-height:10px;border-top:1px solid #c5dbec;border-bottom:1px solid #c5dbec;font-weight:bold;padding:5px;background:rgb(236, 248, 251);color:black;text-align:left}
	.selecteditem{float:left; display: inline-block;font-family: tahoma,Helvetica,sans-serif;font-size: 13px;background:#a6c9e2;}
</style>
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
		$('#Chemisttable').footable({
			"columns": [
         		{"name":"chemistuserid","align":"right","title":"chemistuserid","visible":false,"width":100,"hidden":true},
				{"name":"chemistid","align":"left","visible":false,"hidden":true,"title":"chemistid"},
				{"name":"medicalname","title":"Name","align":"left"},
				{"name":"city","title":"City","align":"left"},
				{"name":"location","title":"Locality","align":"left","breakpoints":"xs"},
				{"name":"workinghours","title":"Working Hours","align":"right","breakpoints":"xs"},
				{"name":"homedeliveryfacility","align":"right","title":"Home Delivery","breakpoints":"xs"},
				{"name":"WeeklyOffday","align":"left","title":"Weekly Off Day","breakpoints":"xs"},
				{"name":"chemistid","align":"left","title":"Action","sortable":false,"formatter":"addchemist","breakpoints":"xs"}				
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
<div style="padding:0px;" width="" class="dignostic-container" >
	<!--<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
		<tr>
			<td  class="Heading_Bg">&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/><strong>&nbsp;&nbsp;My Chemist</strong>
			</td>
        </tr>
	</table>-->
				
			<div >
					<div class="row">			
						<div class="col-xs-12 col-sm-12 col-md-12">								
							<div id="selected-items" class="col-full bodytext_normal"  style="float:left;margin:10px;<?php if($urole == 'staff'){echo 'display:none';}?>">
								<input class="item" type="checkbox"  onclick="alloworders(this);"  <?php if($permission == 1){echo 'checked';}else{echo '';} ?> id="btnpermission" /><Label for="btnpermission" >Allow <i style="color:blue;">IndiaOnlineHealth</i> to place an order automatically to my following prefered chemist, when I finish consultation with My Doctor.</label>
							</div>
						</div>
					</div>	
				
					<div class="row">		
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">		
							<div class="bodytext_error" style="margin:5px;" id="Note">Select a chemist in the list and set priority using '^' or 'v' button</div>
						</div>
					</div>	
					
					<div id="selected-items-select" class="col-full">
						<div class="row">					
							<div class="col-full header">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">	
										<div >Store Name</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
										<div >City</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
										<div >Home Delivery</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2  ">
										<div >Area Covered</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3   ">
										Action
										<div style="float:right"><input type="button" title="Move Up"  id="move-up" value=" ^ " /></div>
								</div>
							</div>
						</div>
			
						<?PHP  
								foreach ($chemists as $chemist) { 	
									print
										'<div onclick="select(this);" class="col-full item">'.
											'<div class="row">'.
												'<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'.	
													'<div ><label class="lblchemist"></label>'.ucwords($chemist->medicalname).'</br>&nbsp;&nbsp;&nbsp;+91-'.$chemist->chemistnumber.'<input type="hidden" class="hfchemistid" value="'.$chemist->chemistid.'" /></div>'.
												'</div>'.
												'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.
													'<div>'.ucwords($chemist->city).'</div>'.
												'</div>'.
												'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.
													'<div >'.($chemist->homedeliveryfacility=='true'? 'Available':'Not Available').'</div>'.
												'</div>'.
												'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'.
													'<div >'.ucwords($chemist->areacovered).'&nbsp;</div>'.
												'</div>'.
												'<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">'.
													'<div >'.'<a href="javascript:void(0)" style="color:blue" onclick="RemovefromPanel('.$chemist->chemistid.')">Remove from Panel</a>'.'</div>'.
												'</div>'.
										'</div>';
								}
								if(count($chemists) == 0){
									print
									'<div class="row">'.	
										'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">'.
											'<div style="text-align:center;" class="col-full item">No Chemist in your panel. </div>'.
										'</div>'.
									'</div>';
								}
							?>
							<div class="col-full footer">
								<div style="float:right">
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
				<td width="160" class="Heading_Bg">&nbsp;
					<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7" /><strong>&nbsp;&nbsp;Search for Chemist</strong>
				</td>						
			</tr>	
		</table>
		<div class="clearfix">&nbsp;</div>	
		<div class="container" width="100%" style="margin:10px;">				
			<form id="chemistsearchform" name="chemistsearchform" action="searchbuttononclick" method="post" accept-charset="utf-8">
				<div class="row">			
					<div class="col-xs-6 col-sm-3 col-md-3">					
						<input style="width:99%"  name="StoreName" class="textarea" style="margin-top:0px;"  type="text"  placeholder="Store Name" value="<?php if ($previousvalues != null)if (isset($previousvalues['StoreName'])) echo $previousvalues['StoreName'];?>"/>
					</div>
					<div class="col-xs-6 col-sm-2 col-md-2">	
								<select name="city"  style="width:99%"  class="textarea"  id="citylistbox" onchange="city_value(this.value)"> 
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
						<select name="location" style="width:99%" class="textarea"   id ="location">
							<option value="" >Locality</option>
						</select>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<select name="homedeliveryfacility" style="width:99%" class="textarea"   id ="homedeliveryfacility">
								<option value="" <?php if($previousvalues != null)echo ( $previousvalues['homedeliveryfacility']=='')?'selected':''; ?> selected="">Home Delivery Facility</option>
								<option value="true" <?php if($previousvalues != null)echo ( $previousvalues['homedeliveryfacility']=='true')?'selected':''; ?>  >Available</option>
								<option value="false" <?php if($previousvalues != null)echo ( $previousvalues['homedeliveryfacility']=='false')?'selected':''; ?>  >Not Available</option>
						</select>
					</div>
					<div class="col-xs-6  col-sm-2 col-md-2">							
						<input type="submit"  style="margin-left: 15px; border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat; " class="" value="" name="name"/>
					</div>	
				</div>
			</form>
		</div>
	<div class="demo-container hide-footable-sorting">
			<div class="tab-content">
				<div>
					<div class="tab-pane active" id="demo">
						<table id ="Chemisttable" data-paging-size="10" data-paging-limit="" class="table" data-sorting="true" data-paging="true"></table>
					</div>
				</div>
			</div>
		</div>
</div>