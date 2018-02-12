var regLogin = {
    haveError:false,
    ready:true,
    emailready:true,
    econtainer:document.getElementById('emaill'),
    pcontainer:document.getElementById('password'),
    rpcontainer:document.getElementById('rpassword'),
    fncontainer:document.getElementById('firstname'),
    lncontainer:document.getElementById('lastname')
}

function ajaxLogin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    $('#emailfeed').removeClass('has-error');
    $('#passwordfeed').removeClass('has-error');
    if (regLogin.haveError) {
        $("#my-error").fadeOut('slow');
        $('#my-error').remove();
        regLogin.haveError = false;
    }
    if (email && password) {

        $.ajax({
            method: "POST",
            url: 'reglogin.php',
            data: { login: 'login', email: email, password: password }
        }).done(function(data) {
            ndata = data.replace(/\s*/g,'');
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


function addErrorBlock(element,text) {
    var mainblock = element.parentElement.parentElement;
    var div = document.createElement('div');
    div.className = 'alert-danger error-block';
    var spantext = document.createElement('span');
    spantext.innerHTML = text;
    div.appendChild(spantext);
    mainblock.appendChild(div);
    mainblock.lastElementChild.previousElementSibling.classList.add('glyphicon-remove');
    mainblock.parentElement.classList.add('has-error');
}

function removeErrorBlock(element) {
    var mainblock = element.parentElement.parentElement;
    if(mainblock.lastElementChild.className == 'alert-danger error-block') {
        mainblock.removeChild(mainblock.lastElementChild);
        mainblock.lastElementChild.classList.remove('glyphicon-remove');
        mainblock.parentElement.classList.remove('has-error');
    }
}

function addSuccess(element) {
    var mainblock = element.parentElement.parentElement;
    mainblock.lastElementChild.classList.add('glyphicon-ok');
    mainblock.parentElement.classList.add('has-success');
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
    regLogin.haveError = true;
}

function emailChangeCheck() {
    var regmail = /^\w+@\w+\.\w{2,4}$/i;
    var v = document.getElementById('emaill').value;
    removeErrorBlock(regLogin.econtainer);
    if (regmail.test(v)) {
        emailCheck(v);
    } else {
        regLogin.ready = false;
        addErrorBlock(regLogin.econtainer,'E-mail должен соответствовать шаблону email@email.com');
    }
}

function emailCheck(e) {
    $.ajax({
        method: "POST",
        url: 'reglogin.php',
        data: { ajax: 'ajax', email: e }
    }).done(function(data) {
        ndata = data.replace(/\s*/g,'');
        regLogin.emailready = (ndata === '1') ? false : true;
        if(regLogin.emailready) {
            addSuccess(regLogin.econtainer);
        } else {
            addErrorBlock(regLogin.econtainer,'Данный e-mail уже занят');
        }
    });
}


function ajaxRegister(form) {
    var elems = form.elements;
    regLogin.ready = true;
    var name = /[a-zA-Zа-яёА-ЯЁ]$/i;
    removeErrorBlock(regLogin.econtainer);
    if(elems.email.value == '') {
        console.log('email is empty');
        addErrorBlock(regLogin.econtainer,'Заполните поле E-mail');
        regLogin.ready = false;
    }

    removeErrorBlock(regLogin.pcontainer);
    if(elems.password.value.length < 6) {
        addErrorBlock(regLogin.pcontainer,'Пароль должен состоять минимум из 6 символов');
        regLogin.ready = false;
    } else addSuccess(regLogin.pcontainer);
    removeErrorBlock(regLogin.rpcontainer);
    if(elems.password.value) {
        if(elems.rpassword.value != elems.password.value ) {
            addErrorBlock(regLogin.rpcontainer,'Пароли должны совпадать');
            regLogin.ready = false;
        } else addSuccess(regLogin.rpcontainer);
    }


    removeErrorBlock(regLogin.fncontainer);
    if(!name.test(elems.firstname.value)) {
        regLogin.ready = false;
        addErrorBlock(regLogin.fncontainer,'Имя должно состоять только из букв');
    } else addSuccess(regLogin.fncontainer);

    removeErrorBlock(regLogin.lncontainer);
    if(!name.test(elems.lastname.value)) {
        regLogin.ready = false;
        addErrorBlock(regLogin.lncontainer,'Фамилия должна состоять только из букв');
    } else addSuccess(regLogin.lncontainer);

    if (regLogin.ready && regLogin.emailready) {
        setTimeout(() => {
            console.log('ready');
            $.ajax({
                method: "POST",
                url: 'reglogin.php',
                data: { createaccount: 'c', email: elems.email.value, password: elems.password.value, firstname: elems.firstname.value, lastname: elems.lastname.value, gender: elems.inlineRadioOptions.value }
            }).done(function(data) {
                location.href = 'http://spvcx.com';
            });
        }, 500);


    } else console.log('mistakes');




}