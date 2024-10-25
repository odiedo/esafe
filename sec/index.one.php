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



/* emergency button box color */
      .card-primary:not(.card-outline) > .card-header {
        background-color: #8A080A;
      }

      .card-primary:not(.card-outline) > .card-header,
      .card-primary:not(.card-outline) > .card-header a {
        color: #8A080A;
      }

      .card-primary:not(.card-outline) > .card-header a.active {
        color: #1F2D3D;
      }

      .card-primary.card-outline {
        border-top: 3px solid #8A080A;
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
?>
<div class="container" style="margin-bottom:10px;">
    <div class="row">
        <div class="col-md-6">
            <div class="agent-description">
                <div class="tabbing tabbing-box mb-60">
                    <ul class="nav nav-tabs" id="carTab" role="tablist" style="background-color: #000;">
                        <li class="nav-item align-center">
                            <a class="nav-link active show text-danger border-danger" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false" style="font-family: cursive;">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info border-info" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false" style="font-family: cursive;">Cases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success border-success" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true" style="font-family: cursive;">Zone</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="carTabContent">
                        <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <div class="row">
                                    <div class="col-md-8 text-light" >
                                        <br>
                                        <div class="card card-primary card-outline" style="background-color: rgba(0,0,0,.5);box-shadow: 0 5px 7px 0 #8A080A;padding-top: 5%;">
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    <img data-toggle="modal" data-target="#Modal" class="profile-user-img img-fluid img-circle" src="upload/<?php echo $image; ?>" alt="User profile picture" style="border: 3px solid #adb5bd; margin: 0 auto; padding: 3px; height: 150px; width: 150px; border-radius: 50%;">
                                                </div>
                                                <h4 class="profile-username text-center"><?php echo $username; ?></h4>
                                                <p class="text-primary text-center"><?php echo $id_number; ?></p>
                                                <b class="text-info">Name: </b> <small class="float-right text-light"><?php echo $username; ?></small><br>
                                                <b class="text-info">ID Number: </b> <small class="float-right text-light"><?php echo $id_number; ?></small><br>
                                                <b class="text-info">Phone: </b> <small class="float-right text-light"><?php echo $phone; ?></small><br>
                                                <b class="text-info">Email: </b> <small class="float-right text-light"><?php echo $email; ?></small><br>
                                                <b class="text-info">Gender: </b> <small class="float-right text-light"><?php echo $gender; ?></small><br>
                                                <b class="text-info">Location: </b> <small class="float-right text-light"><?php echo $location; ?></small><br>
                                                <b class="text-info">Joint Date: </b> <small class="float-right text-light"><?php echo $date; ?></small><br>
                                                <a href="#" class="btn btn-primary btn-block"><b>**EDIT**</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                            <div class="additional-details-list">
                                <div class="container">
                                    <div class="row">
                                        
                                    
                                    <div class="col-md-8">
                                        <?php
                                        $user = $_SESSION['id_number'];
                                        $sql = "SELECT * FROM report,p_user where report.id_number = $user and p_user.id_number = $user ORDER BY date DESC LIMIT 1";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            # code...
                                            while ($row = $result->fetch_assoc()) {
                                            $title = $row['title'];
                                            $report_id = $row['report_id'];
                                            $description = $row['description'];
                                            $location = $row['location'];
                                            $phone = $row['phone'];
                                            $address = $row['address'];
                                            $date = $row['date'];

                                        ?>
                                        <div class="card bg-transparent border-info border-left-0 border-right-0 border-top-0">
                                            <div class="card-header text-info h5" style="font-family: serif">
                                                My Report
                                            </div><hr class="bg-light">
                                            <div class="card-body text-info" style="background-image: url(assets/img/to.png); background-size:cover;">
                                                <b>Case ID:</b> <small class="float-right text-light">#<?php echo $report_id; ?></small><br>
                                                <b>Case Title:</b> <small class="float-right text-light"><?php echo $title; ?></small><br>
                                                <b>Location:</b> <small class="float-right text-light"><?php echo $location; ?></small><br>
                                                <b>Reported Date:</b> <small class="float-right text-light"><?php echo $date; ?></small><br>
                                                <b>Case Status:</b> <small class="float-right progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%; background-color:green; border-radius:21px;">pending</small><br>
                                            </div>
                                            <hr class="bg-light">
                                            <div class="card-footer text-light">
                                                To view more details, <a href="#case.php">click here</a>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        }else {?>
                                                <div class="col-md-4 hello card-primary card-outline bg-transparent border-primary border-left-0 border-right-0">
                                                <div class="card-body">
                                                    <div style="font-family: agency fb; text-transform:uppercase; text-shadow: 10px 0px 20px red;" class="text-light text-center h6">No case reported</div>
                                                        <p style="font-family: serif; text-transform: lowercase;" class="text-light card-header border-top-0 border-bottom-0 border-danger">
                                                        <center><i class="fa fa-comments text-light text-center" style="font-size: 50px; text-shadow: 0px 0px 10px yellow;"></i></center></p>
                                                    </div>
                                                </div>
                                            <?php }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                        <div class="attachments">
                            <div class="container">
                                <div class="row" style="background-color:#1a0a19;">
                                    <div class="">
                                        <span class="h4 text-light text-left bg-transparent" style="font-family: cursive; text-shadow: 0px 0px 10px red;">My Zone List!</span>
                                        <div class="zone" id="zone"></div>
                                        <div class="btn bg-transparent border-danger text-light w-100"> Chat <i class="fa fa-telegram"></i></div>
                                        <hr class="bg-light">

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                      <span style="font-family: cursive" class="text-info"><strong>Note:</strong> This list will be contacted incase you are in any type of emergency! Choose friends within the university.<br> You can Add/Delete friends from your zone!
                                      </span>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 card bg-transparent" style="box-shadow: 1px 1px 1px 0px green;">
                                        <form action="" method="post" enctype='multipart/form-data'>
                                            <span style="color: white; text-shadow: 0px 0px 10px red;">Add Zone:</span> <br>
                                            <span class="text-success">Nickname:<span class="text-danger">*</span></span><br>
                                            <input type="text" name="name" class="text-success bg-transparent border-light form-control" autocomplete="off" required title="name"><br>
                                            <span class="text-warning">Phone Number:<span class="text-danger">*</span></span><br>
                                            <input type="tel" name="phone" class="bg-transparent text-warning border-light form-control" autocomplete="off" required title="phone number"><br>
                                            <button type="submit" name="add-zone" class="emg" >Add zone</button> <br><br>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div></div></div>
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