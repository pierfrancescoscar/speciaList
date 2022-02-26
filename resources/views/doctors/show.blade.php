@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Name --}}
        <h1 class="mb-5">{{ $doctor->name }}</h1>

        {{-- Surname --}}
        <h3 class="mb-5">{{ $doctor->surname }}</h3>

        {{-- Phone Number --}}
        <h3 class="mb-5">{{ $doctor->phone_number }}</h3>

        {{-- Email --}}
        <h3 class="mb-5">{{ $doctor->email }}</h3>

        {{-- Address --}}
        <h3 class="mb-5">{{ $doctor->address }}</h3>

        {{-- Description --}}
        <p class="mb-5">{{ $doctor->description }}</p>

        {{-- Profile Pic --}}
        @if ($doctor->profile_pic)

        <div class="col-6">
            <img class="img-fluid" src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name }}">
        </div>

        @endif

        {{-- Curriculum --}}
        @if ($doctor->curriculum)

        <div class="col-6">
            <a href="{{ asset('storage/' . $doctor->curriculum) }}">Clicca qui per visualizzare il CV</a>
        </div>

        @endif

        {{-- Action buttons  --}}
        <a class="btn btn-warning" href="{{ route('admin.doctor.edit', $doctor->id) }}">Edit</a>
        <a class="btn btn-danger" href="/">Back to archive</a>

@endsection