@extends('layouts.app')

@section('content')
    <div class="container show_style mb-3">

        <div class="first_row">

            <div class="left_container ">

                {{-- Profile Pic --}}
                <div class="title_container_info mb-5">
                    <span>{{ $doctor->name }} {{ $doctor->surname }}</span>
                </div>

                @if ($doctor->profile_pic)

                <div class="profile_pic mb-2">
                    <img class="img-fluid" src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name }}">
                </div>

                @endif

                <div class="doctor_primary_info">

                    {{-- doctor id --}}
                    {{-- doctor category --}}
                    <h4 class="mb-2 mt-2 text-center">Specializzazione:</h4>
                    <ul class="">
                        @foreach($doctor->categories as $category)
                            <li class="">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <a class="btn btn-edit" href="{{ route('admin.doctor.edit', $doctor->id) }}">Modifica il tuo profilo</a>

                <div class="statistiche">

                </div>
            </div>

            <div class="right_container">

                <div class="title_container_info">
                    <span>Informazioni personali</span>
                </div>

                <div class="container_info">

                    @if ($doctor->curriculum)

                        <span class="name_info_row">Curriculum</span>

                        <div class="row_info">
                            <a href="{{ asset('storage/' . $doctor->curriculum) }}">Clicca qui per visualizzare il CV</a>
                        </div>

                    @endif

                    {{-- Phone Number --}}
                    <span class="name_info_row">Numero di telefono</span>

                    <div class="row_info">
                        <span class="mb-0">{{ $doctor->phone_number }}</span>
                    </div>

                    {{-- Email --}}
                    <span class="name_info_row">Email</span>

                    <div class="row_info">
                        <span class="mb-0">{{ $doctor->email }}</span>
                    </div>

                    {{-- medic service --}}
                    <span class="name_info_row">Servizi</span>

                    <div class="row_info">
                        <p class="mb-0">{{ $doctor->medical_service }}</p>
                    </div>

                    {{-- Description --}}
                    <span class="name_info_row">Descrizione</span>

                    <div class="row_info description">
                        <p class="mb-0">{{ $doctor->description }}</p>
                    </div>

                    {{-- Address --}}
                    <span class="name_info_row">Indirizzo</span>

                    <div class="row_info">
                        <span class="mb-0">{{ $doctor->address }}</span>
                    </div>
                </div>
            </div>
        </div>


        

        {{-- Action buttons  --}}
        {{-- <a class="btn btn-warning" href="{{ route('admin.doctor.edit', $doctor->id) }}">Edit</a>
        <a class="btn btn-danger" href="/">Back to archive</a> --}}
    </div>


@endsection