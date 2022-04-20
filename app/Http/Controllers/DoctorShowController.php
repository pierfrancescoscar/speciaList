<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class DoctorShowController extends Controller
{
    public function show($slug) {

        $doctor = Doctor::where('slug', $slug)->first();
        
        return view('guests.show', compact('doctor'));

    }
}
