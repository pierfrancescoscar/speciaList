<template>
    <div id="app">
        <Header :search="dato" @film="ReciveFilms" @series="ReciveSeries"/>
        <h1 v-show="Films.length != 0">Ecco gli specialisti che abbiamo trovato per te!</h1>
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

  h1 {
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
