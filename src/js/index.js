import 'core-js/stable'
import Vue from 'vue'
import '@coreui/coreui'

// Installing whole package
import CoreuiVue from '@coreui/vue';
Vue.use(CoreuiVue);

// Vue Toast Notification
import VueToast from 'vue-toast-notification';
Vue.use(VueToast, {
  	position: 'top-right',
  	duration: 3500,
    dismissible: true
});

// // VeeValidate
// import 'vee-validate';

// Import Main styles for this application
import '../scss/dashboard'
import '../img/brand-full.png'
import '../img/brand-minimized.png'

// Favicon
import '../img/favicon/apple-icon-precomposed.png'
import '../img/favicon/apple-icon.png'
import '../img/favicon/apple-icon-57x57.png'
import '../img/favicon/apple-icon-60x60.png'
import '../img/favicon/apple-icon-72x72.png'
import '../img/favicon/apple-icon-76x76.png'
import '../img/favicon/apple-icon-114x114.png'
import '../img/favicon/apple-icon-120x120.png'
import '../img/favicon/apple-icon-144x144.png'
import '../img/favicon/apple-icon-152x152.png'
import '../img/favicon/apple-icon-180x180.png'
import '../img/favicon/android-icon-36x36.png'
import '../img/favicon/android-icon-48x48.png'
import '../img/favicon/android-icon-72x72.png'
import '../img/favicon/android-icon-96x96.png'
import '../img/favicon/android-icon-144x144.png'
import '../img/favicon/android-icon-192x192.png'
import '../img/favicon/favicon-16x16.png'
import '../img/favicon/favicon-32x32.png'
import '../img/favicon/favicon-96x96.png'
import '../img/favicon/ms-icon-70x70.png'
import '../img/favicon/ms-icon-144x144.png'
import '../img/favicon/favicon.ico'

// Componentes
Vue.component('sgp-rol-form', require('./components/RolFormComponent').default)
Vue.component('sgp-policy-form', require('./components/PolicyFormComponent').default)
Vue.component('sgp-tax-form', require('./components/TaxFormComponent').default)
Vue.component('sgp-contractor-form', require('./components/ContractorFormComponent').default)
Vue.component('sgp-associate-form', require('./components/AssociateFormComponent').default)
Vue.component('sgp-associate-table', require('./components/AssociateTableComponent').default)
Vue.component('sgp-user-form', require('./components/UserFormComponent').default)
Vue.component('sgp-user-table', require('./components/UserTableComponent').default)
Vue.component('sgp-taxes-table-project', require('./components/TaxesTableProjectComponent').default)
Vue.component('sgp-project-form', require('./components/ProjectFormComponent').default)
Vue.component('sgp-associate-edit-form', require('./components/AssociateEditFormComponent').default)
Vue.component('sgp-contractor-edit-form', require('./components/ContractorEditFormComponent').default)
Vue.component('sgp-tax-edit-form', require('./components/TaxEditFormComponent').default)
Vue.component('sgp-policy-edit-form', require('./components/PolicyEditFormComponent').default)
Vue.component('sgp-rol-edit-form', require('./components/RolEditFormComponent').default)
Vue.component('sgp-user-edit-form', require('./components/UserEditFormComponent').default)

/**
 * [dash description]: Instanciamos Vue en 'dash'
 * @type {Vue}
 */
new Vue({
    el: '#dash',
    data: {
    	msg: 'Dashboard Starter-ci-boilerplate 1.0'
	}
})