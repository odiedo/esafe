<?php
include ('include/conn.php');
?>
<html>
  <header>
  <title>Police Unit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">    
    <script type="text/javascript" src="include/js/jquery-1.10.2.min.js" ></script>
    
    <style>
      body{
        background-color: #000;
      }
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
  .emg {
    position: relative;
    width: 100%;
    height: 30px;
    background: #000;
    color: #fff;
    padding-top: 10px;
    font-weight: bold;
    line-height: 5px;
    }
    .emg:before,
    .emg:after {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        width: calc(100% + 6px);
        height: calc(100% + 6px);
        background: linear-gradient(45deg, red, blue, green, blue, yellow, purple);
        z-index: -1;
        background-size: 400%;
        animation: borderbg 40s linear infinite;
    }
    @keyframes borderbg{
        0%{
            background-position: 0 0;
        }
        50%{
            background-position: 400% 0;
        }
        100%{
            background-position: 0 0;
        }
    }
    .emg:after{
        filter: blur(5px);
    }
    </style>
  </header>    
<body>
<div class="container">
<div class="row  breadcrumb bg-transparent" style="font-family:sans-serif;box-shadow: 0px 0px 10px rgba(0,100, 100, 0.7);">
        <div class="col-md-9">
            <h4 class="card-header text-light" style="text-shadow: 0px 0px 10px red; background: rgba(0,0,0,.5);"> Most Wanted Criminals</h4>
        </div>
        <div class="col-md-3 card bg-transparent">
            <div class="h6 text-right text-light" style="text-shadow: 0px 0px 10px yellow; background: rgba(0,0,0,.5);">
            <a data-toggle="modal" data-target="#exampleModal" style="cursor:pointer">{<i class="fa fa-sign-in"></i> login</a>} ||
            <a data-toggle="modal" data-target="#myModal" class="text-light" style="cursor:pointer"> {<i class="fa fa-user-circle-o"></i> sign-up</a>}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p id="mr_robot" class="text-light" style="text-transform: uppercase;">If you have any information regarding these people or there whereabouts, please write anonymous report to help us protect our country
            , to make the street safe for our children, and to make our people live peaceful.</p>
        </div>
    </div>
    <br><br>
    <div class="row">
        

        <?php
        $sql = "SELECT * FROM most_wanted  ORDER BY date DESC LIMIT 7;";
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
        <div class="col-md-4 card card-primary card-outline bg-transparent border-primary border-left-0 border-right-0">
                <img src="cop/police/wanted/<?php echo $filename; ?>" alt="wanted" style="height: 250px; width: 100%;">
            <div class="card-body"  style="font-family:serif; font-style: italic;">
                <span class="text-info"><?php echo $cname;?></span><br>
                <span  class="text-danger"><?php echo $ctitle;?></span><br>
                <span  class="text-light"><?php echo $cdesc;?></span><br>
                <span class="text-warning float-right" style="font-size: 10px;"><?php echo $date; ?></span>
                <div class="button btn btn-info w-100 emg" style="cursor:pointer; font-family:serif;"> anonymous report </div>
            </div>
        </div>
        
        <?php  }
                } else {
                    echo "0 results";
                }
            $con->close();
            ?>
            <br><br> <br>
    </div>
</div>


<script>
var yourT=document.getElementById("mr_robot");
var innerH=yourT.innerHTML;
var innerL=innerH.length;
var count=0;
function doit(){
	if (count<innerL){		document.getElementById("mr_robot").innerHTML+=innerH.charAt(count);		count++;	} 
else{clearInterval(Timer)};}
function go(){	
document.getElementById("mr_robot").innerHTML="";
	Timer=setInterval("doit()",100);}
window.onload=go;
</script>
</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>