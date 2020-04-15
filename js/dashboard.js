
$(document).ready(function() {
    $(".expandedPost").hide();

    $("#more-info").on('click', function () {

        if ($(".expandedPost").is(":hidden")){
            $(".expandedPost").show();

            console.log("post_ID: " + $(this).attr('value'));

            $.ajax({url: "dashboard/expand-post.php",   type:"GET",
                data:{
                    post_ID: $(this).attr('value')
                },
                success: function(result){
                    $(".expandedPost").html(result);
        }});

        } else $(".expandedPost").hide();

    });

});

