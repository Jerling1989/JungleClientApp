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
	

	// IF ADD SUBMIT TASK BUTTON IS PRESSED
	if(isset($_POST['add_task'])) {
		// ASSIGNING TASK_NAME FORM VALUE TO $TASK_NAME VARIABLE
		$task_name = strip_tags($_POST['task_name']); // REMOVE HTML TAGS
		// ASSIGNING CLIENT PROFILE OWNER TO $CREATED_FOR VARIABLE
		$client_for = $username;
		// ASSIGNING CURRENT USER TO $CREATED_BY VARIABLE
		$created_by = $userLoggedIn;
		// ASSIGNING TASK CREATION DATE (EX. 2018-10-31)
		$created_at = date('Y-m-d H:i:s');
		// RUN QUERY TO ADD TASK TO DATABASE
		$query = mysqli_query($connection, "INSERT INTO tasks VALUES ('', '$task_name', '$client_for', '$created_at', '$created_by', '', '', '', '')");
	}


	// IF MARK PENDING BUTTON IS PUSHED
	if(isset($_POST['mark_pending'])) {
		// ASSIGNING TASK_NAME FORM VALUE TO $TASK_NAME VARIABLE
		$task_name = $_POST['task_name'];
		// ASSIGNING CLIENT PROFILE OWNER TO $CREATED_FOR VARIABLE
		$client_for = $username;
		// ASSIGNING CURRENT USER TO $PENDING_BY VARIABLE
		$pending_by = $userLoggedIn;
		// ASSIGNING TASK PENDING DATE (EX. 2018-10-31)
		$pending_at = date('Y-m-d H:i:s');
		// RUN QUERY TO UPDATE TASK TO DATABASE
		$query = mysqli_query($connection, "UPDATE tasks SET pending_at='$pending_at', pending_by='$pending_by' WHERE task_name='$task_name' AND client_for='$client_for'");
	}


	// IF MARK COMPLETE BUTTON IS PUSHED
	if(isset($_POST['mark_complete'])) {
		// ASSIGNING TASK_NAME FORM VALUE TO $TASK_NAME VARIABLE
		$task_name = $_POST['task_name'];
		// ASSIGNING CLIENT PROFILE OWNER TO $CREATED_FOR VARIABLE
		$client_for = $username;
		// ASSIGNING CURRENT USER TO $PENDING_BY VARIABLE
		$completed_by = $userLoggedIn;
		// ASSIGNING TASK PENDING DATE (EX. 2018-10-31)
		$completed_at = date('Y-m-d H:i:s');
		// RUN QUERY TO UPDATE TASK TO DATABASE
		$query = mysqli_query($connection, "UPDATE tasks SET completed_at='$completed_at', completed_by='$completed_by' WHERE task_name='$task_name' AND client_for='$client_for'");
	}


	// IF REMOVE TASK BUTTON IS PUSHED
	if(isset($_POST['remove_task'])) {
		// ASSIGNING TASK_NAME FORM VALUE TO $TASK_NAME VARIABLE
		$task_name = $_POST['task_name'];
		// ASSIGNING CLIENT PROFILE OWNER TO $CREATED_FOR VARIABLE
		$client_for = $username;
		// RUN QUERY TO UPDATE TASK TO DATABASE
		$query = mysqli_query($connection, "DELETE FROM tasks WHERE task_name='$task_name' AND client_for='$client_for'");
	}


?>