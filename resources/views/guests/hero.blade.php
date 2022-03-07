<div class="hero">
    <div class="container h-100">
        <div class="row d-flex flex-row-reverse h-100">
            <div class="hero-text col-lg-5 col-md-7 col-sm-12 d-flex flex-column h-100 justify-content-center">
                <div class="content p-3">
                    <h2 class="m-0">
                        Cerca il tuo specialista!
                    </h2>
                    <h4 class="mt-1 mb-0">Scopri come possiamo esserti utili.</h4>
                    <form action="{{ route('specialist-search') }}" method="POST">
                        @csrf
                        <input
                            class="form-control w-100 mb-2 p-0"
                            placeholder="Inserisci qui la specializzazione"
                            type="text"
                            name="category"
                        >
                        <button type="submit">GO TO PAGE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>