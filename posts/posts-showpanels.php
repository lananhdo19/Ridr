<?php

function getAllTasks() {
    global $db;

    $query = "SELECT * FROM post"; //selecting all posts
    $statement = $db->prepare($query);
    $statement->execute();

    //fetchAll() --> retrieve all rows
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

$posts = getAllTasks();

?>

<div class="flex-container-wrap panels">
    <!-- Ride Listings -->
    <div class="post-listings" id="post-listings">
    <?php foreach ($posts as $post):  ?> <!-- iterating over each row in post table -->
            <!-- Listing -->
            <div class="panel panel-default">
                <?php //only display posts that haven't passed yet
                    $now = (new \DateTime());
                    $post_published = new DateTime($post['datetime']); //2020-04-11 08:00:00

                    if ( $now < $post_published ) {
                ?>
                <div class="panel-body">
                        <div class="panel-vertical-top" style="font-weight:400;">
                                <!-- <img class="profile-pic" src=
                                    <?php echo "'" . $post['profile-pic'] . "'"; ?>
                                > -->
                                <img src="static/images/sail.jfif" class="profile-pic">
                                <div class="normal-text" style="line-height: 1.5em;">
                                    <p style="font-weight:500;">
                                        <?php
                                            if ($post['isDriver'] == 0) { echo "Giving a ride"; }
                                            else { echo "Looking for a ride."; }
                                        ?>
                                        <br/>
                                        <span style="color:darkgrey; font-size:14px;">
                                            <?php echo $post['email']; ?>
                                        </span>
                                    </p>

                                    <?php echo "<span style='font-weight:500;'>" . "Location:  " . "</span>" . $post['destination']; ?>
                                    <br/>
                                    <?php formatDateAndTime($post['datetime']); ?>
                                    <br/>
                                    <?php if ($post['comment'] != "") echo "<span style='font-weight:500;'>" . "Additional Comments:  " . "</span>" . $post['comment']; ?>
                                </div>
                        </div>
                    <?php 
                        if ($post['isDriver'] == 0) 
                            echo '<button type="button" class="request_button subheader right-div-button">Take Ride</button>';
                        else
                            echo '<button type="button" class="offer_button subheader right-div-button">Give Ride</button>';
                    ?>
                </div>
                <?php } ?>
            </div>
            <!-- Listing -->
        <?php endforeach; ?>
    </div>
</div>


<?php

function formatDateAndTime($datetime) {
    // DO NOT CHANGE!! CHANGING ANY LINE OR ORDER OF LINES WILL MESS IT UP

    // 2020-04-11 08:00:00
    // $datetime = $date . " " . $time . ":00";
    $datetime_array = explode(" ", $datetime);
    
    $date_raw = $datetime_array[0];
    $date = date('F j, Y',strtotime($date_raw));
    $dayOfWeek = date("l", strtotime($date_raw));
    
    $time = $datetime_array[1];
    $time = substr($time, 0, -3); //removes the :00 from time

    $meridiem = "PM";
    if ($time < 12)
        $meridiem = "AM";
    
    $time_array = explode(":", $time);
    $hour = $time_array[0];
    $min = $time_array[1];

    if ($hour[0]=="0")  //removes the 0 from time if begins with 0 (e.g. 08:00)
        $hour = substr($hour,1);
    if ($hour == "0")   //hour 0 should be 12 (12AM)
        $hour = "12";
    if ($hour > 12)     //if hour > 13 (e.g. 13)
        $hour = (int)$hour - 12;
    $time = $hour . ":" . $min;

    echo "<span style='font-weight:500;'>" . "Date:  " . "</span>" . $dayOfWeek . ", " . $date . "<br/>" . "<span style='font-weight:500;'>" . "Time:  " . "</span>" . $time . $meridiem;
}

?>