<template>
    <div>

        <div class="media mb-2" v-for="activity in laravelData.data" :key="activity.id">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                 preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect width="100%" height="100%" fill="#007bff"></rect>
            </svg>
            <div class="media-body">

                <div class="border-bottom border-gray">
                    <div>
                        <strong class="mt-0 mr-auto text-muted">{{ activity.user.name }}</strong>
                    </div>
                    <small class="small-description">{{ renderMessage(activity) }}</small>
                    <small class="float-right text-muted" v-if="activity.description === 'updated'"><a
                        href="#">Changes</a></small>

                    <div class="media border-top border-gray">

                        <div class="media-body">
                            <div class="mt-0" v-if="activity.description === 'updated'">
                                <small v-for="(change, key) in activity.changes.before"> The <strong>{{ key }}</strong>
                                    was changed from "{{ change }}" to
                                    <strong v-for="change in activity.changes.after">"{{change}}"</strong>.
                                </small>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="d-block text-right mt-3">
            <pagination :data="laravelData" :show-disabled="true" size="small" align="center"
                        @pagination-change-page="getResults">
            </pagination>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['project_id'],
        data() {
            return {
                laravelData: {},
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                axios.get('/projects/' + this.project_id + '/activities?page=' + page)
                    .then(response => this.laravelData = response.data)
                    .catch(error => console.log(error))
            },
            renderMessage(activity) {

                const subject_type = activity.subject_type.replace("App\\", '')

                switch (true) {
                    case subject_type === 'Project':

                        return `This ${subject_type} was ${activity.description} ${this.$moment(activity.created_at).fromNow()}.`;

                        break;

                    case activity.description === 'created' && subject_type === 'Task':

                        return `A new ${subject_type} "${activity.subject.title}" was ${activity.description} ${this.$moment(activity.created_at).fromNow()}.`;

                        break;

                    case activity.description === 'updated' && subject_type === 'Task':

                        return `The ${subject_type} "${activity.subject.title}" was ${activity.description} ${this.$moment(activity.updated_at).fromNow()}.`;

                        break;

                }
            }
        },
    }

</script>

<style scoped>

    .small-description:first-letter {
        text-transform: capitalize;
    }
</style>
