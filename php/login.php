<?php
require('connectdb.php');

global $db;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $query = "Select * FROM user where email=:email";
    $statement = $db -> prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();

    if($statement->rowCount() > 0){
        $tuple = $statement->fetch();
        $pass = $tuple[1];

        if(password_verify($password, $pass)){
            echo "true";
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $tuple[2];
            $_SESSION['last_name'] =$tuple[3];
        }
        else{
            echo "Incorrect Password";
        }
    } else echo "Email Does Not Have Account";


    $statement->closeCursor();
}
