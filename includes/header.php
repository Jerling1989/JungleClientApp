<?php

	require 'config/config.php';

	// CHECK IF USER IS SIGNED IN
	if(isset($_SESSION['username'])) {
		// CREATE VARIABLE FOR USERNAME
		$userLoggedIn = $_SESSION['username'];

		// QUERY TO FIND USER DETAILS
		$user_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$userLoggedIn'");
		// STORE USER DETAILS INTO ARRAY
		$user = mysqli_fetch_array($user_details_query);
		// GET NUMBER OF USER CLIENTS
		$user_clients = (substr_count($user['client_array'], ',')) - 1;

		// IF NOT SIGNED IN REDIRECT USER TO LOGIN PAGE
	} else {
		header('Location: register.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to the Jungle!</title>
</head>
<body>