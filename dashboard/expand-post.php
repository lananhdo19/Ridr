<?php
    include ("../php/connectdb.php");
    include ('../php/db-functions.php');

    $post_ID = htmlspecialchars($_GET['post_ID']);
    $post = getPostFromID($post_ID);
    $riders = getRidersFromID($post_ID);
    $result = "";

    $result = "   <div class=\"expandedPost-Body\">
                    <h4>Post Information</h4>
                    <p>
                    " . $post['destination'] . " <br/>
                    " . substr($post['datetime'], 0 , 10) . " <br/>
                    " . substr($post['datetime'], 11) . " <br/>
                    " . $post['comment'] . "
                    </p>
                </div>
    ";

    $result.= "<table class=\"expandedPostRiders\">
               <tbody>
     ";

    foreach ($riders as $rider):

        $riderName = getNameFromEmail($rider["rider_email"]);

        $result.= "
    <tr>
    <div class=\"riders-body\">
                            <hr>
                            <p class=\"panel-p\">
                              " . $riderName[0] . " " . $riderName[1]  . "<br/>
                              " . $rider['rider_email'] . "<br/>
                            </p>
                        </div>
                    </tr>
        ";
    endforeach;

    $result.="
                </tbody>
                </table>";



    echo $result;



?>
