<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('base/doc-heading.html') ?>
    <title>Ridr: Dashboard</title>
    <link rel="stylesheet" href="static/dashboard.css"/>
    </head>
<body>

<?php include('base/header.php'); ?>

<?php if (isset($_SESSION['email'])) {

include('php/connectdb.php');
include('php/db-functions.php');
include('php/functions.php');
$userposts = getUserPosts();

?>

<!-- Row for Columns on Entire page -->
<div class="row">

    <!-- Personal Info Column displays your profile pic and name -->
    <div class="personalInfo col-3 ">
        <img class="profilePic-Dash" src="static/images/profilepic.png" href="#">
        <h2 class="name-dash">
            <?php
                if (isset($_SESSION['first_name']) ) echo $_SESSION['first_name'];
                if (isset($_SESSION['last_name']) ) echo " " . $_SESSION['last_name'];
            ?>
        </h2>
        <h5><?php if (isset($_SESSION['email']) ) echo $_SESSION['email'];?></h5>
        <br/>
        <br/>
        <br/>
    </div>

    <!-- Column for past posts and requests -->
    <div class="history col-6">
        <div class="post-listings mainPost">
            <h1 class="mega-header">Current Rides</h1>
            <br>
            <?php include('dashboard/current-posts.php') ?>
            <br>
            <h1 class="mega-header">Past Rides</h1>
            <br/>
            <?php include('dashboard/past-posts.php') ?>
        </div>
    </div>

    <!-- Column for information on a specifc post listing the riders -->
    <div class="expandedPostColumn col-3">
        <div class="expandedPostContainer">
            <div class="expandedPost">

            </div>

    </div>


</div>


</body>
</html>

<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">

</script>
<script src="js/dashboard.js"></script>

<?php
}
else {
    echo '<div style="text-align: center; padding: 30vh 0;">
            <h1>You are not logged in.</h1>
          </div>';
}
?>
