<?php

session_start();
require('../php/connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $db;

    // SETUP CORRECTLY
    if (!isset($_POST['donthavepost']))
        $mypost_ID = $_POST['mypost'];
    $theirpost_ID = $POST['post_ID'];
    $poster_email = $POST['email'];

    // the post creator is the driver, and the logged-in user is rider requesting to take the ride
    $myemail = $_SESSION['email'];
    $rider_email = $myemail;
    $driver_email = $poster_email;
    $riderpost_ID = $mypost_ID;
    $driverpost_ID = $theirpost_ID;

    if (!isset($_POST['donthavepost'])) {
        createPost($theirpost_ID);
        $mypost_ID = getMyPostID();
    }

    else
        insertData($mypost_ID, $rider_email, $driver_email);

        // Clearing the form so it doesn't resubmit on page refresh
        echo "<meta http-equiv='refresh' content='0'>";  
}

function createPost($theirpost_ID) {
    $theirpost = getPostFromID($ID);

    // Inserting into db
    // INSERT INTO `post` (`email`, `destination`, `datetime`, `comment`, `zipcode`, `isDriver`, `seats`) 
    $query = "INSERT INTO post (email, destination, datetime, comment, zipcode, isDriver, seats) 
              VALUES (:email, :destination, :datetime, :comment, :zipcode, :isDriver, :seats)";
    $statement = $db->prepare($query);
   
    $statement->bindValue(':email', $myemail);
    $statement->bindValue(':destination', $theirpost['destination']);
    $statement->bindValue(':datetime', $theirpost['datetime']);
    $statement->bindValue(':comment', $theirpost['comment']);
    $statement->bindValue(':zipcode', $theirpost['zipcode']);
    $statement->bindValue(':isDriver', 1);
    $statement->bindValue(':seats', $theirpost['seats']);
  
    $statement->execute();
    $statement->closeCursor();
}

function getMyPostID() {
    $query = "SELECT * FROM post WHERE post_ID=" . $ID;
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

function insertData($mypost_ID, $rider_email, $driver_email) {

    // Insert into db
    $query = "INSERT INTO rides (mypost_ID, rider_email, driver_email) VALUES (:mypost_ID, :rider_email, :driver_email)";
    $statement = $db->prepare($query);
    $statement->bindValue(':mypost_ID', $mypost_ID);
    $statement->bindValue(':rider_email', $rider_email);
    $statement->bindValue(':driver_email', $driver_email);
    $statement->execute();

    // Alert user and redirect
    echo 
    "<script>
        alert('You have successfully requested a ride from " . $driver_email . ".');
        // window.location.href='../posts.php';
    </script>";

    // Close the query I opened above
    $statement->closeCursor(); 
}

?>