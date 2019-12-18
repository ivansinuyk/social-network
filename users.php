<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Ivangram</title>
<link rel="shortcut icon" href="img/icon.png" type="image/png">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
  <div class="leftbar">
    <?php
    include 'bd.php';
    $result = mysql_query ("UPDATE users set lastseen = NOW() where login='".$_SESSION[login]."'");
    echo "<div id='main'><a href='profile.php'>Мой профиль</a>  ";
    echo "<br><a id='f' href='mails.php'></a>  ";
    echo "<br><a href='users.php'>Друзья</a>  ";
    echo '<br><a href="game.php">Игра</a>'; 
    echo "<br><a href='logout.php'>Выйти</a></div>"; 
    ?>
  </div>
  <script type="text/javascript">
    var login = "<?php echo $_SESSION[login] ?>";
function checknew(){
    var check = 'login=' + encodeURIComponent(login);
    var request = new XMLHttpRequest();
    request.open('POST','checknew.php', true);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('f');
        content.innerHTML = request.responseText;
        setTimeout(checknew,1000);
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(check);
  }
  checknew();
  </script>
  <div style="float:left;">
    <?php
    if (empty($_SESSION[login]) or empty($_SESSION[id]))
    {
      echo "<script>window.location.replace('http://ambio.ua')</script>";
    }
    else
    {
    $login = $_SESSION[login];
    	include ("bd.php");
       $result = mysql_query("SELECT * FROM friends WHERE (user = '$login' or friend = '$login') and isfriend = '1'",$db);
       
       $num_result = mysql_num_rows($result);
       if ($num_result==0){
        echo '<div>Список друзей пуст</div>';
       } else {
echo '<div><strong>Ваши друзья</strong></div>';      
       for ($i=0; $i<$num_result; $i++){
$row = mysql_fetch_array($result);
echo '<div style="background-color:#C0C0C0;"">';

if ($row[friend]==$login){
  $friend = $row[user];
} else {
  $friend = $row[friend];
}

$sh="-1";
$time=strtotime("now".$sh." minute");
$result2 = mysql_query("SELECT * FROM users WHERE login = '$friend'",$db);
$row2 = mysql_fetch_array($result2);
if ($row2[lastseen]>date('Y-m-d H:i:s',$time)){

  echo '<div>Online</div>';  
} else {
   echo '<div>'.$row2[lastseen].'</div>';  
}
echo '<form method="post" action="mail.php">';
echo '<div><strong>'.$friend.'</strong></div>';
echo '<input type="submit" value="Написать"></input>';
echo '<input type="hidden" name="login" value='.$friend.'></form>';
echo '<form method="post" action="profile.php">';
echo '<input type="submit" value="Профиль"></input>';
echo '<input type="hidden" name="login" value='.$friend.'></form>';
echo '</div>';
echo '<br>';
}
}
 $result3 = mysql_query("SELECT * FROM friends WHERE friend = '$login' and isfriend = '0'",$db);
       
       $num_result3 = mysql_num_rows($result3);
       if ($num_result3==0){
        echo '<div>Заявок нет</div>';
       } else {
        for ($j=0; $j<$num_result3; $j++){
      $row3 = mysql_fetch_array($result3);
            echo '<div><strong>Заявки</strong></div>';
    echo '<br>';
  echo '<div style="background-color:green; width:10%;">';

$friend2 = $row3['user'];
$sh2="-1";
$time2=strtotime("now".$sh2." hour".$sh2." minute");
$result4 = mysql_query("SELECT * FROM users WHERE login = '$friend2'",$db);
$row4 = mysql_fetch_array($result4);
if ($row4[lastseen]>date('Y-m-d H:i:s',$time2)){

  echo '<div>Online</div>';  
} else {
   echo '<div>'.$row4[lastseen].'</div>';  
}
echo '<form method="post" action="addfriends.php">';
echo '<div><strong>'.$row3[user].'</strong></div>';
echo '<input type="submit" value="Подтвердить заявку"></input>';
echo '<input type="hidden" name="login" value="' . $row3[user]. '"></form>';
echo '<form method="post" action="profile.php">';
echo '<input type="submit" value="Профиль"></input>';
echo '<input type="hidden" name="login" value="' . $row3[user]. '"></form>';
echo '</div>';
echo '<br>'; 
}
}
$result5 = mysql_query("SELECT * FROM friends WHERE user = '$login' and isfriend = '0'",$db);
       
       $num_result5 = mysql_num_rows($result5);
       if ($num_result5==0){
        echo '<div>Исходящих заявок нет</div>';
       } else {
        for ($b=0; $b<$num_result5; $b++){
      $row5 = mysql_fetch_array($result5);
            echo '<div><strong>Исходящие заявки</strong></div>';
    echo '<br>';
  echo '<div style="background-color:green; width:10%;">';

$friend3 = $row5[friend];
$sh3="-1";
$time3=strtotime("now".$sh3." hour".$sh3." minute");
$result6 = mysql_query("SELECT * FROM users WHERE login = '$friend2'",$db);
$row6 = mysql_fetch_array($result6);
if ($row6[lastseen]>date('Y-m-d H:i:s',$time3)){

  echo '<div>Online</div>';  
} else {
   echo '<div>'.$row6[lastseen].'</div>';  
} 
echo '<form method="post" action="profile.php">';
echo '<div><strong>'.$row5[friend].'</strong></div>';
echo '<input type="submit" value="Профиль"></input>';
echo '<input type="hidden" name="login" value="' . $row5[friend]. '"></form>';
echo '</div>';
echo '<br>'; 
}
}
 echo "<a href='newfriends.php'>Найти друзей</a> "; }

    ?>
  </div>
</body>
</html>
