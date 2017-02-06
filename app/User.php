<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\movie;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthdate'
    ];
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function reviewed(){ 
        return $this->belongsToMany(Movie::class)->withPivot('text','date','rating')->withTimestamps();
    }
    public function movies(){// the admin function . Should check this later to make sure this relation realtes only to the admin
        return $this->hasMany(Movie::class);
    }

    public function addMovie(Movie $movie){


        return $this->movies()->save($movie);

    }
}