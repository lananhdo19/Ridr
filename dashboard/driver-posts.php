<?php if ($post['isDriver'] == 0) { ?>
    <div class="panel panel-default pointer-cursor" id=<?php echo "'" . $post['post_ID'] . "'"; ?> >
        <div class="panel-body">
            <?php include('panel-body.php'); ?>
            <?php 
                if (notPast($post['datetime'])==true) 
                    echo '<button class="offer_button subheader right-div-button offer_button_hover">Driving</button>'; 
            ?>
        </div>
    </div>
    <br>
<?php } ?>