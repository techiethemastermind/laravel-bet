<!DOCTYPE html>
<html>
<head>
    <title>{{ $game->title }}</title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   </head>

<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }


addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}

if(isFramed ){
window.parent.postMessage('CloseGame',"*");	
}
document.location.href='../../';	
}
	
	});
</script>

<body style="margin:0px;width:100%;background-color:black;overflow:hidden">



<iframe id='game' style="margin:0px;border:0px;width:100%;height:100vh;" src='/games/ShiningTreasuresCT/latest-stable/ShiningTreasures/app.html?serverurl=/game/ShiningTreasuresCT/server&neon_interface=All&token=Ad20ffb08dbbee539fb00efa1ac952ce2&gamename=MainShiningTreasures_1024&lang=%24LANG&ic=cd7a7d98ce9fbd2bb5a7289b470305ee&loaderimgurl=/games/ShiningTreasuresCT/latest-stable/MainShiningTreasures_1024_background_1920.jpg&ss=d30ba881b4b6931609e690c3f141e4b8&ica=demo1&' allowfullscreen>


</iframe>




</body>

</html>
