
<!-- CREATE POST -->
<div class="main">
    <!-- The Modal -->
    <div id="create-post-modal-container" class="modal">
        <!-- Modal content -->
       <div class="create-post-modal-content">
            <span class="close">&times;</span>
            <!-- Heading -->
            <p class="mega-header create-post-p" style="margin-bottom: 2rem;">Create Post</p>
            <!-- Form Content -->
            <form class="subheader" action="" method="POST">
                <!-- Input Fields -->
                <input required type="text" id="Destination" name="Destination" placeholder="Destination (e.g. Vienna)" class="gray">
                <input required type="date" id="Date" name="Date" placeholder="Date" value="<?php echo date('Y-m-d'); ?>"  class="gray">
                <input required type="time" id="Time" name="Time" placeholder="Time" value="12:00" class="gray">                    
                <input type="text" id="Comments" name="Comments" placeholder='Comments (e.g. "asking for $15")' class="gray">
                <!-- Zip + Dropdowns -->
                <div class="flex-container-stretch" style="margin-top: 10px;">
                    <div class="cp-dropdown subheader gray" style="flex-grow: 3; margin-left: 0px;">
                        <input required type="number" min="00501" max="99950"
                            id="zip-code" name="zip-code" placeholder="Zip code">
                    </div>
                    <div class="cp-dropdown subheader gray" style="flex-grow: 3">
                        <select class="dropdown" id="isDriver" name="isDriver">
                            <option value="driver">Driver</option>
                            <option value="rider">Rider</option>
                        </select>
                    </div>
                <div class="cp-dropdown subheader gray" style="flex-grow: 3; margin-right: 0px;">
                        <select required class="dropdown" id="seats" name="seats">
                            <option value="" selected="true" disabled="disabled">Seats</option>    
                            <option value="N/A">N/A</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>
                <!-- https://www.w3schools.com/js/js_validation.asp -->
                <button type="submit" value="Submit" id="create-post-submit" class="main_button header submit-button">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (
    !empty($_POST['Destination']) || !empty($_POST['Date']) || !empty($_POST['Time']) ||
    !empty($_POST['Comments']) || !empty($_POST['zip-code']) || !empty($_POST['cp-dropdown']) ) )
{    
    insertData();
}

function insertData() {

    // global $db

    $destination = $_POST['Destination'];
    $date = $_POST['Date']; // "12/01/2020" --> 2020-12-01 
    $time = $_POST['Time']; // "01:01 PM" --> 13:01,  01:01 AM --> 01:01 
    $comments = $_POST['Comments'];
    $zipcode = $_POST['zip-code'];
    $isDriver = $_POST['isDriver'];
    $seats = $_POST['seats'];

    if (strlen($zipcode)==3)
        $zipcode = "00" . $zipcode;
    else if (strlen($zipcode)==4)
        $zipcode = "0" . $zipcode;

    if ($isDriver == "driver") 
        $isDriver = 0;
    else
        $isDriver = 1;
    
    // 2020-04-11 08:00:00
    $datetime = $date . " " . $time . ":00";
    
    if ($seats == "N/A" || $isDriver==1)
        $seats = 0;
    else
        $seats = (int)$seats;


    // INSERT INTO `post` (`email`, `destination`, `datetime`, `comment`, `zipcode`, `isDriver`, `seats`) 
    $query = "INSERT INTO post (email, destination, datetime, comment, zipcode, isDriver, seats) 
              VALUES (:email, :destination, :datetime, :comment, :zipcode, :isDriver, :seats)";
    $statement = $db->prepare($query);

    $email = $_SESSION['user'];
   
    $statement->bindValue(':email', $email);
    $statement->bindValue(':destination', $destination);
    $statement->bindValue(':datetime', $datetime);
    $statement->bindValue(':comment', $comments);
    $statement->bindValue(':zipcode', $zipcode);
    $statement->bindValue(':isDriver', $isDriver);
    $statement->bindValue(':seats', $seats);
  
    $statement->execute();
    $statement->closeCursor();

}


?>