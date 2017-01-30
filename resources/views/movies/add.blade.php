<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <title>Create Movie</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
<style>

select {
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#888;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}

</style>
        
    </head>
    <body>

    <div class="container">
        
        <div class="row">

    <div class=".col-md-6 col-md-offset-3">
        
<h3>Add a New Movie!</h3>


<hr>



<form method="POST" action="/movies/add">    

    {{csrf_field()}}
    
    <div class="form-group">
<p>Name</p>
<textarea name="name" class="form-control"></textarea>
    </div>

<hr>    

<label>
    <select name="language">
        @foreach($languages as $language)
        <option href="">{{$language}}</option>
        @endforeach
    </select>
</label>
<hr>

<label>
    <select name="category">
        @foreach($genres as $genre)
        <option href="">{{$genre}}</option>
        @endforeach
    </select>
</label>

<hr>

    <!--<p>release date</p>
        <div class="form-group">
            <div class="col-md-6">
                <input type="date" class="form-control" name="date" required autofocus>                    
            </div>
       </div>-->

       <div class="form-group">
    <p>date</p>
<textarea type="date" name="date" class="form-control"></textarea>
    </div>


<hr>
    <div class="form-group">
    <p>director</p>
<textarea name="director" class="form-control"></textarea>
    </div>
    <div class="form-group">
<button type="add" class="btn btn-primary">Add Movie!</button>
    </div>
</form>

@foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach


    </div>
</div>

    </div>
    
    </body>
</html>