<!DOCTYPE html>
<html>
<head>
    <title>Ridr: Posts</title>
    <?php include('base/doc-heading.html') ?>
    <link type="text/css" rel="stylesheet" href="static/sidebar-formatting.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
</head>

<body>  

    <!-- HEADER -->
    <?php include('base/header.php'); ?>

    <!-- FILTERS -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <button class="openbtn" onclick="toggleMenu()">☰</button> 
        <div class="sidebar" id="filters">
            <!-- Date (calendar) -->
            <label class="header">Date</label><br>
            <input type="text" id="datepicker" name="date" value='<?php if(isset($_GET['date'])) echo $_GET['date']; ?>'>
        
            <!-- Time -->
            <label class="header">Time</label><br>
            <div id="time-container">
                <input type="time" id="from_time" name="from_time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
                to
                <input type="time" id="to_time" name="to_time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
            </div>

            <!-- Apply -->
            <input type="submit" name="submit" class="main_button header" value="Submit">      
        </div>
    </form>

    <!-- Connect to DB -->
    <?php require('php/connectdb.php'); ?>

    <!-- BODY -->
    <div class="main">
        <div class="posts-pg flex-container-stretch">
            <div class="posts-div" style="flex-grow: 5">
                <?php include('posts/posts-header.php') ?>
                <?php
                    if(isset($_GET['submit'])){
                        include('php/filter.php'); 
                    }
                    else {
                        include('posts/posts-showpanels.php');
                    }
                ?>  
            </div>
        </div>
        <?php if (isset($_SESSION['email'])) include('posts/create-post.php'); ?>
    </div>

    <!-- FOOTER -->
    <?php include('base/footer.html') ?>

    <?php include('base/bottom-scripts.html') ?>

    <script>
        $(document).ready(function () {
            $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>

</body>
</html>
