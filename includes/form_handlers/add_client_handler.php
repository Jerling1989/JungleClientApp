<?php

	// DECLARING VARIABLES TO PREVENT ERRORS
	$first_name = ''; // FIRST NAME
	$last_name = ''; // LAST NAME
	$company = ''; // COMPANY NAME
	$username = ''; // USERNAME
	$date = ''; // DATE

	// IF ADD CLIENT BUTTON IS PRESSED
	if(isset($_POST['add_client'])) {

		// ASSIGNING FIRST_NAME FORM VALUE TO $FIRST_NAME VARIABLE
		$first_name = strip_tags($_POST['first_name']); // REMOVE HTML TAGS
		$first_name = str_replace(' ', '', $first_name); // REMOVE SPACES
		$first_name = ucfirst(strtolower($first_name)); // CAPITALIZE FIRST LETTER ONLY
		$_SESSION['first_name'] = $first_name; // STORES LAST NAME INTO SESSION VARIABLE

		// ASSIGNING LAST_NAME FORM VALUE TO $LAST_NAME VARIABLE
		$last_name = strip_tags($_POST['last_name']); // REMOVE HTML TAGS
		$last_name = str_replace(' ', '', $last_name); // REMOVE SPACES
		$last_name = ucfirst(strtolower($last_name)); // CAPITALIZE FIRST LETTER ONLY
		$_SESSION['last_name'] = $last_name; // STORES LAST NAME INTO SESSION VARIABLE

		// ASSIGNING COMPANY FORM VALUE TO $COMPANY VARIABLE
		$company = strip_tags($_POST['company']); // REMOVE HTML TAGS
		$_SESSION['company'] = $company; // STORES LAST NAME INTO SESSION VARIABLE

		// GENERATE USERNAME BY CONCATENATING FIRST AND LAST NAME
		$username = strtolower($first_name . '_' . $last_name);
		// QUERY TO CHECK IF USERNAME IS ALREADY TAKEN
		$check_username_query = mysqli_query($connection, "SELECT username FROM clients WHERE username='$username'");

		$i = 0;
		// IF USERNAME ALREADY EXISTS ADD NUMBER TO CREATE NEW USERNAME
		while (mysqli_num_rows($check_username_query) != 0) {
			$i++; // ADD 1 TO $I AND CONCATENATE TO USERNAME
			$username = $username . '_' . $i;
			// QUERY TO CHECK USERNAME EXISTENCE AGAIN
			$check_username_query = mysqli_query($connection, "SELECT username FROM clients WHERE username='$username'");
		}

		// ASSIGNING CLIENT CREATION DATE (EX. 2018-10-31)
		$date = date('Y-m-d');

		// DEFAULT PROFILE PICTURE PATH
		$profile_pic = 'assets/img/profile_pics/default/avatar.png';

		// RUN QUERY TO ADD CLIENT TO DATABASE
		$query = mysqli_query($connection, "INSERT INTO clients VALUES ('', '$first_name', '$last_name', '$username', '$company', '', '', '$profile_pic', '', '', '', '', '', '', '', '', '', '$date', 'no', '')");

	}

?>