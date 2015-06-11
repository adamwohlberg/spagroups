// JavaScript Document
  $(function() {
	$('.pause').click(function(e) {
	  $('.slider').data('nivo:vars').stop = true; //Stop the Slider
	  $('.play').show();
	  $('.pause').hide()
	});
  });
  $(function() {
	$('.play').click(function(e) {
	  $('.slider').data('nivo:vars').stop = false; //Stop the Slider
	  $('.play').hide();
	  $('.pause').show()
	});
  });
      $(document).ready(function() {
        $('.play').hide();
      });