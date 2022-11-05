<?php
    include ('include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
    if(empty($_SESSION['id_number'])){
        header("Location: ../index.php");
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
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="include/style.css">
    
</header>    
<body style="background-color:#000;" oncontextmenu="return false;">
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
            <div class="row" style="border:px solid red;">
                <?php
                $sql = "SELECT * FROM most_wanted;";
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
                        <div class="col-md-4 card bg-transparent">
                            <div class="card-header"><img src="cop/police/wanted/<?php echo $filename; ?>" class="img-responsive" style="width:100%; height:250px;"></div>
                            <div class="card-body text-light">
                                <b class="text-info">Name: </b> <small class="float-right text-light"><?php echo $cname; ?></small><br>
                                <b class="text-info">Case: </b> <small class="float-right text-light"><?php echo $ctitle; ?></small><br>
                                <b class="text-info">Threat rate: </b> <small class="float-right text-light progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="<?php echo $crate; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $crate; ?>;"> 
                                <?php echo $crate; ?>% </small><br><br>
                                
                            </div>
                        </div>
                <?php  }
                } else {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
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
<hr class="bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center text-light" style="width:100%; font-family:san-serif;">
            Powered by Fun-Corp Developers
        </div>
    </div>
</div>
<?php include('btm_nav.php'); ?>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS Requirements -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<?php 
      
    }

?>