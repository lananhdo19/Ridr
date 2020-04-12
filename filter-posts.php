<!DOCTYPE html>
<html>
    <head>
        <title>Ridr: Filter Posts</title>
        <link type="text/css" rel="stylesheet" href="static/sidebar-formatting.css"/>
        <link type="text/css" rel="stylesheet" href="static/calendar.css"/>
        <?php include('php/filter.php'); ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    </head>

    <body>
    <form action="php/filter.php" method="post">
        <button class="openbtn" onclick="toggleMenu()">☰</button> 
        <div class="sidebar" id="filters">
            <!-- Date (calendar) -->
            <label class="header">Date</label><br>
            <input type="text" id="datepicker" name="date" value='<?php if(isset($_POST['date'])) echo $_POST['date']; ?>'>
            <script>
                $(document).ready(function () {
                    $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
                });
            </script>
        
            <!-- Time -->
            <label class="header">Time</label><br>
            <div id="time-container">
                <input type="time" id="from_time" name="from_time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
                to
                <input type="time" id="to_time" name="to_time" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
            </div>

            <!-- Destination (zipcode) -->
            <label class="header">Destination</label><br>
            <div id="destination-container">
                <input type="text" id="zipcode" name="zipcode" maxlength="5" pattern="[0-9]{5}" placeholder="zip code">
            </div>

            <!-- Apply -->
            <input type="submit" name="submit" class="main_button header" value="Submit">      
        </div>
    </form>

    <script>
        var datePickerOptions = {
        dateFormat: 'd/m/yy',
        firstDay: 1,
        changeMonth: true,
        changeYear: true
        }

        $(document).ready(function() {
            $('.datepicker').datepicker();
            $('#addInput').live('click', function(){
                $input = $('<input type="text" name="mydate[]" />').datepicker(datePickerOptions);
                $('<div>').html($input).appendTo($('#main'));
            });
        }); 
    </script>

    </body>

</html>
