<html>
    <head>
        <title>POLICE UNIT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <!-- External CSS libraries -->
        <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link type="text/css" rel="stylesheet" href="../assets/fonts/font-awesome/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="../assets/fonts/flaticon/font/flaticon.css">

        <!-- Favicon icon -->
        <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" >

        <!-- Custom Stylesheet -->
        <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
        <link type="text/css" rel="stylesheet" href="../style.css">
        <link type="text/css" rel="stylesheet" href="../include/style.css">
        <link type="text/css" rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" id="style_sheet" href="../assets/css/skins/default.css">
        <script type="text/javascript" src="../include/js/jquery-1.10.2.min.js" ></script>

    </head>
<body style="background-color:#000;">
<div class="block">
    <h3>Security registration</h3>
    <img src="../assets/img/ken.png" alt="">
    <form method="post" action="sign-up.php" enctype='multipart/form-data'><br>
        <input type="text" name="username"  class="form-control bg-transparent text-light border-right-0 border-left-0 border-top-0" placeholder="Full Name"><br>
        <select name="gender" id="gender" class="form-control bg-transparent border-right-0 text-light border-left-0 border-top-0">
            <option class="text-light" style="background-color:#000;" disabled selected >- - - Select Gender - - -</option>
            <option class="text-light" style="background-color:#000;">Male</option>
            <option class="text-light" style="background-color:#000;">Female</option>
        </select><br>
        <input type="number" name="id_number"  class="form-control text-light bg-transparent border-right-0 border-left-0 border-top-0" placeholder="ID Number"><br>
        <input type="tel" name="phone"  class="form-control text-light bg-transparent border-right-0 border-left-0 border-top-0" placeholder="Phone Number"><br>
        <input type="file" name="file" class="form-control bg-transparent border-right-0 text-light border-left-0 border-top-0"> <br>
        <input type="submit" value="submit" name="submit-form" class="form-control"/>
        <p class="text-center text-light">#Need <a href="#" class="text-info">help?</a></p>
    </form>        
</div>
</body>
</html>