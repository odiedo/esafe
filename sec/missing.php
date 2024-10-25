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
    <link type="text/css" rel="stylesheet" href="include/style.css">
    <script type="text/javascript" src="include/js/jquery-1.10.2.min.js" ></script>
    <style>

    </style>
</header>    
<body style="background-color:#000;" oncontextmenu="return false;">
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 text-center h3" style="font-family:serif; color:white; text-shadow: 0px 0px 10px green; background: rgba(0,0,0,.5);">
                    MISSING PEOPLE
                </div>
            </div>
            <div class="row" style="border:px solid red;">
                <?php
                $jql = "SELECT * FROM missing_person;";
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
                        <div class="col-md-4 card bg-transparent">
                            <div class="">
                                <div class="missing">
                                    <img src="cop/police/missing/<?php echo $filename; ?>" class="img-responsive" style="width:100%; height:300px;" alt="<?php echo $mname; ?>">
                                        </div>
                                        <div class="card-body text-light">
                                        <b class="text-info">Name: </b> <small class="float-right text-light"><?php echo $mname; ?></small><br>
                                        <b class="text-info">Last Location: </b> <small class="float-right text-light"><?php echo $last_location; ?></small><br>
                                        <b class="text-info">Description: </b> <small class="float-right text-light"><?php echo $mdesc; ?></small><br>
                                        <?php echo $date; ?> </small><br><br>
                                        <a href='#anon.php' class='button btn w-100 emg' style='cursor:pointer; font-family:serif;'> anonymous report </a>
                                    </div>
                                <span class="dot"></span>
                            </div>
                        </div>
                <?php  }
                } else {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                <div class="card-header text-center text-danger"><i class="fa fa-user-secret text-center" style="font-size: 150px; padding-top: 50%;"></i><br>
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

<br>

<?php include('btm_nav.php'); ?>



<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS Requirements -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<?php 
}
?>