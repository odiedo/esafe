<?php
    include ('../include/conn.php');
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
    <link type="text/css" rel="stylesheet" href="../style.css">
    <link type="text/css" rel="stylesheet" href="../include/style.css">
    <style>
          .card-primary:not(.card-outline) > .card-header {
        background-color: #007bff;
      }

      .card-primary:not(.card-outline) > .card-header,
      .card-primary:not(.card-outline) > .card-header a {
        color: #ffffff;
      }

      .card-primary:not(.card-outline) > .card-header a.active {
        color: #1F2D3D;
      }

      .card-primary.card-outline {
        border-top: 3px solid #007bff;
      }
    .mech {
        color: white;
        text-shadow: 0px 0px 10px red;
        text-align: center;
        text-decoration: underline;
    }
    .one{
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
    .first_aid{
        border: 1px solid rgb(197, 197, 176);
        position: relative;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 0px red,
                    0 0 1px red,
                    0 0 2px red,
                    0 0 3px red,
                    0 0 4px red,
                    0 0 5px red;
        animation: first_aid 5s linear infinite;
    }
    @keyframes first_aid
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
        border: 0px solid red;
        align-items: center;
        border-radius: 50%;
        width: 140px;
        height: 140px;
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
<?php
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM walk_map where id_number = '$user' ORDER BY walk_date DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $id_number = $row['id_number']; 
    $title = $row['walk_title'];
    $walk_code = $row['walk_code'];
    $progress  = $row['start'];
    $destination  = $row['destination'];
    $zone = $row['zone'];
    $esafe = $row['esafe'];
?>
<?php include('nav.php'); ?>
<div class="container" style="background-color: #000;">                                                 
</div>
<br> <br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <form name='fifteenth'>
                    <h5 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5)" class="text-info card-header border-right-0 border-left-0 border-primary text-center">:: Title <i class="fa fa-map-marker"></i> <?php echo $title; ?>
                    <input type='text' size='2' name='sixteenth' class="text-center text-info bg-transparent border-top-0 border-bottom-0 border-right-0 border-left-0">
                    </h5>
                </form>
                </div>
                <div class="col-md-12 text-info" style="font-family: agency fb;">
                    <div class="border-light" style="border: 1px solid;">
                        <iframe id="googleMap" src="https://www.google.com/maps?q=<?php echo $progress; ?>&output=embed" width="100%" height="300" style="margin:0 auto; top: 0; left: 0; bottom:0; right:0; overflow:hidden; position:relative;" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container" id="realtime">
                
                </div>
            </div>
        </div>
        <div class="col-md-3">
          <div class="row">          
            <div class="col-md-12">
              <h5 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5)" class="text-info card-header border-right-0 border-left-0 border-primary"> <i class="fa fa-comments"></i> Secure Chats</h5>
              <br>
              <?php
                $sql = "SELECT * FROM chat, uni_security WHERE chat.id_number = uni_security.id_number";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()){
                        $name = $row['username'];
                        $message = $row['message'];
                        $date = $row['chat_date'];
                        echo '
                        <div style="border: 1px solid red; border-radius: 10px;" class="border-top-0 border-bottom-0">
                            <u><span class="text-info" style="padding:1px; font-size: 11px;">@'.$name.'</span></u>
                            <p class="text-info text-left"  style="padding:1px; font-size: 11px;">'.$message.' <span class="text-info float-right"  style="padding:1px; font-size: 9px">'.$date.'</span></p>
                        </div>
                        ';
                    }
                } else {
                    echo ' 
                    <div class="container">
                        <h3 class="text-info"> 0 Comments </h3>
                    </div>';
                }?>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                <?php 
                if(isset($_SESSION['id_number'])){
                    $y = $_SESSION['id_number'];
                    echo '
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="message.inc.php">
                                <input type="hidden" name="hidden_user" value="'.$y.'">
                                <textarea class="form-control bg-transparent text-light border-info" name="message" id="comment" placeholder="message here" cols="20" rows="1"></textarea>--------------------------<input class="btn btn-danger bg-transparent border-info text-info float-right" type="submit" name="submit-comment" value="Send">
                            </form>
                        </div> 
                    </div>';
                }?> <br>
          </div>
          </div>
        </div>
        <div class="col-md-3">
            <div class="container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12 text-light h4 text-center" style="text-decoration: underline; font-family: cursive; text-shadow: 0px 0px 10px red;">
                            Alerted Zone
                        </div>
                    </div>
                    <?php
                        $user = $_SESSION['id_number'];
                        $sql = "SELECT * FROM my_circle where id_number = $user";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            # code...
                            while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $phone = $row['phone'];
                    ?>
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-user-circle-o h4 text-danger"></i>
                        </div>
                        <div class="col-10">
                            <div class="row text-warning" style="font-family: cursive;">
                                <?php echo $name; ?>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<?php include('btm_nav.php'); ?>
<!-- Recent Properties end -->
<br><br>
<script>
  setInterval(function(){
    $('#realtime').load('walk_realtime.php');
  },10000);
</script>

<script language='JavaScript' type='text/JavaScript'>
var seventeenth='walk_alert.php';var eighteenth=121;var nineteenth=document.fifteenth.sixteenth.value=eighteenth+1;
function twentieth(){
if (nineteenth!=1){nineteenth-=1;document.fifteenth.sixteenth.value=nineteenth;}
else{window.location=seventeenth;return}setTimeout('twentieth()',1000);}twentieth();
</script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
<?php
        }
    }
}
?>