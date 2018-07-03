<?php
	// INCLUDE NECCESSARY FILES AND SCRIPTS
	include('includes/header.php');
	include('includes/form_handlers/settings_handler.php');
?>


	<?php
		$user_data_query = mysqli_query($connection, "SELECT first_name, last_name, email, username FROM users WHERE username='$userLoggedIn'");
		$row = mysqli_fetch_array($user_data_query);

		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		$username = $row['username'];
	?>

	<br />

	<!-- CHANGE USER EMAIL PANEL -->
	<div class="settings-panel">
		<!-- CHANGE EMAIL TITLE -->
		<h4 class="text-center">Change Email</h4>

		<form action="settings.php" method="POST">
			<!-- EMAIL -->
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" />
			</div>
			<!-- ERROR/SUCCESS MESSAGE -->
			<?php echo $message; ?>

			<!-- SUBMIT BUTTON -->
			<div class="text-center">
				<input type="submit" name="update_email" id="update_email" value="Change Email" class="btn btn-outline-light" />
			</div>
			<br />
		</form>
		<!-- END CHANGE PASSWORD FORM -->
	</div>
	<!-- END CHANGE USER EMAIL PANEL -->

	<br /><br />


	<!-- CHANGE USER EMAIL PANEL -->
	<div class="settings-panel">
		<!-- CHANGE EMAIL TITLE -->
		<h4 class="text-center">Update Password</h4>

		<!-- CHANGE PASSWORD FORM -->
		<form action="settings.php" method="POST">
			<!-- OLD PASSWORD -->
			<div class="form-group">
				<label>Old Password</label>
				<input type="password" class="form-control" id="old_password" name="old_password" />
			</div>
			<!-- NEW PASSWORD -->
			<div class="form-group">
				<label for="new_password_1">New Password</label>
				<input type="password" class="form-control" id="new_password_1" name="new_password_1" />
			</div>
			<!-- NEW PASSWORD CONFIRMATION -->
			<div class="form-group">
				<label for="new_password_2">Confirm New Password</label>
				<input type="password" class="form-control" id="new_password_2" name="new_password_2" />
			</div>
			<br />

			<!-- ERROR/SUCCESS MESSAGE -->
			<?php echo $password_message; ?>

			<!-- SUBMIT BUTTON -->
			<div class="text-center">
				<input type="submit" name="update_password" id="save_password" value="Update Password" class="btn btn-outline-light" />
			</div>
			<br />
		</form>
		<!-- END CHANGE PASSWORD FORM -->
	</div>
	<!-- END CHANGE USER PASSWORD PANEL -->

	<br /><br />

</div>
<!-- END USER SETTINGS PANEL -->

</div>
<!-- END WRAPPER DIV -->
</body>
</html>