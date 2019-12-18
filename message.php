<?php
session_start();
    	include ("bd.php");
        $fromm = $_POST[fromm];
        $to = $_POST[too];
        $nm = $_POST[nm];

         if ($nm==0){
        $result3 = mysql_query ("UPDATE mail set checkmessage = '1' where fromm='$to' and too='$fromm'");
      } else if ($nm==1){
        $result3 = mysql_query("SELECT * from mail where fromm='$to' and too='$fromm' and checkmessage = '0'");
        $num_result5 = mysql_num_rows($result3);
        if ($num_result5){
          echo '<button id="test" onclick="nm()" class="buttonmsg">'.$num_result5.'</button>';
        } else {
          echo '<button onclick="nm()" class="button">V</button>';
        }
      }

        $result = mysql_query("SELECT * FROM mail where (fromm='$fromm' and too='$to' or fromm='$to' and too='$fromm') GROUP BY DATE_FORMAT(date, '%Y %m %d') order by 'date' ASC ",$db);

$num_result = mysql_num_rows($result);

       if (!$num_result){
        echo '<div align="center">Пока еще нету сообщений</div>';
    } else {

       for ($i=0; $i<$num_result; $i++){
        $row = mysql_fetch_array($result);

        $result4 = mysql_query("SELECT * FROM mail where (fromm='$fromm' and too='$to' or fromm='$to' and too='$fromm') and DATE_FORMAT(date, '%Y %m %d') = '".date('Y m d', strtotime($row[date]))."' order by date ASC",$db);


$num_result4 = mysql_num_rows($result4);

$sh = -1;
$time=strtotime("now".$sh." day");
if ($num_result4){
  echo '<div class="messdate">';
   if (date("Y m d", strtotime($row[date]))==date('Y m d')) {
     echo '<strong>Today</strong>';
  } else if (date("Y m d", strtotime($row[date]))==date('Y m d', $time)) {
    echo '<strong>Yesturday</strong>';
} else if (date("Y", strtotime($row[date]))==date('Y')){
    echo '<strong>'.date("d F", strtotime($row[date])).'</strong>';
  } else {
  echo '<strong>'.date("d F Y", strtotime($row[date])).'</strong>';
}
echo '</div>';
}

for ($j=0; $j<$num_result4; $j++){

  $row4 = mysql_fetch_array($result4);

if ($fromm==$row4[fromm]){
  if (date("Y m d", strtotime($row4[date]))==date('Y m d')){
  if ($row4[checkmessage] == '1'){
    if ($row4[edited] == '1'){
echo '<button class="rightmess" onclick="menu(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">edited '.date("H:i", strtotime($row4[date])).'<img width="15" height="15" src="/img/true.jpg" title="Прочитано"></div></button>';
} else {
  echo '<button class="rightmess" onclick="menu(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">'.date("H:i", strtotime($row4[date])).'<img width="15" height="15" src="/img/true.jpg" title="Прочитано"></div></button>';
}
} else { 
  if ($row4[edited] == '1'){
  echo '<button class="rightmess" align="right" onclick="menu(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">edited '.date("H:i", strtotime($row4[date])).'<img width="15" height="15" src="/img/checked.jpg" title="Не прочитано"></div></button>';
} else {
  echo '<button class="rightmess" align="right" onclick="menu(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">'.date("H:i", strtotime($row4[date])).'<img width="15" height="15" src="/img/checked.jpg" title="Не прочитано"></div></button>';
}
}
} else {
  if ($row4[checkmessage] == '1'){
    if ($row4[edited] == '1'){
echo '<button class="rightmess" onclick="menumin(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">edited '.date("H:i", strtotime($row4[date])).'<img width="15" height="15" src="/img/true.jpg" title="Прочитано"></div></button>';
} else {
  echo '<button class="rightmess" onclick="menumin(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">'.date("H:i", strtotime($row4[date])).'<img width="15" height="15" src="/img/true.jpg" title="Прочитано"></div></button>';
}
} else { 
  if ($row4[edited] == '1'){
  echo '<button class="rightmess" align="right" onclick="menumin(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">edited '.date("H:i", strtotime($row4['date'])).'<img width="15" height="15" src="/img/checked.jpg" title="Не прочитано"></div></button>';
} else {
  echo '<button class="rightmess" align="right" onclick="menumin(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">'.date("H:i", strtotime($row4[date])).'<img width="15" height="15" src="/img/checked.jpg" title="Не прочитано"></div></button>';
}
}
}
} else {
  if ($row4[checkmessage] == '1'){
    if ($row4[edited] == '1'){
echo '<button class="leftmess" align="right" onclick="menutoo(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">edited '.date("H:i", strtotime($row4['date'])).'</button>';
} else {
  echo '<button class="leftmess" align="right" onclick="menutoo(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">'.date("H:i", strtotime($row4[date])).'</button>';
} 
} else {
  if ($row4[edited] == '1'){
  echo '<button class="leftmess" align="right" onclick="menutoo(this)" value='.$row4[id].' name="'.$row4[message].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">edited '.date("H:i", strtotime($row4[date])).'</button>';
} else {
  echo '<button class="leftmess" align="right" onclick="menutoo(this)" value='.$row4[id].' name="'.$row4["message"].'"><div style="font-size:15px;"><pre class="pre">'.$row4[message].'</pre></div><div align="right" class="fontmsg">'.date("H:i", strtotime($row4[date])).'</button>';
}
}
}
} 
  }
}
    ?>