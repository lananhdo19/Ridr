<?php 

global $userposts;

foreach ($userposts as $post): //iterating over current posts
    if ( notPast($post['datetime'])==true ) { 
        include('driver-posts.php');
        include('rider-posts.php');
    }
endforeach; 

?>