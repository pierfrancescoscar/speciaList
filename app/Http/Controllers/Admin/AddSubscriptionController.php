<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Doctor;
use App\Subscription;
use App\Testodicapo;
use Carbon\Carbon;

class AddSubscriptionController extends Controller
{
    public function store($slug, $type) {

        $doctor = Doctor::where('slug', $slug)->first();

        $sub = Subscription::where('type', $type)->first();

        $existSub = DB::table('doctor_subscription')->where('doctor_id',$doctor['id'])->latest('id')->first();

        if ( $existSub ) {

            $lastSub = DB::table('doctor_subscription')->where('doctor_id',$doctor['id'])->latest('id')->first();

            $lastDate = $lastSub->end_date;

            $lastCarbonDate = Carbon::parse($lastDate);

            if (Carbon::now() <= $lastCarbonDate) {
                
                $date_end = $lastCarbonDate->addHours($sub['duration'])->format('d-m-Y');

                $doctor->subscriptions()->attach($sub['id'], ['end_date' => $date_end]);

            } else {

                $new_date_end = Carbon::now()->addHours($sub['duration'])->format('d-m-Y');

                $doctor->subscriptions()->attach($sub['id'], ['end_date' => $new_date_end]);
            }

        }
        else {

            $new_date_end = Carbon::now()->addHours($sub['duration'])->format('d-m-Y');

            $doctor->subscriptions()->attach($sub['id'], ['end_date' => $new_date_end]);
        }


        return redirect()->route('admin.doctor.show', $doctor->slug);

    }
}
