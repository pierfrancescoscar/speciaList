@extends('layouts.app')

@section('content')

    <div class="container show_style  mb-3">

        <div class="pages_container col-12 col-xl-10 offset-xl-1 d-flex flex-column flex-xl-row mt-5">

            {{-------------------------------------------- LEFT CONTAINER -------------------------------------------------}}
            <div class="left_container col-10 offset-1 col-xl-5 offset-xl-0 mb-5">

                @if (session('delete'))
                    <div class="alert alert-success">
                        {{ session('delete') }} = deleted successfully.
                    </div>
                @endif

                {{-- Modifica profilo --}}
                <div class="title_container_info mb-5">
                    
                    <a class="modifica_profilo text-reset text-decoration-none" href="{{ route('admin.doctor.edit', $doctor->id) }}">Modifica il tuo <strong>profilo</strong> <i class="penna ml-2 fa-solid fa-pen"></i></a>
                    
                </div>
                
                {{-- Nome e Cognome --}}
                <h2 class="nome_e_cognome"> <i class="fa-solid fa-user"></i> {{ $doctor->name }} {{ $doctor->surname }}</h2>

                {{-- Profile Pic --}}
                @if ($doctor->profile_pic)

                    <div class="img_profile m-4">
                        <img class="img-thumbnail" src="{{ asset('storage/' . $doctor->profile_pic) }}" alt="{{ $doctor->name }}">
                    </div>
                    
                @endif

                <div class="doctor_primary_info mb-3">

                    {{-- doctor id --}}
                    {{-- doctor category --}}
                    <h4 class="mb-2 mt-2 text-center title-category">Specializzazione:</h4>
                    <ul class="list-unstyled text-center">
                        @if(!$doctor->categories->isEmpty())

                            @foreach($doctor->categories as $category)
                            
                                <li>
                                    <a class="badge badge_profile" href="">{{ $category->name }}</a>
                                </li>

                            @endforeach

                        @else
                        <span>Nessuna specializzazione specificata</span>

                        @endif
                        
                    </ul>
                </div>

                <div class="statistiche recup-sub d-flex flex-column align-center justify-content-center">
                    @if ($mysub == 'Nessun abbonamento attivo')

                        <span class="d-block text-white">Non hai un abbonamento attivo</span>

                    @else

                        <i class="fas fa-clipboard-check text-center badge-sub"></i>
                        
                        <span class="d-block text-center text-white all-info-sub">
                            Il tuo abbonamento 
                            <span class="fw-bold info-sub-color">{{$subscription[ $mysub->subscription_id - 1 ]->type}}</span>
                             è attivo fino al 
                             <span class="fw-bold info-sub-color">{{$mysub->end_date}}</span>
                        </span>

                    @endif
                </div>

            </div>


            {{-------------------------------- RIGHT CONTAINER ---------------------------------}}

            <div class="right_container col-10 offset-1 col-xl-6 mb-5">

                <div class="title_container_info">Informazioni <strong>personali</strong></div>

                <div class="container_info">

                    @if ($doctor->curriculum)

                        <span class="name_info">Curriculum</span>

                        <div class="row_info">
                            <a target="_blank" href="{{ asset('storage/' . $doctor->curriculum) }}">Clicca qui per visualizzare il CV</a>
                        </div>

                    @endif

                    {{-- Address --}}
                    <span class="name_info">Indirizzo</span>

                    <div class="row_info">
                        <span class="mb-0">{{ $doctor->address }}</span>
                    </div>

                    {{-- Phone Number --}}
                    <span class="name_info">Numero di telefono</span>

                    <div class="row_info">
                        <span class="mb-0">{{ $doctor->phone_number }}</span>
                    </div>    

                    {{-- Email --}}
                    <span class="name_info">Email</span>

                    <div class="row_info">
                        <span class="mb-0">{{ $doctor->email }}</span>
                    </div>    

                    {{-- medic service --}}
                    <span class="name_info">Servizi</span>

                    <div class="row_info">
                        <p class="mb-0">{{ $doctor->medical_service }}</p>
                    </div>    

                    {{-- Description --}}
                    <span class="name_info">Descrizione</span>

                    <div class="row_info description">
                        <p class="mb-0">{{ $doctor->description }}</p>
                    </div>    

                    {{-- <form action="{{ route('admin.doctor.destroy', $doctor->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Reset dei campi" class="btn btn-danger">
                    </form> --}}
                </div>
            </div>
        </div>

        <div class="container-payment-card my-3">
            <paymentselection :allsub=" {{ $subscription }} " :doctor=" {{ $doctor }}"></paymentselection>
        </div>

    {{-- </div> --}}


@endsection