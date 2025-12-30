$(function () {
    // For user Registration
    $("#registersubm").click(function () {
        var name = $("#name").val();
        var userName = $("#userName").val();
        var password = $("#password").val();
        var email = $("#email").val();

        if (!name || !userName || !password || !email) {
            alert("Please fill all fields");
            return false;
        }

        var dataString = 'name=' + name + '&userName=' + userName + '&password=' + password + '&email=' + email;
        $.ajax({
            type: "POST",
            url: "getregister.php",
            data: dataString,
            success: function (data) {
                $("#state").html(data);
            }
        });
        return false;
    });

    $("#loginsubm").click(function () {
        var email = $("#email").val();
        var password = $("#password").val();

        if (!email || !password) {
            $(".empty").removeClass('hidden').show();
            return false;
        }

        var dataString = 'email=' + email + '&password=' + password;
        $.ajax({
            type: "POST",
            url: "getlogin.php",
            data: dataString,
            success: function (data) {
                $(".empty, .disable, .error").addClass('hidden').hide();

                if ($.trim(data) == "empty") {
                    $(".empty").removeClass('hidden').fadeIn();
                } else if ($.trim(data) == "disable") {
                    $(".disable").removeClass('hidden').fadeIn();
                } else if ($.trim(data) == "error") {
                    $(".error").removeClass('hidden').fadeIn();
                } else {
                    window.location = "exam.php";
                }
            }
        });
        return false;
    });
});