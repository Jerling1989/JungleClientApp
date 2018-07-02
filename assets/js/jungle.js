$(document).ready(function() {

	// ENABLE TOOLTIPS
  $('[data-toggle="tooltip"]').tooltip()

	// EXPAND SEARCH FORM WHEN CLICKED ON
	$('#search_text_input').focus(function() {
		// IF WINDOW IS WIDER THAN 800PX
		if (window.matchMedia('(min-width: 800px)').matches) {
			// ANIMATE SEARCH FORM TO WIDEN
			$(this).animate({width: '250px'}, 500);
		}
	});

	// MINIMIZE SEARCH FROM WHEN USER CLICKS ON OTHER PARTS OF SITE
	$('#wrapper').on('click', function() {
		$('#search_text_input').animate({width: '180px'}, 500);
	});

	// SUBMIT SEARCH FORM WHEN MAGNIFYING GLASS ICON IS PRESSED
	$('#user-search').on('click', function() {
		document.search_form.submit();
	});

});