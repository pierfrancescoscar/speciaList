<template>
    <div id="app">
        <Header :search="dato" @film="ReciveFilms" @series="ReciveSeries"/>
        <h3 v-show="Films.length != 0">Ecco gli specialisti che abbiamo trovato per te!</h3>
        <h4 class="mb-5" v-if="Films.length <= 0">Al momento non c'è nessuno speciaLista qui.</h4>
        
        <CardList v-show="Films.length != 0" :CardList="Films"/>
    </div>
</template>

<script>
import Header from './Header.vue';
import CardList from './CardList.vue';

export default {
  name: 'App',

  data() {
        return {
        Films: [],
        tvSeries: [],
        dato: this.data,
        }
    },

  props: {
    data: String,
  },

  components: {
    Header,
    CardList,
  },

  methods: {

    ReciveFilms(Array) {
            this.Films = Array;
            console.log(this.dato);
        },

    ReciveSeries(Array) {
            this.tvSeries = Array;
        },
  }
}
</script>

<style scoped lang="scss">
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #141414;
    padding-top: 120px;
  }

  h3,h4 {
    color: #0071c3;
    margin-left: 50px;
    margin-top: 30px;
  }

  #app {
    display: flex;
    flex-direction: column;
    align-items: center;
  }


</style>
