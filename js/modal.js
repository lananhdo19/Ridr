// Create post modal
// Get the modal
var modal_create = document.getElementById("create-post-modal-container");
var btn = document.getElementById("create-post-button");
var span = document.getElementsByClassName("closeCP")[0]; // <span> element closes the modal

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal_create.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal_create.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = (event) => {
  console.log("clicked");
  if (event.target == modal_create) {
    modal_create.style.display = "none";
  }
}


// Take ride modal
var modal_which = document.getElementById("which-post-modal-container");
var take = document.getElementById("take-ride-button");
var spanT = document.getElementsByClassName("closeWP")[0]; // <span> element closes the modal
take.onclick = function() {
  modal_which.style.display = "block";
}
spanT.onclick = function() {
  modal_which.style.display = "none";
}
window.onclick = (event) => {
  if (event.target == modal_which) {
    modal_which.style.display = "none";
  }
}

// Give ride modal
var modal_which = document.getElementById("which-post-modal-container");
var give = document.getElementById("give-ride-button");
var spanG = document.getElementsByClassName("closeWP")[0]; // <span> element closes the modal
give.onclick = function() {
  modal_which.style.display = "block";
}
spanG.onclick = function() {
  modal_which.style.display = "none";
}
window.onclick = (event) => {
  if (event.target == modal_which) {
    modal_which.style.display = "none";
  }
}
