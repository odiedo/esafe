<?php
session_start();
require_once('../include/conn.php');
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM report where id_number = '$user' ORDER BY date DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    # code...
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
    while ($row = $result->fetch_assoc()) {
    $time = $row['date'];
    $date_reported =  time_elapsed_string($time); 
    $id_number = $row['id_number']; 
    $title = $row['title'];
    $description = $row['description'];
    $location = $row['location'];
    $address = $row['address'];
    $follow_up = $row['follow_up'];
?>
    <div class="row">
        <div class="col-md-12 text-info">
            <b>:: Follow-up Attempt</b> <small class="float-right text-warning"><?php echo $follow_up; ?></small><br>
            <b>:: Address</b> <small class="float-right text-warning"><?php echo $address; ?></small><br>
            <b>:: Location</b> <small class="float-right text-warning"><?php echo $location; ?></small><br>
            <b>:: Title</b> <small class="float-right text-danger"><?php echo $title; ?></small><br>
            <b>:: Reported Date</b> </b> <small class="float-right text-warning"><?php echo $date_reported; ?></small><br>
            <b>:: Description</b><small class="float-right text-light"><?php echo $description; ?></small><br>
        </div>
    </div>
    <div class="row">

    </div>
<?php
    }
}
?>