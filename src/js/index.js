import 'core-js/stable'
import Vue from 'vue'
import '@coreui/coreui'

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