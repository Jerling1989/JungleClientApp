<?php
	include('includes/header.php');
	include('includes/form_handlers/add_client_handler.php');

	$user_obj = new User($connection, $userLoggedIn);

?>
	<div  class="text-center">
		<h2>Welcome to the Jungle <?php echo $user_obj->getFirstAndLastName(); ?>!</h2>
		<p>Your Client List</p>
	</div>

	<form class="" action="index.php" method="POST">
		<input type="text" name="first_name" placeholder="First Name" required />
		<input type="text" name="last_name" placeholder="Last Name" required />
		<input type="text" name="company" placeholder="Company" required />
		<input type="submit" name="add_client" value="Add Client" />
	</form>

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