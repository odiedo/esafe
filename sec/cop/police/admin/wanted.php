<?php
include ('../conn.php');
session_start();    
if(empty($_SESSION['id_number'])){
    header("Location: ../../login.php");
    exit();
}else{
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-safe Security-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>
<body id="page-top" style="background-color: #000;">
    <?php
    $user = $_SESSION['id_number'];
    $sql = "SELECT * FROM uni_security where id_number = $user";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        # code...
        while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $id_number = $row['id_number'];
        $date = $row['date'];
        $image = $row['image'];
        ?>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: rgba(0,10,10,50.5);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">E-Safe Security</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-dark py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="wanted.php">Most Wanted</a>
                        <a class="collapse-item" href="missing.php">Missing People</a>
                        <a class="collapse-item" href="cctv.php">CCTV Footage</a>
                        <a class="collapse-item" href="officers.php">Officer Location</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-dark py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="#">Emergency Alerts</a>
                        <a class="collapse-item" href="#">Medical Reports</a>
                        <a class="collapse-item" href="#">Assigned Tasks</a>
                        <a class="collapse-item" href="#">Others</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="case_lists.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Case Lists</span></a>
            </li>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Logins</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-dark py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="#login.html">Login</a>
                        <a class="collapse-item" href="#register.html">Register</a>
                        <a class="collapse-item" href="#forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background-color: #000;">

                <!-- Topbar -->
                <nav class="navbar navbar-expand bg-transparent topbar mb-4 static-top shadow border-primary">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h4 class="text-light" style="text-shadow: 0px 0px 10px yellow;">Wanted Criminals</h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                   Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo $image;?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.inc.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <hr class="bg-warning w-100">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- wanted inputs -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-light text-center" style="padding: 10px 10px 10px 25px; font-weight: bold;  color: white; text-shadow: 0px 0px 10px orange; background: rgba(0,10,10,50.5); border-left: 5px solid orange; font-size: 18px;   margin-bottom: 15px;">Most Wanted Criminal Uploads</h3>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="number" name="sec_id"  value="<?php echo $police_id; ?>" hidden>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 text-right text-light">
                                        Criminal Name:
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="cname" placeholder="e.g Brad" class="form-control border-top-0 text-light border-left-0 border-right-0 bg-transparent border-warning">    
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 text-right text-light">
                                        Case Title:
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="ctitle" placeholder="e.g murder" class="form-control border-top-0 text-light border-left-0 border-right-0 bg-transparent border-warning">    
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 text-right text-light">
                                        Threat Rate:
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" name="crate" placeholder="e.g 70%" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent text-light border-warning">    
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 text-right text-light">
                                        Description:
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="cdesc" id="cdesc" cols="30" rows="5"placeholder="Criminal info e.g He/She has killed 12 people and kidnapped 2 high school students" class="form-control bg-transparent border-warning text-light"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 text-right text-light">
                                        Attach Photo:
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="uploadfile" value="" class="form-control border-warning text-light bg-transparent"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 text-right text-light">
                                        
                                    </div>
                                    <div class="col-md-9">
                                    <button name="submit_criminal" class="btn bg-transparent border-warning text-light">Submit</button>
                                    </div>
                                </div>
                            </form>
                            </div>


                            <?php
                    $msg = ""; 

                    // If upload button is clicked ... 
                    if (isset($_POST['submit_criminal'])) { 
                        $sec_id = $user;
                        $cname = $_POST['cname'];
                        $ctitle = $_POST['ctitle'];
                        $cdesc = $_POST['cdesc'];
                        $crate = $_POST['crate'];
                        $date = date('Y-m-d H:i:s');
                        $filename = $_FILES["uploadfile"]["name"]; 
                        $tempname = $_FILES["uploadfile"]["tmp_name"];   
                        $folder = "wanted/".$filename; 
                            
                        $db = mysqli_connect("localhost", "root", "", "uni_sec"); 

                            // Get all the submitted data from the form 
                            $sql = "INSERT INTO most_wanted (sec_id,cname,ctitle,cdesc,crate,date,filename) VALUES ('$sec_id','$cname','$ctitle','$cdesc','$crate','$date','$filename')"; 

                            // Execute query 
                            mysqli_query($db, $sql); 
                            
                            // Now let's move the uploaded image into the folder: image 
                            if (move_uploaded_file($tempname, $folder)) { 
                                echo "
                                    <script>
                                        alert('Criminal Uploaded Successfully!');
                                    </script>
                                    <meta http-equiv='refresh' content='1;url=index.php'/>";
                            }else{ 
                                $msg = "Failed to upload image"; 
                        } 
                    }  
                    ?> 
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 style="padding: 10px 10px 10px 25px; font-weight: bold; color: white; text-shadow: 0px 0px 10px yellow; background: rgba(0,10,10,50.5); border-left: 5px solid orange; font-size: 18px; margin-bottom: 15px;"> Most Wanted List</h3>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card border-warning bg-transparent">
                                            <form class="form-inline my-2 my-lg-0 bg-transparent" action="includes/search.process.php" method="get">
                                                <button class="bg-transparent border-top-0 border-right-0 border-left-0 border-bottom-0  my-2 my-sm-0" name="search" type="submit"><i class="fa fa-search text-light"></i></button>
                                                <input class="form-control mr-sm-2 bg-transparent w-75  border-top-0 border-right-0 border-left-0 border-bottom-0 text-light" name="search-input" type="search" placeholder="Search..." aria-label="Search">
                                            </form>    
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <?php
                                    $sql = "SELECT * FROM most_wanted  ORDER BY date DESC LIMIT 1;";
                                    $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                            $ctitle = $row['ctitle'];
                                            $cname = $row['cname'];
                                            $cdesc = $row['cdesc'];
                                            $wanted_id = $row['wanted_id'];
                                            $date = $row['date'];
                                            $filename = $row['filename'];

                                            ?>
                                            <br>
                                            <br>
                                            <div class="col-md-12 card card-warning card-outline bg-transparent border-warning border-left-0 border-right-0">
                                                <div class="row ">
                                                    <div class="col-md-5">
                                                        <img src="wanted/<?php echo $filename; ?>" alt="wanted" style="height: 250px; width: 100%;">
                                                    </div>
                                                    <div class="col-md-7"  style="font-family:serif; font-style: italic;">
                                                        <span class="text-info"><?php echo $cname;?></span><br>
                                                        <span  class="text-danger"><?php echo $ctitle;?></span><br>
                                                        <span id="mr_robot" class="text-light"><?php echo $cdesc;?></span><br>
                                                        <span class="text-warning float-right" style="font-size: 10px;"><?php echo $date; ?></span>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php  }
                                    } else {
                                        ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card-header text-center text-light">
                                                        <i class="fa fa-user-secret text-center" style="font-size: 150px;padding-top: 50%; text-shadow: 0px 0px 10px red"></i><br>
                                                        All Clear...!!!
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                $con->close();
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Wanted Inputs -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<script>
  function store() {
  var txt = document.getElementById("cdesc").value;

  var txttostore = '<p>' + txt.replace(/\n/g, "</p>\n<p>") + '</p>';

  console.log(txttostore);
}
</script>
<script>
  setInterval(function(){
    $('#rep').load('../wanted.core.inc.php');
  },1000);
</script>
<script>
var yourT=document.getElementById("mr_robot");
var innerH=yourT.innerHTML;
var innerL=innerH.length;
var count=0;
function doit(){
    if (count<innerL){      document.getElementById("mr_robot").innerHTML+=innerH.charAt(count);        count++;    } 
else{clearInterval(Timer)};}
function go(){  
document.getElementById("mr_robot").innerHTML="";
    Timer=setInterval("doit()",100);}
window.onload=go;
</script>
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
</body>

</html>
<?php 
}}}?>