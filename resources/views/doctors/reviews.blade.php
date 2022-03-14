@extends('layouts.app')

@section('content')
    <div class="container  mb-5">

        <mycontact :datarecup="{{$doctorReviews->reviews}}" :title="'Le mie recensioni.'" ></mycontact>

    </div>


@endsection