
function createpopup(data)
{	
	$("<div id='"+data[0].id+"outer"+"' style='position:absolute;background-color:white;width:75%; height:28.5%;' />").appendTo('#'+data[0].targetid);
	$("<div id='"+data[0].id+"' style='border: none; width:100%;' />").appendTo('#'+data[0].id+"outer");
	$("<div id='"+data[0].id+"header"+"' class='Heading_Bg' style='height:22px;width:99%; float: left; font-family: tahoma; '>"+data[0].title +" <img src='/ayushman/assets/images/close.png' style='float:right;cursor:hand; height:20px; width:20px;vertical-align:center;' onclick='closeall(this)'></img></div> ").appendTo('#'+data[0].id);
	$("<div id='"+data[0].id+"content"+"' style='height:auto;width:102%;background-color:#ffffff; float: left; font-family: tahoma;font-size:11px ; overflow-y:auto; border:1px solid #E9E9E9;' />").appendTo('#'+data[0].id);
	
	if( data[0].type =='list' )
	{
		if(data[0].query != "")
		{
			$.ajax({
				url: "/ayushman/cautocompletedata/retrieveall?query="+data[0].query,
				success: function( data1 ) {
					data1 = $.parseJSON(data1);
					var content = "<table width='100%' border='0' cellpadding='0' cellspacing='0' >";
					for(i=0;i<data1.length;i++ )
					{
						content = content + "<tr onmouseover='changebgcolor(this)' onmouseout='resetcolor(this)' onmouseleave='resetcolor(this)' style='line-height:12px;font-size: 8pt;' ><td width='15' ><input style='float:left;padding-right:5px;' type='checkbox' id="+data1[i].id +" onchange='setvalues(this)' /><input type='hidden' value='"+data[0].targettxta+"' /> </td><td><label style='float:left;'> "+data1[i].value+"</label></td></tr>"
					}
					content = content + "</table>";
					$(content).appendTo('#'+data[0].id+"content");
				},
				error : function(){showMessage('250','50','Fetch data','Error occured while fetching data. Please contact your system administrator.','error','id');}
			});
		}
		
	}else if(data[0].type == 'textarea')
	{
		
		$("<textarea id='"+data[0].id+"textarea"+"'; style='width:100%;height:99%;overflow:hidden;' onkeyup='showtext(this)' ></textarea><input type='hidden' value='"+data[0].targettxta+"' /> ").appendTo('#'+data[0].id+"content");
	}
}
function changebgcolor(tr)
{
	tr.style.background = "#cccccc";
}
function resetcolor(tr)
{
	tr.style.background = "transparent";
}
function closeall(img)
{
	div = $(img).parent().parent().parent().attr("id") ;
	document.getElementById(div).style.display="none";
}
function showtext(textarea)
{
	var id = $(textarea).next().val();	
	var text = $(textarea).val();	
	$("#"+id).text(trim(text));
}
function setvalues(check)
{
	var id = $(check).next().val();
	var text = trim($("#"+id).text());
	if(check.checked )
	{
		text =text +" # "+ trim($(check).parent().next().children(0).html());
	}
	else
	{
		val=trim($(check).parent().next().children(0).html());
		if(text.indexOf(val) >=0)
		{
			text = trim(text.replace("# "+val ,""));
		}
	}
	$("#"+id).text(text);
}

function trim(str) {
	return str.replace(/^\s+|\s+$/g,"");
}