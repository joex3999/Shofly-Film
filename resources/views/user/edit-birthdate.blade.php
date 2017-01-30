@extends('layout')

@section('content')
<h1>Update Birthdate</h1>
<hr>
	<form method="POST" action="/{{$user->id}}/edit-info/birthdate">
		{{ method_field('PATCH') }}
		{{csrf_field()}}
	
		<div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate" class="col-md-4 control-label">Birthdate</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}" required autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
        </div>

		<div class="form-group"> 
			<button type="submit" class="btn btn-primary">Update Birthdate!</button>
		</div>
	</form>
	
	@foreach($errors->all() as $error)
		<li>{{$error}}</li>
	@endforeach
@stop