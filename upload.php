<?php
include ('sec/include/conn.php');
ini_set('session.gc_maxlifetime', 1440); 
session_start();
$image = $_POST['image'];

list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name = time().'.png';
file_put_contents('sec/upload/'.$image_name, $image);

$id_number = $_SESSION['id_number'];
$sql = "UPDATE p_user SET image='$image_name' WHERE id_number= '$id_number'";
$stmt = $conn->prepare($sql);
$stmt->execute();
echo "
    <script>
        alert('success!');
        window.location='index.php';
    </script>";

$stmt->close();
$conn->close();
?>