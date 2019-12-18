<?php
Error_Reporting(E_ALL & ~E_NOTICE);

include 'bd.php';

$result = mysql_query("SELECT * FROM leader order by score desc limit 10");

$num_result = mysql_num_rows($result);

for ($i=0; $i<$num_result; $i++){
$row = mysql_fetch_array($result);

echo '<div style="font-size: 35px; height:35px; width:300px; background: #fc0;">'.($i+1).' - '.$row[login].'    -    '.$row[score].'</div>';
echo '<br>';
}
?>