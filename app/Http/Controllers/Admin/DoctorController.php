<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
>>>>>>> master

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('doctors.create');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation_create());

        $data = $request->all();

        // Profile Pic control
        if(array_key_exists('profile_pic', $data)) {
            $img = Storage::put('doctors_img', $data['profile_pic']);
            $data['profile_pic'] = $img;
        }

        // Curriculum control
        if(array_key_exists('curriculum', $data)) {
            $cv = Storage::put('doctors_curriculum', $data['curriculum']);
            $data['curriculum'] = $cv;
        }

        $new_doctor = new Doctor();

        // Slug validity check
        $slug_name = $data['name'] . '-' . $data['surname'];
        $slug = Str::slug($slug_name, '-');
        $count = 1;

        while(Doctor::where('slug', $slug)->first()) {
            $slug .= '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;

        $new_doctor->fill($data);

        $new_doctor->save();

        return redirect()->route('admin.doctor.show', $new_doctor->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
<<<<<<< HEAD

    {
        $doctor = Doctor::where('slug', '=', $slug)->first();


        if (!$doctor) {
            abort(404);
        }

        return view('admin.doctors.show', compact('doctor'));
=======
    {
        $doctor = Doctor::where('slug', $slug)->first();

        if(! $doctor) {
            abort(404);
        }

        return view('doctors.show', compact('doctor'));
>>>>>>> master
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        if(! $doctor) {
            abort(404);
        }

        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->validation_create());

        $data = $request->all();

        // dump($data);

        // Update
        $doctor = Doctor::find($id);

        // Add / Update Profile Pic if already exists

        if(array_key_exists('profile_pic', $data)) {

            if($doctor->profile_pic) {
                Storage::delete($doctor->profile_pic);
            }

            $data['profile_pic'] = Storage::put('doctors_img', $data['profile_pic']);
        }

        // Add / Update Curriculum if already exists

        if(array_key_exists('curriculum', $data)) {

            if($doctor->curriculum) {
                Storage::delete($doctor->curriculum);
            }

            $data['curriculum'] = Storage::put('doctors_cv', $data['curriculum']);
        }

        // Slug update ONLY IF already exists

        if($data['name'] != $doctor->name || $data['surname'] != $doctor->surname ) {
            $slug_name = $data['name'] . '-' . $data['surname'];
            $slug = Str::slug($slug_name, '-');
            $count = 1;
            $base_slug = $slug;

        // Loop if slug already exists
        while(Doctor::where('slug', $slug)->first()) {
            $slug = $base_slug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;

        }
        else {
            $data['slug'] = $doctor->slug;
        }

        $doctor->update($data);

        return redirect()->route('admin.doctor.show', $doctor->slug);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Form Validations
    private function validation_create() {

        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'medical_service' => 'nullable',
            'description' => 'nullable',
            'address' => 'nullable',
            'profile_pic' => 'nullable',
            'curriculum' => 'required|file|mimes:pdf',
            'profile_pic' => 'file|mimes:jpg,jpeg,png,bmp',
        ];

    }

}
