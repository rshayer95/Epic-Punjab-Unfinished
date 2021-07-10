$(document).ready(function () {

    var user_count = 9;

    function getUsers(data, status) {
        if (status === "success") {
            $("#user_data").append(data);

            if ($("#user_data").children().length > 8) {
                $("#load-more").removeClass("hidden");

            }
        }
    }

    $.post("actions/users", {
        count: user_count
    }, function (data, status) {

        getUsers(data, status);
    }).always(function () {

        setInterval(function () {

            $("#user_data").load("actions/users", {
                count: user_count
            });

        }, 5000);
    });
    $("#load-more").click(function () {
        user_count = user_count + 9;
        $("#user_data").load("actions/users", {
            count: user_count
        });

    });
    $("#delete_user").click(function (e) {
        e.preventDefault();
        if (this.dataset.id !== "") {
            var id = this.dataset.id;
            var removecard = id.split("@")[0];

            //console.log(removecard);

            $.ajax({
                url: "actions/users",
                method: "POST",
                data: {
                    delete_id: this.dataset.id,
                    token: $("#token").val()
                },
                beforeSend: function () {
                    $("#delete_user").html('<i class="fas fa-circle-notch fa-spin" style="font-size: 24px; padding: 0"></i>');
                },
                success: function (data) {
                    $("#delete_user").html('Delete');
                    if (data === "success") {
                        $("#" + removecard).fadeOut(1100);
                        $("#popup").css({
                            display: "none"
                        });
                        $('html').css("overflow-y", "auto");

                    } else {
                        alert("There is some error.");
                    }

                },
                done: function () {
                    $("#delete_user").html('Delete');
                }

            });
        }
    });

});