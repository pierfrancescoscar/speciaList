@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Entra in speciaList e registrati.</h1>
       
        @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif

        <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-5">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Nome" class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
            </div>

            {{-- Surname --}}
            <div class="mb-5">
                @error('surname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Cognome*" class="form-control" type="text" name="surname" id="surname" value="{{ Auth::user()->surname }}">
            </div>

            {{-- Curriculum --}}
            <div class="mb-5">
                @error('curriculum')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input class="form-control" type="file" name="curriculum" id="curriculum">
            </div>

            {{-- Phone Number --}}
            <div class="mb-5">
                @error('phone_number')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Numero di telefono*" class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
            </div>

            {{-- Email --}}
            <div class="mb-5">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Email*" class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}">
            </div>

            {{-- Medical Service --}}
            <div class="mb-5">
                @error('medical_service')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <textarea placeholder="Servizi*" class="form-control" name="medical_service" row="4" id="medical_service">{{ old('medical_service') }}</textarea>
            </div>

            {{-- Description --}}
            <div class="mb-5">
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <textarea placeholder="Descrizione*" class="form-control" name="description" row="4" id="description">{{ old('description') }}</textarea>
            </div>

            {{-- Address --}}
            <div class="mb-5">
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Indirizzo*" class="form-control" type="text" name="address" id="address" value="{{ Auth::user()->address }}">
            </div>

            {{-- Profile Pic --}}
            <div class="mb-5">
                @error('profile_pic')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input class="form-control" type="file" name="profile_pic" id="profile_pic">
            </div>
           
            {{-- Submit --}}
            <button class="btn btn-primary" type="submit">Registrati</button>

        </form>
    </div>
@endsection