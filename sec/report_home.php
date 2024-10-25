<?php
require 'include/conn.php';
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
?>
<div class="col-md-3">
    <div class="card card-primary card-outline bg-transparent border-info" style="border-radius: 21px">
        <div class="card-title text-light h5 text-center">
            <?php echo $title;?> @<?php echo $location;?>    
        </div>
        <div class="card-body text-right text-light" style="font-family:serif; font-style: italic;">
            <i class="fa fa-clock-o"></i>Reported: <?php echo $date_reported;?>
        </div><hr class="bg-light">
        <div class="card-footer">
            <form method="get" action="includes/readmore.process.inc.php">
                <input type="hidden" value="'.$row['report_id'].'" name="post-id">
                <button type="submit" class="btn btn-info w-100" name="report_id" id="'.$row['report_id'].'"  >View Report</button>
            </form>
        </div>
    </div>
</div>
<?php  }
} else {
echo "0 results";
}
$con->close();
?>