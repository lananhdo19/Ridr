<?php
require('connectdb.php');

if(isset($_POST['submit'])){
    $from_time = $_POST['from_time'];
    $to_time = $_POST['to_time'];
    $sql = "AND DATE(datetime) BETWEEN '$from_time' AND '$to_time'";
    $query = mysqli_query($sql);
}

?>
