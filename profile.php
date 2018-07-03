<?php
	// INCLUDE NECCESSARY FILES AND SCRIPTS
	include('includes/header.php');

	// CHECK IF USERNAME IS SET FOR URL
	if(isset($_GET['profile_username'])) {
		// USERNAME VARIABLE
		$username = $_GET['profile_username'];
		// DATABASE QUERY
		$client_details_query = mysqli_query($connection, "SELECT * FROM clients WHERE username='$username'");
		// STORE QUERY RESULTS IN ARRAY
		$client = mysqli_fetch_array($client_details_query);

	}
?>

	<div  class="text-center">
		<p>Welcome to the Client Profile <?php echo $client['first_name'] . ' ' . $client['last_name']; ?>!</p>
	</div>

	<br />

	<div class="client-info col-md-12">
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo $client['profile_pic'] ?>">
				<h5>ID: <?php echo $client['id']; ?></h5>
				<h5>Name: <?php echo $client['first_name'] . ' ' . $client['last_name']; ?></h5>
				<h5>Company: <?php echo $client['company_name']; ?></h5>
				<h5>Website: <?php echo $client['website']; ?></h5>
			</div>

			<div class="col-md-8">
				<h5>Street: <?php echo $client['street_address']; ?></h5>
				<h5>City: <?php echo $client['city']; ?></h5>
				<h5>State: <?php echo $client['state']; ?></h5>
				<h5>Email: <?php echo $client['email']; ?></h5>
				<h5>Phone: <?php echo $client['phone_number']; ?></h5>
				<h5>Services: <?php echo $client['services_array']; ?></h5>
			</div>
		</div>
		
	</div>
	



</div>
<!-- END WRAPPER DIV -->
</body>
</html>