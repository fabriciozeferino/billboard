import {mapActions, mapGetters, mapState} from 'vuex'

export const projectComputed = {
    ...mapGetters('projects', [
        'projects',
        'projectsTrashed',
        'numberOfProjects'
    ]),
};

export const projectMethods = {
    ...mapActions('projects', [
        'show',
        'create',
        'setProjects',
        'deleteProjects',
        'showTrashed'
    ]),
};

export const projectStates = {
    ...mapState('projects', [
        'projects',
        'projectsTrashed'
    ]),
};
