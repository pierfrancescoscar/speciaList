<template>
    <div class="container mb-4 container_sponsored">
        <div class="d-flex justify-content-center">
            <img class="specialist-icon" src="https://accademianeoippocratica.it/wp-content/uploads/2022/03/Specialist_icon-02.png" alt="">
        </div>
        <h3 class="mb-5 title text-center">I nostri speciaListi.</h3>
        <div class="doctor-cards" id="carousel">

            <div class="doctor-single-card d-flex">
                
                <div v-for="(doctor, i) in doctors" :key="`doctor-${i}`" class="doc-card p-4 card me-4 d-flex flex-column align-items-center justify-content-between">

                    <!-- Doc Image -->
                    <!-- <img class="img-fluid mb-2 w-50" src="https://cdn-icons.flaticon.com/png/512/2931/premium/2931141.png?token=exp=1647182925~hmac=cf0cdb5152ae2f3a7f656ad717dc5048" alt=""> -->
                    <div class="blue_bg_doctor">
                        <!-- Doc Name -->
                        <span class="d-block text-center">{{ doctor.name }} {{ doctor.surname }}</span>
                    </div>
                   
                    <div class="white_bg_doctor">
                        <!-- Doc Specialization -->
                        <span v-for="(category, i) in doctor.categories" :key="`category-${i}`"
                            class="d-block text-center mb-1">
                            {{ category.name }}
                        </span>
                    </div>

                    <!-- See More Button -->
                    <a class="btn-1 text-white p-2 text-decoration-none mb-2 text-center blue_bg_btn" :href="`http://127.0.0.1:8000/showdoctor/${doctor.slug}`"
                    >
                        Scopri di più
                    </a>
                    
                </div>

            </div>

        </div>

        <i class="fa-solid fa-chevron-left prev_btn" @click="carouselScrollTo(-200)"></i>

        <i class="fa-solid fa-chevron-right next_btn" @click="carouselScrollTo(200)"></i>
    </div>
</template>

<script>
import axios from 'axios';

export default {

    name: 'DoctorCarousel',
    data() {
        return {
            doctors: null,
            carouselScroll: 0,
			carousel: document.getElementById('carousel'),
        }
    },
    created() {
        this.getDoctors();
    },
    methods: {
        getDoctors() {
            axios.get('http://127.0.0.1:8000/api/doctors')

            .then(res => {
            console.log(res.data);                
                this.doctors = res.data;
            })
        },

        carouselScrollTo(quantity) {
			let carousel = document.getElementById('carousel');
			let scrolled = carousel.scrollLeft;
				carousel.scroll({
					behavior: 'smooth',
				});
			if (quantity < 0 && scrolled + (quantity) < 0) {
				carousel.scroll({
					left: 0,
                    behavior: 'smooth',
				});
			} else if (quantity > 0 && + scrolled + (quantity) > carousel.scrollLeftMax) {
				carousel.scroll({
					left: carousel.scrollLeftMax,
                    behavior: 'smooth',
				});
			} else {
				carousel.scroll({
					left: scrolled + (quantity),
                    behavior: 'smooth',
				});
			}
		},
    },

}
</script>

<style scoped lang="scss">
@import '../../sass/_variables.scss';

.title {
    color: #0071c3;
}
.doctor-cards {
    position: relative;
    overflow-x: scroll;
    height: 300px;
    -ms-overflow-style: none;
    scrollbar-width: none;
    &::-webkit-scrollbar {
        display: none;
    }

    .doctor-single-card {
        position: absolute;
        left: 0;
        top: 0;
        padding: 0 40px;

        &>div {
            min-width: 300px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .fa-user-md {
            font-size: 55px;
        }

        .doc-card {
            background-color:#dce4f1;
        }

    }
}

.blue_bg_doctor {
    background-color: $primary;
    width: 100%;
    color: white;
    margin-bottom: 0;
    font-size: 18px;
    font-size: 18px;
    text-align: center;
    border-radius: 1rem 1rem 0 0;
    line-height: 3rem;
}

.blue_bg_btn {
    background-color: $primary;
    width: 100%;
    color: white;
    margin-bottom: 0;
    font-size: 18px;
    font-size: 18px;
    text-align: center;
    border-radius: 0 0 1rem 1rem;
}

.white_bg_doctor {
    background-color: white;
    color: $primary;
    box-shadow: 0 0 50px #00000040;
    width: 100%;
    height: 100%;
    padding: 5px 2px 0px 2px;
}

.container_sponsored{
    position: relative;

    .prev_btn,
    .next_btn{
        position: absolute;
        transform: translateY(230%);
        top: 50%;
        padding: 10px 15px;
        border-radius: 28%;
        background-color: #2b71bd;
        color: white;
        box-shadow: rgba(99, 99, 99, 0.5) 0px 5px 8px 0px;
        &:hover{
            cursor: pointer;
        }
        &:active{
            box-shadow: none;
            background-color: #1961af;
        }
    }
    .prev_btn{
        left: 7px;
    }
    .next_btn{
        right: 7px;
    }

}

.doc-card {
    border-radius: 10px;
    box-shadow: rgba(99, 99, 99, 0.5) 0px 5px 8px 0px;
}

.specialist-icon {
    width: 150px !important;
}

</style>