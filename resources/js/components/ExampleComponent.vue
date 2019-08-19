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
                        <small class="float-right">11 mins ago</small>
                    </div>

                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                        vulputate fringilla. Donec lacinia congue felis in faucibus.</small>
                </div>
            </li>
        </ul>


        <div class="media text-muted pt-3" v-for="activity in laravelData.data" :key="activity.id">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                 preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect width="100%" height="100%" fill="#007bff"></rect>
            </svg>
            <p class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray">


                <strong class="mr-auto text-gray-dark">{{ activity.user.name }}</strong>
                <small>11 mins ago</small>

            </p>
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
                    .finally(data => console.log(this.laravelData));

            }
        }
    }

</script>

<style scoped>
</style>
