@extends('layouts.app')

@section('content')
    <div class="container show_style mb-3">

        <h1 class="mb-2">Completa il pagamento</h1>

        <paymentform :paymentdata="{{$sub}}" :doctordata="{{$doctor}}"></paymentform>

    </div>


@endsection