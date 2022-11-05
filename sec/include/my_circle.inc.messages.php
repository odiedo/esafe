
<br>
    <?php
    session_start();
    require 'conn.php';

    $id_number = $_SESSION['id_number'];
    $sql = "SELECT * FROM my_circle_messages where id_number = $id_number LIMIT 2";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        # code...
        while ($row = $result->fetch_assoc()) {
            $date = $row['sent_date'];
            $circle_message_id = $row['circle_message_id'];
            $satisfied = $row['satisfied'];
            $message = $row['message'];
            $hostel = $row['hostel'];

            ?><br>
            <div class="col-12">
                <b>Reported date ------ </b> <small class="float-right text-light"> <?php echo $date; ?> </small><br>
                <b>Message ------ </b> <small class="float-right text-danger"> <?php echo $message; ?> </small><br>
                <b>Hostel ------ </b> <small class="float-right text-danger"> <?php echo $hostel; ?> </small><br>
                <b>Safe ------ </b> <small class="float-right text-light"> <i class="fa fa-<?php echo $satisfied; ?>-circle-o text-success h5"></i></small>
                <hr class="bg-info">
            </div>
    <?php  }?></div>
    <?php
    } else {
        echo "
        <div class='container'>
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <span class='text-light h6'>Oops!!! Your zone Emergency messages is Empty! 😟</span><br>
                </div>
            </div>
        </div>";
    }
$con->close();
?>