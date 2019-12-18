<?php
session_start();
$my = $_SESSION[login];
error_reporting(0);
$search=$_POST[friend];
$search = substr($search, 0, 64);
$search = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $search);
$good = trim(preg_replace("/\s(\S{1,2})\s/", " ", ereg_replace(" +", "  "," $search ")));
include 'bd.php';
$result2 = mysql_query ("UPDATE users set lastseen = NOW() where login='$my'");
$result = mysql_query("SELECT * FROM users WHERE login != '$my' and login LIKE '%". str_replace(" ", "%' OR login LIKE '%", $good). "%'");

$num_result = mysql_num_rows($result);
if (!$num_result){
	echo '<div>Такого пользователя нету</div>';
}
for ($i=0; $i<$num_result; $i++){
$row = mysql_fetch_array($result);

echo '<form method="post" action="addfriend.php">';
echo '<div>'.$row[login].'</div>';
echo '<input type="submit" value="Добавить в друзья"></input>';
echo '<input type="hidden" name="login" value="' . $row[login]. '"></form>';
echo '<br>';
}
?>