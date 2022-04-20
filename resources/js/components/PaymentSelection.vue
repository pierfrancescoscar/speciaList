<template>
    <div class="container py-5">
        <h3 class=" sponsor-text text-center pricing"><strong>Aumenta la tua visibilità e diventa uno speciaList sponsorizzato.</strong></h3> <br>

        <div class="row text-center align-items-end">

            <div class="col-lg-4 mb-5 mb-lg-0"
                v-for="sub in allsub" :key="`sub-${sub.id}`">
                <div class="bg-white p-5 rounded-lg shadow">
                    <h1 class="h6 text-uppercase font-weight-bold mb-4 sponsor-text">{{sub.type}}</h1>
                    <h2 class="h1 font-weight-bold sponsor-text">{{sub.price}} €<span class="text-small font-weight-normal ml-2">/ {{sub.duration}} hours</span></h2>
                    <a :href="`http://127.0.0.1:8000/admin/subscription/${doctor.slug}/${sub.type}`" class="button-sponsor btn btn-block p-2 shadow rounded-pill text-white">Acquista</a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

    export default {
    name: 'PaymentSelection',
    props: {
        allsub: Array,
        doctor: Object,
    },
    }
</script>

<style scoped>
.rounded-lg {
    border-radius: 1rem !important
}

.text-small {
    font-size: 0.9rem !important
}

.pricing {
    color: #fff
}

.custom-separator {
    width: 5rem;
    height: 6px;
    border-radius: 1rem
}

.text-uppercase {
    letter-spacing: 0.2em
}

.btn-warning {
    color: #fff
}

.btn-warning:hover {
    color: #fff
}

.container-payment-card {
    background: #f8c246;
    background: -webkit-linear-gradient(to right, #f8c246, #f8c246);
    background: linear-gradient(to right, #f8c246, #f8c246);
    color: #514B64;
    min-height: 150vh
}

.sponsor-text {
    color: #0071c3;
}

.button-sponsor {
    background-color: #0071c3;
}

</style>