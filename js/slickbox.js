// JavaScript Document
$(document).ready(function() {
 // hides the slickbox as soon as the DOM is ready (a little sooner that page load)
  $('#slickbox').hide();
  $('#slickbox2').hide();
  
 // shows and hides and toggles the slickbox on click  
  $('#slick-show').click(function() {
    $('#slickbox').show('slow');
	$('#slickbox2').show('slow');
    return false;
  });
  $('#slick-hide').click(function() {
    $('#slickbox').hide('fast');
    return false;
  });
  $('#slick-toggle').click(function() {
    $('#slickbox').toggle(400);
	$('#slickbox2').toggle(400);
    return false;
  });

 // slides down, up, and toggle the slickbox on click    
  $('#slick-down').click(function() {
    $('#slickbox').slideDown('slow');
    return false;
  });
  $('#slick-up').click(function() {
    $('#slickbox').slideUp('fast');
    return false;
  });
  $('#slick-slidetoggle').click(function() {
    $('#slickbox').slideToggle(400);
    return false;
  });
});

  (function() {
	  var Event = YAHOO.util.Event,
		  Dom   = YAHOO.util.Dom,
		  lang  = YAHOO.lang,
		  slider, 
		  bg="slider-bg", thumb="slider-thumb", 
		  valuearea="slider-value", textfield="slider-converted-value"
  
	  // The slider can move 0 pixels up
	  var topConstraint = 0;
  
	  // The slider can move 200 pixels down
	  var bottomConstraint = 400;
  
	  // Custom scale factor for converting the pixel offset into a real value
	  var scaleFactor = 2.5 ;
  
	  // The amount the slider moves when the value is changed with the arrow
	  // keys
	  var keyIncrement = 100;
  
	  var tickSize = 100;
  
	  Event.onDOMReady(function() {
  
		  slider = YAHOO.widget.Slider.getHorizSlider(bg, 
						   thumb, topConstraint, bottomConstraint, 40);
		  slider.setValue(0, true);
		  
		  // Sliders with ticks can be animated without YAHOO.util.Anim
		  slider.animate = true;
  
		  slider.getRealValue = function() {
			  return Math.round(this.getValue() * scaleFactor);
		  }
  
		  slider.subscribe("change", function(offsetFromStart) {
  
			  var valnode = Dom.get(valuearea);
			  var fld = Dom.get(textfield);
  
			  // Display the pixel value of the control
			  valnode.innerHTML = offsetFromStart;
  
			  // use the scale factor to convert the pixel offset into a real
			  // value
			  var actualValue = slider.getRealValue();
			  
			  // update the text box with the actual value
			  
			  fld.value = actualValue;
  function submitForm() {
		  ColdFusion.Ajax.submitForm('price', 'travelerprice.cfm', callback,
			  errorHandler);
	  }
	  
	  function callback(text)
	  {
		  alert("Callback: " + text);
	  }
	  
	  function errorHandler(code, msg)
	  {
		  alert("Error!!! " + code + ": " + msg);
	  };
  
			  
			  // Update the title attribute on the background.  This helps assistive
			  // technology to communicate the state change
			  Dom.get(bg).title = "slider value = " + actualValue;
  
		  });
  
		  slider.subscribe("slideStart", function() {
				  YAHOO.log("slideStart fired", "warn");
			  });
  
		  slider.subscribe("slideEnd", function() {
				  YAHOO.log("slideEnd fired", "warn");
			  });
  
		  // Listen for keystrokes on the form field that displays the
		  // control's value.  While not provided by default, having a
		  // form field with the slider is a good way to help keep your
		  // application accessible.
		  Event.on(textfield, "keydown", function(e) {
  
			  // set the value when the 'return' key is detected
			  if (Event.getCharCode(e) === 13) {
				  var v = parseFloat(this.value, 10);
				  v = (lang.isNumber(v)) ? v : 0;
  
				  // convert the real value into a pixel offset
				  slider.setValue(Math.round(v/scaleFactor));
			  }
		  });
		  
		  // Use setValue to reset the value to white:
		  Event.on("putval", "click", function(e) {
			  slider.setValue(100, false); //false here means to animate if possible
		  });
		  
		  // Use the "get" method to get the current offset from the slider's start
		  // position in pixels.  By applying the scale factor, we can translate this
		  // into a "real value
		  Event.on("getval", "click", function(e) {
			  YAHOO.log("Current value: "   + slider.getValue() + "\n" + 
						"Converted value: " + slider.getRealValue(), "info", "example");
		  });
	  });
  })();