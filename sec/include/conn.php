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
    session_start();

    // (1800 seconds = 30 minutes)
    $session_timeout = 1800; 

    // Check if last activity is set
    if (isset($_SESSION['last_activity'])) {
        $inactive_time = time() - $_SESSION['last_activity'];
        
        // Check if user has been inactive for too long
        if ($inactive_time > $session_timeout) {
            session_unset();
            session_destroy();
            
            header("Location: ../index.php?session_timeout");
            exit();
        }
    }

    $_SESSION['last_activity'] = time();
?>