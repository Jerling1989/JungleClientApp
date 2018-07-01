<?php

	session_start();

	// CREATE CONNECTION VARIABLE
	$connection = mysqli_connect('localhost', 'root', 'root', 'jungle_db');

	// CHECK FOR CONNECTION ERROR
	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}

	// DECLARING VARIABLES TO PREVENT ERRORS
	$first_name = ''; // FIRST NAME
	$last_name = ''; // LAST NAME
	$email = ''; // EMAIL
	$email2 = ''; // EMAIL 2
	$password = ''; // PASSWORD
	$password2 = ''; // PASSWORD 2
	$date = ''; // SIGN UP DATE
	$error_array = array(); // HOLD ERROR MESSAGES

	// IF REGISTER BUTTON IS PRESSED
	if(isset($_POST['register_button'])) {

		// ASSIGNING REG_FNAME FORM VALUE TO $FIRST_NAME VARIABLE
		$first_name = strip_tags($_POST['reg_fname']); // REMOVE HTML TAGS
		$first_name = str_replace(' ', '', $first_name); // REMOVE SPACES
		$first_name = ucfirst(strtolower($first_name)); // CAPITALIZE FIRST LETTER ONLY
		$_SESSION['reg_fname'] = $first_name; // STORES FIRST NAME INTO SESSION VARIABLE

		// ASSIGNING REG_LNAME FORM VALUE TO $LAST_NAME VARIABLE
		$last_name = strip_tags($_POST['reg_lname']); // REMOVE HTML TAGS
		$last_name = str_replace(' ', '', $last_name); // REMOVE SPACES
		$last_name = ucfirst(strtolower($last_name)); // CAPITALIZE FIRST LETTER ONLY
		$_SESSION['reg_lname'] = $last_name; // STORES LAST NAME INTO SESSION VARIABLE

		// ASSIGNING REG_EMAIL FORM VALUE TO $EMAIL VARIABLE
		$email = strip_tags($_POST['reg_email']); // REMOVE HTML TAGS
		$email = str_replace(' ', '', $email); // REMOVE SPACES
		$email = strtolower($email); // LOWERCASE ALL EMAIL LETTERS
		$_SESSION['reg_email'] = $email; // STORES EMAIL INTO SESSION VARIABLE

		// ASSIGNING REG_EMAIL2 FORM VALUE TO $EMAIL2 VARIABLE
		$email2 = strip_tags($_POST['reg_email2']); // REMOVE HTML TAGS
		$email2 = str_replace(' ', '', $email2); // REMOVE SPACES
		$email2 = strtolower($email2); // LOWERCASE ALL EMAIL LETTERS
		$_SESSION['reg_email2'] = $email2; // STORES EMAIL2 INTO SESSION VARIABLE

		// ASSIGNING REG_PASSWORD FORM VALUE TO $PASSWORD VARIABLE
		$password = strip_tags($_POST['reg_password']); // REMOVE HTML TAGS

		// ASSIGNING REG_PASSWORD2 FORM VALUE TO $PASSWORD2 VARIABLE
		$password2 = strip_tags($_POST['reg_password2']); // REMOVE HTML TAGS

		// ASSIGNING USER CREATION DATE (EX. 2018-10-31)
		$date = date('Y-m-d');

		// CHECK IF EMAIL AND EMAIL2 MATCH
		if ($email == $email2) {
			// CHECK IF EMAIL IS IN PROPER FORMAT
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				// ASSIGN PROPERLY FORMATTED EMAIL TO $EMAIL VARIABLE
				$email = filter_var($email, FILTER_VALIDATE_EMAIL);

				// CHECK IF EMAIL IS ALREADY REGISTERED
				$e_check = mysqli_query($connection, "SELECT email FROM users WHERE email='$email'");
				// COUNT THE NUMBER OF ROWS RETURNED
				$num_rows = mysqli_num_rows($e_check);

				// CHECK IF QUERY RETURNS ANY ROWS (EMAIL TAKEN)
				if($num_rows > 0) {
					array_push($error_array, 'email in use');
				}
				// INPROPER FORMAT ERROR
			} else {
				array_push($error_array, 'invalid format');
			}
			// UNMATCHING EMAIL ERROR
		} else {
			array_push($error_array, 'emails do not match');
		}

		// CHECK FIRST NAME LENGTH
		if (strlen($first_name) > 25 || strlen($first_name) < 2) {
			array_push($error_array, 'first name length');
		}
		// CHECK LAST NAME LENGTH
		if (strlen($last_name) > 25 || strlen($last_name) < 2) {
			array_push($error_array, 'last name length');
		}

		// CHECK FOR MATCHING PASSWORDS
		if ($password != $password2) {
			array_push($error_array, 'passwords do not match');
		} else {
			// CHECK IF PASSWORD USES ENGLISH LETTERS (ADDED SPECIAL CHARACTERS)
			if (preg_match('/[^A-Za-z0-9\.\+!@#$%^&*()]/', $password)) {
				array_push($error_array, 'password characters');
			}
		}

		// CHECK PASSWORD LENGTH
		if (strlen($password) > 30 || strlen($password) < 5) {
			array_push($error_array, 'password length');
		}

		// IF THERE ARE NO ERRORS IN USER SIGN UP DETAILS...
		if (empty($error_array)) {

			// ENCRYPT PASSWORD BEFORE SENT TO DATABASE
			$password = md5(md5($email).$password);
			// GENERATE USERNAME BY CONCATENATING FIRST AND LAST NAME
			$username = strtolower($first_name . '_' . $last_name);
			// QUERY TO CHECK IF USERNAME IS ALREADY TAKEN
			$check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");

			$i = 0;
			// IF USERNAME ALREADY EXISTS ADD NUMBER TO CREATE NEW USERNAME
			while (mysqli_num_rows($check_username_query) != 0) {
				$i++; // ADD 1 TO $I AND CONCATENATE TO USERNAME
				$username = $username . '_' . $i;
				// QUERY TO CHECK USERNAME EXISTENCE AGAIN
				$check_username_query = mysqli_query($connection, "SELECT username FROM users WHERE username='$username'");
			}

			// INSERT NEW USER VALUES INTO DATABASE
			$query = mysqli_query($connection, "INSERT INTO users VALUES ('', '$first_name', '$last_name', '$username', '$email', '$password', '$date', 'no', ',')");

			// PUSH SUCCESSFUL SIGN UP MESSAGE TO $ERROR_ARRAY
			array_push($error_array, 'successful signup');

			// CLEAR SESSION VARIABLES
			$_SESSION['reg_fname'] = '';
			$_SESSION['reg_lname'] = '';
			$_SESSION['reg_email'] = '';
			$_SESSION['reg_email2'] = '';
		}

	}

	



?>

<!DOCTYPE html>
<html>
<head>
	<!-- PAGE TITLE -->
	<title>Welcome to the Jungle!</title>
	<!-- FAVICON -->
	<link rel="icon" href="assets/img/icons/favicon.ico" type="image/x-icon" />
	<!-- META DATA -->
  <meta charset="utf-8" />
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- FONT AWESOME -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Contrail+One|Roboto" rel="stylesheet">
  <!-- BOOTSTRAP CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- RESET CSS LINK -->
  <link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
	<!-- REGISTER PAGE CSS LINK -->
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css" />
	<!-- JQUERY CDN LINK -->
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
</head>
<body>

	<!-- SIGN UP FORM -->
	<form action="register.php" method="POST">

		<!-- FIRST NAME INPUT -->
		<div class="input-group">
			<input type="text" class="form-control form-control-lg" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])) { echo $_SESSION['reg_fname']; } ?>" required />
			<div class="input-group-append">
        <span class="input-group-text" id="inputGroupAppend">
        	<i class="fas fa-user fa-2x"></i>
        </span>
      </div>
		</div>
		<br />
		<!-- END FIRST NAME INPUT -->

		<!-- FIRST NAME ERROR MESSAGE -->
		<?php if (in_array('first name length', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">your first name must be between 2 and 25 characters</div><br />';
		} ?>

		<!-- LAST NAME INPUT -->
		<div class="input-group">
			<input type="text" class="form-control form-control-lg" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])) { echo $_SESSION['reg_lname']; } ?>" required />
			<div class="input-group-append">
        <span class="input-group-text" id="inputGroupAppend">
        	<i class="fas fa-user fa-2x"></i>
        </span>
      </div>
		</div>
		<br />
		<!-- END LAST NAME INPUT -->

		<!-- LAST NAME ERROR MESSAGE -->
		<?php if (in_array('last name length', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">your last name must be between 2 and 25 characters</div><br />';
		} ?>

		<!-- EMAIL 1 INPUT -->
		<div class="input-group">
			<input type="email" class="form-control form-control-lg" name="reg_email" placeholder="Email Address" value="<?php if (isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; } ?>" required />
			<div class="input-group-append">
        <span class="input-group-text" id="inputGroupAppend">
        	<i class="fas fa-at fa-2x"></i>
        </span>
      </div>
		</div>
		<br />
		<!-- END EMAIL 1 INPUT -->

		<!-- EMAIL 2 INPUT -->
		<div class="input-group">
			<input type="email" class="form-control form-control-lg" name="reg_email2" placeholder="Confirm Email Address" value="<?php if (isset($_SESSION['reg_email2'])) { echo $_SESSION['reg_email2']; } ?>" required />
			<div class="input-group-append">
        <span class="input-group-text" id="inputGroupAppend">
        	<i class="fas fa-at fa-2x"></i>
        </span>
      </div>
		</div>
		<br />
		<!-- END EMAIL 2 INPUT -->

		<!-- EMAIL ERROR MESSAGES -->
		<?php if (in_array('email in use', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">email already in use</div><br />';
		} else if (in_array('invalid format', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">invalid email format</div><br />';
		} else if (in_array('emails do not match', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">your emails do not match</div><br />';
		} ?>

		<!-- PASSWORD 1 INPUT -->
		<div class="input-group">
			<input type="password" class="form-control form-control-lg" name="reg_password" placeholder="Password" required />
			<div class="input-group-append">
        <span class="input-group-text" id="inputGroupAppend">
        	<i class="fas fa-key fa-2x"></i>
        </span>
      </div>
		</div>
		<br />
		<!-- END PASSWORD 1 INPUT -->

		<!-- PASSWORD 2 INPUT -->
		<div class="input-group">
			<input type="password" class="form-control form-control-lg" name="reg_password2" placeholder="Confirm Password" required />
			<div class="input-group-append">
        <span class="input-group-text" id="inputGroupAppend">
        	<i class="fas fa-key fa-2x"></i>
        </span>
      </div>
		</div>
		<br />
		<!-- END PASSWORD 2 INPUT -->

		<!-- PASSWORD ERROR MESSAGES -->
		<?php if (in_array('password characters', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">your password can only contain english characters or numbers</div><br />';
		} else if (in_array('password length', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">your password must be between 5 and 30 characters</div><br />';
		} else if (in_array('passwords do not match', $error_array)) {
			echo '<div class="alert alert-danger" role="alert">your passwords do not match</div><br />';
		} ?>

		<!-- SUCCESSFUL SIGN UP MESSAGE -->
		<?php if (in_array('successful signup', $error_array)) {
			echo '<div class="alert alert-success" role="alert">You\'re all set! Go ahead and login!</span></div><br />';
		} ?>

		<!-- SIGN UP SUBMIT BUTTON -->
		<button type="submit" class="btn btn-primary btn-lg" name="register_button">
			Sign Up
		</button>
		<br />
		<!-- SIGN IN FORM LINK -->
		<a href="#" id="signin" class="signin">Already have an account? Log in here!</a>
		<br /><br />
	</form>
	<!-- END SIGN UP FORM -->

</body>
</html>