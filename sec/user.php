<?php
    include ('include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
    if(empty($_SESSION['id_number'])){
        header("Location: index.php");
        exit();
    }else{
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Police Unit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">
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

        .reports {
            padding:10px;

        }
        .reports:hover {
            color:yellow;
            text-decoration:none;
        }
        .image {
            height: 100px;
            width: 100px;
            bottom:0%;
            text-shadow: 0px 0px 10px yellow;
            margin-bottom: 10px;
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
    $phone = $row['phone'];
    $gender = $row['gender'];
    $date = $row['join_date'];
    $image = $row['image'];
    $id_number = $row['id_number']; 
?>
<br>
<?php include('nav.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                    <div class="col-md-12">
                        <div class="row card-primary card-outline bg-transparent">
                        
                                <div class="col-md-6">
                                    <div class="card-body text-center text-info"> 
                                        <a href="report.php" class="emg float-left reports" >Report case</a><br><br>
                                        <a href="report.php" class="emg float-left reports" >Record Suspicious activity</a><br><br>
                                        <a href="report.php" class="emg float-left reports" >Robbery in progress</a></form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body text-center text-info">
                                        <button class=" reports emg float-right" onClick="getLocation()">Emergency</button><br><br>
                                        <a href="report.php" class="emg float-left reports" >Your zone</a><br><br>
                                        <a href="report.php" class="emg float-left reports" >Lost And Found</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="card card-primary card-outline bg-transparent">    
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-transparent border-info border-left-0 border-right-0 border-top-0">
                            <div class="card-header text-info h5" style="font-family: serif">
                                My Case
                            </div><hr class="bg-light">
                            <div class="card-body text-info"  style="background-image: url(assets/img/to.png); background-size:cover;">
                                <b>Case Type:</b> <small class="float-right text-light">murder</small><br>
                                <b>Case ID:</b> <small class="float-right text-light">#319M021</small><br>
                                <b>Reported Date:</b> <small class="float-right text-light">1/11/2020</small><br>
                                <b>Case Status:</b> <small class="float-right progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%; background-color:green; border-radius:21px;">pending</small><br>
                                <b>Police incharge:</b> <small class="float-right progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%; background-color:green; border-radius:21px;">pending</small><br>
                            </div>
                            <hr class="bg-light">
                            <div class="card-footer text-light">
                                To view more details, <?php echo "<a href='case.php?id_number=$id_number'>";?> click here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-transparent border-info border-left-0 border-right-0 border-top-0">
                            <div class="card-header text-info h5" style="font-family: serif">
                                Make follow up
                            </div><hr class="bg-light">
                            <div class="card-body text-info" style="background-image: url(assets/img/to.png); background-size:cover;">
                                <b>Case ID:</b> <small class="float-right text-light">#319M021</small><br>
                                <b>Case Type:</b> <small class="float-right text-light">murder</small><br>
                                <b>Follow  up attempts:</b> <small class="float-right text-light">3</small><br>
                                <b>Reported Date:</b> <small class="float-right text-light">1/11/2020</small><br>
                                <b>Case Status:</b> <small class="float-right progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%; background-color:green; border-radius:21px;">pending</small><br>
                            </div>
                            <hr class="bg-light">
                            <div class="card-footer text-light">
                                To make follow up of your case, <a href="#">click here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="col-md-4 text-light" >
            <div class="card card-primary card-outline" style="background-color: rgba(0,0,0,.5);box-shadow: 0 10px 18px 0 rgba(0, 100, 100, 0.7);padding-top: 10%;">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img data-toggle="modal" data-target="#Modal" class="profile-user-img img-fluid img-circle" src="upload/<?php echo $image; ?>" alt="User profile picture" style="height: 150px; width: 150px; border-radius: 50%;">
                    </div>
                    <h3 class="profile-username text-center"><?php echo $username; ?></h3>
                    <p class="text-primary text-center"><?php echo $id_number; ?></p>
                    <b class="text-info">Name: </b> <small class="float-right text-light"><?php echo $username; ?></small><br>
                    <b class="text-info">ID Number: </b> <small class="float-right text-light"><?php echo $id_number; ?></small><br>
                    <b class="text-info">Phone: </b> <small class="float-right text-light"><?php echo $phone; ?></small><br>
                    <b class="text-info">Email: </b> <small class="float-right text-light"><?php echo $name; ?></small><br>
                    <b class="text-info">Gender: </b> <small class="float-right text-light"><?php echo $gender; ?></small><br>
                    <b class="text-info">Location: </b> <small class="float-right text-light"><?php echo $location; ?></small><br>
                    <b class="text-info">Joint Date: </b> <small class="float-right text-light"><?php echo $date; ?></small><br>
                    <a href="#" class="btn btn-primary btn-block"><b>**CIT0XPA00<?php echo $id; ?>T983<?php echo $id; ?>**</b></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php 
    include ('btm_nav.php');
    }
}
}?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>