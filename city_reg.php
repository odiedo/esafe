<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Safe Security</title>

    <!-- External CSS Libraries -->
    <link type="text/css" rel="stylesheet" href="sec/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="sec/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="sec/assets/fonts/flaticon/font/flaticon.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="sec/assets/img/favicon.ico" type="image/x-icon">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="sec/assets/css/style.css">

    <style>
        body {
            background-color: #09030C;
            color: white;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid #8A080A;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            color: #F0F0F0;
            max-width: 400px;
            width: 100%;
        }

        .card-header {
            font-size: 20px;
            text-align: center;
            text-shadow: 0px 0px 10px #FFFF00;
            line-height: 12px;
        }

        .form-control {
            background-color: transparent;
            border: none;
            border-bottom: 2px solid #8A080A;
            color: #F0F0F0;
            border-radius: 0;
            transition: border-color 0.3s ease-in-out;
            line-height: 5px;
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom-color: #00FFFF;
        }

        button[type="submit"], .btn-primary {
            background-color: #8A080A;
            color: white;
            text-transform: uppercase;
            border-radius: 50px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button[type="submit"]:hover, .btn-primary:hover {
            background-color: #00FFFF;
            color: black;
        }

        .text-info {
            font-size: 13px;
            cursor: pointer;
        }

        .card-body img {
            border-radius: 50%;
            border: 2px solid #8A080A;
        }

        .text-light {
            color: #A9A9A9;
        }

        .text-primary {
            color: #00FFFF;
        }

        .form-select {
            background-color: transparent;
            color: #F0F0F0;
            border: none;
            border-bottom: 2px solid #8A080A;
            border-radius: 0;
        }

        .form-select option {
            background-color: #000;
            color: white;
        }

        p.text-center {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="card mt-2">
        <div class="card-header">
            E-Safe Security
            <p class="text-light text-center">Create an Account</p>
        </div>
        <div class="card-body">
            <form method="post" action="sign-up.php" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Full Name" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="number" name="id_number" placeholder="ID Number" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group d-flex justify-content-between">
                    <input type="password" name="password" id="myPass" placeholder="Password" class="form-control" required autocomplete="off">
                    <input type="checkbox" onclick="myFunction()" class="text-info">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" placeholder="Phone Number" class="form-control mb-3" required autocomplete="off">
                </div>
                <div class="form-group">
                    <select name="home_location" class="form-select w-100 mb-1">
                        <option selected disabled>--- Select Your Location ---</option>
                        <option>Roadblock</option>
                        <option>Uplands</option>
                        <option>Kajei</option>
                        <option>Machakusi</option>
                        <option>Amoni</option>
                        <option>Achunet</option>
                        <option>Ikapolok</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="gender" id="gender" class="form-select w-100 mb-1">
                        <option selected disabled>--- Select Your Gender ---</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Rather not say</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit-form" class="btn btn-primary">Register</button>
                </div>
                <p class="text-center">#Need <a href="#" class="text-primary">help</a> creating account?</p>
                <p class="text-center">Login instead!!! <a href="index.php" class="text-primary">Login</a></p>
            </form>
        </div>
    </div>

    <!-- Password Show/Hide Script -->
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
