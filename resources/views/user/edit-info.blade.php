@extends('layout')

@section('content')
	<h1>Edit My Info</h1>
	

	<ul class="list-group">
		<li class="list-group-item">{{$user->name}}<a href="/{{$user->id}}/edit-info/name" class="pull-right">Edit Name</a></li>
		<li class="list-group-item">{{$user->birthdate}}<a href="/{{$user->id}}/edit-info/birthdate" class="pull-right">Edit birthdate</a></li>
		<li class="list-group-item">{{$user->email}}<a href="/{{$user->id}}/edit-info/email" class="pull-right">Change Email</a></li>
	</ul>
	<hr>
	<a href="/{{$user->id}}/edit-info/password" class="pull-right">Change Password</a>
	
	
@stop