<?php
require('connectdb.php');

if(isset($_GET['submit'])){
    session_start();

    $date = $_GET['date'];
    $from_time = $_GET['from_time']; //time: 6:04pm->18:04
    $to_time = $_GET['to_time'];
    $zipcode = $_GET['zipcode'];
    
    $sql = "SELECT * FROM post WHERE true";

    //not working correctly
    /*
    if(isset($_GET['isDriverRider'])){  
        $isDriver = $_GET['isDriverRider']; 
        if($isDriver == "driver") {
            $sql .= " AND isDriver='0'";
        }
        if($isDriver == "rider") {
            $sql .= " AND isDriver='1'";
        }
    }else{
        $isDriver = "Something's wrong bro ";
    }
    */
    if($date != "") {
        $sql .= " AND DATE(datetime)='$date'";
    }
    if($from_time != "" and $to_time != "") {
        $sql .= " AND TIME(datetime)>='$from_time' AND TIME(datetime)<='$to_time'";
    } 
    if($zipcode != "") {
        $sql .= " AND zipcode='$zipcode'";
    }
   
    $query = $db->prepare($sql);
    $query->execute();
    $results = $query->fetchAll( PDO::FETCH_ASSOC ); 

    print_r($results);  

    //http://localhost/Ridr/php/filter.php?date=2020-04-14&from_time=&to_time=&zipcode=&submit=Submit
    //http://localhost/Ridr/php/filter.php?date=2020-04-15&from_time=11%3A00&to_time=13%3A00&zipcode=22903&submit=Submit
    
    //header('Location: http://localhost/Ridr/posts.php?date=' .$date.'&from_time=&to_time=&zipcode=&submit=Submit'); 

    //what am I supposed to do with RESULTS?
    //how to get the filter url?????
    //how do i know what the filter url is supposed to be?   
    //should i filter back to posts.php? 

    
    
}

?>