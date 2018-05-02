$(function(){
	var accordion_head = $('.accordion > li > a'),
    accordion_body = $('.accordion li > .sub-menu');
	$.each($(".accordion > li > a"), function(){
    if($(this).attr('class') == 'active')
		{
			//$(this).next().slideDown('normal');
		}           
	});

//accordion_head.first().addClass('active').next().slideDown('normal');
// Click function
accordion_head.on('click', function(event) {
    // Disable header links
    event.preventDefault();
    // Show and hide the tabs on click
    if ($(this).attr('class') != 'active'){
        accordion_body.slideUp('normal');
        $(this).next().stop(true,true).slideToggle('normal');
        accordion_head.removeClass('active');
        $(this).addClass('active');
    }
	});
	
	AssnHeightExam();
	$(window).resize(function(){
		AssnHeightExam();
	});
})

function AssnHeightExam(){
	var windWidth = $(window).width()
	var examRightHeight = $(window).height() - 105;
	if (windWidth >= 680){
		$('.examRight, .leftNavExam').css('height', examRightHeight)
	}
	else{
		$('.examRight, .leftNavExam').css('height', 'auto')
	}
		
}
var message="";
function clickIE4(){
	if (event.button==2){
		//alert(message);
		return false;
	}
}

function clickNS4(e){
	if (document.layers||document.getElementById&&!document.all){
		if (e.which==2||e.which==3){
			//alert(message);
			return false;
		}
	}
}

if (document.layers){
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
	document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("return false")