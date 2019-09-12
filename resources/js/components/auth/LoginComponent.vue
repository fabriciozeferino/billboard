<template>
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="block mx-auto w-full max-w-sm bg-white my-6 shadow-lg rounded-lg overflow-hidden">
                <div>
                    <div
                        class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase bg-white">
                        Login
                    </div>

                    <form class="bg-gray-100" @submit.prevent="login">

                        <div class="px-6 pt-6">
                            <label for="inputEmail" class="block text-gray-700 text-sm font-bold">E-mail Address</label>
                            <input autofocus class="form-input mt-1 block w-full" id="inputEmail"
                                   placeholder="Email address"
                                   type="text" v-model.lazy="$v.email.$model">
                        </div>

                        <div v-if="$v.email.$dirty">
                            <p class="error-login" v-if="!$v.email.email">Please enter a valid E-mail address.</p>
                            <p class="error-login" v-if="!$v.email.required">Email is required.</p>
                        </div>


                        <div class="px-6 py-6">
                            <label class="block text-gray-700 text-sm font-bold" for="inputPassword">Password</label>
                            <input class="form-input mt-1 block w-full" id="inputPassword" placeholder="Password"
                                   type="password" v-model.lazy="$v.password.$model">
                        </div>
                        <div v-if="$v.password.$dirty">
                            <p class="" v-if="!$v.password.required">Please enter your Password.</p>
                            <p class="" v-if="!$v.password.minLength">Password must have at least
                                {{ $v.password.$params.minLength.min }} characters.</p>
                        </div>


                        <div class="border-t p-6 bg-white">
                            <div class="flex justify-between items-center">
                                <button class="btn-blue" type="submit">Sign in</button>
                                <a class="px-6 py-3 text-blue-800 text-sm font-bold">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-grey-700 text-sm text-center">

                Don't have an account?
                <a class="text-blue-600 font-bold" href="">Create</a>

                Already have an account?
                <a class="text-blue-600 font-bold" href="">Sign in</a>

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
                if (!this.$v.$invalid) {
                    this.$store
                        .dispatch('auth/login', {
                            email: this.email,
                            password: this.password
                        })
                        .then(() => this.$router.push({name: 'home'})
                        )
                        .catch(function (error) {
                            let notification = {
                                type: '',
                                title: '',
                                text: ''
                            };

                            if (error.response) {
                                notification.type = 'error';
                                notification.title = error.response.status;
                                notification.text = error.response.data.status;
                                console.log('The request was made and the server responded with a status code')

                                if (error.response.status === 422) {
                                    notification.text = 'Try again!';
                                }

                            } else if (error.request) {
                                notification.type = 'error';
                                notification.title = 'The request was made but no response was received';
                                notification.text = error.request;
                                console.log('The request was made but no response was received')

                            } else {
                                notification.type = 'error';
                                notification.title = 'Something happened in setting up the request that triggered an Error';
                                notification.text = error.message;
                                console.log('Something happened in setting up the request that triggered an Error')
                            }

                            swal.fire(notification);
                        });
                }
            }
        }
    }
</script>
