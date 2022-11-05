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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="include/style.css">
    <script type="text/javascript" src="include/js/jquery-1.10.2.min.js" ></script>
    <style>
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
    $id_number = $row['id_number']; 
?>
<div class="container" style="margin-bottom:10px;">
    <div class="row" style="background-color: #000;">
        <?php include('nav.php'); ?>
    </div><br>
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
                <!-- <img src="assets/img/jr.png" class="avatar img-fluid" style="width:100%; height: 150px;"> -->
                <div class="card card-primary card-outline bg-transparent" style="background-color: rgba(0,0,0,.5);box-shadow: 0 10px 18px 0 #8A080A;">  
                    <div class="d-flex justify-content-between">
                      <div class="p-2 text-center"><a href="reports-readmore.php" class="text-light btn"><i class="fa fa-calendar-times-o h2"></i> <br> <span style="font-size: 10px; text-decoration:none;">Crimes</span> </a></div>
                      <div class="p-2 text-center"><a href="wanted.php" class="text-light btn"><i class="fa fa-user-secret h2"></i> <br> <span style="font-size: 10px; text-decoration: none;">Wanted</span></a></div>
                      <div class="p-2 text-center"><a href="missing.php" class="text-light btn"><i class="fa fa-user-times h3"></i> <br> <span style="font-size: 10px; text-decoration: none;">Missing</span></a></div>
                      <div class="p-2 text-center"><a href="user_me.php" class="text-light btn"><img src="upload/<?php echo $image; ?>" style="width: 40px; height: 40px; border-radius: 50%;"> <br> <span style="font-size: 10px; text-decoration: none;">Me</span>  </a></div>
                    </div>
                </div>
                <br><br>
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <div class="p-1 text-center bg-transparent modal_one">
                            <!-- <i class="fa fa-exclamation-circle text-light kenya_danger" id="button-play-v-once" data-toggle="modal" data-target="#myModal" style="font-size: 80px;"></i><br>-->
                            <button name="" class="h6 btn sent one" id="button-play-v-once" data-toggle="modal" data-target="#myModal" type="button"><i class="h1 text-center fa fa-exclamation-triangle"></i><br> Emergency</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="p-1 w-100 modal_one" style="background-color: rgba(0,0,0,.5);box-shadow: 0 10px 18px 0 #8A080A; font-family: cursive;">
                        <center><i class="fa fa-bullhorn h5"><u> Notice Board</u></i></center>
                        <?php
                                    $query = "SELECT * FROM notice ORDER BY notice_id DESC Limit 1";
                                    $result = $conn->query($query);
                                    if($result->num_rows>0){
                                        while ($row = $result->fetch_assoc()) {
                                        // code...
                                        $message = $row['message'];
                                        $venue = $row['venue'];
                                        $time = $row['time'];
                                        $date = $row['date'];
                                        $tag = $row['tag'];?>
                        <table width="100%">
                            <tr>
                                <td>
                                    <span>Message:</span><span style="font-family: cursive;"> <?php echo $message; ?></span><br>
                                    <span>Venue: <?php echo $venue; ?></span><br>
                                    <span>Time: <?php echo $time; ?> <?php echo $date; ?><br>
                                    <span class="text-warning">#<?php echo $tag; ?></span>
                                </div>
                                </td>
                                <td>
                                    <a href="notice_board.php" class="btn btn-warning bg-transparent"><i class="fa h6">view</i></a>
                                </td>
                            </tr>
                        </table>
                        <?php    }}?>
                    </div>
                </div>
            <div class="col-md-4">
                
            </div>
    </div>
<br><br><br>

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
    $(document).ready(function() {
 
 setTimeout(function(){
     $('body').addClass('loaded');
     $('h1').css('color','#222222');
 }, 2000);

});
</script>
<script>
 if(navigator.onLine){
 } else {
  alert('You are offline');
 }
</script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS Requirements -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>
</html>
<?php 
        }
    }
}
?>