$(document).ready(function () {
    var post_count = 9;

    //Helper Function To Print Data
    function getEvents(data, status) {
        if (status === "success") {

            $("#post_data").append(data);
            if ($("#post_data").children().length > 8) {
                $("#load-more").removeClass("hidden");
            }
        }
    }
    //Post Method to Get Limited post
    $.post("posts", {
        count: post_count
    }, function (data, status) {
        getEvents(data, status);
    }).always(function () {
        setInterval(function () {
            $("#post_data").load("posts", {
                count: post_count
            });

        }, 10000);
    });
    //Load More post
    $("#load-more").click(function () {
        event_count = post_count + 9;
        $("#post_data").load("posts", {
            count: post_count
        });

    });


});