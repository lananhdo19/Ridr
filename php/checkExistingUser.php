<?php

require('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    global $db;

    $user = htmlspecialchars($_POST['email']);

    $query = "SELECT * FROM user WHERE email= '" . $user . "'" ;
    $statement = $db->prepare($query);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "Account Already Exists";
    }

    $statement->closeCursor();
}
