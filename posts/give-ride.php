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

    // the post creator is the driver, and the logged-in user is the driver offering to give the ride
    $myemail = $_SESSION['email'];
    $rider_email = $poster_email;
    $driver_email = $myemail;
    $riderpost_ID = $theirpost_ID;
    $driverpost_ID = $mypost_ID;

    if (!isset($_POST['donthavepost'])) {
        createPost($theirpost_ID);
        $mypost_ID = getMyPostID();
    }

    else
        insertData($mypost_ID, $rider_email, $driver_email);

    echo 
        "<script>
            alert('Please email " . $post_email . $post_email . " to give them a ride.');
            // window.location.href='../posts.php';
        </script>";

}


function getMyPostID() {
    
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
    $statement->bindValue(':isDriver', 0);
    $statement->bindValue(':seats', $theirpost['seats']);
  
    $statement->execute();
    $statement->closeCursor();
    
    //return mypost_ID
}


function insertData($mypost_ID, $theirpost_ID, $rider_email, $driver_email) {

    // Insert into db
    $query = "INSERT INTO rides (post_ID, rider_email, driver_email) VALUES (:post_ID, :rider_email, :driver_email)";
    $statement = $db->prepare($query);
    $statement->bindValue(':post_ID', $post_ID);
    $statement->bindValue(':rider_email', $rider_email);
    $statement->bindValue(':driver_email', $driver_email);
    $statement->execute();
    $statement->closeCursor();

    // Alert user and redirect
    echo 
    "<script>
        alert('You have successfully offered to give " . $rider_email . " a ride.');
        window.location.href='../posts.php';
    </script>";

    // Close the query I opened above
    $statement->closeCursor(); 
}

?>