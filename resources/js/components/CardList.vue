<template>
    <div>
        <ul class="card-list">
            <li class="card" v-for="(card, i) in CardList" :key="`card-${i}`">
                <img
                    class="card-image"
                    :src="card.poster_path === null ? require(`../assets/GeneralFilm.png`) : `https://image.tmdb.org/t/p/w342${card.poster_path}`"
                    :alt="card.original_title ? card.original_title : card.original_name"
                >
                <div class="card-information">
                    <h3>
                        {{ card.title ? card.title : card.name }}
                    </h3>
                    <h4>
                        {{ card.original_title ? card.original_title : card.original_name }}
                    </h4>
                    <div class="language">
                        <span>Disponibile in lingua:</span>
                        <div class="lang-img" v-if="languages.includes(card.original_language)">
                            <img
                                class="flag"
                                :src="require(`../assets/${card.original_language}.png`)"
                                :alt="card.original_language"
                            >
                        </div>
                        <div v-else>
                            {{ card.original_language }}
                        </div>
                    </div>
                    <div v-show="card.overview != '' " class="description" :class="i === activeCard ? 'active' : '' ">
                        <span>Riassunto:</span>
                        <span>{{ card.overview }}</span>
                    </div>
                    <button v-show="card.overview != '' " @click="readAll(i)" :class="i === activeCard ? 'active' : '' "></button>
                    <div class="vote">
                        <div v-if="Math.ceil(card.vote_average / 2) !== 0">
                            <span>Votazione media degli utenti: </span>
                            <span v-for="n in Math.ceil(card.vote_average / 2)" :key="`star-${n}`">&starf;</span>
                            <span v-for="n in (5 - Math.ceil(card.vote_average / 2))" :key="`star-${n}`">&star;</span>
                        </div>
                        <div v-else>
                            Nessun voto presente
                        </div>
                    </div>
                </div>
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
        width: 100%;
        display: flex;
        align-items: center;
        overflow-x: auto;
        flex-wrap: nowrap;
        padding: 20px;
        overflow-y: hidden;
        .card {
            width: 340px;
            height: 500px;
            padding: 10px;
            flex-shrink: 0;
            position: relative;
            display: flex;
            align-items: center;
            .card-image {
                height: 100%;
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
                .language {
                    display: flex;
                    align-items: center;
                    margin-bottom: 10px;
                    .lang-img {
                        width: 80px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        .flag {
                            width: 50px;
                            height: 25px;
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