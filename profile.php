<?php
	// INCLUDE NECCESSARY FILES AND SCRIPTS
	include('includes/header.php');
	include('includes/form_handlers/edit_client_handler.php');

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

	<br />

	<div class="client-info col-md-12">
		<!-- <h3 class="text-center">Client Details</h3> -->
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo $client['profile_pic'] ?>">
				<h5>ID: <?php echo $client['id']; ?></h5>
				<h5>Name: <?php echo $client['first_name'] . ' ' . $client['last_name']; ?></h5>
				<h5>Company: <?php echo $client['company_name']; ?></h5>
				<i class="fab fa-facebook fa-lg"></i>
				<i class="fab fa-twitter-square fa-lg"></i>
				<i class="fab fa-instagram fa-lg"></i>
				<i class="fab fa-linkedin fa-lg"></i>
				<i class="fab fa-youtube-square fa-lg"></i>
				<i class="fab fa-pinterest-p fa-lg"></i>
			</div>

			<div class="col-md-8">
				<h5>Website: <?php echo $client['website']; ?></h5>
				<h5>Email: <?php echo $client['email']; ?></h5>
				<h5>Phone: <?php echo $client['phone_number']; ?></h5>
				<h5>Street: <?php echo $client['street_address']; ?></h5>
				<h5>City: <?php echo $client['city']; ?></h5>
				<h5>State: <?php echo $client['state']; ?></h5>
				<h5>Services: <?php echo $client['services']; ?></h5>
			</div>
		</div>

		<br />

		<button type="button" class="btn btn-outline-light btn-sm" data-toggle="collapse" data-target="#edit_client" aria-expanded="false" aria-controls="edit_client">Edit</button>

		<div class="collapse" id="edit_client">
		  <div class="card card-body">
		    <form class="" action="index.php" method="POST">

				  <div class="row">
				    <div class="col-6 col-md-3 form-group">
				    	<label for="first_name">First Name</label>
				      <input type="text" class="form-control" name="first_name" placeholder="First Name" required value="<?php echo $client['first_name']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-3 form-group">
				    	<label for="last_name">Last Name</label>
				      <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="<?php echo $client['last_name']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-3 form-group">
				    	<label for="company">Company</label>
				      <input type="text" class="form-control" name="company" placeholder="Company" required  value="<?php echo $client['company_name']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-3 form-group">
				    	<label for="website">Website</label>
				      <input type="text" class="form-control" name="website" placeholder="www.example.com" required value="<?php echo $client['website']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				  </div>

				  

				  <div class="row">
				    <div class="col-12 col-md-4 form-group">
				    	<label for="street">Street</label>
				      <input type="text" class="form-control" name="street" placeholder="42 Wallaby Way" required value="<?php echo $client['street_address']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-12 col-md-4 form-group">
				    	<label for="city">City</label>
				      <input type="text" class="form-control" name="city" placeholder="Dallas" required value="<?php echo $client['city']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-12 col-md-4 form-group">
				    	<label for="state">State</label>
				      <input type="text" class="form-control" name="state" placeholder="Texas" required value="<?php echo $client['state']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				  </div>

				  <div class="row">
				    <div class="col-6 col-md-4 form-group">
				    	<label for="email">Email</label>
				      <input type="email" class="form-control" name="email" placeholder="contact@example.com" required value="<?php echo $client['email']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-4 form-group">
				    	<label for="phone">Phone</label>
				      <input type="text" class="form-control" name="phone" placeholder="(855) 555-1246" required value="<?php echo $client['phone_number']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-12 col-md-4 form-group">
				    	<label for="services">Services</label>
				      <input type="text" class="form-control" name="services" placeholder="Ex. Google Adwords, SEO, Facebook..." required value="<?php echo $client['services']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				  </div>


				  <div class="row">
				  	<div class="col-6 col-md-2 form-group">
				  		<label for="facebook">Facebook</label>
				      <input type="text" class="form-control" name="facebook" placeholder="https://www.facebook.com/example" required value="<?php echo $client['facebook']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="twitter">Twitter</label>
				      <input type="text" class="form-control" name="twitter" placeholder="https://twitter.com/example" required value="<?php echo $client['twitter']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="instagram">Instagram</label>
				      <input type="text" class="form-control" name="instagram" placeholder="https://instagram.com/example" required value="<?php echo $client['instagram']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="linkedin">LinkedIn</label>
				      <input type="text" class="form-control" name="linkedin" placeholder="https://linkedin.com/in/example" required value="<?php echo $client['linkedin']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="youtube">YouTube</label>
				      <input type="text" class="form-control" name="youtube" placeholder="https://youtube.com/example" required value="<?php echo $client['youtube']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="pinterest">Pinterest</label>
				      <input type="text" class="form-control" name="pinterest" placeholder="https://pinterest.com/example" required value="<?php echo $client['pinterest']; ?>" />
				    </div>
				    <!-- <br /><br /> -->
				  </div>

				  <div class="row">
				  	<div class="col-12">
				  		<input type="submit" class="btn btn-success btn-block" name="edit_client" value="Submit" />
				  	</div>
			      
			    </div>
				</form>
		  </div>
		</div>

	</div>
	



</div>
<!-- END WRAPPER DIV -->
</body>
</html>