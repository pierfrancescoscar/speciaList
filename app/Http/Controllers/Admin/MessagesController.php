<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Doctor;

class MessagesController extends Controller
{
    public function show($slug) {

        $doctorMesssages = Doctor::where('slug', $slug)->with('messages')->first();
        
        return view('doctors.messages', compact('doctorMesssages'));

    }
}
