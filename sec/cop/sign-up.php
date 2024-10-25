<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uni_sec";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit-form'])){
    $id_number = $_POST['id_number'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];

    $sql = "SELECT id_number, phone, username FROM uni_security WHERE id_number = '$id_number' OR phone = '$phone' OR username = '$username'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
        echo "<script>alert('sorry user exists'); 
        window.location='index.php';
        </script>";
    }else{
// prepare and bind
$stmt = $conn->prepare("INSERT INTO uni_security (username,id_number,phone,gender,password,date,image) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss",$username, $id_number, $phone, $gender, $password, $date, $image);

// set parameters and execute



$username = $_POST['username'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$id_number = $_POST['id_number'];
$pass = $_POST['id_number'];
$password = password_hash($pass, PASSWORD_DEFAULT);
$date = date('Y-m-d H:i:s');
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
        window.location='index.php';
    </script>";

$stmt->close();
$conn->close();
    }
}
?>
