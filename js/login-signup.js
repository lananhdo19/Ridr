//JS function switching between sign up/login tabs
$(document).ready(function() {
    $(".signup-form").hide();
    $(".signupTab").css("color", "white");

    $(".loginTab").click(function(){
        $(".signup-form").hide();
        $(".login-form").show();
        $("#emailLogin").focus();
    });

    $(".signUpTab").click(function(){
        $(".login-form").hide();
        $(".signup-form").show();
        $("#firstName").focus();
    });
});


//Important page elements

//first name signup
let firstName = document.getElementById("firstName");

firstName.addEventListener('focus',function(){
    document.getElementById("name-msg").textContent = "";
},false);

//last name sign up
let lastName = document.getElementById("lastName");

lastName.addEventListener('focus',function(){
        document.getElementById("name-msg").textContent = "";
    }, false);

//email sign up
let email_sign = document.getElementById("emailSign");

email_sign.addEventListener('focus',function(){
    document.getElementById("email-msg").textContent = "";
}, false);

//password sign up
let pass_sign = document.getElementById("passwordSign");

pass_sign.addEventListener('focus',function(){
    document.getElementById("password-msg").textContent = "";
}, false);


//email login
let email_login = document.getElementById("emailLogin");

email_login.addEventListener('focus',function(){
    document.getElementById("email-msg-login").textContent = "";
},false);

//password login
let pass_login = document.getElementById("passwordLogin");

pass_login.addEventListener('focus',function(){
    document.getElementById("pass-msg-login").textContent = "";
},false);





//login button
let login_btn = document.getElementById("loginButton");
login_btn.addEventListener('click', function(){
    if (checkEmailLogin() && checkPassLogin()){
        login();
    }
}, false)







//signup button
let signup_btn = document.getElementById("signUpButton");
signup_btn.addEventListener('click', function(){
   if (checkEmailSign() && checkName() && checkPassSign())
   {
       checkExistingAndCreate();
   }

}, false)








//check input functions
function checkName(){
    let name_msg  = document.getElementById("name-msg");
    if (firstName.value.length <= 0 || lastName.value.length <= 0 ) {
        name_msg.textContent = "Enter a Full Name";
        return false;
    }
    else name_msg.textContent ="";
    return true;
}


function checkEmailSign(){
    let email_msg = document.getElementById("email-msg");
    if (email_sign.value.length <= 0 || !email_sign.value.match("\\w+\\@\\w+\\.\\w+")) {
        email_msg.textContent = "Enter a Valid Email";
        return false;
    }
    else email_msg.textContent = "";
    return true;
};


function checkPassSign(){
    let pass_msg = document.getElementById("password-msg");
    if (pass_sign.value.length <= 0 || pass_sign.value.length < 8 ) {
        pass_msg.textContent = "Enter a Password of at Least 8 Characters";
        return false;
    }
    else pass_msg.textContent = "";
    return true;
};


function checkEmailLogin(){
    let email_msg = document.getElementById("email-msg-login");
    if (email_login.value.length <= 0 || !email_login.value.match("\\w+\\@\\w+\\.\\w+")) {
        email_msg.textContent = "Enter a Valid Email";
        return false;
    }
    else email_msg.textContent = "";
    return true;
};

function checkPassLogin(){
    let pass_msg = document.getElementById("pass-msg-login");
    if (pass_login.value.length <= 0 || pass_login.value.length < 8 ) {
        pass_msg.textContent = "Enter a Password of at Least 8 Characters";
        return false;
    }
    else pass_msg.textContent = "";
    return true;
};


//login function AJAX with PHP
function login(){
    let xhrAccount = new XMLHttpRequest();
    xhrAccount.onload = function() {
        if (xhrAccount.responseText == "true") {
                window.location.href = "posts.php";
        }else {
                document.getElementById("email-msg-login").innerHTML = xhrAccount.responseText;
            }
        }

    xhrAccount.open('POST', 'php/login.php', true);
    xhrAccount.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrAccount.send("email=" + email_login.value + "&password=" + pass_login.value);
}


function checkExistingAndCreate(){
    let xhrAccount = new XMLHttpRequest();
    xhrAccount.onload = function() {
        if (xhrAccount.status == 200) {
            if (xhrAccount.responseText != "Account Already Exists") {
                createAccount();
            } else {
                document.getElementById("name-msg").innerHTML = xhrAccount.responseText;
            }
        }
    }

    xhrAccount.open('POST', 'php/checkExistingUser.php', true);
    xhrAccount.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrAccount.send("email=" + email_sign.value + "&password=" + pass_sign.value);
}


function createAccount(){
    console.log("creating account");
    let xhrAccount = new XMLHttpRequest();
    xhrAccount.onload = function() {
        if (xhrAccount.status == 200) {
                window.location.href = "posts.php";
        }
    }

    xhrAccount.open('POST', 'php/createAccount.php', true);
    xhrAccount.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrAccount.send("email=" + email_sign.value + "&password=" + pass_sign.value
                 + "&first_name=" + firstName.value  + "&last_name=" + lastName.value
    );
}
