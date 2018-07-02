<?php
	include('includes/header.php');
	// session_destroy();
?>
	<div  class="text-center">
		<p>Welcome to the Jungle <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>!</p>
		<p>Your Client List</p>
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



</div>
<!-- END WRAPPER DIV -->
</body>
</html>