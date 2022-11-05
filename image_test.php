<?php
      include ('sec/include/conn.php');
      ini_set('session.gc_maxlifetime', 1440); 
      session_start();
  $id_number = $_SESSION['id_number'];    
?>
<html lang="en">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="background-color: #000;">
<div class="container">
  <div class="row">
    <div class="col-md-6 bg-transparent">
        <span style="color: white; font-family: serif;">Select Your Profile Picture: <?php echo $id_number; ?>:</span>
        
        <input type="file" id="image" class="form-control bg-transparent ">
        <br>
        <div id="upload-demo" style="background: rgba(0,70,20,10.5);"></div>
        <button class="btn btn-success btn-block btn-upload-image">Upload Image</button>
    </div>
  </div>
</div>


<script type="text/javascript">


var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 250,
        height: 250,
        type: 'square' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


$('.btn-upload-image').on('click', function (ev) {
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    $.ajax({
      url: "upload.php",
      type: "POST",
      data: {"image":img},
      success: function (data) {
        window.location = "index.php"

      }
    });
  });
});


</script>


</body>
</html>
