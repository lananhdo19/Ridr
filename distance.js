var slider = document.getElementById("inputRange");
var sliderValue = document.getElementById("sliderValue");
sliderValue.innerHTML = slider.value;

slider.oninput = function() {
    sliderValue.innerHTML = this.value + " mi";
};     