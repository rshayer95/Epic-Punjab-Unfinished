$(function () {
    var image_count = 9;

    //Helper Function To Print Data
    function getEvents(data, status) {
        if (status === "success") {

            $("#image_data").append(data);
            if ($("#image_data").children().length > 8) {
                $("#load-more").removeClass("hidden");
            }
        }
    }
    //Post Method to Get Limited Images 
    $.post("actions/gallery", {
        count: image_count
    }, function (data, status) {
        getEvents(data, status);
    }).always(function () {
        setInterval(function () {
            $("#image_data").load("actions/gallery", {
                count: image_count
            });

        }, 300000);
    });
    //Load More Events
    $("#load-more").click(function () {
        event_count = event_count + 9;
        $("#image_data").load("actions/gallery", {
            count: event_count
        });

    });

    function show_popup() {
        $("#addimage_popup").css({
            display: "flex"
        });
        $("#modal_body").css({
            'animation-play-state': "running"
        });
        $("#modal_body").css({
            '-webkit-animation-play-state': "running"
        });
        $('html').css("overflow-y", "hidden");
    }

    function close_popup() {
        $("#addimage_popup").css({
            display: "none"
        });
        $('html').css("overflow-y", "auto");
    }
    $("#show_addevent_popup").on("click", function () {
        show_popup();
    });

    //Close Popup
    $("#closePopup").on("click", function () {
        close_popup();
    });
    $("#addimage_popup").on("click", function (event) {
        var target = $(event.target);
        if (target.is("#addimage_popup")) {
            close_popup();
        }
        $("#modal_body").click(function (event) {
            event.stopPropagation();
        });
    });
});