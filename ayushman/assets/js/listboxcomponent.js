//************************** List Box component which contains autocomplete boxes*************************************
	//Call to createlistbox(data); will create listbox, where "data" is json object
	//Create listbox with autocomplete boxes
	function createlistbox(data)
	{
		$("<div id='"+data[0].id+"'  style='border: none;  width:99%;'  />").appendTo('#'+data[0].targetid);
			$("<div id='"+data[0].id+"upperdiv' class = 'FormHeading_BG' style='width:100%;'></div>").appendTo('#'+data[0].id);
				$("<label id='labelid' >"+data[0].label+"</label>").appendTo('#'+data[0].id+'upperdiv');
			$("<div id='"+data[0].id+"lowerdiv' style='border: none; width:100%; height:auto;padding-top:5px;background-color:#ffffff;padding-bottom:5px; overflow:hidden;' ></div>").appendTo('#'+data[0].id);
		if((data[0].readonly != undefined)&&(data[0].readonly != "false"))
			 createreadonlybox(data[0].id+"lowerdiv",data[0].dataitem);
		else
			createautocompletebox(data[0].id+"lowerdiv",data[0].dataitem,data[0].boxes);
	}
	//these functions allow to generate random numbers.		
	jQuery.extend({
		random: function(X) {
			return Math.floor(X * (Math.random() % 1));
		},
		randomBetween: function(MinV, MaxV) {
		  return MinV + jQuery.random(MaxV - MinV + 1);
	}});
	//toggle height 
	function toggleHeight(img)
	{
		id = img.parentNode.parentNode.id;
		if((document.getElementById(id+'lowerdiv').style.display == '') || (document.getElementById(id+'lowerdiv').style.display == 'block'))
			img.src='/ayushman/assets/images/slidedown.gif';
		else
			img.src='/ayushman/assets/images/slideup.gif';
		$('#'+id+'lowerdiv').animate({
										height: 'toggle'
									}, 100, function() {
										// Animation complete.
									});
	}
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
	//Method to return all selected items in listbox in json format
	function getselecteditems(targetid,boxes)
	{
		$('#'+targetid).focus();
	
		var array = new Array();	
		ieversion = getieversion()	;
		nAgt = navigator.userAgent;
		var targetlen;
		if ((verOffset=nAgt.indexOf("MSIE"))!=-1 && (ieversion <='8.0')) 
		{
			targetlen=document.getElementById(targetid).childNodes[0].childNodes[1].childNodes.length ;
			for(var i=0,j=0;i<targetlen;i++)
			{
				for(var k=0;k<(boxes*2);k=k+2)
				{
					if(document.getElementById(targetid).childNodes[0].childNodes[1].childNodes[i].childNodes[k].className !="ui-autocomplete-input watermark" && document.getElementById(targetid).childNodes[0].childNodes[1].childNodes[i].childNodes[k+1].className !="ui-autocomplete-input watermark")
					{
						if(document.getElementById(targetid).childNodes[0].childNodes[1].childNodes[i].childNodes[k].className !="watermark" && document.getElementById(targetid).childNodes[0].childNodes[1].childNodes[i].childNodes[k+1].className !="watermark")
						{
							array[j] = new Array(2);						
							dataval = document.getElementById(targetid).childNodes[0].childNodes[1].childNodes[i].childNodes[k].value;
							if( dataval== null ||  dataval== "" || dataval== "null")
							{
								array[j][0]="" ;
							}
							else
								array[j][0]=document.getElementById(targetid).childNodes[0].childNodes[1].childNodes[i].childNodes[k].value;
								array[j][1]=document.getElementById(targetid).childNodes[0].childNodes[1].childNodes[i].childNodes[k+1].value;
							j++;
						}
					}
				}
			}
		}
		else
		{
			targetlen = document.getElementById(targetid).childNodes[1].childNodes[1].childNodes.length;
			for(var i=0,j=0;i<targetlen;i++)
			{
				for(var k=0;k<(boxes*2);k=k+2)
				{
					var textbox1= document.getElementById(targetid).childNodes[1].childNodes[1].childNodes[i].childNodes[k];
					var textbox2= document.getElementById(targetid).childNodes[1].childNodes[1].childNodes[i].childNodes[k+1];
					array[j] = new Array(2);
					if(textbox1.className =="ui-autocomplete-input watermark" || textbox2.className =="ui-autocomplete-input watermark")
					{
						array[j][0]="" ;
						array[j][1]="-1";
					}
					else if(textbox1.className =="watermark" || textbox2.className =="watermark"  )
					{
						array[j][0]="" ;
						array[j][1]="-1";					
					}						
					else
					{
						array[j][0]=textbox1.value ;
						array[j][1]=textbox2.value;
					}	
					j++;				
				}
			}
		}
		//alert(JSON.stringify(array));
		return JSON.stringify(array);
	}

	//create textbox with autocomplete
	function createautocompletebox(targetid,dataitem,boxes)
	{
		//adjust target div height
		if(document.getElementById(targetid).style.height!= "auto" )
		{
			str = (parseInt(document.getElementById(targetid).style.height.replace('px',''))+20)+'px';
			document.getElementById(targetid).style.height = str;
		}
		
		childNodes = document.getElementById(targetid).childNodes.length;
		
		//create new div with different div id and append it into target div.
		newid=targetid+childNodes+Math.floor(Math.random()*999999);
		$("<div id='"+newid+"autocompinnerdiv' style='height:20px; padding-left:10px;'></div>").appendTo('#'+targetid);
		targetid = newid+'autocompinnerdiv';
		
		//add multiple autocomplete boxes
		for(var i =0;i < boxes;i++)
		{
				var boolAutocomplete = dataitem[i].autocomplete;
				if(boolAutocomplete == 'true')
					boolAutocomplete = false;
				else
					boolAutocomplete = true;
				var minlength = 0;
				if(dataitem[i].minlength != undefined)
					minlength = 1;
				var boxwidth = 80/boxes;
				if(dataitem[i].query != undefined){
					$input = $("<input type='text' id='textinput' onclick='populateautocomplete(this);' "+dataitem[i].textbox+" style='border: none;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; border-bottom: 1px solid #909090;margin-left:5px; width:"+boxwidth+"%;float:left;'/>");
					$input.autocomplete({source:"/ayushman/cautocompletedata/retrieve?query="+dataitem[i].query,
						select: function(event, ui) {
														this.nextSibling.value = ui.item.id;
												},
						minLength: minlength,
						disabled: boolAutocomplete ,
						change: function(event, data, formatted) {
							if(data.item != null)
								this.nextSibling.value = data.item.id;
							else
								this.nextSibling.value = -1;
						}
					}).appendTo('#'+targetid);
					addWaterMark($input,dataitem[i].watermarktext);
				}else if(dataitem[i].source != undefined){
					$input= $("<input type='text'  onclick='populateautocomplete(this);' "+dataitem[i].textbox+" style='border: none;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; border-bottom: 1px solid #909090;margin-left:5px; width:"+boxwidth+"%;float:left;'/>")
					$input.autocomplete({source:dataitem[i].source,
						select: function(event, ui) {
														this.nextSibling.value = ui.item.id;
													},
						minLength: minlength,
						length:5,
						disabled: boolAutocomplete ,
						change: function(event, data, formatted) {
							if(data.item != null)
								this.nextSibling.value = data.item.id;
							else
								this.nextSibling.value = -1;
						}
					}).appendTo('#'+targetid);					
					addWaterMark($input,dataitem[i].watermarktext);
				}else{
				$input= $("<input type='text' onclick='populateautocomplete(this);' "+dataitem[i].textbox+" style='border: none;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; border-bottom: 1px solid #909090;margin-left:5px; width:"+boxwidth+"%;float:left;'/>").appendTo('#'+targetid);
					addWaterMark($input,dataitem[i].watermarktext);
				}
				$("<input type='hidden' id='hfvalue' name='hfvalue' value='-1'/>").appendTo('#'+targetid);
		}
		var str = "createautocompletebox(this.parentNode.parentNode.id,"+JSON.stringify(dataitem)+","+boxes+");remove(this,this.parentNode.id);";
		$("<img src='/ayushman/assets/images/emr+.png' style='float:right; cursor:pointer; padding-top: 4px;' onclick='"+str+"'/>").appendTo('#'+targetid);
	}
	//create textbox with autocomplete
	function createreadonlybox(targetid,dataitem)
	{
		//adjust target div height
		if(document.getElementById(targetid).style.height != "auto")
		{
			str = (parseInt(document.getElementById(targetid).style.height.replace('px',''))+20)+'px';
			document.getElementById(targetid).style.height = str;
		}
			
		childNodes = document.getElementById(targetid).childNodes.length;
		
		//create new div with different div id and append it into target div.
		newid=targetid+childNodes+Math.floor(Math.random()*999999);
		$("<div id='"+newid+"readonlyinnerdiv' style='height:auto;text-decoration: underline; position:relative; padding-left:10px;word-wrap: break-word; font-weight:bold; color:#0000ff ; overflow:hidden; '></div>").appendTo('#'+targetid);
		binddata(dataitem[0].controllerlink,newid+"readonlyinnerdiv");
	}
	function binddata(url,targetid)
	{
		$.ajax({
				  url:url,
				  success: function( data ) {
						arrData = JSON.parse(data);
						targetDiv = document.getElementById(targetid);
						for(var i=0;i<arrData.length;i++)
						{
							//$("<label style='height:50px;font:bold;position:relative;font-size:10pt;margin-left:10px;margin-top:10px;font-family:arial;border-bottom: 1px solid'><font color='black'>"+arrData[i]["value"]+";"+"</font></label>").appendTo(targetDiv);
							if(i == 0)
							{
								arrData[i]["value"] = arrData[i]["value"].replace('<br/>','');
							}
							if(arrData[i]["value"].indexOf("<br>") !=-1 )
							{
								arrData[i]["value"] = arrData[i]["value"].replace('<br>','');
								targetDiv.innerHTML =targetDiv.innerHTML + arrData[i]["value"] + " ";
							}
							else								
								targetDiv.innerHTML =targetDiv.innerHTML + arrData[i]["value"] + "; ";
							
						}
						
					},
					error : function(){alert("error while binding data to listbox component.");}
				  });
	}
	//trigger autocomplete search
	function populateautocomplete(textbox)
	{
		$(textbox).autocomplete('search', '');
	}
	function remove(img,target)
	{
		$("<img src='/ayushman/assets/images/minus.gif' style='float:right; cursor:pointer; padding-top: 0px;' onclick='deleteParentElement(this);'/>").appendTo('#'+target);
		$(img).remove();
	}
	function deleteParentElement(n){
		str = (parseInt(document.getElementById(n.parentNode.parentNode.id).style.height.replace('px',''))-20)+'px';
		document.getElementById(n.parentNode.parentNode.id).style.height = str;
		n.parentNode.parentNode.removeChild(n.parentNode);
	}
	
	 function getselecteditemsinjson(targetid,boxes)
	{
		var array = new Array();
		element = document.getElementById(targetid);
		elements = element.getElementsByTagName("input");
		for(var i=0,j=0; i< elements.length;i++,j++)
		{
			array[j] = new Array(2);
			if(elements[i].className =="ui-autocomplete-input watermark" || elements[i+1].className =="ui-autocomplete-input watermark")
			{
				array[j][0]="" ;
				array[j][1]="-1";
			}
			else if(elements[i].className =="watermark" || elements[i+1].className =="watermark"  )
			{
				array[j][0]="" ;
				array[j][1]="-1";					
			}						
			else
			{
				array[j][0] = elements[i].value;
				if(elements[i+1].value == undefined)
					array[j][1] = -1;
				else
					array[j][1] = elements[i+1].value;				
			}
			
		i++;
		}
		
		return JSON.stringify(array);
	}

function addWaterMark(textbox, watermarktext) {
	$(textbox).addClass("watermark").val(watermarktext);
	$(textbox).focus(function() {
		$(this).filter(function() {
		return $(this).val() == "" || $(this).val() == watermarktext
	}).removeClass("watermark").val("");
	$(this).addClass("listboxcomponenttext");
	});
	$(textbox).blur(function() {
		$(this).filter(function() {
		return $(this).val() == ""
		}).addClass("watermark").val(watermarktext);	
		
		if($(this).val() == watermarktext || $(this).val()=="" )
		{
			$(this).removeClass("listboxcomponenttext").val("");
			$(this).addClass("watermark").val(watermarktext);
		}			
		else			
			$(this).addClass("listboxcomponenttext");
	});
	
}
