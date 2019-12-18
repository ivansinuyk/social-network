<?php

class User{

	public $login, $password;

	public function logIn() {

    include ("bd.php");

	$result = mysql_query("SELECT * FROM users WHERE login='$this->login'",$db);
    	$myrow = mysql_fetch_array($result);
    	if (empty($myrow['password']))
    		{
    		exit ("asdasd");
   			 }
    		else {
    	if ($myrow['password']==$this->password) {
  		 $result2 = mysql_query ("UPDATE users set lastseen = NOW() where login='$this->login'");
   		session_start();
    		$_SESSION[login]=$myrow[login]; 
    		$_SESSION[id]=$myrow[id];
    		echo "<script>window.location.replace('http://ambio.ua')</script>";
   			 }
 			else {
   			 exit ("Извите, введённый вами login или пароль неверный.");
    		}
    		}    
			}
}

?>