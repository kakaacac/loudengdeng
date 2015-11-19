@extends('base')
@section('title')
<title>Login</title>
@endsection
@section('content')
<div id="login">

{!! Form::open(array('url'=>'/auth/login')) !!}
{!! Form::label('username','Username') !!}<br>
{!! Form::text('username',null) !!}<br>
{!! Form::label('password','Password') !!}<br>
{!! Form::password('password',null) !!}<br>
{!! Form::submit('LOGIN') !!}
{!! Form::close() !!}


</div>
@endsection
<div>
@if($errors->has())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
</div>
