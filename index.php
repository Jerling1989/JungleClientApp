<?php
	include('includes/header.php');
	include('includes/form_handlers/client_handler.php');

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
	    <tr>
	      <td>1</td>
	      <td>Mark</td>
	      <td>Otto</td>
	      <td>Applebee's</td>
	    </tr>
	    <tr>
	      <td>2</td>
	      <td>Jacob</td>
	      <td>Thornton</td>
	      <td>Dallas BMW</td>
	    </tr>
	    <tr>
	      <td>3</td>
	      <td>Sarah</td>
	      <td>Murphy</td>
	      <td>SmartStyle</td>
	    </tr>
	  </tbody>
	</table>

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

				$str = "<div><p>$id $first_name $last_name $company</p></div>";
				echo $str;
			}
			
		}
		

	?>

	



</div>
<!-- END WRAPPER DIV -->
</body>
</html>