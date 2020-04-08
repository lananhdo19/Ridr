<!-- https://stackoverflow.com/questions/49228464/how-to-prevent-the-modal-from-closing-after-submitting-form -->

target="_blank"
               
               
               target="<?php 
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && (
                                empty($_POST['Destination']) || empty($_POST['Date']) || empty($_POST['Time']) ||
                                empty($_POST['Comments']) || empty($_POST['zip-code']) || empty($_POST['cp-dropdown']) )
                                ) {
                                            echo '_blank';
                                }
                            ?>"











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
            <form class="subheader" action="php/create-post.php" method="POST">
                <input type="text" id="Destination" name="Destination" placeholder="Destination (e.g. Vienna)" class="gray">
                <span id="field-missing">
                    <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['Destination'])) 
                        echo "*This field is required."; 
                    ?>
                </span>
                
                <input type="date" id="Date" name="Date" placeholder="Date" value="<?php echo date('Y-m-d'); ?>"  class="gray">
                <span id="field-missing">
                    <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['Date'])) 
                        echo "*This field is required."; 
                    ?>
                </span>
                    
                    
                <input type="time" id="Time" name="Time" placeholder="Time" value="12:00" class="gray">
                <span id="field-missing">
                    <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['Time'])) 
                        echo "*This field is required."; 
                    ?>
                </span>
                    
                <input type="text" id="Comments" name="Comments" placeholder='Comments (e.g. "asking for $15")' class="gray">
                <span id="field-missing">
                    <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['Comments'])) 
                        echo "*This field is required."; 
                    ?>
                </span>
                    
                <!-- Zip + Dropdowns -->
                <div class="flex-container-stretch">
                    <div class="cp-dropdown subheader gray" style="flex-grow: 3; margin-left: 0px;">
                        <input type="number" id="zip-code" name="zip-code" placeholder="Zip code">
                    </div>
                    <div class="cp-dropdown subheader gray" style="flex-grow: 3">
                        <select class="dropdown" id="cp-dropdown">
                            <option value="driver">Driver</option>
                            <option value="rider">Rider</option>
                        </select>
                    </div>
                <div class="cp-dropdown subheader gray" style="flex-grow: 3; margin-right: 0px;">
                        <select class="dropdown" id="cp-dropdown" name="cp-dropdown">
                            <option selected="true" disabled="disabled">Seats</option>    
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
                <span id="field-missing">
                        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['zip-code'])) 
                            echo "*This field is required."; 
                        ?>
                </span>
                <span id="field-missing">
                    <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['cp-dropdown'])) 
                        echo "*This field is required."; 
                    ?>
                </span>
                <button type="submit" value="Submit" onclick="createPostOnSubmit()" id="create-post-submit" class="main_button header submit-button">Submit</button>
            </form>
        </div>
    </div>
</div>
                        