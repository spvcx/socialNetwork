<?php
require ('config.php');

$action = isset($_GET['action']) ? $_GET['action'] : "";
$userId = User::Authorized();

if ($action != 'login' && $action != 'logout' && $action != 'register' && !$userId) {
	login();
	exit;
}

switch ($action) {
case 'register':
	register();
	break;

case 'logout':
	logout();
	break;

case 'editmain':
	editmain();
	break;

case 'editstudy':
	editstudy();
	break;

case 'editinterests':
	editinterests();
	break;
case 'showpage':
	showpage();
	break;

default:
	defaultpage();
	break;
}


function showpage()
{

	global $userId;
	$results = array();
	require(TEMPLATE_PATH."/showpage.php");

}

function editmain()
{
	global $userId;
	$results = array();
	$results['pageTitle'] = 'Редактирование моей страницы';
	require (TEMPLATE_PATH . "/edit.php");

}

function editstudy()
{
	global $userId;
	$results = array();
	$results['pageTitle'] = 'Редактирование моей страницы';
	require (TEMPLATE_PATH . "/editstudy.php");

}

function editinterests()
{
	global $userId;
	$results = array();
	$results['pageTitle'] = 'Редактитрование моей страницы';
	require (TEMPLATE_PATH . "/editinterests.php");

}

function logout()
{
	DB::query("DELETE FROM cookie_token WHERE token=:token", array(
		':token' => sha1($_COOKIE['CID'])
	));
	setcookie('CID', null, -1, '/');
	header('Location: /');
}

function defaultpage()
{
	global $userId;
	$results = array();
	$results['pageTitle'] = 'YGKSCNet';
	require (TEMPLATE_PATH . "/default.php");

}

function login()
{
	global $userId;
	$results = array();
	$results['pageTitle'] = 'Вход';
	require (TEMPLATE_PATH . "/account/login.php");

}

function register()
{
	global $userId;
	$results = array();
	$results['pageTitle'] = 'Регистрация';
	require (TEMPLATE_PATH . "/account/register.php");

}

?>