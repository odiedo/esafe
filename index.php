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
    background-color: #8A080A;
}
.card-primary:not(.card-outline) > .card-header,
.card-primary:not(.card-outline) > .card-header a {
    color: #ffffff;
}
.card-primary:not(.card-outline) > .card-header a.active {
    color: #1F2D3D;
}
.card-primary.card-outline {
    border-top: 3px solid #8A080A;
}

.m-safe{
    top: 50%; 
    left:50%; 
    position:absolute; 
    transform: translate(-50%, -50%); 
    max-width:350px; 
    width:100%;
}
.m-safe .row {
    line-height: 25px;
}
img {
    height: 180px; 
    width: 180px; 
    border-radius: 50%;
}
.card-header{
    color: white;
    text-shadow: 0px 0px 10px yellow; 
    text-align: center;
}
.inst{
    text-align: center; 
    font-family: serif; 
}
    </style>
</head>
<body style="background-color:#09030C;">
<div class="container m-safe">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline bg-transparent">
                    <div class="card-body">
                        <center><img src="sec/assets/img/jr.png"></center>
                        <div class="text-light inst h6">
                        Login Credentials   
                        </div>
                        <form action="log.php" method="post">
                            <div class="login" style="font-family: agency fb;">
                                <input type="tel" name="id_number" placeholder="ID Number" autocomplete="off" class="form-control border-top-0 text-danger w-100 border-right-0 border-left-0 bg-transparent" required><br>
                                <input type="password" name="password" placeholder="Password" class="form-control border-top-0 w-100 text-danger border-right-0 border-left-0 bg-transparent" required><br>
                                <button class="border-0 w-100" name="login-submit" onmousedown="login()" style="color: white; text-align: center; background-color: #8A080A; font-family: serif;">Login</button>            
                            </div>
                        </form>
                        <h6 class="text-center text-danger">or</h6>
                        <center><span>*************************</span></center>
                    <p style="color: white; text-align: center;font-family: serif; bottom: 0%;"><i>Register now, stay safe, be kind, protect comrade</i></p>
                    <p style="text-align: right;"><a href="city_reg.php" class="text-primary btn btn-primary bg-transparent">Create an Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>