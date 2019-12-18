<?php
Error_Reporting(E_ALL & ~E_NOTICE);

include 'bd.php';
$score=$_POST[scorename];
$login=$_POST[loginname];
$result = mysql_query("insert into leader values ('$login','$score')",$db);

?>