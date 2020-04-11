<!DOCTYPE html>
<html>
    <head>
        <title>Ridr: Filter Posts</title>
        <link type="text/css" rel="stylesheet" href="static/sidebar-formatting.css"/>
        <link type="text/css" rel="stylesheet" href="static/range-slider.css"/>
        <link type="text/css" rel="stylesheet" href="static/calendar.css"/>
        <?php include('php/filter.php'); ?>
    </head>

    <body>
    <form action="php/filter.php" method="get">
        <button class="openbtn" onclick="toggleMenu()">☰</button> 
        <div class="sidebar" id="filters">
            <!-- Date (calendar) -->
            <label style="margin-top: 20px" class="header" id="date">Date</label><br>
            <div id="calendar-container">
                <div id="calendar-header">
                    <span id="calendar-month-year"></span>
                    <a id="btnPrevMonth" href="javascript:void(0)"><span> < </span></a>
                    <a id="btnNextMonth" href="javascript:void(0)"><span> > </span></a>
                </div>
                <div id="calendar-dates"></div>
            </div>

            <!-- Time -->
            <label class="header">Time</label><br>
            <div id="time-container">
                <input type="time" id="from_time" name="from_time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
                to
                <input type="time" id="to_time" name="to_time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
            </div>

            <!-- Destination -->
            <label class="header">Destination</label><br>
            <div id="destination-container">
                <input type="text" id="zipcode" maxlength="5" pattern="[0-9]{5}" placeholder="zip code">
            </div>

            <!-- Distance -->
            <label class="header">Distance</label><br>
            <form class="range-slider">  
                0 mi <input type="range" id="inputRange" value="0"> 100 mi
                <p>Value: <span id="sliderValue"></span></p>
            </form>

            <!-- Apply -->
            <input type="submit" class="main_button header" name="submit" value="Apply">    
        </div>
    </form>
    </body>

</html>
