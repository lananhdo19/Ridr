

<!-- CREATE POST -->
<div class="main">
    <!-- The Modal -->
    <div id="which-post-modal-container" class="modal">
        <!-- Modal content -->
        <div class="which-post-modal-content">
            <span class="closeWP" id="close_which_form">&times;</span>
            <!-- Heading -->
            <p class="mega-header create-post-p" style="margin-bottom: 2rem;">Which post is this {request/offer} for?</p>
            <!-- Form Content -->
            <form class="subheader" action="" method="POST">
                <div class="flex-container-stretch">
                    <div class="cp-dropdown subheader gray" style="flex-grow: 3; margin-left: 0px;">
                        <select class="dropdown" id="isDriver" name="isDriver">
                            <option value="driver">Driver</option>
                            <option value="rider">Rider</option>
                        </select>
                    </div>
                </div>
                <!-- https://www.w3schools.com/js/js_validation.asp -->
                <button type="submit" value="Submit" id="create-post-submit" class="main_button header submit-button">Submit</button>
            </form>
        </div>
    </div>
</div>
