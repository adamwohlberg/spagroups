// JavaScript Document
$(document).ready(function() {
	$('#searchresults').dataTable( {
		"bProcessing": true,
		"bSortClasses": true,
		"aaSorting": [[0,'asc']],
		"iDisplayLength": 25,
		"oSearch": {"sSearch": ""},
		"sPaginationType": "two_button"
	});
} );