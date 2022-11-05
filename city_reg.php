<html>
<head>
    <title>DCI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="sec/assets/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="sec/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="sec/assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="sec/assets/img/favicon.ico" type="image/x-icon" >

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="sec/assets/css/style.css">
    <style>
        body{
        background-color: #000;
        color: white;
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
.register {
    line-height: 10px;
}
    </style>
</head>
<body style="background-color:#000;">
<div class="container" style="top: 50%; left:50%; position:absolute; transform: translate(-50%, -50%); max-width:350px; width:100%;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline bg-transparent bg-transparent">
                <div class="card-header" style="color: white;text-shadow: 0px 0px 10px yellow; text-align: center;">E-Safe Security</div>
                    <div class="card-body">
                        <div class="text-light" style="text-align: center; font-family: serif; font-size: 14px;" >
                            Enter your details below carefully
                        </div>
                        <form method="post" action="sign-up.php" enctype='multipart/form-data'>
                            <div class="register">
                                <input type="text"  name="username" placeholder="Full Name" style="font-family: serif;" class="form-control text-light w-100 bg-transparent" required autocomplete="off"><br>
                                <input type="number" name="id_number" placeholder="ID Number" style="font-family: serif;" class="form-control text-light w-100 bg-transparent" required autocomplete="off"><br>
                                <input type="password" name="password" id="myPass" placeholder="password" style="font-family: serif;" class="form-control text-light w-100 bg-transparent" required autocomplete="off"><br>
                                <input type="checkbox" onClick="myFunction()"><span class="text-info" style="font-size:13px;"> Show Password</span><br><br>
                                <input type="email" name="email" placeholder="Email Address" style="font-family: serif;" class="form-control text-light w-100 bg-transparent" required autocomplete="off"><br>
                                <input type="tel" name="phone" placeholder="Phone Number" style="font-family: serif;" class="form-control text-light bg-transparent" required autocomplete="off"><br>
                                <select name="home_location" id="hostels" class="text-light w-100 form-control bg-transparent">
                                    <option style="background-color:#000; color:white;" selected disabled> --- Select Your Location --- </option>
                                    <option class="text-light" style="background-color:#000;">Roadblock</option>
                                    <option class="text-light" style="background-color:#000;">Uplands</option>
                                    <option class="text-light" style="background-color:#000;">Kajei</option>
                                    <option class="text-light" style="background-color:#000;">Machakusi</option>
                                    <option class="text-light" style="background-color:#000;">Amoni</option>
                                    <option class="text-light" style="background-color:#000;">Achunet</option>
                                    <option class="text-light" style="background-color:#000;">Ikapolok</option>
                                </select>
                                <br>
                                <select name="gender" id="gender" class="text-light w-100 form-control bg-transparent">
                                    <option style="background-color:#000; color:white;" selected disabled><center> --- Select Your Gender --- </center> </option>
                                    <option style="background-color:#000; color:white;">Male</option>
                                    <option style="background-color:#000; color:white;">Female</option>
                                    <option style="background-color:#000; color:white;">Rather not say</option>
                                </select>
                                <br>
                                <input type="submit" value="Register" name="submit-form" class="text-primary w-100 btn btn-primary bg-transparent"/>
                                <p class="text-center text-light">#Need <a href="#" class="text-info">help?</a></p>
                                <p class="text-center text-light">Login instead!!! <a href="index.php" class="text-primary">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function myFunction() {
    var x = document.getElementById("myPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
</body>
</html>