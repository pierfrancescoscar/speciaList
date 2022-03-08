/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
/* import DoctorCarousel from './components/DoctorCarousel';

Vue.component('DoctorCarousel', DoctorCarousel); */

Vue.component('doctorcarousel' , require('./components/DoctorCarousel').default);
Vue.component('categoriescarousel' , require('./components/CategoriesCarousel').default);
Vue.component('app' , require('./components/App').default);
Vue.component('reviews' , require('./components/Reviews').default);
Vue.component('contactdoctor' , require('./components/ContactDoctor').default);
Vue.component('showdoctor' , require('./components/ShowDoctor').default);
Vue.component('formreview' , require('./components/FormReview').default);
Vue.component('mycontact' , require('./components/MyContact').default);


const app = new Vue({
    el: '#app',
});
