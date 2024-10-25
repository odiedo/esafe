<?php
session_start();
require_once('../include/conn.php');
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM fire where id_number = '$user' ORDER BY date DESC LIMIT 1";
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
    $ambulance = 'N/A';
    $nfire = $row['nfire'];
    $location = $row['location'];
    $satisfied = $row['satisfied'];
    $attended = $row['attended'];
    $message = $row['description'];
?>
    <div class="row">
        <div class="col-md-12 text-info">
            <b>:: Ambulance Required</b> <small class="float-right text-warning"><?php echo $ambulance; ?></small><br>
            <b>:: Message</b> <small class="float-right text-danger"><?php echo $message; ?></small><br>
            <b>:: Fire Nature </b> <small class="float-right text-danger"><?php echo $nfire; ?></small><br>
            <b>:: Location</b> <small class="float-right text-danger"><?php echo $location; ?></small><br>
            <b>:: Reported Date</b> <small class="float-right text-warning"><?php echo $date_reported; ?></small><br>
            <b>:: Safe </b> <small class="float-right text-light"> <i class="fa fa-<?php echo $satisfied; ?>-circle-o text-warning h5"></i></small><hr class="bg-info">
            <b>:: Emergency Status</b> <small class="float-right progress-bar progress-bar-animated progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%; background-color:green; border-radius:21px;"><?php echo $attended; ?></small><br>
        </div>
    </div>
    <div class="row">

    </div>
<?php
    }
}
?>