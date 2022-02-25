@extends('layouts.app')

@section('content')

    <section class="container">

        <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            {{-- name --}}
            <div class="mb-3">

                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" placeholder="Nome">

            </div>

            {{-- surname --}}
            <div class="mb-3">

                <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname', $doctor->surname) }}">

            </div>

            {{-- curriculum --}}

            {{-- phone number --}}
            <div class="mb-3">

                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $doctor->phone_number) }}">

            </div>

            {{-- email --}}
            <div class="mb-3">

                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $doctor->email) }}">

            </div>

            {{-- medicas_services --}}
            <div class="mb-3">

                <textarea name="medicas_services" id="medicas_services" class="form-control" rows="4">{{ old('medicas_services', $doctor->medicas_services) }}</textarea>

            </div>

            {{-- description --}}
            <div class="mb-3">

                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $doctor->description) }}</textarea>

            </div>

            {{-- address --}}
            <div class="mb-3">

                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $doctor->address) }}">

            </div>

            {{-- profile pic --}}

            <div class="mb-2">

                @if ($doctor->profile_pic)

                    <img src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name ."-" .$doctor->surname }}">
                @endif

                <input class="form-control-file" type="file" name="cover" id="cover">
            </div>
        
            {{-- submit --}}
            <button type="submit" class="btn btn-success">Modifica profilo</button>
        
        </form>

    </section>

@endsection