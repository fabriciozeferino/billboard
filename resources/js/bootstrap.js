window.axios = require('axios');

/**
 * Set the Default Headers for the API
 */
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
window.axios.defaults.headers.common['Accept'] = 'application/json';
window.axios.defaults.headers.common.crossDomain = true;
window.axios.defaults.baseURL = '/api/v1/';

/**
 * Set the Authentication Token if the user has one on the storage
 * if the user has no token, redirect to login page
 */
const JWTtoken = localStorage.getItem('token');

if (JWTtoken) {
    window.axios.defaults.headers.common['Authorization'] = JWTtoken;
}

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


/**
 * Interceptor for responses
 * if unauthenticated (401), clean the credentials on storage and redirect to login page
 */
axios.interceptors.response.use(
    function (response) {
        return response;
    },

    function (error) {
        if (error.response.status === 401) {

            localStorage.clear();
            window.location = "/login";


            delete axios.defaults.headers.common.Authorization;
        }

        return Promise.reject(error);
    });

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
