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


* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {
    vertical-align: middle;
    height: 300px;
    width: 100%;
}

/* Slideshow container */
.slideshow-container {
  width: 100%;
  position: relative;
  margin: auto;
}


/* The dots/bullets/indicators */
.dot {
  height: 1px;
  width: 1px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 4.5s;
  animation-name: fade;
  animation-duration: 4.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
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
        <div class="col-md-9">
            <div class="wrapper wanted">
                <div class="featured" style="padding-left: 10px;">
                    <div class="text-warning" id="meta">E-Safe Security</div>
                        <h3 class="text-light">Malaba Central Police</h3>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-3">
            <div class="container">
                <div class="row bg-transparent">
                    <div class="col-12 text-center">
                        <u class="text-warning">Quick links</u>
                    </div>
                </div>
                <div class="row bg-transparent" style="margin-bottom:10px;">
                    <table style="border: 1px solid red; box-shadow: 1px 1px 1px 4px rgba(100,10, 10, 10);" class="col-12">
                        <tr>
                            <td class="text-center"><i class="fa fa-user-times text-info h4"></i></td>
                            <td><div class="h6 text-light text-right" style="padding-right:10px;font-family:serif;"><span class="badge badge-transparent text-light" style="border: 1px solid red"> 9</span> Missing Person</div></td>
                        </tr>
                    </table>
                </div>
                <div class="row bg-transparent" style="margin-bottom:10px;">
                    <table style="border: 1px solid red; box-shadow: 1px 1px 1px 4px rgba(100,10, 10, 10);" class="col-12">
                        <tr>
                            <td class="text-center"><i class="fa fa-plus-circle text-info h4"></i></td>
                            <td><a href="reports-readmore.php" class="h6 text-light float-right" style="padding-right:10px; font-family:serif;"><span class="badge badge-transparent text-light" style="border: 1px solid red"> 13</span> Newest Crimes</a></td>
                        </tr>
                    </table>
                </div>
                <div class="row bg-transparent" style="margin-bottom:10px;">
                    <table style="border: 1px solid red; box-shadow: 1px 1px 1px 4px rgba(100,10, 10, 10);" class="col-12">
                        <tr>
                            <td class="text-center"><i class="fa fa-line-chart text-info h4"></i></td>
                            <td><div class="h6 text-light text-right" style="padding-right:10px;font-family:serif;"><span class="badge badge-transparent text-light" style="border: 1px solid red"> 9</span> Crime Statistics</div></td>
                        </tr>
                    </table>
                </div>
                <div class="row bg-transparent" style="margin-bottom:10px;">
                    <table style="border: 1px solid red; box-shadow: 1px 1px 1px 4px rgba(100,10, 10, 10);" class="col-12">
                        <tr>
                            <td class="text-center"><i class="fa fa-book text-info h4"></i></td>
                            <td><a href="traffic.php" class="h6 text-light float-right" style="padding-right:10px; font-family:serif;"><span class="badge badge-transparent text-light" style="border: 1px solid red"> 4</span>Traffic Charges</a></td>
                        </tr>
                    </table>
                </div>
                <div class="row bg-transparent" style="margin-bottom:10px;">
                    <table style="border: 1px solid red; box-shadow: 1px 1px 1px 4px rgba(100,10, 10, 10);" class="col-12">
                        <tr>
                            <td class="text-center"><i class="fa fa-puzzle-piece text-info h4"></i></td>
                            <td><div class="h6 text-light text-right" style="padding-right:10px; font-family:serif;"><span class="badge badge-transparent text-light" style="border: 1px solid red"> ?</span> Security Tips</div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>
<br>
<div class="container">
    <div class="row" style="box-shadow: 2px 2px 2px 2px yellow;">
        <div class="col-md-6" style="box-shadow: 2px 2px 4px greenyellow;">
            <div class="row">
                <div class="col-md-12 text-center h3" style="font-family:serif; color:white; text-shadow: 0px 0px 10px red; background: rgba(0,0,0,.5);">
                    MOST WANTED
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center text-light" style="font-size: 12px;">
                    Have you seen these people? If you have any information regarding the most wanted, contact us anonymously
                    and securely on <span class="text-info">0234 5678</span> or click the below anonymous report button to give information through <a href="#anonymous.php" class="text-info" style="font-style: italic">anonymous online form</a>
                </div>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM most_wanted  where 1;";
                $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $ctitle = $row['ctitle'];
                        $cname = $row['cname'];
                        $crate = $row['crate'];
                        $wanted_id = $row['wanted_id'];
                        $filename = $row['filename'];

                        ?>
                        <div class="col-md-12 card bg-transparent">
                            <div class="mySlides fade">
                                <div class="most_wanted">
                                    <img src="cop/police/wanted/<?php echo $filename; ?>" class="img-responsive" style="width:100%; height:300px;" alt="<?php echo $cname; ?>">
                                </div>
                                <div class="card-body text-light">
                                    <b class="text-info">Name: </b> <small class="float-right text-light"><?php echo $cname; ?></small><br>
                                    <b class="text-info">Case: </b> <small class="float-right text-light"><?php echo $ctitle; ?></small><br>
                                    <b class="text-info">Threat rate: </b> <small class="float-right text-light progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="<?php echo $crate; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $crate; ?>;"> 
                                    <?php echo $crate; ?>% </small><br><br>
                                    <?php echo "<a href='anon.php?id_number=$id_number' class='button btn w-100 emg' style='cursor:pointer; font-family:serif;'> anonymous report </a>";?>    
                                </div>
                                <span class="dot"></span>
                            </div>
                        </div>
                <?php  }
                } else {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header text-center text-danger"><i class="fa fa-user-secret text-center" style="font-size: 100px"></i><br>
                                All Clear...!!!
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
            </div>
        </div>



        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 text-center h3" style="font-family:serif; color:white; text-shadow: 0px 0px 10px green; background: rgba(0,0,0,.5);">
                    MISSING PEOPLE
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center text-light" style="font-size: 12px;">
                    Have you seen these people? If you have any information regarding the most wanted, contact us anonymously
                    and securely on <span class="text-info">0234 5678</span> or click the below anonymous report button to give information through <a href="#anonymous.php" class="text-info" style="font-style: italic">anonymous online form</a>
                </div>
            </div>
            <div class="row" style="border:px solid red;">
                <?php
                $jql = "SELECT * FROM missing_person  where 1;";
                $result = $con->query($jql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $mname = $row['mname'];
                        $last_location = $row['last_location'];
                        $mdesc = $row['mdesc'];
                        $date = $row['date'];
                        $filename = $row['filename'];

                        ?>
                        <div class="col-md-12 card bg-transparent">
                            <div class="mySlides fade">
                                <div class="missing">
                                    <img src="cop/police/missing/<?php echo $filename; ?>" class="img-responsive" style="width:100%; height:300px;" alt="<?php echo $mname; ?>">
                                        </div>
                                        <div class="card-body text-light">
                                        <b class="text-info">Name: </b> <small class="float-right text-light"><?php echo $mname; ?></small><br>
                                        <b class="text-info">Last Location: </b> <small class="float-right text-light"><?php echo $last_location; ?></small><br>
                                        <b class="text-info">Description: </b> <small class="float-right text-light"><?php echo $mdesc; ?></small><br>
                                        <?php echo $date; ?> </small><br><br>
                                        <?php echo "<a href='#anon.php?id_number=$id_number' class='button btn w-100 emg' style='cursor:pointer; font-family:serif;'> anonymous report </a>";?>
                                    </div>
                                <span class="dot"></span>
                            </div>
                        </div>
                <?php  }
                } else {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-header text-center text-danger"><i class="fa fa-user-secret text-center" style="font-size: 100px"></i><br>
                                All Clear...!!!
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            $con->close();
            ?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container" id="ref">

</div>

<br>
<hr class="bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center text-light" style="width:100%; font-family:san-serif;">
            Powered by Fun-Corp Developers
        </div>
    </div>
</div>
<?php include('btm_nav.php'); ?>
<script>
    $(document).ready(function() {
 
 setTimeout(function(){
     $('body').addClass('loaded');
     $('h1').css('color','#222222');
 }, 3000);

});
</script>
<script>
 if(navigator.onLine){
 } else {
  alert('You are offline');
 }
</script>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
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