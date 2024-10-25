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
$sql = "SELECT * FROM medical_emergency where id_number = '$user' ORDER BY sent_date DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    # code...
    function time_elapsed_string($date, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($date);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    while ($row = $result->fetch_assoc()) {
    $time = $row['sent_date'];
    $date_reported =  time_elapsed_string($time); 
    $id_number = $row['id_number']; 
    $hostel = $row['hostel'];
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
                        <form action="" method="POST">
                            <center><button class="h6 btn sent one" type="submit" name="safe">
                                Safe!
                            </button></center>
                        </form>
                    </div>
                </div> <br> <br>
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
            </div>
            <br><br>
            <div class="container border-top-0 border-left-0 border-right-0 border-bottom-0 ">
                <br>
                <div class="row">
                    <div class="col-12 text-light h4 text-center" style="text-decoration: underline; font-family: cursive; text-shadow: 0px 0px 10px red;">
                            Nearest Hospitals
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 text-info" style="font-family: cursive;">
                        Malaba Dispensary
                    </div>
                    <div class="col-3 text-info" style="font-family: cursive;">
                        1km 
                    </div>
                    <div class="col-3 text-danger bg-transparent btn btn-danger" style="font-family: cursive;">
                        Direction 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 text-info" style="font-family: cursive;">
                        Appex Pri. Hospital
                    </div>
                    <div class="col-3 text-info" style="font-family: cursive;">
                        1.4km 
                    </div>
                    <div class="col-3 text-danger btn bg-transparent btn-danger" style="font-family: cursive;">
                        Direction 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 text-info" style="font-family: cursive;">
                        Kocholya Hospital
                    </div>
                    <div class="col-3 text-info" style="font-family: cursive;">
                        4km 
                    </div>
                    <div class="col-3 text-danger btn bg-transparent btn-danger" style="font-family: cursive;">
                        Direction 
                    </div>
                </div>
                <br>
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
    $('#realtime').load('med_realtime.php');
  },1000);
</script>
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['safe'])){
    $id_number = $_SESSION['id_number'];
    $sqla = "SELECT * FROM medical_emergency where id_number = '$user' ORDER BY sent_date DESC LIMIT 1";
    $result = $conn->query($sqla);
    if ($result->num_rows > 0) {
    }
    while ($row = $result->fetch_assoc()) {
        $alert_id = $row['medical_id'];

        $sql = "UPDATE medical_emergency SET satisfied ='check', attended = 'Ok', feedback='Ok' WHERE medical_id='$alert_id'";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                window.location='med_report.php';
            </script>
            ";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
        }

            }
        }
    }
}
?>
