<template>
    <section>

        <div v-for="(singleContact, i) in myloop" :key="`content-${i}`"
            class="reviews-members pt-4 pb-4">

            <div class="media">

                <img alt="Generic placeholder image" src="https://t4.ftcdn.net/jpg/00/65/77/27/360_F_65772719_A1UV5kLi5nCEWI0BNLLiFaBPEkUbv5Fv.jpg" class="mr-3 rounded-3 my_image">
                <div class="media-body">

                    <div class="reviews-members-header">

                        <h6 class="mb-1">Paziente: {{ singleContact.name }} {{ singleContact.surname }}</h6>
                        <p class="text-gray">Data: {{ singleContact.date }}</p>
                        <ul class="rating-star" v-if="singleContact.rating">
                            Voto: 
                            <li v-for="i in singleContact.rating" :key="`star-${i}`">
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>

                    </div>

                    <div class="reviews-members-body">
                        <span v-if="singleContact.object">Oggetto messaggio: {{ singleContact.object }}</span>
                        <p>Contenuto: {{ singleContact.content }}</p>
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

    li{
        color: yellow;
        margin-right: 5px;
    }
}

.my_image{
    max-width: 130px;
}

</style>