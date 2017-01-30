@extends('layout')

@section('content')
<h1>Update Email</h1>
<hr>
	<form method="POST" action="/{{$user->id}}/edit-info/email">
		{{ method_field('PATCH') }}
		{{csrf_field()}}
	
		<div class="form-group">
			<textarea name="email" class="form-control">{{$user->email}}</textarea>
		</div>

		<div class="form-group"> 
			<button type="submit" class="btn btn-primary">Update Email!</button>
		</div>
	</form>
	
	@foreach($errors->all() as $error)
		<li>{{$error}}</li>
	@endforeach
@stop