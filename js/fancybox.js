// JavaScript Document
$(document).ready(function() {

	/* This is basic - uses default settings */
	
	$("a.photos").fancybox({
		'padding'	:	10,
		'cyclic'	:	true,
		'autoScale'	:	true,
		'type'		:	'image'
	});
	
	/* Using custom settings */
	
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	$("a.group").fancybox({
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
});
$(document).ready(function() {

	/* This is basic - uses default settings */
	
	$("a.photos2").fancybox({
		'padding'	:	10,
		'cyclic'	:	true,
		'autoScale'	:	true,
		'type'		:	'image'
	});
	
	/* Using custom settings */
	
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	$("a.group").fancybox({
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
});