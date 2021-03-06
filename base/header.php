<?php session_start(); ?>
<?php
if (isset($_SESSION['email'])) {
?>
    <link type="text/css" rel="stylesheet" href="static/navbar.css"/>

    <header>
        <nav class="navbar header" id="navbar">
            <!-- Left Side: Logo -->
            <div class="left_nav">
                <a class="ridr-logo" href="posts.php">
                    <img src="static/images/logoWhite.png" id="ridr-logo" class="d-inline-block align-top"
                         style="height:40px" onerror="this.style.display='none'">
                </a>
            </div>
            <!-- Right side: Posts, Login/Account -->
            <div class="right_nav">
                <div>
                    <a href="posts.php" class="subheader post_nav_item">Posts</a>
                </div>
                <div class="acc-dropdown">
                    <div class="acc-hover-div">
                        <a href="dashboard.php" class="subheader">
                            <span>Hi <?php if (isset($_SESSION['first_name']) ) echo $_SESSION['first_name'];?></span>
                            <img src="static/images/profilepic.png" href="#" width="42" height="42">
                        </a>
                    </div>
                    <div class="acc-dropdown-content subheader" style="text-align: left;">
                        <a href="dashboard.php">Dashboard</a>
                        <a href="php/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

<?php
}
else {
?>
    <link type="text/css" rel="stylesheet" href="static/navbar.css"/>

    <header>
        <nav class="navbar header" id="navbar">
            <!-- Left Side: Logo -->
            <div class="left_nav">
                <a class="ridr-logo" href="posts.php">
                    <img src="static/images/logoWhite.png" id="ridr-logo" class="d-inline-block align-top"
                        style="height:40px" onerror="this.style.display='none'">
                </a>
            </div>
            <!-- Right side: Posts, Login/Account -->
            <div class="right_nav">
                <div>
                    <a href="posts.html" class="subheader post_nav_item">Posts</a>
                </div>
                <div>
                    <a href="login-signup.html" class="subheader">Log In</a>
                </div>
            </div>
        </nav>
    </header>

<?php
}
?>