import {mapActions, mapGetters, mapState} from 'vuex'

export const projectComputed = {
    ...mapGetters('projects', [
        'projects',
        'numberOfProjects'
    ]),
};

export const projectMethods = {
    ...mapActions('projects', [
        'show',
        'create',
        'setProjects',
        'deleteProjects'
    ]),
};

export const projectStates = {
    ...mapState('projects', [
        'projects',

    ]),
};
