<?php

	require '../../config/config.php';

	$search = $_POST['search'];

	if(!empty($search)) {
		$query = mysqli_query($connection, "SELECT * FROM clients WHERE first_name LIKE '$search%'");

		if(!$query) {
			die('QUERY FAILED' . mysqli_error($connection));
		}

		while($row = mysqli_fetch_array($query)) {
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$username = $row['username'];

			?>
			<ul class="list-unstyled">
				<?php
				echo "<li><a href='$username'>$first_name $last_name</a></li>";
				?>
			</ul>
			<?php

		}
	}

?>