export const namespaced = true;

export const state = {
    projects: [],
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
};

export const actions = {

    setProjects({commit}) {
        return axios
            .get('projects')
            .then(response => {
                console.log(response)
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
};

export const getters = {

    projects(state) {
        return state.projects
    }
};
