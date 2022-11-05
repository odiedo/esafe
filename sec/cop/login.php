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
        <link rel="stylesheet" type="text/css" id="style_sheet" href="../assets/css/skins/default.css">
        <script type="text/javascript" src="../include/js/jquery-1.10.2.min.js" ></script>
<style>
    body{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #000;
    font-family: open Sans, sans-serif;
}
.block {
    padding:10px 10px ;
    position: relative;
    width:100%;
    max-width:450px;
    max-height: 450px;
    margin-left:10px;
    margin-right:10px;
    background: #000;
    color: #fff;
    font-size: 48px;
    font-weight: bold;
    line-height: 25px;
    text-align: center;
    text-transform: uppercase;
}
.block:before,
.block:after {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    width: calc(100% + 6px);
    height: calc(100% + 6px);
    background: linear-gradient(45deg, red, yellow, green, blue, yellow, purple);
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
.block:after{
    filter: blur(20px);
}
h3{
    color:white;
    text-decoration:none;
    text-shadow: 0px 0px 10px yellow;
    font-family:serif;

}
</style>
    </head>
<body>
    <div class="block">
        <h3>Login</h3>
        <img src="../assets/img/aa.png" alt="logo" height="120px" width="180px">
        <form method="post" action="sign-in.php" enctype='multipart/form-data'><br>
            <input type="number" name="id_number"  class="form-control bg-transparent text-light border-right-0 border-left-0 border-top-0" placeholder="ID Number"><br>
            <input type="password" name="password"  class="form-control bg-transparent text-light border-right-0 border-left-0 border-top-0" placeholder="Password"><br>
            <input type="submit" value="submit" name="submit-form" class="form-control"/>
            <p class="text-center text-light">#Need <a href="#" class="text-info">help?</a></p>
        </form>        
    </div>
</div>
</body>
</html>