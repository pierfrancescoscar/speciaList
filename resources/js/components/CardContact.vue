<template>

    <div
    class="reviews-members pt-4 pb-4">
        <div class="media">

            <img alt="Generic placeholder image" src="https://t4.ftcdn.net/jpg/00/65/77/27/360_F_65772719_A1UV5kLi5nCEWI0BNLLiFaBPEkUbv5Fv.jpg" class="mr-3 rounded-3 my_image">
            <div class="media-body">

                <div class="reviews-members-header">

                    <h6 class="mb-1">{{ name }}</h6>
                    <p class="text-gray">{{ date }}</p>

                </div>

                <div class="reviews-members-body">
                    <p>{{ content }}</p>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'CardContact',
    data() {
        return {

        }
    },
    props: {
        name: String,
        date: String,
        content: String,
    },


}
</script>

<style scoped lang="scss">

.my_image{
    max-width: 130px;
}

</style>