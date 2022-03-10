<div class="hero">
    <div class="container h-100">
        <div class="row d-flex flex-row-reverse h-100">
            <div class="hero-text col-lg-5 col-md-7 col-sm-12 d-flex flex-column h-100 justify-content-center">
                <div class="content p-3">
                    <h1 class="m-0 title-form-hero">
                        <strong>Cerca il tuo speciaList.</strong>
                    </h1>
                    <p class="description-hero mt-2">In speciaList puoi cercare il professionista giusto per te scegliendo tra diversi tipi di specializzazione.</p>
                    <form class="py-3 px-3 mt-4" action="{{ route('specialist-search') }}" method="POST">
                        @csrf
                        <input
                            class="form-control w-100 mb-2 p-0"
                            placeholder="Inserisci qui la specializzazione"
                            type="text"
                            name="category"
                        >
                            <button class="mt-2 text-center btn btn-primary" type="submit">Cerca</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>