<template>
    <div>
        <div>
            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-white">

                <img alt="Placeholder" class="block h-auto w-full"
                     src="https://picsum.photos/300/100/?random">

                <header class="p-4">
                    <h1 class="text-lg no-underline text-black">
                        {{ project.title }}
                    </h1>
                    <div class="text-gray-700">{{ project.description}}</div>
                </header>

                <!-- Form to add new task -->
                <section class="p-4">
                    <form @submit.prevent="createNewTask(project)">
                        <div class="flex items-center py-2">

                            <input class="form-input mr-2"
                                   :class="$v.title.$error ? ' form-error' : '' " id="inputTitle"
                                   placeholder="Task's title"
                                   type="text" v-model.lazy="$v.title.$model">

                            <button class="button button-primary" type="submit">
                                New
                            </button>
                        </div>
                        <div v-if="$v.title.$dirty">
                            <p class="form-error-message" v-if="!$v.title.required">
                                Task title is required.
                            </p>
                        </div>
                    </form>
                </section>

                <section class="p-4">
                    <div v-for="task in tasks">
                        <div class="flex p-4 my-4 overflow-hidden rounded-lg shadow-md bg-white">
                            <label class="flex justify-start items-start">
                                <div
                                    class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                    <input type="checkbox" class="opacity-0 absolute" v-model="task.completed"
                                           @change="toggleComplete(task)">
                                    <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none"
                                         viewBox="0 0 20 20">
                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                    </svg>
                                </div>
                                <h3 class="select-none">{{ task.title }}</h3>
                            </label>
                        </div>

                    </div>
                </section>

                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <div class="flex items-center">
                        <img alt="Placeholder" class="w-10 h-10 rounded-full mr-4"
                             src="https://picsum.photos/34/34/?random">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                            <p class="text-gray-600">Aug 18</p>
                            <div class="mt-2 flex items-center">
                                <svg v-for="i in 5" :class="i <= project.id ? 'text-blue-500' : 'text-gray-400'"
                                     class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M10 1.3l2.388 6.722H18.8l-5.232 3.948 1.871 6.928L10 14.744l-5.438 4.154 1.87-6.928-5.233-3.948h6.412L10 1.3z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!--<Icon :name="'trash'"
                          class="mr-1 fill-current text-gray-200 hover:text-red-400 inline-block h-5 w-5 cursor-pointer"
                          @click.native="deleteProjects(project)"/>-->
                </footer>

            </article>

        </div>
    </div>
</template>
<script>
    import Icon from "../shared/Icon";
    import {maxLength, minLength, required} from 'vuelidate/lib/validators'


    export default {
        data() {
            return {
                project: {},
                tasks: [],
                title: '',
            }
        },
        validations: {
            title: {
                required,
            },
            description: {
                required,
                maxLength: maxLength(255),
                minLength: minLength(6)
            }
        },

        beforeMount() {
            axios.get(`projects/${this.$route.params.id}/`)
                .then(
                    data => {
                        this.project = data.data.data.project;
                        this.tasks = data.data.data.tasks;
                    }
                );
        },

        methods: {
            createNewTask(project) {

                this.$v.$touch();

                axios
                    .post(`projects/${project.id}/tasks`, {
                        title: this.title
                    })
                    .then((data) => {
                        this.tasks.unshift(data.data)
                    })

            },

            toggleComplete(task) {
                axios.put(`projects/${this.$route.params.id}/tasks/${task.id}/complete`)
                    .then(
                        data => {
                            console.log(data);
                            //this.project = data.data.data.project;
                            //this.tasks = data.data.data.tasks;
                        }
                    ).catch(error => console.error(error.response));
            }
        },

        components: {
            Icon
        }
    }
</script>
<style>
    input:checked + svg {
        display: block;
    }
</style>
