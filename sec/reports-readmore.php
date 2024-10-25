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
    <link type="text/css" rel="stylesheet" href="../assets/fonts/flaticon/font/flaticon.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="include/style.css">
    
    <style>
      body{
        background-color: #000;
      }
      .card-primary:not(.card-outline) > .card-header {
        background-color: #8A080A;
      }

      .card-primary:not(.card-outline) > .card-header,
      .card-primary:not(.card-outline) > .card-header a {
        color: #ffffff;
      }

      .card-primary:not(.card-outline) > .card-header a.active {
        color: #1F2D3D;
      }

      .card-primary.card-outline {
        border-top: 3px solid #8A080A;
      }
  .emg {
    position: relative;
    width: 100%;
    height: 30px;
    background: #000;
    color: #fff;
    padding-top: 10px;
    font-weight: bold;
    line-height: 5px;
    }
    .emg:before,
    .emg:after {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        width: calc(100% + 6px);
        height: calc(100% + 6px);
        background: linear-gradient(45deg, red, blue, green, blue, yellow, purple);
        z-index: -1;
        background-size: 400%;
        animation: borderbg 40s linear infinite;
    }
    @keyframes borderbg{
        0%{
            background-position: 0 0;
        }
        50%{
            background-position: 400% 0;
        }
        100%{
            background-position: 0 0;
        }
    }
    .emg:after{
        filter: blur(5px);
    }
    </style>
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
    $id_number = $row['id_number']; 
   include('nav.php');?>
<br>
<div class="container">
  <div class="row">
  <div class="col-md-12 bg-transparent">
    <img src="assets/img/banner.jpg" class="bg-transparent" alt="stop crime" style="width:100%; height:200px;">
  </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-3">
    <br>
      <div class="card card-primary card-outline bg-transparent bg-transparent" style="background-color: rgba(0,0,0,.5);box-shadow: 0 7px 10px 0 #8A080A;padding-top: 10%;">
        <div class="card-header h5 text-light text-center" style="font-family: serif; text-decoration:underline;">
          Case Category
        </div>
        <div class="card-body">
          <div class="product-info">
            <a href="javascript:void(0)" class="product-title text-light">Rape Case
            <span class="badge badge-primary float-right">13 Cases</span></a><br>
            <span class="product-description"> Majority are Children under the age of 10 </span>
          </div>
          <div class="product-info">
            <a href="javascript:void(0)" class="product-title text-light">Murder Case
            <span class="badge badge-primary float-right">4 Cases</span></a><br>
            <span class="product-description"> Family drama </span>
          </div>
          <div class="product-info">
            <a href="javascript:void(0)" class="product-title text-light">Robbery
            <span class="badge badge-primary float-right">3 Cases</span></a><br>
            <span class="product-description"> Bank Robbery Attempt </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9" id="rep">

    </div>
  </div>
  <br><br>
</div>
<br>
<?php include('btm_nav.php');?>



<script>
  setInterval(function(){
    $('#rep').load('include/reports.readmore.inc.php');
  },1000);
</script>


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