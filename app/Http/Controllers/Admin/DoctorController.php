<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Category;
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
        $categories = Category::all();

        return view('doctors.create', compact('categories'));
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
        if (array_key_exists('profile_pic', $data)) {
            $img = Storage::put('doctors_img', $data['profile_pic']);
            $data['profile_pic'] = $img;
        }

        // Curriculum control
        if (array_key_exists('curriculum', $data)) {
            $cv = Storage::put('doctors_curriculum', $data['curriculum']);
            $data['curriculum'] = $cv;
        }

        /* crreate a new doctor */
        $new_doctor = new Doctor();

        /* create slug */
        $slug_first = $data['name'] . '-' . $data['surname'];
        $slug = Str::slug($slug_first, '-');
        $count = 1;
        $base_slug = $slug;

        while (Doctor::where('slug', $slug)->first()) {
            $slug = $base_slug  . '-' . $count;
            $count++;
        }
        // dd($slug);
        /* find user by doctor slug */
        $user_id = User::where('slug', $slug)->value('id');
        $MyUser = User::find($user_id);



        /* overight doctor slug */
        $MyUser->update(['slug' => $slug]);
        $data['slug'] = $slug;

        /* create a new doctor by data */
        $new_doctor->fill($data);

        /* save te new doctor */
        $new_doctor->save();

        //salvataggio in pivot 
        if (array_key_exists('categories', $data)) {
            $new_doctor->categories()->attach($data['categories']);
        }

        return redirect()->route('admin.doctor.show', $new_doctor->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $doctor = Doctor::where('slug', $slug)->first();

        if (!$doctor) {
            abort(404);
        }

        return view('doctors.show', compact('doctor'));
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
        $categories = Category::all();

        if (!$doctor) {
            abort(404);
        }

        return view('doctors.edit', compact('doctor', 'categories'));
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
        $request->validate($this->validation_update());

        $data = $request->all();

        // Update
        $doctor = Doctor::find($id);


        /* find doctor by slug */
        $slug_doc_us = $doctor['slug'];

        $user_id = User::where('slug', $slug_doc_us)->value('id');

        $MYuser = User::find($user_id);


        // Add / Update Profile Pic if already exists

        if (array_key_exists('profile_pic', $data)) {

            if ($doctor->profile_pic) {
                Storage::delete($doctor->profile_pic);
            }

            $data['profile_pic'] = Storage::put('doctors_img', $data['profile_pic']);
        }

        // Add / Update Curriculum if already exists

        if (array_key_exists('curriculum', $data)) {

            if ($doctor->curriculum) {
                Storage::delete($doctor->curriculum);
            }

            $data['curriculum'] = Storage::put('doctors_cv', $data['curriculum']);
        }

        // Slug update ONLY IF already exists
        if ($data['name'] != $doctor->name || $data['surname'] != $doctor->surname) {
            $slug_name = $data['name'] . '-' . $data['surname'];
            $slug = Str::slug($slug_name, '-');
            $count = 1;
            $base_slug = $slug;

            // Loop if slug already exists
            while (Doctor::where('slug', $slug)->first()) {
                $slug = $base_slug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        } else {
            $data['slug'] = $doctor->slug;
        }

        // dd($data['slug']);

        /* update user row */
        $MYuser->update([
            'slug' => $data['slug'],
            'surname' => $data['surname'],
            'name' => $data['name'],
        ]);

        /* update doctor row */
        $doctor->update($data);

        // aggiornamento tabella pivot
        if (array_key_exists('categories', $data)) {
            $doctor->categories()->sync($data['categories']); // update(aggiornamento) dei tags 
        } else {
            $doctor->categories()->detach(); //nessun check selazione della form quindi pulizia
        }

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
        $doctor = Doctor::find($id);

        //controllo presenza image.  eliminare il file fisico: non lasciare l image orfana all interno della cartella posts-cover
        // if ($post->cover) {
        //     Storage::delete($post->cover);
        // }

        $doctor->delete();

        return redirect()->route('admin.doctor.create')->with('delete', $doctor->name);
    }

    // Form Validations
    private function validation_create()
    {

        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'medical_service' => 'required',
            'description' => 'nullable',
            'address' => 'nullable',
            'curriculum' => 'required|file|mimes:pdf',
            'profile_pic' => 'nullable|file|mimes:jpg,jpeg,png,bmp',
        ];
    }

    private function validation_update()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'medical_service' => 'required',
            'description' => 'nullable',
            'address' => 'nullable',
        ];
    }
}
