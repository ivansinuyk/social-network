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
<div class="loginreg">
<div class="login">   
<form class='formlogin' id='reg' action='save_user.php' method='post' >
<p id='err' align="center"></p>
<input class='textlog' name='login' type='text' size='15' id='login' maxlength='15' placeholder="Введите логин">
<br>
<br>
<input class='textlog' name='password' type='password' id='password' size='15'  placeholder="Введите пароль">
<br>
<br>
<input class='textlog' name='reapeatpassword' type='password' id='repeatpassword' size='15'  placeholder="Повторите пароль">
<br>
<br>	
</form>
<button class='buttonreg' onClick="reg()">Зарегистрироваться</button>
<script type="text/javascript">
	
	function reg(){
		var err = document.getElementById('err');
		var login = document.getElementById('login');
        var password = document.getElementById('password');
        var rpassword = document.getElementById('repeatpassword');
         if (login.value.length < 5 || password.value.length < 8){
         	err.innerHTML = 'Слишком короткий логин или пароль';
         } else  if (rpassword.value.length != password.value.length){
         	err.innerHTML = 'Пароли не совпадают';
         } else {
         	var form = document.getElementById('reg');
		form.submit();
         }
		
	}
</script>
</div>
</div>
</body>
</html>