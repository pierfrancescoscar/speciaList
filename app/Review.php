<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    /* fillable */
    protected $fillable = [
        'doctor_id',
        'name',
        'surname',
        'email',
        'rating',
        'content',
        'date',
        'slug',
    ];

     // Relation between Reviews and Doctors (1 to Many)
    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }


}
