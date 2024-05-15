<?php
require_once 'User.php';
require_once 'SmartyConfig.php';

$smarty = new Smarty();

if (isset($_POST['submit'])) {
    $username =
    $_POST['username'];
    $email = $_POST['email'];
    $password =
    $_POST['password'];

    $conn = new PDO ('mysql:host=localhost;dname=users', 'root', '');
    $user = new User ($username, $email, $password, $conn);

    if ($user->validateUsername ()
    && $user->validateEmail() &&
$user->validatePassword()) {
    $user->createUser();
    $smarty->assign('message', 'User registered successfully!');
} else {
    $smarty->assign('message', 'Error: Please check your input data!');
}
}

$smarty->display ('register.tpl');