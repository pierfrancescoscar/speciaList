@extends('layouts.app')

@section('content')
    <div class="container show_style mb-3">

        <mycontact :datarecup="{{$doctorReviews->reviews}}" :title="'Le mie recensioni'" ></mycontact>

    </div>


@endsection