<template>
  <div class="header">
      <h1>
          Inserisci qui la specializzazione che stai cercando
      </h1>
      <Form @searchText="reciveText"/>
  </div>
</template>

<script>

import Axios from 'axios';
import Form from './Form.vue';

export default {
    name: 'Header',

    components: {
        Form,
    },

    data() {
        return {
        Text: '',
        Films: [],
        ApiSearch: '',
        languages: ['it', 'en'],
        section: 'Home',
        }
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
                    console.log(result.data);
                    this.Films = result.data;
                    console.log(this.Films);
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
        height: 100px;
        background-color: transparent;
        display: flex;
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