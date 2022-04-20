<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function index() {

        $doctors = Doctor::with(['categories'])->select(['name', 'slug', 'id', 'surname'])->get();
        /* $doctors = Doctor::whereHas('categories')
    ->orWhereHas('Medicina d’emergenza-urgenza')
    ->get(); */
        /* ->where('categories:name', 'Medicina d’emergenza-urgenza') */

        return response()->json($doctors);
    }
}