<?php
session_start();
include ('../include/conn.php');
if (isset($_POST['ambulance'])){
    $id_number = $_SESSION['id_number'];
    $sql = "UPDATE my_circle_messages SET Ambulance='YES' WHERE id_number= '$id_number'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "
        <script>
            alert('success!');
            window.location='med_alert.php';
        </script>";    
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>