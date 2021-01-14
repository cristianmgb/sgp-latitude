import 'core-js/stable'
import Vue from 'vue'
import '@coreui/coreui'

// Import Main styles for this application
import '../scss/dashboard'
import '../img/brand-full.png'
import '../img/brand-minimized.png'

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