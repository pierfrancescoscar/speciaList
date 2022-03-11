<template>
    <div class="container py-5">
        <h1 class="text-center pricing">I nostri piani di sponsorizzazione</h1> <br>

        <div class="row text-center align-items-end">

            <div class="col-lg-4 mb-5 mb-lg-0"
                v-for="sub in allsub" :key="`sub-${sub.id}`">
                <div class="bg-white p-5 rounded-lg shadow">
                    <h1 class="h6 text-uppercase font-weight-bold mb-4">{{sub.type}}</h1>
                    <h2 class="h1 font-weight-bold">{{sub.price}} €<span class="text-small font-weight-normal ml-2">/ {{sub.duration}} hours</span></h2>
                    <div class="custom-separator my-4 mx-auto bg-warning"></div>
                    <ul class="list-unstyled my-5 text-small text-left">
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> VANTAGGIO</li>
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> VANTAGGIO</li>
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> VANTAGGIO</li>
                        <!-- <li class="mb-3 text-muted"> <i class="fa fa-times mr-2"></i> <del>Unlimited Subdomain</del> </li>
                        <li class="mb-3 text-muted"> <i class="fa fa-times mr-2"></i> <del>Automatic Cloud Backup</del> </li> -->
                    </ul> 
                    <a :href="`http://127.0.0.1:8000/admin/subscription/${doctor.slug}/${sub.type}`" class="btn btn-warning btn-block p-2 shadow rounded-pill">Subscribe</a>
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

</style>