<?php
    header('Content-Type: application/json');
    echo "entered expand-post";

    if( !isset($_POST['post_ID']) ) 
        echo 'No post ID!';


?>