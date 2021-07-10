$(document).ready(function () {
    var event_count = 9;

    //Helper Function To Print Data
    function getEvents(data, status) {
        if (status === "success") {

            $("#upcoming_events").append(data);
            if ($("#upcoming_events").children().length > 8) {
                $("#load-more").removeClass("hidden");
            }
        }
    }
    //Get Today's Events
    $.get("today", function (data, status) {
        if (status === "success") {
            $("#todays_events").append(data);
        }
    }).always(function () {
        setInterval(function () {

            $.get("today", function (data, status) {
                if (status === "success") {
                    $("#todays_events").html("");
                    $("#todays_events").append(data);
                }
            })
        }, 10000)
    });
    //Post Method to Get Limited Events 
    $.post("upcomings", {
        count: event_count
    }, function (data, status) {
        getEvents(data, status);
    }).always(function () {
        setInterval(function () {
            $("#upcoming_events").load("upcomings", {
                count: event_count
            });

        }, 10000);
    });
    //Load More Events
    $("#load-more").click(function () {
        event_count = event_count + 9;
        $("#upcoming_events").load("upcomings", {
            count: event_count
        });

    });


});