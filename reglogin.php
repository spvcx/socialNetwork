<?php
require('config.php');
if(isset($_POST['createaccount'])) {

    $u = new User();
    $u->storeValues($_POST);
    $u->registerUser();
}

?>