// window.$ = window.jquery = require('jquery');

// recuorses/js/bootstrap.js:

import $ from 'jquery';
window.$ = window.jquery = $;

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

