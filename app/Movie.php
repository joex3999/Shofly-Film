<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
use App\movie;
use App\actor;
class Movie extends Model
{
    public function reviewedBy(){
    	return $this->belongsToMany(User::class)->withPivot('text','date','rating')->withTimestamps();
    }
     public function addedBy(){ //admin function
        
        return $this->belongsTo(movie::class);
    }

       public function actors(){ 
        
        return $this->hasMany(actor::class);
    }
}
