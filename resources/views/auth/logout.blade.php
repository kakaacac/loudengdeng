@extends('base')
@section('title')
<title>Logout</title>
@endsection
@section('content')
{!! Form::open(array('url'=>'/auth/logout','method'=>'get')) !!}
{!! Form::submit('LOG OUT') !!}
{!! Form::close() !!}
@endsection