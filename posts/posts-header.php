<?php
    //sve img in our filepth
    //store filepth to profile pic in col of posts
    
    if ( (!isset($_SESSION['email'])) ) {
        echo "<script> var logged_in = false; </script>";
        // echo "<script>alert('Please log in first.');</script>";
        // header("Location: login-signup.html");
    }
    else 
        echo "<script> var logged_in = true; </script>";
   
?>
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
        <button type="submit" onclick='buttonClicked()' class="main_button header" id="create-post-button2">Create post</button>
        <button hidden type="button" id="create-post-button" name="create-post-button">Create post</button>
        <script>function buttonClicked(){
            console.log(logged_in); 
            if (!logged_in) { 
                alert('Please log in first.'); 
                window.location.href="login-signup.html"; 
            } 
            else {
                document.getElementById("create-post-button").click();
            }
        }</script>
    </div>
</div>