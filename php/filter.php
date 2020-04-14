<?php
require('connectdb.php');
include('db-functions.php');
include('functions.php');

if(isset($_GET['submit'])){
    $date = $_GET['date'];
    $from_time = $_GET['from_time']; //time: 6:04pm->18:04
    $to_time = $_GET['to_time'];
    $zipcode = $_GET['zipcode'];
    
    //$sql = "SELECT * FROM post WHERE true";
    $sql = "DELETE FROM filtertable";
    $query = $db->prepare($sql);
    $query->execute();

    $sql = "INSERT INTO filtertable SELECT * FROM post WHERE true";
    $sql2 = "SELECT * FROM filtertable";

    /*may delete later
    if(isset($_GET['isDriverRider'])){  
        $isDriver = $_GET['isDriverRider']; 
        if($isDriver == "driver") {
            $sql .= " AND isDriver='0'";
        }
        if($isDriver == "rider") {
            $sql .= " AND isDriver='1'";
        }
    }else{
        $isDriver = "Something's wrong bro ";
    }*/
    
    if($date != "") {
        $sql .= " AND DATE(datetime)='$date'";
    }
    if($from_time != "" and $to_time != "") {
        $sql .= " AND TIME(datetime)>='$from_time' AND TIME(datetime)<='$to_time'";
    } 
    if($zipcode != "") {
        $sql .= " AND zipcode='$zipcode'";
    }

    $query = $db->prepare($sql);
    $query->execute();

    $query2 = $db->prepare($sql2);
    $query2->execute();

    $posts = $query2->fetchAll( PDO::FETCH_ASSOC ); 

?>

<div class="main">
    <div class="flex-container-wrap panels">
        <?php foreach ($posts as $post):  ?>
            <div class="post-listings" id="post-listings">
                <div class="panel panel-default">
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
                    </div>
                </div>
                <?php 
                    if ($post['isDriver'] == 0) 
                        echo '<button type="button" class="request_button subheader right-div-button">Take Ride</button>';
                    else
                        echo '<button type="button" class="offer_button subheader right-div-button">Give Ride</button>';
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
        <?php } ?>
