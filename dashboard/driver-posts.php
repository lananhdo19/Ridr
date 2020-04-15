<?php if ($post['isDriver'] == 0) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-vertical-top" value="<?php echo $post['post_ID']; ?>">
                <img src="static/images/aesthetic-user-profile-img.png" class="profile-pic">
                <p class="normal-text" style="line-height: 1.25em !important;">
                    <span style="font-weight:500;">I'm driving</span>
                    <br/>
                    <span style="font-weight:500;">Riders: </span>
                    <?php echo getNumRidersFromID($post['post_ID']) ?>
                    <br/>
                    <span style="font-weight:500;">Seats: </span>
                    <?php echo $post['seats'] ?>
                    <br/><br/>
                    <?php
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
            <?php
                echo '<button id="more-info" class="offer_button offer_button_hover subheader right-div-button">More Information</button>'; 
            ?>
        </div>
    </div>
    <br>
<?php } ?>
