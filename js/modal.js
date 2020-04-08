// Create post modal / popup
// Get the modal
var modal = document.getElementById("create-post-modal-container");
var btn = document.getElementById("create-post-button");
var span = document.getElementsByClassName("close")[0]; // <span> element closes the modal

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = (event) => {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
