<?php
define("ROW_PER_PAGE",10);
    $database_username = 'root';
    $database_password = '';
    $pdo_conn = new PDO( 'mysql:host=localhost;dbname=crime_portal', $database_username, $database_password );
?>
<?php
    $search_keyword = '';
    if(!empty($_POST['search']['keyword'])) {
        $search_keyword = $_POST['search']['keyword'];
    }
    $sql = 'SELECT * FROM report WHERE location LIKE :keyword OR title LIKE :keyword  ORDER BY report_id DESC ';
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

    $query = $sql;
    $pdo_statement = $pdo_conn->prepare($query);
    $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();
?>
    <form name='frmSearch' action='' method='post'>
        <div style='text-align:right;margin:20px 0px;'>
            <input style='width: 100%;color: red; border-color: red;background-color: rgb(1,0,0);' type='text' name='search[keyword]' value="<?php echo "" .$search_keyword. ""; ?>" id='keyword' maxlength='25' placeholder='Search here...' >
        </div>
    </form>
    <?php
    if(!empty($result)) { 
        foreach($result as $row) {
            $time = $row['date'];
            $date_reported =  time_elapsed_string($time); 
    ?>

        <div class="card card-primary card-outline bg-transparent border-info border-left-0 border-right-0" style="height:150px; border:1px-solid; border-radius: 21px:">
            <div class="card-body text-left text-light" style="font-family:serif; font-style: italic;">
                <?php echo $row['title'];?> @ <?php echo $row['location']; ?><br>
                <i class="fa fa-clock-o" style="font-style:italic; font-size:12px">Reported: <?php echo $date_reported ;?></i>
                <br><br>
                <?php $report_id = $row['report_id']; echo"<a href='readmore.process.inc.php?report_id=$report_id'  class='btn btn-info w-100'>View Report</a>"; ?>
            </div>
        </div>
            <?php
                }
            }?>
        </tbody>
    </table>
    <hr style="background-color:white;">