
$(document).ready(function() {
    $(".expandedPost").hide();

    $(".panel.panel-default").click(function () {
        if ($(".expandedPost").is(":hidden")){
            $(".expandedPost").show();
        } else $(".expandedPost").hide();

    });

});
