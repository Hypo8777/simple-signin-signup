
$('.inputs > input').on('input', function () {
    $(this).val($(this).val().replace(/\s+/g, ''));
});
$('.popup').hide(); //* Our Popup hides by default

// ? When signin form validates a submit initiated
$('#signinform').on('submit', (e) => {
    e.preventDefault();
    let userinput_signin = {
        username: $('#inputusername').val(),
        password: $('#inputpassword').val()
    }
    $.ajax({
        type: "POST",
        url: "php/signin.php",
        data: userinput_signin,
        success: function (response) {
            console.count(response);
            var response = JSON.parse(response)
            $('.popup').show();
            if (response.status !== 0) {
                $('.popup').text(response.msg);
                $('.popup').addClass('popup-success');
                $('.popup').removeClass('popup-fail');
            } else {
                $('.popup').text(response.msg);
                $('.popup').removeClass('popup-success');
                $('.popup').addClass('popup-fail');
            }
        }
    });

});




$('#signupform').on('submit', (e) => {
    e.preventDefault();
    let signup_inputs = {
        username: $('#inputusernameC').val(),
        password: $('#inputpasswordC').val()
    }
    $.ajax({
        type: "POST",
        url: "php/signup.php",
        data: signup_inputs,
        success: function (response) {
            console.count(response);
            var response = JSON.parse(response);
            $('.popup').show();
            if (response.status !== 0) {
                $('.popup').text(response.msg);
                $('.popup').addClass('popup-success');
                $('.popup').removeClass('popup-fail');
            } else {
                $('.popup').text(response.msg);
                $('.popup').removeClass('popup-success');
                $('.popup').addClass('popup-fail');
            }
        }
    });
});


