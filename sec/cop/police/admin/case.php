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
                    <div class="card-header border-light text-success bg-transparent h4" style="font-family: agency fb;">
                        E-SS LIVE DATA
                    </div>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- case information -->
                    <?php 
                        if (isset($_GET['report_id'])) {
                            $user = mysqli_real_escape_string($conn , $_GET['report_id']);
                            $query = "SELECT * FROM p_user, report  WHERE report.report_id= '$user' AND report.id_number=p_user.id_number ";
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
                                $username = $row['username'];
                                $location = $row['location'];
                                $address = $row['address'];
                                $email = $row['email'];
                                $gender = $row['gender'];
                                $user_id = $row['user_id'];
                                $id_number = $row['id_number'];
                                $description = $row['description'];
                                $title = $row['title'];
                                $phone = $row['phone'];
                                $report_id =$row['report_id'];
                                $image = $row['image'];
                            }
                        }
                        else {
                            $gender = "N/A";
                            $joindate = "N/A";
                        }

                        ?>
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card bg-transparent">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                          <div class="col-md-12 text-light" style="font-family: agency fb;">
                                            <img src="../../../upload/<?php echo $image; ?>" alt="profile" style="height:150px; width:100%;">
                                            <br>
                                            Name: <?php echo $username; ?><br>
                                            ID Number: <?php echo $id_number; ?><br>
                                            Email Address: <?php echo $email; ?><br>
                                            Phone: 0<?php echo $phone; ?><br>
                                            Gender: <?php echo $gender; ?><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12 text-info" style="font-family: agency fb;">
                                            <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5)" class="text-success card-header border-top-0 border-bottom-0 border-success">Information-Data [<?php echo $user_id; echo $report_id;?>]</h4>
                                            Case Title: <?php echo $title; ?><br>
                                            GPS Coordinates: <?php echo $address; ?><br>
                                            Location: <?php echo $location; ?><br>
                                            Case Description:<p class="text-warning" style="border: 1px solid yellow; padding: 5px 5px;"> <?php echo $description; ?></p>
                                            Reported: <?php echo $date_reported; ?>
                                          </div>
                                        </div>

                                            <?php 
                                                $id = $_GET['report_id'];
                                                $sql = "SELECT * FROM comments WHERE report_id=$id";
                                                $result = $con->query($sql);
                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()){
                                                        $name = $row['username'];
                                                        $rowcount = mysqli_num_rows($result);
                                                        $comment = $row['message'];
                                                        $date = $row['post_date'];
                                                        ?>
                                                        <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5)" class="text-success card-header text-left border-right-0 border-left-0 border-success"> Comments [<?php echo $rowcount; ?>]</h4>
                                                        <br>
                                                        <?php echo '
                                                            <span class="text-warning" style="padding:10px;">@'.$name.'</span>
                                                            <p class="text-warning"  style="padding:10px;">'.$comment.'</p>
                                                            <span class="text-danger float-right"  style="padding:10px;">'.$date.'</span>
                                                            ';
                                                        }
                                                    } else { ?>
                                                        <h4 style="font-family: agency fb; text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5)" class="text-success card-header text-left border-right-0 border-left-0 border-success"> Comments [<?php
                                                            $query = "SELECT * FROM comments where report_id = $id";
                                                            if($result = mysqli_query($con, $query)){
                                                                $rowcount = mysqli_num_rows($result);
                                                                Print ($rowcount);
                                                            }
                                                        ?>]</h4>
                                                        <br>
                                                        <?php 
                                                        echo ' <div class="container">
                                                            <h3 class="text-warning text-center"><i class="fa fa-comments text-center"></i> No Comment </h3>
                                                            </div>';
                                                        }
                                                    ?>

                                                </div>
                                                <div class="col-md-8 bordeer-warning">
                                                    <h2 style="font-family:agency fb;text-transform: uppercase; border: 1px solid; background-color: rgba(10,10,0,0.5)" class="text-center text-info border-top-0 border-bottom-0 border-danger"> <i class="fa fa-map"></i> MAP LOCATE</h2>
                                                    <div class="border-light" style="border: 1px solid;">
                                                        <iframe src="https://www.google.com/maps?q=<?php echo $address; ?>&output=embed" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                                    </div>
                                                    <br>
                                                    <div class="wave" data-path="../../evidence/911.mp3"  style="border: 1px solid yellow;">
                                                        <div class="wave-container"></div>
                                                        <button type="button" class="bg-transparent border-0"><i class="fa fa-play text-info"></i> || <i class="fa fa-pause text-warning"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of case information -->
                </div>
                <!-- End of page content -->
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- waves -->
    <script src="https://unpkg.com/wavesurfer.js"></script>
    <script>
    $('.wave').each(function(){
        //Generate unic ud
        var id = '_' + Math.random().toString(36).substr(2, 9);
        var path = $(this).attr('data-path');

        //Set id to container
        $(this).find(".wave-container").attr("id", id);

        //Initialize WaveSurfer
        var wavesurfer = WaveSurfer.create({
            container: '#' + id,
            waveColor: 'red',
            progressColor: 'blue'
        });

        //Load audio file
        wavesurfer.load(path);

        //Add button event
        $(this).find("button").click(function(){
            wavesurfer.playPause();
        });
    });
    </script>
    <?php } else {
    header("location: index.php");
    } ?>
</body>

</html>
<?php 
}}}?>