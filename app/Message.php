<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     // Relation between Messages and Doctor (1 to Many)
     public function doctor() {
        return $this->belongsTo('App\Doctor');
    }
}
