    <?php
    if (!empty($_SESSION[login]) or !empty($_SESSION[id]))
    {
    include 'bd.php';
    $result = mysql_query ("UPDATE users set lastseen = NOW() where login='".$_SESSION[login]."'");
    echo "<div id='main'><a href='profile.php'>Мой профиль</a>  ";
    echo "<br><a id='f' href='mails.php'></a>  ";
    echo "<br><a href='users.php'>Друзья</a>  ";
    echo '<br><a href="game.php">Игра</a>'; 
    echo '<br><a href="tests.php">Тесты</a>';
    echo "<br><a href='logout.php'>Выйти</a></div>";
    } else {
      echo "<script>window.location.replace('http://ambio.ua')</script>";
    }
?>