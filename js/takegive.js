function buttonClickedT(logged_in, post_ID) {
    if (!logged_in) { 
        alert("Please log in first."); 
        window.location.href="login-signup.html"; 
    } 
    else {
        localStorage.setItem("which_button", "take");
        document.getElementById("testing").innerHTML = sessionStorage.getItem("which_button");
        // document.cookie = "which_button=take";
        // document.cookie = "post_ID=" + post_ID;
        // alert(getCookie('which_button'));
        document.getElementById("take-ride-button").click();

        // https://stackoverflow.com/questions/48219861/how-to-get-javascript-value-into-php-variable-without-reloading-the-page-using-a
        $.ajax({
            type: 'post',
            url: "posts/which-post.php",
            data: {'which_button' : "take", 'post_ID': post_ID}, //$("#frmsbmt").serialize(), //form serialize will send all the data to the server side in json formate, so there is no need to send data seperately.
            success: function( data ) {
                console.log(data);
                alert(data);
            }
        });
    }
}

function buttonClickedG(logged_in, post_ID) {
    if (!logged_in) { 
        alert("Please log in first."); 
        window.location.href="login-signup.html"; 
    } 
    else {
        localStorage.setItem("which_button", "take");
        document.getElementById("testing").innerHTML = sessionStorage.getItem("which_button");
        // document.cookie = "which_button=give";
        // document.cookie = "post_ID=" + post_ID;
        // alert(getCookie('which_button'));
        document.getElementById("give-ride-button").click();
    }
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) 
        return parts.pop().split(";").shift();
}