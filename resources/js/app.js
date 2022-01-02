/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue').default;
var moment = require('moment');
Vue.filter('getMonthName', function(value) {
    if (value) {
        return moment(String(value)).format('MMMM')
    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Globale component
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('patients-table', require('./components/Globale/PatientsTable.vue').default);
Vue.component('add-patient', require('./components/Globale/AddPatient.vue').default);
Vue.component('filter-component', require('./components/Globale/FilterComponent.vue').default);

// acte components
Vue.component('acte-search-component', require('./components/acte/searchComponent.vue').default);
Vue.component('acte-list-component', require('./components/acte/listComponent.vue').default);

// medicament components
Vue.component('medicament-search-component', require('./components/medicament/searchComponent.vue').default);
Vue.component('medicament-list-component', require('./components/medicament/listComponent.vue').default);


// patient components
Vue.component('patient-search-component', require('./components/patient/searchComponent.vue').default);


// service components
Vue.component('service-manage-component', require('./components/service/manageComponent.vue').default);
// caisse components
Vue.component('caisse-manage-component', require('./components/caisse/manageComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
