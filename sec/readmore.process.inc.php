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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiQfVmwlpTXLk3mHkePbe14-QEu5NE9fw&callback=myMap"></script>
        <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="include/style.css">    
    <style>
      body{
        background-color: #000;
      }
    </style>
  </header>    
<body>
<?php include('nav.php');?>

<?php 
if (isset($_GET['report_id'])) {
    $user = mysqli_real_escape_string($conn , $_GET['report_id']);
    $query = "SELECT * FROM report,p_user  WHERE report_id= '$user' ";
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
        $location = $row['location'];
        $phone = $row['phone'];
        $title = $row['title'];
        $username = $row['username'];
        $address = $row['address'];
        $description = $row['description'];
    }
}
else {
    $gender = "N/A";
    $joindate = "N/A";
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 text-info" style="font-family: agency fb;">
                    <div class="border-light" style="border: 1px solid;">
                        <iframe id="googleMap" src="https://www.google.com/maps?q=<?php echo $address; ?>&output=embed" width="100%" height="300" style="margin:0 auto; top: 0; left: 0; bottom:0; right:0; overflow:hidden; position:relative;" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-success" style="font-family: agency fb;">
                    <div style="font-family: agency fb;" class="card-header border-danger">
                    Case Title: <?php echo $title; ?><br>
                    Location: <?php echo $location; ?><br>
                    Case Description:<p class="text-warning" style="border: 1px solid yellow; padding: 5px 5px;" id="mr_robot"> <?php echo $description; ?></p>
                    Reported: <?php echo $date_reported; ?></div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid #8A080A; background-color: rgba(10,10,0,0.5);box-shadow: 0px 6px 8px #8A080A; text-shadow: 0px 0px 10px red;" class="text-light card-header border-right-0 border-left-0"> <i class="fa fa-comments"></i> Comments [<?php echo $title; ?>]</h4>
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
                                <span class="text-danger" style="padding:10px;">@'.$name.'</span>
                                <p class="text-success"  style="padding:10px;">'.$comment.'</p>
                                <span class="text-light float-right"  style="padding:10px;">'.$date.'</span>';
                        }
                    } else {
                        echo ' 
                        <div class="container">
                            <h6 class="text-light" style="padding: 10px;"> No Comments Posted yet! </h6>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="include/comments.inc.php">
                                        <input type="hidden" name="hidden_id" value="'.$x.'">
                                        <textarea class="form-control bg-transparent text-light border-danger" name="comment" id="comment" placeholder="Whats on your mind?" cols="30" rows="7"></textarea>
                                        <input type="hidden" name="hidden_user" value="'.$y.'">
                                        <br>
                                        <input class="btn btn-danger bg-transparent form-control" type="submit" name="submit-comment" >
                                    </form>
                                </div> 
                            </div>';
                        }?> <br> <br> <br> <br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?
        }
    ?>
</div>
<?php include('btm_nav.php');?>


<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS Requirements -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
</body>
</html>
