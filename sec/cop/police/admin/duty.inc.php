<?php
session_start();
require_once('../include/conn.php');
$user = $_SESSION['id_number'];
$sql = "SELECT * FROM walk_map where id_number = '$user' ORDER BY walk_date DESC LIMIT 1";
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
    $time = $row['walk_date'];
    $date_reported =  time_elapsed_string($time); 
    $id_number = $row['id_number']; 
    $title = $row['walk_title'];
    $walk_code = $row['walk_code'];
    $start  = $row['start'];
    $destination  = $row['destination'];
    $zone = $row['zone'];
    $esafe = $row['esafe'];
?>

    <div class="row">
        <div class="col-md-12 text-info" style="font-family: agency fb;">
            :: Walk Title: <?php echo $title; ?><br>
            :: GPS Coordinates: <?php echo $start; ?><br>
            :: Destination <?php echo $destination; ?><br>
            ## Started <?php echo $date_reported; ?>
            ## Walk Title:<p class="text-warning" style="border: 1px solid yellow; padding: 5px 5px;" id="mr_robot"> <?php echo $title; ?></p>
            
        </div>
    </div>
    <div class="row">
        <form name='jarvis' id="jarvis"  action=" ">
            <input id="street" name="start" type="text" hidden>
        </form>
    </div>
    <?php
        $progress = $row['start'];
        $walk_time = date('Y-m-d H:i:s');
        $jql = "INSERT INTO walk_progress (id_number, walk_code, progress, walk_time)
        VALUES ('$id_number', '$walk_code', '$progress', '$walk_time')";

        if (mysqli_query($conn, $jql)) {
            echo "
            <script>
            </script>
            ";
        }
        else {
            echo "Error: " . $jql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<script>
window.onload=function(){
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        document.getElementById("street").value = "Geolocation is not supported by this browser.";
    }
} 
function showPosition(position) {
    document.getElementById("street").value = " " + position.coords.latitude + "," + position.coords.longitude;
}
function cancel(){
    var tag = document.getElementById('tag');
    tag.style.display = "none";
}
<script>
    var auto_refresh = setInterval(function(){ submitform(); }, 60000);
    function submitform(){
        document.getElementById("jarvis").submit();
    }
</script>