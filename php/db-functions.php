<?php

function getAllPosts() {
    global $db;

    $query = "SELECT * FROM post"; //selecting all posts
    $statement = $db->prepare($query);
    $statement->execute();

    //fetchAll() --> retrieve all rows
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function getUserPosts() {
    global $db;

    $query = "SELECT * FROM post WHERE email= '" . $_SESSION['email'] . "'"; //selecting user's posts
    $statement = $db->prepare($query);
    $statement->execute();

    //fetchAll() --> retrieve all rows
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function notPast($datetime) {
    $now = (new \DateTime());
    $datetime = new DateTime($datetime); //2020-04-11 08:00:00

    if ( $now < $datetime )
        return true;
    else
        return false;
}

function getUsername($email) {
    $email_split = explode("@",$email);
    return $email_split[0];
}

function formatDateAndTime($datetime) {
    // 2020-04-11 08:00:00
    // $datetime = $date . " " . $time . ":00";
    $datetime_array = explode(" ", $datetime);
    
    $date_raw = $datetime_array[0];
    $date = date('F j, Y',strtotime($date_raw));
    $dayOfWeek = date("l", strtotime($date_raw));
    
    $time = $datetime_array[1];
    $time = substr($time, 0, -3); //removes the :00 from time

    $meridiem = "PM";
    if ($time < 12)
        $meridiem = "AM";
    
    $time_array = explode(":", $time);
    $hour = $time_array[0];
    $min = $time_array[1];

    if ($hour[0]=="0")  //removes the 0 from time if begins with 0 (e.g. 08:00)
        $hour = substr($hour,1);
    if ($hour == "0")   //hour 0 should be 12 (12AM)
        $hour = "12";
    if ($hour > 12)     //if hour > 13 (e.g. 13)
        $hour = (int)$hour - 12;
    $time = $hour . ":" . $min;

    echo "<span style='font-weight:500;'>" . "Date:  " . "</span>" . $dayOfWeek . ", " . $date . "<br/>" . "<span style='font-weight:500;'>" . "Time:  " . "</span>" . $time . $meridiem;
}


?>