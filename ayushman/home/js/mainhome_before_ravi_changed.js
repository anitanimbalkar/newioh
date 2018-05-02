$(document).ready(function() {
	$('#fullpage').fullpage({
		anchors: ['home', 'consumers', 'doctors', 'corporates', 'news', 'articles'],
		sectionsColor: ['#fcfcfc', '#ffffff', '#ebeded', '#ffffff', '#ebeded', '#ffffff'],
		navigation: true,
		navigationPosition: 'right',
		navigationTooltips: ['Home', 'consumers', 'doctors','corporates', 'news', 'articles'],
		responsive:965,
		slidesNavigation: true,
		afterLoad: function(anchorLink, index){
			if(index == 1){
				$('#fp-nav ul li:nth-child(1) div').addClass('active');
			}
			if(index == 2){
				$('#fp-nav ul li:nth-child(2) div').addClass('active');
			}
			if(index == 3){
				$('#fp-nav ul li:nth-child(3) div').addClass('active');
			}
			if(index == 4){
				$('#fp-nav ul li:nth-child(4) div').addClass('active');
			}
			if(index == 5){
				$('#fp-nav ul li:nth-child(5) div').addClass('active');
			}
			if(index == 6){
				$('#fp-nav ul li:nth-child(6) div').addClass('active');
			}
		},
		afterRender: function () {
        //on page load, start the slideshow
         slideTimeout = setInterval(function () {
                $.fn.fullpage.moveSlideRight();
            }, 251000);
    	},
		onLeave: function(index, direction){
			if(index == '1'){
				console.log('on leaving the slideshow/section1');
            	clearInterval(slideTimeout);	
			}
			if(index == '2'){
				
			}
			if(index == '3'){
				
			}
			if(index == '4'){
				
			}
			if(index == '5'){
				
			}
			if(index == '6'){
				
			}
		}
	});
	
	$('.downArrow, .enter, .searchDoc').on('click', function(){
		$.fn.fullpage.moveSectionDown();
	})
	/*//MENU DROPDOWN
	$(".menu").mouseover(function() {
    	$('.main-nav').show();
  	}).mouseout(function() {
    	$('.main-nav').hide();
  });
  $('.main-nav').mouseover(function() {
    	$(this).show();
		$(".menu").addClass('active');
  	}).mouseout(function() {
    	$(this).hide();
		$(".menu").removeClass('active')
  });*/
  $('.main-nav a').on('click', function(){ hideLeftMenu()})
});

function showLeftMenu(){
	var winwidth = $(window).width();
	$("#topNav").animate({
		left: 250,
	}, 300, function() {
	// Animation complete.
	});	
	$("#subNavigation").animate({
		left: 0
	}, 300, function() {
	// Animation complete.
	});	
	/*$("#fullpage").animate({
		left: 250
	}, 300, function() {
	// Animation complete.
	});*/
	$('#menuExpand').attr('onclick', 'hideLeftMenu()');	
	$('#menuExpand').addClass('close');
	$('#menuExpand').html('<i class="fa fa-times"></i></br>Close');
}


function hideLeftMenu(){
	$("#topNav").animate({
		left: "0px",
	}, 300, function() {
	// Animation complete.
	});	
	$("#subNavigation").animate({
		left: "-250",
	}, 300, function() {
	// Animation complete.
	});	
	/*$("#fullpage").animate({
		left: 0
	}, 300, function() {
	// Animation complete.
	});	*/
	$('#menuExpand').attr('onclick', 'showLeftMenu()');
	$('#menuExpand').removeClass('close');
	$('#menuExpand').html('<i class="fa fa-th-list"></i> </br>Menu');
}