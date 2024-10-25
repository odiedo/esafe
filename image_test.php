<?php
include('sec/include/conn.php');
ini_set('session.gc_maxlifetime', 1440); 
session_start();
$id_number = $_SESSION['id_number'];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Safe Security</title>
    
    <!-- External CSS libraries -->
    <link rel="stylesheet" href="sec/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="sec/assets/img/favicon.ico" type="image/x-icon">

    <!-- Croppie library for image cropping -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="sec/assets/css/style.css">

    <style>
      body {
        background-color: #09030C;
        color: white;
        font-family: 'Roboto', sans-serif;
      }

      .container {
        margin-top: 100px;
      }

      .card {
        background: rgba(0,0,0, 0.5);
        border-radius: 15px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        border: 1px solid #8A080A;
        padding: 20px;
        text-align: center;
      }

      .upload-icon {
        font-size: 4rem;
        color: #FFFFFF;
        cursor: pointer;
      }

      #image {
        display: none;
      }

      #upload-demo {
        display: none;
        margin-top: 20px;
      }

      .btn-upload-image {
        margin-top: 20px;
        display: none;
      }
      .upload-icon:hover {
        color: #8A080A;
      }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3>Select Your Profile Picture</h3>
                    <p>User ID: <?php echo $id_number; ?></p>
                    <input type="file" id="image" class="form-control">
                    <!-- Camera icon for uploading -->
                    <i class="fa fa-camera upload-icon" aria-hidden="true"></i>
                    <!-- Cropping area -->
                    <div id="upload-demo" style="background: rgba(0,70,20,0.5);"></div>
                    <button class="btn btn-success btn-upload-image">Upload Image</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.upload-icon').on('click', function () {
                $('#image').trigger('click');
            });

            // Initialize the Croppie plugin
            var resize = $('#upload-demo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: {
                    width: 250,
                    height: 250,
                    type: 'square'
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            // image  bind to Croppie 
            $('#image').on('change', function () {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#upload-demo').show();
                    $('.btn-upload-image').show(); 

                    resize.croppie('bind', {
                        url: e.target.result
                    }).then(function(){
                        console.log('Croppie bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
            });

            // Upload the cropped image
            $('.btn-upload-image').on('click', function () {
                resize.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (img) {
                    $.ajax({
                        url: "upload.php",
                        type: "POST",
                        data: {"image": img},
                        success: function (data) {
                            window.location = "index.php";
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
