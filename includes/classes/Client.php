<?php
	class Client {

		// PRIVATE VARIABLES
		private $user;
		private $connection;

		// CREATE PUBLIC VARIABLES
		public function __construct($connection, $user) {
			// CONNECTION VARIABLE
			$this->connection = $connection;
			// CREATE NEW USER OBJECT
			$this->user_obj = new User($connection, $user);
		}

		public function addClient($first_name, $last_name, $company) {
			$first_name = strip_tags($first_name);
			$first_name = mysqli_real_escape_string($this->connection, $first_name);
			// $check_empty = preg_replace('/\s+/', '', $first_name);

			$last_name = strip_tags($last_name);
			$last_name = mysqli_real_escape_string($this->connection, $last_name);
			// $check_empty = $check_empty . preg_replace('/\s+/', '', $last_name);

			$company = strip_tags($company);
			$company = mysqli_real_escape_string($this->connection, $company);
			// $check_empty = $check_empty .  preg_replace('/\s+/', '', $company);

			$username = strtolower($first_name . '_' . $last_name);


			

				$date_added = date('Y-m-d');

				$query = mysqli_query($this->connection, "INSERT INTO clients VALUES('', '$first_name', '$last_name', '$username', '$company', '', '', '', '', '', '', '', '', '', '', '', '$date_added', 'no', ',' )");

				$returned_id = mysqli_insert_id($this->connection);

			
		}

	}
?>