<?php
session_start();
?>
<html lang="en">
<head>
 <meta charset="UTF-8">

 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Vanya</title>
</head>
<body>
 <?php
    if (empty($_SESSION[login]))
    { 
    echo "<script>window.location.replace('http://ambio.ua')</script>";
    }
    include 'bd.php';
    $result = mysql_query ("UPDATE users set lastseen = NOW() where login='".$_SESSION[login]."'");
    ?>	
<div>	
 <div style="float:left; margin-right: 10px;"><canvas id="canvas" width="900" height="800"></canvas></div>
 <div><strong>Таблица лидеров</strong></div>
 <div id='leaderboard' style="float:left; background: blue;"></div>
 <a href="index.php">На главную</a>
 </div>
 <script >
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var player = "<?php echo $_SESSION[login] ?>";

var lose = new Image();
lose.src = "img/lose.png";

var hint = new Image();
hint.src = "img/hint.png";

var box = new Image();
box.src = "img/box.png";

var bg = new Image();

var won = new Image();
won.src = "img/won.png";

var apple = new Image();
var columns = new Image();

columns.src = "img/columns.png";
apple.src = "img/apple.png";
bg.src = "img/bg.png";

var touch = new Audio();
touch.src = "audio/fire.mp3";

var soundLoose = new Audio();
soundLoose.src = "audio/soundLoose.mp3";

var soundWon = new Audio();
soundWon.src = "audio/soundWon.mp3";

var x = canvas.height/2;
var ax = 25;
var y =  canvas.width/2;
var ay = 25;
var rightPressed = false;
var leftPressed = false;
var upPressed = false;
var downPressed = false;
var status = 1;
var  xa=Math.floor(Math.random() * 600) + 100;
var  ya=Math.floor(Math.random() * 600) + 100;
var score = 0;
var n=3.5;
var extrax = 100;
var extray = 100;
var xh = 275;
var yh = 150;
setInterval(function() {
var request = new XMLHttpRequest();
    request.open('POST','leader.php',true);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('leaderboard');
        content.innerHTML = request.responseText;
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send();
}, 500);

document.addEventListener("keydown", keyDownHandler, false);

function keyDownHandler(e) {
    if(e.keyCode == '83' || e.keyCode == '40') {
        downPressed = true;
        rightPressed = false;
        leftPressed = false;
        upPressed = false;
    }
    else if (e.keyCode == '87' || e.keyCode == '38')  {
        upPressed = true;
         downPressed = false;
        rightPressed = false;
        leftPressed = false;
        
    }  else if (e.keyCode == '65' || e.keyCode == '37')  {
        leftPressed = true;
         downPressed = false;
        rightPressed = false;
        upPressed = false;
    }   else if (e.keyCode == '68' || e.keyCode == '39')  {
         rightPressed = true;
          leftPressed = false;
         downPressed = false;
        upPressed = false;
    }  
}

 function drawApple(){
    if (status == 1){
       ctx.drawImage(apple, xa, ya);
   }
   else if (status == 0 ) {
  ctx.drawImage(apple, xa = Math.floor(Math.random() * 870) + 5, ya = Math.floor(Math.random() * 770) + 5);
  status=1;
  score++;
  touch.play();
  n+=0.25;
 }
 }

function Collision(){
    if (x+25 > xa && x < xa+25 && y+25 > ya && y < ya+25){
        status=0;
    }
     
}

function drawPaddle() {
    ctx.drawImage(box, x, y);
}

function Lose(){
    if (y >= canvas.height - ay || y <= 0 || x >= canvas.width - ax || x <= 0){
    soundLoose.play();
    var sco = score;
    var login = player;
    add = 'scorename=' + encodeURIComponent(sco) +
      '&loginname=' + encodeURIComponent(login);
    var request = new XMLHttpRequest();
    request.open('POST','add.php',false);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('leaderboard');
        content.innerHTML = request.responseText;
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
  ctx.drawImage(lose, 0, 0);
    ctx.font = "50px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText(""+player, 100 , 280);
    ctx.fillText(""+score, 450, 450);
     exit();


}
}

function Won(){
    if (score == 100){
    ctx.drawImage(won, 0, 0);
    ctx.font = "50px Arial";
    ctx.fillStyle = "#000";
    soundWon.play();
    
    var sco = score;
    var login = player;
    add = 'scorename=' + encodeURIComponent(sco) +
      '&loginname=' + encodeURIComponent(login);
    var request = new XMLHttpRequest();
    request.open('POST','add.php',false);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        console.log(request);
        console.log(request.responseText);
        var content = document.getElementById('leaderboard');
        content.innerHTML = request.responseText;
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
  exit();
}
}

function drawScore() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText("Score: "+score, 5, 20);
    ctx.fillText("Player: "+player, 5, 35);
} 

function Direction(){
if(downPressed)  { 
    y+=n;

}
else if(upPressed) {
    y-=n;

}
if(rightPressed) {
    x+=n;

}
else if(leftPressed) {
    x-=n;
}
}

function draw() {
	if (score==1){
	xh=-150;
	yh=-150;
}
ctx.drawImage(bg, 0, 0);
ctx.drawImage(hint, xh, yh);
drawPaddle();
drawScore();
drawApple();
Lose();
Won();
Direction();
Collision();
requestAnimationFrame(draw);

}
draw();
 </script>
</body>
</html>