<?php global $post ?>

<div class="panel-vertical-top">
    <img src="static/images/aesthetic-user-profile-img.png" class="profile-pic">
    <p class="normal-text" style="line-height: 1.25em !important;">
        <?php 
            if($post['isDriver']==0) echo "<span style='color:red;'>Number of Riders: </span><br/>";
            if($post['isDriver']==1) echo "<span style='color:red;'>Driver: driver email</span><br/>";
            echo "<span style='font-weight:500;'>" . "Location:  " . "</span>" . $post['destination']; 
            echo "<br/>";
            formatDateAndTime($post['datetime']);
            echo "<br/>";
            if ($post['comment'] != "") echo "<span style='font-weight:500;'>" . "Comments:  " . "</span>" . $post['comment']; 
        ?>
    </p>
</div>