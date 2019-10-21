import Vue from 'vue'
import Vuex from 'vuex'
import * as auth from './modules/auth.js'
import * as notifications from './modules/notifications.js'
import * as projects from './modules/projects.js'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth,
        notifications,
        projects
    }
})
