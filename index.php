<?php
require('config.php');
$action = isset($_GET['action']) ? $_GET['action'] : "";
$userId = User::Authorized();

if($action != 'login' && $action != 'logout' && $action!='register' && !$userId) {
    login();
    exit;
}
switch($action) {
    case 'register':
        register();
        break;
}

function login() {
    global $userId;
    $results = array();
    $results['pageTitle'] = 'Вход';
    require(TEMPLATE_PATH."/account/login.php");
}

function register() {
    global $userId;
    $results = array();
    $results['pageTitle'] = 'Регистрация';
    require(TEMPLATE_PATH."/account/register.php");

}


?>