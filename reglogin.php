<?php
require('config.php');
if(isset($_POST['createaccount'])) {

    $u = new User();
    $u->storeValues($_POST);
    $u->registerUser();
    header('Location: /');
}

if(isset($_POST['login'])) {
    User::loginUser($_POST['email'],$_POST['password']);
}

?>