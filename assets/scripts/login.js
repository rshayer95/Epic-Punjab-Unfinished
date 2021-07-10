$(document).ready(function () {

    //Disable Login Button Function
    function disable_login_button() {
        $("#login-btn").attr('disabled', 'disabled');
        $('#login-btn').removeClass('primary');
    }
    //Enable Login Button
    function enable_login_button() {
        $('#login-btn').removeAttr('disabled');
        $('#login-btn').addClass('primary');
    }
    //Stylize Input Border and color When Validation Fails
    function turn_input_color_to_danger(input) {
        input.css('border', '1px solid #721c24');
        input.css('color', '#721c24');
    }
    //Normalize Input Border and color When Validation Successful
    function turn_input_color_to_normal(input) {
        input.css('border', '1px solid #e6e6e6');
        input.css('color', '#a1a1a1');
    }
    //Normalize Input Border and color When Validation Successful AnD Input is Still Focused
    function turn_input_color_to_normal_focused(input) {
        input.css('border', '1px solid #00e696');
        input.css('color', 'initial');
    }
    //Change Icon Color To Danger Color
    function turn_input_icon_to_danger_color(input_error_msg) {
        input_error_msg.css("color", "#721c24");
    }
    //Change Input Icon Color To Normal
    function turn_input_icon_to_normal_color(input_icon) {
        input_icon.css("color", "initial");

    }
    //Change Input Icon Color To Normal Adn Input Is Focused
    function turn_input_icon_to_normal_focused(input_icon) {
        input_icon.css("color", "#00e696");

    }
    //Create Function To Write Error Message
    function input_error_msg(input_error_msg, msg) {
        input_error_msg.addClass("alert");
        input_error_msg.addClass("danger-alert");
        input_error_msg.text(msg);
    }
    //Function To Remove The Input Error 
    function remove_error_msg(input_error_msg) {
        input_error_msg.removeClass("alert");
        input_error_msg.removeClass("danger-alert");
        input_error_msg.text("");
    }
    //Regex For Valid Username or Email
    function isValid(str) {
        return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?@ ]/g.test(str);
    }
    //Validate Login Form And Execute Login Query of Login Form
    //___________________________________________________________
    //___________________________________________________________
    if ($("#login-form") !== undefined) {

        if ($("#email").val().length == 0 && $("#password").val().length == 0) {
            //Disable Login Button 
            disable_login_button();
        }
        if ($("#email").val().length > 3 && $("#password").val().length > 3) {
            //enable Login Button 
            enable_login_button();
        }

        //Handle USername KeyUp INput Handler Event
        //_________________________________________

        $("#email").keyup(function () {
            if ($(this).val().length == 0) {
                disable_login_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#email_icon'));
                input_error_msg($('#email_error'), "Please Enter Your Email");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal_focused($(this));
                turn_input_icon_to_normal_focused($('#email_icon'));
                remove_error_msg($('#email_error'));
            }

            if ($("#email").val().length > 3 && $("#password").val().length > 3) {
                //enable Login Button 
                enable_login_button();
            }
        });
        //Handle Username Blur Event
        //______________________________
        $("#email").blur(function () {
            if ($(this).val().length == 0) {
                disable_login_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#email_icon'));
                input_error_msg($('#email_error'), "Please Enter Your Email");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal($(this));
                turn_input_icon_to_normal_color($('#email_icon'));
                remove_error_msg($('#email_error'));
            }

            if ($("#email").val().length > 3 && $("#password").val().length > 3) {
                //enable Login Button 
                enable_login_button();
            }
        });

        //Handle Password Keyup Input Handler Event
        //__________________________________________

        $("#password").keyup(function () {
            if ($(this).val().length == 0) {
                disable_login_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#pass_icon'));
                input_error_msg($('#password_error'), "Please Enter Your Password");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal_focused($(this));
                turn_input_icon_to_normal_focused($('#pass_icon'));
                remove_error_msg($('#password_error'));
            } else if ($(this).val().length <= 3) {
                disable_login_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#pass_icon'));
                input_error_msg($('#password_error'), "Please Enter Correct Password");
            }

            if ($("#email").val().length > 3 && $("#password").val().length > 3) {
                //enable Login Button 
                enable_login_button();
            }
        });


        //Handle Password Blur Input Handler Event
        //_________________________________________

        $("#password").blur(function () {
            if ($(this).val().length == 0) {
                disable_login_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#pass_icon'));
                input_error_msg($('#password_error'), "Please Enter Your Password");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal($(this));
                turn_input_icon_to_normal_color($('#pass_icon'));
                remove_error_msg($('#password_error'));
            } else if ($(this).val().length <= 3) {
                disable_login_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#pass_icon'));
                input_error_msg($('#password_error'), "Please Enter Correct Password");
            }

            if ($("#email").val().length > 3 && $("#password").val().length > 3) {
                //enable Login Button 
                enable_login_button();
            }
        });

        function login_error_count() {
            if ($("#form_message").children().length >= 1) {
                $("#form_message").find("p.alert-message:first").remove();
            }


        }

        //HADNLE LOGIN PROCESS
        //_____________________
        //_____________________

        $("#login-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: window.location.pathname,
                method: "POST",
                // contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: $(this).serialize(),
                beforeSend: function () {
                    $("#login-btn").html('<i class="fas fa-circle-notch fa-spin" style="font-size: 24px;"></i>');
                },
                success: function (data) {

                    response = $.parseJSON(data);
                    $("#login-btn").html("Login");
                    if (response.error) {
                        login_error_count();
                        turn_input_color_to_danger($("#password"));
                        turn_input_icon_to_danger_color($("#pass_icon"));
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<p class='alert-message'>" + response.message + "</p>");
                        setTimeout(function () {
                            $("#form_message").removeClass("alert danger-alert");
                            $("#form_message").html("");
                        }, 3000);



                    } else if (response.success) {
                        if ($("#form_message").hasClass("danger-alert")) {
                            $("#form_message").removeClass("danger-alert")
                        }
                        login_error_count();
                        $("#form_message").addClass("alert success-alert");
                        $("#form_message").append("<p class='alert-message'>" + response.message + "</p>");
                        $("#login-btn").html('<i class="fas fa-circle-notch fa-spin" style="font-size: 24px;"></i>');
                        setTimeout(function () {
                            var query = window.location.search.substring(1);
                            window.location = "../" + query + "/";
                        }, 500);
                    } else {
                        login_error_count();
                        var msg = "<p class='alert-message'>" + response.msg + "</p>";
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append(msg);
                    }

                },
                error: function (jqXHR, exception) {

                    if (jqXHR.status === 0) {
                        login_error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Not connect. Verify Network.</div>");


                    } else if (jqXHR.status == 404) {
                        login_error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Not connect. Verify Network.</div>");

                    } else if (jqXHR.status == 500) {
                        login_error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Internal Server Error [500].</div>");

                    } else if (exception === 'parsererror') {
                        login_error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Requested JSON parse failed.</div>");

                    } else if (exception === 'timeout') {
                        login_error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Time out error</div>");

                    } else if (exception === 'abort') {
                        login_error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Ajax request aborted.</div>");

                    } else {
                        login_error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Uncaught Error</div>");

                    }

                }

            });
            //END OF AJAX METHOD


        });
    }


});