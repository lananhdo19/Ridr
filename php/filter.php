<?php
require('connectdb.php');

if(isset($_GET['submit'])){
    $date = $_GET['date'];
    $from_time = $_GET['from_time']; //time: 6:04pm->18:04
    $to_time = $_GET['to_time'];
    $zipcode = $_GET['zipcode'];
    //rider/driver
    
    $sql = "SELECT * FROM post WHERE true";

    if($date != "") {
        $sql .= " AND DATE(datetime)='$date'";
    }
    if($from_time != "" and $to_time != "") {
        $sql .= " AND TIME(datetime)>='$from_time' AND TIME(datetime)<='$to_time' ORDER BY datetime DESC";
    } 
    if($zipcode != "") {
        $sql .= " AND zipcode='$zipcode'";
    }
    
    $query = $db->prepare($sql);
    $query->execute();
    $results = $query->fetchAll( PDO::FETCH_ASSOC ); 
    print_r($results);  
    
}

?>