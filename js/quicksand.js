// JavaScript Document
  $(function() {
	$('.button').click(function(e) {
	  $('#every').quicksand( $('#data > .all'), {
		duration: 1000,
		attribute: 'data-id',
		easing: 'easeInOutQuad',
		adjustheight: 'false'
	  });
	  e.preventDefault();
	});
  });
  $(function() {
	$('.button2').click(function(e) {
	  $('#every').quicksand( $('#data > .expiring'), {
		duration: 1000,
		attribute: 'data-id',
		easing: 'easeInOutQuad',
		adjustheight: 'false'
	  });
	  e.preventDefault();
	});
  });
  $(function() {
	$('.button3').click(function(e) {
	  $('#every').quicksand( $('#data > .active'), {
		duration: 1000,
		attribute: 'data-id',
		easing: 'easeInOutQuad',
		adjustheight: 'false'
	  });
	  e.preventDefault();
	});
  });
