<?php
	require ('../include/conn.php');
	$id_number = $_POST['id_number'];
	$password = $_POST['password'];
	$query = mysqli_query($conn, "SELECT id_number, password FROM uni_security WHERE id_number = '$id_number'");
	$result = mysqli_fetch_assoc($query);

	if (mysqli_affected_rows($conn) == 1){
		if (password_verify($password, $result['password'])) {
			session_start();
			$_SESSION['id_number']=$id_number;
			echo "<script>window.location='police/admin/index.php?success+';</script>";
		} else {
			echo "<script>window.location='login.php?wrongpass+';";
			echo "alert('Wrong Password! Try again.');</script>";
		}
	} else {
		echo "<script>window.location='login.php?wrongpass+';";
		echo "alert('Technical Error! Try again later.');</script>";
	}

?>