<?php 
$userposts = getUserPosts();
?>

<!-- WHICH POST -->
<div class="main">
    <!-- The Modal -->
    <div id="which-post-modal-container" class="modal text-center">
        <!-- Modal content -->
        <div class="which-post-modal-content">
            <span class="closeWP" id="close_which_form">&times;</span>
            <!-- Heading -->
            <p style="margin-bottom:0; font-size: 30px;">Which ride is this for?</p>
            <!-- Form Content -->
            <form class="subheader" action="<?php echo "posts/takegive.php" ?>" method="POST">
                <input type='hidden' id='which_button' name='which_button' value=''>
                <input type='hidden' id='theirpost_ID' name='theirpost_ID' value=''>
                <div class="which-form-input" style="margin: 40px 0;">
                <div class="flex-container-stretch">
                    <div class="cp-dropdown subheader gray" style="flex-grow: 3; margin: auto;">
                            <select class="dropdown" name="mypost" id="userPosts">
                                <?php 
                                    foreach ($userposts as $post) {
                                        if ( (notPast($post['datetime'])==true) )
                                            echo '<option value="'. $post['post_ID'] . '">' . $post['destination'] . ' on ' . formatDate($post['datetime']) . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="button_like_link" name="donthavepost">I don't have a post</button>
                </div>
                <button type="submit" value="Submit" id="create-post-submit" class="main_button header submit-button" style="margin: auto;">Submit</button>
            </form>
        </div>
    </div>
</div>
