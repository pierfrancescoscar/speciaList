@extends('layouts.app')

@section('content') 
        <div class="container">
            <div class="blue_bg offset-2 col-8 mt-5">Modifica il tuo profilo specia<strong>list</strong></div>
            <div class="white_bg offset-2 col-8 mb-5">

                {{-- <h1 class="mb-5">Modifica il tuo profilo speciaList.</h1> --}}
            
                @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @endif

                <form class="form_style" action="{{ route('admin.doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Name --}}
                    <div class="mb-4">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-label" for="name">Nome</label>
                        <input placeholder="Nome" class="form-control" type="text" name="name" id="name" value="{{ old('name', $doctor->name)}}">
                    </div>

                    {{-- Surname --}}
                    <div class="mb-4">
                        @error('surname')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-label" for="surname">Cognome</label>
                        <input placeholder="Cognome*" class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', $doctor->surname)}}">
                    </div>

                    {{-- Curriculum --}}
                    <div class="mb-4">
                        @error('curriculum')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label" for="curriculum">Curriculum</label>

                        @if($doctor->curriculum)
                            <a href="{{ asset('storage/' . $doctor->curriculum) }}">Clicca qui per visualizzare il CV</a>
                            <input class="form-control" type="file" name="curriculum" id="curriculum" value="{{ old('curriculum', $doctor->curriculum) }}">
                        @else
                        <input class="form-control" type="file" name="curriculum" id="curriculum">
                        @endif

                    </div>

                    {{-- Phone Number --}}
                    <div class="mb-4">
                        @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label" for="phone_number">Numero di telefono</label>

                        <input placeholder="Numero di telefono*" class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $doctor->phone_number) }}">
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label" for="email">Email</label>

                        <input placeholder="Email*" class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                    </div>

                    {{-- Medical Service --}}
                    <div class="mb-4">
                        @error('medical_service')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label" for="medical_service">Servizi</label>

                        <textarea placeholder="Servizi*" class="form-control" name="medical_service" row="4" id="medical_service">{{ old('medical_service', $doctor->medical_service) }}</textarea>
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-label" for="description">Descrizione</label>
                        <textarea placeholder="Descrizione*" class="form-control" name="description" rows="4" id="description">{{ old('description', $doctor->description) }}</textarea>
                    </div>

                    {{-- Address --}}
                    <div class="mb-4">
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label" for="address">Indirizzo</label>

                        <input placeholder="Indirizzo*" class="form-control" type="text" name="address" id="address" value="{{ old('address', $doctor->address) }}">
                    </div>

                    {{-- Profile Pic --}}
                    <div class="mb-4">
                        @error('profile_pic')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label" for="profile_pic">Immagine del profilo</label>

                        @if($doctor->profile_pic)
                            <img class="w-25" src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name }}">
                        @endif

                        <input class="form-control" type="file" name="profile_pic" id="profile_pic">
                    </div>

                    {{-- Category --}}
                    <div class="mb-5">
                        @error('medical_service')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="category">Specializzazione</label>
                        <select id="category" name="categories[]" multiple="multiple" size="5" class="form-control">
                            @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if($doctor->categories->contains($category->id)) selected @endif>
                                        {{$category->name}}
                                    </option>
                            @endforeach
                        </select>
                        <span style="font-size: 0.7em;">(Premere CTRL/COMMAND per le scelte multiple)</span>
                    </div>
                
                    {{-- Submit --}}
                    <button class="btn-1 p-2" type="submit">Modifica il tuo profilo</button>

                </form>
            </div>
<<<<<<< HEAD

            {{-- Phone Number --}}
            <div class="mb-5">
                @error('phone_number')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="form-label" for="phone_number">Numero di telefono</label>

                <input placeholder="Numero di telefono*" class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $doctor->phone_number) }}">
            </div>

            {{-- Email --}}
            <div class="mb-5">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="form-label" for="email">Email</label>

                <input placeholder="Email*" class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}">
            </div>

            {{-- Medical Service --}}
            <div class="mb-5">
                @error('medical_service')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="form-label" for="medical_service">Servizi</label>

                <textarea placeholder="Servizi*" class="form-control" name="medical_service" row="4" id="medical_service">{{ old('medical_service', $doctor->medical_service) }}</textarea>
            </div>

            {{-- Description --}}
            <div class="mb-5">
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label class="form-label" for="description">Descrizione</label>
                <textarea placeholder="Descrizione*" class="form-control" name="description" rows="4" id="description">{{ old('description', $doctor->description) }}</textarea>
            </div>

            {{-- Address --}}
            <div class="mb-5">
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="form-label" for="address">Indirizzo</label>

                <input placeholder="Indirizzo*" class="form-control" type="text" name="address" id="address" value="{{ old('address', $doctor->address) }}">
            </div>

            {{-- Profile Pic --}}
            <div class="mb-5">
                @error('profile_pic')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="form-label" for="profile_pic">Immagine del profilo</label>

                @if($doctor->profile_pic)
                    <img class="w-25" src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name }}">
                @endif

                <input class="form-control" type="file" name="profile_pic" id="profile_pic">
            </div>

            {{-- Category --}}
            {{-- <div class="mb-5">
                @error('medical_service')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="category">Specializzazione</label>
                <select id="category" name="categories[]" multiple="multiple" size="5" class="form-control">
                    @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($doctor->categories->contains($category->id)) selected @endif>
                                {{$category->name}}
                            </option>
                    @endforeach
                </select>
                <span style="font-size: 0.7em;">(Premere CTRL/COMMAND per le scelte multiple)</span>
            </div> --}}
            <div class="mb-3 mt-5">
                <h4>Specializzazione</h4>

                @foreach($categories as $category) 
                    <span class="d-inline-block mr-5">
                        <input type="checkbox" name="categories[]" id="category{{ $loop->iteration }}" value="{{ $category->id}}"
                        @if($errors->any() && in_array($category->id, old('categories'))) 
                            checked
                        @elseif (!$errors->any() && $doctor->categories->contains($category->id))
                            checked
                        @endif
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
            <button class="btn btn-primary" type="submit">Modifica il tuo profilo</button>

        </form>
    </div>
=======
        </div>
>>>>>>> dev
@endsection