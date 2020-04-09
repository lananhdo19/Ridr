<?php

require('php/connectdb.php');
session_start();

if(isset($_POST['apply']))
{

}
else {
    $query = "SELECT * FROM `post`";
    $search_result = filterPosts($query);
}

function filterPosts($query){
    $connect = 
    $filter_result = mysqli_query($connect, $query);
    return $filter_result;
}
?>