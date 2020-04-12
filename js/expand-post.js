
function expandPost(post_ID) {
    post_selected = document.getElementById(post_ID);
    expanded_post = document.getElementById("expandedPostColumn");
    console.log(post_selected);

    // if (expanded_post.style.display === "none") {
    //     expanded_post.style.display = "block";
    // } else {
    //     expanded_post.style.display = "none";
    // }

    jQuery.ajax({
        type: "POST",
        url: 'php/expand-post.php',
        data: { post_ID: post_ID },
        // dataType: 'json',
    
        success: function (obj, textstatus) {
            if( !('error' in obj) ) {
                someerror = obj.result;
                console.log("no error");
                console.log(data);
            }
            else
                console.log(obj.error);
        },
        error: function(xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        }
    });
}

$(document).ready(function() {
    expanded_post = document.getElementById("expandedPostColumn");
    expanded_post.style.display = "none";
    console.log(expand_post);

    expandPost(post_ID);

    // $(".panel.panel-default").click(function () {
    //     if ($(".expandedPost").is(":hidden"))
    //         $(".expandedPost").show();
    //     else 
    //         $(".expandedPost").hide();
    // });

});



// $( "#remove-button" ).click(function(event) {
//     event.preventDefault();
// });
// $( "#cancel-button" ).click(function(event) {
//     event.preventDefault();
// });