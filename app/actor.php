<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\actor;
class actor extends Model
{
     public function movie(){ 
       
        return $this->belongsTo(actor::class);
    }
}
