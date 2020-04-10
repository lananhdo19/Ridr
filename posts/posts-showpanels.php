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
                <div class="panel-body">
                    <div class="panel-vertical-top">
                        <!-- <img class="profile-pic" src=
                            <?php echo "'" . $post['profile-pic'] . "'"; ?>
                        > -->
                        <img src="static/images/sail.jfif" class="profile-pic">
                        <div class="normal-text" style="line-height: 1.5em;">
                            <p style="color:darkgrey;"><?php echo $post['email']; ?></p>
                            <?php
                                if ($post['isDriver'] == 0) { echo "I'm offering a ride."; }
                                else { echo "I'm looking for a ride."; }
                            ?>
                            <br/>
                            Location: <?php echo $post['destination']; ?>
                            <br/>
                            <?php formatDateAndTime($post['datetime']); ?>
                            <br/>
                            <?php echo $post['comment']; ?>
                            <br/>
                        </div>
                    </div>
                    <button type="button" class="request_button subheader right-div-button">Request</button>
                </div>
            </div>
            <!-- Listing -->
        <?php endforeach; ?>
    </div>
</div>


<?php

function formatDateAndTime($datetime) {
    // 2020-04-11 08:00:00
    // $datetime = $date . " " . $time . ":00";
    $datetime_array = explode(" ", $datetime);
    $date = $datetime_array[0];
    $time = $datetime_array[1];
    $time = substr($time, 0, -3); //removes the :00 from time

    echo "Date:" . $date . "<br/>" . "Time: " . $time;
}

?>