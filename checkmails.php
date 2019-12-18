<?php
error_reporting(0);
if (empty($_POST[login]))
    {
echo "<script>window.location.replace('http://ambio.ua')</script>";
    } else {
$login = $_POST[login];
include ("bd.php");
    $result = mysql_query("SELECT * from friends where (user = '$login' or friend = '$login') and isfriend!='0' order by lastmsg DESC",$db);
    $num_result = mysql_num_rows($result);
    for ($i=0; $i<$num_result; $i++){
$row = mysql_fetch_array($result);
if ($row[user]==$login){
	$friend = $row[friend];
} else {
	$friend = $row[user];
}
 $result2 = mysql_query("SELECT * from mail where fromm = '$login' and too = '$friend' or fromm ='$friend' and too = '$login' order by date DESC limit 1",$db);
 $row2 = mysql_fetch_array($result2);

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
$month = date('n', strtotime($row2[date]))-1;
$sh = -1;
$time=strtotime("now".$sh." day");
   if (date("Y m d", strtotime($row2[date]))==date('Y m d')) {
     $date = date("G:i", strtotime($row2[date]));
  } else if (date("Y m d", strtotime($row2[date]))==date('Y m d', $time)) {
     $date = 'Вчера';
} else if (date("Y", strtotime($row2[date]))==date('Y')){
    $date = date("j $arr[$month] ", strtotime($row2[date]));
  } else {
  	$date = date("j $arr[$month] Y", strtotime($row2[date]));
  } 
$num_result2 = mysql_num_rows($result2);
if ($num_result2){
 if ($row2[fromm]==$login){
 	if ($row2[checkmessage]==0){
echo '<form class="dialog" method="post" action="mail.php">';
echo '<button class="readmsg" type="submit"  value=""/><div class="msgavatarcon"><img class="msgavatar" src="/img/del.png"></div><div class="msgcontent"><div class="logdate"><div class="log">'.$friend.'</div><div class="date">'.$date.'</div><img class="checkimg" src="/img/checked.jpg"></div><div class="whotext"><div class="who">Вы: </div><div class="text">'.$row2[message].'</div></div></div></button>';
echo '<input type="hidden" name="login" value="' . $friend. '"></form>';
} else {
echo '<form class="dialog" method="post" action="mail.php">';
echo '<button class="readmsg" type="submit"  value=""/><div class="msgavatarcon"><img class="msgavatar" src="/img/del.png"></div><div class="msgcontent"><div class="logdate"><div class="log">'.$friend.'</div><div class="date">'.$date.'</div><img class="checkimg" src="/img/true.jpg"></div><div class="whotext"><div class="who">Вы: </div><div class="text">'.$row2[message].'</div></div></div></button>';
echo '<input type="hidden" name="login" value="' . $friend. '"></form>';	
}
} elseif ($row2[fromm]==$friend){
	if ($row2[checkmessage]==0){
  $result3 = mysql_query("SELECT * from mail where fromm = '$friend' and too = '$login' and checkmessage = '0'",$db);
  $num_result3 = mysql_num_rows($result3);
echo '<form class="dialog" method="post" action="mail.php">';
echo '<button class="readmsg" type="submit"  value=""/><div class="msgavatarcon"><img class="msgavatar" src="/img/del.png"></div><div class="msgcontent"><div class="logdate"><div class="log">'.$friend.'</div><div class="date">'.$date.'</div></div><div class="whotext"><div class="text">'.$row2[message].'</div><div class="newmsg">'.$num_result3.'</div></div></div></button>';
echo '<input type="hidden" name="login" value="' . $friend. '"></form>';
} else {
echo '<form class="dialog" method="post" action="mail.php">';
echo '<button class="readmsg" type="submit"  value=""/><div class="msgavatarcon"><img class="msgavatar" src="/img/del.png"></div><div class="msgcontent"><div class="logdate"><div class="log">'.$friend.'</div><div class="date">'.$date.'</div></div><div class="whotext"><div class="text">'.$row2[message].'</div></div></div></button>';
echo '<input type="hidden" name="login" value="' . $friend. '"></form>';	
}
}
} else {
	echo '<form class="dialog" method="post" action="mail.php">';
echo '<button class="readmsg" type="submit"  value=""/><div class="msgavatarcon"><img class="msgavatar" src="/img/del.png"></div><div class="msgcontent"><div class="logdate"><div class="log">'.$friend.'</div></div><div class="whotext"><div class="text">Пока-что нет сообщений, напишите первым</div></div></div></button>';
echo '<input type="hidden" name="login" value="' . $friend. '"></form>';
}
}
}
?>