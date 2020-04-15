<?php if ($post['isDriver'] == 1) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-vertical-top" value="<?php echo $post['post_ID']; ?>">
                <img src="static/images/aesthetic-user-profile-img.png" class="profile-pic">
                <p class="normal-text" style="line-height: 1.25em !important;">
                    <span style="font-weight:500;">I'm riding</span>
                    <br/>
                    <?php 
                    if($post['rideFound']==0) {
                        $ride = getDriverFromRiderPostID($post['post_ID']);
                        echo "<span style='font-weight:500;'>Driver email: </span>";
                        echo $ride['driver_email'];
                        echo "<br/>";
                    }
                    echo "<br/>";
                    echo "<span style='font-weight:500;'>" . "Location:  " . "</span>" . $post['destination'];
                    echo "<br/>";
                    formatDateAndTime($post['datetime']);
                    echo "<br/>";
                    if ($post['comment'] != "") echo "<span style='font-weight:500;'>" . "Comments:  " . "</span>" . $post['comment'];
                    ?>
                </p>

                <span class="post_ID"" hidden>
                    <?php echo $post['post_ID']; ?>
                </span>
            </div>
            <?php if($post['rideFound']==0)
                echo '<button id="more-info" class="request_button request_button_hover subheader right-div-button">More Information</button>'
            ?>
        </div>
    </div>
    <br>
<?php } ?>
