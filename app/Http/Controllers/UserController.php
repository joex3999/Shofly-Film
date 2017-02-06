<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Movie;
use App\Actor;

class UserController extends Controller
{
    public function editInfo ()
    {
    	$user=Auth::user();
    	return view('user.edit-info', compact('user'));
    }

    public function editName ()
    {
    	$user=Auth::user();
    	return view('user.edit-name', compact('user'));
    }

    public function editBirthdate ()
    {
    	$user=Auth::user();
    	return view('user.edit-birthdate', compact('user'));
    }

    public function editEmail ()
    {
    	$user=Auth::user();
    	return view('user.edit-email', compact('user'));
    }

    public function editPassword ()
    {
    	$user=Auth::user();
    	return view('user.edit-password', compact('user'));
    }

    public function updateName (Request $request)
    {
    	$user=Auth::user();
    	$user->name=$request->name;
    	$user->save();
    	return view('user.edit-info', compact('user'));
    }

    public function updateBirthdate (Request $request)
    {
    	$user=Auth::user();
    	$user->birthdate=$request->birthdate;
    	$user->save();
    	return view('user.edit-info', compact('user'));
    }

    public function updateEmail (Request $request)
    {
    	$user=Auth::user();
    	$user->email=$request->email;
    	$user->save();
    	return view('user.edit-info', compact('user'));
    }

    public function reviews()
    {
        $user=Auth::user();
       
        $reviews=DB::table('movie_user')->where('user_id', '=', $user->id)->get();
        return view('reviews', compact('reviews'));
    }

    public function updatePassword (Request $request)
    {
    	$user=Auth::user();
    	if(bcrypt($request->oldPassword)!=bcrypt($user->password))
    		return $request;
    	if(bcrypt($request->password)!=bcrypt($request->confirm))
    		return $request;
    	$user->password=bcrypt($request->password);
    	$user->save();
    	return view('user.edit-info', compact('user'));
    }
}
