<?php 
    session_start();
    include('../include/conn.php');
    $id_number = $_SESSION['id_number'];
    $sqla = "SELECT * FROM walk_map where id_number = '$id_number' ORDER BY walk_date DESC LIMIT 1";
    $result = $conn->query($sqla);
    if ($result->num_rows > 0) {
    }
    while ($row = $result->fetch_assoc()) {
        $id_number = $row['id_number']
        $walk_code = $row['walk_code'];
        $progress = $row['start'];
        $walk_time = date('Y-m-d H:i:s');
        $jql = "INSERT INTO walk_progress (id_number, walk_code, progress, walk_time)
        VALUES ('$id_number', '$walk_code', '$progress', '$walk_time')";

        if (mysqli_query($conn, $sql)) {
            echo "
            <script>
                alert('success');
                window.location='walk_alert.php';
            </script>
            ";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

?>