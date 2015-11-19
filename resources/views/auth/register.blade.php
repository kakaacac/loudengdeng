@extends('base')
@section('title')
<title>Login</title>
@endsection
@section('content')
<div id="register">

{!! Form::open(array('url'=>'/auth/register')) !!}
{!! Form::label('username','Username') !!}<br>
{!! Form::text('username',null) !!}<br>
{!! Form::label('email','Email') !!}<br>
{!! Form::email('email',null) !!}<br>
{!! Form::label('password','Password') !!}<br>
{!! Form::password('password',null) !!}<br>
{!! Form::label('password_confirmation','Confirm Password') !!}<br>
{!! Form::password('password_confirmation',null) !!}<br>
{!! Form::submit('Register') !!}
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