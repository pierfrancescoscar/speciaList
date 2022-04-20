<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorySearchController extends Controller
{
    public function store(Request $request) {

        $data = $request->All();

        return response()->json($data);

    }
}
