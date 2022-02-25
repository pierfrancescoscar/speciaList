@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $doctor->name }}</h1>
        <h1>{{ $doctor->surname }}</h1>
        <h1>{{ $doctor->phone_number }}</h1>
        <h1>{{ $doctor->email }}</h1>
        <h1>{{ $doctor->address }}</h1>

        <div class="row mt-5 mb-5">

            {{-- doctor description --}}
            <div class="{{ $doctor->description ? 'col-md-6' : 'col' }}">
                {!! $post->description !!}
            </div>

            {{-- profile_pic --}}
            @if($post->cover)
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name }}">
                </div>
            @endif
        </div>

        <div class="mt-5">
            <a class="btn btn-primary" href="">Edit</a>
        </div>
        <div class="mt-5">
            <a class="btn btn-success" href="">Back to HomePage</a>
        </div>
    </div>
@endsection