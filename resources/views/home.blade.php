@extends('base')
@section('title')
<title>Home</title>
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="/css/home.css">
@endsection
@section('content')
<br><br>
<div id="content">
<p>A personal and experimental website powered by Laravel 5, simply for practising both front-end and back-end programming skills.</p>
<p>Source code can be viewed at <span class="emphasized">Github</span>: <a href="https://github.com/kakaacac/loudengdeng" target="_blank">https://github.com/kakaacac/loudengdeng</a></p>
<h3><span class="emphasized">Upcoming improvements and functionalities:</span></h3>
<ul><span class="emphasized">Front-end:</span>
<li>Improve UI using Bootstrap and jQuery (IN PROGRESS)</li>
<li>Improve ToDoList layout</li>
<li>...</li>
</ul>
<ul><span class="emphasized">Back-end:</span>
<li>Implement middleware-protection (IN PROGRESS)</li>
<li>Implement email confirmation for registration</li>
<li>Implement password reset</li>
<li>Allow user modify to-do-list items</li>
<li>...</li>
</ul>
<ul><span class="emphasized">Others:</span>
<li>Write a python spider to retrieve articles from <a href="http://jandan.net/author/tinleo" target="_blank">http://jandan.net/author/tinleo</a> (Because 'tinleo' is the real owner of this website)</li>
</ul>
</div>
@endsection