<?php 
if (isset($_GET['report_id'])) {
    $user = mysqli_real_escape_string($conn , $_GET['report_id']);
    $query = "SELECT * FROM report,p_user  WHERE report_id= '$user' ";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;

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

    if (mysqli_num_rows($run_query) > 0 ) {
    while ($row = mysqli_fetch_array($run_query)) {
    $id_number = $row['id_number'];


    $query1 = "SELECT * FROM report,p_user WHERE report.id_number = p_user.id_number";
    $run_query1 = mysqli_query($conn, $query1) or die(mysqli_error($conn)) ;
    if(mysqli_num_rows($run_query1) > 0 ) {
        while ($res = mysqli_fetch_array($run_query1)){

            $time = $row['date'];
            $date_reported =  time_elapsed_string($time); 
            $id_number = $res['id_number'];
            $location = $res['location'];
            $phone = $res['phone'];
            $title = $res['title'];
            $username = $res['username'];
            $address = $res['address'];
            $description = $res['description'];

        }
    }
    
}
}
else {
    $gender = "N/A";
    $joindate = "N/A";
<?php 
$id = $_GET['report_id'];
$sql = "SELECT * FROM comments WHERE report_id=$id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()){
    $name = $row['username'];
    $comment = $row['message'];
    $date = $row['post_date'];

    echo '<div class="panel">
        <span>@'.$name.'</span>
        <p>'.$comment.'</p>
        <span>'.$date.'</span>
    </div>';
    }
} else {
    echo ' <div class="container">
        <h3> 0 Comments </h3>
    </div>';
}
?>