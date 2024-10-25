<?php
include('sec/include/conn.php');
if (isset($_POST['submit-form'])){
    $id_number = $_POST['id_number'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];

    $sql = "SELECT id_number, phone, username FROM p_user WHERE id_number = '$id_number' OR phone = '$phone' OR username = '$username'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
        echo "<script>alert('sorry user exists'); 
        window.location='city_reg.php';
        </script>";
    }else{
// prepare and bind
$stmt = $conn->prepare("INSERT INTO p_user (username,id_number,phone,email,home_location,gender,password,join_date, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssssss", $username, $id_number, $phone, $email, $home_location, $gender, $password, $join_date, $image);

// set parameters and execute
$username = $_POST['username'];
$image = '0';
$phone = $_POST['phone'];
$pass = $_POST['password'];
$password = password_hash($pass, PASSWORD_DEFAULT);
$email = $_POST['email'];
$gender = $_POST['gender'];
$join_date = date('Y-m-d H:i:s');
$home_location = $_POST['home_location'];
$id_number = $_POST['id_number'];

$stmt->execute();
session_start();
$_SESSION['id_number']=$id_number;
echo "
    <script>
        window.location='image_test.php';
    </script>";

$stmt->close();
$conn->close();
    }
}
?>
