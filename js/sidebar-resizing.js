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
