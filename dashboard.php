<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Lan Anh Do, Rebekah Kang, Zaeda Meherin">
    <meta name="description" content="Ridr - a rideshare website for college students">
    <title>Dashboard</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/base.css"/>
    <link rel="stylesheet" href="static/fonts.css" />
    <link rel="stylesheet" href="static/posts.css"/>
    <link rel="stylesheet" href="static/dashboard.css"/>
    <link rel="stylesheet" href="static/features.css" />
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
            <h2>Requests & Offers</h2>
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="static/images/aesthetic-user-profile-img.png" href="#" class="profile-pic">
                    <p class="panel-p">
                        {{Destination}}<br/>
                        {{Date}}<br/>
                        {{Time}}<br/>
                        {{Comments}}
                    </p>
                    <button type="button" class="request_button normal-text right-div-button">Request</button>
                </div>
            </div>

            <h2>Past Posts</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="static/images/aesthetic-user-profile-img.png" href="#" class="profile-pic">
                            <p class="panel-p">
                                {{Destination}}<br/>
                                {{Date}}<br/>
                                {{Time}}<br/>
                                {{Comments}}
                            </p>
                            <button type="button" class="request_button normal-text right-div-button">Request</button>
                        </div>
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
