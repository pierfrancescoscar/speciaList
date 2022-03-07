<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request) {

        // Data Validation
         $validator = Validator::make($request->all(),[
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'rating' => 'required',
            'content' => 'required',
        ]);

        $data = $request->all();

        $review = new Review();
        $review->fill($data);
        $review->save();

        return response()->json($data);

    }
}
