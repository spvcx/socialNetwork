<?php
require('config.php');
$action = isset($_GET['action']) ? $_GET['action'] : "";
$userId = User::Authorized();
require(TEMPLATE_PATH."/include/header.php");

if($action != 'login' && $action != 'logout' && !$userId) {
    login();
    exit;
}


function login() {
    $results = array();
    $results['pageTitle'] = 'Вход';
    require(TEMPLATE_PATH."/account/login.php");
}



?>