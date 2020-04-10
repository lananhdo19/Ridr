<!DOCTYPE html>
<html>
<head>
    <title>Ridr: Posts</title>
    <?php include('base/doc-heading.html') ?>
    <link type="text/css" rel="stylesheet" href="static/sidebar-formatting.css"/>
    <link type="text/css" rel="stylesheet" href="static/range-slider.css"/>
    <link type="text/css" rel="stylesheet" href="static/calendar.css"/>
</head>

<body>  

    <!-- HEADER -->
    <?php include('base/header.php'); ?>

    <!-- FILTERS -->
    <?php include('filter-posts.html') ?>

    <!-- Connect to DB -->
    <?php require('php/connectdb.php'); ?>

    <!-- BODY -->
    <div class="main">
        <div class="posts-pg flex-container-stretch">
            <div class="posts-div" style="flex-grow: 5">
                <?php include('posts/posts-header.html') ?>
                <?php include('posts/posts-showpanels.php') ?>
            </div>
        </div>
        <?php include('posts/create-post.php') ?>
    </div>

    <!-- FOOTER -->
    <?php include('base/footer.html') ?>

<?php include('base/bottom-scripts.html') ?>

</body>
</html>
