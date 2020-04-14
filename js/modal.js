// Create post modal
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


// Take ride modal
var modal_which = document.getElementById("which-post-modal-container");
var take = document.getElementById("take-ride-button");
var spanT = document.getElementsByClassName("close")[0]; // <span> element closes the modal
take.onclick = function() {
  modal_which.style.display = "block";
}
spanT.onclick = function() {
  modal_which.style.display = "none";
}
window.onclick = (event) => {
  if (event.target == modal) {
    modal_which.style.display = "none";
  }
}

// Give ride modal
var modal_which = document.getElementById("which-post-modal-container");
var give = document.getElementById("give-ride-button");
var spanG = document.getElementsById("close_which_form")[0]; // <span> element closes the modal
give.onclick = function() {
  modal_which.style.display = "block";
}
spanG.onclick = function() {
  modal_which.style.display = "none";
}
window.onclick = (event) => {
  if (event.target == modal) {
    modal_which.style.display = "none";
  }
}
