<?php
session_start();
$login = $_SESSION[login];
if (empty($login)){
	header('location: http://ambio.ua');
} else {
include ("bd.php");
$sh = -1;
$time=strtotime("now".$sh." minute");
$result2 = mysql_query ("UPDATE users set lastseen = '".date('Y-m-d H:i:s',$time)."' where login='$login'");
session_unset();
header('location: http://ambio.ua');
}
 ?>