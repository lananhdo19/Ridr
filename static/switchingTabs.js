$(document).ready(function() {
    $(".login-form").hide();
    $(".signUpTab").css("background", "#F06565");
    $(".signUpTab").css("color", "#FFF");

    $(".loginTab").click(function(){
        $(".signup-form").hide();
        $(".login-form").show();
        $(".signUpTab").css("background", "#FFF");
        $(".signUpTab").css("color", "black");
        $(".loginTab").css("background", "#F06565");
        $(".loginTab").css("color", "#FFF");
    });

    $(".signUpTab").click(function(){
        $(".login-form").hide();
        $(".signup-form").show();
        $(".loginTab").css("background", "#FFF");
        $(".loginTab").css("color", "black");
        $(".signUpTab").css("background", "#F06565");
        $(".signUpTab").css("color", "#FFF");
    });
});
