<?php
require('config.php');
if(isset($_POST['createaccount'])) {

    $u = new User();
    $u->storeValues($_POST);
    $u->registerUser();
    
}

if(isset($_POST['login'])) {
    //User::loginUser($_POST['email'],$_POST['password']);
    $u = new User();
    $u->storeValues($_POST);
    $u->loginUser();
}

if(isset($_POST['ajax'])) {
    // ajax email check
    $e = $_POST['email'];
    if(DB::query("SELECT email FROM user WHERE email=:email",array(':email'=>$e))) {
        echo '1';
    }
}

?>