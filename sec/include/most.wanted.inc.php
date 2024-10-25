<br>
    <?php
    require 'conn.php';
    $sql = "SELECT * FROM most_wanted  ORDER BY date DESC LIMIT 3;";
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
            $ctitle = $row['ctitle'];
            $cname = $row['cname'];
            $crate = $row['crate'];
            $wanted_id = $row['wanted_id'];
            $filename = $row['filename'];

            ?>
            <div class="col-md-4 card bg-transparent" style="border:2px solid red;" id="wanted">
                <div class="card-header"><img src="cop/police/wanted/<?php echo $filename; ?>" class="img-responsive" style="width:100%; height:250px;"></div>
                <div class="card-body text-light">
                    <b class="text-info">Name: </b> <small class="float-right text-light"><?php echo $cname; ?></small><br>
                    <b class="text-info">Case: </b> <small class="float-right text-light"><?php echo $ctitle; ?></small><br>
                    <b class="text-info">Threat rate: </b> <small class="float-right text-light progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="<?php echo $crate; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $crate; ?>;"> 
                    <?php echo $crate; ?>% </small><br><br>
                    <div class="button btn btn-info w-100 emg" style="cursor:pointer; font-family:serif;"> anonymous report </div>
                </div>
            </div>
    <?php  }
    } else {
        echo "0 results";
    }
$con->close();
?>
