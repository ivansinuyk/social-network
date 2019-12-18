<?php
session_start();
$fromm = $_SESSION[login];
$replylogin = $_POST[replylogin];
if (empty($replylogin)){
	header('location: http://ambio.ua');
} else {
include ("bd.php");
$idmess = $_POST['idmess'];
$result = mysql_query("SELECT * FROM mail WHERE id = '$idmess' limit 1",$db);
if ($result){ 

$row = mysql_fetch_array($result);

$arr = [
  'янв',
  'фев',
  'мар',
  'апр',
  'май',
  'июн',
  'июл',
  'авг',
  'сен',
  'окт',
  'ноя',
  'дек'
];
$month = date('n', strtotime($row[date]))-1;
$sh = -1;
$time=strtotime("now".$sh." day");
   if (date("Y m d", strtotime($row[date]))==date('Y m d')) {
     $date = date("G:i", strtotime($row[date]));
  } else if (date("Y m d", strtotime($row['date']))==date('Y m d', $time)) {
     $date = 'Вчера';
} else if (date("Y", strtotime($row2[date]))==date('Y')){
    $date = date("j $arr[$month] ", strtotime($row[date]));
  } else {
  	$date = date("j $arr[$month] Y", strtotime($row[date]));
  }

$message = 'Пересланное сообщение:</br>' . 'От кого: ' . '<strong>' . $row[fromm] . '</strong></br>' . 'Кому: ' . '<strong>' . $row[too] . '</strong></br>' . 'Время: ' . $date . '</br><i>' . $row[message] . '</i>';

$result2 = mysql_query ("INSERT INTO mail VALUES('','$fromm','$replylogin','$message',NOW(),'0','0')");
$result4 = mysql_query("UPDATE friends set lastmsg = NOW() where (user='$fromm' and friend = '$replylogin') or (user='$replylogin' and friend = '$fromm')");
}
}
 ?>