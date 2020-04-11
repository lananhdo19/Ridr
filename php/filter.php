<?php
require('connectdb.php');
global $db;

if(isset($_POST['submit'])){
    // reformat time?
    //$from_time = $_POST['from_time'];
    //$to_time = $_POST['to_time'];
    $zipcode = $_POST['zipcode'];

    $query = "SELECT * FROM post WHERE zipcode='$zipcode'";

    /*if($zipcode != "") {
        $query .= " zipcode='$zipcode'";
    }
    $query;*/
    $statement = $db->prepare($query);
    $statement->execute();

    //fetchAll() --> retrieve all rows
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
    

    //$query = "SELECT * FROM post WHERE TIME(datetime) >= '$from_time' AND TIME(datetime)<'$to_time' ORDER BY datetime DESC";
  

}

?>