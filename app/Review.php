<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     // Relation between Reviews and Doctors (1 to Many)
     public function doctor() {
        return $this->belongsTo('App\Doctor');
    }
}
