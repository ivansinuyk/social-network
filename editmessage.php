<?php
session_start();
if (empty($_POST[id])){
header('location: http://ambio.ua');	
}
$login = $_SESSION[login];
$id = $_POST[id];
$edit = $_POST[editmessage];
$get = $_POST[getmessage];

if ($edit!=$get && !empty($edit)){
include ("bd.php");
$result = mysql_query ("UPDATE mail set message = '$edit', edited = '1' where id='$id'");
$result2 = mysql_query ("UPDATE users set lastseen = NOW() where login='$login'");
}
 ?>
