<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<script src="/ayushman/assets/js/jquery.handsontable.js"></script>
<script src="/ayushman/assets/js/jquery.flot.min.js"></script>
<script src="/ayushman/assets/js/jquery.flot.time.min.js"></script>
<script src="/ayushman/assets/js/excanvas.min.js"></script>
<script src="/ayushman/assets/js/jquery.flot.selection.min.js"></script>
<script src="/ayushman/assets/js/angular.min.js"></script>
<script src="/ayushman/assets/js/controllers.js"></script>
<link rel="stylesheet" media="screen" href="/ayushman/assets/css/jquery.handsontable.css">
<style type="text/css">
  .tracksheet {
    width:100%;
    height:auto;
    padding-left:5px; 
    border-bottom:1px solid #a8c8d9;
    line-height:2em;
  }
  .right-menu-icon{
    position:absolute;
    float:right;
    top:0;
    right:0;
    width:33%;
  }
  .right-menu{
    display:none;
    position:absolute;
    width:13%;
    height:auto;
    float:right;
    top:33;
    right:0;
    border:1px solid #11587E;
    background-color:#FFF;
  }
  .menu-label{
    width:91%;
    height:3em;
    border-bottom:1px solid #CCC;
    text-align:left;
    padding-left:10px;
    line-height:3em;
    cursor:pointer;
    font-size:12px;
  }
  .graph{
      border:1px solid rgb(189, 180, 180);
      padding:3px; 
      position: absolute;
      z-index: 10;
      background-color:#fff;
      display:none;
      border-radius: 2px;
      height:120px;
  }
  .graph_button {
		position: absolute;
		cursor: pointer;
	}
  .notification{
    display: none;
    position: fixed;
    top: 0;
    left: 40%;
    background-color: #FAFAAA;
    font-weight: bold;
  }
</style>

<body style='width:99%;min-height:600px;' ng-app>
  <div id='notification' class='notification'>
    <span id='notification_message' style="border:2px solid #f0c36d;background-color:#f9edbe;" class='bodytext_bold'></span>
  </div>
  <?php if(($current_tracksheet) != ''){ ?>
      <div id='<?php echo $current_tracksheet["id"]."_container"; ?>' >
        <div class="tracksheet">
          <label><img src="/ayushman/assets/images/heading-icon.png" border="0" ></label>
          <label style="font-size:16px; padding-left:0.5em;" class="bodytext_bold track_name"><?php echo $current_tracksheet['name']; ?></label>
          <span class="edit_sheet_name_popup" style='display:none'>
              <input type='text' class='textarea' id='sheet_name_input' value="<?php echo $current_tracksheet['name']; ?>" >
              <input type='hidden' id='sheet_id_input' value="<?php echo $current_tracksheet['id']; ?>" />
              <button id='update_sheet_name' class='button' style='height:20px' onclick='update_sheet_name(this);'>Save</button>
          </span>
          <?php if($current_tracksheet['is_owned'] == true) { ?>
            <a class='bodytext_normal edit_link' style='margin-left:1em;cursor:pointer;text-decoration:underline;' onclick='edit_sheet_name(this);'>Edit</a>
          <?php } ?>
        </div>
        <div id="<?php echo $current_tracksheet['id']; ?>_graph_place_holder" class='graph' style='min-width:300px;' title='Drag mouse over dates to zoom.'></div>
        <div id="<?php echo $current_tracksheet['id']; ?>_tracksheet" class="grid" style='margin-top:5px;width:auto'></div>
        <span class="save_tracktemplate" style='display:none'>
          <label class='bodytext_bold'>Enter template name: &nbsp;&nbsp;</label>
          <input type='text' class='textarea' id='template_name' />
          <button class='button' style='height:20px' onclick='save_template(this);'>Save</button>
          <button class='button' style='height:20px' onclick='$(this).parent().next().show();$(this).parent().hide();'>Cancel</button>
        </span>
        <p><button class='button' onclick='$(this).parent().prev().show();$(this).parent().hide();'>Save Template</button></p>
      </div>
  <?php } else { ?>
    <h2>There are no tracksheets for this incident. Click on any of the buttons to begin.</h2>
  <?php } ?>
  <div class="right-menu-icon">
    <button class='button' style='height:23px;' onclick='add_tracksheet();'>Add New Tracksheet</button>
    <button class='button' style='height:23px;' onclick='$("#track_list").hide();$("#template_list").toggle();'>Add From Template</button>
    <button class='button' style='height:23px;' onclick='$("#template_list").hide();$("#track_list").toggle();'>Other Tracksheets</button>
  </div>
  <div class="right-menu" id='track_list' ng-controller='tracklistCtrl'>
    <?php if(count($other_tracksheets) > 0) { ?>
      <div class="menu-label bodytext_normal" style='height:6em'>
        <label class='bodytext_bold'>Search</label>
        <input class='textarea' ng-model='query'>
      </div>
      <div ng-repeat = 'other_track in other_tracklist | filter:query'>
        <div class="menu-label bodytext_normal">
          <label onclick='load_tracksheet(this);' style='cursor:pointer'>{{other_track.name}}</label>
          &nbsp;&nbsp;<label ng-show='other_track.is_owned' onclick='delete_tracksheet(this)' style='cursor:pointer;align:right'>&#x2717</label>
          <input type='hidden' class='other_sheet_id' value={{other_track.id}} />
        </div>
      </div>
    <?php } else { ?>
      <div class="menu-label" class="bodytext_normal">No other tracksheets</div>
    <?php } ?>
  </div>
  <div class="right-menu" id='template_list' ng-controller='templatelistCtrl'>
    <?php if(count($templates) > 0) { ?>
      <div class="menu-label bodytext_normal" style='height:6em'>
        <label class='bodytext_bold'>Search</label>
        <input class='textarea' ng-model='query'>
      </div>
      <div ng-repeat = 'template in template_info | filter:query'>
        <div class="menu-label bodytext_normal">
          <label onclick='load_template(this);' style='cursor:pointer'>{{template.name}}</label>
          &nbsp;&nbsp;<label ng-show='template.is_owned' onclick='delete_template(this)' style='cursor:pointer;align:right'>&#x2717</label>
          <input type='hidden' class='template_id' value={{template.id}} />
        </div>
      </div>
    <?php } else { ?>
      <div class="menu-label" class="bodytext_normal">No Templates</div>
    <?php } ?>
  </div>
</body>

<script>
  var other_tracksheets = {};
  other_tracksheets = <?php echo json_encode($other_tracksheets); ?>;
  var templates = {};
  templates = <?php echo json_encode($templates); ?>;
  function delete_template(label_object){
    var div_object = $(label_object).parent();
    var id = $(div_object).find('.template_id').val();
    $('#notification').show();
    $('#notification_message').text('Deleting template...');
    $.ajax({
      type: "GET",
      url: "/ayushman/ctracksheet/deleteTemplate/get?template_id="+id,
      success: function(data) {
        $('#notification').show();
        $('#notification_message').text('Template deleted successfully...');
        setTimeout("$('#notification').hide()", 3000);
        $(div_object).remove();
      },
      error: function(){
        $('#notification').show();
        $('#notification_message').text('Error occurred while deleting template. Please try again...');
        setTimeout("$('#notification').hide()", 3000);
      }
    });
  }
  function load_template(label_element){
    var row_element = $(label_element).parent();
    var template_id = $(row_element).find('.template_id').val();
    $.ajax({
      type: "GET",
      url: "/ayushman/ctracksheet/createFromTemplate/get?app_id="+<?php echo $app_id; ?>+"&template_id="+template_id,
      success: function(data) {
        document.location='/ayushman/ctracksheet/view/get?app_id='+<?php echo $app_id; ?>+'&load_id='+data;
      },
      error: function(){
      }
    });
  }
  function save_template(button_element){
    var template_name = $(button_element).prev().val();
    if(template_name == ''){
      alert('Please enter a template name');
      return;
    }
    var div_element = $(button_element).parent().parent();
    var id = $(div_element).attr('id').split('_')[0];
    var this_column_info = grid_info[id]['column_info'];
    var post_data = new Array();
    post_data.push(template_name);
    var header = new Array();
    for (var i=1; i<this_column_info.length-1; i++ ){
      header.push(this_column_info[i]['data']);
    }
    post_data.push(header);
    $('#notification').show();
    $('#notification_message').text('Saving template...');
    $(button_element).text('Saving...');
    $.ajax({
      type: "post",
      url: "/ayushman/ctracksheet/saveTemplate",
      data: {data:post_data},
      success: function(data) {
        $('#notification_message').text('Template created successfully...');
        $(button_element).text('Save');
        $(button_element).next().trigger('click');
        setTimeout("$('#notification').hide()", 2000);
      },
      error: function(){
        $('#notification_message').text('Error occurred. Please try again...');
        $(button_element).text('Save');
        setTimeout("$('#notification').hide()", 2000);
      }
    });
  }
  function delete_tracksheet(label_object){
    var div_object = $(label_object).parent();
    var id = $(div_object).find('.other_sheet_id').val();
    $('#notification').show();
    $('#notification_message').text('Deleting...');
    $.ajax({
      type: "GET",
      url: "/ayushman/ctracksheet/delete/get?sheet_id="+id,
      success: function(data) {
        $('#notification').show();
        $('#notification_message').text('Sheet deleted successfully...');
        setTimeout("$('#notification').hide()", 3000);
        $(div_object).remove();
      },
      error: function(){
        $('#notification').show();
        $('#notification_message').text('Error occurred while deleting. Please try again...');
        setTimeout("$('#notification').hide()", 3000);
      }
    });
  }
  function load_tracksheet(label_object){
    var div_object = $(label_object).parent();
    var load_id = $(div_object).find('.other_sheet_id').val();
    document.location='/ayushman/ctracksheet/view/get?app_id='+<?php echo $app_id; ?>+'&load_id='+load_id;
  }
  var grid_info = Array();
  var incident_tracksheet;
  function update_sheet_name(button_element){
    var parent_div = $(button_element).parent();
    $(button_element).text('Saving...');
    var sheet_id = $(parent_div).find('#sheet_id_input').val();
    var sheet_name = $(parent_div).find('#sheet_name_input').val();
    $.ajax({
      type: "GET",
      url: "/ayushman/ctracksheet/update/get?sheet_id="+sheet_id+"&sheet_name="+sheet_name,
      success: function(data) {
        var div_id = sheet_id+'_container';
        var track_label = $('#'+div_id).find('.track_name');
        $(track_label).text(sheet_name);
        $(track_label).show();
        $('#'+div_id).find('.edit_link').show();
        $(button_element).text('Save');
        $('#'+div_id).find('.edit_sheet_name_popup').hide();
      },
      error: function(){
      }
    });
  }
  function edit_sheet_name(link_object){
    var parent_div = $(link_object).parent();
    var name_div = $(parent_div).find('.track_name');
    var edit_div = $(parent_div).find('.edit_sheet_name_popup');
    $(name_div).hide();
    $(link_object).hide();
    $(edit_div).show();
  }
  function add_tracksheet(){
    $.ajax({
      type: "GET",
      url: "/ayushman/ctracksheet/create/get?app_id="+<?php echo $app_id; ?>,
      success: function(data) {
        document.location='/ayushman/ctracksheet/view/get?app_id='+<?php echo $app_id; ?>+'&load_id='+data;
      },
      error: function(){
      }
    });
  }
  var genarategraphData = function(col, container){
    var colData = $(container).handsontable("getDataAtCol", col);
    var dateData = $(container).handsontable("getDataAtCol", 0);
    var graph_data = Array();
    for(i=colData.length;i>0;i--)
    {
      if(parseInt(colData[i]))
      {
        var point_data = Array();
        var pattern = '-';
        var re = new RegExp(pattern, 'g');
        var this_date = dateData[i].replace(re, ' ');
        var time = Date.parse(this_date);
        point_data.push(time)
        point_data.push(parseInt(colData[i]))
        graph_data.push(point_data);
      } 
    }
    return graph_data;
  }
  var showgraph = function(e, cmp, grid_id){
    var id = grid_id.split('_')[0];
    if($('#'+id+'_graph_place_holder').is(':visible')){
      $('#'+id+'_graph_place_holder').hide();
    }
    else{
      var y_co = $('#'+e).offset().top + 20;
      var x_co = $('#'+e).parent().offset().left;
      var container = $('#'+id+'_tracksheet');
      var position = $(cmp).offset();
      var col = e.split("_")[1];
      var graph_data = genarategraphData(col,container);
      graph_data = [graph_data];
      console.log(graph_data);
      var height = $('#'+id+'_tracksheet').css('height');
      height = height.substring(0,height.length-2);
      height = parseInt(height) - 24;
      $('#'+id+'_graph_place_holder').css('height',height);
      $('#'+id+'_graph_place_holder').css('width','300px');
      var placeholder = $('#'+id+'_graph_place_holder');
      var options = {
			  series: {
				  lines: {
					  show: true
				  },
				  points: {
					  show: true
				  }
			  },
			  xaxis: {
				  tickDecimals: 0,
          mode: "time",
          minTickSize: [1,'day'],
			  },
			  yaxis: {
				  min: 0
			  },
			  selection: {
				  mode: "x"
			  }
		  };
      placeholder.bind("plotselected", function (event, ranges) {
        plot = $.plot(placeholder, graph_data, $.extend(true, {}, options, {
					xaxis: {
						min: ranges.xaxis.from,
						max: ranges.xaxis.to
					}
        }));
      });
      var plot = $.plot(placeholder, graph_data, options);
      //$.plot($('#'+id+'_graph_place_holder'), graph_data, {xaxis: { mode: "time",minTickSize: [1, "day"] }});
      $('#'+id+'_graph_place_holder').css('top',y_co);
      $('#'+id+'_graph_place_holder').css('left',x_co);
      $('#'+id+'_graph_place_holder').show(200);
    }
  }
  var cellRenderer = function (instance, td, row, col, prop, value, cellProperties){    
    var grid_id = instance.view.settings.id;
    var colCount = instance.countCols();
    if(value == undefined){
      value = "";
    }
    if(row == 0 && col!= 0 && value != ""){
      var click_action = 'showgraph(this.id, this,"'+grid_id+'" );';
      value +=" <img id='graph_"+col +"' onClick='"+click_action+"' src='/ayushman/assets/images/bar_graph.png' width='15px' height='15px' style='cursor:pointer' />"
    }
    if(col!=0){
      if(value == ""){ 
        if(row == 0){
          value = "Param";
        }
        else if (row == 1){
          value = "Value"
        }
        else{
          value="NR";
        }
      td.style.color = '#999';
      }
    }
    else{
      if(value == ''){
        value='dd-MMM-YYYY hh:mm';
        td.style.color = '#999';
      }
    }
    td.innerHTML = value;
    return td;
  };
  var cellProp = function(row, col, prop) {
    var cellProperties = {};
    var col_count = this.instance.countCols();
    if(row == 0 && col < col_count-1){
      cellProperties.readOnly = true;
    }
    return cellProperties;
  };
  var read_only_cellProp = function(row, col, prop) {
    var cellProperties = {};
    cellProperties.readOnly = true;
    return cellProperties;
  };
  function add_parameter(id, changes, table_object){
    var this_grid_info = grid_info[id];
    var column_info = (this_grid_info['column_info']);
    var grid_data = this_grid_info['data'];
    var new_column = new Object();
    new_column['data'] = changes[0][3];
    new_column['type'] = {renderer: cellRenderer};
    column_info.pop();
    column_info.push(new_column);
    grid_data[0][changes[0][3]] = changes[0][3];
    delete grid_data[0][''];
    new_column = new Object();
    new_column['data'] = '';
    new_column['type'] = {renderer: cellRenderer};
    this_grid_info['column_info'].push(new_column);
    table_object.loadData(grid_info[id]['data']);
    table_object.updateSettings(settings);
  }
  function create_new_row(id, table_object){
    var grid_data = grid_info[id];
    var column_info = grid_data['column_info'];
    var data_info = grid_data['data'];
    var new_row = new Object();
    new_row['Date'] = '';
    for(var i=1; i<column_info.length; i++){
      new_row[column_info[i]['data']] = '';
    }
    data_info.splice(1, 0, new_row);
    table_object.loadData(grid_info[id]['data']);
    table_object.updateSettings(settings);
  }
  var isValidDate = function (value) {
    date_value = value.split(' ')[0];
    var time_value = value.split(' ')[1];
    if(time_value){
      time_value = time_value.split(':');
      if(!(time_value[0] >=0 && time_value[0] <=23 && time_value[1]>=0 && time_value[1]<=59)){
        return 'false';
      }
    }
    var userFormat = 'dd-mmm-yyyy', // default format
    delimiter = /[^mdy]/.exec(userFormat)[0],
    theFormat = userFormat.split(delimiter),
    theDate = date_value.split(delimiter),
    isDate = function (date, format) {
      var m, d, y  
      for (var i = 0, len = format.length; i < len; i++) {
        if (/m/.test(format[i])) m = date[i]
        if (/d/.test(format[i])) d = date[i]
        if (/y/.test(format[i])) y = date[i]
      }
      if (month.indexOf(m.toLowerCase()) == -1){
        return false;
      }
      if(!(y && y.length === 4)){
        return false;
      }
      if(!(d > 0 && d <= (new Date(y, month.indexOf(m), 0)).getDate())){
        return false;
      }
      return true;
    }
    return isDate(theDate, theFormat)
  }
  var afterChange = function(changes, source){
    var id = this.view.settings.id.split('_')[0];
    var this_grid_info = grid_info[id];
    if(changes != null){
      if(changes[0][1] == 'Date' && changes[0][0] == 1){
        var row_date = this.getDataAtCell(changes[0][0],0);
        var is_date = isValidDate(row_date);
        if(is_date == false){
          alert('Please check date format');
          return;
        }
        else{
          create_new_row(id, this);
        }
      }
      else if (changes [0][1] == ''){
        if(changes[0][0] == 0){
          add_parameter(id, changes, this);
        }
        else{
          alert('Please specify parameter name');
        }
      }
      else{
        if(changes[0][2] != changes[0][3]){
          var table_object = this;
          var row_date = this.getDataAtCell(changes[0][0],0);
          var is_date = isValidDate(row_date);
          if(is_date == false){
            alert('Please check date format');
            return;
          }
          changes.push(id);
          changes.push(row_date);
          $('#notification').show();
          $('#notification_message').text('Saving Data...');
          $.ajax({
            type: "post",
            url: "/ayushman/ctracksheet/save",
            data: {data:changes},
            success: function(data) {
              $('#notification').show();
              $('#notification_message').text('Data saved successfully!');
              setTimeout("$('#notification').hide()", 1000);
            },
            error: function(data){
              $('#notification').show();
              $('#notification_message').text('An error occurred while saving '+changes[0][1]+' for '+changes[2]+'. Please try again.');
              setTimeout("$('#notification').hide()", 3000);
              var col_index = table_object.propToCol(changes[0][2]);
              table_object.selectCell(changes[0][1], col_index, changes[0][1], col_index);
            }
          });
          if(changes[0][0] == 1){
            create_new_row(id, this);
          }
        }
      }
    }
  };
  var settings = {
    cells: cellProp
  };
  var gridsettings = {
    rowHeaders:false,
    colHeaders: false,
    fillHandle: false,
    autoWrapRow:true,
    autoWrapCol:true,
    colHeaders: false,
    minSpareCols: 1,
    cells: cellProp,
    afterChange: afterChange,
    enterBeginsEditing:false,
    fixedColumnsLeft: 1,
  };
  
  $(document).ready(function(){
    incident_tracksheet = <?php echo json_encode($current_tracksheet); ?>;
    if(incident_tracksheet != ''){
        create_tracksheet(incident_tracksheet);
    }
  });
  var month = new Array();
    month[0]="jan";
    month[1]="feb";
    month[2]="mar";
    month[3]="apr";
    month[4]="may";
    month[5]="june";
    month[6]="july";
    month[7]="aug";
    month[8]="sep";
    month[9]="oct";
    month[10]="nov";
    month[11]="dec";
  function get_date(timestamp){
    var dat;
    if(timestamp == null){
      dat = new Date();
    }
    else{
      dat = new Date(parseInt(timestamp)*1000);
    }
    var day = dat.getDate();
    var month_str = month[dat.getMonth()];
    month_str = month_str.charAt(0).toUpperCase() + month_str.slice(1);
    var year = dat.getFullYear();
    var hour = dat.getHours();
    var min = dat.getMinutes();
    return day+'-'+month_str+'-'+year+' '+hour+':'+min;
  }
  function create_tracksheet(tracksheet_info, is_owned){
    var tracksheet_id = tracksheet_info.id;
    var tracksheet_headers = tracksheet_info.data[0];
    //prepare columns for grid
    var column_info = Array();
    for(var i=0; i<tracksheet_headers.length; i++){
      var info = Object();
      info['data'] = tracksheet_headers[i];
      info['type'] = {renderer: cellRenderer};
      column_info.push(info);
    }
    var info = Object();
    info['data'] = '';
    info['type'] = {renderer: cellRenderer};
    column_info.push(info);
    //prepare data for grid
    var tracksheet_data = Array();
    var header = Object();
    for(var i = 0; i<tracksheet_headers.length; i++){
      header[tracksheet_headers[i]] = tracksheet_headers[i];
    }
    tracksheet_data.push(header);
    if(tracksheet_info.is_owned == true){
      //prepare first blank row
      var first_row = new Object();
      first_row['Date'] = '';
      for(var i=1; i<tracksheet_headers.length; i++){
        first_row[tracksheet_headers[i]] = '';
      }
      tracksheet_data.push(first_row);
    }
    //prepare all other rows
    for(var i=0; i<tracksheet_info.data[1].length; i++){
      tracksheet_info.data[1][i]['Date'] = get_date(tracksheet_info.data[1][i]['Date']);
      tracksheet_data.push(tracksheet_info.data[1][i]);
    }
    var single_grid_info = Array();
    single_grid_info['column_info'] = column_info;
    single_grid_info['data'] = tracksheet_data;
    grid_info[tracksheet_id] = single_grid_info;
    render_grid(tracksheet_id, tracksheet_info.is_owned);
  }
  function render_grid(id, is_owned){
    var single_grid_info = grid_info[id];
    gridsettings.columns = single_grid_info['column_info'];
    gridsettings.data = single_grid_info['data'];
    gridsettings.id = id+'_grid';
    var container = $('#'+id+'_tracksheet');
    if(is_owned == true){
      container.handsontable(gridsettings);
    }
    else{
      gridsettings.cells = read_only_cellProp;
      container.handsontable(gridsettings);
      gridsettings.cells = cellProp;
    }
  }
</script>
