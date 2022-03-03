<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function index() {

        $doctors = Doctor::all();

        return response()->json($doctors);

    }
}
