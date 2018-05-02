<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css"/>
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
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
    $(document).ready(function () {

        $(function () {
            $("#testdate").datepicker({
                yearRange: "-70:+0",
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd M yy',
                minDate: 0
            });
        });
		var stat = document.getElementById('bookteststatus').value;
		
		if(stat == 'searchorder'){
			document.getElementById('searchorder').style.background =  'rgba(255, 110, 2,.4)';
		}
    });

    function addtocart(cellvalue, options, rowObject) {
        $('html, body').animate({ scrollTop: 0 }, 1000);
        $('body').addClass('apply-modal-body');
        var testid = 0;
        for (var i = 0; i < options.rows.length; i++) {
            if (options.rows[i].testid == cellvalue) {
                testid = options.rows[i].testid;
            }
        }
        return '<img src="/ayushman/assets/images/AddCart_Icon.png" width="15" height="15" align="top"/>&nbsp;<a href="#"  class="select-btn" onclick="openaddpopup(' + testid + ')" >Select</a>'
    }

    function testnameformatter(cellvalue, options, rowObject) {
        var testid = $(rowObject).children()[2].firstChild.data;
        var testname = $(rowObject).children()[1].firstChild.data;
        var string = '<a onclick="opentestinfo(' + testid + ')" title="test information" style="cursor:hand;" >&nbsp;' + testname + "</a><br />";
        return string;
    }

    function testsformatter(cellvalue, options) {
        string = '';
        for (var index = 0; index < options.rows.length; index++) {
            if (options.rows[index].testid == cellvalue) {
                var testid = options.rows[index].testid;
                var testname = options.rows[index].testname;
                string = string + '<a onclick="opentestinfo(' + testid + ')" title="test information" style="cursor:hand;" >&nbsp;' + testname + "</a><br />";
            }
        }
        return string;
    }

    function getPathologist(cellvalue, options) {
        for (var index = 0; index < options.rows.length; index++) {
            if (cellvalue == options.rows[index].id) {
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

    function rateformatter(cellvalue) {
        var n = 0;
        if (cellvalue == "Not provided") {
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
        $('html, body').animate({ scrollTop: 0 }, 1000);
        $('body').addClass('apply-modal-body');
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


    function opentestinfo(testid) {
    $('html, body').animate({ scrollTop: 0 }, 1000);
    $('body').addClass('apply-modal-body');

        $.ajax({
            url: "/ayushman/cpatientrequistiontests/gettestinfo?testid=" + testid,
            success: function (data) {
                var testInfo = eval("(" + data + ")");
                var infoDiv = $("<div style='width:100%'></div>");
                for (var x in testInfo) {
                    var subDiv = $("<div></div>");
                    $("<label class='bodytext_bold'>" + x + "</label>").appendTo(subDiv);
                    $("<label>&nbsp:&nbsp&nbsp</label>").appendTo(subDiv);
                    $("<label class='bodytext_normal'>" + testInfo[x] + "</label>").appendTo(subDiv);
                    $(subDiv).appendTo(infoDiv);
                    $("<br />").appendTo(infoDiv);
                }
                $("#informationbody").empty();
                $(infoDiv).appendTo($("#informationbody"));
                $("#informationpopup").dialog("open");
            },
            error: function () {
                alert("something has gone wrong. Could not retrieve information for the test. Please contact system administrator.");
            }
        });
    }

    function openaddpopup(testid) {
        jQuery('#testinfo').html('');
        jQuery('#laberr').html('');
        $.ajax({
            url: "/ayushman/cpatientrequistiontests/gettestsusingtestid?testid=" + testid,
            success: function (data) {
				console.log(data);
                var recommenedtests = eval('(' + data + ')');
                var errmsg = "";
                for (var i = 0; i < recommenedtests.length; i++) {
					var arrayofbatterydetails = recommenedtests[i]["batterydetail"];
					var batflag = recommenedtests[i]["batteryflag"];
                    var arraypathologistinfo = recommenedtests[i]["pathologistList"];
                    var testname = "'" + recommenedtests[i]["testname"] + "'";

                    select = '<select id="' + i + 'select' + recommenedtests[i]["id"] + '" onchange="getfeesfortestid(this,' + recommenedtests[i]["id"] + ',' + testname + ',' + i + ');" style="width:150px;font-size:9pt;">'
                    select = select + '<option style="font-size:9pt;" value="" >Select diagnostic center</option>';
                    for (var j = 0; j < arraypathologistinfo.length; ++j) {
                        var pathoid = arraypathologistinfo[j]['centerid'];
                        var pathoname = arraypathologistinfo[j]['centername'];
                        if (pathoid == recommenedtests[i]["pathologistid"])
                            select = select + '<option style="font-size:9pt;"  selected="selected" value=' + pathoid + '>' + pathoname + '</option>';
                        else
                            select = select + '<option style="font-size:9pt;" value=' + pathoid + '>' + pathoname + '</option>';
                    }
                    select = select + '</select>';
                    
					/// Battery details 
					var bathtml = "";
					if(batflag == true)
					{
						testnum = 1;
						for (var batindex = 0; batindex < arrayofbatterydetails.length; ++batindex)
						{
							var idval = "batid"+testid+"testid"+arrayofbatterydetails[batindex]["testid"];
							bathtml = bathtml + "<tr><td colspan='2' style='padding-left:50px;font-size:10px;color:black'> <span> "+testnum+". " + arrayofbatterydetails[batindex]['testnameforbat'] + "</span></td>";
							bathtml = bathtml + "<td style='padding-left:40px;font-size:10px;color:black'><label id='"+idval+"' style='margin-bottom:0px;align:right;' class='fee'></label></td></tr>";
							++testnum;
						}
                    } 
					
					var testrate = '"' + recommenedtests[i]["rate"] + '"';
                   // var textinfomation = "<tr><td width='1%' height='27px' >&nbsp;</td><td width='5%' class='bodytext_normal' align='left'><input type='checkbox' name='checkbox' value='checkbox' checked='true' id='" + i + "checkbox" + recommenedtests[i]["id"] + "' onclick='checkboxonclick(this," + recommenedtests[i]["id"] + "," + i + "," + testrate + ")' /></td><td width='37%;' class='bodytext_bold' align='left' id='" + i + "testname" + recommenedtests[i]["id"] + "' >" + recommenedtests[i]["testname"] + "</td><td width='35%' class='bodytext_normal' align='center' >" + select + "</td><td width='7%' class='bodytext_normal' align='right'><span class='bodytext_bold'> Price : </span></td><td  width='15%'  class='bodytext_normal'>&nbsp;<lable id='" + i + "labtestoriginalfees" + recommenedtests[i]["id"] + "' >" + '' + "</lable> </td></div></tr>"+bathtml+"<tr><td colspan='6'><div style='float:right;margin-right:80px' class='bodytext_bold'><label id='" + i + "labtestlabelfees" + recommenedtests[i]["id"] + "'></label>&nbsp;<lable id='" + i + "labtestfees" + recommenedtests[i]["id"] + "' class='fee'>" + '' + "</lable></div></td></tr><tr><td colspan='6'><div style='float:right;margin-right:80px' class='bodytext_bold'><label id='" + i + "batidlabelfees" + recommenedtests[i]["id"] + "' style='font-size:10px;color:red'></label>&nbsp;<del id='" + i + "batidfees" + recommenedtests[i]["id"] + "' style='font-size:10px;color:red' class='fee'>" + '' + "</del></div></td></tr>";
					var textinfomation = "<tr><td width='1%' height='27px' >&nbsp;</td><td width='60%' class='bodytext_normal' align='left'><input type='checkbox' name='checkbox' value='checkbox' checked='true' id='" + i + "checkbox" + recommenedtests[i]["id"] + "' onclick='checkboxonclick(this," + recommenedtests[i]["id"] + "," + i + "," + testrate + ")' /><label class='bodytext_bold' align='left' id='" + i + "testname" + recommenedtests[i]["id"] + "' >" + recommenedtests[i]["testname"] + "<label></td><td width='70%' class='bodytext_normal' align='left' >" + select + "</td></div></tr>"+bathtml;
						textinfomation = textinfomation + "<tr><td>&nbsp;</td></tr> " ;
						textinfomation = textinfomation + "<tr><td colspan='3'><div style='float:right;margin-right:210px' class='bodytext_bold'><del id='" + i + "batidlabelfees" + recommenedtests[i]["id"] + "' ></del>&nbsp;<del id='" + i + "batidfees" + recommenedtests[i]["id"] + "' style='font-size:12px;' class='fee'>" + '' + "</del></div></td></tr>";
						textinfomation = textinfomation + "<tr><td colspan='3'><div style='float:right;margin-right:210px' class='bodytext_bold'><label id='" + i + "labeloriginalfees" + recommenedtests[i]["id"] + "'></label>&nbsp;<lable id='" + i + "labtestoriginalfees" + recommenedtests[i]["id"] + "' >" + '' + "</lable> </td></tr>" ;
						textinfomation = textinfomation + "<tr><td colspan='3' style='background-color:#ecf8fb'><div style='float:right;margin-right:50px;font-size:15px;font-weight:bold' class='bodytext_bold'><label id='" + i + "labtestlabelfees" + recommenedtests[i]["id"] + "'></label>&nbsp;<lable id='" + i + "labtestfees" + recommenedtests[i]["id"] + "' class='fee'>" + '' + "</lable></div></td></tr>";

					element = $("<table id='" + recommenedtests[i]["id"] + "'  style='margin-top:10px;margin-bottom:10px;width:100%;'  /><input type='hidden' id='" + i + "testid' name='" + i + "testid' /><input type='hidden' id='appid' name='appid' />");
                    element.appendTo('#testinfo');
                    $(textinfomation).appendTo(element);
                	document.getElementById(i + "testid").value = recommenedtests[i]["id"];
                    document.getElementById("appid").value = appid;
                    disableselectbox(i + 'select' + recommenedtests[i]["id"], recommenedtests[i]["id"]);
				
					if (($("#" + i + "select" + recommenedtests[i]["id"]).val() != "") && ($('#' + i + 'labtestfees' + recommenedtests[i]["id"]).text() == "Not provided"))//show error msg
                    {
                        if ($('#' + i + 'err' + recommenedtests[i]["id"]).html() == null) {
                            $('#laberr').html(errmsg + "<div id='" + i + "err" + recommenedtests[i]["id"] + "'>&bull;&nbsp;Please select other diagnostic center for " + testname + '</div>');
                        }
                    }
                    errmsg = $('#laberr').html();
                }
                calculatetotalfees();
                document.getElementById("testsnumber").value = recommenedtests.length;
            },
            error: function () {
                showMessage('250', '50', 'Errors', "Error while adding Diagnostic Tests. Please try again", 'error', 'errordialogboxid');
            }
        });
        $('#addpopup').dialog('open');
    }

    function checkboxonclick(objCheckbox, testid, testrownumber, testrate) {
        if ($(objCheckbox).is(':checked')) {
            document.getElementById(testrownumber + 'select' + testid).disabled = false;
            $('#' + testrownumber + 'labtestfees' + testid).text(testrate);
            calculatetotalfees();
        }
        else {
            document.getElementById(testrownumber + 'select' + testid).disabled = true;
            $('#' + testrownumber + 'labtestfees' + testid).text("0");
            $('#' + testrownumber + "err" + testid).remove();
            calculatetotalfees();
        }
    }

    function disableselectbox(selectboxid, testid) {
        var count = $('#' + selectboxid + " option").length;
        if (count != 1) {
        }
        else {
            $('#laberr').text('Please Add Diagnostic center to your Diagnostic center network.');
            $('#AddtoCartbutton').val('My Diagnostic network');
        }
    }

    function onclickaddtocart() {

        if ($('#laberr').html() == "Please Add Diagnostic center to your Diagnostic center network.") {
            window.location = '/ayushman/cpathologistdirectory/view';
        }
        else {

            var test = new Array();
            var testnumber = document.getElementById("testsnumber").value;
            var appid = document.getElementById("appid").value;
            var i = 0;
            var errmsg = '';
            for (var j = 0; j < testnumber; j++) {
                var testid = document.getElementById(j + "testid").value;
                if ($("#" + j + "select" + testid).val() == "")//if center is not selected and
                {
                    $('#' + j + 'labtestfees' + testid).text("Not provided");
                    var testname = $('#' + j + 'testname' + testid).text();
                    if ($('#err' + testid).html() == null) {

                        $('#laberr').html(errmsg + "<div id='" + j + "err" + testid + "'>&bull;&nbsp;Please select other diagnostic center for " + testname + '</div>');
                    }
                }
                errmsg = $('#laberr').html();
            }
            if (($('#laberr').html() == "") && ($('#AddtoCartbutton').val() != 'My Diagnostic network')) {
                for (var j = 0; j < testnumber; j++) {
                    var testid = document.getElementById(j + "testid").value;

                    if (($("#" + j + "checkbox" + testid).is(':checked'))) {
                        test[i] = new Array(2);
                        test[i][0] = testid
                        test[i][1] = $("#" + j + "select" + testid).val();
                        i++;
                    }
                }
                $.ajax({
                    url: "/ayushman/cpatientrequistiontests/savetocart?test=" + JSON.stringify(test),
                    success: function (data) {
                        if (!(isNaN(data))) {
                            $('#cartitemnumber').text(data);
                            closepopup('addpopup');
                            if ($("#cartitemnumber").text() == "0") {
                                $("#checkoutbutton").hide(true);
                            }
                            else {
                                $("#checkoutbutton").show(true);
                                /*if($("#addAndProceedStatus").val() == "true")
                                 {
                                 window.location='/ayushman/ccheckout/view';
                                 }*/
                            }
                            window.location.reload();
                        }
                    },
                    error: function () {
                        alert("something has gone wrong.Please contact system administrator.");
                    }
                });
            }
        }
    }

    function getfeesfortestid(select, id, testname, testrownumber) {
        var errmsg = $('#laberr').html();
        $.ajax({
            url: "/ayushman/cpatientrequistiontests/gettestdiscountedfee?testid=" + id + "&pathologistid=" + $(select).val(),
            success: function (data) {
                data = JSON.parse(data);
				console.log(data);
                if (data['originalfees'] == "Not provided") {
                    $('#' + testrownumber + 'labtestfees' + id).text("");
                    $('#' + testrownumber + 'labtestoriginalfees' + id).text("Not provided");
                    $('#' + testrownumber + 'labtestlabelfees' + id).text("");
                    $('#' + testrownumber + 'labeloriginalfees' + id).text("");
					
                    if ($('#' + testrownumber + 'err' + id).html() == null) {
                        $('#laberr').html(errmsg + "<div id='" + testrownumber + "err" + id + "'>&bull;&nbsp;Please select other diagnostic center for " + testname + '</div>');
                    }					
					if(data['batteryflag'])
					{
	                    $('#' + testrownumber + 'batidlabelfees' + id).text("");

						for(var i = 0;i <data['batterytestrates'].length ; ++i)
						{
							$('#batid' + id + 'testid' + data['batterytestrates'][i]['testid']).text(" ");  
						}
						$('#'+ testrownumber + 'batidfees' + id).text(" ");  
					}					
                }
                else {
                    $('#' + testrownumber + 'labtestfees' + id).text(data['discountedfees']);
                    $('#' + testrownumber + 'labtestoriginalfees' + id).text(data['originalfees']);
                    $('#' + testrownumber + 'labtestlabelfees' + id).text(" Your price(Rs.) :");
                    $('#' + testrownumber + 'labeloriginalfees' + id).text(" M.R.P(Rs.) :");
					if ($('#' + testrownumber + "err" + id) != null)//if error div is present for that test then delete it.
                    {
                        $('#' + testrownumber + "err" + id).remove();
                    }
					if(data['batteryflag'])
					{
						$('#' + testrownumber + 'labeloriginalfees' + id).text("Package price(Rs.) :");
						$('#' + testrownumber + 'batidlabelfees' + id).text("M.R.P(Rs.) :");
						var total = 0;
						for(var i = 0;i <data['batterytestrates'].length ; ++i)
						{
							$('#batid' + id + 'testid' + data['batterytestrates'][i]['testid']).text(data['batterytestrates'][i]['testrate']);  						
							total = Number(total) + Number(data['batterytestrates'][i]['testrate']) ;
						}						
						$('#'+ testrownumber + 'batidfees' + id).text(total);  
					}
                }
                calculatetotalfees();
            },
            error: function () {
                alert("something has gone wrong. Could not retrieve fees for the test. Please contact system administrator.");
            }
        });
    }

    function closepopup(name) {
        $('#' + name).dialog('close');
    }

    function testcatagartyonchange(selectlist) {
        window.location = "/ayushman/cpatientrequistiontests/setwherefororderedtestsFootable?where=" + $(selectlist).val();
    }

    function dump(obj) {
        var out = '';
        for (var i in obj) {
            out += i + ": " + obj[i] + "\n";
        }
        alert(out);
        // or, if you wanted to avoid alerts...
        /* var pre = document.createElement('pre');
         pre.innerHTML = out;
         document.body.appendChild(pre)*/
    }


    function onclickproceed() {
        $('#addAndProceedStatus').val("true");
        onclickaddtocart();
    }

    $(document).ready(function () {
        $('#addpopup').dialog({
            autoOpen: false,
            position: [150, 150],
            show: "fade",
            hide: "fade",
            width: 200,
            modal: true,
            height: "auto",
            resize: "auto",
            resizable: false
        });
        $('#informationpopup').dialog({
            autoOpen: false,
            show: "fade",
            position: [150, 150],
            hide: "fade",
            width: "500px",
            modal: true,
            height: "auto",
            resize: "auto",
            resizable: false
        });
        $(".ui-dialog-titlebar").hide();
        if ($("#cartitemnumber").text() == "0") {
            $("#checkoutbutton").hide(true);
        }
        dropdown = document.getElementById("testcatagarty");
        itemToSelect = "<?= $where?>";
        for (iLoop = 0; iLoop < dropdown.options.length; iLoop++) {
            if (dropdown.options[iLoop].value == itemToSelect) {
                dropdown.options[iLoop].selected = true;
                break;
            }
        }
        tour = {
            id: "hello-hopscotch",
            i18n: {
                stepNums: [<?php echo '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""' . ',' . '""';?>]
            },


            steps: [

                {
                    title: "Requisition",
                    content: "Here you can place your order using <br/>(1).Presciption ordered by doctor using indiaOnlineHealth.<br/>(2).Reorder the previously ordered set of tests.<br/>(3).Search tests in list of tests, add to cart and place order.",
                    target: "#requisition",
                    fixedElement: false,
                    showCloseButton: false,
                    showNextButton: false,
                    placement: "bottom",
                    width: 250

                },
                {
                    title: "View Orders",
                    content: "Here you can view, track status and reassign your order to some other Pathologist.",
                    target: "#vieworder",
                    fixedElement: false,
                    showCloseButton: false,
                    showNextButton: false,
                    placement: "bottom",
                    width: 250
                },

                {
                    title: "Order from Presciptions",
                    content: "Here you can directly place order for the test prescribed by doctor to you using indiaOnlineHealth.",
                    target: "#prescriptionorder",
                    fixedElement: false,
                    showCloseButton: false,
                    showNextButton: false,
                    placement: "bottom",
                    width: 250
                },
                {
                    title: "Reorder",
                    content: "Get the list of previously ordered test and reorder the set again if you want. ",
                    target: "#reorder",
                    fixedElement: false,
                    showCloseButton: false,
                    showNextButton: false,
                    placement: "bottom",
                    width: 250
                },
                {
                    title: "Search and order",
                    content: "If you have a hardcopy of a prescription and you want to order tests this is the place where you can search and place order for the tests yourself. ",
                    target: "#searchtest",
                    fixedElement: false,
                    showCloseButton: false,
                    showNextButton: false,
                    placement: "bottom",
                    width: 250

                }
            ],
            showPrevButton: false,
            scrollTopMargin: 400,


        };

    });
    function showstep(step) {
        hopscotch.startTour(tour, step);
    }
    function hidestep() {
        hopscotch.endTour([true]);
    }

    $(document).ready(function () {
        $('.select-btn').click(function () {
            $('body').addClass('apply-modal-body')
        });

        $('.demo-container > table.demo > tr > td').click(function () {
            $(this).closest("tr").next().toggle();
        });

        setTimeout(function (){
            calculatetotalfees();
        },500);
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
<div class="col-sm-12 no-padding dignostic-container clearfix">
    <input type="hidden" id="cartitemnumber" align="right" onchange="cartItemNumberOnChage()" <?= $number; ?> />
	<input type="hidden" id="bookteststatus" align="right"  value="<?php echo $status; ?>" />

    <div class="tab-section">
        <ul>
            <li>
                <a id="requisition" name="requisition" onmouseover="showstep(0)" onmouseout="hidestep()"
                   class="active-tab" onclick="window.location='/ayushman/cpatientrequistiontests/view'">
                    Requisition </a>
            </li>
            <li>
                <a id="vieworder" name="vieworder" onmouseover="showstep(1)" onmouseout="hidestep()"
                   onclick="window.location='/ayushman/corderedtests/viewFootable'"> View </a>
            </li>
        </ul>
    </div>

    <table border="0" cellpadding="0" cellspacing="0" valign="top" class="sub-tab-sections clearfix">
        <tr>
            <td style="width:100%;">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="6" align="left" valign="middle" class="bodytext_normal sub-section-table">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                   <td id="prescriptionorder" name="prescriptionorder" onmouseover="showstep(2)" onmouseout="hidestep()"width="33%" class="bodytext_bold">
										<a href="/ayushman/cpatientrequistiontests/viewFootable" ><button class="btnstyle" id="order" value="" style="height: auto;padding: 3px;" >Order from Prescription</button></a>
									</td>
									<td id="reorder" name="reorder"onmouseover="showstep(3)" onmouseout="hidestep()" width="33%" class="bodytext_bold  active">
										<a href="/ayushman/cpatientrequistiontests/requistionorderedtestsFootable" class="active"><button class="btnstyle" id="reorderse" value="" style="height: auto;padding: 3px;" >Reorder</button></a>
									</td>
									<td id="searchtest" name="searchtest" onmouseover="showstep(4)" onmouseout="hidestep()" width="33%" class="bodytext_bold" >
										<a href="/ayushman/cpatientrequistiontests/searchandorderFootable"><button class="btnstyle" id="searchorder" value="" style="height: auto;padding: 3px;" >Search and Order</button></a>
									</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>       

        <!-- My Cart Display -->
        <tr class="visible-xs">
            <td height="15" border="0" align="left" class="Heading_Bg">
                <div width="50%" >
                    <img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>
                    <strong>&nbsp;&nbsp;Requested Items</strong>
                </div>
            </td>
        </tr>
    </table>
    <div class="demo-container hide-footable-sorting">
        <div class="tab-content">
            <div>
                <div class="tab-pane active" id="demo">
                    <table data-paging-limit="3" id="DTOrderFromPrescriptionCart" data-paging-size="5" class="table" data-sorting="true" data-paging="false" style="margin-bottom: 0px !important" ></table>
                </div>
            </div>
        </div>
    </div>
    <table border="0" cellpadding="0" cellspacing="0" valign="top" class="clearfix" class="table_roundBorder">
        <tr>
            <table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"
                   class="table_roundBorder">
                <tr>
                    <td align="left" valign="top" style=" border:none;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="checkout">
                            <tr valign="middle">
                                <td width="80%" height="30" align="right" class="bodytext_bold"
                                    style=" border-right:1px solid #a8c8d9;padding-right:5px;">Total service provider's
                                    fee (Rs.)
                                </td>
                                <td width="20%" class="bodytext_normal" style="text-align:right;">&nbsp;&nbsp;
                                    <lable id="labtesttotaloriginalfees">0</lable>
                                    &nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="40" align="right" valign="middle" bgcolor="#ecf8fb"
                        style="padding-right:10px;border-top:1px solid #a8c8d9">
                        <table width="98%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="4">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <lable id="laberrnew"></lable>
                                </td>
                            </tr>
                            <tr>
                                <td width="70%"><input type='hidden' id='removetestrownumber'
                                                       name='removetestrownumber'/><input type='hidden'
                                                                                          id='removetestid'
                                                                                          name='removetestid'/></td>
                                <td width="18%" align="right">
                                    <div class="button"
                                         style="width:100px; height:25px; line-height:23px; vertical-align:middle; text-align:center;"
                                         onclick="window.location='/ayushman/ccheckout/viewDTFootable'" id="checkoutbutton">Check
                                        Out
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </tr>
        <!-- My Cart Display -->
			<tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="search-order-table">
                    <form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data"
                          action="/ayushman/cpatientrequistiontests/searchandorderFootable">
                        <tr>
							<td>
								<div style="float:left;padding-top:10px" class="bodytext_bold">
								<input name ="catType" id ="catType" type="hidden" value="<?PHP echo $selectedcattype ?>" />									
								<?PHP
									if($selectedcattype == "Battery")
									{
										echo '<input name ="catologtype" id ="chkbattery" type="radio" checked onclick ="setvalues();"  style="margin-left:0px" /><span style="font-size:14px"> Health packages</span>';							
										echo '<input name ="catologtype" id ="chktest" type="radio" onclick ="setvalues();" style="margin-left:50px"/><span style="font-size:14px"> Tests </span>';
									}
									else
									{
										echo '<input name ="catologtype" id ="chkbattery" type="radio"  onclick ="setvalues();"  style="margin-left:0px" /><span style="font-size:14px"> Health packages </span>';							
										echo '<input name ="catologtype" id ="chktest" type="radio" checked onclick ="setvalues();" style="margin-left:50px"/><span style="font-size:14px"> Tests </span>';
									}
								?>
								</div>
                                <div class="search-patient">
                                    <table height="40" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" class="bodytext_bold">Search:</td>
                                            <td height="30"><input type="text" name="search" id="search"
                                                                   class="textarea" style="width:100%;"
                                                                   value="<?php if ($previousvalues != null) if (isset($previousvalues['search'])) echo $previousvalues['search']; ?>"
                                                                   class="bodytext_normal"/></td>
                                            <td align="right"><input type="submit" id="submitsearch"
                                                                     style="border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;"
                                                                     value=""/></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </form>
                </table>
            </td>
        </tr>
        <!--	<tr>
			<td style="width:100%;">
				<table width="100%" height="36"  cellpadding="5" cellspacing="0" style="display: none;" >
					<tr>
						<td >
							<?php
        //this is emr grid for patient we can put this in other page

        $tests= Request::factory('xjqgridcomponent/index');
        /*$tests->post('name','tests');
        $tests->post('height','280');
        $tests->post('width','815');
        $tests->post('sortname','categoryname_c');
        $tests->post('sortorder','desc');
        $tests->post('tablename','searchandordertest');//used for jqgridp
        $tests->post('columnnames', 'categoryname_c,testname,testid,remark,testid');//used for jqgrid
        $tests->post('whereclause',$whereclause);//used for jqgrid
        $columninfo = 	'[
                            {"name":"Category name","index":"categoryname_c","width":80},
                            {"name":"Test name","index":"testname","width":200,"formatter":testnameformatter},
                            {"name":"testid","index":"testid","width":100,"hidden":true},
                            {"name":"remark","index":"remark","width":100,"hidden":true},
                            {"name":"Action","index":"appointmentid","width":60,"formatter":addtocart}
                        ]';
        $tests->post('columninfo', $columninfo); */
        							$tests->post('editbtnenable','false');$tests->post('search',"true");

        							$tests->post('deletebtnenable','false');
        							$tests->post('savebtnenable','false');
        							if($previousvalues != null)
        								$previousvaluessearch=$previousvalues['search'];
        							else
        							 	$previousvaluessearch= "";
        							$tests->post('previousvaluessearch',$previousvaluessearch);
        							echo $tests->execute();
        ?>
									</td>
					</tr>
				</table>
			</td>
			<!--<td style="width:1%;" ><label  style="visibility:hidden;" id="patientid"></label></td>-->
        <!-- </tr> -->
    </table>
   
    <div class="demo-container hide-footable-sorting">
        <div class="tab-content">

            <div>
                <div class="tab-pane active" id="demo">
                    <table id="DTSearchAndOrder" data-paging-limit="3" class="table" data-sorting="true"
                           data-paging="true"></table>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 100px;" class="hidden-xs"></div>
    <div id="addpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb"
                    style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7"
                                                                  height="7"/></td>
                <td width="75%" align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold"
                    style="border-bottom:1px solid #a8c8d9;">Assign tests to Diagnostic Center
                </td>
                <td width="20%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold"
                    style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
                    <img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0"
                         onclick="closepopup('addpopup')"/>
                </td>
            </tr>
        </table>
        <div id="contentdiv" style="max-height:200px;overflow-y:auto;overflow-x:hidden;">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="40" colspan="3" align="left" valign="middle" style="border-bottom:1px solid #a8c8d9;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr id="testinfo" class="dignostic-reorder-popup">

                            </tr>
                            <tr>

                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="auto" colspan="3" align="left" valign="middle">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="40" align="left" class="bodytext_error"
                                    style="width:30%;padding-left:10px;">
                                    <lable id="laberr"></lable>
                                </td>
                                <!--<td height="40" align="right" class="bodytext_bold" style="width:40%;padding-top:10px;"
                                    valign="top">Total Amount&nbsp;:&nbsp; </td>
                                <td id="tdtotalamount" class="bodytext_normal" style="width:30%;padding-top:10px;"
                                    valign="top">
                                    <lable id="labtesttotalfees" class='totalfee'>0</lable>
                                </td>-->
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <table width="100%" height="auto" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ecf8fb"
               style="padding-right:10px;border-top:1px solid #a8c8d9;">
            <tr>
                <td width="20%">
                    <input type='hidden' id='testsnumber' name='testsnumber'/>
                    <input type='hidden' id='addAndProceedStatus' name='addAndProceedStatus'/></td>
                <!-- 				<td width="30%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:2px;">
                 --><!-- 					<input id="AddtoCartbutton" type="button" class="button" value="Add to cart & proceed"  onclick="onclickproceed()" readonly="readonly"   style="outline:none;width=100%;height:25px" /></td>
 -->
                <td width="80%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:2px;">
                    <input id="AddtoCartbutton" type="button" class="button" value="Add " onclick="onclickaddtocart()"
                           readonly="readonly" style="outline:none;height:25px;margin-right:10px;width: 80px;"/>
                    <input id="AddtoCartbutton" type="button" class="button" value="Cancel"
                           onclick="closepopup('addpopup')" readonly="readonly" style="outline:none;height:25px;margin-right:10px;width: 80px;"/> </td>
            </tr>
        </table>
    </div>
    <div id="informationpopup" style="width:500px;overflow-x:hidden; background-color:#ffffff;border:1px solid #a8c8d9;"
         class="table_roundBorder" overflow-x="hidden">
        <div
            style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
            &nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
            <label id="informationheading" class="bodytext_bold">Information</label>
            <label style="float:right; height:25px;"><img src="/ayushman/assets/images/Close_Icon.png"

                                                                          style="cursor:pointer;padding-right:10px;"
                                                                          onclick="$('#informationpopup').dialog('close');"/></label>
        </div>
        <div id="informationbody" style="width:96%;margin:10px;"></div>
        <div
            style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="80%">&nbsp;</td>
                    <td width="21%" style="padding-top:5px;">
                        <div class="button"
                             style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;float:right;"
                             onclick="$('#informationpopup').dialog('close');">Ok
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- Function added for Cart functionality -->

<script type="text/javascript">
    $(document).ready(function () {
        if ("<?= count($tests);?>" == "0") {
            $("#checkoutbutton").hide(true);
            window.location = "<?= $referer;?>";
        }
        $('#addtonetwork').dialog({
            autoOpen: false,
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
 
	function calculatetotalfees() {
        var arrayOfIds = $.map($(".fee"), function (n, i) {
            return n.id;
        });
        uniquearrayOfIds = arrayOfIds.filter(function (elem, pos) {
            return arrayOfIds.indexOf(elem) == pos;
        })
        var total = 0;
        for (var i = 0; i < arrayOfIds.length; i++) {
            var num = Number($('#' + arrayOfIds[i]).html());
            if (!isNaN(num))
                total = Number(total) + Number($('#' + arrayOfIds[i]).html());
        }
        servicetaxonfees = ((parseFloat(total) * parseInt(<?php echo $diagnosticlabsservicetax; ?>)) / 100);
        $('#labtesttotalfees').text((total).toFixed(2));
        $('#servicetaxonfees').text(servicetaxonfees.toFixed(2));
        amountdue = parseFloat($('#labtesttotalfees').text()) + parseFloat($('#servicetaxonfees').text()) + parseFloat($('#labservicecharges').text()) + parseFloat($('#servicetaxonservicecharges').text());
        $('#amountdue').text(amountdue.toFixed(2));
        $('#labservicecharges').text(Number($('#labservicecharges').text()).toFixed(2));
        $('#labcurrentBalance').text(Number($('#labcurrentBalance').text()).toFixed(2));
        var labservicecharges = $('#labservicecharges').text();
        //var currentbalance =$('#labcurrentBalance').text();
        //var balanceafter = Number(currentbalance)-(Number(amountdue));
        //balanceafter = Number((balanceafter).toFixed(2));
        //if(balanceafter < 0)
        //{
        var errmsg = $('#laberr').html();
        //	document.getElementById("checkoutbutton").style.width= "80px";
        //	$("#checkoutbutton").val("Recharge");
        //	if(document.getElementById("errrecharge") == null)
        //	{
        //		$('#laberr').html(errmsg+"<div id='errrecharge' >&bull;&nbsp;Please recharge your account.</div>");
        //	}
        //}
        //else
        //{
        document.getElementById("checkoutbutton").style.width = "140px";
        $("#checkoutbutton").val("Proceed to checkout");
        if (document.getElementById("errrecharge") !== null) {
            $('#errrecharge').remove();
        }
        //}
        //$('#labBalanceAfterttran').text(balanceafter);

        var arrayOfIds = $.map($(".originalfee"), function (n, i) {
            return n.id;
        });
        uniquearrayOfIds = arrayOfIds.filter(function (elem, pos) {
            return arrayOfIds.indexOf(elem) == pos;
        })
        var originaltotal = 0;
        for (var i = 0; i < arrayOfIds.length; i++) {
            var num = Number($('#' + arrayOfIds[i]).html());
            if (!isNaN(num))
                originaltotal = Number(originaltotal) + Number($('#' + arrayOfIds[i]).html());
        }
        $('#labtestoriginaltotalfees').text((originaltotal).toFixed(2));

        diff = originaltotal - total;
        $('#labtesttotaloriginalfees').text((originaltotal).toFixed(2));
        $('#labtesttotaldifffees').text((diff).toFixed(2));

    }

    function removetest(rownumber, testid, testname) {
        showMessage('250', '50', 'Remove test', 'Do you really want to remove test ' + testname + ' ?', 'confirmation', 'confirmRemoveTest');
        $("#removetestrownumber").val(rownumber);
        $("#removetestid").val(testid);

    }

    function Confirmation_Event(id, confirmation) {
        if (id == 'confirmRemoveTest') {
            if (confirmation == 'yes') {
                removeselectedtest();
            }
        }
    }

    function removeselectedtest() {
        var rownumber = $("#removetestrownumber").val();
        var testid = $("#removetestid").val();
        $.ajax({
            url: "/ayushman/ccheckout/removetest?testid=" + testid + "&rownumber=" + rownumber,
            success: function (data) {
                //parent.getcontent('/ayushman/ccheckout/view');
                window.location.reload();
            },
            error: function () {
                alert("something has gone wrong. Could not remove test. Please contact system administrator.");
            }
        });

    }
    function findValuePresentinarray(arr, value) {
        if (arr.length != 0) {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i][0] === value) {
                    return "true";
                    break;
                }
            }
        }
        else
            return "false";
    }
    function closepopup(name) {
        $('#' + name).dialog('close');
    }

    function addpathologist() {
        var count = document.getElementById("addpathologistcount").value;
        var arr_pathologistId = new Array();
        for (var j = 0; j < count; j++) {
            var pathid = document.getElementById(j + "pathologistid").value;
            if ($("#" + j + "checkbox" + pathid).is(':checked')) {
                arr_pathologistId.push(pathid);
            }
        }
        $.ajax({
            url: '/ayushman/ccheckout/addnewpathologist?arr_pathologistId=' + JSON.stringify(arr_pathologistId),
            success: function (data) {
                parent.getcontent('/ayushman/ccheckout/view');
            },
            error: function () {
                showMessage('550', '200', 'Add Diagnostic Center', "Error occured while adding Diagnostic Center in your network. Please contact system administrator", 'error', 'id');
            }
        });
    }
function setvalues()
{
	//alert(document.getElementById("chktest").checked);
	if(document.getElementById("chktest").checked)
	{
		document.getElementById("catType").value = "test";
	}
	else
	{
		// Battery option selected
		document.getElementById("catType").value = "Battery";
	}
	$("#submitsearch").trigger("click");
}

</script>
<!-- Cart functionality ends here -->
<script type="text/javascript">
    var $j = $.noConflict(true);
</script>
<script src="/ayushman/assets/jsF/jquery.min.js"></script>
<!--<script src="/ayushman/assets/jsF/jquery-ui.min.js"></script>-->
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
<?php $result_searchAndOrder_json = json_encode($resultsearchandorder); ?>
<script>
    jQuery(function ($) {
        $('#DTSearchAndOrder').footable({
            "columns": [
                            {"name": "categoryname_c", "title": "Category name", "width": 80, "breakpoints": "xs"},
                            {"name": "testname", "title": "Test name", "width": 200, "hidden": true, "visible": false,},
                            {"name": "testid", "title": "Test name", "width": 100, "formatter": testsformatter},
                            {"name": "remark", "title": "remark", "width": 100, "hidden": true, "visible": false},
                            {"name": "testid", "title": "Action", "width": 60, "formatter": addtocart}
                        ],
            "rows":<?php echo $result_searchAndOrder_json ?>
        });
    });
</script>
<script>
    jQuery(function ($) {
        $('#DTOrderFromPrescriptionCart').footable({

            "columns": [
                            {"name": "cartid", "title": "cartid", "visible": false, "width": 100, "hidden": true},
                            {"name": "testname", "title": "Items"},
                            {"name": "id", "title": "Providers", "breakpoints": "xs", "formatter": getPathologist},
                            {"name": "pathologistid", "title": "Provider", "visible": false},
                            {"name": "pathologistList", "title": "Pathology List", "hidden": true, "visible": false},
                            {"name":"rate","title":"Item Price (Rs.)","breakpoints":"xs","formatter":AddLabelIdformatter},
                            {"name":"discountedpercent","title":"Discount(%)","breakpoints":"xs","formatter":DiscountLabelformatter},
                            {"name":"id","title":"Discounted Price (Rs.)","breakpoints":"xs","formatter":DiscounterPriceFormatter},
                            {"name": "testreqdate", "title": "testreqdate", "type": "date", "formatString": "DD MMM YYYY", "breakpoints": "xs", "visible": false, "width": 100, "hidden": true},
                            {"name": "id", "title": "Remove", "formatter": removeOrdersPrescription}
                        ],
            "rows":<?php echo $tests_json;?>
        });
    });
</script>
