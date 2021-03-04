/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import SvgVue from 'svg-vue';
Vue.use(SvgVue);

// CoreUI
import 'core-js/stable'
import '@coreui/coreui'
import CoreuiVue from '@coreui/vue';
import { freeSet } from '@coreui/icons'
import '@coreui/icons-vue'
Vue.use(CoreuiVue);
Vue.use(freeSet);

// Vue Toast Notification
import VueToast from 'vue-toast-notification';
Vue.use(VueToast, {
  	position: 'top-right',
  	duration: 3500,
    dismissible: true
});

// VeeValidate
import { ValidationObserver, ValidationProvider, extend, localize, configure } from 'vee-validate';
import es from 'vee-validate/dist/locale/es'
import * as rules from 'vee-validate/dist/rules';
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);
localize('es', es);

// Importamos todas las reglas de validacion
Object.keys(rules).forEach(rule => {
  	extend(rule, rules[rule]);
});

const config = {
  	classes: {
    	valid: 'is-valid',
    	invalid: 'is-invalid'
  	}
};

// Sets the options.
configure(config);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('settings-form', require('./components/SettingsForm.vue').default);
Vue.component('modal-delete', require('./components/ModalDelete.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    icons: { freeSet }
});