<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // Relation between Subscriptions and Doctors (Many to Many)
    public function doctors() {
        return $this->belongsToMany('App\Doctor', 'doctor_subscription')->withPivot('end_date');
    }
}
