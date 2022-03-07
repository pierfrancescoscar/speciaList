<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->category;
        return view('guests.specialist', compact('data'));
    }
}
