<template>
    <div class="flex items-center w-full sm:px-10 md:max-w-md">
        <div class="w-full">
            <div class="mx-auto w-full max-w-sm bg-white my-6 shadow-lg rounded-lg overflow-hidden">
                <div>
                    <div
                        class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase bg-white">
                        New Project
                    </div>

                    <form class="bg-gray-100" @submit.prevent="createNewProject">

                        <div class="px-6 py-6">
                            <div>
                                <label for="inputTitle" class="form-label">Title</label>
                                <input autofocus class="form-input"
                                       :class="$v.title.$error ? ' form-error' : '' " id="inputTitle"
                                       placeholder="Project's title"
                                       type="text" v-model.lazy="$v.title.$model">
                            </div>
                            <div v-if="$v.title.$dirty">
                                <p class="form-error-message" v-if="!$v.title.required">
                                    Project Title is required.
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <div>
                                <label for="inputDescription" class="form-label">Description</label>
                                <textarea autofocus class="form-textarea" rows="6"
                                          :class="$v.description.$error ? ' form-error' : '' " id="inputDescription"
                                          placeholder="Description"
                                          type="text" v-model.lazy="$v.description.$model"></textarea>
                            </div>
                            <div v-if="$v.description.$dirty">
                                <p class="form-error-message" v-if="!$v.description.minLength">
                                    The description must not have more than {{ $v.description.$params.minLength.min }}
                                    characters.
                                </p>
                                <p class="form-error-message" v-if="!$v.description.maxLength">
                                    The description must have at least {{ $v.description.$params.maxLength.min }}
                                    characters.
                                </p>
                                <p class="form-error-message" v-if="!$v.description.required">
                                    The description is required.
                                </p>
                            </div>
                        </div>


                        <div class="border-t p-6 bg-white">
                            <div class="flex justify-between items-center">
                                <button class="button button-primary" type="submit">
                                    New
                                </button>
                                <!-- :class="this.$v.$invalid ? ' button-primary-invalid ' : '' " -->
                                <!--<a class="px-6 py-3 text-blue-800 text-sm font-bold">Create a new Project</a>-->
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {maxLength, minLength, required} from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                title: '',
                description: '',
                notes: ''
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

        methods: {
            createNewProject() {

                this.$v.$touch();

                if (!this.$v.$invalid) {
                    /*this.$store
                        .dispatch('/projects ', {
                            title: this.title,
                            description: this.description,
                        })*/
                    axios
                        .post('/projects ', {
                            title: this.title,
                            description: this.description,
                        })
                        .then(() => this.$router.push({name: 'projects'})
                        )
                        .catch(function (error) {
                            let notification = {
                                type: 'error',
                                title: '',
                                text: ''
                            };

                            if (error.response) {
                                notification.title = error.response.status;
                                notification.text = error.response.data.status;

                                if (error.response.status === 422) {
                                    const errors = error.response.data.errors;

                                    let list = `<ul>`;
                                    for (const prop in errors) {
                                        list += `<li>${errors[prop]}</li>`;
                                    }
                                    list += `</lu>`;

                                    notification.html = list;
                                }

                            } else if (error.request) {
                                notification.title = 'The request was made but no response was received';
                                notification.text = error.request;

                            } else {
                                notification.title = 'Something happened in setting up the request that triggered an Error';
                                notification.text = error.message;
                            }

                            swal.fire(notification);
                        });
                }
            }
        }

    }
</script>
