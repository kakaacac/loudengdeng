@extends('base')
@section('title')
<title>To Do List</title>
@endsection
@section('content')

<br>
<p>Hello, {{ $username }} !</p>
{!! Form::open(array('action'=>'ToDoListController@store')) !!}
{!! Form::label('taskname','Task') !!}<br>
{!! Form::text('taskname',null) !!}<br>
{!! Form::label('description','Description') !!}<br>
{!! Form::textarea('description',null) !!}<br>
{!! Form::label('deadline','Deadline') !!}<br>
{!! Form::date('deadline',\Carbon\Carbon::now()) !!}<br><br>
{!! Form::label('important','Important') !!}
{!! Form::checkbox('important',null) !!}<br><br>
{!! Form::submit('ADD TASK') !!}<br>
{!! Form::close() !!}
<hr>
@if( ! empty($list))
@foreach( $list as $item )
@if( $item->important == '1' )
<div style="color:red">
<h3>{{ $item->taskname }}</h3>
<h4>{{ $item->deadline }}</h4>
<h5>{{ $item->description }}</h5>
</div>
<hr>
@else
<div>
<h3>{{ $item->taskname }}</h3>
<h4>{{ $item->deadline }}</h4>
<h5>{{ $item->description }}</h5>
</div>
<hr>
@endif
@endforeach
@endif
{!! Form::open(array('url'=>'/auth/logout','method'=>'get')) !!}
{!! Form::submit('LOG OUT') !!}
{!! Form::close() !!}
@endsection