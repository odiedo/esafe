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
                        <form action=" " method="POST">
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
                            <button name="" class="h6 btn sent one" id="button-play-v-once" data-toggle="modal" data-target="#alertModal" type="button"><i class="fa fa-fire h1"></i><br> Send Fire Alert </button>                            
                            <!-- Modal -->
                            <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <div class="card bg-transparent border-info">
                                            <div class="card-header border-info">
                                                <h5 class="card-title text-info float-left" style="font-family: cursive;">Report Fire Emergency</h5>
                                                <div class="card-tool float-right">
                                                    @Mr_Robot AI
                                                </div>                    
                                            </div>
                                            <div class="card-body text-light">
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <span>:: Nature of Fire </span> <br>
                                                        <select name="nfire" class="form-control bg-transparent border-info text-info" required>
                                                            <option selected disabled class="text-light" style="background-color:#000;">Select fire type</option>
                                                            <option class="text-light" style="background-color:#000;">Low</option>
                                                            <option class="text-light" style="background-color:#000;">Medium</option>
                                                            <option class="text-light" style="background-color:#000;">High</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <span>:: Description</span> <br>
                                                        <textarea name="description" id="description" rows="3" placeholder="e.g the type of house under fire like storey building" class="form-control bg-transparent border-info text-info"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                        <span>:: Active Phone Number</span> <br>
                                                        <input type="number" name="active_phone" class="form-control bg-transparent border-info text-info" placeholder="07***">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-12 text-left">
                                                        <span>:: Location</span> <br>
                                                        <select name="location"  class="form-control bg-transparent border-info text-info" id="location">
                                                            <option selected disabled class="text-light" style="background-color:#000;">Select Fire Location</option>
                                                            <option class="text-light" style="background-color:#000;">Roadblock</option>
                                                            <option class="text-light" style="background-color:#000;">Uplands</option>
                                                            <option class="text-light" style="background-color:#000;">Kajei</option>
                                                            <option class="text-light" style="background-color:#000;">Machakusi</option>
                                                            <option class="text-light" style="background-color:#000;">Amoni</option>
                                                            <option class="text-light" style="background-color:#000;">Achunet</option>
                                                            <option class="text-light" style="background-color:#000;">Ikapolok</option>
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
        </div>
        <div class="col-md-4">

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
if (isset($_POST['submit-report'])){
    $nfire = $_POST['nfire'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $satisfied ='0';
    $follow_up = '0';
    $attended = '0';
    $feedback='0';
    $address = $_POST['address'];
    $active_phone = $_POST['active_phone'];
    $phone = $_POST['phone'];
    $date = date('Y-m-d H:i:s');
    $id_number = $_SESSION['id_number'];
    $sql = "INSERT INTO fire (id_number, phone, nfire, description, location, address, active_phone, date, satisfied, follow_up, attended, feedback)
    VALUES ('$id_number', '$phone' , '$nfire', '$description', '$location', '$address', '$active_phone', '$date', '$satisfied', '$follow_up', '$attended', '$feedback')";

    if (mysqli_query($conn, $sql)) {
    echo "
    <script>
        window.location='fire_alert.php';
    </script>
    ";
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