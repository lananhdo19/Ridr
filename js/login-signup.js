//JS function switching between sign up/login tabs
$(document).ready(function() {
    $(".login-form").hide();
    $(".signUpTab").css("background", "#F06565");
    $(".signUpTab").css("color", "#FFF");

    $(".loginTab").click(function(){
        $(".signup-form").hide();
        $(".login-form").show();
        $("#emailLogin").focus();
        $(".signUpTab").css("background", "#FFF");
        $(".signUpTab").css("color", "black");
        $(".loginTab").css("background", "#F06565");
        $(".loginTab").css("color", "#FFF");
    });

    $(".signUpTab").click(function(){
        $(".login-form").hide();
        $(".signup-form").show();
        $("#firstName").focus();
        $(".loginTab").css("background", "#FFF");
        $(".loginTab").css("color", "black");
        $(".signUpTab").css("background", "#F06565");
        $(".signUpTab").css("color", "#FFF");
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
    checkEmailLogin();
    checkPassLogin();
}, false)

//signup button
let signup_btn = document.getElementById("signUpButton");
signup_btn.addEventListener('click', function(){
   checkEmailSign();
   checkName();
   checkPassSign();
}, false)




//check input functions
function checkName(){
    let name_msg  = document.getElementById("name-msg");
    if (firstName.value.length <= 0 || lastName.value.length <= 0 ) name_msg.textContent = "Enter a Full Name";
    else name_msg.textContent ="";
}


function checkEmailSign(){
    let email_msg = document.getElementById("email-msg");
    if (email_sign.value.length <= 0 || !email_sign.value.match("\\w+\\@\\w+\\.\\w+")) email_msg.textContent = "Enter a Valid Email";
    else email_msg.textContent = "";
};


function checkPassSign(){
    let pass_msg = document.getElementById("password-msg");
    if (pass_sign.value.length <= 0 || pass_sign.value.length < 8 ) pass_msg.textContent = "Enter a Password of at Least 8 Characters";
    else pass_msg.textContent = "";
};


function checkEmailLogin(){
    let email_msg = document.getElementById("email-msg-login");
    if (email_login.textContent.length <= 0 || !email_login.textContent.match("\\w+\\@\\w+\\.\\w+")) email_msg.textContent = "Enter a Valid Email";
    else email_msg.textContent = "";
};

function checkPassLogin(){
    let pass_msg = document.getElementById("pass-msg-login");
    if (pass_login.value.length <= 0 || pass_login.value.length < 8 ) pass_msg.textContent = "Enter a Password of at Least 8 Characters";
    else pass_msg.textContent = "";
};

