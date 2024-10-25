<?php
include('include/conn.php');
ini_set('session.gc_maxlifetime', 1440); 
session_start();

// Redirect if the user is not logged in
if (empty($_SESSION['id_number'])) {
    header("Location: ../index.php");
    exit();
}

$user = $_SESSION['id_number'];
$sql = "SELECT * FROM p_user WHERE id_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $id = $row['user_id'];
    $image = $row['image'];
    $phone = $row['phone'];
    $id_number = $row['id_number'];
    $hostel = $row['home_location'];
} else {
    echo "<script>alert('User not found!'); window.location.href='../index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Unit</title>

    <!-- External CSS libraries -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="include/style.css">

    <!-- JavaScript libraries -->
    <script src="include/js/jquery-1.10.2.min.js"></script>
</head>
<body style="background-color: #09030C;" oncontextmenu="return false;">

<div class="container">
    <div class="row">
        <?php include('nav.php'); ?>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 text-center">
            <i class="fa fa-bullhorn h4 text-light"><u> Notice Board</u></i>
        </div>
    </div>
    <div class="col-xl-7 col-md-7 col-lg-7">
        <div class="row">
            <?php
            $query = "SELECT * FROM notice ORDER BY notice_id DESC";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $message = htmlspecialchars($row['message']);
                    $venue = htmlspecialchars($row['venue']);
                    $time = htmlspecialchars($row['time']);
                    $date = htmlspecialchars($row['date']);
                    $tag = htmlspecialchars($row['tag']);
                    ?>
                    <div class="card col-md-6 text-light border-0 bg-transparent" style="font-size: 14px; background-color: rgba(0, 0, 0, .5); box-shadow: 0 3px 5px 0 lightblue;">
                        <div class="card-body">
                            <span>Message:: <?php echo $message; ?></span><br>
                            <span>Venue:: <?php echo $venue; ?></span><br>
                            <span>Date/Time:: <?php echo $time; ?> <?php echo $date; ?></span><br>
                            <span>#<?php echo $tag; ?></span>
                        </div>
                    </div><br>
                <?php }
            } else {
                echo "<p class='text-light'>No notices available.</p>";
            }
            ?>
        </div>
    </div>
</div>

<br><br>
<?php include('btm_nav.php'); ?>

<!-- JavaScript libraries -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
