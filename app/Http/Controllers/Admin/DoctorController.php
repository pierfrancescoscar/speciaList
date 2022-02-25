<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $slug = Str::slug($data['name'], $data['surname'], '-');
        $count = 1;

        while(Doctor::where('slug', $slug)->first()) {
            $slug = '-' . $count;
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
