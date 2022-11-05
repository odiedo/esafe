<?php
session_start();
if(isset($_POST['submit-report'])){
require 'conn.php';

$nfire = $_POST['nfire'];
$description = $_POST['description'];
$location = $_POST['location'];
$satisfied ='0';
$follow_up = '0';
$attended = '0';
$feedback='0';
$address = $_POST['address'];
$active_phone = $_POST['active_phone'];
$phone = $_POST['phone'];
$date = date('Y-m-d H:i:s');
$id_number = $_SESSION['id_number'];

$sql = "INSERT INTO fire (id_number,phone, nfire, description, location, address, active_phone, date, satisfied, follow_up, attended, feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../emergency/fire_emg.php?error=sqlerror");
    exit();
}else{
    mysqli_stmt_bind_param($stmt, "sissssisssss",$id_number, $phone, $title, $description, $location, $address, $active_phone, $date,  $satisfied, $follow_up, $attended, $feedback);
    if( mysqli_stmt_execute($stmt)){
        header("Location: ../emergency/fire_alert.php?upload=success");
        exit();
    }else{
        header("Location: ../emergency/fire_emg.php?upload=error");
        exit();
    }
}

mysqli_stmt_close($stmt);
mysqli_close($con);

}else{
    header("Location: ../emergency/fire_emg.php");
    exit();
}
