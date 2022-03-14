<template>
    <div class="container my-5 container_sponsored">
        <h3 class="mb-5 why-us-title title text-center"><strong>Clicca e cerca lo speciaLista giusto per te.</strong></h3>
        <div class="doctor-cards" id="carousel-categories">

            <div class="doctor-single-card d-flex">

                <div @click="GoToPage(category.name)" v-for="(category, i) in categories" :key="`category-${i}`" class="p-4 category-card card me-4">
                    <!-- Specialization Image -->
                    <img class="img-fluid w-50 mb-2 icon" src="https://cdn-icons-png.flaticon.com/512/684/684262.png" alt="">
                    <span class="d-block category-name">{{ category.name }}</span>
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

    name: 'CategoriesCarousel',
    data() {
        return {
            Text: '',
            categories: null,
            carouselScroll: 0,
			carousel: document.getElementById('carousel-categories'),
        }
    },
    created() {
        this.getDoctors();
    },
    methods: {
        getDoctors() {
            axios.get('http://127.0.0.1:8000/api/categories')
            .then(res => {

                // console.log(res.data);
                this.categories = res.data;
                // console.log(res.data);
            })
        },

        GoToPage(Param) {
            //console.log(Param);
            axios.post('http://127.0.0.1:8000/api/categorysearch', {
                category: Param,
            })
            .then(res=>{
                console.log(res.data.category);
                this.Text = res.data.category;
                console.log(this.Text);
                this.$emit('searchText', this.Text);
            })
        },

        carouselScrollTo(quantity) {
			let carousel = document.getElementById('carousel-categories');
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
.title {
    color: #0071c3;
}
.doctor-cards {
    position: relative;
    overflow-x: scroll;
    height: 190px;
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

    }

.category-card{
    width: 180px;
    height: 180px;
    border-radius: 10px;
    background-color: white;
    box-shadow: 6px 8px 50px -20px rgba(0,0,0,0.30);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    flex-direction: column;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    

    .icon{
        margin-bottom: 3px;
        font-size: 26px;
    }
    .category-name{
        color: black;
        font-size: 14px;
        text-align: center;
    }
}

}

.container_sponsored{
    position: relative;

    .prev_btn,
    .next_btn{
        position: absolute;
        transform: translateY(-50%);
        top: 60%;
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

    .why-us-title {
        color:#0071c3;
    }

}

</style>