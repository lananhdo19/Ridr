<?php
if(isset($_GET['submit'])){
    $color = $_GET['color'];
    $email = $_GET['email']; 

    $sql = "UPDATE profilepics SET color=$color WHERE email=$email";

    $query = $db->prepare($sql);
    $query->execute();

    $posts = $query->fetchAll( PDO::FETCH_ASSOC );
}

?>