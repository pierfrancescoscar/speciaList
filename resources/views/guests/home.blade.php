@extends('layouts.app')

@section('content')

@auth

    @if (!DB::table('doctors')->where('slug', Auth::user()->slug)->first())

        <div class="bg-white">
            <div class="container py-4 d-flex justify-content-between align-items-center">

                <h3>Benvenuto, {{ Auth::user()->name }} Il tuo profilo non risulta completo</h3>

                <a class="text-light text-decoration-none py-2 px-4 bg-primary rounded-pill" href="{{ route('admin.doctor.create') }}">Completa il tuo profilo</a>
                
            </div>
        </div>

    @endif

@endauth

@include('guests.hero')


{{-- Perché Scegliere Noi --}}
<section class="container-fluid p-4 bg-white">
    <div class="d-flex justify-content-center">
        <img class="why-us-icon text-center" src="{{ asset('assets/Why_speciaList_Icon-02.png') }}" alt="">
    </div>
    <h3 class="mb-5 text-center why-us-title">Perché scegliere speciaList.</h3>
   <div class="container">
        <div class="row mb-5">
            {{-- 1st Icon + Text --}}
            <div class="col-3 text-center">
                <img class="w-25 mb-2" src="https://s3.amazonaws.com/images.teladoc.com/www/2019/landing-pages/bdstart/1.png" alt="">
                <h5 class="my-2 why-us-title">Contatto diretto</h5>
                <span class="d-block why-us-title">Contatto diretto con gli specialisti. Ad ogni dubbio su un tuo problema di salute avrai una risposta.</span>
            </div>
            {{-- 2nd Icon + Text --}}
            <div class="col-3 text-center">
                <img class="w-25 mb-2" src="https://s3.amazonaws.com/images.teladoc.com/www/2019/landing-pages/bdstart/2.png" alt="">
                <h5 class="my-2 why-us-title">I primi della classe</h5>
                <span class="d-block why-us-title">Tutti i nostri specialisti sono rinomati esperti del settore. Contattali per un consulto gratuito e senza impegno.</span>
            </div>
            {{-- 3rd Icon + Text --}}
            <div class="col-3 text-center">
                <img class="w-25 mb-2" src="https://s3.amazonaws.com/images.teladoc.com/www/2019/landing-pages/bdstart/3.png" alt="">
                <h5 class="my-2 why-us-title">Siamo qui per te</h5>
                <span class="d-block why-us-title">Non sei mai solo, ti aiutiamo nella ricerca dello specialista giusto per te in base alla tua necessità e al tuo problema.</span>
            </div>
            {{-- 4th Icon + Text --}}
            <div class="col-3 text-center">
                <img class="w-25 mb-2" src="https://s3.amazonaws.com/images.teladoc.com/www/2019/landing-pages/bdstart/4.png" alt="">
                <h5 class="my-2 why-us-title">Il posto giusto per te</h5>
                <span class="d-block why-us-title">Grazie alle strutture convenzionate con speciaList, per ogni tuo problema abbiamo la struttura giusta per te.</span>
            </div>

        </div>
   </div>
</section>

{{-- Vue Components --}}
<doctorcarousel></doctorcarousel>

    {{-- Specialization List --}}
    <div class="container-fluid p-4 bg-white">
        <div class="d-flex justify-content-center">
            <img class="specialist-icon" src="https://accademianeoippocratica.it/wp-content/uploads/2022/03/Recensioni_Specialist-02.png" alt="Img_not Found">
        </div>
    
        <h3 class="why-us-title text-center">Le specializzazioni più cercate.</h3>

        {{-- <div class="container">
            <section class="d-flex flex-wrap">
                
                @foreach ($categories as $category)
                
                    <form class="py-3 px-3 mt-4" action="{{ route('specialist-search') }}" method="POST">
                        @csrf
                        <input
                            class="form-control w-100 mb-2 p-0 d-none"
                            placeholder="Inserisci qui la specializzazione"
                            type="text"
                            name="category"
                            value="{{ $category->name }}"
                        >
                            <button class="mt-2 text-center category-card text-reset text-decoration-none" type="submit">
                                <img class="img-fluid icon" src="https://cdn-icons-png.flaticon.com/512/684/684262.png" alt="">
                                {{ $category->name }}
                            </button>
                    </form>
                    
                @endforeach
            </section>
        </div> --}}
    </div>
    
</div>

<reviews></reviews>

@include('guests.howitworks')

{{-- @include('guests.patacchi') --}}

@endsection