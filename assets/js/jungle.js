$(document).ready(function() {

	// FUNCTION TO DISPLAY NAME OF FILE CHOSEN TO UPLOAD
	var inputs = document.querySelectorAll('.inputfile');
	Array.prototype.forEach.call( inputs, function(input) {
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;
		// EVENT LISTENER
		input.addEventListener('change', function(e) {
			// CREATE FILENAME VARIABLE
			var fileName = '';
			// IF THERE IS MORE THAN ONE FILE SELECTED
			if (this.files && this.files.length > 1) {
				fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
			} else {
				fileName = e.target.value.split('\\').pop();
			}
			// IF ONE FILE IS SELECTED
			if (fileName) {
				label.querySelector('span').innerHTML = fileName;
			} else {
				label.innerHTML = labelVal;
			}
		});
	});

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


