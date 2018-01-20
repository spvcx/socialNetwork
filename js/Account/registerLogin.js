let haveError = false;

function ajaxLogin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    $('#emailfeed').removeClass('has-error');
    $('#passwordfeed').removeClass('has-error');
    if (haveError) {
        $("#my-error").fadeOut('slow');
        $('#my-error').remove();
        haveError = false;
    }
    if (email && password) {

        $.ajax({
            method: "POST",
            url: 'reglogin.php',
            data: { login: 'login', email: email, password: password }
        }).done(function(data) {
            ndata = data.slice(1, data.length);
            console.log(ndata);
            switch (ndata) {
                case 'success':
                    location.href = 'http://spvcx.com';
                    break;
                default:
                    createErr('Неправильный email или пароль');
                    $("#my-error").fadeIn('slow');
                    $('#emailfeed').addClass('has-error');
                    $('#passwordfeed').addClass('has-error');
                    break;
            }
        });
    } else {
        createErr('Необходимо заполнить все поля');
        $("#my-error").fadeIn('slow');
    }
}

function createErr(text) {
    var div = document.createElement('div');
    div.id = 'my-error';
    var rowdiv = document.createElement('div');
    rowdiv.className = 'row text-center';
    var alertdiv = document.createElement('div');
    alertdiv.className = 'alert alert-danger'
    alertdiv.id = 'success-danger';
    alertdiv.innerHTML = "<h2>Ошибка</h2>";
    var messagediv = document.createElement('div');
    messagediv.innerHTML = (text);
    alertdiv.appendChild(messagediv);
    rowdiv.appendChild(alertdiv);
    div.appendChild(rowdiv);
    var to = document.getElementById('to-alerts');
    to.appendChild(div);
    haveError = true;
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