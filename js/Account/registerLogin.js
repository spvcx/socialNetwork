function ajaxLogin() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    $('#emailfeed').removeClass('has-error');
    $('#passwordfeed').removeClass('has-error');

    if (email && password) {

        $.ajax({
            method: "POST",
            url: 'reglogin.php',
            data: { login: 'login', email: email, password: password }
        }).done(function(data) {
            ndata = data.slice(1, data.length);
            switch (ndata) {
                case 'success':
                    location.href = 'http://spvcx.com';
                    break;
                default:
                    $('#emailfeed').addClass('has-error');
                    $('#passwordfeed').addClass('has-error');
                    $('.alert').removeClass('hidden');
                    $('.myalert').addClass('hidden');
                    break;
            }
        });
    } else {
        $(".myalert").removeClass('hidden');
    }
}


/*
$(function() {

    $('[data-toggle="tooltip"]').tooltip('toggle');
})
*/
var ready = true;
var emailready = true;

function emailChangeCheck() {
    var regmail = /^\w+@\w+\.\w{2,4}$/i;
    var v = document.getElementById('emaill').value;
    if (regmail.test(v)) {
        emailCheck(v);
    } else {
        ready = false;
    }
}

function emailCheck(e) {
    $.ajax({
        method: "POST",
        url: 'reglogin.php',
        data: { ajax: 'ajax', email: e }
    }).done(function(data) {
        ndata = data.slice(1, data.length);
        emailready = (ndata === '1') ? false : true;
        console.log('data email ' + ndata);
    });
}


function ajaxRegister(form) {
    var elems = form.elements;
    ready = true;
    var name = /[a-zA-Zа-яёА-ЯЁ]$/i;


    if (elems.password.value && elems.rpassword.value) {
        if (elems.password.value !== elems.rpassword.value) {
            ready = false;
            console.log('password match')
        }
    } else {
        console.log('minimum 1 symbol')
        ready = false;
    }
    if (!name.test(elems.firstname.value) || (!name.test(elems.lastname.value))) {
        console.log('name error');
        ready = false;
    }
    if (ready && emailready) {
        console.log('ready');
        $.ajax({
            method: "POST",
            url: 'reglogin.php',
            data: { createaccount: 'c', email: elems.email.value, password: elems.password.value, firstname: elems.firstname.value, lastname: elems.lastname.value, gender: elems.inlineRadioOptions.value }
        }).done(function(data) {
            location.href = 'http://spvcx.com';
        });

    } else console.log('mistakes');




}