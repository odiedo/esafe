<?php
    include ('include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
    if(empty($_SESSION['id_number'])){
        header("Location: ../index.php");
        exit();
    }else{
?>
<html>
<header>
    <title>Police Unit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="include/style.css">
    <script type="text/javascript" src="include/js/jquery-1.10.2.min.js" ></script>
</header>    
<body style="background-color:#000;" oncontextmenu="return false;">
<?php
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM p_user where id_number = $user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    # code...
    while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $id = $row['user_id'];
    $image = $row['image'];
    $phone = $row['phone'];
    $id_number = $row['id_number']; 
    $hostel = $row['home_location'];
?>
<div class="container" style="background-color: #000;">
    <div class="row">
        <?php include('nav.php'); ?>
    </div>
    <div class="row">
        <div class="col-md-4 modal_one">
            <center><i class="fa fa-bullhorn h4"><u> Notice Board</u></i></center>
        </div>
    </div>
    <div class="col-xl-7 col-md-7 col-lg-7">
    <div class="row">
        <?php
        $query = "SELECT * FROM notice ORDER BY notice_id DESC";
        $result = $conn->query($query);
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
            // code...
                $message = $row['message'];
                $venue = $row['venue'];
                $time = $row['time'];
                $date = $row['date'];
                $tag = $row['tag'];?>
                <div class="card col-md-6 text-light border-top-0 border-right-0 border-left-0 bg-transparent" style="font-size:10px; background-color: rgba(0,0,0,.5);box-shadow: 0 10px 10px 0 lightblue;">
                    <div class="card-body">
                        <span>Message:: <?php echo $message; ?></span><br>
                        <span>Venue:: <?php echo $venue; ?></span><br>
                        <span>Date/Time:: <?php echo $time; ?></span> <?php echo $date; ?><br>
                        <span>#<?php echo $tag; ?></span>
                    </div>
                </div><br>
            <?php    }}?>
        </div>
    </div>
</div>
<br><br>
<?php include('btm_nav.php'); ?>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
<?php 
        }
    }
}
?>