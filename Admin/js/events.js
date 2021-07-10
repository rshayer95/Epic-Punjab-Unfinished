$(document).ready(function () {
    var event_count = 9;

    //Helper Function To Print Data
    function getEvents(data, status) {
        if (status === "success") {

            $("#event_data").append(data);
            if ($("#event_data").children().length > 8) {
                $("#load-more").removeClass("hidden");
            }
        }
    }
    //Post Method to Get Limited Events 
    $.post("actions/events", {
        count: event_count
    }, function (data, status) {
        getEvents(data, status);
    }).always(function () {
        setInterval(function () {
            $("#event_data").load("actions/events", {
                count: event_count
            });

        }, 300000);
    });
    //Load More Events
    $("#load-more").click(function () {
        event_count = event_count + 9;
        $("#event_data").load("actions/events", {
            count: event_count
        });

    });
    //Delete An Event
    $("#delete_event").click(function (e) {
        e.preventDefault();
        if (this.dataset.id !== "") {
            var original_id = this.dataset.id;
            var id = original_id.split("_")[1];
            $.ajax({
                url: "actions/events",
                method: "POST",
                data: {
                    delete_id: id,
                    token: $("#token").val()
                },
                beforeSend: function () {
                    $("#delete_event").html('<i class="fas fa-circle-notch fa-spin" style="font-size: 24px; padding: 0"></i>');
                },
                success: function (data) {
                    $("#delete_event").html('Delete');
                    if (data === "success") {
                        $("#" + original_id).fadeOut(1100);
                        $("#popup").css({
                            display: "none"
                        });
                        $('html').css("overflow-y", "auto");

                    } else {
                        alert("There is some error.");
                    }

                },
                done: function () {
                    $("#delete_event").html('Delete');
                }

            });
        }
    });
    //Toggle Add Event Container
    $("#show_addEventContainer").on("click", function () {
        $(".addevent-container").toggleClass("hidden");
        if ($(".addevent-container").hasClass("hidden")) {
            $("#show_addEventContainer").html('<i class="fas fa-plus"></i>');

        } else {
            $("#show_addEventContainer").html('<i class="fas fa-minus"></i>');
        }
    });
    var date = $("#date");
    var name = $("#name");
    var description = $("#description");
    //Add An Event
    $("#addEvent_Form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: e.target.action,
            method: "POST",
            data: $("#addEvent_Form").serialize(),
            beforeSend: function () {
                $("#addevent-btn").html('<i class="fas fa-circle-notch fa-spin" style="font-size: 24px; padding: 0"></i>');
            },
            success: function (data) {
                $("#addevent-btn").html('<i class="fas fa-plus m-0 mr-2 medium-font"></i>Add');
                if (data === "success") {
                    date.val("");
                    name.val("");
                    description.val("");
                    $("#form_message").addClass("alert success-alert");
                    $("#form_message").append("<p class='alert-message'>Added Successfully</p>");
                    $("#event_data").load("actions/events", {
                        count: event_count
                    });
                    setTimeout(function () {
                        $("#form_message").removeClass("alert success-alert");
                        $("#form_message").html("");
                    }, 3000);

                } else {
                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<p class='alert-message'>" + data + "</p>");
                    setTimeout(function () {
                        $("#form_message").removeClass("alert danger-alert");
                        $("#form_message").html("");
                    }, 3000);
                }

            },
            error: function (jqXHR, exception) {

                if (jqXHR.status === 0) {

                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<div class='alert-message'>Not connect. Verify Network.</div>");


                } else if (jqXHR.status == 404) {

                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<div class='alert-message'>Not connect. Verify Network.</div>");

                } else if (jqXHR.status == 500) {

                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<div class='alert-message'>Internal Server Error [500].</div>");

                } else if (exception === 'parsererror') {

                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<div class='alert-message'>Requested JSON parse failed.</div>");

                } else if (exception === 'timeout') {

                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<div class='alert-message'>Time out error</div>");

                } else if (exception === 'abort') {

                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<div class='alert-message'>Ajax request aborted.</div>");

                } else {

                    $("#form_message").addClass("alert danger-alert");
                    $("#form_message").append("<div class='alert-message'>Uncaught Error</div>");

                }

            },
            done: function () {
                $("#addevent-btn").html('<i class="fas fa-plus m-0 mr-2 medium-font"></i>Add');
                //event_count = event_count + 1;

            }

        });

    });

});