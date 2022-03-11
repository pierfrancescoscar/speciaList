<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Subscription;

class SubscriptionController extends Controller
{
    public function show($slug, $type) {

        $doctor = Doctor::where('slug', $slug)->first();

        $sub = Subscription::where('type', $type)->first();
        
        return view('doctors.paymentform', compact('doctor', 'sub'));

    }
}
