var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var bg = new Image();
var icon = new Image();
var aim = new Image();
bg.src = "img/bg.png"; 
aim.src = "img/aim.png";
icon.src = "img/icon.png";
var rightPressed = false;
var leftPressed = false;
var upPressed = false;
var downPressed = false;
document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);
var ax = Math.floor(Math.random() * 600) + 100;
var ay = Math.floor(Math.random() * 600) + 100;
var status = 1;
var x = 20;
var y = Math.floor(Math.random() * 600);
var score = 0;

function drawAim() {
  if (status != 0){
 ctx.drawImage(aim, ax, ay);   
} else {
 ctx.drawImage(aim, ax = Math.floor(Math.random() * 600) + 100, ay = Math.floor(Math.random() * 600) + 100);
 status = 1;
 score ++
  } 
}

function drawScore() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText("Score: "+score, 10, 20);
} 

function keyDownHandler(e) {
    if(e.keyCode == '83' || e.keyCode == '40') {
        downPressed = true;
    }
    else if (e.keyCode == '87' || e.keyCode == '38')  {
        upPressed = true;
    }  else if (e.keyCode == '65' || e.keyCode == '37')  {
        leftPressed = true;
    }   else if (e.keyCode == '68' || e.keyCode == '39')  {
         rightPressed = true;
    } 

}

function keyUpHandler(e) {
    if(e.keyCode == '83' || e.keyCode == '40') {
        downPressed = false;
    }
    else if (e.keyCode == '87' || e.keyCode == '38')  {
        upPressed = false;
    } else if (e.keyCode == '65' || e.keyCode == '37')  {
        leftPressed = false;
    }   else if (e.keyCode == '68' || e.keyCode == '39')  {
         rightPressed = false;
    } 
}

function draw(){
  
ctx.drawImage(bg, 0, 0); 
ctx.drawImage(icon, x, y); 
 drawAim(); 
if (x+100 > ax && x < ax+38 && y+100 > ay && y < ay+26){ 

   status = 0;
 }else
if(downPressed && y < canvas.height - 170)  { 
    y += 5;
}
else if(upPressed && y > 10) {
    y -= 5;
}
if(rightPressed && x < canvas.width - 100) {
    x += 5;
}
else if(leftPressed && x > 10) {
    x -= 5;
}



drawScore();
requestAnimationFrame(draw);
} 

draw();