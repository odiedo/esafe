<?php
include ('include/conn.php');
session_start()
?>
<html>
  <header>
    <title>Police Unit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" >

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">
    <script type="text/javascript" src="include/js/jquery-1.10.2.min.js" ></script>
    <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <style>
      body{
        background-color: #000;
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
    padding-top: 10px;
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
        <style>
      * {
        box-sizing: border-box;
      }

      .column {
        float: left;
        width: 33.33%;
        padding: 5px;
      }

      /* Clearfix (clear floats) */
      .row::after {
        content: "";
        clear: both;
        display: table;
      }
    </style>
  </header>    
<body>
<br>
<?php 
if (isset($_GET['report_id'])) {
    $yolo = $_SESSION['id_number'];
    $user = mysqli_real_escape_string($conn , $_GET['report_id']);
    $query = "SELECT * FROM report,p_user  WHERE report.report_id= '$user' and p_user.id_number = $yolo";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;

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

    if (mysqli_num_rows($run_query) > 0 ) {
    while ($row = mysqli_fetch_array($run_query)) {
        $time = $row['date'];
        $date_reported =  time_elapsed_string($time); 
        $id_number = $row['id_number'];
        $report_id = $row['report_id'];
        $location = $row['location'];
        $user_id = $row['user_id'];
        $phone = $row['phone'];
        $title = $row['title'];
        $email = $row['email'];
        $username = $row['username'];
        $address = $row['address'];
        $image = $row['image'];
        $gender = $row['gender'];
        $description = $row['description'];
    }
}
else {
    $gender = "N/A";
    $joindate = "N/A";
}
include ('nav.php');
?>

<div class="container" style="width: 100%;">
  <div class="row">
    <div class="card bg-transparent">
      <div class="card-header border-light text-info h4" style="font-family: agency fb;">
        E-Safe Case   0<?php echo $report_id?>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12 text-info" style="font-family: agency fb;">
                <div class="col-md-12 border-light" style="border: 1px solid;">
                
                  <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=34.76887464523316%2C-0.07462976252758229%2C34.78531122207642%2C-0.06158350712432609&amp;layer=mapnik&amp;marker=-0.06810663526735157%2C34.777092933654785" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=-0.0681&amp;mlon=34.7771#map=16/-0.0681/34.7771">View Larger Map</a></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-info" style="font-family: agency fb;">
                <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5)" class="text-info card-header border-top-0 border-bottom-0 border-danger">Information-Data [<?php echo $user_id; echo $report_id;?>]</h4>
                Case Title: <?php echo $title; ?><br>
                GPS Coordinates: <?php echo $address; ?><br>
                Location: <?php echo $location; ?><br>
                Case Description:<p class="text-warning" style="border: 1px solid yellow; padding: 5px 5px;"> <?php echo $description; ?></p>
                Reported: <?php echo $date_reported; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 bordeer-warning">
                <h2 style="font-family:agency fb;text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5); text-shadow: 0px 0px 10px red;" class="text-center text-light border-top-0 border-bottom-0 border-danger"> system 0<?php echo $user_id; echo $report_id;?>/<?php echo $location;?></h2>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">            
                            <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5); padding: 10px; text-shadow: 0px 0px 10px red;" class="text-light card-header border-right-0 border-left-0 border-warning"><i class="fa fa-video-camera"></i> Video evidence</h4>
                            <a href="#" class="text-info"  style="padding:10px;">robbery in action</a><br>
                            <a href="#" class="text-info"  style="padding:10px;">robbery in action</a><br>
                            </div>
                            <div class="col-md-6">
                            <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; padding: 10px; background-color: rgba(10,10,0,0.5); text-shadow: 0px 0px 10px red;" class="text-light card-header border-right-0 border-left-0 border-warning"> <i class="fa fa-microphone"></i> Audio evidence</h4>
                            <a href="#" class="text-info"  style="padding:10px;">robbery in action</a><br>
                            <a href="#" class="text-info"  style="padding:10px;">robbery in action</a><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5); padding: 10px; text-shadow: 0px 0px 10px red;" class="text-light card-header border-right-0 border-left-0 border-warning"><i class="fa fa-camera"></i> Image evidence</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                            <img src="assets/img/1.jpg" alt="Snow" style="width:100%">
                            </div>
                            <div class="column">
                            <img src="assets/img/2.jpg" alt="Snow" style="width:100%">
                            </div>
                            <div class="column">
                            <img src="assets/img/3.jpg" alt="Snow" style="width:100%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5); text-shadow: 0px 0px 10px red;" class="text-light card-header border-right-0 border-left-0 border-primary"> <i class="fa fa-comments"></i> Comments []</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <?php 
                            $id = $_GET['report_id'];
                            $sql = "SELECT * FROM comments WHERE report_id=$id";
                            $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()){
                                        $name = $row['username'];
                                        $comment = $row['message'];
                                        $date = $row['post_date'];
                                        echo '
                                            <span class="text-info" style="padding:10px;">@'.$name.'</span>
                                            <p class="text-info"  style="padding:10px;">'.$comment.'</p>
                                            <span class="text-info float-right"  style="padding:10px;">'.$date.'</span>
                                            ';
                                        }
                                    } else {
                                        echo ' <div class="container">
                                            <h3 class="text-info"> 0 Comments </h3>
                                            </div>';
                                        }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                <?php 
                                    if(isset($_SESSION['id_number'])){

                                    $x = $_GET['report_id'];
                                    $y = $_SESSION['id_number'];
                                    echo '
                                        <div class="col-md-12">
                                            <form method="post" action="include/comments.inc.php">
                                                <input type="hidden" name="hidden_id" value="'.$x.'">
                                                <textarea class="form-control bg-transparent text-light border-info" name="comment" id="comment" placeholder="Whats on your mind?" cols="30" rows="7"></textarea>
                                                <input type="hidden" name="hidden_user" value="'.$y.'">
                                                <br>
                                                <input class="btn btn-success form-control" type="submit" name="submit-comment" >
                                            </form>
                                        </div>';
                                    }?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<br><br>
<?php 
  include ('btm_nav.php');
?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
<?php } else {
    header("location:../index.php");
    } ?>


