<?php
// CREATE CONNECTION VARIABLE
$con = mysqli_connect('localhost', 'root', 'root', 'jungle_db');

// CHECK FOR CONNECTION ERROR
if(mysqli_connect_errno()) {
	echo "Failed to connect: " + mysqli_connect_errno();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to the Jungle!</title>
</head>
<body>
	Welcome to the Jungle!
</body>
</html>