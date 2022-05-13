/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import DatepickerComponent from './components/DatepickerComponent'
import FollowButton from './components/FollowButton'
import MaterialComponent from './components/MaterialComponent'
import MaterialEdit from './components/MaterialEdit'
import PostRecipeLike from './components/PostRecipeLike'
import ProcedureComponent from './components/ProcedureComponent'
import RecipeLike from './components/RecipeLike'
import RecordBreakfast from './components/RecordBreakfast'
import TestComponent from './components/TestComponent'
import IconRegister from './components/IconRegister'
import ImageComponent from './components/ImageComponent'
import CountupButton from './components/CountupButton'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        DatepickerComponent,
        FollowButton,
        MaterialComponent,
        MaterialEdit,
        PostRecipeLike,
        ProcedureComponent,
        RecipeLike,
        RecordBreakfast,
        TestComponent,
        IconRegister,
        ImageComponent,
        CountupButton
    }
});
