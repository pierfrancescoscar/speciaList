@extends('layouts.app')

@section('content')
    <div class="container show_style mb-3">

        <h3 class="mt-5 text-center blue-title">Completa il pagamento</h3>
        <span class="d-block mt-2 text-center blue-title">Sei ad un passo dal diventare uno speciaList sponsorizzato.</span>

        <paymentform :paymentdata="{{$sub}}" :doctordata="{{$doctor}}"></paymentform>

    </div>


@endsection