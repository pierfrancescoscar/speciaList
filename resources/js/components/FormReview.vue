<template>
    <section class="container reviews-container p-0">

        <div class="contact__wrapper shadow-lg mt-n9 rounded-3">
            <div class="row no-gutters">
        
                <div class="col-lg-12 p-4 contact-form__wrapper order-lg-1 white_bg">

                    <!-- Sent Successfully Message Alert -->
                    <div v-show="success" class="alert alert-success">
                       Recensione inviata correttamente
                    </div>

                    <!-- form -->
                    <form class="contact-form form-validate" @submit.prevent="ReviewForm">
                        <h3 class="mb-4 card_doctor_title">Lascia una recensione.</h3>
                        <div class="row">

                            <!-- name -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Inserire il proprio nome" required v-model="name">
                                    <!-- Check Errors Name -->
                                    <div
                                            v-for="(error, index) in errors.name"
                                            :key="`err-name-${index}`"
                                            class="text-danger"
                                    >
                                        {{ error }}
                                    </div>
                                </div>
                            </div>
        
                            <!-- surname -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="surname">Cognome</label>
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Inserire il proprio cognome" required v-model="surname">
                                    <!-- Check Errors Surname -->
                                    <div
                                            v-for="(error, index) in errors.surname"
                                            :key="`err-surname-${index}`"
                                            class="text-danger"
                                    >
                                        {{ error }}
                                    </div>
                                </div>
                            </div>

                            <!-- email -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Inserire la propria email" required v-model="email">
                                    <!-- Check Errors Email -->
                                    <div
                                            v-for="(error, index) in errors.email"
                                            :key="`err-email-${index}`"
                                            class="text-danger"
                                    >
                                        {{ error }}
                                    </div>
                                </div>
                            </div>

                            <!-- rating -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="rating" class="rating_label" >Voto</label>
                                    <br>

                                    <div class="allstars_container">
                                        <div class="container-star"
                                                v-for="(n , i) in num"
                                                :key="`star-${i}`">

                                            <input type="checkbox"
                                                 class="star-checkbox star"
                                                 :name="`star-${i}`" :id="`star-${i}`"
                                                 @click="selectRatings(i)">

                                            <i class="fa-solid fa-star my_star starIcon star_gray"></i>
                                        </div>
                                            <!-- Check Errors Rating -->
                                            <div
                                            v-for="(error, index) in errors.rating"
                                            :key="`err-rating-${index}`"
                                            class="text-danger"
                                            >
                                            {{ error }}
                                            </div>
                                    </div>

                                </div>
                            </div>

                            <!-- content -->
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="content">Recensione</label>
                                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Inserire la propria recensione" v-model="content"></textarea>
                                    <!-- Check Errors Content -->
                                    <div
                                    v-for="(error, index) in errors.content"
                                    :key="`err-content-${index}`"
                                    class="text-danger"
                                    >
                                    {{ error }}
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-sm-12 mb-3 ">
                                <button type="submit" name="submit" class="btn btn_details">Invia Recensione</button>
                            </div>
        
                        </div>
                    </form>
                </div>
                <!-- End Contact Form Wrapper -->
        
            </div>
        </div>


    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'FormReview',
    data() {
        return {
            num: 5,

            name: '',
            surname: '',
            email: '',
            rating: null,
            content: '',
            date: '',
            errors: {},
            success: false,
        }
    },
    props: {
        doctorReviews: Object,
    },
    created() {
        this.GetDate();
    },
    methods: {
        selectRatings(res) {

            this.rating = res;

            let myrating = document.getElementById(`star-${res}`);

            myrating.classList.toggle('star-checkbox')

            let otherStars = document.querySelectorAll('.star-checkbox');


            let resOtherStar = otherStars.length;

            if (resOtherStar != 4) {
                
                otherStars.forEach(element => {
                    element.disabled = false;
                });

            } else {

                otherStars.forEach(element => {
                    element.disabled = true;
                });
            }

            /* color star */
            let starIcon = document.querySelectorAll('.starIcon');

            let num = res;

            if (num == 0) {

                starIcon[0].classList.toggle('star_yellow');
                starIcon[0].classList.toggle('star_gray');

            } else if (num == 1) {

                starIcon[0].classList.toggle('star_yellow');
                starIcon[0].classList.toggle('star_gray');

                starIcon[1].classList.toggle('star_yellow');
                starIcon[1].classList.toggle('star_gray');

            } else if (num == 2) {

                starIcon[0].classList.toggle('star_yellow');
                starIcon[0].classList.toggle('star_gray');

                starIcon[1].classList.toggle('star_yellow');
                starIcon[1].classList.toggle('star_gray');

                starIcon[2].classList.toggle('star_yellow');
                starIcon[2].classList.toggle('star_gray');

            } else if (num == 3) {

                starIcon[0].classList.toggle('star_yellow');
                starIcon[0].classList.toggle('star_gray');

                starIcon[1].classList.toggle('star_yellow');
                starIcon[1].classList.toggle('star_gray');

                starIcon[2].classList.toggle('star_yellow');
                starIcon[2].classList.toggle('star_gray');

                starIcon[3].classList.toggle('star_yellow');
                starIcon[3].classList.toggle('star_gray');

            } else if (num == 4) {

                starIcon[0].classList.toggle('star_yellow');
                starIcon[0].classList.toggle('star_gray');

                starIcon[1].classList.toggle('star_yellow');
                starIcon[1].classList.toggle('star_gray');

                starIcon[2].classList.toggle('star_yellow');
                starIcon[2].classList.toggle('star_gray');

                starIcon[3].classList.toggle('star_yellow');
                starIcon[3].classList.toggle('star_gray');
                
                starIcon[4].classList.toggle('star_yellow');
                starIcon[4].classList.toggle('star_gray');

            }
        },

        ReviewForm() {
            console.log('invio');
            

            axios.post('http://127.0.0.1:8000/api/reviews', {

                doctor_id: this.doctorReviews.id,
                name: this.name,
                surname: this.surname,
                email: this.email,
                rating: this.rating,
                content: this.content,
                date: this.date,
                slug: this.doctorReviews.slug,

            })
            .then(res =>{
                console.log(res.data);
                if(res.data.errors) {
                    this.errors = res.data.errors;
                    this.success = false;
                } else {
                    this.name = '';
                    this.email = '';
                    this.object = '';
                    this.message = '';

                    // Feedback
                    this.errors = {};
                    this.success = true;
                    this.name = '';
                    this.surname = '';
                    this.email = '';
                    this.content = '';
                    this.content = '';
                }
            })
            .catch(err =>{
                console.log(err);
            })
        },

        GetDate() {
            const day = new Date();
            const month = new Date();
            const year = new Date();
            this.date = `${day.getDate()}/${month.getMonth()}/${year.getFullYear()}`;
        }

    },

}
</script>

<style scoped lang="scss">
.card_doctor_title {
    background-color: #0071c3;
    color: white;
    margin-bottom: 0;
    font-size: 18px;
    line-height: 3;
    border-radius: 1rem;
    font-size: 18px;
    text-align: center;
    padding:1rem;
}

.white_bg {
    background-color: white;
    color: #0071c3;
    box-shadow: 0 0 50px #00000040;
    padding:1rem;
}

.btn_details {
        background-color: #0071c3;
        color: white;

    &:hover {
        background-color: #0072c3de;
        color: white;
    }
}


.rating_label{
    margin-bottom: 25px;
}

.allstars_container{
    display: flex;
}

.container-star{
    position: relative;
    width: 20px;
    margin-right: 5px;

    >input{
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        opacity: 0;
        z-index: 1;
    }

    .my_star{
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;

        &.star_yellow{
            color: #0071c3;
        }
        &.star_gray{
            color: #dce4f1;
        }

    }

}


.gradient-brand-color {
    background-image: -webkit-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
    background-image: -ms-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
    color: #fff;
}
.contact-info__wrapper {
    overflow: hidden;
    background-color: #2b71bd;
}

.contact-info__list span.position-absolute {
    left: 0
}
.z-index-101 {
    z-index: 101;
}
.list-style--none {
    list-style: none;
}

.contact__wrapper {
    background-color: #fff;
    overflow: hidden;
}

.shadow-lg, .shadow-lg--on-hover:hover {
    box-shadow: 0 1rem 3rem rgba(132,138,163,0.1) !important;
}

.reviews-container {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}


</style>