<template>
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="block mx-auto w-full max-w-sm bg-white my-6 shadow-lg rounded-lg overflow-hidden">
                <div>
                    <div
                        class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase bg-white">
                        Register
                    </div>

                    <form class="bg-gray-100" @submit.prevent="register">

                        <div class="px-6 py-6">
                            <div>
                                <label for="inputName" class="block text-gray-700 text-sm font-bold">Name</label>
                                <input autofocus class="form-input mt-1 block w-full"
                                       :class="$v.name.$error ? ' border-red-500' : null" id="inputName"
                                       placeholder="Type your full name"
                                       type="text" v-model.lazy="$v.name.$model">
                            </div>
                            <div v-if="$v.name.$dirty">
                                <p class="text-red-500 text-xs italic" v-if="!$v.name.required">
                                    Name is required.
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <div>
                                <label for="inputEmail" class="block text-gray-700 text-sm font-bold">E-mail
                                    Address</label>
                                <input autofocus class="form-input mt-1 block w-full"
                                       :class="$v.email.$error ? ' border-red-500' : null" id="inputEmail"
                                       placeholder="Email address"
                                       type="text" v-model.lazy="$v.email.$model">
                            </div>
                            <div v-if="$v.email.$dirty">
                                <p class="text-red-500 text-xs italic" v-if="!$v.email.email">
                                    Please enter a valid E-mail address.
                                </p>
                                <p class="text-red-500 text-xs italic" v-if="!$v.email.required">
                                    E-mail is required.
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold"
                                       for="inputPassword">Password</label>
                                <input class="form-input mt-1 block w-full"
                                       :class="$v.password.$error ? ' border-red-500' : null" id="inputPassword"
                                       placeholder="Password" autofocus
                                       type="password" v-model.lazy="$v.password.$model">
                            </div>
                            <div v-if="$v.password.$dirty">
                                <p class="text-red-500 text-xs italic" v-if="!$v.password.required">
                                    Password is required.
                                </p>
                                <p class="text-red-500 text-xs italic" v-if="!$v.password.minLength">
                                    Password must have at least {{ $v.password.$params.minLength.min }} characters.
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold"
                                       for="inputPasswordConfirmation">Confirm Password</label>
                                <input class="form-input mt-1 block w-full"
                                       :class="$v.password_confirmation.$error ? ' border-red-500' : null"
                                       id="inputPasswordConfirmation"
                                       placeholder="Password" autofocus
                                       type="password" v-model.lazy="$v.password_confirmation.$model">
                            </div>
                            <div v-if="$v.password_confirmation.$dirty">
                                <p class="text-red-500 text-xs italic" v-if="!$v.password_confirmation.required">
                                    Confirm Password is required
                                </p>
                                <p class="text-red-500 text-xs italic" v-if="!$v.password_confirmation.sameAsPassword">
                                    Passwords must be identical.
                                </p>
                            </div>
                        </div>

                        <div class="border-t p-6 bg-white">
                            <div class="flex justify-between items-center">
                                <button class="btn-blue" type="submit">Register</button>
                                <a class="px-6 py-3 text-blue-800 text-sm font-bold">Welcome!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-grey-700 text-sm text-center">
                Don't have an account?
                <router-link class="py-3 text-blue-600 hover:text-blue-800 font-bold " :to="{ name: 'login' }">
                    Sign in
                </router-link>

            </div>
        </div>
    </div>
</template>

<script>
    import {email, minLength, required, sameAs} from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        },

        validations: {
            name: {
                required,
            },
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            },
            password_confirmation: {
                required,
                sameAsPassword: sameAs('password')
            }
        },

        methods: {
            register() {
                if (!this.$v.$invalid) {
                    this.$store
                        .dispatch('auth/register', {
                            name: this.name,
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                        })
                        .then(() => this.$router.push({name: 'home'})
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
                                    notification.text = 'Try again!';
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
