<?php
    include ('../include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
    if(empty($_SESSION['id_number'])){
        header("Location: ../../index.php");
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
    <link type="text/css" rel="stylesheet" href="../assets/fonts/flaticon/font/flaticon.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="../style.css">
    <link type="text/css" rel="stylesheet" href="../include/style.css">
    <style>
    .mech {
        color: white;
        text-shadow: 0px 0px 10px red;
        text-align: center;
        text-decoration: underline;
    }
    .zone, .one{
        border: 1px solid rgb(197, 197, 176);
        position: relative;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 0px red,
                    0 0 15px red,
                    0 0 15px red,
                    0 0 20px red,
                    0 0 25px red,
                    0 0 30px red;
        animation: zone 5s linear infinite;
    }
    @keyframes zone
    {
        0%
        {
            filter: hue-rotate(0deg);
        }    
        100%
        {
            filter: hue-rotate(360deg);
        }
    }
    .sent{
        color: white;
        text-shadow: 0px 0px 10px red;        
        align-items: center;
        border: 0px solid red;
        border-radius: 50%;
        width: 200px;
        height: 200px;
        margin-bottom: 0px;
    }
    .alert {
        color: white;
    }
    .sent:hover{
        color: red;
    }
    </style>    
</header>    
<body style="background-color:#000;" oncontextmenu="return false;">
<div class="container">
    <div class="row">
        <div class="col-md-4">
<?php
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM medical_emergency, p_user where medical_emergency.id_number = $user order by sent_date DESC LIMIT 1 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    # code...
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $gender = $row['gender'];
        $email = $row['email'];
        $sent_date = $row['sent_date'];
        $hostel = $row['hostel'];
        $ambulance = $row['ambulance'];
        $satisfied = $row['satisfied'];
        $attended = $row['attended'];
        $phone = $row['phone'];
        $message = $row['message'];
        $image = $row['image'];
?>
<div class="container" style="background-color: #000;">
    <?php include('nav.php'); ?>
</div>

<br>
    <div class="card bg-transparent" style="box-shadow: 0px 3px 10px yellow;">
        <div class="card-header" style="font-family: serif">
            <center><img src="../upload/<?php echo $image; ?>" alt="profile_pic" style="width: 100px; height:100px; border-radius: 50%;" class="profile-user-img img-fluid img-circle"></center>
        </div>
        <div class="card-body text-info" style="background-size:cover;">
        <center>
            <form name='fifteenth'>Redirecting in  
                <input type='text' size='3' name='sixteenth' class="text-center text-info bg-transparent border-top-0 border-bottom-0 border-right-0 border-left-0"> seconds
            </form>
            <span class="h5 text-light text-center">Medical Emergency Report</span><br></center>
            <b>:: Username</b> <small class="float-right text-danger"><?php echo $username; ?></small><br>
            <b>:: Message</b> <small class="float-right text-danger"><?php echo $message; ?></small><br>
            <b>:: Hostel</b> <small class="float-right text-danger"><?php echo $hostel; ?></small><br>
            <b>:: Phone Number</b> <small class="float-right text-danger">0<?php echo $phone; ?></small><br>
            <b>:: Ambulance Required</b> <small class="float-right text-warning"><?php echo $ambulance; ?></small><br>
            <b>:: Reported Date</b> <small class="float-right text-warning"><?php echo $sent_date; ?></small><br>
            <b>:: Emergency Status </b> <small class="float-right text-light"><?php echo $attended; ?></small><br>
            <b>:: Safe </b> <small class="float-right text-light"> <i class="fa fa-<?php echo $satisfied; ?>-circle-o text-warning h5"></i></small><br>
            <input type=button value='Generate Report' onClick='javascript:window.print()' class="bg-transparent text-light border-light w-100">
        </div>
    </div>
<?php
    }
}?>
</div>
    </div>
</div>

<?php include('btm_nav.php'); ?>

<script language='JavaScript' type='text/JavaScript'>
var seventeenth='med_emg.php';var eighteenth=10;var nineteenth=document.fifteenth.sixteenth.value=eighteenth+1;
function twentieth(){
if (nineteenth!=1){nineteenth-=1;document.fifteenth.sixteenth.value=nineteenth;}
else{window.location=seventeenth;return}setTimeout('twentieth()',1000);}twentieth();
</script>
<!-- Recent Properties end -->
<br><br>
<?php include('btm_nav.php'); ?>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
<?php 
}
?>