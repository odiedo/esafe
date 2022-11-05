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
.profile-user-img {
  border: 3px solid #adb5bd;
  margin: 0 auto;
  padding: 3px;
  width: 100px;
}
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
.emg {
    position: relative;
    width: 100%;
    height: 30px;
    background: #000;
    color: #fff;
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
    </head>
<body style="background-color: #000;">
<?php
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM p_user where id_number = $user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    # code...
    while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $name = $row['email'];
    $id = $row['user_id'];
    $location = $row['home_location'];
    $gender = $row['gender'];
    $date = $row['join_date'];
    $image = $row['image'];
    $id_number = $row['id_number']; 
include ('nav.php');
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-5 card bg-transparent" style="box-shadow: 1px 1px 1px 0px green;">
            <span class="h4 text-light bg-transparent text-left" style="font-family: cursive; text-shadow: 0px 0px 10px red;">My Zone List!</span><br>
            <span class="text-info h6 text-left">Nice friends lists for emergency</span><br>
            <span style="color: white; font-family: cursive">Notice that these lists will be contacted incase you are in any type of emergency and you need help!!! Choose friends within the university.</span><br>
            <form action="" method="post" enctype='multipart/form-data'>
                <span style="color: white; text-shadow: 0px 0px 10px red;">Zone List:</span> <br>
                <span class="text-success">Nickname:<span class="text-danger">*</span></span><br>
                <input type="text" name="name" class="text-success bg-transparent border-light form-control" autocomplete="off" required title="name"><br>
                <span class="text-warning">Phone Number:<span class="text-danger">*</span></span><br>
                <input type="tel" name="phone" class="bg-transparent text-warning border-light form-control" autocomplete="off" required title="phone number"><br>
                <button type="submit" name="add-zone" class="emg" >Add zone</button> <br><br>
            </form>
        </div>
        <div class="col-md-7 border-right-0 border-top-0 border-bottom-0 card bg-transparent" style="box-shadow: 2px 2px 2px 2px yellow;">
            <br>
            <span class="h4 text-light text-left bg-transparent" style="font-family: cursive; text-shadow: 0px 0px 10px red;">Zone List!</span><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: serif; color: orange;" class="text-left">You can Add/Delete friends from your zone!</span><br>

                    </div>
                </div>
                <div class="zone" id="zone">

                </div>
            </div>
            <hr class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: serif; color: orange;" class="text-left">Zone Messages History</span>
                    </div>
                </div>
                <div class="row" id="messages">
                    
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>

<script>
  setInterval(function(){
    $('#zone').load('include/my_circle.inc.php');
  },1000);
  setInterval(function(){
    $('#messages').load('include/my_circle.inc.messages.php');
  },1000);
</script>
<?php include('btm_nav.php'); ?>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

</body>
</html>
<?php
if (isset($_POST['add-zone'])){
    $id_number = $row['id_number']; 
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $join_date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO my_circle (id_number, name, phone, join_date)
    VALUES ('$id_number', '$name' , '$phone','$join_date')";

    if (mysqli_query($conn, $sql)) {
    echo "
        <script>
            alert('Friend Added in the Zone List successfully!');
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
}?>