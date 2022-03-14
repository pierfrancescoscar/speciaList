<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index($categoria) {

        $doctors = DB::table('doctors')
        ->join('category_doctor', 'doctors.id', '=' , 'category_doctor.doctor_id')
        ->join('categories', 'categories.id', '=', 'category_doctor.category_id')
        ->where('categories.name', 'LIKE', '%'.$categoria.'%')
        ->select('doctors.name as doctor', 'doctors.surname', 'categories.name as category', 'doctors.profile_pic', 'doctors.slug')
        ->get();
        /* ->where('categories:name', 'Medicina d’emergenza-urgenza') */
        /* SELECT * 
            FROM doctors
            JOIN category_doctor 
            ON category_doctor.doctor_id = doctors.id
            JOIN categories
            ON category_doctor.category_id = categories.id */

        return response()->json($doctors);
    }
}
