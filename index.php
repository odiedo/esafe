<html>
<head>
    <title>E-Safe Security</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="sec/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="sec/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="sec/assets/fonts/flaticon/font/flaticon.css">
    
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="sec/assets/img/favicon.ico" type="image/x-icon">
    
    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="sec/assets/css/style.css">
    <style>
        body {
            background-color: #09030C; 
            color: white;
            font-family: 'Roboto', sans-serif; 
        }

        .card {
            background: rgba(0,0,0, 0.5);
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            border: 1px solid #8A080A;

        }
        .card-body {
            position: relative;
            background: rgba(0,0,0, 0.5);
        }

        .card-body img {
            border-radius: 50%;
            border: 2px solid #8A080A;
        }
        h4 {
            color: #F0F0F0;
            letter-spacing: 1px;
        }
        .form-control {
            background-color: transparent;
            border: none;
            border-bottom: 2px solid #8A080A;
            color: #F0F0F0;
            border-radius: 0;
            transition: border-color 0.3s ease-in-out;
        }
        .form-control:focus {
            box-shadow: none;
            border-bottom-color: #00FFFF;
        }
        button[type="submit"] {
            background-color: #8A080A;
            color: white;
            text-transform: uppercase;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #00FFFF;
            color: black;
        }
        p.fst-italic {
            color: #A9A9A9; 
        }
    </style>
</head>
<body>

<div class="container m-safe mt-2">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark text-light shadow-lg rounded">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <img src="sec/assets/img/logo.png" alt="E-safe logo" class="img-fluid mb-3" style="width: 80px;">
                        <h4 class="fw-bold">Login Credentials</h4>
                    </div>
                    <form action="log.php" method="post">
                        <div class="mb-3">
                            <input type="tel" name="id_number" placeholder="ID Number" autocomplete="off" class="form-control bg-transparent text-danger" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control bg-transparent text-danger" required>
                        </div>
                        <button type="submit" name="login-submit" class="btn btn-danger w-100 py-2 text-uppercase fw-bold">
                            Login
                        </button>
                    </form>
                    <div class="text-center mt-4">
                        <p class="text-muted">or</p>
                        <span class="d-block mb-3">*************************</span>
                        <p class="text-muted fst-italic">Register now, stay safe, be kind, protect comrade</p>
                        <a href="city_reg.php" class="mt-3">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-qOpMl4Mo3i47XkqhGH02tSe6dGL4C/JTCHc04UqAaYChGflbOOBu+bz6y8QK+Iq+" crossorigin="anonymous"></script>

</body>
</html>
