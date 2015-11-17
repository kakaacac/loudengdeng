<!DOCTYPE html>
<html>
<head>
<title>Hello!</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="title">
<h1>
Lou Dengdeng's Blog
</h1>
<img src="images/sb.gif" alt="SB">
</div>
<nav><a href="home.html" id="first">Home</a><a href="gomoku.html">Gomoku</a><a href="#">To Do List</a><a href="#">About</a></nav>

<div id="login">

{!! Form::open(array('url'=>'/auth/login')) !!}
{!! Form::label('username','Username') !!}
{!! Form::text('username',null) !!}
{!! Form::label('password','Password') !!}
{!! Form::text('password',null) !!}
{!! Form::submit('LOGIN') !!}
{!! Form::close() !!}


</div>

<div>
@if($errors->has())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
</div>
</body>
</html>