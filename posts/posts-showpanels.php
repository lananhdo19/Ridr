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
            ?>
                <div class="panel-body">
                        <div class="panel-vertical-top" style="font-weight:400;">
                                <img 
                                src="<?php echo getProfilePic($post['email']) ?>"
                                class="profile-pic">
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
                            echo '<form action="posts/take-ride.php" method="post" class="takegive_form">';
                            echo '<input type="hidden" name="post_ID" value="' . $post['post_ID'] . '">';
                            echo '<input type="hidden" name="email" value="' . $post['email'] . '">';
                            echo '<button type="submit" class="request_button subheader right-div-button"  
                                          id="' . $post['post_ID'] . '">Take Ride</button>';
                            echo '</form>';
                        }
                        else {
                            echo '<form action="posts/give-ride.php" method="post" class="takegive_form">';
                            echo '<input type="hidden" name="post_ID" value="' . $post['post_ID'] . '">';
                            echo '<input type="hidden" name="email" value="' . $post['email'] . '">';
                            echo '<button type="submit" class="offer_button subheader right-div-button"  
                                          id="' . $post['post_ID'] . '">Give Ride</button>';
                            echo '</form>';
                        }
                    ?>
                </div>
                <?php } ?>
            </div>
            <!-- Listing -->
        <?php endforeach; ?>
    </div>
</div>
