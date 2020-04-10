<!-- Top Buttons-->
<div class="posts-right-top">
    <!-- I'm Looking For Driver/Rider BUTTON -->
    <div class="driver-rider-dropdown normal-text">
        <p class="header" style="margin: auto;">I'm looking for a</p>
        <select class="dropdown subheader im-looking-for-drpdn">
            <option value="driver">driver</option>
            <option value="rider">rider</option>
          </select>
    </div>
    <!-- Create Post Button -->
    <div class="create-post-button-div">
        <form action="" method="POST">
            <!-- <button type="button" class="main_button header" id="create-post-button">Create post</button> -->
            <button type="submit" class="main_button header" id="create-post-button" name="create-post-button">Create post</button>
        </form>       
    </div>
</div>

<?php
    if ( ($_SERVER['REQUEST_METHOD'] == "POST") && (!isset($_SESSION['email'])) )
        echo "<script>alert('Please log in first.');</script>";
        //redirect to login pg
?>