var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var a = "<? echo $_SESSION['login'] ?>";
var lose = new Image();
var bg = new Image();
lose.src = "img/lose.png";
alert(a);
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
var spacePressed = false;
var status = 1;
var  xa=Math.floor(Math.random() * 600) + 100;
var  ya=Math.floor(Math.random() * 600) + 100;
var score = 0;
var n=3.5;
var extrax = 100;
var extray = 100;


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
    ctx.beginPath();
    ctx.rect(x ,y ,ax ,ay);
    ctx.fillStyle = "#0095DD";
    ctx.fill();
    ctx.closePath();
}

function Lose(){
    if (y >= canvas.height - ay || y <= 0 || x >= canvas.width - ax || x <= 0){
    ctx.drawImage(lose, 0, 0);
    ctx.font = "50px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText(""+score, 450, 450);
    soundLoose.play();
}
}
function Won(){
    if (score == 100){
    ctx.drawImage(won, 0, 0);
    ctx.font = "50px Arial";
    ctx.fillStyle = "#000";
    soundWon.play();
}
}

function drawScore() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText("Score: "+score, 5, 20);
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
ctx.drawImage(bg, 0, 0);
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