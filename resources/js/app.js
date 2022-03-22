import Vue from 'vue';
import App from './components/App';
import login from './components/login';
import register from './components/register';
import profile from './components/profile';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faUserSecret, faArrowRightFromBracket, faEnvelope, faPhone, faKey, faAddressCard, faCakeCandles, faUser } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';


library.add(faUserSecret, faArrowRightFromBracket, faEnvelope, faPhone, faKey, faAddressCard, faCakeCandles, faUser );


require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('font-awesome-icon', FontAwesomeIcon);



const app = new Vue({
    el: '#app',
    components:{
        App,
        login,
        register,
        profile
    }
});
