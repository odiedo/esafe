<br>
<div class="row">
    <?php
    require 'conn.php';
    $sql = "SELECT * FROM report  ORDER BY date DESC LIMIT 4;";
    $result = $con->query($sql);

    function time_elapsed_string($date, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($date);
    $diff = $now->diff($ago);
                    
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
            }
        }
        
        if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
                    
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            $time = $row['date'];
            $date_reported =  time_elapsed_string($time); 
            $title = $row['title'];
            $location = $row['location'];
            $report_id = $row['report_id'];

            ?>
            <div class="col-md-3">
                <div class="card card-primary card-outline bg-transparent border-info border-left-0 border-right-0" style="height:150px; border:1px-solid; border-radius: 21px:">
                    <div class="card-body text-left text-light" style="font-family:serif; font-style: italic;">
                    <?php echo $title;?> @ <?php echo $location;?><br>
                        <i class="fa fa-clock-o" style="font-style:italic; font-size:12px">Reported: <?php echo $date_reported;?></i>
                        <br><br>
                        <?php echo"<a href='readmore.process.inc.php?report_id=$report_id'  class='btn btn-info w-100'>View Report</a>"; ?>
                    </div>
                </div>
            </div>
    <?php  }
    } else {
        echo "0 results";
    }
$con->close();
?>
</div>
