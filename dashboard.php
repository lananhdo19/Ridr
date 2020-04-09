<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('base/doc-heading.html') ?>
    <title>Ridr: Dashboard</title>
    <link rel="stylesheet" href="static/dashboard.css"/>
    </head>
<body>

<?php include('base/header.html'); ?>

<!-- Row for Columns on Entire page -->
<div class="row">

    <!-- Personal Info Column displays your profile pic and name -->
    <div class="personalInfo col-3 ">
        <img class="profilePic-Dash" src="static/images/profilepic.png" href="#">
        <h3 class="name-dash">{Your name}</h3>
        <!-- <button type="button" class="main_button header" id="logout-button">Log out</button> -->
    </div>

    <!-- Column for past posts and requests -->
    <div class="history col-6">

        <div class="post-listings mainPost">
            <h2>Offers & Pending Requests</h2>
            <br>
            <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-vertical-top">
                    <img src="static/images/aesthetic-user-profile-img.png" class="profile-pic">
                    <p class="normal-text">
                        {{Destination}}<br/>
                        {{Date}}<br/>
                        {{Time}}<br/>
                        {{Comments}}
                    </p>
                </div>
                <button type="button" class="accept_button subheader right-div-button">Accept</button>
            </div>
            <br>
            <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-vertical-top">
                    <img src="static/images/aesthetic-user-profile-img.png" class="profile-pic">
                    <p class="normal-text">
                        {{Destination}}<br/>
                        {{Date}}<br/>
                        {{Time}}<br/>
                        {{Comments}}
                    </p>
                </div>
                <div class="request_pending subheader right-div-button">Request Pending</div>
            </div>

            <h2>Past Posts</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-vertical-top">
                        <img src="static/images/aesthetic-user-profile-img.png" class="profile-pic">
                        <p class="normal-text">
                            {{Destination}}<br/>
                            {{Date}}<br/>
                            {{Time}}<br/>
                            {{Comments}}
                        </p>
                    </div>
                    <button type="button" class="offer_button subheader right-div-button">Offer</button>
                </div>
            </div>
    </div>

    <!-- Column for information on a specifc post listing the riders -->
    <div class="expandedPostColumn col-3">
        <div class="expandedPostContainer">
                <div class="expandedPost">
                    <div class="expandedPost-Body">
                    <h4>Information about Post</h4>
                    <p>
                        {{Destination}}<br/>
                        {{Date}}<br/>
                        {{Time}}<br/>
                        {{Comments}}
                    </p>
                    </div>


                    <!-- Table for riders listing returned from database and edited by DOM JS -->
                    <table class="expandedPostRiders">
                        <tbody>
                            <tr>
                                <div class="riders-body">
                                    <hr>
                                    <p class="panel-p">
                                        {{Rider Name}}<br/>
                                        {{Rider Contact}}<br/>
                                        {{Comments}}
                                    </p>
                                </div>
                            </tr>
                            <tr>
                                <div class="riders-body">
                                    <hr>
                                    <p class="panel-p">
                                        {{Rider Name}}<br/>
                                        {{Rider Contact}}<br/>
                                        {{Comments}}
                                    </p>
                                </div>
                            </tr>
                            <tr>
                                <div class="riders-body">
                                    <hr>
                                    <p class="panel-p">
                                        {{Rider Name}}<br/>
                                        {{Rider Contact}}<br/>
                                        {{Comments}}
                                    </p>
                                </div>
                            </tr>
                            <tr>
                                <div class="riders-body">
                                    <hr>
                                    <p class="panel-p">
                                        {{Rider Name}}<br/>
                                        {{Rider Contact}}<br/>
                                        {{Comments}}
                                    </p>
                                </div>
                            </tr>
                            <tr>
                                <div class="riders-body">
                                    <hr>
                                    <p class="panel-p">
                                        {{Rider Name}}<br/>
                                        {{Rider Contact}}<br/>
                                        {{Comments}}
                                    </p>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>

    </div>


</div>


</body>

<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">

</script>
<script src="js/dashboard.js"></script>
</html>
