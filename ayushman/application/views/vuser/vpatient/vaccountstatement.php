<html>
<head>
    <title>Billing Plan Details</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
    <!--START: Pooja Gujarathi -->
    <link href="/ayushman/assets/cssF/footable.core.bootstrap.min.css"  rel="stylesheet" type="text/css">
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
    <script type="text/JavaScript">
        $(document).ready(function() {$(function() {

            $( "#fromdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
            var m_names =  new Array("Jan", "Feb", "Mar",
                "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                "Oct", "Nov", "Dec");

            var d = new Date();
            var curr_date = d.getDate();
            var curr_month = d.getMonth();
            var curr_year = d.getFullYear();
            if($('#fromdate').val() == ''){
                if(curr_month == 0){
                    $( "#fromdate" ).val(curr_date + " " + m_names[11] + " " + (curr_year - 1));
                }else{
                    $( "#fromdate" ).val(curr_date + " " + m_names[curr_month-1] + " " + curr_year);
                }
            }
            $( "#todate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
            var m_names =  new Array("Jan", "Feb", "Mar",
                "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                "Oct", "Nov", "Dec");

            var d = new Date();
            var curr_date = d.getDate();
            var curr_month = d.getMonth();
            var curr_year = d.getFullYear();
            if($('#todate').val() == ''){
                if(curr_month == 0){
                    $( "#todate" ).val(curr_date + " " + m_names[11] + " " + (curr_year - 1));
                }else{
                    $( "#todate" ).val(curr_date + " " +  m_names[curr_month] + " " + curr_year);
                }
            }
        });
            $('#benificiary').autocomplete({source:"/ayushman/cautocompletedata/retrieve?query=select distinct(benificiery) as value, 1 as id from statements where benificiery",
                select: function(event, ui) {

                },
                minLength: 2,
                disabled: false
            });


        });

    </script>
</head>
<body bgcolor="#FFFFFF" style="body_bg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div class="tab-section">
    <ul>
       <!-- <li>
            <a href="/ayushman/cplanmanager/showselectedplan"> Plan Details </a>
        </li>-->
        <li>
            <a class="active-tab" href="javascript://"> Statements </a>
        </li>
       <!-- <li>
            <a href="/ayushman/crecharge/view">Recharge  </a>
        </li>-->
    </ul>
</div>

<div class="accountstatement-container dignostic-container clearfix">
    <div class="content_bg statement-form-section">


        <form id="searchform" method="post" enctype="multipart/form-data"  action="/ayushman/caccountstatement/viewFootable"  >
            <div class="col-xs-12 no-padding search-statement-list">
                <div class="col-xs-4 block-list">
                    <span class="bodytext_normal">From</span>
                    <input name="fromdate" id="fromdate" readonly type="text" value="<?php if($previousvalues != null)if(isset($previousvalues['fromdate']))echo $previousvalues['fromdate']; ?>" class="textarea" size="17"/>
                </div>
                <div class="col-xs-4 block-list">
                    <span class="bodytext_normal">To</span>
                    <input name="todate" id="todate" type="text" readonly value="<?php if($previousvalues != null)if(isset($previousvalues['todate']))echo $previousvalues['todate']; ?>" class="textarea" size="17"/>
                </div>
                <div class="col-xs-4 block-list">
                    <span class="bodytext_normal1">Transaction Type</span>
                    <select name="transactiontype" size="1" style="width:115px;height: 20px;" class="textarea">
                        <?PHP
                        $type = array();
                        $type['Select'] = 'Select';
                        $type['Credit'] = 'Credit';
                        $type['Debit'] = 'Debit';

                        foreach ($type as $key=> $value) {
                            $selected = '';
                            if($previousvalues != null)
                                if(isset($previousvalues['transactiontype'])){
                                    if($previousvalues['transactiontype'] == $key)
                                    {
                                        $selected = 'selected';
                                    }
                                }
                            print "<option ".$selected."  \" value=\"{$key}\">{$value}</option>";
                        }
                        ?>
                    </select>
                </div>


                <div class="col-xs-4 block-list">
                    <span class="bodytext_normal">Benificiary</span>
                    <input name="benificiary" id="benificiary" type="text" value="<?php if($previousvalues != null)if(isset($previousvalues['benificiary']))echo $previousvalues['benificiary']; ?>" class="textarea" size="17"/>
                </div>
                <div class="col-xs-4 block-list">
                    <span class="bodytext_normal">Transaction</span>
                    <select name="description" size="1" style="width:115px;" class="textarea">
                        <option>Select</option>
                        <?PHP
                        $descriptions = array();
                        foreach ($types as $type) {

                            $descriptions[$type->typename_c] = $type->typename_c;
                        }
                        foreach ($descriptions as $key=> $value) {
                            $selected = '';
                            if($previousvalues != null)
                                if(isset($previousvalues['description'])){
                                    if($previousvalues['description'] == $key)
                                    {
                                        $selected = 'selected';
                                    }
                                }
                            print "<option ".$selected."  \" value=\"{$key}\">{$value}</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="col-xs-4 block-list">
                    <span class="bodytext_normal"><input type="submit" class="button" value="Search" /></span>
                </div>
            </div>

        </form>
    </div>
    <div class="demo-container">
        <div class="tab-content">

            <div>
                <div class="tab-pane active" id="demo">
                    <table data-paging-limit="3" id ="CPStatement" data-paging-size="10" data-paging-limit="3" class="table" data-sorting="true" data-paging="true" style="margin-bottom: 0px !important;"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="margin-bottom:100px;">&nbsp;</div>
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
</script>
<script>
    jQuery(function($){
        $('#CPStatement').footable({
            "columns": [
                        {"name":"statementcode","title":"Transaction Id","width":80},
                        {"name":"datetime","title":"Date & Time","breakpoints":"xs","width":80,"hidden":false},
                        {"name":"description","title":"Description","breakpoints":"xs","width":100},
                        {"name":"benificiery","title":"Payee/Payer","breakpoints":"xs","width":120,"hidden":false},
                        {"name":"credit","title":"Credit (Rs.)","breakpoints":"xs","width":60,"hidden":false,"align":"right"},
                        {"name":"debit","title":"Debit (Rs.)","breakpoints":"xs","width":60,"hidden":false,"align":"right"},
                        {"name":"netbalance","title":"Net Balance (Rs.)","width":110,"hidden":false,"align":"left"}
                    ],
            "rows":<?php echo $tests_json;?>
        });
    });
</script>
</body>
</html>