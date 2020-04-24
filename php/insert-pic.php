<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

require('connectdb.php');
include('db-functions.php');
include('functions.php');

session_start();
$email = $_GET['email'];
$color = $_GET['color'];
$color = substr($color, 1, -1); //removing "" around the color
$color_path = 'static/images/profilepic-' . $color . '.png';

if (ifProfilePicSet($email)) {
    $sql = "UPDATE profilepics SET color='" . $color_path . "' WHERE email='" . $email . "'";
    echo $sql;
    $query = $db->prepare($sql);
    $query->execute();
    $query->closeCursor();
}
else {
    $sql = "INSERT INTO profilepics VALUES ('" . $email . "','" . $color_path . "')";
    echo $sql;
    $query = $db->prepare($sql);
    $query->execute();
    $query->closeCursor();
}

?>
