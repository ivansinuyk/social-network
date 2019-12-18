<?php
error_reporting(0);
if (empty($_POST[fromm]))
    {
echo "<script>window.location.replace('http://ambio.ua')</script>";
    } else {
$message = $_POST[message];
$message = stripslashes($message);
$message = htmlspecialchars($message);
$message = trim($message);
$fromm = $_POST[fromm];
$too = $_POST[too];
include ("bd.php");
    $result = mysql_query ("INSERT INTO mail VALUES('','$fromm','$too','$message',NOW(),'0','0')");
    $result2 = mysql_query ("UPDATE users set typing = '0' where login='$fromm'");
    $result3 = mysql_query ("UPDATE users set lastseen = NOW() where login='$fromm'");
    $result4 = mysql_query("UPDATE friends set lastmsg = NOW() where (user='$fromm' and friend = '$too') or (user='$too' and friend = '$fromm')");
}
?>
