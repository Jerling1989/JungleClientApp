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
		<form class="" action="index.php" method="POST">
		  <div class="row">
		    <div class="col-6 col-sm-3">
		      <input type="text" class="form-control" name="first_name" placeholder="First Name" required />
		    </div>
		    <div class="col-6 col-sm-3">
		      <input type="text" class="form-control" name="last_name" placeholder="Last Name" required />
		    </div>
		    <div class="col-6 col-sm-3">
		      <input type="text" class="form-control" name="company" placeholder="Company" required />
		    </div>
		    <div class="col-6 col-sm-3">
		      <input type="submit" class="btn btn-outline-light btn-block" name="add_client" value="Add Client" />
		    </div>
		  </div>
		</form>
	</div>

	<!-- <br /> -->

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
	
	<!-- MODAL BUTTON TRIGGER -->
	<span data-toggle="modal" data-target="#client-modal">
	<button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Post to Profile">
		Add New Client
	</button>
	</span>

	<!-- NEW CLIENT MODAL (.MODAL-LG) -->
	<div class="modal fade" id="client-modal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
				<!-- MODAL HEADER -->
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
				<!-- MODAL BODY -->
	      <div class="modal-body">
	        <p>Add the First Name, Last Name, and Company of a new client below!</p>
					<!-- MODAL POST FORM -->
	        <form class="add_new_client" action="" method="POST">
	        	<div class="form-group">
	        		<!-- POST BODY -->
	        		<!-- <textarea class="form-control" name="post_body"></textarea> -->
	        		<!-- POST INFO (USER_TO & USER_FROM) -->
	        		<!-- <input type="hidden" name="user_from" value="<?php echo $userLoggedIn; ?>" />
	        		<input type="hidden" name="user_to" value="<?php echo $username; ?>" /> -->
	        	</div>
	        	<div class="form-group">
				      <input type="text" class="form-control" name="first_name" placeholder="First Name" required />
				    </div>
				    <div class="form-group">
				      <input type="text" class="form-control" name="last_name" placeholder="Last Name" required />
				    </div>
				    <div class=form-group">
				      <input type="text" class="form-control" name="company" placeholder="Company" required />
				    </div>
	        </form>
	      </div>
				<!-- MODAL FOOTER -->
	      <div class="modal-footer">
	      	<!-- CANCEL POST -->
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	        <!-- SEND POST -->
	        <button type="button" class="btn btn-success" name="add_client" id="submit_new_client">Submit</button>
	      </div>
	      <!-- END MODAL FOOTER -->
	    </div>
	  </div>
	</div>
	<!-- END POST MODAL -->

</div>
<!-- END WRAPPER DIV -->
</body>
</html>