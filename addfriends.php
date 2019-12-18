<?php
session_start();
error_reporting(0);
$friend=$_POST[login];
$login=$_SESSION[login];
include ("bd.php");
$result2 = mysql_query ("UPDATE users set lastseen = NOW() where login='$login'",$db);
$result = mysql_query ("UPDATE friends set isfriend = '1' where user='$friend' and friend = '$login'");
    if ($result=='TRUE')
    {
    echo "<script>window.location.replace('http://ambio.ua/users.php')</script>";
    }
 else {
    echo "Error <a href='http://ambio.ua/newfriends.php'>Try</a>";
    }
mysqli_close($connection);
?>