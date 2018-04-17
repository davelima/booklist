require('vue')
require('bootstrap-sass')
require('bootstrap-notify')

import Vue from 'vue'
import App from './components/App.vue'

window.onload = function() {
    new Vue({
        delimiters: ['${', '}'],
        el: '#app',
        render: h => h(App)
    })
}
