<?php
    $con=mysqli_connect("localhost","root","",'uni_sec');
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uni_sec";

    $conn = new mysqli($servername, $username, $password, $dbname);
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
    $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
    }
    if ($conn->connect_error) {
    # code...
    die("Connection failed: " .$conn->connect_error);
    }
?>