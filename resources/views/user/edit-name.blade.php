@extends('layout')

@section('content')
<h1>Update Name</h1>
<hr>
	<form method="POST" action="/{{$user->id}}/edit-info/name">
		{{ method_field('PATCH') }}
		{{csrf_field()}}
	
		<div class="form-group">
			<textarea name="name" class="form-control">{{$user->name}}</textarea>
		</div>

		<div class="form-group"> 
			<button type="submit" class="btn btn-primary">Update Name!</button>
		</div>
	</form>
	
	@foreach($errors->all() as $error)
		<li>{{$error}}</li>
	@endforeach
@stop