<?php

session_start();
require('../php/connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $db;
    $mypost_ID;
    $theirpost_ID = $POST['post_ID'];
    $poster_email = $POST['email'];
    
    // If they have a post, save it
    if (!isset($_POST['donthavepost']))
        $mypost_ID = $_POST['mypost'];

    // If they don't have a post, create one
    if (isset($_POST['donthavepost'])) {
        createPost($theirpost_ID, $myemail);
        $mypost_ID = getMyPostID($theirpost_ID);
    }

    // the post creator is the rider, and the logged-in user is the driver offering to give the ride
    $myemail = $_SESSION['email'];
    $rider_email = $poster_email;
    $driver_email = $myemail;
    $riderpost_ID = $theirpost_ID;
    $driverpost_ID = $mypost_ID;

    // Insert into rider table and update post table
    insertData($mypost_ID, $rider_email, $driver_email);
    updateSeatsRiderTaken($mypost_ID, $theirpost_ID);

    // Clearing the form so it doesn't resubmit on page refresh
    echo "<meta http-equiv='refresh' content='0'>";  

    // Alert user and redirect
    echo 
    "<script>
        alert('You have successfully offered to give " . $rider_email . " a ride. 
            This has been saved in your dashboard.');
        // window.location.href='../posts.php';
    </script>";

}

function createPost($theirpost_ID, $myemail) {
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
    $statement->bindValue(':isDriver', 0);
    $statement->bindValue(':seats', $theirpost['seats']);
  
    $statement->execute();
    $statement->closeCursor();
}

function getMyPostID($theirpost_ID) {
    $query = "SELECT * FROM rides WHERE rider_post_ID=" . $theirpost_ID . " AND rider_email='" . $rider_email . "' AND driver_email='" . $driver_email . "'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

function insertData($mypost_ID, $theirpost_ID, $rider_email, $driver_email) {

    // Insert into db
    $query = "INSERT INTO rides (driver_post_ID, rider_post_ID, driver_email, rider_email) 
              VALUES (:driver_post_ID, :rider_post_ID :driver_email, :rider_email,)";
    $statement = $db->prepare($query);
    $statement->bindValue(':driver_post_ID', $mypost_ID);
    $statement->bindValue(':rider_post_ID', $theirpost_ID);
    $statement->bindValue(':rider_email', $rider_email);
    $statement->bindValue(':driver_email', $driver_email);
    $statement->execute();

    // Close the query I opened above
    $statement->closeCursor(); 
}

function updateSeatsRiderTaken($mypost_ID, $theirpost_ID) {
    $query = "UPDATE post SET seats_left=:seats WHERE post_ID=" . $mypost_ID;
    $statement = $db->prepare($query);
    $statement->bindValue(':seats_left', $seats_left); //decrement??
    $statement->execute();
    $statement->closeCursor();
 
    $query = "UPDATE post SET rideFound=:rideFound WHERE post_ID=" . $theirpost_ID;
    $statement = $db->prepare($query);
    $statement->bindValue(':rideFound', 0);
    $statement->execute();
    $statement->closeCursor();
}

?>