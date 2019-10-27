export const namespaced = true;

export const state = {
    projects: [],
    numberOfProjects: 0
};

export const mutations = {


    GET_PROJECTS(state, payload) {
        state.projects = payload;
    },

    CREATE(state, payload) {
        state.projects.push(payload);
    },

    DELETE(state) {

    },

    NUMBER_OF_PROJECTS(STATE) {

    }
};

export const actions = {

    show({commit}) {
        return axios
            .get('projects')
            .then(response => {
                commit('GET_PROJECTS', response.data)
            })
    },


    create({commit}, data) {
        return axios
            .post('projects', data)
            .then(response => {
                commit('CREATE', response.data)
            })
    },

    numberOfProjects({commit}, data){
        return new Promise(resolve => {

            resolve(data)
        })
    }
};

export const getters = {

    projects(state) {
        return state.projects
    },
    numberOfProjects(state) {
        return state.projects.length;
    }
};
