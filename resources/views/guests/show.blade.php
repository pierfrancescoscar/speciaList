@extends('layouts.app')

@section('content')

<section class="container p-5">
    <showdoctor :doctor="{{ $doctor }}"></showdoctor>
</section>

@endsection