<?php 

global $userposts;

foreach ($userposts as $post): //iterating over current posts
    if ( notPast($post['datetime'])==false ) { 
        include('driver-posts.php');
        include('rider-posts.php');
    }
endforeach; 

?>