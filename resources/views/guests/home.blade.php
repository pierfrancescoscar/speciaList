@extends('layouts.app')

@section('content')

@auth

    @if (!DB::table('doctors')->where('slug', Auth::user()->slug)->first())

        <div class="bg-white">
            <div class="container py-4 d-flex justify-content-between align-items-center">

                <h3>Benvenuto, {{ Auth::user()->name }} Il tuo profilo non risulta completo</h3>

                <a class="text-light text-decoration-none py-2 px-4 bg-primary rounded-pill" href="{{ route('admin.doctor.create') }}">Completa il tuo profilo</a>
                
            </div>
        </div>

    @endif

@endauth

@include('guests.hero')

    <h1>Guest Home</h1>

    <doctorcarousel></doctorcarousel>

@endsection