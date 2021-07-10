$(document).ready(function () {

    //Disable Login Button Function
    function disable_submit_button() {
        $("#sendmessage-btn").attr('disabled', 'disabled');
        $('#sendmessage-btn').removeClass('primary');
    }
    //Enable Login Button
    function enable_submit_button() {
        $('#sendmessage-btn').removeAttr('disabled');
        $('#sendmessage-btn').addClass('primary');
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
    if ($("#sendmessage_form") !== undefined) {

        if ($("#email").val().length == 0 && $("#name").val().length == 0 && $("#message").val().length == 0) {
            //Disable Login Button 
            disable_submit_button();
        }
        if ($("#email").val().length > 3 && $("#name").val().length > 3 && $("#message").val().length > 3) {
            //enable Login Button 
            enable_submit_button();
        }

        //Handle USername KeyUp INput Handler Event
        //_________________________________________

        $("#email").keyup(function () {
            if ($(this).val().length == 0) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#email_icon'));
                input_error_msg($('#email_error'), "Please Enter Your Email");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal_focused($(this));
                turn_input_icon_to_normal_focused($('#email_icon'));
                remove_error_msg($('#email_error'));
            }

            if ($("#email").val().length > 3 && $("#name").val().length > 3 && $("#message").val().length > 3) {
                //enable Login Button 
                enable_submit_button();
            }
        });
        //Handle Username Blur Event
        //______________________________
        $("#email").blur(function () {
            if ($(this).val().length == 0) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#email_icon'));
                input_error_msg($('#email_error'), "Please Enter Your Email");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal($(this));
                turn_input_icon_to_normal_color($('#email_icon'));
                remove_error_msg($('#email_error'));
            }

            if ($("#email").val().length > 3 && $("#name").val().length > 3 && $("#message").val().length > 3) {
                //enable Login Button 
                enable_submit_button();
            }
        });

        //Handle Password Keyup Input Handler Event
        //__________________________________________

        $("#name").keyup(function () {
            if ($(this).val().length == 0) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#name_icon'));
                input_error_msg($('#name_error'), "Please Enter Your Full Name");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal_focused($(this));
                turn_input_icon_to_normal_focused($('#name_icon'));
                remove_error_msg($('#name_error'));
            } else if ($(this).val().length <= 3) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#name_icon'));
                input_error_msg($('#name_error'), "Please Enter Your Full Name");
            }

            if ($("#email").val().length > 3 && $("#name").val().length > 3 && $("#message").val().length > 3) {
                //enable Login Button 
                enable_submit_button();
            }
        });


        //Handle Password Blur Input Handler Event
        //_________________________________________

        $("#name").blur(function () {
            if ($(this).val().length == 0) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#name_icon'));
                input_error_msg($('#name_error'), "Please Enter Your Full Name");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal($(this));
                turn_input_icon_to_normal_color($('#name_icon'));
                remove_error_msg($('#name_error'));
            } else if ($(this).val().length <= 3) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#name_icon'));
                input_error_msg($('#name_error'), "Please Enter your Full Name");
            }

            if ($("#email").val().length > 3 && $("#name").val().length > 3 && $("#message").val().length > 3) {
                //enable Login Button 
                enable_submit_button();
            }
        });

        //Handle Password Blur Input Handler Event
        //_________________________________________

        $("#message").keyup(function () {
            if ($(this).val().length == 0) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#message_icon'));
                input_error_msg($('#message_error'), "Please Enter Your Message");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal($(this));
                turn_input_icon_to_normal_color($('#message_icon'));
                remove_error_msg($('#message_error'));
            } else if ($(this).val().length <= 3) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#message_icon'));
                input_error_msg($('#message_error'), "Please Enter your Message");
            }

            if ($("#email").val().length > 3 && $("#name").val().length > 3 && $("#message").val().length > 3) {
                //enable Login Button 
                enable_submit_button();
            }
        });

        //Handle Password Blur Input Handler Event
        //_________________________________________

        $("#message").blur(function () {
            if ($(this).val().length == 0) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#message_icon'));
                input_error_msg($('#message_error'), "Please Enter Your Message");
            } else if ($(this).val().length > 3) {
                turn_input_color_to_normal($(this));
                turn_input_icon_to_normal_color($('#message_icon'));
                remove_error_msg($('#message_error'));
            } else if ($(this).val().length <= 3) {
                disable_submit_button();
                turn_input_color_to_danger($(this));
                turn_input_icon_to_danger_color($('#message_icon'));
                input_error_msg($('#message_error'), "Please Enter your Message");
            }

            if ($("#email").val().length > 3 && $("#name").val().length > 3 && $("#message").val().length > 3) {
                //enable Login Button 
                enable_submit_button();
            }
        });

        function error_count() {
            if ($("#form_message").children().length >= 1) {
                $("#form_message").find("p.alert-message:first").remove();
            }
        }

        //HADNLE LOGIN PROCESS
        //_____________________
        //_____________________

        $("#sendmessage-btn").on("click", function (e) {
            e.preventDefault();
            $.ajax({
                url: window.location.href,
                method: "POST",
                // contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: $("#sendmessage_Form").serialize(),
                beforeSend: function () {
                    $("#sendmessage-btn").html('<i class="fas fa-circle-notch fa-spin" style="font-size: 24px;"></i>');
                },
                success: function (data) {
                    response = $.parseJSON(data);
                    $("#sendmessage-btn").html('<i class="fas fa-paper-plane m-0 mr-2 medium-font"></i>Send Message');
                    if (response.success) {
                        $("#email").val("");
                        $("#name").val("");
                        $("#message").val("");
                        if ($("#form_message").hasClass("danger-alert")) {
                            $("#form_message").removeClass("danger-alert");
                        }
                        error_count();
                        $("#form_message").addClass("alert success-alert");
                        $("#form_message").append("<p class='alert-message'>" + response.message + "</p>");

                        setTimeout(function () {
                            $("#form_message").html("");
                            $("#form_message").removeClass("alert success-alert");
                        }, 4000);
                    } else {
                        error_count();
                        var msg = "<p class='alert-message'>" + response.message + "</p>";
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append(msg);
                        setTimeout(function () {
                            $("#form_message").html("");
                            $("#form_message").removeClass("alert danger-alert");
                        }, 4000);
                    }






                },
                error: function (jqXHR, exception) {

                    if (jqXHR.status === 0) {
                        error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Not connect. Verify Network.</div>");


                    } else if (jqXHR.status == 404) {
                        error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Not connect. Verify Network.</div>");

                    } else if (jqXHR.status == 500) {
                        error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Internal Server Error [500].</div>");

                    } else if (exception === 'parsererror') {
                        error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Requested JSON parse failed.</div>");

                    } else if (exception === 'timeout') {
                        error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Time out error</div>");

                    } else if (exception === 'abort') {
                        error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Ajax request aborted.</div>");

                    } else {
                        error_count();
                        $("#form_message").addClass("alert danger-alert");
                        $("#form_message").append("<div class='alert-message'>Uncaught Error</div>");

                    }

                }

            });
            //END OF AJAX METHOD


        });
    }


});