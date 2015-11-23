<!DOCTYPE html>
<html>
<head>
@yield('title')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<meta name="description" content="A personal and experimental website built for our lovely and pretty Miss Lou Dengdeng.">
<meta name="author" content="Jayden Chan">
<!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
<link rel="stylesheet" type="text/css" href="/css/style.css">
@yield('style')
</head>

<body>
<div id="title">
<h1>
Lou Dengdeng's Blog
</h1>
<img src="/images/sb.gif" alt="SB">
</div>
<nav><a href="/home" id="first">Home</a><a href="/gomoku">Gomoku</a><a href="/auth/login">To Do List</a><a href="#">About</a></nav>
@yield('content')
</body>
</html>