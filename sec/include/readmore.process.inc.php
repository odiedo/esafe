<?php
include ('conn.php');
?>
<html>

<?php 
if (isset($_GET['report_id'])) {
    $user = mysqli_real_escape_string($conn , $_GET['report_id']);
    $query = "SELECT * FROM report WHERE report_id= '$user' ";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
    if (mysqli_num_rows($run_query) > 0 ) {
    while ($row = mysqli_fetch_array($run_query)) {
    $date = $row['date'];
    $location = $row['location'];
    $phone = $row['phone'];
}
}
else {
    $gender = "N/A";
    $joindate = "N/A";
}

?>






    <font color= "brown" > Department: </font> <?php echo $location; ?>
    <br/>
    <font color= "brown" > Role: </font> <?php echo $phone; ?>
    <br/>
    <font color= "brown" > Gender: </font> <?php echo $date; ?>
</body>
</html>
<?php } else {
    header("location:../index.php");
    } ?>
