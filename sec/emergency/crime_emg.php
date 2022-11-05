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
</div>

<br> <br> <br>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4 c_near">
            <div class="row">
                <div class="col-md-12 alert text-center">
                    <form action="../include/report.inc.php" method="post">
                        <input id="street" name="address" type="text" hidden>
                            <script>
                                window.onload=function(){
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
                            <button name="" class="h6 btn sent one"  id="button-play-v-once" data-toggle="modal" data-target="#alertModal" type="button"><i class="h1 text-center fa fa-user-secret"></i><br> Report Crime</button>
                            <!-- Modal -->
                            <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <div class="card bg-transparent border-info">
                                            <div class="card-header border-info">
                                                <h5 class="card-title text-info float-left" style="font-family: cursive;">Report Crime</h5>
                                                <div class="card-tool float-right">
                                                    @Mr_Robot AI
                                                </div>                    
                                            </div>
                                            <div class="card-body text-light">
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <span>:: Case Type</span> <br>
                                                        <select name="title" class="form-control bg-transparent border-info text-info" required>
                                                            <option selected disabled class="text-light" style="background-color:#000;">Select Case Type</option>
                                                            <option class="text-light" style="background-color:#000;">Break-in</option>
                                                            <option class="text-light" style="background-color:#000;">Assault</option>
                                                            <option class="text-light" style="background-color:#000;">Suspicious Activity</option>
                                                            <option class="text-light" style="background-color:#000;">Robbery</option>
                                                            <option class="text-light" style="background-color:#000;">Rape Case</option>
                                                            <option class="text-light" style="background-color:#000;">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <span>:: Case Description</span> <br>
                                                        <textarea name="description" id="description" rows="3" placeholder="Short case Description Here" class="form-control bg-transparent border-info text-info"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-12 text-left">
                                                        <span>:: Case Location</span> <br>
                                                        <select name="location"  class="form-control bg-transparent border-info text-info" id="location">
                                                            <option selected disabled class="text-light" style="background-color:#000;">Select Crime Location</option>
                                                            <option class="text-light" style="background-color:#000;">Mabungo</option>
                                                            <option class="text-light" style="background-color:#000;">Green Valley</option>
                                                            <option class="text-light" style="background-color:#000;">Market</option>
                                                            <option class="text-light" style="background-color:#000;">Caroline Herine</option>
                                                            <option class="text-light" style="background-color:#000;">Nyawita</option>
                                                            <option class="text-light" style="background-color:#000;">Vet Farm</option>
                                                            <option class="text-light" style="background-color:#000;">Tsunami</option>
                                                        </select>
                                                    </div>
                                                </div> <br>
                                                <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>" hidden><br>
                                                <button class="btn w-30 border-info bg-transparent text-light" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn w-70 border-info bg-transparent text-light" name="submit-report">Report</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <blockquote class="blockquote text-left border-success" style="background-color: rgba(0,0,0,.5); ">
                                <p class="mb-0 text-info text-left h6" style="font-family: cursive;">"Fight Crime and Stay Safe"</p>
                                <footer class="blockquote-footer text-right"> <cite title="Source Title">FunCorp Developers</cite></footer>
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

<?php include('btm_nav.php'); ?>
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
        }
    }
}
?>