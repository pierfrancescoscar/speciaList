@extends('layouts.app')

@section('content')
    <h1>Guest Home</h1>
    <li class="nav-item btn btn-primary">
        <a class="nav-item" href="{{ route('admin.doctor.create') }}">Create a new doctor</a>
        {{-- <a class="nav-item" href="{{ route('doctors.show', $doctor->slug) }}">My profile</a> --}}
    </li>
@endsection