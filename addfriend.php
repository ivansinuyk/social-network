<?php
session_start();
error_reporting(0);
$add=$_POST[login];
$login=$_SESSION[login];
include ("bd.php");
$result3 = mysql_query ("UPDATE users set lastseen = NOW() where login='$login'",$db);
$result2 = mysql_query("SELECT * from friends where (user = '$login' and friend = '$add') or (friend = '$login' and user = '$add')");
$num_result = mysql_num_rows($result2);
if ($num_result){
	 echo "Friend already exsist. Try to find other users.<a href='http://ambio.ua/newfriends.php'>Try</a>";
} else {
$result = mysql_query ("INSERT INTO friends  VALUES('','$login','$add','0','')");
    if ($result)
    {
    echo "<script>window.location.replace('http://ambio.ua/users.php')</script>";
    }
 else {
    echo "Friend already exsist. Try to find other users.<a href='http://ambio.ua/newfriends.php'>Try</a>";
    }
mysqli_close($connection);
}
?>