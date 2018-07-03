<?php

	// IF USER CLICKS THE UPDATE DETAILS BUTTON
	if (isset($_POST['update_email'])) {
		// CREATE VARIABLES FROM FORM VALUES
		$email = strip_tags($_POST['email']);
		$email = str_replace(' ', '', $email);
		$email = strtolower($email);

		// DATABASE QUERY TO CHECK IF EMAIL IS TAKEN
		$email_check = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
		$row = mysqli_fetch_array($email_check);
		$matched_user = $row['username'];


		// IF EMAIL IS NOT TAKEN OR ALREADY BELONGS TO LOGGED IN USER
		if ($matched_user == '' || $matched_user == $userLoggedIn) {
			// CREATE UPDATED DETAILS MESSAGE
			$message = 'Details Updated!<br /><br />';
			// UPDATE USER INFO IN USERS TABLE
			$query = mysqli_query($connection, "UPDATE users SET email='$email' WHERE username='$userLoggedIn'");
			// IF EMAIL IS ALREADY TAKEN BY SOMEBODY ELSE
		} else {
			$message = 'That email is already in use!<br /><br />';
		}
	} else {
		$message = '';
	}

	// IF USER CLICKS UPDATE PASSWORD BUTTON
	if (isset($_POST['update_password'])) {
		// CREATE NEW PASSWORD VARIABLES
		$old_password = strip_tags($_POST['old_password']);
		$new_password_1 = strip_tags($_POST['new_password_1']);
		$new_password_2 = strip_tags($_POST['new_password_2']);

		// DATABASE QUERY (FIND EMAIL AND PASSWORD OF USER)
		$password_query = mysqli_query($connection, "SELECT password, email FROM users WHERE username='$userLoggedIn'");
		$row = mysqli_fetch_array($password_query);
		$db_password = $row['password'];
		$db_email = $row['email'];

		// IF THE OLD PASSWORD MATCHES PASSWORD IN DATABASE
		if (md5(md5($db_email).$old_password) == $db_password) {
			// IF THE TWO NEW PASSWORDS MATCH
			if ($new_password_1 == $new_password_2) {
				// IF THE TWO NEW PASSWORD ARE NOT PROPER LENGTH DISPLAY ERROR
				if (strlen($new_password_1) > 30 || strlen($new_password_1) < 5) {
					$password_message = 'Your password must be between 5 and 30 characters<br /><br />';
					// IF TWO NEW PASSWORDS ARE PROPER LENGTH
				} else {
					// ENCRYPT NEW PASSWORD
					$new_password_md5 = md5(md5($db_email).$new_password_1);
					// DATABASE QUERY (UPDATE NEW PASSWORD)
					$password_query = mysqli_query($connection, "UPDATE users SET password='$new_password_md5' WHERE username='$userLoggedIn'");
					$password_message = 'Password has been changed<br /><br />';
				}
				// ERROR MESSAGE
			} else {
				$password_message = 'Your two new passwords need to match!<br /><br />';
			}
			// ERROR MESSAGE
		} else {
			$password_message = 'The old password is incorrect!<br /><br />';
		}
		// INITIALIZE MESSAGE VARIABLE
	} else {
		$password_message = '';
	}

	// IF USER CLICKS CLOSE ACCOUNT BUTTON
	if (isset($_POST['close_account'])) {
		header('Location: close_account.php');
	}

?>