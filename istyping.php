<?php
$fromm = $_POST[fromm];
$too = $_POST[too];

if (empty($fromm) && empty($too)){
	echo "<script>window.location.replace('http://ambio.ua')</script>";
} else {
include ("bd.php");

$result = mysql_query ("SELECT typing from users where login = '$too' and typing='$fromm'");

	$num_result = mysql_num_rows($result);
	if ($num_result){
	echo "".$too." is typing<img src='img/typing.gif' width='15' heidht='15'></img>";
} else {

$sh="-1";
$time=strtotime("now".$sh." minute");
$result2 = mysql_query ("SELECT lastseen from users where login = '$too'");
$row2 = mysql_fetch_array($result2);
if ($row2[lastseen]>date('Y-m-d H:i:s',$time)){
  echo '<div>Online</div>';  
} else if (date('d', strtotime($row2[lastseen]))==date('d')){
   echo '<div>Был в сети в '.date('H:i', strtotime($row2[lastseen])).'</div>';  
} else if (date('Y', strtotime($row2['lastseen']))==date('Y')){
	 echo '<div>Был в сети в '.date('d F H:i', strtotime($row2[lastseen])).'</div>'; 
} else {
	echo '<div>Был в сети в '.date('d F Y H:i', strtotime($row2[lastseen])).'</div>'; 
}
}
}
 ?>