<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
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
<script type="text/javascript">
$(document).ready(function(){
		$(function() {
			$( "#testdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy',minDate:0});
		});
		setTimeout(function (){
			calculatetotalfees();
		},500);
		if("<?= count($tests);?>"== "0")
		{
			$("#checkoutbutton").hide(true);
			window.location = "<?= $referer;?>";
		}
		$('#addtonetwork').dialog({
			autoOpen: false,
			show: "fade",
			position: ['center', 'top'],
			hide: "fade",
			width: "421px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		
		$('#ordersuccessfull').dialog({
			autoOpen: false,
			position: ['center', 'top'],
			show: "fade",
			hide: "fade",
			width: "621px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});

		$('#printorder').dialog({
			autoOpen: false,
			position: ['center', 'top'],
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

	function getPathologist( cellvalue, options )
	{
		for(var index = 0; index < options.rows.length; index++) {
			if( cellvalue == options.rows[index].id ) {
				stringPath = '';
				var setid = index + "select" + options.rows[index].id;
				var setTdid = index + "labtestfees" + options.rows[index].id;
				var quote_pathid = "'" + options.rows[index].pathologistid + "'";
				var quote_testsid = "'" + options.rows[index].id + "'";
				var quote_testname = "'" + options.rows[index].testname + "'";
				stringPath = stringPath + '<select style="width:130px;" id="' + setid + '" style="width:130px;" onchange="getfeesfortestid(this,' + quote_testsid + ',' + quote_testname + ',' + index + ');" >';
				stringPath = stringPath + '<option style="font-size:9pt;" value="" >Select diagnostic center</option>';
				var list = options.rows[index].pathologistList;
				var obj = eval('(' + list + ')');
				for (var j = 0; j < obj.length; j++) {
					obj_centerid = obj[j].centerid;
					obj_centername = obj[j].centername;
					if (options.rows[index].pathologistid == obj_centerid) {
						stringPath = stringPath + '<option selected="selected" value="' + obj_centerid + '" >' + obj_centername + '</option>';
					} else {
						stringPath = stringPath + '<option value="' + obj_centerid + '" >' + obj_centername + '</option>';
					}
				}
				stringPath = stringPath + '<select>';
			}
		}
		return stringPath;
	}

function rateformatter( cellvalue  )
{
	var n = 0;
	if(cellvalue == "Not provided"){
		cellvalue = n.toFixed(2);
	} else {
		cellvalue = parseFloat(cellvalue);
		cellvalue = cellvalue.toFixed(2);
	}
	return cellvalue;
}

function AddLabelIdformatter( cellvalue, options  )
{
    var n = 0;
    string = '';
    for(var i = 0; i< options.rows.length ; i++){
        if(cellvalue  == options.rows[i].rate){
            var setLabelId = i+"labtestoriginalfees"+options.rows[i].id;
            if(cellvalue == "Not provided"){
                cellvalue = n.toFixed(2);
            } else {
                cellvalue = parseFloat(cellvalue);
                cellvalue = cellvalue.toFixed(2);
            }
            string = string + '<label id = "' + setLabelId + '" class="originalfee" >'+cellvalue+'</label>';
        }
    }
    return string;
}

function DiscountLabelformatter( cellvalue, options  )
{
    var n = 0;
    string = '';
    for(var i = 0; i< options.rows.length ; i++){
        if(cellvalue  == options.rows[i].discountedpercent){
            var setLabelId = i+"labtestdiscount"+options.rows[i].id;
            if(cellvalue == "Not provided"){
                cellvalue = n.toFixed(2);
            } else {
                cellvalue = parseFloat(cellvalue);
                cellvalue = cellvalue.toFixed(2);
            }
            string = string + '<label id = "' + setLabelId + '" >'+cellvalue+'</label>';
        }
    }
    return string;
}

function DiscounterPriceFormatter(cellvalue, options) {
	var n = 0;
	string = '';
	for (var i = 0; i < options.rows.length; i++) {
		if (cellvalue == options.rows[i].id) {
			var setTD = i + "labtestfees" + options.rows[i].id;
			if (options.rows[i].rate == "Not provided") {
				options.rows[i].discountedrate = n.toFixed(2);
			} else {
				options.rows[i].discountedrate = parseFloat(options.rows[i].discountedrate);
				options.rows[i].discountedrate = options.rows[i].discountedrate.toFixed(2);
			}
			string = string + '<span class="fee" id = "' + setTD + '" >' + options.rows[i].discountedrate + '</span>';
		}
	}
	return string;
}

function removeOrdersPrescription(cellvalue, options) {

	var rownumber = 0;
	var testid = 0;
	var testname = "";
	for (var i = 0; i < options.rows.length; i++) {
		string = '';
		if (options.rows[i].id == cellvalue) {
			rownumber = i;
			testname = options.rows[i].testname;
			testid = cellvalue;
			setid = i + "remove" + testid;
			var quote_testid = "'" + testid + "'";
			var quote_testname = "'" + testname + "'";
		}
		string = string + '<img src="/ayushman/assets/images/Remove_Icon.png" width="22" height="20" id="' + setid + '" class="select-btn" onclick="removetest(' + rownumber + ',' + quote_testid + ',' + quote_testname + ')"  />';
		$('.select-btn').click(function () {
			$('body').addClass('apply-modal-body')
		});
	}
	return string;
}


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
						$('#laberr').html(errmsg+"<div id='"+testrownumber+"err"+id+"'>&bull;&nbsp;Please select other diagnostic center for "+testname+'</div>');	
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
				calculatetotalfees();
			},
			error : function(){alert("something has gone wrong. Could not retrieve fees for the test. Please contact system administrator.");}
		});
	}
	
	function isbalanceavailable()
	{
		var arrayOfIds = $.map($(".fee"), function(n, i){
  			return n.id;
		});
		uniquearrayOfIds = arrayOfIds.filter(function(elem, pos) {
    		return arrayOfIds.indexOf(elem) == pos;
		})
		var total = 0;
		for(var i = 0;i<arrayOfIds.length;i++)
		{ 
			var num=Number($('#'+arrayOfIds[i]).html());
			if(!isNaN(num))
		 		total =Number(total)+ Number($('#'+arrayOfIds[i]).html());
		}
		servicetaxonfees = ((parseFloat(total) * parseInt(<?php echo $diagnosticlabsservicetax; ?>)) / 100);
		$('#labtesttotalfees').text((total).toFixed(2));
		$('#servicetaxonfees').text(servicetaxonfees.toFixed(2));
		amountdue = parseFloat($('#labtesttotalfees').text()) + parseFloat( $('#servicetaxonfees').text()) + parseFloat( $('#labservicecharges').text()) + parseFloat($('#servicetaxonservicecharges').text()); 
		$('#amountdue').text(amountdue.toFixed(2));
		$('#labservicecharges').text(Number($('#labservicecharges').text()).toFixed(2));
		$('#labcurrentBalance').text(Number($('#labcurrentBalance').text()).toFixed(2));
		var labservicecharges= $('#labservicecharges').text();
		var currentbalance =$('#labcurrentBalance').text();
		var balanceafter = Number(currentbalance)-(Number(amountdue));
		balanceafter = Number((balanceafter).toFixed(2));
		if(balanceafter < 0)
			return false;
		else
			return true;
	}
	function calculatetotalfees()
	{
		var arrayOfIds = $.map($(".fee"), function(n, i){
  			return n.id;
		});
		uniquearrayOfIds = arrayOfIds.filter(function(elem, pos) {
    		return arrayOfIds.indexOf(elem) == pos;
		})
		var total = 0;
		for(var i = 0;i<arrayOfIds.length;i++)
		{ 
			var num=Number($('#'+arrayOfIds[i]).html());
			if(!isNaN(num))
		 		total =Number(total)+ Number($('#'+arrayOfIds[i]).html());
		}
		servicetaxonfees = ((parseFloat(total) * parseInt(<?php echo $diagnosticlabsservicetax; ?>)) / 100);
		$('#labtesttotalfees').text((total).toFixed(2));
		$('#servicetaxonfees').text(servicetaxonfees.toFixed(2));
		amountdue = parseFloat($('#labtesttotalfees').text()) + parseFloat( $('#servicetaxonfees').text()) + parseFloat( $('#labservicecharges').text()) + parseFloat($('#servicetaxonservicecharges').text()); 
		$('#amountdue').text(amountdue.toFixed(2));
		$('#labservicecharges').text(Number($('#labservicecharges').text()).toFixed(2));
		$('#labcurrentBalance').text(Number($('#labcurrentBalance').text()).toFixed(2));
		var labservicecharges= $('#labservicecharges').text();
		var currentbalance =$('#labcurrentBalance').text();
		var balanceafter = Number(currentbalance)-(Number(amountdue));
		balanceafter = Number((balanceafter).toFixed(2));
		/*if(balanceafter < 0)
		{
			var  errmsg = $('#laberr').html();
			document.getElementById("checkoutbutton").style.width= "80px";
			$("#checkoutbutton").val("Recharge");
			if(document.getElementById("errrecharge") == null)
			{
				$('#laberr').html(errmsg+"<div id='errrecharge' >&bull;&nbsp;Please recharge your account.</div>");	
			}
		}
		else*/
		{
			document.getElementById("checkoutbutton").style.width= "140px";
			$("#checkoutbutton").val("Proceed to Pay");
			if(document.getElementById("errrecharge") !== null)
			{
				$('#errrecharge').remove();
			}	
		}
		$('#labBalanceAfterttran').text(balanceafter);
				
		var arrayOfIds = $.map($(".originalfee"), function(n, i){
  			return n.id;
		});
		uniquearrayOfIds = arrayOfIds.filter(function(elem, pos) {
    		return arrayOfIds.indexOf(elem) == pos;
		})
		var originaltotal = 0;
		/*for(var i = 0;i<uniquearrayOfIds.length;i++)
		{ 
			var num=Number($('#'+uniquearrayOfIds[i]).html());
			if(!isNaN(num))
			{
				alert(Number($('#'+uniquearrayOfIds[i]).html()));
				originaltotal =Number(originaltotal)+ Number($('#'+uniquearrayOfIds[i]).html());
			}
		}*/
		for(var i = 0;i<arrayOfIds.length;i++)
		{ 
			var num=Number($('#'+arrayOfIds[i]).html());
			if(!isNaN(num))
				originaltotal =Number(originaltotal)+ Number($('#'+arrayOfIds[i]).html());
		}
		
		$('#labtestoriginaltotalfees').text((originaltotal).toFixed(2));
		
		diff = originaltotal - total;
		$('#labtesttotaloriginalfees').text((originaltotal).toFixed(2));
		$('#labtesttotaldifffees').text((diff).toFixed(2));
		
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
			url: "/ayushman/ccheckout/removetest?testid="+testid+"&rownumber="+rownumber,
			success: function( data ) {
				parent.getcontent('/ayushman/ccheckout/viewDTFootable');
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});
		
	}
	
	function checkoutonclick()
	{
		var radiobtn=document.getElementById("service_provide").value;
		var payment_type=document.getElementById("payment_mode").value;
		var addtest = new Array();
		var j=0;
		// If online payment then check for balance available
		if(payment_type==0)
		{
			if (isbalanceavailable()== false)
			{
				alert("Please recharge account for making online payments");
				return false;
			}
		}
		<?php $i=0;foreach($tests as $test) { ?>
			var id= "<?php echo $i.'select'.$test['id'] ?>" ;
			addtest[j] = new Array(2);
			addtest[j][0] = "<?php echo $test['cartid']; ?>";
			addtest[j][1] = $("#"+id).val();
			j++;
			<?php $i++; ?>	
		<?php } ?>
		if($('#checkoutbutton').val() =="Recharge")
		{
			var currentlocation = escape(window.location);
			$.ajax({
				  url: '/ayushman/ccheckout/setfollowuplink?currentlocation='+currentlocation ,
				  success: function( data ) {
				  		window.location= '/ayushman/ccheckout/ordertest?test='+JSON.stringify(addtest)+'&testcharges='+$('#labtesttotalfees').text()+'&servicecharges='+<?= $servicecharges;?>+'&radiobtn='+radiobtn+'&payment_mode='+payment_type;
					},
					error : function(){showMessage('550','200','Recharge',"Error occured while redirecting to recharge page. Please contact system administrator",'error','id');}
			}); 
		}
		else
		{
			if(($('#checkoutbutton').val() =="Proceed to Pay")&& ($('#laberr').html() ==""))
			{
				var check = addtofavcheck();
				if(check == "open"){
					
				}
				else
				{
					parent.pagebusy();
					var requestdate = document.getElementById("testdate").value;
					$.ajax({
				  		url: '/ayushman/ccheckout/ordertest?test='+JSON.stringify(addtest)+'&testcharges='+$('#labtesttotalfees').text()+'&servicecharges='+<?= $servicecharges;?>+'&radiobtn='+radiobtn+'&payment_mode='+payment_type+'&requestdate='+requestdate,
				  		success: function( data ) {
				  			var ordertests =  eval('('+data+')');
				  			jQuery('#successfullpopupinfo').html('');
				  			jQuery('#successfullpopupinfo1').html('');

				  			for(var i = 0;i<ordertests.length;i++)
							{
				  				var d = new Date(ordertests[i]["reqdate"]);
   								 var da = d.getDate();                       //day
    							var mon = d.getMonth() + 1;                 //month
   							 	var yr = d.getFullYear();
     							months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    							var monName = months[d.getMonth()];         //month Name
    							var thisDay = da + " " + monName + " " + yr;    //full date show
                   				reqdate=thisDay;
				  				orderid=ordertests[i]["id"];
				  				$('#reqdate').text(reqdate);
				  				$('#reqid').text(orderid);
				  				$('#printreqdate').text(reqdate);
				  				$('#printreqid').text(orderid);
				  				
				  				var labservicecharges= Number($('#labtesttotalfees').text()) + Number($('#servicechargePopupTotal').text());
				  				$('#successfullPopupTotal').text(Number(labservicecharges).toFixed(2));
				  				$('#printsuccessfullPopupTotal').text(Number(labservicecharges).toFixed(2));
				  				$('#ordersuccessfull').dialog('open');
				  				element = $('<tr class="medicine-checkout-row">');
								element1 = $('<tr>');
								//var textinfomation ='<td  height="30px;" width="36px" >&nbsp;</td><td width="154px" class="bodytext_normal">'+(i+1)+'. '+ordertests[i]["testname"]+'</td><td width="150px" class="bodytext_normal">'+ordertests[i]["id"]+'</td><td width="174px" class="bodytext_normal">'+ordertests[i]["centername"]+'</td><td width="96px" style="text-align:right" class="bodytext_normal">'+Number(ordertests[i]["rate"]).toFixed(2)+'</td><td width="96px" style="text-align:right" class="bodytext_normal">'+(Number(ordertests[i]["discountedrate"])).toFixed(2)+'</td></div>';
								var textinfomation ='<td width="27%" class="bodytext_normal">'+(i+1)+'. '+ordertests[i]["testname"]+'</td>' +
													'<td width="16%" class="bodytext_normal">'+reqdate+'</td>' +
													'<td width="27%" class="bodytext_normal">'+ordertests[i]["centername"]+'</td>' +
													'<td width="15%" class="bodytext_normal">'+Number(ordertests[i]["rate"]).toFixed(2)+'</td>' +
													'<td width="15%" class="bodytext_normal">'+(Number(ordertests[i]["discountedrate"])).toFixed(2)+'</td>'+'</tr>';

								var textinfomation1 ='<td  height="30px;" width="36px" >&nbsp;</td>' +
													'<td width="154px" class="bodytext_normal">'+(i+1)+'. '+ordertests[i]["testname"]+'</td>' +
													'<td width="150px" align="center" class="bodytext_normal">'+reqdate+'</td>' +
													'<td width="174px" align="center" class="bodytext_normal">'+ordertests[i]["centername"]+'</td>' +
													'<td width="96px" style="text-align:right" class="bodytext_normal">'+Number(ordertests[i]["rate"]).toFixed(2)+'</td>' +
													'<td width="96px" style="text-align:right;padding-right: 5px;" class="bodytext_normal">'+(Number(ordertests[i]["discountedrate"])).toFixed(2)+'</td></tr>';
								element.appendTo('#successfullpopupinfo');
								element1.appendTo('#successfullpopupinfo1');
								$(textinfomation).appendTo(element);
								$(textinfomation1).appendTo(element1);
				  			}
							parent.pageloaded();
						},
						error : function(){showMessage('550','200','Recharge',"Error occured while ordering tests. Please contact system administrator",'error','id');parent.pageloaded();}
					});
					
				}
				
			}
			else
			{
			}
		}
	}
	
	function addtofavcheck()
	{
		jQuery('#newpathologistlist').html('');
		var arr_pathologist= $.parseJSON(<?= json_encode($arr_favoritepathologist); ?>);
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
			if(arr_pathologist.indexOf(uniquearrayOfselectedpathologistIds[i][0]) > -1)
			{
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
		document.getElementById("addpathologistcount").value= uniquearrayOfaddNetworkPathologistIds.length;
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
			  url: '/ayushman/ccheckout/addnewpathologist?arr_pathologistId='+JSON.stringify(arr_pathologistId) ,
			  success: function( data ) {
					parent.getcontent('/ayushman/ccheckout/view');
				},
				error : function(){showMessage('550','200','Add Diagnostic Center',"Error occured while adding Diagnostic Center in your network. Please contact system administrator",'error','id');}
		}); 
	}

 function set_payment_mode(){
		var requestdate= document.getElementById("testdate").value;
		if(requestdate!="")
			$('#paymentmode').dialog('open'); 
		else
			alert("Enter test Request date");			     
    }

  function book_appointment(){
    var payment_mode = ($('#payment_mode').val());
    var total_fees = $('#totalcharges').val();
	var labservicecharges= Number($('#labtesttotalfees').text()) + Number($('#servicechargePopupTotal').text());
    var ayushman_charges = parseFloat($('#ayushmancharges').val()) + parseFloat($('#servicetax_ayushmancharges').val());
    if(payment_mode == 1 && parseFloat(total_fees)> parseFloat(labservicecharges)){
      $('#redirect').dialog('open');
    }
    else if(payment_mode == 0 && parseFloat(ayushman_charges)> parseFloat(labservicecharges)){
      $('#redirect').dialog('open');
    }
    else{
      $('#appointment_book_form').submit();
    }
  }
  

 $(document).ready(function(){
 	$('#payment_mode').val(1);
 	$('#service_provide').val(1);
   // set_fees('First Time'); 
    $('#paymentmode').dialog({
      autoOpen: false,
      draggable: false,
      position:  [150,150],
      modal: true,
      title: 'Payment Mode',
      width:'500',
      height:'auto',
      buttons: {
        "Ok": function () {
          $('#payment_mode').val($('input[name="payment"]:checked').val());
                		checkoutonclick();
          $(this).dialog('close');
      	
        },
        "Cancel": function () {
          $(this).dialog('close');
        }
      }
    });
    jQuery("#paymentmode").dialog('option', 'position', [150,150]);
    $('#redirect').dialog({
      autoOpen: false,
      draggable: false,
      position:  ['center','center'],
      modal: true,
      title: 'Insufficient Balance',
      width:'500',
      height:'auto',
      buttons: {
        "Yes": function () {
          $(this).dialog('close');
          //redirect_to_recharge();
        },
        "No": function () {
          $(this).dialog('close');
        }
      }
    });
    jQuery("#redirect").dialog('option', 'position', [150,150]);
  });


 function redirect_to_recharge(){
    $('#appointment_book_form').attr('action','/ayushman/cappointment/redirect');
    $('#appointment_book_form').submit();
  }
function setservice(value){

	if(value==1){
          $('#service_provide').val($('input[name="radiobtn"]:checked').val());
	}
	else{
          $('#service_provide').val($('input[name="radiobtn"]:checked').val());

	}
}

function setmode(value){

	if(value==1){
          $('#payment_mode').val($('input[name="payment"]:checked').val());
	}
	else{
          $('#payment_mode').val($('input[name="payment"]:checked').val());

	}
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
		//$(".button").hide();
		//Popup($('#ordersuccessfull').html());
		Popup($('#printorder').html());
		window.location='/ayushman/corderedtests/viewFootable';
	 }
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
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/><strong>&nbsp;&nbsp;Checkout</strong>
			</td>
		</tr>
	</table>
	<div class="clearfix">&nbsp;</div>
	<div class="demo-container hide-footable-sorting clearfix">
		<div class="tab-content">
			<div>
				<div class="tab-pane active" id="demo">
					<table data-paging-limit="3" id ="DTOrderFromPrescriptionCart" data-paging-limit="3" class="table" data-sorting="true" data-paging="false" style="margin-bottom: 0px !important;"></table>
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

						<td class="bodytext_bold" style="border:0px; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">
							<table width="100%" border="0"  cellpadding="0" cellspacing="0" class="checkout-table">
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
									<td class="bodytext_bold">Service Tax </br>(<?php echo $diagnosticlabsservicetax; ?>% on service provider's fees) (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="servicetaxonfees"></lable>&nbsp;</td>
					  			</tr>

					  			<tr>
									<td class="bodytext_bold" >Online service Charges (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="labservicecharges"><?= $servicecharges;?></lable>&nbsp;</td>
					  			</tr>
								<tr>
									<td class="bodytext_bold" >Service Tax </br>(<?php echo $servicetax; ?>% on service charges) (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="servicetaxonservicecharges"><?= $servicetaxonservicecharges; ?></lable>&nbsp;</td>
					  			</tr>

								<tr>
									<td class="bodytext_bold" style=" border-bottom:2px solid #a8c8d9;border-right:1px solid #a8c8d9;border-top:2px solid #a8c8d9;padding-left:5px;" >Total Amount Due (Rs.)</td>
									<td class="bodytext_bold" style="border-bottom:2px solid #a8c8d9;border-top:2px solid #a8c8d9;text-align:right;padding-right:5px;" >&nbsp;&nbsp;<lable id="amountdue">0</lable>&nbsp;</td>
					  			</tr>
								
					  			<tr>
									<td class="bodytext_bold">Current Balance (Rs.)</td>
									<td class="bodytext_normal">&nbsp;&nbsp;<lable id="labcurrentBalance" ><?= $netbalance;?></lable>&nbsp;</td>
					  			</tr>
							  	<tr>
									<td class="bodytext_bold" >Balance after Transfer (Rs.)</td>
									<td class="bodytext_normal" >&nbsp;&nbsp;<lable id="labBalanceAfterttran">0</lable>&nbsp;</td>
							  	</tr>
							</table>

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table_roundBorder">
       	<tr>
			<td height="50" align="right" valign="middle" bgcolor="#ecf8fb" style="padding:10px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="checkout-footer-form">
						<td class='bodytext_bold' align='left'>
							<div>
							<span>Test Request Date</span>
							<input id = "testdate" type = "text" class='bodytext_normal' readonly />
							</div>
						</td>
						<td class='bodytext_bold' align='left'>
							<div>
							<input type='radio' id='atcenter' name='radiobtn' value=1 checked onclick="setservice(this.value);"/>
							<span> At Center </span>
							</div>
						</td>
						<td class='bodytext_bold' align='left'>
							<div>
							<input type='radio' id='homevisit' name='radiobtn'  value=0  onclick="setservice(this.value);" />
							<span> Home Visit </span>
							</div>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>
							<lable id="laberr"></lable>
						</td>
					</tr>
					<tr>
						<td>
							<div class="bodytext_bold">*Consult service provider for applicable home visit charges(Payable at the time of sample collection).
							</div>
						</td>
					</tr>
					<tr>
						<td><br /></td>
					</tr>
					<tr>
						<input type='hidden' id='removetestrownumber' name='removetestrownumber' />
						<input type='hidden' id='removetestid' name='removetestid' />
						<td align="right" class="select-btn">
                            <a href="<?= $referer;?>">
							    <input id="backbutton" value="Back" class="button"   style="height:25px;width:80px;"  align="center"  readonly="readonly"  />
                            </a>
							<input id="checkoutbutton" value="Proceed to Pay" class="button" style="height:25px;outline:none;width:140px;"  align="center" onclick="set_payment_mode();"//onclick="checkoutonclick()" readonly="readonly"  />
						</td>
					</tr>
				</table>
			</td>
      	</tr>
  	</table>
	<div class="clearfix" style="margin-bottom:50px;">&nbsp;</div>

	<div id="addtonetwork" style="overflow-y:hidden;overflow-x:hidden;height:auto;" >
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder" height="auto" >
			<tr>
				<td width="7%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="30%" align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;"> Add to My Network</td>
				<td width="63%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="closepopup('addtonetwork');"/></td>
			</tr>
			<tr>
				<td height="35" align="center" valign="middle">&nbsp;</td>
				<td colspan="2" align="left" valign="middle" class="bodytext_normal">Do you want to add Diagnostic Center in your network ?</td>
			</tr>
			<tr >
				<td height="40" align="center" valign="middle">
					<input type="hidden" id="addpathologistcount"/>&nbsp;</td>
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

	<div id="ordersuccessfull" style="height:auto;" class="dignostic-checkout-popup">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td height="25" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:5px;width: 30px;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/> </td>
				<td align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;"> Order Successfully Placed </td>
				<td align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">&nbsp;</td>
			</tr>
		</table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td height="40" colspan="2" align="left" valign="middle" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;padding-left:5px;">Order Date:&nbsp; <label class="bodytext_normal" id="reqdate"></label></td>
				<td colspan="3" align="left" valign="middle" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;padding-left:5px;">Order. Id.:&nbsp; <label id="reqid" class="bodytext_normal"></label></td>
			</tr>
			<tr class="medicine-checkout-row">
				<td width="27%" class="bodytext_bold">Tests</td>
				<td width="16%" class="bodytext_bold">Test Reqst Date </td>
				<td width="27%" class="bodytext_bold">Center Name </td>
				<td width="15%" class="bodytext_bold">Price (Rs.)</td>
				<td width="15%" class="bodytext_bold">Discounted Price (Rs.)</td>
			</tr>
			<tr>
				<td  colspan="5" align="left">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" id="successfullpopupinfo">

					</table>
				</td>
			</tr>
			<tr>
				<td height="25" colspan="4" align="left" class="bodytext_bold" style="border-top:1px solid #a8c8d9;padding-top:4px;padding-left:5px">Service Charges (Including taxes)(Rs.):&nbsp;</td>
				<td class="bodytext_normal" style="border-top:1px solid #a8c8d9;text-align:left;padding-right:5px"><lable id="servicechargePopupTotal"><?= number_format((float)$servicetaxonservicecharges, 2, '.', '') + number_format((float)$servicecharges, 2, '.', '');?></label>&nbsp;</td>
			</tr>
			<tr>
				<td height="25" colspan="4" align="left" class="bodytext_bold" style="padding-left:5px">Total Test Price (Including taxes) (Rs.)&nbsp;:&nbsp; </td>
				<td class="bodytext_normal" style="text-align:left; padding-right:5px;"><lable id="successfullPopupTotal">0</lable>&nbsp;</td>
			</tr
			<tr>
				<td height="25" colspan="5" align="left" class="bodytext_bold" style="padding-left: 5px;border-top:1px solid #a8c8d9;padding-top: 5px;padding-bottom: 5px;">* Applicable home-visit sample collection charges</td>
			</tr>
		</table>
		<table>
			<tr>
				<td height="50" colspan="5" align="right" valign="middle" bgcolor="#ecf8fb">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="checkout-popup-buttons">
						<tr>
							<td width="20%" align="center" valign="middle" style="padding:0 5px;">
								<button class="button btn-block" onclick="window.location='/ayushman/corderedtests/viewFootable'" >View My Order</button>
							</td>
							<td width="20%" align="center" valign="middle" style="padding:0 5px;" >
								<button class="button btn-block"  onclick="window.location='/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription'" >Order Medicines</button>
							</td>
							<td width="20%" align="center" valign="middle" style="padding:0 5px;">
								<button class="button btn-block" onclick="window.location='/ayushman/cpatientrequistiontests/viewFootable'">Order More Tests</button>
							</td>
							<td width="20%" align="center" valign="middle" style="padding:0 5px;">
								<button class="button btn-block" onclick="parent.window.location='/ayushman/cdashboard/view'" >Dashboard</button>
							</td>
							<td width="20%" align="center" valign="middle" style="padding:0 5px;" >
								<button class="button btn-block" onclick="printElem();" >Print</button>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>

	<div id="printorder" style="overflow-y:hidden;overflow-x:hidden;height:auto;">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/> </td>
				<td colspan="5" align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;"> Order Successfully Placed </td>
				<td width="58%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">&nbsp;</td>
			</tr>
			<tr>
				<td width="5%" height="40" align="center" valign="middle">&nbsp;</td>
				<td width="32%" align="left" valign="middle" class="bodytext_bold">Order Date:&nbsp; <label class="bodytext_normal" id="printreqdate"></label></td>
				<td width="20%" align="left" valign="middle" class="bodytext_bold">Order. Id.:&nbsp; <label id="printreqid" class="bodytext_normal"></label></td>
			</tr>
			<tr>
				<td width="6%" align="left" height="25">&nbsp;</td>
				<td width="14%" align="left" class="bodytext_bold">Tests</td>
				<td width="20%" align="left" class="bodytext_bold">Test Reqst Date </td>
				<td width="20%" align="left" class="bodytext_bold">Center Name </td>
				<td width="15%" align="left" class="bodytext_bold">Price (Rs.)</td>
				<td width="10%" align="left" class="bodytext_bold">Discounted Price (Rs.)</td>
			</tr>
		</table>
		<table id= "successfullpopupinfo1" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
		</table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td height="25" colspan="5" align="right" class="bodytext_bold" style="border-top:1px solid #a8c8d9;padding-top:4px;">Service Charges (Including taxes)(Rs.):&nbsp;</td>
				<td class="bodytext_normal" style="border-top:1px solid #a8c8d9;text-align:right;"><lable id="servicechargePopupTotal"><?= number_format((float)$servicetaxonservicecharges, 2, '.', '') + number_format((float)$servicecharges, 2, '.', '');?></label>&nbsp;</td>
		  	</tr>
		  	<tr>
				<td height="25" colspan="5" align="right" class="bodytext_bold">Total Test Price (Including taxes) (Rs.)&nbsp;:&nbsp; </td>
				<td class="bodytext_normal" style="text-align:right"><lable id="printsuccessfullPopupTotal">0</lable>&nbsp;</td>
		  	</tr>
		  	<tr>
				<td height="25" colspan="6" align="left" class="bodytext_bold" style="border-top:1px solid #a8c8d9;padding-top:4px;">* Applicable home-visit sample collection charges &nbsp;</td>
		  	</tr>
		</table>
	</div>
</div>
<div id='paymentmode' >
    <p style="padding: 10px 10px 0;margin: 0;">You can make payment online or pay amount during sample collection. Select appropriate option and proceed.<br/>
	</p>
	<form  style="padding: 10px;">
		<input type="radio" id="onlinepayment" name="payment" value="0" onclick="setmode(this.value);">Pay online.</input><br />
		<input type="radio"  name="payment" id="inclinicpayment" value="1" onclick="setmode(this.value);" checked >Pay at the time of sample collection.</input>
	</form>
  </div>

  <div id='redirect'>
    <p class='bodytext_bold'>You don't have sufficient balance to book this appointment.<br/>Would you like to recharge your account?<br/></p>
  </div>
  <form id='appointment_book_form' method="post" enctype="multipart/form-data"  action="/ayushman/cappointment/book"> 
    <input type='hidden' name = 'display_time' value='' />
    <input type='hidden' name = 'start_time' value='' />
    <input type='hidden' name = 'end_time' value='' />
    <input type='hidden' id='form_visit_type' name = 'visit_type' value='' />
    <input type='hidden' name = 'doctor_id' value='' />
    <input type='hidden' name = 'clinic_id' value='' />
    <input type='hidden' id='form_incident' name= 'incident' value='' ?>
    <input type='hidden' name='charge_type' value='' />
    <input type='hidden' name='clinic_name' value=''/>
    <input type='hidden' name='appointment_type' value='' />
	<input type='hidden' id='descriptions' name='descriptions' value='' />
	<input type='hidden' name='ayushmancharges' id="ayushmancharges" value='' />
	<input type='hidden' name='servicetax_ayushmancharges' id='servicetax_ayushmancharges' value='' />
	<input type='hidden' name='totalcharges' id='totalcharges' value='' />
	<input type='hidden' name='appointmentcharges' id='appointmentcharges' value='' />

  </form>
  	  <input type='hidden' id='service_provide' name='service_provide' />
      <input type='hidden' id='payment_mode' name='payment_mode'/>
</div>
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
		$('#DTOrderFromPrescriptionCart').footable({
			"columns": [
                            {"name":"cartid","title":"cartid","visible":false,"width":100,"hidden":true},
                            {"name":"testname","title":"Items"},
                            {"name":"id","title":"Providers","breakpoints":"xs","formatter":getPathologist},
                            {"name":"pathologistid","title":"Provider","visible":false},
                            {"name":"pathologistList","title":"Pathology List","hidden":true,"visible":false},
                            {"name":"rate","title":"Item Price (Rs.)","breakpoints":"xs","formatter":AddLabelIdformatter},
                            {"name":"discountedpercent","title":"Discount(%)","breakpoints":"xs","formatter":DiscountLabelformatter},
                            {"name":"id","title":"Discounted Price (Rs.)","breakpoints":"xs","formatter":DiscounterPriceFormatter},
                            {"name":"testreqdate","title":"testreqdate","type":"date","formatString":"DD MMM YYYY","breakpoints":"xs","visible":false,"width":100,"hidden":true},
                            {"name":"id","title":"Remove","formatter":removeOrdersPrescription}
					],
			"rows":<?php echo $tests_json;?>
		});
	});
</script>