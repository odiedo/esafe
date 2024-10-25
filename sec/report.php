<?php
    include ('include/conn.php');
    ini_set('session.gc_maxlifetime', 1440); 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Police Unit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">
<style>
.profile-user-img {
  border: 3px solid #adb5bd;
  margin: 0 auto;
  padding: 3px;
  width: 100px;
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
    </head>
<body style="background-color: #000;">
<?php
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM p_user where id_number = $user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    # code...
    while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $name = $row['email'];
    $id = $row['user_id'];
    $location = $row['home_location'];
    $phone = $row['phone'];
    $gender = $row['gender'];
    $date = $row['join_date'];
    $image = $row['image'];
    $id_number = $row['id_number']; 
?>

<div class="container" style="margin-top:15px;width:100%;">
    <div class="row">
        <div class="col-md-6 card bg-transparent" style="box-shadow: 0px 0px 10px rgba(0,10, 100, 0.7);">
            <div class="card-header  bg-dark">
              <div class="card-title text-center bg-transparent text-light h5 float-left"  style="text-shadow: 0px 0px 10px red; background: rgba(0,0,0,.5);">File Report (write statement)</div>
              <button onClick="autoload()" class="text-light btn float-right" style="background-color:red;">Auto Fill</button>
            </div>
            <div class="card-body text-light">
              <form action="include/report.inc.php" method="post">
                <div class="row">
                  
                  <div class="col-md-4">
                    Case Title: 
                  </div>
                  <div class="col-md-8">
                    <select name="title" class="form-control bg-transparent border-primary text-info" required>
                        <option selected disabled class="text-light" style="background-color:#000;">Select Case Type</option>
                        <option class="text-light" style="background-color:#000;">Break-in</option>
                        <option class="text-light" style="background-color:#000;">Assault</option>
                        <option class="text-light" style="background-color:#000;">Suspicious Activity</option>
                        <option class="text-light" style="background-color:#000;">Robbery</option>
                        <option class="text-light" style="background-color:#000;">Rape Case</option>
                      </select><br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      Case Description:
                    </div>
                    <div class="col-md-8">
                      <textarea name="description" id="description" rows="3" placeholder="Describe your case here..." class="form-control bg-transparent border-primary text-info"></textarea><br>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    Location:
                  </div>
                  <div class="col-md-8">
                    <select name="location"  class="form-control bg-transparent border-primary text-info" id="location">
                      <option selected disabled class="text-light" style="background-color:#000;">Crime Location</option>
                      <option class="text-light" style="background-color:#000;">Roadblock</option>
                      <option class="text-light" style="background-color:#000;">Forest</option>
                      <option class="text-light" style="background-color:#000;">Garden Park</option>
                      <option class="text-light" style="background-color:#000;">Uplands</option>
                      <option class="text-light" style="background-color:#000;">Kajei</option>
                      <option class="text-light" style="background-color:#000;">Railways</option>
                      <option class="text-light" style="background-color:#000;">Magharibi</option>
                      <option class="text-light" style="background-color:#000;">Bonnie</option>
                      <option class="text-light" style="background-color:#000;">Garisa</option>
                    </select><br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    Address
                  </div>
                  <div class="col-md-8">
                    <input id="street" name="address" type="text" placeholder="eg. roadblock, malaba, Busia County" class="form-control bg-transparent border-primary text-info"><br>
                  </div>
                </div>                    
                <div class="row">
                  <div class="col-md-4">
                  Phone Number:
                  </div>
                  <div class="col-md-8">
                    <input type="number" name="phone" id="phone" value="" placeholder="phone"  class="form-control bg-transparent border-primary text-info"><br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    ID Number:
                  </div>
                  <div class="col-md-8">
                    <input type="number" name="id_number" id="id_number" value="" placeholder="Id number"  class="form-control bg-transparent border-primary text-info"><br>
                  </div>
                </div>
            <?php
            $variablephp = $_SESSION['id_number'];
            $description = 'This is an Emergency!!';
            $location = $location;
            $cell = $phone;
        ?>

          <script>
          var variablejs = "<?php echo $variablephp; ?>" ;
          var id_number = "<?php echo $variablephp; ?>" ;
          var description = "<?php echo $description; ?>" ;
          var locationb = "<?php echo $location; ?>" ;
          var cell = "<?php echo $phone; ?>" ;

          function autoload(){
              document.getElementById('id_number').value = id_number;
              document.getElementById('description').innerHTML = description;
              document.getElementById('location').value = locationb;
              
              document.getElementById('phone').value = cell;

              if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
              document.getElementById("street").value = "Geolocation is not supported by this browser.";
            }
          }

          function showPosition(position) {
              document.getElementById("street").value = " " + position.coords.latitude + 
            "," + position.coords.longitude;
          }

          function cancel(){
        var tag = document.getElementById('tag');
        tag.style.display = "none";
      }
          </script>

                    <button type="submit" name="submit-report" class="emg" >Submit</button>
                </form>
            </div>
        </div>

        <div class="col-md-6">
          <div class="card card-primary card-outline bg-transparent">
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-transparent border-info border-left-0 border-right-0 border-top-0">
                  <div class="card-header text-info h5" style="font-family: serif">
                    My Case
                  </div><hr class="bg-light">
                  <div class="card-body text-info"  style="background-image: url(assets/img/to.png); background-size:cover;">
                    <b>Case Type:</b> <small class="float-right text-light">murder</small><br>
                    <b>Case ID:</b> <small class="float-right text-light">#319M021</small><br>
                    <b>Reported Date:</b> <small class="float-right text-light">1/11/2020</small><br>
                    <b>Case Status:</b> <small class="float-right progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%; background-color:green; border-radius:21px;">pending</small><br>
                    <b>Police incharge:</b> <small class="float-right progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%; background-color:green; border-radius:21px;">pending</small><br>
                  </div>
                  <hr class="bg-light">
                  <div class="card-footer text-light">
                    To view more details, <a href="#"> click here</a>
                  </div>
                  </div>
                </div>
              </div>
              <br>
            </div>
            <div class="row">
              <div class="col-md-12">
                <blockquote class="blockquote text-left border-success" style="background-color: rgba(0,0,0,.5); ">
                  <p class="mb-0 text-info" style="font-style: italic; font-family: serif;">"Keep The Streets Safe For Your Kids"</p>
                  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">E-Society</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <blockquote class="blockquote text-left border-success" style="background-color: rgba(0,0,0,.5); ">
                  <p class="mb-0 text-info" style="font-style: italic; font-family: serif;">"Fight Crimes And Stay Safe."</p>
                  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">E-Society</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <blockquote class="blockquote text-left border-success" style="background-color: rgba(0,0,0,.5); ">
                  <p class="mb-0 text-info" style="font-style: italic; font-family: serif;">"Stay In Touch With Neighbourhood Police"</p>
                  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">E-Society</cite></footer>
                </blockquote>
              </div>
            </div>                       
          </div>
        </div>
      </div>
    </div>
</div>


<?php 
    }
}?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>