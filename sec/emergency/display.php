<?php
if(!empty($_GET[‘wanted_id’])){
   include
    //Get image data from database
    $result = "SELECT image FROM criminal WHERE wanted_id = {$_GET['wanted_id']}";
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        //do nothing
    }
}
?>