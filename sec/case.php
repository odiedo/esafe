<?php
    include ('include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
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
    <style>
    .hello{
        border: 1px solid red;
        margin: 5px;
        height: 200px;
        box-shadow: 0px 0px 10px blue;
        padding: 0px;
    }
    
    </style>
    </head>
<body style="background-color: #000;">
<?php include('nav.php');?>
<div class="container">
    <div class="row">
<?php
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM report,p_user where report.id_number = $user and p_user.id_number = $user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    # code...
    while ($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $report_id = $row['report_id'];
    $description = $row['description'];
    $location = $row['location'];
    $phone = $row['phone'];
    $address = $row['address'];
    $date = $row['date'];
    $id_number = $row['id_number']; 

?>    
    <div class="col-md-3 hello card-primary card-outline bg-transparent border-primary border-left-0 border-right-0">
        <div class="card-body">
        <div style="font-family: agency fb; text-transform:uppercase; text-shadow: 10px 0px 20px red;" class="text-light text-center h6"><?php echo $title;?> [<?php echo $report_id;?>]</div>
            <p style="font-family: serif; text-transform: lowercase;" class="text-light card-header border-top-0 border-bottom-0 border-danger">
            <?php  echo mb_strimwidth($description, 0, 50, '...'); ?><br><i style="color: yellow; font-size: 10px;"><p style="margin-bottom: 1px;"><?php echo $date; ?><p></i></p>
            <?php echo"<a href='case.readmore.inc.php?report_id=$report_id'  class='emg btn text-center' style='width:100%;'>View Report</a>"; ?>        
        </div>
    </div>

<?php 
    }
}else {?>
        <div class="col-md-3 hello card-primary card-outline bg-transparent border-primary border-left-0 border-right-0">
        <div class="card-body">
            <div style="font-family: agency fb; text-transform:uppercase; text-shadow: 10px 0px 20px red;" class="text-light text-center h6">No case reported</div>
                <p style="font-family: serif; text-transform: lowercase;" class="text-light card-header border-top-0 border-bottom-0 border-danger">
                <center><i class="fa fa-comments text-light text-center" style="font-size: 50px; text-shadow: 0px 0px 10px yellow;"></i></center>
            </div>
        </div>
    <?php }
?>
    </div>
</div>
<br><br>
<?php include('btm_nav.php'); ?>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS Requirements -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>