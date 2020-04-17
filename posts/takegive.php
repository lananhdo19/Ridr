<?php

session_start();
require('../php/connectdb.php');
require('../php/db-functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['which_button'] == "take") {
        $which_button = "take";
        $mypost_ID;
        $theirpost_ID = $_POST['theirpost_ID'];
        $poster_email = getPostFromID($theirpost_ID)['email'];
        $myemail = $_SESSION['email'];
        $rider_email = $myemail;
        $driver_email = $poster_email;

        // If they have a post
        if (!isset($_POST['donthavepost'])) {
            $mypost_ID = $_POST['mypost'];

            /* Check if they're riding together. 
               If so, alert them and redirect.
               Then, exit the function
            */
            $rowCount = ridingTogether($mypost_ID, $theirpost_ID, $rider_email, $driver_email, $which_button);
            if ($rowCount > 0) {
                echo "<meta http-equiv='refresh' content='0'>";
                echo 
                "<script>
                    alert('You are already riding with " . $driver_email . 
                        ". Please check your dashboard for more information.');
                    // window.location.href='../posts.php';
                </script>";
                return 0;
            }
        }

        // If they don't have a post, create one
        else if (isset($_POST['donthavepost'])) {
            //create post (copy of their post) and save new post_ID 
            createPost($theirpost_ID, $myemail);
            // $mypost_ID = createPost($theirpost_ID, $myemail);
        }

        // the post creator is the driver, and the logged-in user is rider requesting to take the ride
        $riderpost_ID = $mypost_ID;
        $driverpost_ID = $theirpost_ID;

        // Insert into rider table and update post table
        insertRiders($mypost_ID, $theirpost_ID, $rider_email, $driver_email, $which_button);
        updateSeatsRiderTaken($mypost_ID, $theirpost_ID, $which_button);

        // Clearing the form so it doesn't resubmit on page refresh
        echo "<meta http-equiv='refresh' content='0'>";

        // Alert user and redirect
        echo 
        "<script>
            alert('You have successfully requested a ride from " . $driver_email . 
                ". This has been saved in your dashboard.');
            window.location.href='../posts.php';
        </script>";
    }
    else if ($_POST['which_button'] == "give") {
        $which_button = "give";
        $mypost_ID;
        $theirpost_ID = $_POST['theirpost_ID'];
        $poster_email = getPostFromID($theirpost_ID)['email'];
        
        // If they don't have a post, tell them to create one
        if (isset($_POST['donthavepost'])) {
            echo "<meta http-equiv='refresh' content='0'>";
            echo 
            "<script>
                alert('Please create a post first.');
                window.location.href='../posts.php';
            </script>";
        }

        // If they have a post, continue
        else {
            $mypost_ID = $_POST['mypost'];
            $myemail = $_SESSION['email'];

            // the post creator is the rider, and the logged-in user is the driver offering to give the ride
            $rider_email = $poster_email;
            $driver_email = $myemail;
            $riderpost_ID = $theirpost_ID;
            $driverpost_ID = $mypost_ID;

            /* Check if they're riding together. 
               If so, alert them and redirect.
               Then, exit the function
            */
            $rowCount = ridingTogether($mypost_ID, $theirpost_ID, $rider_email, $driver_email, $which_button);
            if ($rowCount > 0) {
                echo "<meta http-equiv='refresh' content='0'>";
                echo 
                "<script>
                    alert('You are already driving with " . $rider_email . 
                        ". Please check your dashboard for more information.');
                    window.location.href='../posts.php';
                </script>";
                return 0;
            }
    
            // Insert into rider table and update post table
            insertRiders($mypost_ID, $theirpost_ID, $rider_email, $driver_email, $which_button);
            updateSeatsRiderTaken($mypost_ID, $theirpost_ID, $which_button);

            // Clearing the form so it doesn't resubmit on page refresh
            echo "<meta http-equiv='refresh' content='0'>";  

            // Alert user and redirect
            echo 
            "<script>
                alert('You have successfully offered to give " . $rider_email . 
                    " a ride. This has been saved in your dashboard.');
                window.location.href='../posts.php';
            </script>";
        }
    }

}

function createPost($theirpost_ID, $myemail) {
    global $db;
    $theirpost = getPostFromID($theirpost_ID);

    // Inserting into db
    // INSERT INTO `post` (`email`, `destination`, `datetime`, `comment`, `zipcode`, `isDriver`) 
    $query = "INSERT INTO post (email, destination, datetime, comment, zipcode, isDriver, rideFound) 
              VALUES (:email, :destination, :datetime, :comment, :zipcode, :isDriver, :rideFound)";
    $statement = $db->prepare($query);

    $statement->bindValue(':email', $myemail);
    $statement->bindValue(':destination', $theirpost['destination']);
    $statement->bindValue(':datetime', $theirpost['datetime']);
    $statement->bindValue(':comment', $theirpost['comment']);
    $statement->bindValue(':zipcode', $theirpost['zipcode']);
    $statement->bindValue(':isDriver', 1);
    $statement->bindValue(':rideFound', 0);
    
    $statement->execute();

    // $mypost_ID = 'SELECT FROM post LAST_INSERT_ID()';
    // echo $mypost_ID;

    // $mypost_ID = mysql_insert_id();
    // echo $mypost_ID;

    $statement->closeCursor();
}

function ridingTogether($mypost_ID, $theirpost_ID, $rider_email, $driver_email, $which_button) {
    global $db;
    if ($which_button == "take") {
        $query = "SELECT * FROM rides WHERE rider_post_ID=" . $mypost_ID . " AND driver_post_ID=" . $theirpost_ID . " AND rider_email='" . $rider_email . "' AND driver_email='" . $driver_email . "'";
        $statement = $db->prepare($query);
        $statement->execute();
        $rowCount = $statement->rowCount(); 
        $statement->closeCursor();
        return $rowCount;
    }
    else {
        $query = "SELECT * FROM rides WHERE driver_post_ID=" . $mypost_ID . " AND rider_post_ID=" . $theirpost_ID . " AND rider_email='" . $rider_email . "' AND driver_email='" . $driver_email . "'";
        $statement = $db->prepare($query);
        $statement->execute();
        $rowCount = $statement->rowCount(); 
        $statement->closeCursor();
        return $rowCount;
    }
}

function insertRiders($mypost_ID, $theirpost_ID, $rider_email, $driver_email, $which_button) {
    global $db;

    // Insert into db
    $query = "INSERT INTO rides (driver_post_ID, rider_post_ID, driver_email, rider_email) 
            VALUES (:driver_post_ID, :rider_post_ID, :driver_email, :rider_email)";
        $statement = $db->prepare($query);
    if ($which_button == "take") {
        $statement->bindValue(':driver_post_ID', $theirpost_ID);
        $statement->bindValue(':rider_post_ID', $mypost_ID);
    }
    else {
        $statement->bindValue(':driver_post_ID', $mypost_ID);
        $statement->bindValue(':rider_post_ID', $theirpost_ID);
    }
    $statement->bindValue(':driver_email', $driver_email);
    $statement->bindValue(':rider_email', $rider_email);
    $statement->execute();

    // Close the query I opened above
    $statement->closeCursor(); 
}

function updateSeatsRiderTaken($mypost_ID, $theirpost_ID, $which_button) {
    global $db;

    if ($which_button == "take") {
        $query = "UPDATE post SET seats_left = seats_left - 1 WHERE post_ID=" . $theirpost_ID;
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    
        $query = "UPDATE post SET rideFound=:rideFound WHERE post_ID=" . $mypost_ID;
        $statement = $db->prepare($query);
        $statement->bindValue(':rideFound', 0);
        $statement->execute();
        $statement->closeCursor();
    }
    else {
        $query = "UPDATE post SET seats_left = seats_left - 1 WHERE post_ID=" . $mypost_ID;
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    
        $query = "UPDATE post SET rideFound=:rideFound WHERE post_ID=" . $theirpost_ID;
        $statement = $db->prepare($query);
        $statement->bindValue(':rideFound', 0);
        $statement->execute();
        $statement->closeCursor();
    }
}

?>