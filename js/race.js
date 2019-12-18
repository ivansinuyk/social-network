var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var road = new Image();
road.src = "img/road.png";
var car = new Image();
car.src = "img/car.png";
var x = 315;
var y = 0;
var f = 0;
var cx = 625;
var cy = 800;
var nytro = 0;
document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);
var upPressed = false;
var leftPressed = false;
var rightPressed = false;
var spacePressed =false;
var q = 15;
function keyDownHandler(e) {
     if (e.keyCode == '87' || e.keyCode == '38')  {
        upPressed = true;
    }  else if (e.keyCode == '65' || e.keyCode == '37')  {
        leftPressed = true;
    }   else if (e.keyCode == '68' || e.keyCode == '39')  {
         rightPressed = true;
    } 
    else if (e.keyCode == '32')  {
         spacePressed = true;
    } 
}
function keyUpHandler(e) {
  if (e.keyCode == '87' || e.keyCode == '38')  {
        upPressed = false;
    } else if (e.keyCode == '65' || e.keyCode == '37')  {
        leftPressed = false;
    }   else if (e.keyCode == '68' || e.keyCode == '39')  {
         rightPressed = false;
    } else if (e.keyCode == '32')  {
         spacePressed = false;
    } 
}
function background(){
	ctx.beginPath();
    ctx.rect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "#0095DD";
    ctx.fill();
    ctx.closePath();
}
function gameLoop(){
    background();
    
    var i = 0;
   	var n = 0;
	  while (i<10000){
	  	ctx.drawImage(road, 315, y-n);
        n=n+875;
        i++;
   }
 if (rightPressed && cx < 905) {
  	 cx+=2;
  }
  if (leftPressed && cx > 325) {
  	 cx-=2;
  }
  if (f>1){
  	nytro=1;
  	  	 ctx.font = "16px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText("Nytro exist, Press Space", 10, 20);
  }
  if (upPressed) {
  	 y+=f;
  	 f+=0.05;
  }
   if (spacePressed && nytro==1) {
  	 cy-=q;
  	 f=0;

  }
  else if (nytro==0) {
  	 ctx.font = "16px Arial";
  
    ctx.fillStyle = "#000";
    ctx.fillText("Not nytro", 10, 20);
  }
  if (cy<800){
  	cy++;
  }
ctx.drawImage(car, cx, cy);
	requestAnimationFrame(gameLoop);
}
gameLoop();