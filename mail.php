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
    include 'bd.php';
    $result = mysql_query ("UPDATE users set lastseen = NOW() where login='".$_SESSION[login]."'");
    echo "<div id='main'><a href='profile.php'>Мой профиль</a>  ";
    echo "<br><a id='f' href='mails.php'></a>  ";
    echo "<br><a href='users.php'>Друзья</a>  ";
    echo '<br><a href="game.php">Игра</a>'; 
    echo "<br><a href='logout.php'>Выйти</a></div>"; 
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
  };
  checknew();
  </script>
  <div class="mailblock">
    <div> <? echo '<form method="post" action="profile.php">';
      echo '<input type="submit" value="'.$_POST['login'].'"></input>';
      echo '<input type="hidden" name="login" value="' . $_POST['login']. '"></form>'; ?>
    </div>
    <div id ='typing'></div>
    <div id ='test' class="modal">
      <div id='edit' class="modal"></div>
      <div id='replyfriend' class='replymodal'></div>
    </div>
    <div id="mess" class="mess">
    </div>
    <div>
      <textarea  class="inputmess" autofocus id="message" placeholder="Write the message..." autocomplete="off"></textarea>
      <button class="inputsend" id="buttsend"></button>
    </div>
  </div>
  <script>
  var fromm = "<?php echo $_SESSION[login] ?>";
  var too = "<?php echo $_POST[login] ?>";
 var message = document.getElementById('message');
if (fromm == '' || fromm == null || too == '' || too == null || too == undefined){
  window.location.replace('http://ambio.ua');
} else {
  function menu(objButton){
var div = document.getElementById('test');
div.style.display = "block";
div.style.position = 'absolute';
div.style.width = "684";
div.style.height = "550";

var del = document.createElement("BUTTON");
del.style.position = "absolute";
del.style.height = '20';
del.style.width = '100';
del.style.left = event.clientX-winwi-150;
del.style.top = event.clientY-110;
del.innerHTML = "Удалить";
del.onclick = function(){
    var add = 'id=' + encodeURIComponent(objButton.value) +
    '&too=' + encodeURIComponent(too);
    var request = new XMLHttpRequest();
    request.open('POST','deletemessage.php',false);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
    div.style.display = 'none';
    del.style.display = 'none';
    edit.style.display = 'none';
    reply.style.display = 'none';
  };              
document.getElementById('test').appendChild(del);

var edit = document.createElement("BUTTON");
var textarea = document.createElement("textarea");
var saveedit = document.createElement("BUTTON");
edit.style.position = "absolute";
edit.style.height = '20';
edit.style.width = '100';
edit.style.left = event.clientX-winwi-150;
edit.style.top = event.clientY-90;
edit.innerHTML = "Изменить";
edit.onclick = function(){
    textarea.style.position = "absolute";
    textarea.style.height = '35';
    textarea.style.width = '630';
    textarea.style.left = 0;
    textarea.style.top = 515;
    textarea.style.resize = 'none';
    saveedit.style.position = "absolute";
    saveedit.style.height = '35';
    saveedit.style.width = '54';
    saveedit.style.left = 630;
    saveedit.style.top = 515;
    saveedit.innerHTML = "Save"; 
    textarea.value = objButton.name;
    del.style.display = 'none';
    edit.style.display = 'none';
    reply.style.display = 'none';
    document.getElementById('edit').style.display = 'block';
    document.getElementById('edit').appendChild(textarea);
    document.getElementById('edit').appendChild(saveedit);
    textarea.focus();
    textarea.onkeypress=function(e){
      if(e.keyCode==13 && !e.shiftKey){
for(var i = 0; i<textarea.value.length; i++){
      if (textarea.value[i]!=' ' && textarea.value[i]!='\n'){
        var add = 'id=' + encodeURIComponent(objButton.value) +
        '&editmessage=' + encodeURIComponent(textarea.value) +
        '&getmessage=' + encodeURIComponent(objButton.name);
        var request = new XMLHttpRequest();
        request.open('POST','editmessage.php',false);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.send(add);
        div.style.display = 'none';
        saveedit.style.display = 'none';
        textarea.style.display = 'none';
        message.focus();
        setTimeout(function(){
         message.value = ''; 
       },5);
        
      }
    } 
      }
    };
   saveedit.onclick = function(){
    for(var i = 0; i<textarea.value.length; i++){
      if (textarea.value[i]!=' ' && textarea.value[i]!='\n'){
        var add = 'id=' + encodeURIComponent(objButton.value) +
        '&editmessage=' + encodeURIComponent(textarea.value) +
        '&getmessage=' + encodeURIComponent(objButton.name);
        var request = new XMLHttpRequest();
        request.open('POST','editmessage.php',false);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.send(add);
        div.style.display = 'none';
        saveedit.style.display = 'none';
        textarea.style.display = 'none';
        message.focus();
        setTimeout(function(){
         message.value = ''; 
       },5);
      }
    }    
   } 
  };              
document.getElementById('test').appendChild(edit);

var reply = document.createElement("BUTTON");
var replyfriend = document.getElementById('replyfriend');
reply.style.position = "absolute";
reply.style.height = '20';
reply.style.width = '100';
reply.style.left = event.clientX-winwi-150;
reply.style.top = event.clientY-70;
reply.innerHTML = "Переслать";
reply.onclick = function(){
    var add = 'id=' + encodeURIComponent(objButton.value);
    var request = new XMLHttpRequest();
    request.open('POST','replyfriend.php',false);
    request.addEventListener('readystatechange', function() {
        var content = document.getElementById('replyfriend');
        content.innerHTML = request.responseText;
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
    replyfriend.style.display = 'block';
    reply.style.display = 'none';
    del.style.display = 'none';
    edit.style.display = 'none';
  };              
document.getElementById('test').appendChild(reply);

window.onclick = function(event) {
  if (event.target == div) {
    replyfriend.style.display = 'none';
    saveedit.style.display = 'none';
    textarea.style.display = 'none';
    div.style.display = 'none';
    del.style.display = 'none';
    edit.style.display = 'none';
    reply.style.display = 'none';
    textarea.value = '';
  }
}    
}

function menumin(objButton){
var div = document.getElementById('test');
div.style.display = "block";
div.style.position = 'absolute';
div.style.width = "684";
div.style.height = "550";

var del = document.createElement("BUTTON");
del.style.position = "absolute";
del.style.height = '20';
del.style.width = '100';
del.style.left = event.clientX-winwi-150;
del.style.top = event.clientY-110;
del.innerHTML = "Удалить";
del.onclick = function(){
    var add = 'id=' + encodeURIComponent(objButton.value) +
    '&too=' + encodeURIComponent(too);
    var request = new XMLHttpRequest();
    request.open('POST','deletemessage.php',false);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
    div.style.display = 'none';
    del.style.display = 'none';
    reply.style.display = 'none';
  };              
document.getElementById('test').appendChild(del);

var reply = document.createElement("BUTTON");
var replyfriend = document.getElementById('replyfriend');
reply.style.position = "absolute";
reply.style.height = '20';
reply.style.width = '100';
reply.style.left = event.clientX-winwi-150;
reply.style.top = event.clientY-90;;
reply.innerHTML = "Переслать";
reply.onclick = function(){
    var add = 'id=' + encodeURIComponent(objButton.value);
    var request = new XMLHttpRequest();
    request.open('POST','replyfriend.php',false);
    request.addEventListener('readystatechange', function() {
        var content = document.getElementById('replyfriend');
        content.innerHTML = request.responseText;
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
    replyfriend.style.display = 'block';
    reply.style.display = 'none';
    del.style.display = 'none';
  };              
document.getElementById('test').appendChild(reply);

window.onclick = function(event) {
  if (event.target == div) {
    replyfriend.style.display = 'none';
    div.style.display = 'none';
    del.style.display = 'none';
    reply.style.display = 'none';
  }
}    
}
var winwi = document.documentElement.clientWidth*0.23;

function menutoo(objButton){
var div = document.getElementById('test');
div.style.display = "block";
div.style.position = 'absolute';
div.style.width = "684";
div.style.height = "550";
var reply = document.createElement("BUTTON");
var replyfriend = document.getElementById('replyfriend');
reply.style.position = "absolute";
reply.style.height = '20';
reply.style.width = '100';
reply.style.left = event.clientX-winwi;
reply.style.top = event.clientY-75;

reply.innerHTML = "Переслать";
reply.onclick = function(){
    var add = 'id=' + encodeURIComponent(objButton.value);
    var request = new XMLHttpRequest();
    request.open('POST','replyfriend.php',false);
    request.addEventListener('readystatechange', function() {
        var content = document.getElementById('replyfriend');
        content.innerHTML = request.responseText;
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
    replyfriend.style.display = 'block';
    reply.style.display = 'none';
  };              
document.getElementById('test').appendChild(reply);

window.onclick = function(event) {
  if (event.target == div) {
    replyfriend.style.display = 'none';
    div.style.display = 'none';
    reply.style.display = 'none';
  }
}    
}

function reply(objButton){
      var add = 'idmess=' + encodeURIComponent(objButton.name) +
        '&replylogin=' + encodeURIComponent(objButton.value);
        var request = new XMLHttpRequest();
        request.open('POST','reply.php',false);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(add);
      replyfriend.style.display = 'none';
      document.getElementById('test').style.display = 'none';
    }

function nm(){  
    block.scrollTop = block.scrollHeight;
}

    var scroll = false;
    var block = document.getElementById("mess");
    var b = block.scrollHeight - block.scrollTop;

  function messag(){

    var a = block.scrollHeight;
    var nm;
     if (scroll == false){
      nm = 0;
    var add = 'fromm=' + encodeURIComponent(fromm) +
      '&too=' + encodeURIComponent(too) +
      '&nm=' + encodeURIComponent(nm);
    var request = new XMLHttpRequest();
    request.open('POST','message.php',false);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('mess');
        content.innerHTML = request.responseText;
        setTimeout(messag,400);
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
      block.scrollTop = block.scrollHeight;
  } else {
    nm = 1;
    var add = 'fromm=' + encodeURIComponent(fromm) +
      '&too=' + encodeURIComponent(too) +
      '&nm=' + encodeURIComponent(nm);
    var request = new XMLHttpRequest();
    request.open('POST','message.php',false);
 request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('mess');
        content.innerHTML = request.responseText;
        setTimeout(messag,400);
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
  } 
  }

  messag();

 setInterval(function(){
if (block.scrollTop+b<block.scrollHeight){
scroll = true;
} else if (block.scrollTop+b==block.scrollHeight){
  scroll = false;
}
  }, 20);

function istypin(){
  var send = 0;
 if (message.value > ''){
    send = 1;
    var add = 'fromm=' + encodeURIComponent(fromm) +
      '&too=' + encodeURIComponent(too) +
      '&send=' + encodeURIComponent(send);
    var request = new XMLHttpRequest();
    request.open('POST','typing.php',false);
     request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
  } else {
    send = 0;
    var add = 'fromm=' + encodeURIComponent(fromm) +
      '&too=' + encodeURIComponent(too) +
      '&send=' + encodeURIComponent(send);
    var request = new XMLHttpRequest();
    request.open('POST','typing.php',false);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
  }
  var add = 'fromm=' + encodeURIComponent(fromm) +
      '&too=' + encodeURIComponent(too);
    var request = new XMLHttpRequest();
    request.open('POST','istyping.php',false);
    request.addEventListener('readystatechange', function() {
      if ((request.readyState==4) && (request.status==200)) {
        var content = document.getElementById('typing');
        content.innerHTML = request.responseText;
        setTimeout(istypin,500);
      }
    });
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(add);
}
istypin();

      document.getElementById('buttsend').onclick=function(){
        for (var i=0; i<message.value.length; i++){
          if (message.value[i]!=' ' && message.value[i]!='\n'){
    name = 'message=' + encodeURIComponent(message.value) + 
           '&fromm=' + encodeURIComponent(fromm) + 
           '&too=' + encodeURIComponent(too);
    var request = new XMLHttpRequest();
    request.open('POST','send.php',true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(name);
    setTimeout(function(){
  block.scrollTop = block.scrollHeight;
  }, 100);
    message.value = '';
    setTimeout(function(){
      message.value = '';
    }, 1);
          }
        }
      }


      document.getElementById('message').onkeypress=function(e){
      if (e.keyCode==13 && !e.shiftKey){
               for (var i=0; i<message.value.length; i++){
          if (message.value[i]!=' ' && message.value[i]!='\n'){
    name = 'message=' + encodeURIComponent(message.value) + 
           '&fromm=' + encodeURIComponent(fromm) + 
           '&too=' + encodeURIComponent(too);
    var request = new XMLHttpRequest();
    request.open('POST','send.php',true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(name);
    setTimeout(function(){
  block.scrollTop = block.scrollHeight;
  }, 100);
    message.value = '';
    setTimeout(function(){
      message.value = '';
    }, 1);
          }
        }
              }
    } 
} 
</script>
</body>
</html>