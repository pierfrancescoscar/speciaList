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
                <label class="form-label" for="name">Nome</label>
                <input placeholder="Nome" class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}" readonly>
            </div>

            {{-- Surname --}}
            <div class="mb-5">
                @error('surname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="surname">Cognome</label>
                <input placeholder="Cognome*" class="form-control" type="text" name="surname" id="surname" value="{{ Auth::user()->surname }}" readonly>
            </div>

            {{-- Curriculum --}}
            <div class="mb-5">
                @error('curriculum')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="curriculum">Curriculum*</label>
                <input class="form-control" type="file" name="curriculum" id="curriculum">
            </div>

            {{-- Phone Number --}}
            <div class="mb-5">
                @error('phone_number')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="phone_number">Numero di telefono*</label>
                <input placeholder="Inserisci il tuo numero di telefono" class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
            </div>

            {{-- Email --}}
            <div class="mb-5">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="email">Email*</label>
                <input placeholder="Email*" class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}" readonly>
            </div>

            {{-- Medical Service --}}
            <div class="mb-5">
                @error('medical_service')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="medical_service">Servizi*</label>
                <textarea placeholder="Inserisci i tuoi servizi" class="form-control" name="medical_service" row="4" id="medical_service">{{ old('medical_service') }}</textarea>
            </div>

            {{-- Description --}}
            <div class="mb-5">
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="description">Descrizione*</label>
                <textarea placeholder="" class="form-control" name="description" row="4" id="description">{{ old('description') }}</textarea>
            </div>

            {{-- Address --}}
            <div class="mb-5">
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="address">Indirizzo</label>
                <input placeholder="Indirizzo*" class="form-control" type="text" name="address" id="address" value="{{ Auth::user()->address }}" readonly>
            </div>

            {{-- Profile Pic --}}
            <div class="mb-5">
                @error('profile_pic')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="profile_pic">Immagine del profilo*</label>
                <input class="form-control" type="file" name="profile_pic" id="profile_pic">
            </div>

            {{-- specializzazione --}}
            <div class="mb-3 mt-5">
                <h4>Specializzazione:</h4>

                @foreach($categories as $category) 
                    <span class="d-inline-block mr-5">
                        <input type="checkbox" name="categories[]" id="category{{ $loop->iteration }}" value="{{ $category->id}}"
                        {{-- @if(in_array($tag->id, old('tags', []))) checked @endif --}}
                        >
                        <label for="category{{ $loop->iteration }}">
                            {{$category->name}}
                        </label>
                    </span>
                @endforeach
                @error('categories')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    

            {{-- Submit --}}
            <button class="btn btn-primary" type="submit">Registrati</button>
            

        </form>
    </div>
@endsection