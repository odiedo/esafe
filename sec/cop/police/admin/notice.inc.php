<?php
session_start();
if(isset($_POST['post'])){
require '../conn.php';

$message = $_POST['message'];
$venue = $_POST['venue'];
$time = $_POST['time'];
$date = $_POST['date'];
$tag = $_POST['tag'];
$id_number = $_SESSION['id_number'];

$sql = "INSERT INTO notice (id_number,message, venue, time, date, tag) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: notice.php?error=sqlerror");
    exit();
}else{
    mysqli_stmt_bind_param($stmt, "isssss",$id_number, $message, $venue, $time, $date, $tag);
    if( mysqli_stmt_execute($stmt)){
        header("Location: notice.php?upload=success");
        exit();
    }else{
        header("Location: notice.php?upload=error");
        exit();
    }
}

mysqli_stmt_close($stmt);
mysqli_close($con);

}else{
    header("Location: notice.php");
    exit();
}
