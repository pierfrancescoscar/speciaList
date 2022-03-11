<template>

<section class="container">
    <div class="container doctor-detail-container p-4 rounded-3">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom d-flex justify-content-center align-items-center">
                <div class="team-single-img doctor_profile mb-3">
                    <img class="img-fluid" :src="`http://127.0.0.1:8000/storage/${doctor.profile_pic}`" :alt="`${doctor.name}`">
                </div>
                <!-- <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">Le mie specializzazioni</h4>
                    <p class="sm-width-95 sm-margin-auto">We are proud of child student. We teaching great activities and best program for your kids.</p>
                </div> -->
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <div class="card_doctor_title">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ doctor.name }} {{ doctor.surname }} </h4>
                        <p class="no-margin-bottom">{{ doctor.description }}</p>
                    </div>
                    
                    <div class="contact-info-section margin-40px-tb white_bg">
                        <ul class="list-style9 no-margin">
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-graduation-cap text-details"></i>
                                        <strong class="margin-10px-left text-details">Curriculum:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <a class="btn btn_details" :href="`${linkCv}`">Visualizza il CV</a>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-gem text-details"></i>
                                        <strong class="margin-10px-left text-details">Numero di telefono:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <span class="d-block">{{ doctor.phone_number }}</span>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-file text-details"></i>
                                        <strong class="margin-10px-left text-details">Mail:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <span class="d-block">{{ doctor.email }}</span>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-map-marker-alt text-details"></i>
                                        <strong class="margin-10px-left text-details">Indirizzo:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <span class="d-block">{{ doctor.address }}</span>
                                    </div>
                                </div>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<section class="container rounded-3 my-4 h-100">
    <div class="row">
        
        <div class="col-5 doctor-contact rounded-3">
            <ContactDoctor :doctorMessages="doctor"/>
        </div>
    
        <div class="col-7 pe-0">
            <FormReview :doctorReviews="doctor"/>
        </div>
    
    </div>
</section>

</section>


</template>

<script>
import ContactDoctor from './ContactDoctor.vue';
import FormReview from './FormReview.vue';

export default {
    name: 'ShowDoctor',
    data() {
        return {
            linkCv: `http://127.0.0.1:8000/storage/${this.doctor.curriculum}`,
        }
    },
    components: {
        ContactDoctor,
        FormReview,
    },
    props: {
        doctor: Object,
    }

}
</script>

<style scoped lang="scss">

.card_doctor_title {
    background-color: #0071c3;
    box-shadow: 0 0 50px #00000080;
    color: white;
    margin-bottom: 0;
    font-size: 18px;
    line-height: 3;
    border-radius: 1rem 1rem 0 0;
    font-size: 18px;
    text-align: center;
    padding:1rem;
}

.white_bg {
    background-color: white;
    color: #0071c3;
    box-shadow: 0 0 50px #00000040;
    border-radius: 0 0 1rem 1rem;
    padding:1rem;

    .text-details {
        color: #0071c3;
    }

    .btn_details {
        background-color: #0071c3;
        color: white;

    &:hover {
        background-color: #0072c3de;
        color: white;
    }
    }
}

.doctor-detail-container {
    font-size: 16px;
    color: #6f6f6f;
    font-weight: 400;
    line-height: 28px;
    letter-spacing: 0.8px;
    margin-top:20px;
    background-color: white;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

.doctor_profile {
    width: 300px !important;
    height: 300px !important;
}

.font-size38 {
    font-size: 38px;
}
.team-single-text .section-heading h4,
.section-heading h5 {
    font-size: 36px
}

.team-single-text .section-heading.half {
    margin-bottom: 20px
}

.team-single-img {
        display: flex;
        justify-content: center;
}

@media screen and (max-width: 1199px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 32px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 15px
    }
}

@media screen and (max-width: 991px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 28px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 10px
    }
}

@media screen and (max-width: 767px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 24px
    }
}


.team-single-icons ul li {
    display: inline-block;
    border: 1px solid #02c2c7;
    border-radius: 50%;
    color: #86bc42;
    margin-right: 8px;
    margin-bottom: 5px;
    -webkit-transition-duration: .3s;
    transition-duration: .3s
}

.team-single-icons ul li a {
    color: #02c2c7;
    display: block;
    font-size: 14px;
    height: 25px;
    line-height: 26px;
    text-align: center;
    width: 25px
}

.team-single-icons ul li:hover {
    background: #02c2c7;
    border-color: #02c2c7
}

.team-single-icons ul li:hover a {
    color: #fff
}

.team-social-icon li {
    display: inline-block;
    margin-right: 5px
}

.team-social-icon li:last-child {
    margin-right: 0
}

.team-social-icon i {
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    font-size: 15px;
    border-radius: 50px
}

.padding-30px-all {
    padding: 30px;
}
.bg-light-gray {
    background-color: #f7f7f7;
}
.text-center {
    text-align: center!important;
}
img {
    max-width: 100%;
    height: auto;
}


.list-style9 {
    list-style: none;
    padding: 0
}

.list-style9 li {
    position: relative;
    padding: 0 0 15px 0;
    margin: 0 0 15px 0;
    border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
}

.list-style9 li:last-child {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0
}






.custom-progress {
    height: 10px;
    border-radius: 50px;
    box-shadow: none;
    margin-bottom: 25px;
}
.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}

.doctor-contact {
    background-color: white;
}
</style>