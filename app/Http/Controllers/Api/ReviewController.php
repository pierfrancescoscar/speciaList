<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        $review = new Review();
        $review->fill($data);
        $review->save();

        return response()->json($data);

    }
}
