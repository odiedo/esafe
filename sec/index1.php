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
        #loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
}
#loader {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;

    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */

    z-index: 1001;
}

    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #e74c3c;

        -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #f9c922;

        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
          animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    @-webkit-keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
    @keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }

    #loader-wrapper .loader-section {
        position: fixed;
        top: 0;
        width: 51%;
        height: 100%;
        background: #000;
        z-index: 1000;
        -webkit-transform: translateX(0);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(0);  /* IE 9 */
        transform: translateX(0);  /* Firefox 16+, IE 10+, Opera */
    }

    #loader-wrapper .loader-section.section-left {
        left: 0;
    }

    #loader-wrapper .loader-section.section-right {
        right: 0;
    }

    /* Loaded */
    .loaded #loader-wrapper .loader-section.section-left {
        -webkit-transform: translateX(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateX(-100%);  /* IE 9 */
                transform: translateX(-100%);  /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded #loader-wrapper .loader-section.section-right {
        -webkit-transform: translateX(100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateX(100%);  /* IE 9 */
                transform: translateX(100%);  /* Firefox 16+, IE 10+, Opera */

-webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }
    
    .loaded #loader {
        opacity: 0;
    }
    .loaded #loader-wrapper {
        visibility: hidden;

        -webkit-transform: translateY(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateY(-100%);  /* IE 9 */
                transform: translateY(-100%);  /* Firefox 16+, IE 10+, Opera */
    }
    
    /* JavaScript Turned Off */
    .no-js #loader-wrapper {
        display: none;
    }
    .no-js h1 {
        color: #000;
    }

    #content {
        margin: 0 auto;
        padding-bottom: 50px;
        width: 80%;
        max-width: 978px;
    }  

/*Emergency Button*/
.danger_btn{
    position: relative;
    align-items: center;
    justify-content: center;
    color: white;
    padding: 4px 21px;
    text-shadow: 0 0 10px red,
                0 0 20px red,
                0 0 30px red,
                0 0 40px red,
                0 0 50px red;
    animation: animatea 5s linear infinite;
}
@keyframes animatea
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
/* Wanted box */
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {
    vertical-align: middle;
    height: 300px;
    width: 100%;
}



/* emergency button box color */
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

<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

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
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 text-center text-light h5" style="font-family: cursive;">
            Maseno University #E-SS

        </div>
    </div>
    <div class="row">
            <div class="col-md-3">

            </div><br>
            <div class="col-md-3">
                <div class="card card-primary card-outline bg-transparent" style="background-color: rgba(0,0,0,.5);box-shadow: 0 10px 18px 0 rgba(0, 100, 100, 0.7);padding-top">  
                    <div class="d-flex justify-content-between">
                      <div class="p-2 text-center"><a href="user.php" class="text-light btn"><i class="fa fa-superpowers h2"></i> <br> <span style="font-size: 12px; text-decoration: none;">P.D</span></a></div>
                      <div class="p-2 text-center"><a href="reports-readmore.php" class="text-light btn"><i class="fa fa-calendar-times-o h2"></i> <br> <span style="font-size: 12px; text-decoration:none;">Crimes</span> </a></div>
                      <div class="p-2 text-center"><a href="wanted.php" class="text-light btn"><i class="fa fa-user-secret h2"></i> <br> <span style="font-size: 12px; text-decoration: none;">Wanted</span></a></div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="p-2 text-center"><a href="missing.php" class="text-light btn"><i class="fa fa-user-times h3"></i> <br> <span style="font-size: 12px; text-decoration: none;">Missing</span></a></div>
                      <div class="p-2 text-center"><a href="#laf.php" class="text-light btn"><i class="fa fa-archive h3"></i> <br> <span style="font-size: 12px; text-decoration:none;">L & F</span> </a></div>
                      <div class="p-2 text-center"><a href="my_circle.php" class="text-light btn"><i class="fa fa-users h3"></i> <br> <span style="font-size: 12px; text-decoration: none;">MyZone</span></a></div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="p-1 text-center modal_one">
                            <i class="fa fa-eercast text-light kenya_danger" data-toggle="modal" data-target="#myModal" style="font-size: 72px;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <span class="alerts text-light h4 text-center" style="font-family: cursive;">Live Attacks</span>
                <iframe src="embed.php" title="Emergencies" frameborder="0" width="100%" height="300px"></iframe>
            </div><br>
        </div>
</div>
<br>

<?php include('btm_nav.php'); ?>
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