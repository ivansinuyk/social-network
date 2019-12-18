var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var bg = new Image();
var icon = new Image();
var car = new Image();
var patron = new Image();
var fire = new Audio();
fire.src = "audio/fire.mp3";
bg.src = "img/bg.png";
patron.src = "img/patron.png"; 
car.src = "img/car.png";
icon.src = "img/icon.png";
document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);
var leftPressed = false;
var rightPressed = false;
var xc = 450;
var yc = 750;
var patrons = 10;
spacePressed = false;
var xi = Math.floor(Math.random() * 700) + 5;
var xy = Math.floor(Math.random() * 700) + 5;
var i = 0;
var j = 0;
function keyDownHandler(e) {
    if (e.keyCode == '65' || e.keyCode == '37')  {
        leftPressed = true;
    }   else if (e.keyCode == '68' || e.keyCode == '39')  {
         rightPressed = true;
    } else if (e.keyCode == '32')  {
         spacePressed = true;
    } 
}
function keyUpHandler(e) {
    if (e.keyCode == '65' || e.keyCode == '37')  {
        leftPressed = false;
    }   else if (e.keyCode == '68' || e.keyCode == '39')  {
         rightPressed = false;
    }
}
var vanya = [];
vanya[0] = { 
    x: -50,
    y: -50
}
var enemy = [];
enemy[0] = {
    a: xi,
    b: xy
}
function drawEnemy(){
    for (i=0; i<enemy.length; i++) {
ctx.drawImage(icon, enemy[i].a, enemy[i].b);

if (enemy[i].b == 200){
    enemy.push({
    a: Math.floor(Math.random() * 700) + 5,
    b: xy
    });
 }

}
} 
function drawPatron(){
    for (j=0; j<vanya.length; j++) {
ctx.drawImage(patron, vanya[j].x, vanya[j].y);
vanya[j].y-=30;

if (spacePressed && patrons > 0){
    vanya.push({
    x: xc,
    y: yc
    });
spacePressed = false;
patrons--;
    }
}
 

}    
 function drawPatrons() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText("Патроны: "+patrons, 5, 20);

}  

function draw(){

ctx.drawImage(bg, 0, 0); 
drawPatron();
ctx.drawImage(car, xc, yc);
drawEnemy();
drawPatrons();
if (leftPressed){
    xc-=4;
}else if (rightPressed){
    xc+=4;
}
requestAnimationFrame(draw);
} 

draw();