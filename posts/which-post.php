<?php 

session_start();
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
            <p class="mega-header" style="margin-bottom: 2rem;" id="testing">
                <script>console.log("localStorage: " + localStorage.getItem("which_button"))</script>
                <?php
                    if(isset($_POST) && !empty($_POST['which_button'])){
                        echo $_POST['which_button'];
                        exit();
                    }
                ?>

            </p>
            <p style="margin-bottom:0; font-size: 30px;">Which ride is this for?</p>
            <!-- Form Content -->
            <!-- if ($_COOKIE['which_button']=="take") echo "posts/take-ride.php"; elseif ($_COOKIE['which_button']=="give") echo "posts/give-ride.php"; -->
            <!-- if (getCookie('which_button')=="take") echo "posts/take-ride.php"; elseif (getCookie('which_button')=="give") echo "posts/give-ride.php"; -->
            <form class="subheader" action="<?php echo "posts/take-ride.php" ?>" method="POST">
                <div class="which-form-input" style="margin: 40px 0;">
                <div class="flex-container-stretch">
                    <div class="cp-dropdown subheader gray" style="flex-grow: 3; margin: auto;">
                            <select class="dropdown" name="mypost" id="userPosts">
                                <?php 
                                    foreach ($userposts as $post) {
                                        // if ($_COOKIE['which_button']=="take") $isDriver = 1; else $isDriver = 0;
                                        // if ( (notPast($post['datetime'])==true) && ($isDriver==$post['isDriver']) )
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
