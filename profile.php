<?php
	// INCLUDE NECCESSARY FILES AND SCRIPTS
	include('includes/header.php');
	include('includes/form_handlers/edit_client_handler.php');
	include('includes/form_handlers/add_task_handler.php');

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

	<!-- CLIENT INFO PANEL -->
	<div class="client-info col-md-12">
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo $client['profile_pic'] ?>">
				<h5>ID: <?php echo $client['id']; ?></h5>
				<h5>Name: <?php echo $client['first_name'] . ' ' . $client['last_name']; ?></h5>
				<h5>Company: <?php echo $client['company_name']; ?></h5>

				<a href="<?php echo $client['facebook']; ?>">
					<i class="fab fa-facebook fa-lg"></i>
				</a>
				<a href="<?php echo $client['twitter']; ?>">
					<i class="fab fa-twitter-square fa-lg"></i>
				</a>
				<a href="<?php echo $client['instagram']; ?>">
					<i class="fab fa-instagram fa-lg"></i>
				</a>
				<a href="<?php echo $client['linkedin']; ?>">
					<i class="fab fa-linkedin fa-lg"></i>
				</a>
				<a href="<?php echo $client['youtube']; ?>">
					<i class="fab fa-youtube-square fa-lg"></i>
				</a>
				<a href="<?php echo $client['pinterest']; ?>">
					<i class="fab fa-pinterest-p fa-lg"></i>
				</a>
				
			</div>

			<div class="col-md-8">
				<h5>Website: <a target="_blank" href="http://<?php echo $client['website']; ?>"><?php echo $client['website']; ?></a></h5>
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
		
		<!-- COLLAPSIBLE FORM DIV -->
		<div class="collapse" id="edit_client">
		  <div class="card card-body">
		    <form class="" action="" method="POST">

				  <div class="row">
				    <div class="col-6 col-md-3 form-group">
				    	<label for="first_name">First Name</label>
				      <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $client['first_name']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-3 form-group">
				    	<label for="last_name">Last Name</label>
				      <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $client['last_name']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-3 form-group">
				    	<label for="company">Company</label>
				      <input type="text" class="form-control" name="company" placeholder="Company"  value="<?php echo $client['company_name']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-3 form-group">
				    	<label for="website">Website</label>
				      <input type="text" class="form-control" name="website" placeholder="www.example.com" value="<?php echo $client['website']; ?>" />
				    </div>
				  </div>

				  <div class="row">
				    <div class="col-12 col-md-4 form-group">
				    	<label for="street">Street</label>
				      <input type="text" class="form-control" name="street" placeholder="42 Wallaby Way" value="<?php echo $client['street_address']; ?>" />
				    </div>
				    
				    <div class="col-12 col-md-4 form-group">
				    	<label for="city">City</label>
				      <input type="text" class="form-control" name="city" placeholder="Dallas" value="<?php echo $client['city']; ?>" />
				    </div>
				    
				    <div class="col-12 col-md-4 form-group">
				    	<label for="state">State</label>
				      <input type="text" class="form-control" name="state" placeholder="Texas" value="<?php echo $client['state']; ?>" />
				    </div>
				  </div>

				  <div class="row">
				    <div class="col-6 col-md-4 form-group">
				    	<label for="email">Email</label>
				      <input type="email" class="form-control" name="email" placeholder="contact@example.com" value="<?php echo $client['email']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-4 form-group">
				    	<label for="phone">Phone</label>
				      <input type="text" class="form-control" name="phone" placeholder="(855) 555-1246" value="<?php echo $client['phone_number']; ?>" />
				    </div>
				    
				    <div class="col-12 col-md-4 form-group">
				    	<label for="services">Services</label>
				      <input type="text" class="form-control" name="services" placeholder="Ex. Google Adwords, SEO, Facebook..." value="<?php echo $client['services']; ?>" />
				    </div>				    
				  </div>


				  <div class="row">
				  	<div class="col-6 col-md-2 form-group">
				  		<label for="facebook">Facebook</label>
				      <input type="text" class="form-control" name="facebook" placeholder="https://www.facebook.com/example" value="<?php echo $client['facebook']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-2 form-group">
				    	<label for="twitter">Twitter</label>
				      <input type="text" class="form-control" name="twitter" placeholder="https://twitter.com/example" value="<?php echo $client['twitter']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-2 form-group">
				    	<label for="instagram">Instagram</label>
				      <input type="text" class="form-control" name="instagram" placeholder="https://instagram.com/example" value="<?php echo $client['instagram']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-2 form-group">
				    	<label for="linkedin">LinkedIn</label>
				      <input type="text" class="form-control" name="linkedin" placeholder="https://linkedin.com/in/example" value="<?php echo $client['linkedin']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-2 form-group">
				    	<label for="youtube">YouTube</label>
				      <input type="text" class="form-control" name="youtube" placeholder="https://youtube.com/example" value="<?php echo $client['youtube']; ?>" />
				    </div>
				    
				    <div class="col-6 col-md-2 form-group">
				    	<label for="pinterest">Pinterest</label>
				      <input type="text" class="form-control" name="pinterest" placeholder="https://pinterest.com/example" value="<?php echo $client['pinterest']; ?>" />
				    </div>
				  </div>

					<br />

				  <div class="row">
				  	<div class="col-12">
				  		<input type="submit" class="btn btn-outline-light btn-block" name="edit_client" value="Submit" />
				  	</div>
			    </div>

				</form>
		  </div>
		</div>
		<!-- COLLAPSIBLE FORM DIV -->
	</div>
	<!-- END CLIENT INFO PANEL -->

	<br />
	
	<!-- NEW TASK FORM -->
	<div class="add_new_task">
		<form action="" method="POST">
			<div class="row">
				<div class="col-9 col-md-10">
					<input type="text" class="form-control" name="task_name" placeholder="Add New Task" required />
				</div>
				<div class="col-3 col-md-2">
					<input type="submit" class="btn btn-outline-light btn-block" name="add_task" value="Add" />
				</div>
			</div>
		</form>

		<br />

		<div class="row">
			<?php
	  		$str = '';
				$data_query = mysqli_query($connection, "SELECT * FROM tasks WHERE client_for='$username' ORDER BY id DESC");

				if (mysqli_num_rows($data_query) > 0) {
					// LOOP THROUGH QUERY RESULTS ARRAY
					while ($row = mysqli_fetch_array($data_query)) {
						// CREATE POST VARIABLES
						$task_name = $row['task_name'];
						$created_by = $row['created_by'];
						$created_at = $row['created_at'];
						$pending_by = $row['pending_by'];
						$pending_at = $row['pending_at'];
						$completed_by = $row['completed_by'];
						$completed_at = $row['completed_at'];

						if($completed_by != '') {
							$str = "<div class='card text-white bg-success col-md-3 task-cards'>
											  <div class='card-body'>
											    <h5 class='card-title'>$task_name</h5>
											    <p class='card-text'>Completed by $completed_by at $completed_at</p>
											    <form action='' method='POST'>
														<input type='submit' class='btn btn-danger btn-block' name='remove_task' value='Remove' />
														<input type='hidden' name='task_name' value='$task_name' />
													</form>
											  </div>
											</div>";

						} else if($pending_by != '') {
							$str = "<div class='card text-white bg-warning col-md-3 task-cards'>
											  <div class='card-body'>
											    <h5 class='card-title'>$task_name</h5>
											    <p class='card-text'>Pending by $pending_by at $pending_at</p>
											    <form action='' method='POST'>
														<input type='submit' class='btn btn-success btn-block' name='mark_complete' value='Complete' />
														<input type='hidden' name='task_name' value='$task_name' />
													</form>
											  </div>
											</div>";

						} else {
							$str = "<div class='card text-white bg-danger col-md-3 task-cards'>
											  <div class='card-body'>
											    <h5 class='card-title'>$task_name</h5>
											    <p class='card-text'>Created by $created_by at $created_at</p>
											    <form action='' method='POST'>
														<input type='submit' class='btn btn-warning btn-block' name='mark_pending' value='Pending' />
														<input type='hidden' name='task_name' value='$task_name' />
													</form>
											  </div>
											</div>";
						}
						
						echo $str;

					}
				}
	  	?>
		</div>

	</div>
	<!-- END NEW TASK FORM -->


	



</div>
<!-- END WRAPPER DIV -->
</body>
</html>