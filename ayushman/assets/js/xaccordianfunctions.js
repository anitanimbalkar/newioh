
function getieversion()
{
	var nAgt = navigator.userAgent;
	var ieversion="";
	verOffset=nAgt.indexOf("MSIE");
	fullVersion = nAgt.substring(verOffset+5);
	fullVersion = fullVersion.split(';');
	ieversion = fullVersion[0];
	return ieversion;
}
function toggleSectionHeight(header)
{
	
	ieversion = getieversion()	;
	nAgt = navigator.userAgent;
	if ((verOffset=nAgt.indexOf("MSIE"))!=-1 && (ieversion <='8.0')) 
	{
		formdiv= header.nextSibling;
		if(formdiv.style.display=="block" || formdiv.style.display=="")
			header.childNodes[0].childNodes[2].src= "/ayushman/assets/images/slidedown.gif";
		if(formdiv.style.display=="none" )
			header.childNodes[0].childNodes[2].src= "/ayushman/assets/images/slideup.gif";
		
	}
	else
	{
		formdiv= header.nextSibling.nextSibling;
		if(formdiv.style.display=="block" || formdiv.style.display=="")
			header.childNodes[1].childNodes[2].src= "/ayushman/assets/images/slidedown.gif";
		if(formdiv.style.display=="none" )
			header.childNodes[1].childNodes[2].src= "/ayushman/assets/images/slideup.gif";	
		
	}
	$(formdiv).animate({
						height: 'toggle'
				 }, 100, function() {
						
			});
			
}

function cleartxtitem()
{
	var nodes = document.getElementById("divleft").childNodes;
	for(var i=0;i<nodes.length;i++)
	{
		if(nodes[i].nodeName == "H3")
		{
			 nodes[i].childNodes[1].childNodes[0].value="";
		}
	}
	var nodes = document.getElementById("divright").childNodes;
	for(var i=0;i<nodes.length;i++)
	{
		if(nodes[i].nodeName == "H3")
		{
			 nodes[i].childNodes[1].childNodes[0].value="";
		}
	}
}
function trim(str) {
	return str.replace(/^\s+|\s+$/g,"");
}
function getval(textbox)
{
	document.getElementById("txtval").value=textbox.value;		
}
function settval(textbox)
{	
	textbox.value =$("#txtval").val();
	
}	
 
function addchkitem(checkbox)
{	
	var label= $(checkbox).parent().parent().parent().parent().parent().parent().children(0).children(1).children(0).val();
	var chklabel = $(checkbox).parent().parent().children(0).children(0).text();
	if(checkbox.checked)
	{	
		if(label.length == 0)	
		{				
			label = chklabel+ "; ";
		}		
		else
			label = label+ chklabel + "; ";
		$(checkbox).parent().parent().parent().parent().parent().parent().children(0).children(1).children(0).val(label);
	}
	else
	{		
		if(label.indexOf(chklabel)!= '-1')
		{
			label=label.replace(chklabel+"; ","");
		}
		$(checkbox).parent().parent().parent().parent().parent().parent().children(0).children(1).children(0).val(label);
	}
		
}		
function addtxtitem(text)
{	
	var label= $(text).parent().parent().parent().parent().parent().parent().children(0).children(1).children(0).val();
	var textlabel = trim( $(text).parent().parent().children(0).children(0).html()); //textlabel
	if( label.indexOf(textlabel)== '-1' ) //adds item if not present, -1 returns if value does not exist
	{
		if(label.length == 0)	
		{				
			label = " "+ textlabel +"="+ trim($(text).val())+ "; ";
		}		
		else
			label =label+ textlabel +"="+ trim($(text).val())+ "; ";
		$(text).parent().parent().parent().parent().parent().parent().children(0).children(1).children(0).val(label);
	}
	else
	{
		var replacetext = label.substring(label.indexOf(textlabel),(label.indexOf('; ', label.indexOf(textlabel)))+2 );
		if( $(text).val().length == 0)
			label = label.replace(replacetext,'');
		else
		{
			var replacetextval =label.substring(label.indexOf("=",  label.lastIndexOf(textlabel)),(label.indexOf('; ', label.indexOf(textlabel)))+2 );
			label =label.replace(replacetextval, "="+ trim($(text).val())+ "; ");
		}			
		$(text).parent().parent().parent().parent().parent().parent().children(0).children(1).children(0).val(label);
	}
}

