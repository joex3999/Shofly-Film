<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Movie;
use App\Actor;

class MoviesController extends Controller
{
    public function add()
    {
        if(!(Auth::user()->admin))
            return view('home');
    	$genres=['action',
    	'fantasy',
    	'romance',
    	'comedy',
    	'drama',
    	'period',
    	'musical',
    	'film noir'
    	];

    	$languages=['english',
    	'arabic',
    	'french',
    	'german',
    	'japanese',
    	'italian',
    	'indian',
    	'chinese'
    	];

    	return view('movies.add', compact('genres', 'languages'));
    }

    public function store(Request $request)
    {
        if(!(Auth::user()->admin))
            return view('home');
    	$this->validate($request, [
            'name'=>'required'
            ]);

    	$movie = new Movie;

    	$movie->name=$request->name;

    	$movie->language=$request->language;

    	$movie->date=date('m-d-y', strtotime($_POST['date']));

    	$movie->director=$request->director;

    	$movie->category=$request->category;

        $user=Auth::user();

        $user->addMovie($movie);
    	
    	$movies=DB::table('movies')->where('user_id', '=', $user->id)->get();
        return view('movies', compact('movies'));
    }

    public function view()
    {
        if(!(Auth::user()->admin))
            return view('home');
        $user=Auth::user();
       
        $movies=DB::table('movies')->where('user_id', '=', $user->id)->get();
        return view('movies', compact('movies'));
    }

    public function delete(Request $request, $id)
    {    
        $user=Auth::user();
        if(!(Auth::user()->admin))
            return view('home');
        $movie=Movie::find($id);
        $movie->forcedelete();
        
        $movies=DB::table('movies')->where('user_id', '=', $user->id)->get();
        return view('movies', compact('movies'));
    }
}
