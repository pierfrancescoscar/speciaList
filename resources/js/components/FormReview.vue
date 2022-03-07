<template>
    <section class="container">

        <div class="contact__wrapper shadow-lg mt-n9">
            <div class="row no-gutters">
                <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
                    <h3 class="color--white mb-5">Recapiti del dottore</h3>
        
                    <ul class="contact-info__list list-style--none position-relative z-index-101">
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-envelope"></i></span> INSERIRE EMAIL DEL DOTTORE
                        </li>
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-phone"></i></span> INSERIRE NUMERO DEL DOTTORE
                        </li>
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-map-marker-alt"></i></span> INSERIRE VIA DELLO STUDIO
        
                            <div class="mt-3">
                                <a href="https://www.google.com/maps" target="_blank" class="text-link link--right-icon text-white">Get directions <i class="link__icon fa fa-directions"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
        
                <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">

                    <!-- form -->
                    <form class="contact-form form-validate" @submit.prevent="ReviewForm">
                        <div class="row">

                            <!-- name -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Inserire il proprio nome" required v-model="name">
                                </div>
                            </div>
        
                            <!-- surname -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="surname">Cognome</label>
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Inserire il proprio cognome" required v-model="surname">
                                </div>
                            </div>

                            <!-- email -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Inserire la propria email" required v-model="email">
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
                                    </div>

                                </div>
                            </div>

                            <!-- content -->
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="content">Recensione</label>
                                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Inserire la propria recensione" v-model="content"></textarea>
                                </div>
                            </div>
        
                            <div class="col-sm-12 mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Invia Recensione</button>
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
        }
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

                name: this.name,
                surname: this.surname,
                email: this.email,
                rating: this.rating,
                content: this.content,
                date: this.date,
                slug: `review-${this.name}-${this.surname}`,

            })
            .then(res =>{
                console.log(res.data);
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
            color: rgb(250, 250, 36);
        }
        &.star_gray{
            color: rgb(78, 78, 78);
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
    border-radius: .625rem .625rem 0 0;
    background-color: #2b71bd;
}

@media (min-width: 1024px) {
    .contact-info__wrapper {
        border-radius: 0 .625rem .625rem 0;
        padding: 5rem !important;
    }
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
    border-radius: 0 0 .625rem .625rem;
    overflow: hidden;
}

@media (min-width: 1024px) {
    .contact__wrapper {
        border-radius: .625rem 0 .625rem .625rem
    }
}
@media (min-width: 1024px) {
    .contact-form__wrapper {
        padding: 5rem !important
    }
}
.shadow-lg, .shadow-lg--on-hover:hover {
    box-shadow: 0 1rem 3rem rgba(132,138,163,0.1) !important;
}
</style>