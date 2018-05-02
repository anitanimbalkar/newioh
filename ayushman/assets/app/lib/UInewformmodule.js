if(changedQuestion == undefined){
	var changedQuestion = {};		
}

var examinationQuestion = {};
var divtarget = '';
function formmodule(){
	var containers;
	var elements;
	var renderedForm;
	this.showForm = showForm;
	this.organize = organize;
	
	function showForm(formid,isSubForm, formTarget, formTextTarget, data,targetdiv){
		divtarget = targetdiv;
		jsonObj = eval("("+data+")");
		generateForm(jsonObj,formid, isSubForm, formTarget, formTextTarget,divtarget);
	}
	
	function generateForm(jsonObj,formid, isSubForm, formTarget, formTextTarget,divtarget){
		readData(jsonObj);
		var currForm = new Form(this.containers, this.elements, this.layout);
		this.renderedForm = currForm.renderForm(formid, isSubForm, formTarget, formTextTarget);
		
		if(divtarget == undefined){
			$('#form_place_holder').children().hide();
			this.renderedForm.appendTo($('#form_place_holder'));
		}else{
			$('#'+divtarget).children().hide();
			this.renderedForm.appendTo($('#'+divtarget));
		}
		organize('.verticalContainer');
		organize('.horizontalContainer');
		organize('.columnContainer');
		organize('.containerColumns');
	}
	
	function readData(jsonObj){
		this.containers = jsonObj['container'];
		this.elements 	= jsonObj['question'];
		this.layout 	= jsonObj['layout'];
	}
	
	function organize(className)
	{
		var x = this.renderedForm.find(className);
		var y = this.renderedForm.find('.formmultiselect');
		if(y.length){
			$(y).multiselect({
selected:2
			});
			$(y).height("12.5px");
		}
		if(x)
		{
			for(var i=0;i<x.length;i++)
			{
				var y = x[i];
				var z = $(y).find('label:visible');
				var maxLabelWidth = 0;
				for(var j=0;j<z.length;j++)
				{
					var currWidth = $(z[j]).width();
					if(currWidth > maxLabelWidth){
						maxLabelWidth = currWidth;
					}
				}
				maxLabelWidth = currWidth;
				for(var j=0;j<z.length;j++)
				{
					$(z[j]).width(maxLabelWidth);
					z[j].style.width = maxLabelWidth;
					z[j].style.display = "inline-block";
				}
				var z = $(y).find('select:visible');
				if(z.length > 0)
				{
					var maxInputWidth = 0;
					for(var j=0;j<z.length;j++)
					{
						var currWidth = $(z[j]).width();
						if(currWidth > maxInputWidth)
						maxInputWidth = currWidth;
					}
					for(var j=0;j<z.length;j++)
					{
						$(z[j]).width(maxInputWidth);
					}
					var z = $(y).find('input');
					for(var j=0;j<z.length;j++)
					{
						$(z[j]).width(maxInputWidth);
					}
				}
			}
		}
	}
}



//created by ravi
function formmodulea(){
	var containers;
	var elements;
	var renderedForm;
	this.showForma = showForma;
	this.organize = organize;
	
	function showForma(formid,isSubForm, formTarget, formTextTarget, data,targetdiv){
		divtarget = targetdiv;
		jsonObj = eval("("+data+")");
		generateForm(jsonObj,formid, isSubForm, formTarget, formTextTarget,divtarget);
	}
	
	function generateForm(jsonObj,formid, isSubForm, formTarget, formTextTarget,divtarget){
		readData(jsonObj);
		var currForm = new Form(this.containers, this.elements, this.layout);
		this.renderedForm = currForm.renderForm(formid, isSubForm, formTarget, formTextTarget);
		
		if(divtarget == undefined){
			$('#form_place').children().hide();
			this.renderedForm.appendTo($('#form_place'));
		}else{
			$('#'+divtarget).children().hide();
			this.renderedForm.appendTo($('#'+divtarget));
		}

		organize('.verticalContainer');
		organize('.horizontalContainer');
		organize('.columnContainer');
		organize('.containerColumns');
	}
	
	function readData(jsonObj){
		this.containers = jsonObj['container'];
		this.elements 	= jsonObj['question'];
		this.layout 	= jsonObj['layout'];
	}
	
	function organize(className)
	{
		var x = this.renderedForm.find(className);
		var y = this.renderedForm.find('.formmultiselect');
		if(y.length){
			$(y).multiselect({
selected:2
			});
			$(y).height("12.5px");
		}
		if(x)
		{
			for(var i=0;i<x.length;i++)
			{
				var y = x[i];
				var z = $(y).find('label:visible');
				var maxLabelWidth = 0;
				for(var j=0;j<z.length;j++)
				{
					var currWidth = $(z[j]).width();
					if(currWidth > maxLabelWidth){
						maxLabelWidth = currWidth;
					}
				}
				maxLabelWidth = currWidth;
				for(var j=0;j<z.length;j++)
				{
					$(z[j]).width(maxLabelWidth);
					z[j].style.width = maxLabelWidth;
					z[j].style.display = "inline-block";
				}
				var z = $(y).find('select:visible');
				if(z.length > 0)
				{
					var maxInputWidth = 0;
					for(var j=0;j<z.length;j++)
					{
						var currWidth = $(z[j]).width();
						if(currWidth > maxInputWidth)
						maxInputWidth = currWidth;
					}
					for(var j=0;j<z.length;j++)
					{
						$(z[j]).width(maxInputWidth);
					}
					var z = $(y).find('input');
					for(var j=0;j<z.length;j++)
					{
						$(z[j]).width(maxInputWidth);
					}
				}
			}
		}
	}
}

function Form(containers, elements, layout)
{
	this.containers		= containers;
	this.elements		= elements;
	this.renderForm 	= renderForm;
	this.layout 		= layout;
	function renderForm(formid, isSubForm, formTarget, formTextTarget)
	{
		var formDiv = $('<div id='+formid+' class="examform"></div>');
		var formContent = $('<div id='+formid+'Content class="formContent"></div>');
		var title=formid;
		title=title.charAt(0).toUpperCase() + title.slice(1);
		
		var titlediv = $('<h2 class = "darkblue" >'+title+'</h2>');
		titlediv.appendTo(formDiv);
		if(this.containers.length)
		{
			for(var i=0;i<this.containers.length;i++)
			{
				var currContainer = new Container(this.containers[i],elements,formid);
				var renderedContainer = currContainer.renderContainer();
				renderedContainer.appendTo(formContent);
			}
		}
		else
		{
			var currContainer = new Container(this.containers,elements,formid);
			var renderedContainer = currContainer.renderContainer();
			renderedContainer.appendTo(formContent);
		}
		if(this.layout != undefined){
			if(this.layout.type == 'ContainerColumns'){
				column = this.layout['column'];
				var currLayout = new ContainerColumnsLayout();
				currLayout.arrange(formContent,this.layout.columns,column,formid);
			}
		}
		formContent.appendTo(formDiv);
		$(formContent).change(function(event){
			console.log("Change Executed");
			console.log(formid);
			var str = "";
			var final_div = $('<span></span>');
			var target_pelement = $('#'+formTarget);
			var allelements = $(formContent).find('.formelement, .followelement');
			for(var i=0;i<allelements.length;i++){
				var questionElement = $(allelements[i]).find('.formbodytext_normal')[0];
				var answerElement = $(allelements[i]).find('.formtextarea');
				//console.log("Answer",answerElement.length);
				if(answerElement.length){
					//if($(answerElement).val()!= "SELECT" && $(answerElement).val()!= "" && $(answerElement).is(":visible")){
					if($(answerElement).val()!= "SELECT" && $(answerElement).val()!= ""){
						if(changedQuestion[$(formContent).parent().attr('id')] == undefined){
							changedQuestion[$(formContent).parent().attr('id')] = {};
							examinationQuestion[$(formContent).parent().attr('id')] = {};
						}
						if(examinationQuestion[$(formContent).parent().attr('id')] == undefined){
							examinationQuestion[$(formContent).parent().attr('id')] = {};
						}
						examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')] = {};
						changedQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')] = answerElement.val();
						//console.log($(formContent).parent().attr('id'));
						//console.log($(answerElement).parent().attr('id'));
						var answerElementId = $(answerElement).attr('id');
						if($(allelements[i]).attr('class') == 'formelement'){
							var result_div = $('<span class="selected"><span class="selected_label">'+$(questionElement).text()+':&nbsp;</span><span class="selected_answer">'+$(answerElement).val()+'&nbsp;|&nbsp;</span><a href="javascript:void(0);" class="iconEdit" onclick=edit_selection("'+answerElementId+'","'+formid+'")>Edit</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="iconDelete" onclick=remove_selection("'+answerElementId+'")>Delete</a>');
							//var result_div = $('<span class="selected"><span class="selected_label">'+$(questionElement).text()+':&nbsp;</span><span class="selected_answer">'+$(answerElement).val()+'&nbsp;|&nbsp;</span><value="Anita"><a href="javascript:void(0);" class="iconEdit" onclick=edit_selection("'+answerElementId+'","'+formid+'")>Edit</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="iconDelete" onclick=remove_selection("'+answerElementId+'")>Delete</a>');
							$(result_div).appendTo(final_div);
							//console.log($(answerElement).val());
							//console.log(result_div);
							var str = str +  '     '+ $(questionElement).text() + "-" + $(answerElement).val() ;
							examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['q']= '     '+$(questionElement).text();
							examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['a']= answerElement.val();
						}else{
							if($(allelements[i]).parent().prev().val() != '' && $(allelements[i]).parent().prev().val() != 'SELECT'){

								$(allelements[i]).parent().children().show();
								var result_div = $('<span class="selected"><span class="selected_label">'+$(questionElement).text()+':&nbsp;</span><span class="selected_answer">'+$(answerElement).val()+'&nbsp;|&nbsp;</span><a href="javascript:void(0);" class="iconEdit" onclick=edit_selection("'+answerElementId+'","'+formid+'")>Edit</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="iconDelete" onclick=remove_selection("'+answerElementId+'")>Delete</a>');
								$(result_div).appendTo(final_div);
							//console.log("Div create Second");
							//console.log(result_div);

								var str = str +  '   '+ $(questionElement).text() + "-" + $(answerElement).val() ;
								examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['q']= '-        '+$(questionElement).text();
								examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['a']= answerElement.val();
							}
							else{
								
								$(answerElement).val("");
							}
						}
						var className = $(allelements[i]).attr('class');
					}
					else{

						if(changedQuestion[$(formContent).parent().attr('id')] != undefined){
							if(changedQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')] != undefined){
								delete(changedQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]);
								if(jQuery.isEmptyObject(changedQuestion[$(formContent).parent().attr('id')])){
									delete(changedQuestion[$(formContent).parent().attr('id')]);
								}
							}
						}
						if(examinationQuestion[$(formContent).parent().attr('id')] != undefined){
							if(examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')] != undefined){
								delete(examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]);
								if(jQuery.isEmptyObject(examinationQuestion[$(formContent).parent().attr('id')])){
									delete(examinationQuestion[$(formContent).parent().attr('id')]);
								}
							}
						}
					}
				}
				else{
					answerElement = $(allelements[i]).find('.formmultiselect');
					var obj = answerElement[0];
					
					if(obj != undefined && $(answerElement[0]).parent().is(":visible")){
						var selectedvalues= "";
						for (var x=0;x<obj.length;x++){
							if(obj.options[x].selected){
								if(selectedvalues != "")
								selectedvalues = selectedvalues + ",";
								var value = obj.options[x].text;
								selectedvalues = selectedvalues + value;
							}
						}
						
						if(selectedvalues != ""){
							if(changedQuestion[$(formContent).parent().attr('id')] == undefined){
								changedQuestion[$(formContent).parent().attr('id')] = {};
								examinationQuestion[$(formContent).parent().attr('id')] = {};
							}
							if(examinationQuestion[$(formContent).parent().attr('id')] == undefined){
								examinationQuestion[$(formContent).parent().attr('id')] = {};
							}
							var questionElement = $(allelements[i]).find('.formbodytext_normal');
							answerElementId = $(answerElement).attr('id');
							changedQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')] = {};
							changedQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')] =  selectedvalues;
							examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')] = {};
							
							if($(allelements[i]).attr('class') == 'formelement'){
								var result_div = $('<span class="selected"><span class="selected_label">'+$(questionElement).text()+':&nbsp;</span><span class="selected_answer">'+$(answerElement).val()+'&nbsp;|&nbsp;</span><a href="javascript:void(0);" class="iconEdit" onclick=edit_selection("'+answerElementId+'","'+formid+'")>Edit</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="iconDelete" onclick=remove_selection_multiselect("'+answerElementId+'") >Delete</a>');
								$(result_div).appendTo(final_div);
								var str = str + '    ● ' + $(questionElement).text() + "-" + selectedvalues ;
								
								examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['q']= $(questionElement).text();
								examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['a']= selectedvalues;
							}else{
								var result_div = $('<span class="selected"><span class="selected_label">'+$(questionElement).text()+':&nbsp;</span><span class="selected_answer">'+$(answerElement).val()+'&nbsp;|&nbsp;</span><a href="javascript:void(0);" class="iconEdit" onclick=edit_selection("'+answerElementId+'","'+formid+'")>Edit</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="iconDelete" onclick=remove_selection_multiselect("'+answerElementId+'") >Delete</a>');
								$(result_div).appendTo(final_div);
								var str = str + '  ► ' + $(questionElement).text() + "-" + selectedvalues ;
								
								examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['q']= $(questionElement).text();
								examinationQuestion[$(formContent).parent().attr('id')][$(answerElement).parent().attr('id')]['a']= selectedvalues;
							}
							var className = $(allelements[i]).attr('class');
						}
					}
				}
			}
			var targetElement = $(target_pelement).find('.summary_text');
			if(isSubForm){
				var subTargetId = formid + 'SubTarget';
				if($('#'+subTargetId).length == 0){
					var topDiv = $('<div id='+subTargetId+' class="sub_summary_div"></div>');
				}
				else{
					var topDiv = $('#'+formid+'SubTarget').empty();
				}
				$(final_div).appendTo(topDiv);
				$(topDiv).appendTo(targetElement)
			}
			else{
				$(final_div).appendTo(targetElement);
			}
			var targetTextElement = $('#' + formid + 'TextTarget');
			$(targetTextElement).val(str);
			$(target_pelement).show();
			document.cookie = 'examinationQuestion='+ JSON.stringify(examinationQuestion)+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
		});
		
		return formDiv;
	}
}
function edit_selection(answer_element_id, form_id){
	if(!($('#'+form_id).is(':visible'))){
		$('#'+form_id+'_link').trigger('click');
		if(divtarget == undefined){
			$('#form_place_holder').children().hide();
		}else{
			$('#'+divtarget).children().hide();
		}
		$('#'+form_id).show();
	}
	$('#'+answer_element_id).focus();
}
function remove_selection(answer_element_id){
	$('#'+answer_element_id).val('');
	$('#'+answer_element_id).trigger('change');
}
function remove_selection_multiselect(answer_element_id){
	//arr = new Array('');
	$('#'+answer_element_id).multiselect("uncheckAll"); 
	//$('#'+answer_element_id).val(arr);
	$('#'+answer_element_id).trigger('change');
}
function Container(container, elements,formid)
{
	this.container = container;
	this.elements = elements;
	this.renderContainer = renderContainer;
	containerDiv = $('<div id='+formid+'-c-'+this.container["id"]+' style="width:100%;"></div>');
	function renderContainer()
	{
		var containedElementids = this.container["questions"];
		var containerId = this.container["id"];
		var containerLayout = this.container["layout"];
		
		var containedElementids = containedElementids.split(",");
		var currElement = new Element(this.elements);
		for(var i=0; i<containedElementids.length; i++)
		{
			var element = findElement(containedElementids[i], this.elements);
			var renderedElement = currElement.renderElement(element, formid);
			renderedElement.appendTo(containerDiv);
			generateElement(element, formid, renderedElement);
		}
		switch(containerLayout)
		{
		case "Horizontal":
			var currLayout = new HorizontalLayout();
			currLayout.arrange(containerDiv);
			break;
		case "Vertical":
			var currLayout = new VerticalLayout();
			currLayout.arrange(containerDiv);
			break;
		case "Columns":
			var currLayout = new ColumnLayout();
			currLayout.arrange(containerDiv,this.container["columns"]);
			break;
		}
		
		return containerDiv;
	}
	function findElement(elementid, elements)
	{
		return $.grep(elements, function(n, i){
			return n.id == elementid;
		});
	};
	
	function generateElement(element, formid, renderedParent)
	{
		var parentid = renderedParent.attr("id");
		var currElement = new Element(this.elements);
		if(element[0]['answer'])
		{
			for(var j=0; j<element[0]['answer'].length; j++)
			{
				if(element[0]['answer'][j]['follow'])
				{
					var followupdiv = $('<div class="nodeelement"></div>');
					var follow = element[0]['answer'][j]['follow'].split(",");
					for(var k=0; k<follow.length; k++)
					{
						var child = findElement(follow[k], this.elements);
						var renderedElement = currElement.renderElement(child, formid);
						renderedElement.hide();
						$(renderedElement).attr("class","followelement");
						var childid = renderedElement.attr("id");
						renderedElement.attr("id",parentid+childid);
						renderedElement.appendTo(followupdiv);
						generateElement(child, formid, renderedElement);
					}
					followupdiv.appendTo(renderedParent);
				}
			}
		}
	}
}

function Element(elements)
{
	this.renderElement = renderElement;
	function renderElement(element, formid)
	{
		var id		= element[0]['id'];
		var validationType = element[0]['validation'];
		var div 	= null;
		var name 	= element[0]['name'];
		div		= $('<div id='+formid+'_q_'+id+' class="formelement"></div>');
		var label	= element[0]['label'];
		var currLabel 	= new Label();
		label 		= currLabel.render(label);
		var inputType 	= element[0]['type'];
		var inputElement;
		switch(inputType.toLowerCase())
		{
		case "text":
			var currInput 	= new Text();
			inputElement 	= currInput.render(id, formid, element[0]['size']);
			label.appendTo(div);
			inputElement.appendTo(div);
			if(name != undefined){
				inputElement.attr('name',name);
			}
			formula = element[0]['calculate'];
			if(formula != undefined){
				$(inputElement).data('calculate', formula);	
			}
			if(formula != undefined){
				var image = $(inputElement).focus(function() {
					value = eval($(this).data('calculate'));
					value = value.toFixed(2);
					$(this).val(value);
				});
			}
			if(validationType != undefined){
				var image = $(inputElement).one('focus',function() {
					validation(this, validationType);
				});	
			}
			break;
		case "autocomplete":
		var action = element[0]['action'];
			var currInput 	= new TextAutocomplete();
			inputElement 	= currInput.render(id, formid, action);
			label.appendTo(div);
			inputElement.appendTo(div);
			if(name != undefined){
				inputElement.attr('name',name);
			}
			formula = element[0]['calculate'];
			if(formula != undefined){
				$(inputElement).data('calculate', formula);	
			}
			if(formula != undefined){
				var image = $(inputElement).focus(function() {
					value = eval($(this).data('calculate'));
					value = value.toFixed(2);
					$(this).val(value);
				});
			}
			if(validationType != undefined){
				var image = $(inputElement).one('focus',function() {
					validation(this, validationType);
				});	
			}
			break;
		case "date":
			var currInput	= new date();
			inputElement	= currInput.render(id, formid);
			label.appendTo(div);
			inputElement.appendTo(div);
			break;
			
		case "label":
			var currInput 	= new Label();
			inputElement 	= currInput.render(' ');
			label.attr('class', 'bodytext_bold');
			label.appendTo(div);
			inputElement.appendTo(div);
			break;

		case "dd":
			var currInput	= new DropDown();
			inputElement	= currInput.render(element[0]['answer'], id, formid);
			label.appendTo(div);
			inputElement.appendTo(div);
			break;
		case "multidd":
			var currInput	= new MultiDropDown();
			inputElement	= currInput.render(element[0]['answer'], id, formid);
			label.appendTo(div);
			inputElement.appendTo(div);
			break;
		case "none":
			label.appendTo(div);
			break;
		case "separator":
			var currInput 	= new Separator();
			inputElement 	= currInput.render(id, formid, element[0]['size']);
			if(label != undefined){
				//		label.appendTo(div);
			}
			inputElement.appendTo(div);
			break;

		default:
			alert('"'+element[0]['type'] + '" Element type not recognized. This form may not work.');
			break;
		}
		
		$(div).change(function(event)
		{
			var currID = $(this).attr("id");
			var answerValue = $(this).children('select').val();
			if(element[0]['answer'])
			{
				for(var i=0;i<element[0]['answer'].length;i++)
				{
					if(answerValue == element[0]['answer'][i]['label'])
					{
						if(element[0]['answer'][i]['follow'])
						{
							var followup = element[0]['answer'][i]['follow'];
							followup	 = followup.split(",");
							for(var j=0;j<followup.length;j++)
							{
								$('#'+currID+formid+'_q_'+followup[j]).slideDown();
								$('#'+currID+formid+'_q_'+followup[j]).children().show(); 
								$('#'+currID+formid+'_q_'+followup[j]).find('.formmultiselect').hide();
							}
						}
					}
					else
					{
						if(element[0]['answer'][i]['follow'])
						{
							var followup 	= element[0]['answer'][i]['follow'];
							followup	= followup.split(",");
							for(var j=0;j<followup.length;j++)
							{
								$('#'+currID+formid+'_q_'+followup[j]).slideUp();
								$('#'+currID+formid+'_q_'+followup[j]).children().hide();
							}							
						}
					}
				}
			}
		});
		return div;
	}
}


//Container Layout Starts Here
function Layout()
{
	//empty constructor
}

Layout.prototype.arrange = function()
{
	//this is an abstract method
}

function HorizontalLayout() {
	// Call the parent constructor
	Layout.call(this);
}

// inherit Layout
HorizontalLayout.prototype = new Layout();

// correct the constructor pointer because it points to Layout
HorizontalLayout.prototype.constructor = HorizontalLayout;

HorizontalLayout.prototype.arrange = function(containerDiv)
{
	$(containerDiv).attr("class", "horizontalContainer");
	for(var i=0; i<containerDiv.children().length; i++)
	{
		containerDiv.children()[i].style.cssFloat	= "left";
	}
	var linebreak = $('<div style="clear:both;"></div>');
	linebreak.appendTo(containerDiv);
}

function VerticalLayout() {
	// Call the parent constructor
	Layout.call(this);
}

// inherit Layout
VerticalLayout.prototype = new Layout();

// correct the constructor pointer because it points to Layout
VerticalLayout.prototype.constructor = VerticalLayout;

VerticalLayout.prototype.arrange = function(containerDiv)
{
	var max = 0;
	$(containerDiv).attr("class", "verticalContainer");
	for(var i=0; i<containerDiv.children().length; i++)
	{
		var x = (containerDiv.children()[i]);
		var y = ($(x).children());
		y[0].style.display = "inline-block";
	}
}

function ContainerColumnsLayout() {
	// Call the parent constructor
	Layout.call(this);
}

// inherit Layout
ContainerColumnsLayout.prototype = new Layout();

// correct the constructor pointer because it points to Layout
ContainerColumnsLayout.prototype.constructor = ContainerColumnsLayout;

ContainerColumnsLayout.prototype.arrange = function(containerDiv, columns, column, formid)
{
	$(containerDiv).attr("class", "formContent");
	elements = (containerDiv.children().length)/(columns);
	for(var i=0;i<columns;i++){
		width = (100/columns);
		if(i < (columns - 1)){
			div = $('<div class = "containerColumns" style="width:'+width+'%;border-right: 1px dashed #D6D5F4"></div>');
		}else{
			div = $('<div class="containerColumns" style="width:'+width+'%;"></div>');
		}

		ids = column[i].split(',');

		for(var j = 0; j<ids.length;j++){
			for(var k = 0; k<containerDiv.children().length; k++){
				if(containerDiv.children()[k].id == formid+'-c-'+ids[j]){
					$(containerDiv.children()[k]).appendTo(div);
				}	
			}	
		}
		div.appendTo(containerDiv);		
	}
	for(var i=0; i<containerDiv.children().length; i++)
	{
		var x = (containerDiv.children()[i]);
		x.style.width = (99/columns)+'%';
		x.style.cssFloat	= "left";
		var y = ($(x).children());
		y[0].style.display = "inline-block";
	}
}

function ColumnLayout() {
	// Call the parent constructor
	Layout.call(this);
}

// inherit Layout
ColumnLayout.prototype = new Layout();

// correct the constructor pointer because it points to Layout
ColumnLayout.prototype.constructor = ColumnLayout;

ColumnLayout.prototype.arrange = function(containerDiv, columns)
{
	$(containerDiv).attr("class", "columnContainer");
	$(containerDiv).width((100/columns)+'%');
	for(var i=0; i<containerDiv.children().length; i++)
	{
		var x = (containerDiv.children()[i]);
		x.style.width = (100/columns)+'%';
		
		x.style.cssFloat	= "left";
		var y = ($(x).children());
		y[0].style.display = "inline-block";
	}
}

// Container Layout Ends Here

// Element Generation Starts Here
function SubElement()
{
	//empty constructor
}

SubElement.prototype.render = function()
{
	//this is an abstract method
}

function Label() {
	// Call the parent constructor
	SubElement.call(this);
}

// inherit SubElement
Label.prototype = new SubElement();

// correct the constructor pointer because it points to SubElement
Label.prototype.constructor = Label;

Label.prototype.render = function(labelValue)
{
	return $('<label class = "formbodytext_normal" style="width:45%;display:inline-block;">'+labelValue+'</label>');
}

function Text() {
	// Call the parent constructor
	SubElement.call(this);
}
// inherit SubElement
Text.prototype = new SubElement();

// correct the constructor pointer because it points to SubElement
Text.prototype.constructor = Text;

Text.prototype.render = function(id, formid, inputSize)
{
	var text = $('<input id='+formid+'_a_'+id+' class="formtextarea" type="text" size='+inputSize+'/>');
	return text;
}
function date() {
	// Call the parent constructor
	SubElement.call(this);
}
// inherit SubElement
date.prototype = new SubElement();

// correct the constructor pointer because it points to SubElement
date.prototype.constructor = date;

date.prototype.render = function(id, formid)
{
	var text = $('<input id='+formid+'_a_'+id+' class="formtextarea" name="dob" type="text" />').datepicker({yearRange: "-100:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
	return text;
}

function TextAutocomplete() {
	// Call the parent constructor
	SubElement.call(this);
}
// inherit SubElement
TextAutocomplete.prototype = new SubElement();

// correct the constructor pointer because it points to SubElement
TextAutocomplete.prototype.constructor = Text;

TextAutocomplete.prototype.render = function(id, formid, action)
{
	var text = $('<input id='+formid+'_a_'+id+' class="formtextarea" type="text"/></input>')
            .autocomplete({
                minLength: 0,
                source: function( request, response ) {
                     $.ajax({
                        type: 'Get',
                        url: action+"?term="+request.term,
                        datatype: 'json', 
                        success: function (data) {               
                            response( $.ui.autocomplete.filter(
                            JSON.parse(data), extractLast1( request.term )));
                        },
                        error: function (req, status, error) {
                            ErrorMessage(req.responseText);
                            $("#ui-datepicker-div").hide();
                        }
                    });
            },
            focus: function() {
                return false;
            },
            select: function( event, ui ) {
   				var terms = split1( this.value );
				terms.pop();
				terms.push( ui.item.value );
				terms.push( "" );
				this.value = terms.join( ", " );
				$(this).change();
                return false;
            }
        });
	return text;
}

function Separator() {
	// Call the parent constructor
	SubElement.call(this);
}

// inherit SubElement
Separator.prototype = new SubElement();

// correct the constructor pointer because it points to SubElement
Separator.prototype.constructor = Separator;

Separator.prototype.render = function(id, formid, inputSize)
{
	return $('<div class="hr"></div>');
}


function DropDown() {
	// Call the parent constructor
	SubElement.call(this);
}

// inherit SubElement
DropDown.prototype = new SubElement();

// correct the constructor pointer because it points to SubElement
DropDown.prototype.constructor = DropDown;

DropDown.prototype.render = function(answers,id,formid)
{
	var s = $('<select id='+formid+'_a_'+id+' class="formtextarea" style="width:120px;" />');
	$('<option />',  {value: null, text: 'SELECT'}).appendTo(s);
	if(answers.length == undefined){
		$('<option />',  {value: answers["label"], text: answers["label"]}).appendTo(s);
	}else{
		for(var i=0; i<answers.length; i++)
		{
			$('<option />',  {value: answers[i]["label"], text: answers[i]["label"]}).appendTo(s);
		}
	}
	return(s);
}

/*function writeText(element){
var elementid = $(element).attr('id');
var value = $(element).val();
var target_pid = elementid + '_target';
var target_element = $('#'+target_pid);
if(target_element.length == 0){
create_target_element(elementid);
target_element = $('#'+target_pid);
}
}
function create_target_element(elementid){
var form_id = elementid.split('_')[0];
var form_target_id = form_id + '_target';
var form_target_element = $('#'+form_target_id);
if(form_target_element.length == 0){
create_target(form_target_id, form_id.toUpperCase());
form_target_element = $('#'+form_target_id);
}
var source_element = $('#'+elementid);
var source_container = $(source_element).parent();
}*/
function MultiDropDown() {
	// Call the parent constructor
	SubElement.call(this);
}

// inherit SubElement
MultiDropDown.prototype = new SubElement();

// correct the constructor pointer because it points to SubElement
MultiDropDown.prototype.constructor = DropDown;

MultiDropDown.prototype.render = function(answers,id,formid)
{
	var currid = formid+'_a_'+id;
	var s = $('<select multiple="multiple" id='+currid+' class="formmultiselect" />');
	for(var i=0; i<answers.length; i++)
	{
		$('<option />',  {value: answers[i]["label"], text: answers[i]["label"]}).appendTo(s);
	}
	return(s);
}
	function extractLast1( term ) {
	  return split1( term ).pop();
	}
	function split1( val ) {
	  return val.split( /, \s*/ );
	}
	function split( val ) {
	  return val.split( /- \s*/ );
	}
