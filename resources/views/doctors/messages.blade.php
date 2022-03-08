@extends('layouts.app')

@section('content')
    <div class="container show_style mb-3">

        <mycontact :messagesrecup="{{$doctorMesssages}}" ></mycontact>

    </div>


@endsection