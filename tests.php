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
    require_once('leftbar.php');
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
    include ("bd.php");
    $result = mysql_query ("SELECT * from tests");
    $num_result = mysql_num_rows($result);
       for ($i=0; $i<$num_result; $i++){
        $row = mysql_fetch_array($result);
       echo '<form method="post" action="dotest.php">';
echo '<div><strong>'.$row[level].'</strong></div>';
echo '<div><strong>'.$row[theme].'</strong></div>';
echo '<div><strong>'.$row[author].'</strong></div>';
echo '<div><strong>'.$row[points].'</strong></div>';
echo '<div><strong>'.$row[mark].'</strong></div>';
echo '<input type="submit" value="Перейти к тесту"></input>';
echo '<input type="hidden" name="id" value="' . $row[id]. '"></form>';
}
    ?>
  </div>
</body>
</html>
