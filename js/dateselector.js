// JavaScript Document
$("#creategroup").validator();
$(":date").dateinput({
	format: 'mmmm dd, yyyy (dddd)',	// the format displayed for the user
	selectors: true,             	// whether month/year dropdowns are shown
	min: -0,                    // min selectable day (100 days backwards)
	offset: [10, 20],            	// tweak the position of the calendar
	speed: 'fast',               	// calendar reveal speed
	firstDay: 0                  	// which day starts a week. 0 = sunday, 1 = monday etc..
});