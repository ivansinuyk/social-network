<?php
Error_Reporting(E_ALL & ~E_NOTICE);
$login = $_POST[login];
include 'bd.php';
$result = mysql_query("SELECT * FROM mail where too = '$login' and checkmessage = '0'");

$num_result = mysql_num_rows($result);
if ($num_result == 0){
	echo 'Сообщения';
}
else {
echo 'Сообщения +'.$num_result.'';
}
?>