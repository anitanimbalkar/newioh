/*
	Breakpoints.js
	version 1.0
	
	Creates handy events for your responsive design breakpoints
	
	Copyright 2011 XOXCO, Inc
	http://xoxco.com/

	Documentation for this plugin lives here:
	http://xoxco.com/projects/code/breakpoints
	
	Licensed under the MIT license:
	http://www.opensource.org/licenses/mit-license.php

*/
(function($) {

	var lastSize = 0;
	var interval = null;

	$.fn.resetBreakpoints = function() {
		$(window).unbind('resize');
		if (interval) {
			clearInterval(interval);
		}
		lastSize = 0;
	};
	
	$.fn.setBreakpoints = function(settings) {
		var options = jQuery.extend({
							distinct: true,
							breakpoints: new Array(320,480,768,1024)
				    	},settings);


		interval = setInterval(function() {
	
			var w = $(window).width();
			
			if (w==lastSize) {
				return;
			}

			var done = false;
			
			for (var bp in options.breakpoints.sort(function(a,b) { return (b-a) })) {
			
				// fire onEnter when a browser expands into a new breakpoint
				// if in distinct mode, remove all other breakpoints first.
				if (!done && w >= options.breakpoints[bp] && lastSize < options.breakpoints[bp]) {
					if (options.distinct) {
						for (var x in options.breakpoints.sort(function(a,b) { return (b-a) })) {
							if ($('body').hasClass('breakpoint-' + options.breakpoints[x])) {
								$('body').removeClass('breakpoint-' + options.breakpoints[x]);
								$(window).trigger('exitBreakpoint' + options.breakpoints[x]);
							}
						}
						done = true;
					}
					$('body').addClass('breakpoint-' + options.breakpoints[bp]);
					$(window).trigger('enterBreakpoint' + options.breakpoints[bp]);

				}				

				// fire onExit when browser contracts out of a larger breakpoint
				if (w < options.breakpoints[bp] && lastSize >= options.breakpoints[bp]) {
					$('body').removeClass('breakpoint-' + options.breakpoints[bp]);
					$(window).trigger('exitBreakpoint' + options.breakpoints[bp]);

				}
				
				// if in distinct mode, fire onEnter when browser contracts into a smaller breakpoint
				if (
					options.distinct && // only one breakpoint at a time
					w >= options.breakpoints[bp] && // and we are in this one
					w < options.breakpoints[bp-1] && // and smaller than the bigger one
					lastSize > w && // and we contracted
					lastSize >0 &&  // and this is not the first time
					!$('body').hasClass('breakpoint-' + options.breakpoints[bp]) // and we aren't already in this breakpoint
					) {					
					$('body').addClass('breakpoint-' + options.breakpoints[bp]);
					$(window).trigger('enterBreakpoint' + options.breakpoints[bp]);

				}						
			}
			
			// set up for next call
			if (lastSize != w) {
				lastSize = w;
			}
		},250);
	};
	
})(jQuery);
;
// For discussion and comments, see: http://remysharp.com/2009/01/07/html5-enabling-script/
(function(){if(!/*@cc_on!@*/0)return;var e = "abbr,article,aside,audio,bb,canvas,datagrid,datalist,details,dialog,eventsource,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video".split(',');for(var i=0;i<e.length;i++){document.createElement(e[i])}})();


(function($) {

	function debug(msg) {
	
		console.log(msg);
	}

	function clearsearch(obj) {
			//debug('clearsearch called');
			if ($(obj).val()!='' && !$(obj).parents().children('.clearsearch').length) { 
				//debug('clearsearch > add clearer');
				$(obj).css('width','80%');
				$(obj).css('float','left');
				$(obj).parent().append('<span class="clearsearch">X</span>');
			} else if ($(obj).val()=='') {
				//debug('clearsearch > remove clearer');
				$(obj).css('width','95%');			
				$(obj).parent().children('.clearsearch').remove();
			}
	}
	
	
	$(window).ready(function() {
	
		// define the click event we want to bind
		// we can change this to 'touchstart' for better performance on an ipad or iphone
		var clickevent = 'click';
	
		// set up behavior for popout login form
		$('#signin,#signin_popup .close_popup').bind(clickevent,function() {
			//debug('clicked signin popup');
			$('#signin').toggleClass('active');
			$('#signin_popup').toggleClass('active');
			if ($('body').hasClass('breakpoint-320')) {
				$('#header .block-search').hide();
			}
		});
	
		// set up behavior for popout search form
		$('#search_toggle').bind(clickevent,function() {
			//debug('clicked search toggle');
			$('#header .block-search').toggle();
	
			$('#signin').removeClass('active');
			$('#signin_popup').removeClass('active');
	
		});
		$('.popup').bind(clickevent,function() {
			//debug('clicked popup');
			var src = $(this).attr('data-popup');
			var markup = '';
			if ($(src).length) {
				markup = $(src).html();		
			} else {
				markup = src;
			}
			
	
			if ($('#fadeout').length ==0) { 
				$('body').append('<div id="fadeout" ></div>');
			} else {
				$('#fadeout').show();
			}
	    
	
			if ($('#fadeout #popup').length==0) {
				$('#fadeout').append('<div id="popup"><div id="popup_header"><a href="#" class="close_popup">x</a></div><div class="body"></div></div>');
			}
			
			$('#fadeout').css('top',$(window).scrollTop()+'px');
	
	
	
			if ($('body').hasClass('breakpoint-320')) {
				$('#popup').css('left','0px');
				$('#popup').css('top',(10)+'px');		
	
			} else {
				$('#popup').css('left',($('#fadeout').width()-760)/2+'px');
				$('#popup').css('top',(150)+'px');
	
			}			
			$('#popup .body').html('');
			$('#popup').show();
			
		
			$('#popup .body').html(markup);
				
			return false;
			
		});
		
		$('#popup .close_popup').live(clickevent,function() {
			//debug('clicked popup');
		/*	var src = $('.popup').attr('data-popup');
			var markup = '';
			if ($(src).length) {
				markup = $(src).html();		
			} else {
				markup = src;
			}
		*/
		
		         $("iframe").attr({
                    src: $("iframe").attr("src")
                });
            return false;
       	
		});
		
	
		/* set the behavior for the close popup button */
		$('#popup .close_popup').live(clickevent,function() {
			$('#fadeout').hide();
			$('#popup').hide();	
		});
		

		
		//responsive breakpoints
		$(window).setBreakpoints({
		// use only largest available vs use all available
		    distinct: true, 
		// array of widths in pixels where breakpoints
		// should be triggered
		    breakpoints: [
			320,
			768,
			1024
		    ] 
		});
	
	
		// snag the unmodified markup	
	//	var search_container= $('#block-search-form .content');
	//	var search_form= search_container.html();
		
		// add an invisible holder for the mobile search box on homepage
	//	var mobile_search_container= $('<div id="mobile_search"></div>');
	//	$('#secondary_navigation').prepend(mobile_search_container);
		
		// set up focus/blur handlers for default search text
		
		//debug('binding event handlers');
		$('input#edit-search-block-form--2').bind('keyup',function() {
			clearsearch($(this));
		});
	
	
		$('.clearsearch').live('click',function() {
			$(this).parent().children('input:visible').val('');
			$(this).parent().children('input:visible').focus();	
		});
	
		$('#edit-search-block-form--2').bind('blur',function() {	
			//debug('bluring input');
			clearsearch($(this));
			if ($(this).val()=='') {
				$(this).val($(this).attr('title'));
			}
	
		});
		$('#edit-search-block-form--2').bind('focus',function() {	
			if ($(this).val()==$(this).attr('title')) {
				$(this).val('');
			}
			clearsearch($(this));
	
		});
		
		
		$('#homepage_library_search div.header div#librarysearch #edit-search').bind('keyup',function() {
			clearsearch($(this));
		});
	
		$('#homepage_library_search div.header div#librarysearch #edit-search').bind('blur',function() {
			clearsearch($(this));
		});
	
		$('#homepage_library_search div.header div#librarysearch #edit-search').bind('focus',function() {
			clearsearch($(this));
		});
	
		
		//debug('About to update title field');
	
		$('#edit-search-block-form--2').attr('title','Search Safari Books Online');	
		$('#edit-search-block-form--2').blur();
	
	
		//debug('now, setting up breakpoints');
		// Set up breakpoints	
		$(window).bind('enterBreakpoint320',function() {
			//federated search toggle
			if($('.toggle.menu').length > 0){
				
				if($('#to-content-results a').parent().css('display') != 'none'){
					$('#back-to-books').hide();	
					$('.region-content').hide();
				}else{
					$('.region-content-top').hide();
				}
				
				$('.menu.toggle').show();
				
				$('#to-content-results a').click(function(){
					$(this).parent().hide();
					$('#back-to-books').show();
					$('.region-content').show();
					$('.region-content-top').hide();			
				});
				$('#back-to-books a').click(function(){
					$(this).parent().hide();
					$('#to-content-results').show();
					$('.region-content').hide();
					$('.region-content-top').show();	
				});
			}
		});
		// when user scales browser up past mobile size,
		// make sure the search box reappears
		$(window).bind('exitBreakpoint320',function() {
			$('#header .block-search').show();
			if($('.page-search').length){
				$('.region-content-top').show();
				$('.region-content').show();
				$('.menu.toggle').hide();
			}
		});
	
		//debug('now, autocomplete stuff');
	
		//debug('finished bootup');

	});
	
  /**
   * Prevents the form from submitting if the suggestions popup is open
   * and closes the suggestions popup when doing so.
   * CHANGED: Only prevent form from submitting when an item in the autocomplete list is selected.
   */
  Drupal.autocompleteSubmit = function () {
    if ($('#autocomplete .selected').length > 0) {
      return $('#autocomplete').each(function () {
        this.owner.hidePopup();
      }).size() == 0;
    }
    
    return true;
  };
	
})(jQuery);
;