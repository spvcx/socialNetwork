function ajaxLogin() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
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
                case 'password':
                    alert('Неправильный пароль');
                    break;
                case 'email':
                    alert('Неправильный email');
                    break;
            }
        });
    } else alert('Необходимо заполнить все поля!');
}

function ajaxRegister() {
    //todo 
}