<?php
    include ('../include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
    if(empty($_SESSION['id_number'])){
        header("Location: ../../index.php");
        exit();
    }else{
?>
<html>
<header>
    <title>Police Unit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../assets/fonts/flaticon/font/flaticon.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="../style.css">
    <link type="text/css" rel="stylesheet" href="../include/style.css">
    <style>
        .image{
            height: 250px;
            width: 100%;
            border-radius: 4px;
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
    $phone = $row['phone'];
    $id_number = $row['id_number']; 
    $hostel = $row['home_location'];
    $date = $row['join_date'];
?>
<div class="container" style="background-color: #000;">
    <?php include('nav.php'); ?>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 card bg-transparent">
            <div class="row">
                <div class="col-2">
                    <span style="border-radius: 50%; font-size: ; padding: 10% 50%; border: 1px solid red;" class="h2 text-light">M</span>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn bg-transparent text-warning" style="font-family: cursive;">
                                -->> X-Mass Decoration <span style="font-family: cursive;" class="badge badge-light"> KShs. 200</span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <span style="font-family: cursive; font-style: italic; font-size: 10px;" class="text-light text-right"><?php echo $date; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <img src="goods/1.jpg" alt="product" class="image">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav justify-content-center" style="background-color: #000;">
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive;">
                               <i class="fa fa-whatsapp"></i> <span style="font-family: cursive;" class="badge badge-danger">whatsapp</span>
                            </button>
                        </li>
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive;">
                            <i class="fa fa-phone"></i> <span style="font-family: cursive;" class="badge badge-danger">Call</span>
                            </button>
                        </li>
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive; ">
                            <i class="fa fa-eye"></i> <span style="font-family: cursive;" class="badge badge-danger">buy</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
        </div> <br><br>
        <div class="col-md-4 card bg-transparent">
            <div class="row">
                <div class="col-2">
                    <span style="border-radius: 50%; font-size: ; padding: 10% 50%; border: 1px solid red;" class="text-light h2">P</span>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn bg-transparent text-warning" style="font-family: cursive;">
                                -->> Eggs <span style="font-family: cursive;" class="badge badge-light"> KShs. 330</span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <span style="font-family: cursive; font-style: italic; font-size: 10px;" class="text-light text-right"><?php echo $date; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <img src="goods/eggs.jpg" alt="product" class="image">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav justify-content-center" style="background-color: #000;">
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive;">
                               <i class="fa fa-whatsapp"></i> <span style="font-family: cursive;" class="badge badge-danger">whatsapp</span>
                            </button>
                        </li>
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive;">
                            <i class="fa fa-phone"></i> <span style="font-family: cursive;" class="badge badge-danger">Call</span>
                            </button>
                        </li>
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive; ">
                            <i class="fa fa-eye"></i> <span style="font-family: cursive;" class="badge badge-danger">buy</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
        </div>
        <br><br>
        <div class="col-md-4 card bg-transparent">
            <div class="row">
                <div class="col-2">
                    <span style="border-radius: 50%; font-size: ; padding: 10% 50%; border: 1px solid red;" class="h2 text-light">J</span>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn bg-transparent text-warning" style="font-family: cursive;">
                                -->> Coffee <span style="font-family: cursive;" class="badge badge-light"> KShs. 150</span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <span style="font-family: cursive; font-style: italic; font-size: 10px;" class="text-light text-right"><?php echo $date; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <img src="goods/coffee.jpg" alt="product" class="image">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav justify-content-center" style="background-color: #000;">
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive;">
                               <i class="fa fa-whatsapp"></i> <span style="font-family: cursive;" class="badge badge-danger">whatsapp</span>
                            </button>
                        </li>
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive;">
                            <i class="fa fa-phone"></i> <span style="font-family: cursive;" class="badge badge-danger">Call</span>
                            </button>
                        </li>
                        <li class="nav-item" style=" padding: 8px 2px;">
                            <button type="button" class="btn bg-transparent border-danger text-warning" style="font-family: cursive; ">
                            <i class="fa fa-eye"></i> <span style="font-family: cursive;" class="badge badge-danger">buy</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>














<?php include('btm_nav.php'); ?>

<!-- Recent Properties end -->
<br><br>
<?php include('btm_nav.php'); ?>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
<?php 
        }
    }
}
?>