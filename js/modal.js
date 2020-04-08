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


// $("#create-post-submit").submit(function(event){
//   event.preventDefault();

//   var Destination = document.getElementById('Destination');
//   var Date = document.getElementById('Date');
//   var Time = document.getElementById('Time');
//   var zipcode = document.getElementById('zip-code');
//   var seats = document.getElementByClassName('seats');

//   if(Destination.value.length == 0) {
//     event.preventDefault();
//     document.getElementsById("field-missing-dest").innerHTML = "This field is required";
//   }  
//   if(Date.value.length == 0) {
//     event.preventDefault();
//     document.getElementsById("field-missing-date").innerHTML = "This field is required";
//   }
//   if(Time.value.length == 0) {
//     event.preventDefault();
//     document.getElementsById("field-missing-time").innerHTML = "This field is required";
//   }
//   if(zipcode.value.length == 0) {
//     event.preventDefault();
//     document.getElementsById("field-missing-zip").innerHTML = "This field is required";
//   }
//   if(seats.value.length == 0) {
//     event.preventDefault();
//     document.getElementsById("field-missing-seats").innerHTML = "This field is required";
//   }

//   // Zipcode must be composed of only numbers
//   [...zipcode.value].forEach(char => { // use the spread operator to expand the string (e.g. "00350") into an iterable and iterate over each character
//     if (!isInteger(char)) {
//       event.preventDefault();
//       document.getElementsById("field-missing-zip").innerHTML = "Zipcode is invalid";
//     }
//   });

// })
