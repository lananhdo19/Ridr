<<<<<<< HEAD
function smallFilterSize() {
    var element = document.getElementById("filters");
    element.classList.toggle("sidebar");

    element.style.width="20%";
    /*var elem = element.style.querySelector(".sidebar");
    var style = getComputedStyle(elem);
    element.style = style;*/

 }
=======
window.onresize = function() {
    var menu = document.getElementById("filters");
    if(window.innerWidth >= 940) {
        menu.style.display = "";
    }
};

function toggleMenu() {
    var menu = document.getElementById("filters");

    if(menu.style.display == 'block') {
        menu.style.display = 'none';
    }
    else {
        menu.style.display = 'block';
    }
}
>>>>>>> a0325320d1d9acbe947ec2d2b0dce1f51a703a9b
