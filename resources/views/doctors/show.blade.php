@extends('layouts.app')

@section('content')
    <div class="container show_style mb-3">

        <div class="first_row">

            <div class="left_container ">

                {{-- Profile Pic --}}
                @if ($doctor->profile_pic)

                <div class="profile_pic">
                    <img class="img-fluid" src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name }}">
                </div>

                @endif

                <div class="doctor_primary_info text-center">

                    {{-- doctor id --}}
                    <h2 class="mb-2">{{ $doctor->name }} {{ $doctor->surname }}</h2>

                    {{-- doctor category --}}
                    <h3 class="mb-2">categoria</h3>
                </div>

                <a class="btn btn-primary" href="{{ route('admin.doctor.edit', $doctor->id) }}">Edit</a>

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
                        <span class="mb-0">{{ $doctor->email }}</sp>
                    </div>

                    {{-- medic service --}}
                    <span class="name_info_row">Servizi</span>

                    <div class="row_info">
                        <p class="mb-0">{{ $doctor->medical_service }}</p>
                    </div>

                    {{-- Description --}}
                    <span class="name_info_row">Descrizione</span>

                    <div class="row_info">
                        <p>{{ $doctor->description }}</p>
                    </div>

                    {{-- Address --}}
                    <span class="name_info_row">Indirizzo</span>

                    <div class="row_info">
                        <span class="mb-0">{{ $doctor->address }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection