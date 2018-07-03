<?php

	// CHECK IF USERNAME IS SET FOR URL
	if(isset($_GET['profile_username'])) {
		// USERNAME VARIABLE
		$username = $_GET['profile_username'];
	}

	// IF ADD CLIENT BUTTON IS PRESSED
	if(isset($_POST['edit_client'])) {

		// ASSIGNING FIRST_NAME FORM VALUE TO $FIRST_NAME VARIABLE
		$first_name = strip_tags($_POST['first_name']); // REMOVE HTML TAGS
		$first_name = str_replace(' ', '', $first_name); // REMOVE SPACES
		$first_name = ucfirst(strtolower($first_name)); // CAPITALIZE FIRST LETTER ONLY

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$last_name = strip_tags($_POST['last_name']); // REMOVE HTML TAGS
		$last_name = str_replace(' ', '', $last_name); // REMOVE SPACES
		$last_name = ucfirst(strtolower($last_name)); // CAPITALIZE FIRST LETTER ONLY

		// ASSIGNING COMPANY FORM VALUE TO $COMPANY VARIABLE
		$company = strip_tags($_POST['company']); // REMOVE HTML TAGS

		// ASSIGNING WEBSITE FORM VALUE TO $WEBSITE VARIABLE
		$website = strip_tags($_POST['website']); // REMOVE HTML TAGS
		$website = str_replace(' ', '', $website); // REMOVE SPACES

		// ASSIGNING EMAIL FORM VALUE TO $EMAIL VARIABLE
		$email = strip_tags($_POST['email']); // REMOVE HTML TAGS
		$email = str_replace(' ', '', $email); // REMOVE SPACES

		// ASSIGNING PHONE FORM VALUE TO $PHONE VARIABLE
		$phone = strip_tags($_POST['phone']); // REMOVE HTML TAGS

		// ASSIGNING SERVICES FORM VALUE TO $SERVICES VARIABLE
		$services = strip_tags($_POST['services']); // REMOVE HTML TAGS

		// ASSIGNING STREET FORM VALUE TO $STREET VARIABLE
		$street = strip_tags($_POST['street']); // REMOVE HTML TAGS

		// ASSIGNING CITY FORM VALUE TO $CITY VARIABLE
		$city = strip_tags($_POST['city']); // REMOVE HTML TAGS

		// ASSIGNING STATE FORM VALUE TO $STATE VARIABLE
		$state = strip_tags($_POST['state']); // REMOVE HTML TAGS

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$facebook = strip_tags($_POST['facebook']); // REMOVE HTML TAGS
		$facebook = str_replace(' ', '', $facebook); // REMOVE SPACES
		$facebook = strtolower($facebook); // LOWER CASE STRING

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$twitter = strip_tags($_POST['twitter']); // REMOVE HTML TAGS
		$twitter = str_replace(' ', '', $twitter); // REMOVE SPACES
		$twitter = strtolower($twitter); // LOWER CASE STRING

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$instagram = strip_tags($_POST['instagram']); // REMOVE HTML TAGS
		$instagram = str_replace(' ', '', $instagram); // REMOVE SPACES
		$instagram = ucfirst($instagram); // LOWER CASE STRING

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$linkedin = strip_tags($_POST['linkedin']); // REMOVE HTML TAGS
		$linkedin = str_replace(' ', '', $linkedin); // REMOVE SPACES
		$linkedin = ucfirst($linkedin); // LOWER CASE STRING

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$youtube = strip_tags($_POST['youtube']); // REMOVE HTML TAGS
		$youtube = str_replace(' ', '', $youtube); // REMOVE SPACES
		$youtube = ucfirst($youtube); // LOWER CASE STRING

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$pinterest = strip_tags($_POST['pinterest']); // REMOVE HTML TAGS
		$pinterest = str_replace(' ', '', $pinterest); // REMOVE SPACES
		$pinterest = ucfirst($pinterest); // LOWER CASE STRING


		// RUN QUERY TO ADD UPDATED CLIENT INFO TO DATABASE
		$query = mysqli_query($connection, "UPDATE clients SET first_name='$first_name', last_name='$last_name', company_name='$company', email='$email', phone_number='$phone', street_address='$street', city='$city', state='$state', website='$website', facebook='$facebook', twitter='$twitter', instagram='$instagram', linkedin='$linkedin', youtube='$youtube', pinterest='$pinterest', services='$services' WHERE username='$username' ");

	}

?>