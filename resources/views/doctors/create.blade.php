@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="blue_bg offset-2 col-8 mt-5">Entra in specia<strong>list</strong> e registrati</div>
        <div class="white_bg offset-2 col-8 mb-5">

        <form class="form_style" action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-5">
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
                <label class="form-label" for="curriculum">Curriculum*</label>
                <input class="form-control" type="file" name="curriculum" id="curriculum" required >
            </div>

            {{-- Phone Number --}}
            <div class="mb-5">
                <label class="form-label" for="phone_number">Numero di telefono*</label>
                <input placeholder="Inserisci il tuo numero di telefono" class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
            </div>

            {{-- Email --}}
            <div class="mb-5">
                <label class="form-label" for="email">Email*</label>
                <input placeholder="Email*" class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}" readonly autocomplete="email">
            </div>

            {{-- Medical Service --}}
            <div class="mb-5">
                <label class="form-label" for="medical_service">Servizi</label>
                <textarea placeholder="Inserisci i tuoi servizi" class="form-control" name="medical_service" row="4" id="medical_service">
                    {{ old('medical_service') }}
                </textarea>
            </div>

            {{-- Description --}}
            <div class="mb-5">
                <label class="form-label" for="description">Descrizione</label>
                <textarea placeholder="inserici una descrizione" class="form-control" name="description" row="4" id="description">{{ old('description') }}</textarea>
            </div>

            {{-- Address --}}
            <div class="mb-5">
                <label class="form-label" for="address">Indirizzo*</label>
                <input placeholder="Indirizzo*" class="form-control" type="text" name="address" id="address" value="{{ Auth::user()->address }}" readonly>
            </div>

            {{-- Profile Pic --}}
            <div class="mb-5">
                <label class="form-label" for="profile_pic">Immagine del profilo*</label>
                <input class="form-control" type="file" name="profile_pic" id="profile_pic" required>
            </div>

            {{-- Specializzazione --}}
            <div class="mb-3 mt-5">
                @error('categories')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <h4>Specializzazione*:</h4>

                @foreach($categories as $category) 
                    <span class="d-inline-block mr-5">

                        <input class="checked-category" type="checkbox" name="categories[]" id="category{{ $loop->iteration }}" value="{{ $category->id}}"
                        @if ( in_array($category->id, old('categories', [])))
                        checked @endif
                        required
                        >
                        
                        <label for="category{{ $loop->iteration }}">
                            {{$category->name}}
                        </label>

                    </span>
                @endforeach
            </div>
    

            {{-- Submit --}}
            <button id="submit-button" class="btn btn-primary btn-1" type="submit">Registrati</button>

        </form>

    </div>
@endsection