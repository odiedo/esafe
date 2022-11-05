
<br>
    <div class="row">
    <?php
    session_start();
    require 'conn.php';

    $id_number = $_SESSION['id_number'];
    $sql = "SELECT * FROM my_circle where id_number = $id_number";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        # code...
        while ($row = $result->fetch_assoc()) {
            $date = $row['join_date'];
            $name = $row['name'];
            $zone_id = $row['zone_id'];
            $phone = $row['phone'];

            ?>
            <div class="col-6">
                <span class="text-light h6" style="font-family: serif;"><?php echo $name; ?></span>
            </div>
            <div class="col-6">
                <span class="text-info h6" style="font-family: Georgia;"><?php echo $phone; ?></span>
            </div>        
    <?php  }?></div><?php
    } else {
        echo "
        <div class='container'>
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <span class='text-light h6'>Oops!!! Your zone is Empty! 😢😢</span>
                </div>
            </div>
        </div>";
    }
$con->close();
?>
</div>