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
    <?php include('nav.php'); ?>


<br> <br> <br>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4 c_near">
            <div class="row">
                <div class="col-md-12 alert text-center">
                    <form action="" method="post">
                    <textarea id="code" name="code" class="bg-transparent text-center text-light" hidden> </textarea>
                        <input id="street" name="start" type="text" hidden>
                            <script>
                                window.onload=function(){
                                    $('.output').empty();
                                        
                                        for (var a = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], i = a.length; i--; ) {
                                            var random = a.splice(Math.floor(Math.random() * (i + 1)), 1)[0];
                                            $('#code').append(random);
                                        }   


                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                    } else { 
                                        document.getElementById("street").value = "Geolocation is not supported by this browser.";
                                    }
                                } 
                                function showPosition(position) {
                                    document.getElementById("street").value = " " + position.coords.latitude + "," + position.coords.longitude;
                                }
                                function cancel(){
                                    var tag = document.getElementById('tag');
                                    tag.style.display = "none";
                                }
                            </script>
                            
                            <button class="h6 btn sent one" data-toggle="modal" id="button-play-v-once" data-target="#alertModal" type="button"><i class="text-center h1 fa fa-google-wallet"></i><br> Accompany Me</button>
                            <!-- modal -->
                            <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">

                                    </div>
                                    <div class="modal-body">
                                        <div class="card bg-transparent border-warning">
                                            <div class="card-header border-warning">
                                                <h5 class="card-title text-warning float-left" style="font-family: cursive;">Accompany Me!</h5>
                                                <div class="card-tool float-right">
                                                    @Mr_Robot AI
                                                </div>                    
                                            </div>
                                            <div class="card-body text-light">
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                    <span>:: Walk Title</span> <br>
                                                        <input type="text" autocomplete="off" name="walk_title" required placeholder="" class="text-warning form-control border-warning bg-transparent">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <span>:: Destination</span> <br>
                                                        <select name="destination" class="form-control bg-transparent border-warning text-warning" id="location" required>
                                                            <option selected disabled class="text-light" style="background-color:#000;">Select Your Destination</option>
                                                            <option class="text-light" style="background-color:#000;">Green Valley</option>
                                                            <option class="text-light" style="background-color:#000;">Market</option>
                                                            <option class="text-light" style="background-color:#000;">Caroline Herine</option>
                                                            <option class="text-light" style="background-color:#000;">Nyawita</option>
                                                            <option class="text-light" style="background-color:#000;">Vet Farm</option>
                                                            <option class="text-light" style="background-color:#000;">Tsunami</option>
                                                        </select>
                                                    </div>
                                                </div> <br>
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                    <span>:: Tag your company</span> <br>
                                                        <input type="checkbox" name="zone" required> <span>Your Zone</span><br>
                                                        <input type="checkbox" name="esafe"> <span>E-Safe Security</span><br>
                                                    </div>
                                                </div>
                                                <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>" hidden><br>
                                                <button class="btn w-30 border-danger bg-transparent text-light" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn w-70 border-success bg-transparent text-light" name="start_btn"><i class="fa fa-send"></i> Start Walk</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <blockquote class="blockquote text-left border-success" style="background-color: rgba(0,0,0,.5); ">
                                <p class="mb-0 text-center h6 text-warning" style="font-family: cursive;">"Walk with friends to feel secure."</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <blockquote class="blockquote text-left border-success" style="background-color: rgba(0,0,0,.5); ">
                            <p class="mb-0 text-danger text-center h6" style="font-family: cursive;">"Walk Safely, Walk With Your Zone, Walk with E-Safe Security"</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">


        </div>
    </div>
</div>
</div>
 <br><br> <br>
<?php include('btm_nav.php'); ?>
</div>
<br><br><br><br><br>
    <script>
      window.navigator = window.navigator || {};
      if (navigator.vibrate === undefined) {
          document.getElementById('v-unsupported').classList.remove('hidden');
          ['button-play-v-once'].forEach(function(elementId) {
            document.getElementById(elementId).setAttribute('disabled', 'disabled');
          });
      } else {
          document.getElementById('button-play-v-once').addEventListener('click', function() {
            navigator.vibrate(80);
          });
      }
    </script>

<script>
var yourT=document.getElementById("mr_robot");
var innerH=yourT.innerHTML;
var innerL=innerH.length;
var count=0;
function doit(){
	if (count<innerL){		document.getElementById("mr_robot").innerHTML+=innerH.charAt(count);		count++;	} 
else{clearInterval(Timer)};}
function go(){	
document.getElementById("mr_robot").innerHTML="";
	Timer=setInterval("doit()",100);}
window.onload=go;
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
if (isset($_POST['start_btn'])){
    $id_number = $_SESSION['id_number'];
    $walk_title  = $_POST['walk_title'];
    $start  = $_POST['start'];
    $walk_code  = $_POST['code'];
    $destination  = $_POST['destination'];
    $zone = $_POST['zone'];
    $esafe = $_POST['esafe'];
    $walk_date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO walk_map (id_number, walk_code, walk_title, start, destination, zone, esafe, walk_date)
    VALUES ('$id_number', '$walk_code', '$walk_title' , '$start', '$destination', '$zone', '$esafe', '$walk_date')";

    if (mysqli_query($conn, $sql)) {
        $progress  = $_POST['start'];
        $walk_time = date('Y-m-d H:i:s');
        $jql = "INSERT INTO walk_progress (id_number, walk_code, progress, walk_time)
        VALUES ('$id_number', '$walk_code', '$progress', '$walk_time')";
        if (mysqli_query($conn, $jql)) {
            echo "
            <script>
                window.location='walk_alert.php';
            </script>
            ";
        }
        else {
            echo "Error: " . $jql . "<br>" . mysqli_error($conn);
            }
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<?php 
        }
    }
}
?>