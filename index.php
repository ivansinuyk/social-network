<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Ivangra</title>
<link rel="shortcut icon" href="img/icon.png" type="image/png">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
    <?php
    if (empty($_SESSION[login]) or empty($_SESSION[id]))
    {
    echo '<div class="loginreg">';
    echo '<div class="login">';     
    echo "<form class='formlogin' id='log' action='testreg.php' method='post'>";
    echo "<input class='textlog' name='login' id='login' type='text' size='15' maxlength='15' placeholder='Ваш логин'>";
    echo '<br>';
    echo '<br>';
    echo "<input class='textlog' name='password'  id='password' type='password' size='15' maxlength='15' placeholder='Ваш пароль'>";
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo "<div id='err'></div>";
    echo "</form>";
    echo "<button class='buttonlogin' onclick='logIn()'>Войти</button>";
    echo '<br></br>';
    echo "<button class='buttonreg' onclick='reg()'>Зарегистрироваться</button>";
    ?>
</div>
</div>
<script type="text/javascript">
    function logIn(){

    var name = document.getElementById('login');
    var password = document.getElementById('password');
        
        if (name.value == 0 || password.value == 0 ){
            var err = document.getElementById("err");
            err.innerHTML = 'Вы не ввелли логин или пароль';  
        } else if (name.value.length < 4 || password.value.length < 8) {
            var err = document.getElementById("err");
            err.innerHTML = 'Логин или пароль слишком короткий';
        } else {
            var log = document.getElementById('log');
             log.submit();
        }
    
        }

     function reg() {
        window.location.replace("http://ambio.ua/reg.php");
    }
</script>
<?php
}else
    {
    echo '<div class="leftbar">';
    include 'bd.php';
    $result = mysql_query ("UPDATE users set lastseen = NOW() where login='".$_SESSION[login]."'");
    echo "<div id='main'><a href='profile.php'>Мой профиль</a>  ";
    echo "<br><a id='f' href='mails.php'></a>  ";
    echo "<br><a href='users.php'>Друзья</a>  ";
    echo '<br><a href="game.php">Игра</a>'; 
    echo "<br><a href='logout.php'>Выйти</a></div>"; 
    
    ?>
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
  </div>
  <?php
}
?>

</body>
</html>

