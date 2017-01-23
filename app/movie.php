<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
use App\movie;
use App\actor;
class movie extends Model
{
    public function reviewedBy(){
    	return $this->hasMany(User::class);
    }
     public function addedBy(){ //admin function
        
        return $this->belongsTo(movie::class);
    }

       public function actors(){ 
        
        return $this->hasMany(actor::class);
    }
}
}
