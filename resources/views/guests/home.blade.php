@extends('layouts.app')

@section('content')
    <h1>Guest Home</h1>
    <li class="nav-item btn btn-primary">
        <a class="nav-item" href="{{ route('admin.doctor.create') }}">Create a new doctor</a>

    </li>
@endsection