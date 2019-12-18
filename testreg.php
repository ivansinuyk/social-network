<?php

$login = $_POST[login]; 
$password = $_POST[password];

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$login = trim($login);
$password = trim($password);

require_once('user.class.php');

$user = new User();
$user->login = $login;
$user->password = $password;
$user->logIn();

?>