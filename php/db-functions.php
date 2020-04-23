<?php

/* Returns all the posts in the post table */
function getAllPosts() {
    global $db;

    $query = "SELECT * FROM post"; //selecting all posts
    $statement = $db->prepare($query);
    $statement->execute();

    //fetchAll() --> retrieve all rows
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

    //fetchAll() --> retrieve all rows
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

    //fetchAll() --> retrieve all rows
    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

/*Returns riders based on post ID*/
function getRidersFromID($ID) {
    global $db;

    $query = "SELECT * FROM riders WHERE post_ID=" . $ID; //selecting user's posts
    $statement = $db->prepare($query);
    $statement->execute();

    //fetchAll() --> retrieve all rows
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function getNameFromEmail($ID){
    global $db;

    $query = "SELECT first_name, last_name FROM user WHERE email= '" . $ID . "'";
    $statement = $db->prepare($query);
    $statement->execute();
    //echo $query;
    //fetchAll() --> retrieve all rows
    $results = $statement->fetch();
    $statement->closeCursor();
    return $results;
}

/* Returns color from the profilepics table */
function getProfilePic($email) {
    global $db;

    $query = "SELECT * FROM profilepics WHERE email=" . $email;
    $statement = $db->prepare($query);
    $statement->execute();

    if ($statement->rowCount() == 1) {
        $results = $statement->fetch();
        return $results['color'];
    }

    $statement->closeCursor();
    return "static/images/profilepic-black";
}

?>
