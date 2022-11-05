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
$sql = "SELECT * FROM report where id_number = '$user' ORDER BY date DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $date_reported = $row['date'];
    $report_id = $row['report_id'];
    $id_number = $row['id_number']; 
    $title = $row['title'];
    $description = $row['description'];
    $location = $row['location'];
    $address = $row['address'];
    $report_id = $row['report_id'];
    $follow_up = $row['follow_up'];
?>
<?php include('nav.php'); ?>
<div class="container" style="background-color: #000;">
</div>
<br> <br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="crime_safe.php" method="POST">
                            <center><input class="h6 btn sent one" type="submit" name="safe" value="Safe!">
                                
                            </button></center>
                        </form>
                    </div>
                </div> <br> 
                <div class="row">
                    <div class="col-12 text-light text-center">
                        <form name='fifteenth'>  
                            <input type='text' size='2' name='sixteenth' class="text-center text-info bg-transparent border-top-0 border-bottom-0 border-right-0 border-left-0"> seconds to your  next follow-up
                        </form>
  
                        <form name='jarvis' id="jarvis"  action="crime_report.php">

                        </form>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="container" id="realtime">
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <button class="bg-transparent text-center first_aid text-light w-100"  data-toggle="modal" data-target="#aidModal" type="button">Perform First Aid</button>
                    </div>
                </div>
                    <!-- modal -->
                    <div class="modal fade" id="aidModal" tabindex="-1" role="dialog" aria-labelledby="aidModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                <div class="card bg-transparent border-info">
                                    <div class="card-header border-info">
                                        <h5 class="card-title text-info float-left">First Aid summary</h5>
           
                                    </div>
                                    <div class="card-body text-light">
                                        <form>
                                            <input type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search first aid services" class="bg-transparent border-info border-top-0 border-left-0 border-right-0 text-light w-100">
                                            <div id="livesearch" class="text-light"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
    $('#realtime').load('crime_realtime.php');
  },1000);
</script>
<script>
    var auto_refresh = setInterval(function(){ submitform(); }, 60000);
    function submitform(){
        document.getElementById("jarvis").submit();
    }
</script>
<script language='JavaScript' type='text/JavaScript'>
var seventeenth='crime_alert.php';var eighteenth=61;var nineteenth=document.fifteenth.sixteenth.value=eighteenth+1;
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