<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Message;
use App\Mail\ContactDoctorMessage;

class MessageController extends Controller
{
    public function store(Request $request) {

        //  Data Validation
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'object' => 'required',
            'content' => 'required',
        ]);

        $data = $request->all();

        // Save to DB
        $contact = new Message();
        $contact->fill($data);
        $contact->save();

        return response()->json($data);
    }
}
