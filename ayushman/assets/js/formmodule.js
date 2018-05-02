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

function formmodule()
{	
	var containers;
	var elements;
	var renderedForm;
	this.showForm = showForm;
	this.organize = organize;
	
	function showForm(formid,formType, targetid, targettextid)
	{
		$.ajax({
		  	url: '/ayushman/cform/getFormData?formid='+formid+'&formType='+formType,
		  	success: function( data ) {
		  		var result = eval("("+data+")");
				var resultType = result['type'];
				switch(resultType)
				{
					case 'success':
						jsonObj = eval("("+result['value']+")");
						generateForm(jsonObj,targetid,formid,targettextid);
						break;
					case 'error':
						alert(result['value']);
						break;
				}

			},
			error : function(){}
		});
	}
	
	function generateForm(jsonObj,targetid,formid,targettextid)
	{
		readData(jsonObj);
		var currForm = new Form(this.containers, this.elements, targettextid, this.layout);
		this.renderedForm = currForm.renderForm(formid);
		this.renderedForm.appendTo('#'+targetid);
		organize('.verticalContainer');
		organize('.horizontalContainer');
		organize('.columnContainer');
		organize('.containerColumns');
	}
	
	function readData(jsonObj)
	{
		this.containers = jsonObj['container'];
		this.elements 	= jsonObj['question'];
		this.layout 	= jsonObj['layout'];
	}
	
	function organize(className)
	{
		var x = this.renderedForm.find(className);
		var y = this.renderedForm.find('.formmultiselect');
		$(y).multiselect({
			selected:2
		});
		$(y).height("12.5px");
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
					if(currWidth > maxLabelWidth)
						maxLabelWidth = currWidth;
				}
				for(var j=0;j<z.length;j++)
				{
					$(z[j]).width(maxLabelWidth);
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

function Form(containers, elements, targettextid, layout)
{
	this.containers		= containers;
	this.elements		= elements;
	this.renderForm 	= renderForm;
	this.targettextid 	= targettextid;
	this.layout 		= layout;
	function renderForm(formid)
	{
		var formDiv = $('<div id='+formid+' class="examform"></div>');
		var formContent = $('<div id='+formid+'Content class="formContent"></div>');
		
		var title = formid.toUpperCase();
		var titlediv = $('<div class = "FormHeading_BG" >'+title+'</div>');
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
		$(formContent).change(function(event)
		{
			var str = "";
			$('#'+targettextid).val(str);
			var allelements = $(formContent).find('.formelement, .followelement');
			for(var i=0;i<allelements.length;i++)
			{
				if($(allelements[i]).is(':visible'))
				{
					var questionElement = $(allelements[i]).find('.formbodytext_normal');
					var answerElement = $(allelements[i]).find('.formtextarea');
					if(answerElement.length)
					{
						if($(answerElement).val()!= "SELECT" && $(answerElement).val()!= "")
						{
							var questionElement = $(allelements[i]).find('.formbodytext_normal')[0];
							if($(allelements[i]).attr('class') == 'formelement'){
								var str = str +  '    ● '+ $(questionElement).text() + "-" + $(answerElement).val() ;
							}else{
								var str = str +  '  ► '+ $(questionElement).text() + "-" + $(answerElement).val() ;
							}
							var className = $(allelements[i]).attr('class');		
							console.log(className);
						}	
					}
					else
					{
						answerElement = $(allelements[i]).find('.formmultiselect');
						
						var obj = answerElement[0];
						if(obj != undefined){
						var selectedvalues= "";
						for (var x=0;x<obj.length;x++)
						{
							if(obj.options[x].selected){
								if(selectedvalues != "")
									selectedvalues = selectedvalues + ", ";
								var value = obj.options[x].text;
								selectedvalues = selectedvalues + value;
							}
						}
						if(selectedvalues != "")
						{
							var questionElement = $(allelements[i]).find('.formbodytext_normal');
							if($(allelements[i]).attr('class') == 'formelement'){
								var str = str + '    ● ' + $(questionElement).text() + "-" + selectedvalues ;
							}else{
								var str = str + '  ► ' + $(questionElement).text() + "-" + selectedvalues ;
							}
							var className = $(allelements[i]).attr('class');		
							console.log(className);

						}
						}
					}
				}
			}
			$('#'+targettextid).val(str);
			$('#'+targettextid).trigger('keypress');
			$('#'+targettextid).trigger('change');
		});
		return formDiv;
	}
}

function Container(container, elements,formid)
{
	this.container = container;
	this.elements = elements;
	this.renderContainer = renderContainer;
	containerDiv = $('<div id='+formid+'-c-'+this.container["id"]+'></div>');
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
		div		= $('<div id='+formid+'-q-'+id+' class="formelement"></div>');
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
						$(this).val(value);
					});
				}
				if(validationType != undefined){
					var image = $(inputElement).one('focus',function() {
						validation(this, validationType);
					});	
				}
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
								$('#'+currID+formid+'-q-'+followup[j]).show();
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
								$('#'+currID+formid+'-q-'+followup[j]).hide();
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
		if(i < (columns - 1)){
			div = $('<div class = "containerColumns" style="border-right: 1px dashed #D6D5F4"></div>');
		}else{
			div = $('<div class="containerColumns"></div>');
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
	return $('<label class = formbodytext_normal>'+labelValue+'</label>');
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
	var text = $('<input id='+formid+'-a-'+id+' class="formtextarea" type="text" size='+inputSize+'/>');
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
	var s = $('<select id='+formid+'-a-'+id+' class="formtextarea" />');
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
	var currid = formid+'-a-'+id;
	var s = $('<select multiple="multiple" id='+currid+' class="formmultiselect" />');
	for(var i=0; i<answers.length; i++)
	{
		$('<option />',  {value: answers[i]["label"], text: answers[i]["label"]}).appendTo(s);
	}
	return(s);
}
