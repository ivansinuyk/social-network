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
  };
  checknew();
  </script>
<div id="info" class="dialogcontainer"></div>
 <script>
var login = "<?php echo $_SESSION[login] ?>";

if (login == '' || login == null){
  window.location.replace('http://ambio.ua');
} else {
  function dialog() {
    var check = 'login=' + encodeURIComponent(login);
    var request = new XMLHttpRequest();
    request.open('POST','checkmails.php',false);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('info');
        content.innerHTML = request.responseText;
        setTimeout(dialog,400);
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(check);
  }
  dialog();
    }
</script>
</body>
</html>