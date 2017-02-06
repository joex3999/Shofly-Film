<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Movie;
use App\Actor;
use Carbon\Carbon;
class ReviewsController extends Controller
{
    
    public function review(){
    	return view ('review');
    }
      public function remove(){
        return view ('remove');
    }
    public function store(Request $req){
    	//return "is";
        // temp user id until registeration is done 
    	$user_id = Auth::user()->id;
    	$movie_id = $req->movie_id;
    	$text = $req->text;
    	$date = Carbon::now();
    	$rating = $req->rating;
    	$user = User::find($user_id);
    	$user->reviewed()->attach($movie_id,['text'=>$text,'date'=>$date,'rating'=>$rating]);
    
        $reviews=DB::table('movie_user')->where('user_id', '=', $user->id)->get();
        return view('reviews', compact('reviews'));
    }
    public function edit($id){
        return view ('edit',compact('id'));
    }
     public function update(Request $req,$id){

        $text = $req->text;
        $rating=$req->rating;
    
        $user_id=Auth::user()->id;
        $user= Auth::user();
        $date = Carbon::now();
        User::find($user_id)->reviewed()->updateExistingPivot($id,['text'=>$text,'date'=>$date,'rating'=>$rating]);
        $reviews=DB::table('movie_user')->where('user_id', '=', $user->id)->get();
        return view('reviews', compact('reviews'));
    }
         public function delete(Request $req,$id){
       
     

        $user_id=Auth::user()->id;
       // $reviews=DB::table('movie_user')->where('user_id', '=', $user->id)->get();
        User::find($user_id)->reviewed()->detach($id);
        $user = Auth::user();
        $reviews=DB::table('movie_user')->where('user_id', '=', $user->id)->get();
        return view('reviews', compact('reviews'));
    }
}
