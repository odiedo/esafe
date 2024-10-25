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
    
</header>    
<body style="background-color:#000;">
<?php include('../nav.php');
include('../include/conn.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 med_map wow fadeInUp delay-04s">
            <h6>Nearby hospital</h6><br>
            <iframe src="" width="100%" height="300" style="margin:0 auto; top: 0; left: 0; bottom:0; right:0; overflow:hidden; position:relative;" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        
        <div class="col-md-6 med_desc fadeInUp delay-04s">
            <p class="border-info border-top-0 border-bottom-0 one text-info">Hospital Range: 4 Km away</p>
            <p class="border-info border-top-0 border-bottom-0 two text-info">Working Hours: 24 Hours</p>
            <p class="border-info border-top-0 border-bottom-0 three text-info">Hospital Emergency Number: 082132484</p>
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