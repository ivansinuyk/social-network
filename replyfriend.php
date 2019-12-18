<?php
session_start();
$login = $_SESSION['login'];
if (empty($login)){
	header('location: http://ambio.ua');
} else {
include ("bd.php");
$idmess = $_POST['id'];
$result = mysql_query("SELECT * FROM friends WHERE (user = '$login' or friend = '$login') and isfriend = '1'",$db);
       
       $num_result = mysql_num_rows($result);
       if ($num_result==0){
        echo '<div>Список друзей пуст</div>';
       } else {
echo '<div><strong>Ваши друзья</strong></div>';      
       for ($i=0; $i<$num_result; $i++){
$row = mysql_fetch_array($result);
echo '<div>';

if ($row['friend']==$login){
  $friend = $row['user'];
} else {
  $friend = $row['friend'];
}

$sh="-1";
$time=strtotime("now".$sh." minute");
$result2 = mysql_query("SELECT * FROM users WHERE login = '$friend'",$db);
$row2 = mysql_fetch_array($result2);
if ($row2['lastseen']>date('Y-m-d H:i:s',$time)){
echo '<button onclick="reply(this)" value='.$row2['login'].' name='.$idmess.'><div>Online</div><div><strong>'.$friend.'</strong></div></button>';
echo '</div>';
echo '<br>';
} else {
   echo '<button onclick="reply(this)" value='.$row2['login'].' name='.$idmess.'><div>'.$row2['lastseen'].'</div><div><strong>'.$friend.'</strong></div></button>';
echo '</div>';
echo '<br>'; 
}

}
}
}
 ?>