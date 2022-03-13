<template>
    <section>

        <div v-for="(singleContact, i) in myloop" :key="`content-${i}`"
            class="reviews-members pt-4 pb-4">

            <div class="media">

                <!-- <div class="media-image">
                    <img alt="Generic placeholder image" src="https://t4.ftcdn.net/jpg/00/65/77/27/360_F_65772719_A1UV5kLi5nCEWI0BNLLiFaBPEkUbv5Fv.jpg" class="mr-3 my_image">
                </div> -->
                
                <div class="media-body">

                    <div class="reviews-members-header">

                        <div class="blue_bg_title">
                            <i class="fa-solid fa-user  pr-2"></i><span class="">{{ singleContact.name }} {{ singleContact.surname }} </span>
                        </div>

                        <div class="white_bg_content">
                            <div class="mb-1">
                                <i class="fa-solid fa-calendar-days  pr-2"></i><span class="text-color">{{ singleContact.date }}</span>
                            </div>
                            <div class="mb-1">
                                <i class="fa-solid fa-envelope-open-text  pr-2"></i><span class="text-color">{{ singleContact.object }}</span>
                            </div>
                            <div class="mb-1">
                                <i class="fa-solid fa-comment  pr-2"></i><span class="text-color">{{ singleContact.content }}</span>
                            </div>
                            <ul class="rating-star mb-1" v-if="singleContact.rating">
                                <li v-for="i in singleContact.rating" :key="`star-${i}`">
                                    <i class="fas fa-star"></i>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: 'CardContact',
    data() {
        return {

        }
    },
    props: {
        myloop: Array,
    },


}
</script>

<style scoped lang="scss">

.rating-star{
    list-style: none;
    display: flex;
    padding-left: 0px;

    li{
        color:#0071c3;
        margin-right: 5px;
    }
}

.media {
    padding: 2rem;
    border-radius: 2rem;
    display: flex;
    align-items: center;
}

.media-image {
    width: 100px;
    margin-right: 2rem;

    img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
}

.color-primary {
    color: #dce4f1;
}
.text-color {
    color: #0071c3;
}

.blue_bg_title {
    background-color: #0071c3;
    box-shadow: 0 0 50px #00000080;
    color: white;
    margin-bottom: 0;
    font-size: 18px;
    line-height: 3;
    border-radius: 1rem 1rem 0 0;
    font-size: 18px;
    text-align: center;
}

.white_bg_content {
    background-color: white;
    color: #0071c3;
    box-shadow: 0 0 50px #00000040;
    border-radius: 0 0 1rem 1rem;
    padding: 2rem;
}


</style>