<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    // Fillable
    protected $fillable = [
        'name', 'surname', 'slug', 'curriculum', 'phone_number', 'email', 'medical_service', 'description', 'address', 'profile_pic',
    ];

    // Relation between Doctors and Categories (Many to Many)
    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    // Relation between Doctors and Reviews (1 to Many)
    public function reviews() {
        return $this->hasMany('App\Review');
    }

     // Relation between Doctors and Messages (1 to Many)
     public function messages() {
        return $this->hasMany('App\Message');
    }

     // Relation between Doctors and Subscriptions (Many to Many)
     public function subscriptions() {
        return $this->belongsToMany('App\Subscription');
    }
}
