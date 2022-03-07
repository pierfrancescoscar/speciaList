<template>
    <div>
        <ul class="card-list">
            <li class="card" v-for="(card, i) in CardList" :key="`card-${i}`">
                <h3>{{ card.doctor }} {{ card.surname }}</h3>
                <img class="card-image" :src="`http://127.0.0.1:8000/storage/${ card.profile_pic }`" alt="">
                <h4>{{ card.category }}</h4>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    
    name: 'CardList',

    data() {
        return {
            languages: ['it', 'en', 'de'],
            activeCard: null,
            state: false,
            //voteRounded: Math.ceil(this.card.vote_average / 2),
        }
    },

    props: {
        CardList: Array,
    }, 

    methods: {
        readAll(index) {
            if (index != this.activeCard) {
                this.state = false;
            }
            if (this.state == false) {
                this.state = true;
                this.activeCard = index;
            } else {
                this.state = false;
                this.activeCard = null;
            }
        }
    }
}
</script>

<style scoped lang="scss">
    .card-list {
        list-style: none;
        display: flex;
        align-items: center;
        overflow-x: auto;
        flex-wrap: wrap;
        padding: 20px;
        overflow-y: hidden;
        justify-content: start;
        .card {
            width: 340px;
            height: 500px;
            padding: 10px;
            border-radius: 10px;
            flex-shrink: 0;
            position: relative;
            display: flex;
            margin-bottom: 20px;
            margin-right: 20px;
            &:nth-of-type(5) {
                margin-right: 0px;
            }
            .card-image {
                width: 100%;
                flex-grow: 1;
                transition: 0.5s;
            }
            .card-information {
                width: 90%;
                color: white;
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                transform: translate(-50%, 50%);
                opacity: 0;
                left: 50%;
                transition: 0.5s;
                text-align: center;
                h3 {
                    margin-bottom: 7px;
                    font-size: 20px;
                }
                h4 {
                    color: rgb(212, 212, 212);
                    font-size: 12px;
                    margin-bottom: 20px;
                }
                .description {
                    font-size: 12px;
                    text-align: justify;
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 3;
                    &.active {
                    -webkit-line-clamp: 50;
                    }
                }
                button {
                    background-color: transparent;
                    color: #acacac;
                    border: none;
                    padding: 3px;
                    font-weight: 700;
                    &::before {
                        content: 'Read More';
                    }
                    &:hover {
                        text-decoration: underline;
                    }
                    &.active {
                        &::before {
                            content: 'Read Less';
                        }
                    }
                }
            }
            &:hover {
                .card-image {
                    opacity: 0.3;
                    transform: scale(1.1);
                }
                .card-information {
                    transform: translate(-50%, 0%);
                    opacity: 1;
                }
            }
        }
    }
</style>