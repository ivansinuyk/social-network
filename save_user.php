<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
    if (isset($_POST[login])) { $login = $_POST[login]; if ($login == '') { unset($login);} }
    if (isset($_POST[password])) { $password=$_POST[password]; if ($password =='') { unset($password);} }
 if (empty($login) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    include ("bd.php");
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");
    if ($result2=='TRUE')
    {
    echo "<script>window.location.replace('http://ambio.ua')</script>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>