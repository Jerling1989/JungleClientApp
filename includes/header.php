<?php
	
	// INCLUDE NECCESSARY FILES AND SCRIPTS
	require 'config/config.php';
	include('includes/classes/User.php');


	// CHECK IF USER IS SIGNED IN
	if(isset($_SESSION['username'])) {
		// CREATE VARIABLE FOR USERNAME
		$userLoggedIn = $_SESSION['username'];

		// QUERY TO FIND USER DETAILS
		$user_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$userLoggedIn'");
		// STORE USER DETAILS INTO ARRAY
		$user = mysqli_fetch_array($user_details_query);

		// IF NOT SIGNED IN REDIRECT USER TO LOGIN PAGE
	} else {
		header('Location: register.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- PAGE TITLE -->
	<title>Welcome to the Jungle!</title>
	<!-- FAVICON -->
	<link rel="icon" href="assets/img/icons/favicon.ico" type="image/x-icon" />
	<!-- MOBILE VIEWPORT -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- FONT AWESOME LINKS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Roboto|Luckiest+Guy" rel="stylesheet">
  <!-- RESET CSS LINK -->
  <link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
	<!-- BOOTSTRAP CSS LINK -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <!-- JCROP CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.Jcrop.css" />
  <!-- CUSTOM CSS LINK -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

	<!-- JQUERY CDN LINK -->
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	<!-- POPPER.JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP JQUERY -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- JCROP.JS -->
	<script src="assets/js/jquery.Jcrop.js"></script>
	<!-- JCROP.JS -->
	<script src="assets/js/jcrop_bits.js"></script>
	<!-- JUNGLE.JS -->
	<script src="assets/js/jungle.js"></script>
</head>
<body>

	<!-- TOP NAV BAR -->
	<nav class="navbar fixed-top navbar-expand-lg" id="top-nav">
		<div class="container">

			<!-- LOGO/HOMEPAGE LINK -->
		  <a class="navbar-brand" href="index.php">
		  	<h3 id="header-logo">THE JUNGLE</h3>
		  </a>

			<!-- COLLAPSE TOGGLE BUTTON (MOBILE) -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
		    <i class="fas fa-bars fa-lg"></i>
		  </button>

			<!-- NAVIGATION LIST COLLAPSABLE -->
		  <div class="collapse navbar-collapse" id="navbarToggler">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

		    	<!-- HOME PAGE -->
		    	<li class="nav-item">
		        <a class="nav-link" href="index.php" data-toggle="tooltip" data-placement="bottom" title="Home">
		        	<i class="fas fa-home fa-2x"></i> <span class="mobile-nav"><strong>Home</strong></span>
		        </a>
		      </li>

		    	<!-- SETTINGS -->
		      <li class="nav-item">
		        <a class="nav-link" href="settings.php" data-toggle="tooltip" data-placement="bottom" title="Settings">
		        	<i class="fas fa-cog fa-2x"></i> <span class="mobile-nav"><strong>Settings</strong></span>
		        </a>
		      </li>

					<!-- SIGN OUT -->
		      <li class="nav-item">
		        <a class="nav-link" href="includes/handlers/logout.php" data-toggle="tooltip" data-placement="bottom" title="Logout">
		        	<i class="fas fa-sign-out-alt fa-2x"></i> <span class="mobile-nav"><strong>Logout</strong></span>
		        </a>
		      </li>
		    </ul>

		    <!-- SEARCH FORM -->
		    <form class="form-inline my-2 my-lg-0" id="user-search-form" action="search.php" method="GET" name="search_form">
		      <input class="form-control mr-sm-2" type="text" onkeyup="" name="q" placeholder="Search..." autocomplete="off" id="search_text_input">
					<input type="submit" id="user-search-btn" value="">
		    </form>

		  </div>
		  <!-- END NAVIGATION LIST COLLAPSABLE -->
		</div>
	</nav>
	<!-- END TOP NAV BAR -->

	<!-- USER LIVE SEARCH DROPDOWN -->
	<div class="container">
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<div id="search-results"></div>
			</div>
		</div>
	</div>

	<br /><br /><br /><br />


	<script>
		$(document).ready(function() {
			$('#search_text_input').keyup(function() {
				var search = $('#search_text_input').val();

				$.ajax({
					url: 'includes/handlers/ajax_client_search.php',
					data: {search: search},
					type: 'POST',
					success: function(data) {
						if(!data.error) {
							$('#search-results').html(data);
							console.log(data);
						}
					}
				});
			});
		});
	</script>

	<!-- WRAPPER DIV -->
	<div class="wrapper container" id="wrapper">