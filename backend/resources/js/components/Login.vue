<template>
    <div id="login">
        <br/>
        <br/>
        <br/>
        <h1 align="center">Welcome to San Distance Learning</h1>
        <br/>
        <br/>
        <br/>
        <img class="center" src="../../Pictures/Logo.png" alt="San_Logo" width="100" length="200">
        <br/>
        <br/>
        <br/>
        <!-- <div class="text-center">
            <b-button active align="center" href="/teacher">I am a teacher</b-button>
            <b-button active align="center" href="/student">I am a student</b-button>
        </div> -->
        <div>
            <h1>Login</h1>
            <div>
                Email:<input v-model="email" type="email" />
            </div>
            <div>
                Password:<input v-model="password" type="password" />
            </div>
            <button @click="login()">Login</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "Login",
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        login() {
            axios.post('/api/login', {
                'email' : this.email,
                'password' : this.password
            })
            .then(function(response) {
                console.log(response);
            });
        }
    }
}
</script>

<style>
    #login {
        align-content: center;
        margin: auto;
        width: 700px;
    }
    .center{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
