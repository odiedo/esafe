<?php

if(isset($_POST['submit-comment'])){

    require 'conn.php';
    
    $id = $_POST['hidden_id'];
    $comment = $_POST['comment'];
    $user = $_POST['hidden_user'];

    $sql = "INSERT INTO comments (username, message, report_id) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: readmore.process.inc.php?error=sqlerror&id=".$id);
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ssi",$user, $comment, $id);
        if( mysqli_stmt_execute($stmt)){
            header("Location: readmore.process.inc.php?readmore=url&id=".$id);
        exit();
        }else{
            header("Location: readmore.process.inc.php?upload=error&id=".$id);
        exit();
        }
       
        
    }



mysqli_stmt_close($stmt);
mysqli_close($con);

}else{
    header("Location: readmore.process.inc.php?readmore=url&id=".$id);
}