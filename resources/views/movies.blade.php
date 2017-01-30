<style type="text/css">
	button {
     background:none!important;
     border:none; 
     padding:0!important;
     font: inherit;
     /*border is optional*/
     border-bottom:1px solid #444; 
     cursor: pointer;
	}
</style>
@extends('layout')

@section('content')
									<div>
                                        <a class="pull-right" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
	<div class="flex-center position-ref full-height">
           
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                	@endif
                </div>
    </div>
	<div class="row">

	<div class=".col-md-6 col-md-offset-3">
		<h1>Edit Movies</h1>

<ul class="list-group">
	<li class="list-group-item"><a href="/movies/add">+</a></li>
	@foreach($movies as $movie)

		<li class="list-group-item"><a href="/movies/{{$movie->id}}">{{ $movie->name }}</a>
			<form class="pull-right" method="POST" action="/movies/{{$movie->id}}/remove"> 
				{{method_field('DELETE')}}
				{!!csrf_field()!!}
				<button>remove</button>
			</form>
		</li>

	@endforeach
</ul>

<hr>

@foreach($errors->all() as $error)
	<li>{{$error}}</li>
@endforeach


	</div>
</div>
@stop

