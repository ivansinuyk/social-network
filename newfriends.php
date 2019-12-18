<?php
session_start();
include 'bd.php';
$result = mysql_query ("UPDATE users set lastseen = NOW() where login='".$_SESSION[login]."'");
?>
<html>
<head>
	<meta charset="utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Ambioua</title>
</head>
<body style="background-color: #ccffff;">
<div style="width: 1250px; height: 100px; background-color: #ffb3ff;">
<h1 style="float:left; margin-left: 50px;"><a href="index.php">YouVanya</a></h1>
</div>
<input required size="40" type="textarea" autofocus id="friend" autocomplete="off"/>
<button  id="search" value="Send">Найти</button>
<div id="finded"></div>
<div>
<script>
var fromm = "<?php echo $_SESSION[login] ?>";
var friend = document.getElementById('friend');
if (fromm == '' || fromm == null){
  window.location.replace('http://ambio.ua');
} else {

    document.addEventListener("DOMContentLoaded",function() {
  var mybutton = document.getElementById('search');
  mybutton.addEventListener("click", function(){
    name = 'friend=' + encodeURIComponent(friend.value);
    var request = new XMLHttpRequest();
    request.open('POST','searchfriend.php',true);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('finded');
        content.innerHTML = request.responseText;
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(name);
    document.getElementById('friend').value = '';
  });
});
    document.getElementById('friend').onkeypress=function(e){
    if(e.keyCode==13){
        document.getElementById('search').click();
    }
}
    }
</script>
</div>
</body>
</html>