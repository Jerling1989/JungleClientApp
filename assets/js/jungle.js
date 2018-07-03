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

	// WHEN POST BUTTON IS CLICKED ON PROFILE ADD CLIENT MODAL
	$('#submit_new_client').click(function() {
		// AJAX REQUEST FOR SENDING POST
		$.ajax({
			type: 'POST',
			url: 'includes/handlers/ajax_submit_new_client.php',
			data: $('form.add_new_client').serialize(),
			success: function(msg) {
				$('add_new_client').modal('hide');
				location.reload();
			},
			error: function() {
				alert('Failure');
			}
		});
	});

});


