<?php
session_start();
if(isset($_POST['submit-report'])){
require 'conn.php';

$title = $_POST['title'];
$description = $_POST['description'];
$location = $_POST['location'];
$satisfied ='0';
$follow_up = '0';
$attended = '0';
$feedback='0';
$address = $_POST['address'];
$phone = $_POST['phone'];
$date = date('Y-m-d H:i:s');
$id_number = $_SESSION['id_number'];

$sql = "INSERT INTO report (id_number,phone, title, description, location, address, date, satisfied, follow_up, attended, feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../profile.php?error=sqlerror");
    exit();
}else{
    mysqli_stmt_bind_param($stmt, "sisssssssss",$id_number, $phone, $title, $description, $location, $address, $date,  $satisfied, $follow_up, $attended, $feedback);
    if( mysqli_stmt_execute($stmt)){
        header("Location: ../emergency/crime_alert.php?upload=success");
        exit();
    }else{
        header("Location: ../emergency/crime_emg.php?upload=error");
        exit();
    }
}

mysqli_stmt_close($stmt);
mysqli_close($con);

}else{
    header("Location: ../emergency/crime_emg.php");
    exit();
}
