$(document).ready(function(){
	// HTML markup implementation, overlap mode
	$( '#menu' ).multilevelpushmenu({
		containersToPush: [$( '#pushobj' )],
		menuWidth: '25%',
		menuHeight: '100%',
		collapsed: true,
	});
});

$(window).resize(function () {
	$( '#menu' ).multilevelpushmenu( 'redraw' );
});
