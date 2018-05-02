<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<!-- START: Pooja Gujarathi-->
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

<style type="text/css">
@media only print
{ 
  #btn4 {display: none !important; 
  }
  #btn1 {display: none !important; 
  }
  #btn2 {display: none !important; 
  }
   #btn3 {display: none !important; 
  }
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	//$('#payment_mode').val(0);
 	$('#service_provide').val(1);
             $('#addressid').val($('input[name="homeid"]').val());

		// calculatetotalfees();
$(function() {
			$( "#testdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy ',minDate:0});
		});
		if("<?= count($tests);?>"== "0")
		{
			$("#checkoutbutton").hide(true);
			window.location = "";
		}
		$('#addtonetwork').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "421px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		
		$('#ordersuccessfull').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "621px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$(".ui-dialog-titlebar").hide();
	});
	function getfeesfortestid(select,id,testname,testrownumber)
	{
	var  errmsg = $('#laberr').html();
		$.ajax({
			url: "/ayushman/cpatientrequistiontests/gettestfee?testid="+id+"&pathologistid="+$(select).val(),
			success: function( data ) {
				if(data=="Not provided")
				{
					$('#'+testrownumber+'labtestfees'+id).text("Not provided");
					if($('#'+testrownumber+'err'+id).html() == null )
					{
						$('#laberr').html(errmsg+"<div id='"+testrownumber+"err"+id+"'>&bull;&nbsp;Please select other Chemist center for "+testname+'</div>');	
					}
				}
				else
				{
					$('#'+testrownumber+'labtestfees'+id).text(Number(data).toFixed(2));
					if($('#'+testrownumber+"err"+id) != null )//if error div is present for that test then delete it.
					{
						$('#'+testrownumber+"err"+id).remove();
					}
				}
				//calculatetotalfees();
			},
			error : function(){alert("something has gone wrong. Could not retrieve fees for the test. Please contact system administrator.");}
		});
	}
	
	
	function removetest(rownumber,testid,testname)
	{
		showMessage('250','50','Remove test','Do you really want to remove test '+testname+' ?','confirmation','confirmRemoveTest');
		$("#removetestrownumber").val(rownumber);
		$("#removetestid").val(testid);
			
	}
	
	function Confirmation_Event(id,confirmation)
	{
		if(id == 'confirmRemoveTest'){
			if(confirmation == 'yes'){
				removeselectedtest();	
			}
		}
	}
	
	function removeselectedtest()
	{
		var rownumber = $("#removetestrownumber").val();
		var testid=  $("#removetestid").val();
		$.ajax({
			url: "/ayushman/cpatientmedicinesorder/removetest?testid="+testid+"&rownumber="+rownumber,
			success: function( data ) {
				parent.getcontent('/ayushman/cpatientmedicinesorder/viewmycart');
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});
	}
	
	function checkoutonclick()
	{
		var radiobtn=document.getElementById("service_provide").value;
		var testdate=document.getElementById("testdate").value;
		var addressid=document.getElementById("addressid").value;
		var selectchem=document.getElementById("selectchem").value;
		var addtest = new Array();
		var j=0;
		<?php $i=0;foreach($tests as $test) { ?>
			var id= "<?php echo $i.'select'.$test['id'] ?>" ;
			addtest[j] = new Array(2);
			addtest[j][0] = "<?php echo $test['cartid']; ?>";
			addtest[j][1] = "<?php echo $test['qty']; ?>";
			j++;
			<?php $i++; ?>	
		<?php } ?>
		if($('#checkoutbutton').val() =="Recharge")
		{
			var currentlocation = escape(window.location);
			$.ajax({
				  url: '/ayushman/cpatientmedicinesorder/setfollowuplink?currentlocation='+currentlocation ,
				  success: function( data ) {
				  		window.location= '/ayushman/cpatientmedicinesorder/ordertest?test='+JSON.stringify(addtest)+'&radiobtn='+radiobtn+'&testdate='+testdate+'&addressid='+addressid+'&selectchem='+selectchem;
					},
					error : function(){showMessage('550','200','Recharge',"Error occured while redirecting to recharge page. Please contact system administrator",'error','id');}
			}); 
		}
		else
		{
			if(($('#checkoutbutton').val() =="Proceed to checkout")&& ($('#laberr').html() ==""))
			{
				// var check = addtofavcheck();
				// if(check == "open"){
					
				// }
				if(selectchem==0)
				{
					alert("Select Drug Store")
					$("#selectchem").focus();
					return false;
				}
				else
				{
					parent.pagebusy();
					$.ajax({
				  		url: '/ayushman/cpatientmedicinesorder/ordertest?test='+JSON.stringify(addtest)+'&radiobtn='+radiobtn+'&testdate='+testdate+'&addressid='+addressid+'&selectchem='+selectchem,
				  		success: function( data ) {
				  			var ordertests =  eval('('+data+')');
				  			jQuery('#successfullpopupinfo').html('');	
				  			for(var i = 0;i<ordertests.length;i++)
							{
								var d = new Date(ordertests[i]["reqdate"]);
   								 var da = d.getDate();                       //day
    							var mon = d.getMonth() + 1;                 //month
   							 	var yr = d.getFullYear();
     							months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    							var monName = months[d.getMonth()];         //month Name
    							var thisDay = da + " " + monName + " " + yr;    //full date show
                   //year
                   //alert(thisDay);
                   				reqdate=thisDay;
				  				orderid=ordertests[i]["id"];
				  				$('#reqdate').text(reqdate);
				  				$('#reqid').text(orderid);
				  				//alert($('#reqid').text(orderid));
				  				// var labservicecharges= Number($('#labtesttotalfees').text()) + Number($('#servicechargePopupTotal').text());
				  				// $('#successfullPopupTotal').text(Number(labservicecharges).toFixed(2));
				  				$('#ordersuccessfull').dialog('open');
				  				//element = $('<div class="bodytext_normal">');
				  				var textinfomation ='<tr class="medicine-checkout-row">' +
									'<td width="19%" class="bodytext_wrap bodytext_normal">'+(i+1)+'. '+ordertests[i]["testname"]+'</td>' +
									'<td width="18%" class="bodytext_normal">'+reqdate+'</td>' +
									'<td width="13%" class="bodytext_normal">'+ordertests[i]["qty"]+'</td>' +
									'<td width="17%" class="bodytext_normal">' + '<div class="bodytext_normal">'+ordertests[i]["centername"]+'</div>' + '</td>' +
									'<td width="13%" class="bodytext_normal">' + '<div class="bodytext_normal">Not Available</div>' +	'</td>' +
									'<td width="16%" class="bodytext_normal">' + '<div class="bodytext_normal">Not Available</div>' + '</td>' +
									'</tr>';
								//element.appendTo('#successfullpopupinfo');
								$(textinfomation).appendTo('#successfullpopupinfo');
				  			}
							parent.pageloaded();

						},
						error : function(){showMessage('550','200','Recharge',"Error occured while ordering tests. Please contact system administrator",'error','id');parent.pageloaded();}
					});
					
				}
				
			 }
			// else
			// {
			// }
		}
	}


function removeOrdersPrescription( cellvalue, options )
{
	$('html, body').animate({ scrollTop: 0 }, 1000);
	$('body').addClass('apply-modal-body');
	var rownumber = 0;
	var testid = 0;
	var testname = "";
	for(var i =0; i < options.rows.length; i++){
		string = '';
		if(options.rows[i].id==cellvalue){
			rownumber = i;
			testname = options.rows[i].testname;
			testid = cellvalue;
			setid = i+"remove"+testid;
			var quote_testid =  "'" + testid + "'";
			var quote_testname =  "'" + testname + "'";
		}
		string = string + '<img src="/ayushman/assets/images/Remove_Icon.png" width="22" height="20" id="'+setid+'" class="select-btn" onclick="removetest('+rownumber+','+ quote_testid +','+quote_testname+')"  />';
		$('.select-btn').click(function() {
			$('html, body').animate({ scrollTop: 0 }, 1000);
			$('body').addClass('apply-modal-body')
		});
	}
	return string;
}

	function addtofavcheck()
	{
		jQuery('#newpathologistlist').html('');
		var arr_pathologist=<?= json_encode($arr_favoritepathologist); ?>;
		//alert(<?= json_encode($arr_favoritepathologist); ?>);
		var arr_addNetworkPathologist = new Array();
		var arr_selectedpathologist=new Array();
		//get all selected pathologist id
		var i=0;
		<?php $j=0;foreach($tests as $test) {?>
			var selectid= "<?php echo $j.'select'.$test['id'] ?>" ;
			var pathid =$("#"+selectid).val();
			var dropdownlist = document.getElementById(selectid);
			var centername = dropdownlist.options[dropdownlist.selectedIndex].text;
			arr_selectedpathologist[i] = new Array(2);
			arr_selectedpathologist[i][0]= pathid;
			arr_selectedpathologist[i][1]= centername;
			i++;
		<?php $j++; }?>
		//store unique selectedpathologist Ids in this array.
		uniquearrayOfselectedpathologistIds=new Array();
		var j=0;
		for(var i=0;i<arr_selectedpathologist.length;i++)
		{
			var result =findValuePresentinarray(uniquearrayOfselectedpathologistIds,arr_selectedpathologist[i][0]);
			if(result != "true")
			{
				uniquearrayOfselectedpathologistIds[j] = new Array(2);
				uniquearrayOfselectedpathologistIds[j][0]= arr_selectedpathologist[i][0];
				uniquearrayOfselectedpathologistIds[j][1]= arr_selectedpathologist[i][1];
				j++;
			}
		}

		//check which pathologist in favorite list	if not in favorite then add that pathologist in "arr_addNetworkPathologist" 
		var j=0;
		for(var i=0 ;i<uniquearrayOfselectedpathologistIds.length;i++) {
			if(arr_pathologist.indexOf(uniquearrayOfselectedpathologistIds[i][0]) > -1){
			}
			else
			{
				arr_addNetworkPathologist[j]=new Array(2);
				arr_addNetworkPathologist[j][0]= uniquearrayOfselectedpathologistIds[i][0];
				arr_addNetworkPathologist[j][1]= uniquearrayOfselectedpathologistIds[i][1];
				j++;
			}
		}
		//create unique arr_addNetworkPathologist array
		uniquearrayOfaddNetworkPathologistIds=new Array();
		var j=0;
		for(var i=0;i<arr_addNetworkPathologist.length;i++)
		{
			var result =findValuePresentinarray(uniquearrayOfaddNetworkPathologistIds,arr_addNetworkPathologist[i][0]);
			if(result != "true")
			{
				uniquearrayOfaddNetworkPathologistIds[j] = new Array(2);
				uniquearrayOfaddNetworkPathologistIds[j][0]= arr_addNetworkPathologist[i][0];
				uniquearrayOfaddNetworkPathologistIds[j][1]= arr_addNetworkPathologist[i][1];
				j++;
			}
		}
		for(var j=0;j<uniquearrayOfaddNetworkPathologistIds.length;j++) {
				var centername = uniquearrayOfaddNetworkPathologistIds[j][1];
				element = $('<div class="bodytext_normal" >');
				var textinfomation = '<td height="30px" width="200px"  class="bodytext_normal">'+(j+1)+' ) &nbsp;&nbsp;'+centername+'</td><td width="200px" class="bodytext_normal"><input type="checkbox" id="'+j+'checkbox'+uniquearrayOfaddNetworkPathologistIds[j][0]+'" value="checkbox" checked="true" /><input type="hidden" id="'+j+'pathologistid"/></td></div>';
				element.appendTo('#newpathologistlist');
				$(textinfomation).appendTo(element);
				document.getElementById(j+"pathologistid").value = uniquearrayOfaddNetworkPathologistIds[j][0];
			}
		//document.getElementById("addpathologistcount").value= uniquearrayOfaddNetworkPathologistIds.length;
		if(uniquearrayOfaddNetworkPathologistIds.length !=0)
		{
			$('#addtonetwork').dialog('open');
			return "open";
		}
		else
		{
			return "close";
		}
					
	}
	
	function findValuePresentinarray(arr, value)
	{	
		if(arr.length !=0)
		{
			for(var i = 0; i < arr.length; i++) {
				if(arr[i][0] === value) { 	
					return "true";
					break;
				}
			}
		}
		else
	    	return "false";
	}
	function closepopup(name)
	{
		$('#'+name).dialog('close');
	}
	
	function addpathologist()
	{
		var count=document.getElementById("addpathologistcount").value;
		var arr_pathologistId = new Array();
		for(var j=0;j<count;j++) {
			var pathid= document.getElementById(j+"pathologistid").value ;
			if($("#"+j+"checkbox"+pathid).is(':checked'))
			{
				arr_pathologistId.push(pathid);
			}
		}


		$.ajax({
			  url: '/ayushman/cpatientmedicinesorder/addnewpathologist?arr_pathologistId='+JSON.stringify(arr_pathologistId) ,
			  success: function( data ) {
					parent.getcontent('/ayushman/cpatientmedicinesorder/viewmycart');
				},
				error : function(){showMessage('550','200','Add Chemist Center',"Error occured while adding Chemist Center in your network. Please contact system administrator",'error','id');}
		});
 }

	 function Popup(data) 
		{
			var mywindow = window.open('', 'print','height=768,width=1024');
			mywindow.document.write('<html><head>');
			mywindow.document.write('</head><body style="font-size:14px;">');
			mywindow.document.write(data);
			mywindow.document.write('</body></html>');
			
			mywindow.print();
			mywindow.close();
			return true;
		}
	 function printElem()
	 {
		$(".button").hide();
		Popup($('#ordersuccessfull').html());
		window.location='/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription';
	 }
	 function opentests(orderid)
	{
		if(orderid != 'Order Not Placed')
		document.getElementById('orderid').value = orderid;
		else
			document.getElementById('orderid').value = '';
		document.getElementById('appointmentid').value = appointmentid;
		$('#popup').dialog('open');
		assignchemist();
	}
function openaddpopup()
	{
		<?php $j=0;foreach($tests as $test) {?>
			var medid= "<?php echo $test['id'] ?>" ;
			
		<?php $j++; }?>
		
				//document.getElementById('orderid').value = orderid;
				alert("In function",medid);
		jQuery('#testinfo').html('');
		jQuery('#laberr').html('');
		$.ajax({
		  url: "/ayushman/cpatientmedicinesorder/getmedicineusingid?medid="+medid,
			success: function( data ) {
				var recommenedtests =  eval('('+data+')');
				var errmsg= "";	
				for(var i = 0;i<recommenedtests.length;i++)
				{
					var arraypathologistinfo= recommenedtests[i]["pathologistList"];	
					var testname= "'"+recommenedtests[i]["testname"]+"'";

					select = '<select autofocus="autofocus" id="'+i+'select'+recommenedtests[i]["id"]+'" style="width:150px;font-size:9pt;">'
					select = select +'<option style="font-size:9pt;" value="" >Select Chemist center</option>';
					for (var j=0; j<arraypathologistinfo.length; ++j) 
					{	
						var pathoid =arraypathologistinfo[j]['centerid'];
					    var pathoname=arraypathologistinfo[j]['centername'];

						if(pathoid== recommenedtests[i]["pathologistid"])
							select = select +'<option style="font-size:9pt;"  selected="selected" value='+pathoid+'>'+pathoname+'</option>';
						else
							select = select +'<option style="font-size:9pt;" value='+pathoid+'>'+pathoname+'</option>';	
					}
					select = select + '</select>';
					var textinfomation = "<tr><td width='37%;' class='bodytext_bold' align='left' id='"+i+"testname"+recommenedtests[i]["id"]+"' >"+recommenedtests[i]["testname"]+"</td></tr><tr><td>&nbsp;</td></tr><tr><td width='35%' class='bodytext_normal' align='left' >"+select+"</td></tr><tr><td width='1%' height='27px' >&nbsp;</td><td width='7%' height='27px' >&nbsp;</td></tr>";
					element = $("<table id='"+recommenedtests[i]["id"]+"'  style='margin-top:10px;margin-bottom:10px;width:500px;'  /><input type='hidden' id='"+i+"medid' name='"+i+"medid' />");
					element.appendTo('#testinfo');
					$(textinfomation).appendTo(element);
					document.getElementById(i+"medid").value = recommenedtests[i]["id"];
					errmsg =$('#laberr').html();
				}	
				document.getElementById("testsnumber").value =recommenedtests.length;
			},
			error : function()
			{
				showMessage('250','50','Errors',"Error while adding Chemist Tests. Please try again",'error','errordialogboxid');
			}
		});
		$('#addpopup').dialog('open');
	}

	$(document).ready(function(){
		$('#addpopup').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "550",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#address').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "550",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		
		$('#officeadd').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "550",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});


		$('#othersadd').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "550",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false,
			buttons:{
				"Save": function() {
										$('#addwcountry').focus(function(){
				var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and country_c";
				$("#addwcountry").autocomplete({source: urlcountry});
			});
			$('#addwstate').focus(function(){
				var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and state_c";
				$("#addwstate").autocomplete({source: urlstate});
			});
			
			$('#addwcity').focus(function(){
				var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("addwstate").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and city_c";
				$("#addwcity").autocomplete({source: urlcity});
			});

			$('#addwpin').focus(function(){
				var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%')  and (country_c like '"+document.getElementById("addwcountry").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and pincode_c";
				$("#addwpin").autocomplete({source:urlpin});
			});

	var addwcountry = new LiveValidation('addwcountry',{onlyOnSubmit: false });
	addwcountry.add( Validate.Presence );
	addwcountry.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addwstate = new LiveValidation('addwstate',{onlyOnSubmit: false });
	addwstate.add( Validate.Presence );
	addwstate.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var locality = new LiveValidation('locality',{onlyOnSubmit: false });
	locality.add( Validate.Presence );
	locality.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addhline1 = new LiveValidation('addwline1',{onlyOnSubmit: false });
	addhline1.add( Validate.Presence );
	addhline1.add( Validate.Format, { pattern: /^[a-zA-Z0-9_ ]+$/,failureMessage: "only characters allowed"} );
	
	var addwcity = new LiveValidation('addwcity',{onlyOnSubmit: false });
	addwcity.add( Validate.Presence );
	addwcity.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addhpin = new LiveValidation('addwpin', {onlyOnSubmit: false });
	addhpin.add( Validate.Numericality, {onlyOnSubmit: false } );
	addhpin.add( Validate.Presence );
	addhpin.add( Validate.Length, { is: 6 });
	
	var mobilenumber = new LiveValidation('mobilenumber',{onlyOnSubmit: false });
	mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
	mobilenumber.add( Validate.Length, { is: 10 });
	mobilenumber.add( Validate.Presence );
	mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
	
	if(addwcity.validate() && addhpin.validate() && mobilenumber.validate() && addwstate.validate()  && addhline1.validate() && locality.validate()){//&& contactnumber.validate()){

				$.ajax({
						url: "/ayushman/cpatientmedicinesorder/addnewaddress",
						data: $("#othersform").serialize(),
						type:'POST',
						success:  function(data) {
							//alert(data);
				          document.getElementById("addressid").value=data;
				          	 		$( "#othersadd" ).dialog('close');

							 },
				});
			}
		  }
		}
		 });
		
	});

	function showstep()
	   {
	   	$( "#testdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy ',minDate:0});
	   }
	   function openpopup()
	   {
	 		$( "#address" ).dialog('open');
	   }
function setservice(value){
		
	if(value==1){
          $('#service_provide').val($('input[name="radiobtn"]:checked').val());
	}
	else{
          $('#service_provide').val($('input[name="radiobtn"]:checked').val());

	}
}

function selectlocation(value){
		var homeid=document.getElementById("homeid").value;
		var officeid=document.getElementById("officeid").value;

	if(value==1){
 		  $( "#address" ).dialog('open');
          $('#setlocation').val($('input[name="radiobtn"]:checked').val());
          document.getElementById("addressid").value=homeid;

	}
	else if(value==0){
    	  $( "#officeadd" ).dialog('open');
          $('#setlocation').val($('input[name="radiobtn"]:checked').val());
          document.getElementById("addressid").value=officeid;
	}
	else{
       	   $( "#othersadd" ).dialog('open');
		   $('#setlocation').val($('input[name="radiobtn"]:checked').val());
           //document.getElementById("addressid").value=othersid;

	    }
}
function saveqty(testid,qty){
	
		       testid1=document.getElementById(testid).value;

	// alert(testid1);
	// alert(qty);
	 $.ajax({
			  url: '/ayushman/cpatientmedicinesorder/saveqty?qty='+qty+'&testid='+testid1,
			  success: function( data ) {
					//parent.getcontent('/ayushman/cpatientmedicinesorder/viewmycart');
				},
				error : function(){showMessage('550','200','Add Chemist Center',"Error occured while adding Chemist Center in your network. Please contact system administrator",'error','id');}
		});
}
$(document).ready(function() {

			
			$('#addwcountry').focus(function(){
				var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and country_c";
				$("#addwcountry").autocomplete({source: urlcountry});
			});
			$('#addwstate').focus(function(){
				var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and state_c";
				$("#addwstate").autocomplete({source: urlstate});
			});
			
			$('#addwcity').focus(function(){
				var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("addwstate").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and city_c";
				$("#addwcity").autocomplete({source: urlcity});
			});

			$('#addwpin').focus(function(){
				var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%')  and (country_c like '"+document.getElementById("addwcountry").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and pincode_c";
				$("#addwpin").autocomplete({source:urlpin});
			});

	var addwcountry = new LiveValidation('addwcountry',{onlyOnSubmit: false });
	addwcountry.add( Validate.Presence );
	addwcountry.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addwstate = new LiveValidation('addwstate',{onlyOnSubmit: false });
	addwstate.add( Validate.Presence );
	addwstate.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var locality = new LiveValidation('locality',{onlyOnSubmit: false });
	locality.add( Validate.Presence );
	locality.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addhline1 = new LiveValidation('addwline1',{onlyOnSubmit: false });
	addhline1.add( Validate.Presence );
	addhline1.add( Validate.Format, { pattern: /^[a-zA-Z0-9_ ]*$/,failureMessage: "only characters allowed"} );
	
	var addwcity = new LiveValidation('addwcity',{onlyOnSubmit: false });
	addwcity.add( Validate.Presence );
	addwcity.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addhpin = new LiveValidation('addwpin', {onlyOnSubmit: false });
	addhpin.add( Validate.Numericality, {onlyOnSubmit: false } );
	addhpin.add( Validate.Presence );
	addhpin.add( Validate.Length, { is: 6 });
	
	var mobilenumber = new LiveValidation('mobilenumber',{onlyOnSubmit: false });
	mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
	mobilenumber.add( Validate.Length, { is: 10 });
	mobilenumber.add( Validate.Presence );
	mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
	

	// var email = new LiveValidation('email');
	// email.add( Validate.Email );
	
});
</script>
<script>
	$( document ).ready(function() {
		$('.select-btn').click(function() {
			$('body').addClass('apply-modal-body')
		});
	});
</script>
<div style="width:100%;height:560px;" class="dignostic-container">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="100%" class="Heading_Bg">&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/><strong>&nbsp;&nbsp;Requested Items</strong>
			</td>
		</tr>
	</table>
	<div class="clearfix">&nbsp;</div>
	<div class="demo-container hide-footable-sorting">
		<div class="tab-content">
			<div>
				<div class="tab-pane active" id="demo">
					<table data-paging-limit="3" id ="MedicineOrderFromPrescriptionCart" data-paging-size="5" data-paging-limit="3" class="table" data-sorting="true" data-paging="true" style="margin-bottom: 0px !important;"></table>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table_roundBorder">
		<tr>
			<td align="left" valign="top" style="padding:0px; border:none;">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="checkout">
					<tr valign="middle" >
						<td class="bodytext_bold" style="border:0px;">
							<table width="100%" align="center" cellpadding="0" cellspacing="0" class="checkout-table">
								<tr>
									<td class="bodytext_bold">Total service provider's fee (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="labtesttotaloriginalfees">0</lable>&nbsp;</td>
								</tr>
								<tr>
									<td class="bodytext_bold">Total discount (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="labtesttotaldifffees">0</lable>&nbsp;</td>
								</tr>
								<tr>
									<td class="bodytext_bold">Total service provider's fee with discount (Rs.)</td>
									<td class="bodytext_bold">&nbsp;&nbsp;<lable id="labtesttotalfees">0</lable>&nbsp;</td>
								</tr>

								<tr>
									<td class="bodytext_bold">Service Tax </br>(% on service provider's fees) (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="servicetaxonfees"></lable>&nbsp;</td>
								</tr>

								<tr>
									<td class="bodytext_bold">Online service Charges (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="labservicecharges"></lable>&nbsp;</td>
								</tr>
								<tr>
									<td class="bodytext_bold">Service Tax </br>(% on service charges) (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="servicetaxonservicecharges"></lable>&nbsp;</td>
								</tr>

								<tr>
									<td class="bodytext_bold">Total Amount Due (Rs.)</td>
									<td class="bodytext_bold">&nbsp;&nbsp;<lable id="amountdue">0</lable>&nbsp;</td>
								</tr>

								<tr>
									<td class="bodytext_bold">Current Balance (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="labcurrentBalance" ></lable>&nbsp;</td>
								</tr>
								<tr>
									<td class="bodytext_bold" style="padding: 5px;">
										<div class="select-chem">
											<select name="select" id="selectchem" style="width:170px;"  >
												<option style="font-size:9pt;" value="0" class="bodytext_bold">Select Chemist center</option>
												<?PHP

												foreach ($test['pathologistList'] as $pathologist) {

													print "<option  \" value=\"{$pathologist['centerid']}\">{$pathologist['centername']}</option>";
												}
												?>
											</select>
										</div>
										<div style="padding-top: 5px;">Balance after Transfer (Rs.)</div>
									</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="labBalanceAfterttran">0</lable>&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
  	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table_roundBorder checkout">
		<tr valign="middle" >
			<td class="bodytext_bold" style="border:0; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">
				<table width="100%" border="0"  cellpadding="0" cellspacing="0"  class="">
					<tr>
						<div id="contentdiv" style="max-height:200px;overflow-y:auto;overflow-x:hidden;" >
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #a8c8d9;" >
                                <tr class="medicinecheckout-footer-form" style='background-color:#ecf8fb;border-bottom:1px solid #a8c8d9;'>
                                    <td class="bodytext_bold padding-10" align="left">
                                        <div style='background-color:#ecf8fb;float:left;margin-left:10px;' >REQUEST DELIVERY DATE</div>
                                    </td>
                                    <td class='bodytext_bold padding-10' align='left'>
                                        <input type='radio' id='atcenter' name='radiobtn' value=1 checked onclick="setservice(this.value);"/>
                                        <lable>Immediate</lable>
                                    </td>
                                    <td class='bodytext_bold padding-10' align='left'>
                                        <input type='radio' id='other' name='radiobtn'  value=0  onclick="setservice(this.value);" />
                                        <lable>Later</lable>
                                    </td>
                                    <td class="padding-10">
                                        <div>
                                        <input id='testdate' onclick="showstep();" value='<?php echo date('d M Y');?>'>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="medicinecheckout-footer-form" style='background-color:#ecf8fb;border-bottom:1px solid #a8c8d9;'>
                                    <td class="bodytext_bold padding-10" align="left">
                                        <div style='margin-left:10px;'>LOCATION</div>
                                    </td>
                                    <td class='bodytext_bold padding-10' align='left'>
                                        <input type='radio' id='home' name='location_radio' value=1 checked onclick="selectlocation(this.value);" class="select-btn"/>
                                        <lable>Home</lable>
                                    </td>
                                    <td class='bodytext_bold padding-10' align='left'>
                                        <input type='radio' id='office' name='location_radio'  value=0  onclick="selectlocation(this.value);" class="select-btn" />
                                        <lable>Office</lable>
                                    </td>
                                    <td class='bodytext_bold padding-10' align='left'>
                                        <input type='radio' id='homevisit' name='location_radio'  value=2  onclick="selectlocation(this.value);" class="select-btn"/>
                                        <lable>Other</lable>
                                    </td>
                                </tr>
								<tr>
									<td colspan="4">
										<lable id="laberr"></lable>
									</td>
								</tr>
								<tr class="medicinecheckout-footer-form" style='background-color:#ecf8fb;'>
									<td colspan="2">
										<input type='hidden' id='removetestrownumber' name='removetestrownumber' />
										<input type='hidden' id='removetestid' name='removetestid' />
										<label>* No home delivery charges.</label>
										</br>
										<label>* Contact Drug store for current prices.</label>
									</td>
									<td colspan="2" style="text-align: right;">
										<a href="<?= $referer;?>">
											<input id="backbutton" value="Back" class="button"   style="height:25px; margin-top: 5px;width: 80px;"  align="center"  readonly="readonly"  />
										</a>
										<input id="checkoutbutton" value="Proceed to checkout" class="button select-btn" style="height:25px;outline:none;margin-top: 5px;width: 160px;margin-right:5px;"  align="center" onclick="checkoutonclick()" readonly="readonly"  />
									</td>
								</tr>
						    </table>
                        </div>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div class="clearfix" style="margin-bottom:50px;">&nbsp;</div>

	<div id="addtonetwork" style="overflow-y:hidden;overflow-x:hidden;height:auto;" >
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder" height="auto" >
			<tr>
				<td width="7%" height="25" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="30%" align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;"> Add to My Network</td>
				<td width="63%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="closepopup('addtonetwork');"/></td>
			</tr>
			<tr>
				<td height="35" align="center" valign="middle">&nbsp;</td>
				<td colspan="2" align="left" valign="middle" class="bodytext_normal">Do you want to add Chemist Center in your network ?</td>
			</tr>
			<tr >
				<td height="40" align="center" valign="middle"><input type="hidden" id="addpathologistcount"/>&nbsp;</td>
				<td colspan="2" align="left" valign="middle" class="bodytext_normal" style="max-height:200px;overflow-y:auto;overflow-x:hidden;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr id="newpathologistlist" >
							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="50" colspan="3" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">		
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="69%">&nbsp;</td>
							<td width="14%" height="30px;" align="right" valign="middle"  >
								<input id="checkoutbutton" value="Yes" class="button" style="height:25px;outline:none;width:60px;"  align="center" onclick="addpathologist();" readonly="readonly"  /></td>
							<td width="15%" height="30px;" align="right" valign="middle">
								<input id="checkoutbutton" value="No" class="button" style="height:25px;outline:none;width:60px;"  align="center" onclick="closepopup('addtonetwork')" readonly="readonly"/></td>
						</tr>
					</table>
				</td>
			</tr>
	  </table>
	</div>
	<div id="ordersuccessfull" style="overflow-y:hidden;overflow-x:hidden;height:auto;" class="dignostic-checkout-popup">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td height="25" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-left:5px;width: 30px;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/> </td>
				<td align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;"> Order Successfully Placed </td>
				<td align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">&nbsp;</td>
			</tr>
		</table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td height="40" colspan="3" align="left" valign="middle" class="bodytext_bold" style="padding-left:5px;">Req Date:&nbsp;<label class="bodytext_normal" id="reqdate"></label></td>
				<td colspan="3" align="left" valign="middle" class="bodytext_bold" style="padding-left:5px;">&nbsp;&nbsp;Req. Id.:&nbsp; <label id="reqid" class="bodytext_normal"></label></td>
			</tr>
			<tr class="medicine-checkout-row">
				<td width="19%" align="left" class="bodytext_bold">Medicine Name</td>
				<td width="18%" align="left" class="bodytext_bold">Prefered Date</td>
				<td width="13%" align="left" class="bodytext_bold">Qty</td>
				<td width="17%" align="left" class="bodytext_bold">Store Name</td>
				<td width="13%" align="left" class="bodytext_bold">Price (Rs.)</td>
				<td width="16%" align="left" class="bodytext_bold">Discount (Rs.)</td>
			</tr>
			<tr>
				<td colspan="6" align="left">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" id="successfullpopupinfo">
					</table>
				</td>
			</tr>
			<tr>
				<td height="25" colspan="6" align="left" class="bodytext_bold" style="border-top:1px solid #a8c8d9;padding-top:4px;padding-left:5px;">Service Charges (Including taxes)(Rs.):&nbsp;Not Available</td>
			</tr>
		</table>

		<table>
			<tr>
				<td height="50" colspan="5" align="right" valign="middle" bgcolor="#ecf8fb">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" id="btn" class="checkout-popup-buttons">
						<tr>
							<td width="25%" align="center" valign="middle" style="padding:0 5px;">
								<button id="btn1" class="button" onclick="window.location='/ayushman/cpatientmedicinesorder/viewFootable'" style="font-size:12px;">View My Order</button>
							</td>
							<td width="25%" align="center" valign="middle" style="padding:0 5px;">
								<button id="btn2" class="button"  onclick="window.location='/ayushman/cpatientmedicinesorder/searchandorderMedicinesFootable'" style="font-size:12px;">Order More Medicine</button>
							</td>
							<td width="25%" align="center" valign="middle" style="padding:0 5px;">
								<button id="btn3" class="button"  onclick="parent.window.location='/ayushman/cdashboard/view'" style="font-size:12px;">Dashboard</button>
							</td>
							<td width="25%" align="center" valign="middle" style="padding:0 5px;" style="font-size:12px;">
								<button id="btn4" class="button"  onclick="printElem();" style="font-size:12px;">Print</button>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="address">
	<form id="addressform" class="addressform">

		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder" height="auto" >
			<tr>
				<td class="formHeader" colspan="4" style="padding-top:10px;">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Home Contact Details</td>
			</tr>
			<tr>
				<input type="hidden" id="homeid" name="homeid" value="<?php echo $objaddhome->id;  ?>">
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Address Line 1 * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhline1"  type="text"  class="regnformcontrol" name="addhline1"  value="<?php echo $objaddhome->line1_c;  ?>" maxlength="400"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Landmark :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhlandmark"  type="text"  class="regnformcontrol" name="addhlandmark"  value="<?php echo $objaddhome->nearlandmark_c;  ?>" maxlength="100"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Country * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<!--<input id="addhcountry"  type="text"  class="regnformcontrol" name="addhcountry"  value="<?php echo $objaddhome->country_c; ?>" maxlength="45"/>-->
					<select name="addhcountry" class="regnformcontrol"   id="addhcountry" style="width:140px;">
						<!-- 						<option value="" selected="" >Select Country</option>
                         -->						<?PHP
						for ($i=0;$i<count($objcountries);$i++) {
							print "<option  \" value=\"{$objcountries[$i]['countrycode_c']}\">{$objcountries[$i]['country_c']}</option>";
						}
						?>
					</select>

				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">State * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhstate"  type="text"  class="regnformcontrol" name="addhstate"  value="<?php echo $objaddhome->state_c; ?>" maxlength="45"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">City * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhcity"  type="text"  class="regnformcontrol" name="addhcity"  value="<?php echo $objaddhome->city_c; ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Locality :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhloc"  type="text"  class="regnformcontrol" name="addhloc"  value="<?php echo $objaddhome->location_c; ?>" maxlength="45"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Pin :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhpin"  type="text"  class="regnformcontrol" name="addhpin"  value="<?php echo $objaddhome->pin_c;  ?>" maxlength="45"/>
				</td>
				<td colspan="2">

				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;" class="bodytext">Home Phone :</td>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;">
					<input id="isdphonehome" style="width:30px" type="text"  class="regnformcontrol" name="isdphonenohome_c"  value="<?php echo $user->isdphonenohome_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;
					<input id="phonehome" style="width:90px" type="text"  class="regnformcontrol" name="phonenohome_c"  value="<?php echo $user->phonenohome_c;  ?>"  maxlength="10"/>
				</td>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;" class="bodytext">Mobile No.:</td>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;">
					<input id="isdmobileno1" style="width:30px" type="text"  class="regnformcontrol" name="isdmobileno1_c"  value="<?php echo $user->isdmobileno1_c;  ?>"  readonly="true" maxlength="4"/> &nbsp;&nbsp;
					<input id="mobno1" style="width:90px" type="text"  class="regnformcontrol" name="mobileno1_c"  value="<?php echo $user->mobileno1_c;  ?>" maxlength="10"/>
				</td>
			</tr>
		</table>
	</form>
</div>
<div id="officeadd">
	<form id="officeform" class="officeform">

		<table>
			<tr>
				<input type="hidden" id="officeid" name="officeid" value="<?php echo $objaddwork->id;  ?>">
				<td class="formHeader" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Office Contact Details</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Address Line 1 :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwline11"  type="text"  class="regnformcontrol" name="addwline11"  value="<?php echo $objaddwork->line1_c;  ?>" maxlength="400"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Landmark :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwlandmark1"  type="text"  class="regnformcontrol" name="addwlandmark1"  value="<?php echo $objaddwork->nearlandmark_c;  ?>" maxlength="100"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Country :</td>
				<td style="padding-left:10px;padding-top:10px">
					<!--<input id="addwcountry"  type="text"  class="regnformcontrol" name="addwcountry"  value="<?php echo $objaddwork->country_c;  ?>" maxlength="45"/>-->
					<select name="addwcountry1" class="regnformcontrol" id="addwcountry1" style="width:140px;">
						<!-- 						<option value="" selected=""  >Select Country</option>
                         -->						<?PHP

						for ($i=0;$i<count($objcountries);$i++) {
							print "<option  \" value=\"{$objcountries[$i]['countrycode_c']}\">{$objcountries[$i]['country_c']}</option>";
						}
						?>
					</select>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">State :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwstate1"  type="text"  class="regnformcontrol" name="addwstate1" value="<?php echo $objaddwork->state_c;  ?>" maxlength="45"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">City :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwcity1"  type="text"  class="regnformcontrol" name="addwcity1"  value="<?php echo $objaddwork->city_c; ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Locality :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwloc1"  type="text"  class="regnformcontrol" name="addwloc1"  value="<?php echo $objaddwork->location_c; ?>" maxlength="45"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Pin :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwpin1"  type="text"  class="regnformcontrol" name="addwpin1"  value="<?php echo $objaddwork->pin_c;  ?>" maxlength="6"/>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;" class="bodytext">Office Phone :</td>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;">
					<input id="isdphonework1" style="width:30px" type="text"  class="regnformcontrol" name="isdphonenowork_c"  value="<?php echo $user->isdphonenowork_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input id="phonenowork"  type="text" style="width:90px"  class="regnformcontrol" name="phonenowork_c"  value="<?php echo $user->phonenowork_c;  ?>"  maxlength="10"/>
				</td>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;" class="bodytext">Office Mobile :</td>
				<td style="padding-left:10px;padding-top:10px;padding-bottom: 10px;">
					<input id="mobilenumber1" style="width:30px" type="text"  class="regnformcontrol" name="isdmobilenowork_c"  value="<?php echo $user->isdmobilenowork_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input id="mobnowork"  type="text" style="width:90px" class="regnformcontrol" name="mobilenowork_c"  value="<?php echo $user->mobilenowork_c; ?>"  maxlength="10"/>
				</td>
			</tr>

		</table>
	</form>
</div>


<div id="othersadd" class="othersadd">
	<form id="othersform" method="post" action='/ayushman/cpatientmedicinesorder/addnewaddress'>

		<table>
			<tr>
				<!-- 	<input type="hidden" id="officeid" name="officeid" value="">
                 -->	<td class="formHeader" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Others Contact Details</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Address Line 1 :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwline1"  type="text"  class="regnformcontrol" name="addwline1"  value="" maxlength="400"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Landmark :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwlandmark"  type="text"  class="regnformcontrol" name="addwlandmark"  value="" maxlength="100"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Country :</td>
				<td style="padding-left:10px;padding-top:10px">
					<!--<input id="addwcountry"  type="text"  class="regnformcontrol" name="addwcountry"  value="<?php echo $objaddwork->country_c;  ?>" maxlength="45"/>-->
					<select name="addwcountry" class="regnformcontrol" id="addwcountry" style="width:140px;">
						<!-- 						<option value="" selected=""  >Select Country</option>
                         -->						<?PHP

						for ($i=0;$i<count($objcountries);$i++) {
							print "<option  \" value=\"{$objcountries[$i]['countrycode_c']}\">{$objcountries[$i]['country_c']}</option>";
						}
						?>
					</select>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">State :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwstate"  type="text"  class="regnformcontrol" name="addwstate" value="" maxlength="45"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">City :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwcity"  type="text"  class="regnformcontrol" name="addwcity"  value="" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Locality :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="locality"  type="text"  class="regnformcontrol" name="addwloc"  value="" maxlength="45"/>
				</td>
			</tr>

			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Pin :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwpin"  type="text"  class="regnformcontrol" name="addwpin"  value="" maxlength="6"/>
				</td>
			</tr>
			<tr>
				<!-- <td style="padding-left:10px;padding-top:10px" class="bodytext"> Phone :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="isdphonework" style="width:30px" type="text"  class="regnformcontrol" name="isdphonenowork_c"  value=""  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input id="phonenowork"  type="text" style="width:90px"  class="regnformcontrol" name="phonenowork_c"   maxlength="10"/> 
				</td> -->
				<td style="padding-left:10px;padding-top:10px" class="bodytext"> Mobile :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="mobilenumber"  type="text" style="width:90px" class="regnformcontrol" name="mobilenumber"  maxlength="10"/>
				</td>
			</tr>

		</table>
	</form>
</div>
<input type="hidden" id="order_id">
  	  <input type='hidden' id='service_provide' name='service_provide' />
  	  <input type='hidden' id='setlocation' name='setlocation' />
  	  <input type='hidden' id='addressid' name='addressid' />

<script type="text/javascript">
	var $j = $.noConflict(true);
</script>
<script src="/ayushman/assets/jsF/jquery.min.js"></script>
<script src="/ayushman/assets/jsF/jquery-ui.js"></script>
<script src="/ayushman/assets/jsF/footable.core.min.js"></script>
<script src="/ayushman/assets/jsF/footable.core.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.min.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.min.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.min.js"></script>

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
</script>
<script>
	jQuery(function($){
		$('#MedicineOrderFromPrescriptionCart').footable({
			"columns": [
							{"name":"id","title":"cartid","visible":false,"width":100,"hidden":true,"breakpoints":"xs"},
							{"name":"cartid","title":"Items","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"testname","title":"Items"},
							{"name":"qty","title":"Qty","breakpoints":"xs"},
							{"name":"testreqdate","title":"Item Price (Rs.)","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"pathologistid","title":"Discount(%)","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"pathologistList","title":"Discounted Price (Rs.)","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"id","title":"Remove","formatter":removeOrdersPrescription}
						],
			"rows":<?php echo $tests_json;?>
		});
	});
</script>