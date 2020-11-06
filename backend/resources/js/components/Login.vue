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
            <div class="text-danger">{{ error }}</div>
            <div>
                Email:<input v-model="email" type="email" @keydown="error = ''" />
            </div>
            <div>
                Password:<input v-model="password" type="password" @keydown="error = ''" />
            </div>
            <button id="login_button" @click="login()">Login</button>
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
            error: '',
        }
    },
    methods: {
        login() {
            if(this.email == '' || this.password == '') {
                this.error = 'Please enter a valid email and/or password.'
            }
            else {
                let self = this;
                axios.post('/api/login', {
                    'email' : this.email,
                    'password' : this.password
                })
                .then(function(response) {
                    self.$session.start()
                    self.$store.commit('login', response.data.data);
                    if(response.data.data.role_name == 'Teacher') {
                        self.$router.push({name: 'Teacher_Dashboard'});
                    }
                    else {
                        self.$router.push({name: 'Student_Dashboard'});
                    }
                })
                .catch(function(error) {
                    self.error = 'Invalid email or password.'
                });
            }
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
    #login_button:active {
        background-color: #e3e3e3;
    }
</style>
