<?php

require('connectdb.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $profile_img = $_POST['profile-img'];

    if($_FILES['profile-img']['name'])
    {
        $save_path="static/profile-imgs/"; // moving the image
        $myname = strtolower($_FILES['image']['tmp_name']); //You are renaming the file here
        move_uploaded_file($_FILES['image']['tmp_name'], $save_path.$myname); // Move the uploaded file to the desired folder
    }

    $inser_into_db="INSERT INTO `database`.`table` (`folder_name`, `file_name`) VALUES('$save_path', '$myname'))";


    $query = "INSERT INTO user VALUES (:email, :password, :first_name, :last_name)";
    $statement = $db -> prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $statement->closeCursor();

    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;

}
