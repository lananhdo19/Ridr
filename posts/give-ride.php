<?php

session_start();
require('../php/connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $db;
    // the post creator is the driver, and the logged-in user is the driver offering to give the ride
    $rider_email = $_POST['email'];
    $driver_email = $_SESSION['email'];
    $post_ID = $_POST['post_ID'];

    /* Check if this user is already driving with this rider (post creator)
       This fetches the rows in the db where rider_email=$rider_email AND post_ID=$post_ID (entry already exists)
    */
    $query = "SELECT 1 FROM rides WHERE post_ID=" . $post_ID . " AND rider_email='" . $rider_email . "' AND driver_email='" . $driver_email . "'";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();

    // If so, alert the user and refresh
    if (count($results) == 1) {
        echo 
        "<script>
            alert('You are already driving ". $rider_email . "');
            window.location.href='../dashboard.php';
        </script>";
    }
    else {
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
    }

    // Clearing the form so it doesn't resubmit on page refresh
    unset ($post_ID, $rider_email, $driver_email);

    // Close the query I opened above
    $statement->closeCursor(); 

}


?>