function buttonClickedT(logged_in) {
    if (!logged_in) { 
        alert("Please log in first."); 
        window.location.href="login-signup.html"; 
    } 
    else {
        document.cookie = "which_button=take";
        // document.cookie = "which_button=take; path=/; domain=.<?php echo $_SERVER['HTTP_HOST']; ?>";
        alert(getCookie('which_button'));
        document.getElementById("take-ride-button").click();
    }
}

function buttonClickedG(logged_in) {
    if (!logged_in) { 
        alert("Please log in first."); 
        window.location.href="login-signup.html"; 
    } 
    else {
        document.cookie = "which_button=give"
        alert(getCookie('which_button'));
        document.getElementById("give-ride-button").click();
    }
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) 
        return parts.pop().split(";").shift();
}