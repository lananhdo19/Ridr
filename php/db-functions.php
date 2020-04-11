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

?>