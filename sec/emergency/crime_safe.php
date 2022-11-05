<?php
session_start();
include ('../include/conn.php');
if (isset($_POST['safe'])){
    $id_number = $_SESSION['id_number'];
    $sqla = "SELECT * FROM report where id_number = '$id_number' ORDER BY date DESC LIMIT 1";
    $result = $conn->query($sqla);
    if ($result->num_rows > 0) {
    }
    while ($row = $result->fetch_assoc()) {
        $alert_id = $row['report_id'];

        $sql = "UPDATE report SET satisfied ='check', attended = 'Ok', feedback='Ok' WHERE report_id='$alert_id'";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                window.location='crime_safe_report.php';
            </script>
            ";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }

}
?>