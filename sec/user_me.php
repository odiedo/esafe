<?php
    include ('include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
    if(empty($_SESSION['id_number'])){
        header("Location: ../index.php");
        exit();
    }else{
?>
<!DOCTYPE html>
<header>
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
    <script type="text/javascript" src="include/js/jquery-1.10.2.min.js" ></script>
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
    $phone = $row['phone'];
    $location = $row['home_location'];
    $email = $row['email'];
    $date = $row['join_date'];
    $gender = $row['gender'];
    include('nav.php');
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
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
                    <b class="text-info">Email: </b> <small class="float-right text-light"><?php echo $email; ?></small><br>
                    <b class="text-info">Gender: </b> <small class="float-right text-light"><?php echo $gender; ?></small><br>
                    <b class="text-info">Location: </b> <small class="float-right text-light"><?php echo $location; ?></small><br>
                    <b class="text-info">Joint Date: </b> <small class="float-right text-light"><?php echo $date; ?></small><br>
                    <a href="#" class="btn btn-primary btn-block"><b>**CIT0XPA00<?php echo $id; ?>T983<?php echo $id; ?>**</b></a>
                </div>
            </div>
        </div>
        <div class="col md-8">
            <div class="row card-primary card-outline bg-transparent">
                <div class="col-md-4">
                    <div class="card-body text-center text-info"> 
                        <a href="my_circle.php" class="btn btn-info w-100 bg-transparent text-info float-left"><i class="fa fa-group"></i> My Zone</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-center text-info"> 
                        <a href="case.php" class="btn btn-info w-100 bg-transparent text-info float-left"><i class="fa fa-history"></i> Reported Case(s)</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body text-center text-info"> 
                        <a href="report.php" class="btn btn-info w-100 bg-transparent text-info float-left" ><i class="fa fa-pied-piper"></i> My Petitions</a><br>
                    </div>
                </div>
            </div>
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
            </div>
        </div>
    </div>
</div>

<br><br>

<?php include('btm_nav.php'); ?>

<script>
  setInterval(function(){
    $('#zone').load('include/my_circle.inc.php');
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
if (isset($_POST['add-zone'])){
    $user = $_SESSION['id_number'];
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
    }
}
?>