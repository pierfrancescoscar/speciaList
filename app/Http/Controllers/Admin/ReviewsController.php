<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Doctor;

class ReviewsController extends Controller
{
    public function show($slug) {

        $doctorReviews = Doctor::where('slug', $slug)->with('reviews')->first();
        
        return view('doctors.reviews', compact('doctorReviews'));

    }
}
