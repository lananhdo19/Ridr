<?php

/* Returns all the posts in the post table */
function getAllPosts() {
    global $db;

    $query = "SELECT * FROM post"; //selecting all posts
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

/* Returns all posts of the logged in user */
function getUserPosts() {
    global $db;

    $query = "SELECT * FROM post WHERE email= '" . $_SESSION['email'] . "'"; //selecting user's posts
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

/*Returns specific post based on ID*/
function getPostFromID($ID) {
    global $db;

    $query = "SELECT * FROM post WHERE post_ID=" . $ID;
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

/*Returns riders based on post ID*/
function getRidersFromID($ID) {
    global $db;

    $query = "SELECT * FROM riders WHERE post_ID=" . $ID; 
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function getNameFromEmail($ID){
    global $db;

    $query = "SELECT first_name, last_name FROM user WHERE email= '" . $ID . "'";
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

/*Returns number of riders based on post ID*/
function getNumRidersFromID($ID) {
    global $db;

    $query = "SELECT * FROM riders WHERE driver_post_ID=" . $ID;
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closeCursor();
    return count($results);
}

/*Returns driver based on rider's post ID*/
function getDriverFromRiderPostID($rider_post_ID) {
    global $db;

    $query = "SELECT * FROM rides WHERE rider_post_ID=" . $rider_post_ID;
    $statement = $db->prepare($query);
    $statement->execute();

    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

?>
