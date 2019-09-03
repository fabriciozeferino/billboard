<template>
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="block mx-auto w-full max-w-sm bg-white my-6 shadow-lg rounded-lg overflow-hidden">
                <div>
                    <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase bg-white">
                        Login
                    </div>

                    <form class="bg-gray-100" v-on:submit.prevent="login">

                        <div class="px-6 pt-6">
                            <label for="inputEmail" class="block text-gray-700 text-sm font-bold">E-mail Address</label>
                            <input autofocus class="form-input mt-1 block w-full" id="inputEmail" placeholder="Email address"
                                   required type="email" v-model="email">
                        </div>

                        <div class="px-6 py-6">
                            <label class="block text-gray-700 text-sm font-bold" for="inputPassword">Password</label>
                            <input class="form-input mt-1 block w-full" id="inputPassword" placeholder="Password" required
                                   type="password" v-model="password">
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
    export default {
        data() {
            return {
                email: '',
                password: '',
                loginError: null,
            }
        },
        methods: {
            login() {
                this.loginError = null;

                this.$store
                    .dispatch('login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(() => this.$router.push({name: 'home'}))
                    .catch(err => this.error = err.response.data.error)
            }
        }
    }
</script>
