<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

if( isset($_SESSION['email']) ) {
    echo "session email exists";

    $color = $_GET['color'];
    $email = $_SESSION['email']; 

    $sql = "UPDATE profilepics SET color=$color WHERE email=$email";

    $query = $db->prepare($sql);
    $query->execute();

    $posts = $query->fetchAll( PDO::FETCH_ASSOC );

    header("Location: dashboard.php");
}

?>