<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>Police unit</title>
	</head>
<body>
<?php
	require ('sec/include/conn.php');
	$id_number = $_POST['id_number'];
	$password = $_POST['password'];
	$query = mysqli_query($conn, "SELECT id_number, password FROM p_user WHERE id_number = '$id_number'");
	$result = mysqli_fetch_assoc($query);

	if (mysqli_affected_rows($conn) == 1){
		if (password_verify($password, $result['password'])) {
			session_start();
			$_SESSION['id_number']=$id_number;
			echo "<script>window.location='sec/index.php?success+';</script>";
		} else {
			echo "<script>window.location='index.php?wrongpass+';";
			echo "alert('Please check Your Login Credentials!!!');</script>";
		}
	} else {
		echo "<script>window.location='index.php?wrongpass+';";
		echo "alert('Please check Your ID number and Try Again!!!');</script>";
	}

?>

</body>
</html>