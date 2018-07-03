<?php

	// CHECK IF USERNAME IS SET FOR URL
	if(isset($_GET['profile_username'])) {
		// USERNAME VARIABLE
		$username = $_GET['profile_username'];
	}

	// CHECK IF USER IS SIGNED IN
	if(isset($_SESSION['username'])) {
		// CREATE VARIABLE FOR USERNAME
		$userLoggedIn = $_SESSION['username'];
	}

	// DECLARING VARIABLES TO PREVENT ERRORS
	$task_name = ''; // TASK NAME
	$client_for = ''; // CLIENT FOR
	$created_by = ''; // CREATED BY
	$created_at = ''; // CREATED AT
	

	// IF ADD CLIENT BUTTON IS PRESSED
	if(isset($_POST['add_task'])) {

		// ASSIGNING FIRST_NAME FORM VALUE TO $FIRST_NAME VARIABLE
		$task_name = strip_tags($_POST['task_name']); // REMOVE HTML TAGS

		// ASSIGNING CLIENT PROFILE OWNER TO $CREATED_FOR VARIABLE
		$client_for = $username;

		// ASSIGNING CURRENT USER TO $CREATED_BY VARIABLE
		$created_by = $userLoggedIn;

		// ASSIGNING CLIENT CREATION DATE (EX. 2018-10-31)
		$created_at = date('Y-m-d H:i:s');

		// RUN QUERY TO ADD CLIENT TO DATABASE
		$query = mysqli_query($connection, "INSERT INTO tasks VALUES ('', '$task_name', '$client_for', '$created_at', '$created_by', '', '', '', '')");

	}

?>