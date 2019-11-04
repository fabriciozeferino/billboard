<template>
    <div class="flex items-center w-full sm:px-10 md:max-w-md">
        <div class="w-full">
            <div class="text-gray-700 hover:text-gray-900 text-xs text-center">
                <a href="cv">
                    Fabricio Zeferino
                    <span class="text-xs text-blue-600 hover:text-blue-800 font-bold">
                        CV
                    </span>
                </a>
            </div>
            <div class="block bg-white my-10 shadow-2xl rounded-lg overflow-hidden">
                <div>
                    <div
                        class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase bg-white">
                        Login
                    </div>
                    <form @submit.prevent="login">

                        <div class="px-6 py-6">
                            <div>
                                <label for="inputEmail" class="form-label">E-mail
                                    Address</label>
                                <input autofocus class="form-input"
                                       :class="$v.email.$error ? ' form-error' : null" id="inputEmail"
                                       autocomplete="off"
                                       placeholder="Email address"
                                       type="email" v-model.lazy="$v.email.$model">
                            </div>
                            <div v-if="$v.email.$dirty">
                                <p class="form-error-message" v-if="!$v.email.email">
                                    Please enter a valid E-mail address.
                                </p>
                                <p class="form-error-message" v-if="!$v.email.required">
                                    Email is required.
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <div>
                                <label class="form-label"
                                       for="inputPassword">Password</label>
                                <input class="form-input"
                                       :class="$v.password.$error ? ' form-error' : '' " id="inputPassword"
                                       autocomplete="off"
                                       placeholder="Password" autofocus
                                       type="password" v-model.lazy="$v.password.$model">
                            </div>
                            <div v-if="$v.password.$dirty">
                                <p class="form-error-message" v-if="!$v.password.required">
                                    Please enter your Password.
                                </p>
                                <p class="form-error-message" v-if="!$v.password.minLength">
                                    Password must have at least {{ $v.password.$params.minLength.min }} characters.
                                </p>
                            </div>
                        </div>


                        <div class="border-t p-6 bg-white">
                            <div class="flex justify-between items-center">
                                <button @click.prevent="login" :disabled="this.$v.$invalid"
                                        class="button button-primary"
                                        type="submit">Sign in
                                </button>
                                <!--<a class="form-label px-6 py-3 ">Forgot Your Password?</a>-->
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="text-gray-700 text-sm text-center">
                Don't have an account?
                <router-link class="py-3 text-blue-600 hover:text-blue-800 font-bold" :to="{ name: 'register' }">
                    Create
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import {email, minLength, required} from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                email: '',
                password: ''
            }
        },

        validations: {
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            }
        },

        methods: {
            login() {
                this.$v.$touch();

                if (!this.$v.$invalid) {
                    this.$store
                        .dispatch('auth/login', {
                            email: this.email,
                            password: this.password
                        })
                        .then((response) => response.data)
                        .then(data => {
                                this.$store
                                    .dispatch('projects/numberOfProjects', {data});

                                this.$router.push('/')
                            }
                        )
                        .catch(function (error) {
                            let notification = {
                                type: 'error',
                                title: 'Oops!',
                            };

                            if (error.response.data.status === 'error') {
                                notification.text = error.response.data.message;
                            }
                            swal.fire(notification);
                        });
                }
            }
        }
    }
</script>
