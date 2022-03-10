<template>
    <div class="container mb-4 container_sponsored">
        <div class="d-flex justify-content-center">
            <img class="specialist-icon" src="https://accademianeoippocratica.it/wp-content/uploads/2022/03/Specialist_icon-02.png" alt="">
        </div>
        <h3 class="mb-5 title text-center">I nostri speciaListi.</h3>
        <div class="doctor-cards" id="carousel">

            <div class="doctor-single-card d-flex">
                
                <div v-for="(doctor, i) in doctors" :key="`doctor-${i}`" class="doc-card p-4 card me-4">
                    <!-- Doc Image -->
                    <img class="img-fluid mb-2" src="https://t4.ftcdn.net/jpg/02/60/04/09/360_F_260040900_oO6YW1sHTnKxby4GcjCvtypUCWjnQRg5.jpg" alt="">
                    <!-- Doc Name -->
                    <span class="d-block text-center mb-2">{{ doctor.name }} {{ doctor.surname }}</span>
                    <!-- Doc Specialization -->
                    
                    <!-- See More Button -->
                    <a class="btn-1 text-white p-2 text-decoration-none rounded-2 mb-2 text-center" :href="`http://127.0.0.1:8000/showdoctor/${doctor.slug}`">Scopri di più</a>
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
            min-width: 200px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

    }
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