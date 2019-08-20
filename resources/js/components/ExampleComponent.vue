<template>
    <div>

        <ul class="list-unstyled" v-for="activity in laravelData.data" :key="activity.id">
            <li class="media">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                     preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                    <rect width="100%" height="100%" fill="#007bff"></rect>
                </svg>
                <div class="media-body lh-125 border-bottom border-gray">
                    <div>
                        <strong class="mt-0 mr-auto text-muted">{{ activity.user.name }}</strong>
                        <small class="float-right text-muted">{{ moment(activity.updated_at).fromNow() }}</small>
                    </div>

                    <small class="small-description" v-if="activity.description == 'created'">
                        {{ `The ${activity.subject_type.replace("App\\", '')} "${activity.subject.title}" was
                        ${activity.description} ${moment(activity.updated_at).fromNow()}` }}
                    </small>


                    <small class="small-description" v-if="activity.description == 'updated'">updated...</small>
                </div>
            </li>
        </ul>

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
                    .finally(data => console.log(this.laravelData));

            }
        }
    }

</script>

<style scoped>

    .small-description:first-letter {
        text-transform: capitalize;
    }
</style>
