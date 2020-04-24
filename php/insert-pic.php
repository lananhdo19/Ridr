<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');


$getdata = file_get_contents("php://input");
//echo $getdata;
$email = "sdfsafd";



//do sessions in angular for email????




$sql = "INSERT INTO profilepics VALUES (" . $email . "," . $getdata . ")";
echo $sql;
$query = $db->prepare($sql);
    $query->execute();
 //   $query->closeCursor();
//
 //  $posts = $query->fetchAll( PDO::FETCH_ASSOC );


//if( isset($_SESSION['email']) ) {
    //echo "session email exists";


    //$request = json_decode($getdata);

  //  $data = [];
   // foreach ($request as $k => $v) {
  //      $data[0]['get' . $k] = $v;
  //  }

    //send response in json back


//
    //$email = $_SESSION['email'];

    //echo $email;

//    $sql = "UPDATE profilepics SET color=$color WHERE email=$email";
//
//    $query = $db->prepare($sql);
//    $query->execute();
//
//    $posts = $query->fetchAll( PDO::FETCH_ASSOC );
//
//    header("Location: dashboard.php");
//}

?>
