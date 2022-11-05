<html>
<header>
    <?php

header('Set-Cookie: widget_session=abc123; SameSite=None; Secure');
    ?>
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
        .near-doc h5{
            color: white;
            text-shadow: 3px 3px 3px yellow;
        }
        .mech {
            color: white;
            text-shadow: 0px 0px 10px red;
            text-align: center;
            text-decoration: underline;
            
        }
        .c_near img{
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 1px solid red;
        }
        .c_near .name{
            color: yellow;
            padding-top: 10px;
        }
        .c_near .dist{
            color: red;
            padding-top: 10px;
        }
        .c_near .btn{
            margin-top: 10px;
        }
        .c_near hr{
            background-color: white;
        }
        .specialist{
            color: yellow;
        }
        .alert {
            color: white;
            margin-bottom: 0px;
        }
        .zone, .one{
        border: 1px solid rgb(197, 197, 176);
        position: relative;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 1px red,
                    0 0 2px red,
                    0 0 3px red,
                    0 0 4px red,
                    0 0 5px red;
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
        padding-top: 10px;
    }
    </style>
</header>    
<body style="background-color:#000;">
<?php include('../nav.php');
include('../include/conn.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <h4>Nearest Garage</h4>
                <div class="med_map">
                    <iframe id="googleMap" src="https://www.google.com/maps?q=0.6350827,34.2840772&output=embed" width="100%" height="100%" style="margin:0 auto; top: 0; left: 0; bottom:0; right:0; overflow:hidden; position:relative;" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 alert text-center">
                        <form name='fifteenth'>
                            Sending alert to your zone in: 
                            <center><input size='3' class="text-light zone bg-transparent text-center" disabled name='sixteenth' style="width: 50px; height: 50px; border-radius: 50%;"></center>
                        </form>
                    <div class="one">
                        <form name='one'>
                            <h6 class="sent">Alert Sent to Your Zone<i class="fa fa-check-circle-o"></i></h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 c_near">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mech text-center">Mechanics Around</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <img src="../assets/img/cop-f.jpg" alt="doctor">                
                </div>
                <div class="col-4 name">
                    Odiedo Paul
                </div>
                <div class="col-2 dist">
                    2Km
                </div>
                <div class="col-4">
                    <button class="btn btn-info name text-info bg-transparent"> <i class="fa fa-phone"> Alert</i></button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-2">
                    <img src="../assets/img/cop-f.jpg" alt="doctor">                
                </div>
                <div class="col-4 name">
                    Odiedo Paul
                </div>
                <div class="col-2 dist">
                    2Km
                </div>
                <div class="col-4">
                    <button class="btn btn-info name text-info bg-transparent"> <i class="fa fa-phone"> Call</i></button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-2">
                    <img src="../assets/img/cop-f.jpg" alt="doctor">                
                </div>
                <div class="col-4 name">
                    Odiedo Paul
                </div>
                <div class="col-2 dist">
                    2Km
                </div>
                <div class="col-4">
                    <button class="btn btn-info name text-info bg-transparent"> <i class="fa fa-phone"> Call</i></button>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-4 near-doc">
            <div class="row">
                <div class="col-md-12">
                    <h5><center>Car breakdown</center></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 specialist">
                    Need Remote Help from Specialists?
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-info bg-transparent text-light w-100" style="box-shadow: 0px 0px 2px 2px blue;">YES</a>
                </div>
                <div class="col-6">
                    <a class="btn btn-danger bg-transparent text-light w-100" style="box-shadow: 0px 0px 2px 2px red;">NO</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br>


<?php include('btm_nav.php'); ?>
<script language='JavaScript' type='text/JavaScript'>
    var seventeenth='#fram.php';
    var eighteenth=10;
    var nineteenth=document.fifteenth.sixteenth.value=eighteenth+1;
    function twentieth(){
    if (nineteenth!=1){
        nineteenth-=1;
        document.fifteenth.sixteenth.value=nineteenth;
        document.one.style.display = 'none';
    }
    else{
        alert('Your Zone has being Alerted successfuly!');
        document.fifteenth.sixteenth.value= 'Sent';
        document.fifteenth.style.display = 'none';
        document.one.style.display = 'block';
        return
    }setTimeout('twentieth()',1000);
    }twentieth();
</script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS Requirements -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>