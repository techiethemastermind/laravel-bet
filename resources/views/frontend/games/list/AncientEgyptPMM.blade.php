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
         overflow-y:hidden;
         
         } 
      </style>
   </head>
   
   <script src="/games/AncientEgyptPMM/device.min.js"></script>

<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }



		
	
		
addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){

document.location.href='../../../';	
}

if(ev.data=='ShowSwipe'){

document.getElementById('swipeOverlay').style['display']='';	
document.getElementById('swipeOverlayImg').style['display']='';	

}
	
	});
	
</script>



<body style="margin:0px;width:100%;background-color:black;">



<iframe id='game' style="position:fixed;margin:0px;border:0px;width:100%; height:100vh;" src='/games/AncientEgyptPMM/index.html?lang=en&cur=@if( auth()->user()->present()->shop ){{ auth()->user()->present()->shop->currency }}@endif&gameSymbol=vs1dragon8&websiteUrl=&lobbyURL=' allowfullscreen>


</iframe>

    
<div id="swipeOverlay" style=" overflow-y:scroll; display:none; position:absolute; top:0px; width:100%; height:3800px; background:rgba(255,255,255,0.4); "></div>
<img  id="swipeOverlayImg" style="display:none;z-index:200;width: 20vw;position: fixed; left: 50%; top: 25%;" src="/games/AncientEgyptPMM/swipe.png">
</body>
<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }


var currentHeight=window.innerHeight;

function	FormatViewport(){
	

	
}
	
	
//window.onresize=FormatViewport;	
//FormatViewport();	

var supportsOrientationChange = "onorientationchange" in window,
    orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

window.addEventListener(orientationEvent, function() {


var gm=document.getElementById('game');

var overlay=document.getElementById('swipeOverlay');
var overlay2=document.getElementById('swipeOverlayImg');
removeEventListener('scroll',SwipeFullscreen);
removeEventListener('resize',rSize);
overlay.style['z-index']='100';
overlay2.style['z-index']='200';

setTimeout(function(){

//gm.style['width']='0%';
gm.style['height']='0';


setTimeout(function(){

//gm.style['width']='100%';
gm.style['height']='100vh';

	},50);	
	


	},100);	
	


setTimeout(function(){


	if(device.landscape()){
	
	window.scrollTo(0,-50);	
	
}



addEventListener('scroll',SwipeFullscreen);

var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; 
if(isAndroid) {
addEventListener('touchend', SwipeFullscreen);
}


	

	},1000);	





}, false);

function SwipeFullscreen(){

var overlay=document.getElementById('swipeOverlay');
var overlay2=document.getElementById('swipeOverlayImg');

		if(window.scrollY>=1000){
		
	window.scrollTo(0,0);	
	
	}

if(currentHeight<window.innerHeight){





	
   
		 overlay.style['z-index']='-1';
	 overlay2.style['z-index']='-1';
	 

	 

setTimeout(function(){


	
//window.scrollTo(0,window.scrollY);		
		
	

addEventListener('resize',rSize);
	
},500);

setFull=false;	


removeEventListener('scroll',SwipeFullscreen);
	
}
	

currentHeight=window.innerHeight;

	

	
}


//SwipeFullscreen();
var setFull=false;

var swc=0;






function  rSize(){

if(currentHeight>window.innerHeight){

var overlay=document.getElementById('swipeOverlay');
var overlay2=document.getElementById('swipeOverlayImg');
overlay.style['z-index']='100';
overlay2.style['z-index']='200';
window.scrollTo(0,0);	
currentHeight=window.innerHeight;
	
	


removeEventListener('resize',rSize);

	setTimeout(function(){
  
addEventListener('scroll',SwipeFullscreen);

var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; 
if(isAndroid) {
addEventListener('touchend', SwipeFullscreen);
}


},500);
	
}	

	
}


addEventListener('scroll',SwipeFullscreen);

var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; 
if(isAndroid) {
addEventListener('touchend', SwipeFullscreen);
}




</script>	
</html>
