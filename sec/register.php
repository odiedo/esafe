<html>
    <header>
        <title>Police Unit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <!-- External CSS libraries -->
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css">
        <link type="text/css" rel="stylesheet" href="assets/css/jquery.selectBox.css">
        <link type="text/css" rel="stylesheet" href="assets/css/dropzone.css">
        <link type="text/css" rel="stylesheet" href="assets/css/rangeslider.css">
        <link type="text/css" rel="stylesheet" href="assets/css/animate.min.css">
        <link type="text/css" rel="stylesheet" href="assets/css/leaflet.css">
        <link type="text/css" rel="stylesheet" href="assets/css/slick.css">
        <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css">
        <link type="text/css" rel="stylesheet" href="assets/css/map.css">
        <link type="text/css" rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
        <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

        <!-- Favicon icon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" >

        <!-- Custom Stylesheet -->
        <link type="text/css" rel="stylesheet" href="assets/css/style.css">
        
        <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">
<style>
body{

}
.emergency {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: #000;
    color: #fff;
    font-weight: bold;
    line-height: 0px;
}


.emergency h3 {
    color:white;
    text-transform:uppercase;
    font-weight: 500;
    text-align:center;
}

.emergency select,
.login input[type = "text"],
.login input[type = "password"],
.login input[type = "submit"],
.emergency input[type = "submit"],
.emergency input[type = "text"],
.emergency input[type = "number"],
.emergency input[type = "email"],
.emergency input[type = "file"],
.emergency input[type = "password"]{
    border: 0;
    background: none;
    display:block;
    margin: 3px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 250px;
    outline: none;
    text-align:center;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
}

.login input[type = "text"]:focus,
.login input[type = "password"]:focus,
.emergency select:focus,
.emergency input[type = "text"]:focus,
.emergency input[type = "number"]:focus,
.emergency input[type = "email"]:focus,
.emergency input[type = "file"]:focus,
.emergency input[type = "password"]:focus{
    width:300px;
    border-color: #2ecc71;
}

.emergency input[type = "file"]{
    border: 0;
    background: none;
    display:block;
    margin: 3px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 250px;
    outline: none;
    text-align:center;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
}

.login input[type = "submit"],
.emergency input[type = "submit"]{
    border: 0;
    background: none;
    display:block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor:pointer;
}

.login input[type = "submit"]:hover,
.emergency input[type = "submit"]:hover{
    background:2ecc71;
}


</style>        
    </header> 
<body style="background-color: #000;">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crime_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO p_user (username,id_number,phone,email,location,gender,password,date,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssssss", $username, $id_number, $phone, $email, $location, $gender, $password, $date,$image);

// set parameters and execute
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$date = date('Y-m-d H:i:s');
$location = $_POST['location'];
$id_number = $_POST['id_number'];
$target_dir = "upload/";

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

// Check extension
if( in_array($imageFileType,$extensions_arr) ){
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
}
$stmt->execute();
echo "New records created successfully";

$stmt->close();
$conn->close();
?>
<div class="container">
    <div class="row emergency w-100">
        <div class="col-md-6 col-sm-6 col-lg-12" style="background-color:#000;">
        <h3><i class="fa fa-user-circle-o"></i> sign-up</h3><br>
            <form method="post" action="" enctype='multipart/form-data'><br>
                <input type="text"  name="username" placeholder="username"><br>
                <input type="text" readonly value="Public User"><br>
                <input type="number" name="id_number" placeholder="id number"><br>
                <input type="number" name="phone" placeholder="phone"><br>
                <input type="email" name="email"  placeholder="email address"><br>
                <select name="location" id="location1">
                    <option  style="background-color:#000; color:white;" selected disabled>Choose Your Location</option>
                    <option style="background-color:#000; color:white;">Roadblock</option>
                    <option  style="background-color:#000; color:white;">Uplands</option>
                    <option  style="background-color:#000; color:white;">Garden Park</option>
                    <option  style="background-color:#000; color:white;">Forest</option>
                    <option  style="background-color:#000; color:white;">Railways</option>
                </select>
                <br>
                <select name="gender" id="gender1">
                    <option  style="background-color:#000; color:white;" selected disabled>Select gender</option>
                    <option style="background-color:#000; color:white;">Male</option>
                    <option  style="background-color:#000; color:white;">Female</option>
                </select><br>
                <input type="password" name="password" placeholder="password" ><br>
                <input type="file" name="file"><br><br>
                <input type="submit" value="submit" name="submit-report" class="form-control"/>
                <center><a data-toggle="modal" data-target="#exampleModal" style="cursor:pointer" class="text-info"> <i class="text-light fa fa-sign-in"></i> login</a></center>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-info" style="background-color:#000;">
        <div class="modal-header">
            <h5 class="modal-title text-info text-center" id="exampleModalLabel">Login</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body h-50">
            <center><img src="assets/img/aa.png" style="height: 100px; width: 100px; border-radius: 50%;"></center>
            <div class="text-light" style="text-align: center; font-family: serif; font-size: 14px;" >
                Enter Your Login Credentials
            </div>
            <form action="log.php" method="post">
                <div class="login">
                    <input type="text" name="username" placeholder="ID number" ><br>
                    <input type="password" name="password" placeholder="password" ><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-color btn-md" name="login-submit" onmousedown="login()">Login</button>     
                    </div>
                </div>
          </form>
    </div>
  </div>
</div>






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