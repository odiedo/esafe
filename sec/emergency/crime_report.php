<?php 
    session_start();
    include('../include/conn.php');
    $id_number = $_SESSION['id_number'];
    $sqla = "SELECT * FROM report where id_number = '$id_number' ORDER BY date DESC LIMIT 1";
    $result = $conn->query($sqla);
    if ($result->num_rows > 0) {
    }
    while ($row = $result->fetch_assoc()) {
        $report_id = $row['report_id'];
        $n = $row['follow_up'];

        $sql = "UPDATE report SET follow_up = '$n'+1 WHERE report_id='$report_id'";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                window.location='crime_alert.php?success';
            </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
        }

?>