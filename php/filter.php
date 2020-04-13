<?php
require('connectdb.php');

// include('posts/create-post.php'); this line causes the big pg gap bug

if(isset($_GET['submit'])){
    session_start();

    $date = $_GET['date'];
    $from_time = $_GET['from_time']; //time: 6:04pm->18:04
    $to_time = $_GET['to_time'];
    $zipcode = $_GET['zipcode'];
    $isDriver = $_GET['isDriverRider'];
    
    $sql = "SELECT * FROM post WHERE true";
    
    /*
    if($isDriver == "driver") {
        $sql .= " AND isDriver='0'";
    }
    if($isDriver == "rider") {
        $sql .= " AND isDriver='1'";
    }*/

    if(isset($_GET['isDriverRider'])){
        $isDriver = $_GET['isDriverRider']; 
    }else{
        $isDriver = "Something's wrong bro ";
    }

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
    
    //header('Location: Ridr/posts.php');
    print_r($results);  

    //make sure it doesn't give form resubmission on page refresh
    
}

?>