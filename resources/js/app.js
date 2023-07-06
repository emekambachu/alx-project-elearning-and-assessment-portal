/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import {
    createApp
} from 'vue';
import router from './router';
import axios from 'axios';
import VueAxios from 'vue-axios';

// Moment timestamp
import moment from 'moment';

// Sweet Alert
import Swal from 'sweetalert2';
window.Swal = Swal;

// Date Picker
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Application
import ApplicationForm from './components/home/application/ApplicationForm';

// Admin
import AdminLogin from './components/admin/auth/AdminLogin';

// Learning
import LearningRegister from './components/learning/auth/LearningRegister';
import LearningLogin from './components/learning/auth/LearningLogin';
import LearningPasswordReset from './components/learning/auth/LearningPasswordReset';
import LearningPasswordResetUpdate from './components/learning/auth/LearningPasswordResetUpdate';

// Learning dashboard
import LearningDashboardMainHeader from './components/learning/LearningDashboardMainHeader.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const App = createApp({
    components: {
        ApplicationForm,
        Datepicker,
        // Multiselect,
        AdminLogin,

        LearningRegister,
        LearningLogin,
        LearningPasswordReset,
        LearningPasswordResetUpdate,

        LearningDashboardMainHeader,
    }
});

// App.component('multiselect', Multiselect);

// Access and assign laravel .env variables to vue global variables
// App.config.globalProperties.$apiUrl = process.env.MIX_API_URL

App.use(
    router,
    axios,
    VueAxios,
    moment,
).mount('#app');
