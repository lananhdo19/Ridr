<?php if ($post['isDriver'] == 1) { ?>
    <div class="panel panel-default pointer-cursor" id=<?php echo "'" . $post['post_ID'] . "'"; ?>
         onclick=<?php echo '"expandPost(' . "'" . $post['post_ID'] . "'" . ')"'; ?>  
    >
        <div class="panel-body">
            <?php include('panel-body.php'); ?>
            <?php 
                if (notPast($post['datetime'])==true) 
                    echo '<button class="request_button subheader right-div-button request_button_hover">Riding</button>';
            ?>
        </div>
    </div>
    <br>
<?php } ?>

<script src="js/expand-post.js"></script>