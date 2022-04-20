<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('guests.home', compact('categories'));
    }
}
