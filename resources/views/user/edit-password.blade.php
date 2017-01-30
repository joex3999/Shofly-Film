@extends('layout')

@section('content')
<h1>Change Password</h1>
    <form method="POST" action="/{{$user->id}}/edit-info/password">
        {{ method_field('PATCH') }}
        {{csrf_field()}}
    
        <div class="form-group">
           old password <input id="oldPassword" name="oldPassword" type="password" class="form-control"></input>
        </div>

        <div class="form-group">
           new password <input id="password" name="password" type="password" class="form-control"></input>
        </div>

        <div class="form-group">
           confirm password <input id="confirm" name="confirm" type="password" class="form-control"></input>
        </div>

        <div class="form-group"> 
            <button type="submit" class="btn btn-primary">Change Password!</button>
        </div>
    </form>
    
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
@stop