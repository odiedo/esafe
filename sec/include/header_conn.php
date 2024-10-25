<?php
	// Check if the user is logged in
	if (!isset($_SESSION['id_number'])) {
	    header("Location: ../index.php?session_expired");
	    exit();
	}
?>