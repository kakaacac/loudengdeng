@extends('base')
@section('title')
<title>Gomoku</title>
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="css/gomoku.css">
@endsection
@section('content')
<br><br>
<div id="status">Enjoy!</div>
<br>
<canvas id="board" width="600" height="600" onClick="place(event)">
Your browser does not support the HTML5 canvas tag.
</canvas>
<br><br>



<button id="refresh_button" type="button" onclick="refresh()">Refresh</button>
<p>Back to <a href="home">home</a>.</p>


<script>

drawBoard();

var bw = 0;
var win = false;
var winnerStyleInterval;


var intersec = new Array(19);
for (var i=0; i < 19; i++) intersec[i] = new Array(19);

var canvasXY = function(event){
	
	var c = document.getElementById("board");
	var box = c.getBoundingClientRect();
	var body = document.body;
	var docElem = document.documentElement;
	
	var clientTop = docElem.clientTop || body.clientTop || 0;
	var clientLeft = docElem.clientLeft || body.clientLeft || 0;
	
	return {x:event.clientX - box.left + clientLeft , y:event.clientY - box.top + clientTop};
	
}


//draw the board
function drawBoard(){
	
	var c = document.getElementById("board");
	var ctx = c.getContext("2d");
	
	for(var i=1; i <= 19; i++){
		ctx.beginPath();
		ctx.moveTo(30,i*30);
		ctx.lineTo(570,i*30);
		ctx.stroke();
	}
	
	for(var i=1; i <= 19; i++){
		ctx.beginPath();
		ctx.moveTo(i*30,30);
		ctx.lineTo(i*30,570);
		ctx.stroke();
	}
}

function refresh(){
	
	var c = document.getElementById("board");
	var ctx = c.getContext("2d");
	
	//clear previous canvas content
	ctx.clearRect(0, 0, c.width, c.height);

	for (var i=0; i < 19; i++) intersec[i] = [];
	bw = 0;
	win = false;
	
	drawBoard();
	
	document.getElementById("status").style.color = "black";
	document.getElementById("status").style.border = "none";
	
	clearInterval(winnerStyleInterval);
	
	document.getElementById("status").innerHTML = "Next move is: Black";
	
}

function place(e){
	var pos = canvasXY(e);
	
	//coordinates of pieces
	var nx = parseInt((parseInt(pos.x) + 15)/30);
	var ny = parseInt((parseInt(pos.y) + 15)/30);
	
	if(nx > 0 && nx < 20 && ny > 0 && ny < 20 && intersec[nx - 1][ny - 1] == undefined && !win){
		var c = document.getElementById("board");
		var ctx = c.getContext("2d");
		
		intersec[nx - 1][ny - 1] = bw;
		
		var next = bw?"Black":"White";
		document.getElementById("status").style.color = "black";
		document.getElementById("status").style.border = "none";
		document.getElementById("status").innerHTML = "Next move is: " + next;
		
		ctx.fillStyle = bw?"white":"black";
		ctx.strokeStyle = "black";	
		
		ctx.beginPath();
		ctx.arc(nx*30,ny*30,12,0,2*Math.PI);
		ctx.fill();
		ctx.stroke();
		
		judge(nx,ny,bw);
		
		bw = (bw+1) % 2;
	}
}	

function judge(x,y,p){

	var i,j;
	
	//check winning condition in backslash direction 
	for(i=0;;i++){
		if(x - i - 2 < 0 || y - i - 2 < 0 || intersec[x - i - 1][y - i - 1] != intersec[x - i - 2][y - i - 2]) break;
	}
	
	if(i == 4) win = true;
	else{
		
		for(j=0;;j++){
			if(x - i + j >= 19 || y - i + j >= 19 || intersec[x - i + j - 1][y - i + j - 1] != intersec[x - i + j][y - i + j]) break;
		}
		
		if(j >= 4) win = true;
	}
	
	//vertical direction
	for(i=0;;i++){
		if(y - i - 2 < 0 || intersec[x - 1][y - i - 1] != intersec[x - 1][y - i - 2]) break;
	}
	
	if(i == 4) win = true;
	else{
			
		for(j=0;;j++){
			if(y - i + j >= 19 || intersec[x - 1][y - i + j - 1] != intersec[x - 1][y - i + j]) break;
		}
		
		if(j >= 4) win = true;
	}
	
	//horizontal direction
	for(i=0;;i++){
		if(x - i - 2 < 0 || intersec[x - i - 1][y - 1] != intersec[x - i - 2][y - 1]) break;
	}
	
	if(i == 4) win = true;
	else{
		
		for(j=0;;j++){
			if(x - i + j >= 19 || intersec[x - i + j - 1][y - 1] != intersec[x - i + j][y - 1]) break;
		}
		
		if(j >= 4) win = true;
	}
	
	//slash direction
	for(i=0;;i++){
		if(x + i >= 19 || y - i - 2 < 0 || intersec[x + i - 1][y - i - 1] != intersec[x + i][y - i - 2]) break;
	}
	
	if(i == 4) win = true;
	else{
		
		for(j=0;;j++){
			if(x + i - j - 2 < 0 || y - i + j >= 19 || intersec[x + i - j - 1][y - i + j - 1] != intersec[x + i - j - 2][y - i + j]) break;
		}
		
		if(j >= 4) win = true;
	}
	

	if(win){
		var winner = p?"White":"Black";
		
		winnerStyle();
				
		winnerStyleInterval = setInterval(winnerStyle(), 1000);	

		document.getElementById("status").innerHTML = "  " + winner + " wins!!  ";
	}

	
}

function winnerStyle(){
		document.getElementById("status").style.color = "red";
		setTimeout(function(){
				document.getElementById("status").style.color = "#0066ff";}, 500);
}

</script>
@endsection