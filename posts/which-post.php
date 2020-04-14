<?php 

$userposts = getUserPosts();

?>

<!-- WHICH POST -->
<div class="main">
    <!-- The Modal -->
    <div id="which-post-modal-container" class="modal">
        <!-- Modal content -->
        <div class="which-post-modal-content">
            <span class="closeWP" id="close_which_form">&times;</span>
            <!-- Heading -->
            <p class="mega-header text-center" style="margin-bottom: 2rem;">
                <?php echo $_COOKIE['which_button']; ?>
                <?php echo '<script>getCookie("which_button");</script>'; ?>
            </p>
            <!-- Form Content -->
            <form class="subheader" action="" method="POST">
            <p class="text-center" style="margin-bottom: 2rem;font-size: 30px;">Which ride is this for?</p>
                <div class="flex-container-stretch">
                <div class="cp-dropdown subheader gray" style="flex-grow: 3;">
                        <select class="dropdown" id="userPosts" name="userPosts">
                            <?php 
                                foreach ($userposts as $post) {
                                    echo '<option value="'. $post['post_ID'] .'">' . formatDate($post['datetime']) . ' on ' . $post['destination']. '</option>';
                                }
                                // formatDate($post['datetime'])
                                // echo " . '</option>'";
                            ?>
                        </select>
                    </div>
                </div>
                <!-- https://www.w3schools.com/js/js_validation.asp -->
                <a href="#" style="color:black">I don't have a post.</a>
                <button type="submit" value="Submit" id="create-post-submit" class="main_button header submit-button">Submit</button>
            </form>
        </div>
    </div>
</div>
