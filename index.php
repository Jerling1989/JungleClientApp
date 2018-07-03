<?php
	include('includes/header.php');
	include('includes/form_handlers/add_client_handler.php');

	$user_obj = new User($connection, $userLoggedIn);

?>
	<div  class="text-center">
		<h2>Welcome to the Jungle <?php echo $user_obj->getFirstAndLastName(); ?>!</h2>
		<br />
	</div>

	<div id="add-client-div">
	  <button class="btn btn-outline-light btn-block" type="button" data-toggle="collapse" data-target="#add_new_client" aria-expanded="false" aria-controls="add_new_client">
	    Add New Client
	  </button>

		<div class="collapse" id="add_new_client">
		  <div class="card card-body">
		    <form class="" action="index.php" method="POST">
				  <div class="row">
				    <div class="col-12 col-md-3">
				      <input type="text" class="form-control" name="first_name" placeholder="First Name" required />
				    </div>
				    <br /><br />
				    <div class="col-12 col-md-3">
				      <input type="text" class="form-control" name="last_name" placeholder="Last Name" required />
				    </div>
				    <br /><br />
				    <div class="col-12 col-md-3">
				      <input type="text" class="form-control" name="company" placeholder="Company" required />
				    </div>
				    <br /><br />
				    <div class="col-12 col-md-3">
				      <input type="submit" class="btn btn-outline-light btn-block" name="add_client" value="Submit" />
				    </div>
				  </div>
				</form>
		  </div>
		</div>
	</div>

	<table class="table table-dark">
	  <thead>
	    <tr id="table-heading">
	      <th scope="col"><strong>ID</strong></th>
	      <th scope="col"><strong>First</strong></th>
	      <th scope="col"><strong>Last</strong></th>
	      <th scope="col"><strong>Company</strong></th>
	    </tr>
	  </thead>
	  
	  <tbody>
	  	<?php
	  		$str = '';
				$data_query = mysqli_query($connection, "SELECT * FROM clients WHERE client_closed='no' ORDER BY id ASC");

				if (mysqli_num_rows($data_query) > 0) {
					// LOOP THROUGH QUERY RESULTS ARRAY
					while ($row = mysqli_fetch_array($data_query)) {
						// CREATE POST VARIABLES
						$id = $row['id'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$company = $row['company_name'];
						$username = $row['username'];

						$str = "
										<tr>
											<td><a href='$username'>$id</a></td>
											<td><a href='$username'>$first_name</a></td>
											<td><a href='$username'>$last_name</a></td>
											<td><a href='$username'>$company</a></td>
											<td>
												<form action='' method='POST'>
													<input type='submit' class='delete_client btn btn-outline-danger btn-sm' name='delete_client' value='X' />
													<input type='hidden' name='username' value='$username' />
												</form>
											</td>
										</tr>";
						echo $str;
					}
				}
	  	?>
	  </tbody>
	</table>
	

</div>
<!-- END WRAPPER DIV -->
</body>
</html>