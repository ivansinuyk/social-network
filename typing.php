<?php
$fromm = $_POST[fromm];
$too = $_POST[too];
$send = $_POST[send];

if (empty($fromm) && empty($too)){
	echo "<script>window.location.replace('http://ambio.ua')</script>";
} else {
include ("bd.php");
  if ($send == 1){ 
$result3 = mysql_query ("UPDATE users set lastseen = NOW() where login='$fromm'");
$result = mysql_query ("UPDATE users set typing = '$too' where login='$fromm'");
} else {
	
$result = mysql_query ("UPDATE users set typing = '0' where login='$fromm'");	
}
}
 ?>