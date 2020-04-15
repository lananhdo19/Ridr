<?php

include('php/db-functions.php');
include('php/functions.php');
$posts = getAllPosts();

?>

<div class="flex-container-wrap panels">
    <!-- Ride Listings -->
    <div class="post-listings" id="post-listings">
    <?php foreach ($posts as $post):  ?> <!-- iterating over each row in post table -->
            <!-- Listing -->
            <div class="panel panel-default">
            <?php //only display posts that haven't passed yet
                if ( notPast($post['datetime'])==true ) {
                    if ( (($post['isDriver']==0) && ($post['seats_left'] > 0)) || ( ($post['isDriver']==1) && ($post['rideFound']==1) ) ) { //if they're driver & has seats left or if they're rider and ride not found
            ?>
                <div class="panel-body">
                        <div class="panel-vertical-top" style="font-weight:400;">
                                <!-- <img class="profile-pic" src=
                                    <?php echo "'" . $post['profile-pic'] . "'"; ?>
                                > -->
                                <img src="static/images/sail.jfif" class="profile-pic">
                                <div class="normal-text">
                                    <p style="font-weight:500;">
                                        <?php
                                            if ($post['isDriver'] == 0) { echo "Giving a ride"; }
                                            else { echo "Looking for a ride"; }
                                        ?>
                                        <br/>
                                        <span style="color:darkgrey; font-size:14px;">
                                            <?php echo getUsername($post['email']); ?>
                                        </span>
                                    </p>

                                    <?php echo "<span style='font-weight:500;'>" . "Location:  " . "</span>" . $post['destination']; ?>
                                    <br/>
                                    <?php formatDateAndTime($post['datetime']); ?>
                                    <br/>
                                    <?php if ($post['comment'] != "") echo "<span style='font-weight:500;'>" . "Comments:  " . "</span>" . $post['comment']; ?>
                                </div>
                        </div>
                    <!-- Take/Give Ride Buttons -->
                    <?php 
                        if ($post['isDriver'] == 0) {
                            // echo '<form action="posts/which-post.php" method="post" class="takegive_form">';
                            echo '<input type="hidden" name="post_ID" value="' . $post['post_ID'] . '">';
                            echo '<input type="hidden" name="email" value="' . $post['email'] . '">';
                            echo '<button type="submit" onclick="buttonClickedT(' . isset($_SESSION['email']) . ", " . $post['post_ID'] . ')" class="request_button subheader right-div-button"  
                                          id="' . $post['post_ID'] . '">Take Ride</button>';

                            echo '<button hidden type="button" id="take-ride-button" name="take-ride-button">Take Ride</button>';
                            // echo '</form>';
                        }
                        else {
                            // echo '<form action="posts/which-post.php" method="post" class="takegive_form">';
                            echo '<input type="hidden" name="post_ID" value="' . $post['post_ID'] . '">';
                            echo '<input type="hidden" name="email" value="' . $post['email'] . '">';
                            echo '<button type="submit" onclick="buttonClickedG(' . isset($_SESSION['email']) . ", " . $post['post_ID'] . ')" class="offer_button subheader right-div-button"  
                                          id="' . $post['post_ID'] . '">Give Ride</button>';

                            echo '<button hidden type="button" id="give-ride-button" name="give-ride-button">Give Ride</button>';
                            // echo '</form>';
                        }
                    ?>
                </div>
                <?php } } ?>
            </div>
            <!-- Listing -->
        <?php endforeach; ?>
    </div>
</div>