@extends('layout')
@section('content')
			<h1>Add a new Review</h1>
			<form method='POST' action = "/Review/Post">
				{{ csrf_field() }}
				<div class ="form-group">
			
					<h1> Text</h1><textarea name = "text"></textarea>
					<hr>
					<h1>Rating</h1><textarea name = "rating"></textarea>
					<hr>
					<h1>Movie_ID</h1><textarea name = "movie_id"></textarea>
	</div>
								<div class ="form-group">
					<button type="submit" class = "btn btn-primary"> Add Review </button>
				</div>
			</form>
			
@stop