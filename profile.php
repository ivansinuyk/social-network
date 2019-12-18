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
    <div><p>Иван Синюк</p></div>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRimAhaRMM0VSqYHDw5sZnMdBVNdxqBsE4pmudUxB4fV5Yq_ZFJ&s" 
  width="255" height="255" alt="lorem">
  </div>
</body>
</html>
