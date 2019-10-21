import {mapActions, mapGetters, mapState} from 'vuex'

export const projectComputed = {
    ...mapGetters('projects', [
        'projects',
    ]),
};

export const projectMethods = {
    ...mapActions('projects', [
        'getProjects',
        'create',
    ]),
};

export const projectStates = {
    ...mapState('projects', [
        'projects'
    ]),
};
