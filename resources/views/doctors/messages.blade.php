@extends('layouts.app')

@section('content')
    <div class="container show_style mb-5">

        <mycontact :datarecup="{{$doctorMesssages->messages}}" :title="'I miei messaggi.'" ></mycontact>

    </div>
@endsection