@extends('layout')
@section('content')
			<h1>Edit a Review</h1>
			<form method='POST' action = "/Reviews/{{$id}}/update">
				{{ csrf_field() }}
				{{method_field('PATCH')}} 
				<div class ="form-group">
			
					<h1> Text</h1><textarea name = "text"></textarea>
					<hr>
					<h1>Rating</h1><textarea name = "rating"></textarea>
					<hr>
	
					<hr>
					
	</div>
								<div class ="form-group">
					<button type="submit" class = "btn btn-primary"> Update Review </button>
				</div>
			</form>
			
@stop