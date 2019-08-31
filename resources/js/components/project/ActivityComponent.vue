<template>
    <div>

        <div class="media mb-2 border-bottom border-gray" v-for="(activity, key) in laravelData.data"
             :key="activity.id">

            <div class="mr-2" v-if="activity.description === 'created'">
                <icon-base width="20"
                           height="20"
                           icon-name="created"
                           iconColor="#2D3748">
                    <add-outline/>
                </icon-base>
            </div>

            <div class="mr-2" v-if="activity.description === 'updated'">
                <icon-base width="20"
                           height="20"
                           icon-name="created"
                           iconColor="#2D3748">
                    <edit-pencil/>
                </icon-base>
            </div>

            <div class="media-body">

                <div>
                    <div>
                        <strong class="mt-0 mr-auto text-muted">{{ activity.user.name }}</strong>
                    </div>
                    <small class="small-description">{{ renderMessage(activity) }}</small>

                    <small class="float-right text-muted" v-if="activity.description === 'updated'">
                        <a data-toggle="collapse" :href="'#collapse' + activity.id"
                           aria-expanded="false" :aria-controls="'collapse' + activity.id">Changes</a>
                    </small>

                    <div class="media border-top border-gray collapse" :id="'collapse' + activity.id">
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
        components: {
        },
        created() {
            this.getResults();
        },
        data() {
            return {
                laravelData: {}
            }
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
            hideChanges(slider) {
                slider.showEdit = false
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
            },
            showChanges(slider) {
                slider.showEdit = true
            }
        },
        props: ['project_id']
    }

</script>

<style scoped>
</style>
