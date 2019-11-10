export const namespaced = true;

export const state = {
    projects: {},
    projectsTrashed: {},
    numberOfProjects: 0
};

export const mutations = {


    GET_PROJECTS(state, payload) {
        state.projects = payload.data;
    },

    GET_TRASHED_PROJECTS(state, payload) {
        state.projectsTrashed = payload.data;
    },

    SET_PROJECTS(state, payload) {
        state.projects = payload;
    },

    CREATE(state, payload) {
        state.projects.push(payload);
    },

    DELETE(state, project) {

        state.projects.data = state.projects.data.filter(item => item !== project);
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

    getProject({commit}, data){

        return axios
            .get(`projects/${data}`)
            .then(response => {
                return response.response.data
                //this.$store.dispatch('projects/setProjects', response.data.data);
            })
            .catch(error => console.log(error.response));
    },

    showTrashed({commit}) {
        return axios
            .get('projects/trash')
            .then(response => {
                commit('GET_PROJECTS', response.data)
            }).catch(error => console.log(error))
    },


    create({commit}, data) {
        return axios
            .post('projects', data)
            .then(response => {
                commit('CREATE', response.data)
            })
    },

    setProjects({commit}, data) {
        return new Promise(resolve => {

            commit('SET_PROJECTS', data);

            resolve(data);
        })
    },

    deleteProjects({commit}, project) {
        return new Promise((resolve, reject) => {
            swal.fire({
                title: 'Are you sure?',
                text: "You will move this Project to the trash",
                type: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                /*confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',*/
                confirmButtonText: 'Yes, move it!',
                customClass: {
                    confirmButton: 'button button-activity',
                    cancelButton: 'button button-danger',
                }
            }).then((result) => {
                if (result.value) {
                    axios.delete(`projects/${project.id}`, project)
                        .then(result => {
                                commit('DELETE', project);

                                swal.fire(
                                    'Moved!',
                                    'Your file has been moved to the trash.',
                                    'success'
                                );

                                resolve(project);
                            }
                        )
                        .catch(error => reject(error))
                }
            })
        })
    },

    numberOfProjects({commit}, data) {
        return new Promise(resolve => {

            resolve(data)
        })
    }
};

export const getters = {

    projects(state) {
        return state.projects
    },

    project(state, id) {
        console.log(state.projects.data)
        console.log(id)

        /*return keyword => state.projects.data.filter(id =>{
            return id.id === keyword
        });*/
    },

    projectsTrashed(state) {
        return state.projects
    },
    numberOfProjects(state) {
        return state.projects.length;
    }
};
