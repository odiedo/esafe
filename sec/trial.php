<script src="https://unpkg.com/wavesurfer.js"></script>
<script>
$('.wave').each(function(){
    //Generate unic ud
    var id = '_' + Math.random().toString(36).substr(2, 9);
    var path = $(this).attr('data-path');

    //Set id to container
    $(this).find(".wave-container").attr("id", id);

    //Initialize WaveSurfer
    var wavesurfer = WaveSurfer.create({
        container: '#' + id,
        waveColor: 'red',
        progressColor: 'blue'
    });

    //Load audio file
    wavesurfer.load(path);

    //Add button event
    $(this).find("button").click(function(){
        wavesurfer.playPause();
    });
});
</script>



<section>
            <div class="container">
            <div class="row">
                <?php 
                    if(isset($_GET['search'])){
                        require 'includes/dbh.inc.php';
                    $search = $_GET['value'];
                    $sql = "SELECT * FROM reports WHERE location LIKE '$search%' ";
                    $result = $con->query($sql);

                    function time_elapsed_string($datetime, $full = false) {
                        $now = new DateTime;
                        $ago = new DateTime($datetime);
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
                            $time = $row['date_reported'];
                            $date_reported =  time_elapsed_string($time); 
                    
                            echo '<div class="col-md-12 col-lg-4">
                            <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h3 class="card-title">'.$row["title"].' @ '.$row['location'].'</h3>
                              <p>Reported: '.$date_reported.' </p>
                              <form method="get" action="includes/readmore.process.inc.php">
                              <input type="hidden" value="'.$row['id'].'" name="post-id">
                              <button type="submit" class="btn btn-danger" name="id" id="'.$row['id'].'"  >View Report</button>
                              </form>
                            </div>
                          </div>
                            </div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $con->close();
                    }else{
                        require 'includes/dbh.inc.php';
                    
                    $sql = "SELECT * FROM reports";
                    $result = $con->query($sql);

                    function time_elapsed_string($datetime, $full = false) {
                        $now = new DateTime;
                        $ago = new DateTime($datetime);
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
                            $time = $row['date_reported'];
                            $date_reported =  time_elapsed_string($time); 
                    
                            echo '<div class="col-md-12 col-lg-4" style="margin-top:20px">
                            <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h3 class="card-title">'.$row["title"].' @ '.$row['location'].'</h3>
                              <p>Reported: '.$date_reported.' </p>
                              <form method="get" action="includes/readmore.process.inc.php">
                              <input type="hidden" value="'.$row['id'].'" name="post-id">
                              <button type="submit" class="btn btn-danger" name="id" id="'.$row['id'].'"  >View Report</button>
                              </form>
                            </div>
                          </div>
                            </div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $con->close();
                    }
                    
                ?>
            </div>
            </div>
    </section>