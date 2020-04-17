function buttonClickedT(logged_in, post_ID) {
    if (!logged_in) { 
        alert("Please log in first."); 
        window.location.href="login-signup.html"; 
    } 
    else {
        document.getElementById('which_button').value = "take";
        document.getElementById('theirpost_ID').value = post_ID;
        document.getElementById("take-ride-button").click();
    }
}

function buttonClickedG(logged_in, post_ID) {
    if (!logged_in) { 
        alert("Please log in first."); 
        window.location.href="login-signup.html"; 
    } 
    else {
        document.getElementById('which_button').value = "give";
        document.getElementById('theirpost_ID').value = post_ID;
        document.getElementById("give-ride-button").click();
    }
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) 
        return parts.pop().split(";").shift();
}