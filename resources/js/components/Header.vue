<template>
  <div class="header">
      <CategoriesCarousel @searchText="reciveText"/>
      <!-- <h1>
          Inserisci qui la specializzazione che stai cercando
      </h1> -->
      <Form class="d-none" :testo="testo" @searchText="reciveText"/>
  </div>
</template>

<script>

import Axios from 'axios';
import Form from './Form.vue';
import CategoriesCarousel from './CategoriesCarousel.vue';

export default {
    name: 'Header',

    components: {
        Form,
        CategoriesCarousel,
    },

    data() {
        return {
        Text: '',
        Films: [],
        ApiSearch: '',
        languages: ['it', 'en'],
        section: 'Home',
        testo: this.search,
        }
    },

    props: {
        search: String,
    },

    computed: {
        Api_film() {
            if (this.Text === "") {
                return ''
            } else {
                return `http://127.0.0.1:8000/api/search/${this.Text}`
            }
        },
    },

    methods: {
        call_api_movie(Api) {
                Axios.get(Api)
                .then(result => {
                    this.Films = result.data;
                    this.$emit('film', this.Films);
                })
                .catch(error => console.log(error));
        },

        reciveText(Text) {
            this.Text = Text;
            this.call_api_movie(this.Api_film);
            console.log(this.Api_film);
        },
    }
}
</script>

<style scoped lang="scss">
    .header {
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        padding: 10px;
        top: 0;
        .header-image {
            display: flex;
            align-items: center;
            height: 100%;
            margin-right: 30px;
            img {
                height: 90%;
            }
        }
        .nav {
            display: flex;
            align-items: center;
            flex-grow: 1;
            list-style: none;
            li {
                margin-right: 20px;
                button {
                    background-color: transparent;
                    border: none;
                    text-transform: uppercase;
                    font-size: 18px;
                    color: rgb(190, 190, 190);
                    transition: 0,5s;
                    &:hover {
                        color: white;
                    }
                }
            }
        }
    }
    
</style>