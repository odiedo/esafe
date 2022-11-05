<?php
include ('conn.php');
// prepare and bind
$stmt = $conn->prepare("INSERT INTO p_user (username,id_number,phone,email,home_location,gender,password,join_date,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssssss", $username, $id_number, $phone, $email, $home_location, $gender, $password, $join_date,$image);

// set parameters and execute
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$join_date = date('Y-m-d H:i:s');
$home_location = $_POST['home_location'];
$id_number = $_POST['id_number'];
$name = $_FILES['file']['name'];

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
echo "
    <script>
        alert('Account Created Successful. You can Now Login!');
    </script>";

$stmt->close();
$conn->close();
?>