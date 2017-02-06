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
		<h1>Edit Reviews</h1>

<ul class="list-group">
	<li class="list-group-item"><a href="/review">+</a></li> 
	@foreach($reviews as $review)

		<li class="list-group-item"><a href="#">{{ $review->text }}</a>
			<form class="pull-right" method="POST" action="/Reviews/{{$review->movie_id}}/remove"> 
				{{method_field('DELETE')}}
				{!!csrf_field()!!}
				<button >Remove</button>
			     
            </form>

            <form class="pull-right" method="GET" action="/Reviews/{{$review->movie_id}}/update"> 
                  {!!csrf_field()!!}
                <button>Update</button>
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

