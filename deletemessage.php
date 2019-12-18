<?php
session_start();
if (empty($_POST[id])){
header('location: http://ambio.ua');	
}
$fromm = $_SESSION['login'];
$too = $_POST[too];
$id = $_POST[id];

include ("bd.php");
$result = mysql_query ("DELETE from mail where id='$id'");
if ($result){
	$result3 = mysql_query("SELECT * from mail where (fromm = '$fromm' and too = '$too') or (fromm = '$too' and too = '$fromm') order by date DESC limit 1");
	if ($result3){
	$row = mysql_fetch_array($result3);
	$result4 = mysql_query("UPDATE friends set lastmsg = '".$row[date]."' where (user='$fromm' and friend = '$too') or (user='$too' and friend = '$fromm')");
}
}
$result2 = mysql_query ("UPDATE users set lastseen = NOW() where login='$fromm'");

 ?>

