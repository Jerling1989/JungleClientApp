<?php
	include('includes/header.php');
	session_destroy();
?>
	Welcome to the Jungle <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>!
</body>
</html>