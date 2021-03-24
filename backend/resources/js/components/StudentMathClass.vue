<template>
    <div id="MathClass">
        <Header />
        <NavBar />
        <br/>
        <vs-row>
            <vs-col w="1">
                <div id="side">
                    <SideNav />
                </div>
            </vs-col>
            <vs-col w="1">
                <b-nav vertical class="w-25" align="left" justified>
                    <b-button active to="#">Assignments</b-button>
                    <br />
                    <b-button active :to="'/people/' + $route.params.classId">People</b-button>
                    <br />
                    <b-button active to="/Announcement/math">Announcements</b-button>
                    <br />
                    <b-button active to="PrivateMessages">Private Messages</b-button>
                </b-nav>
            </vs-col>
            <vs-col w="9">
                <div id="data">
                   <!-- GAME STARTS HERE-->
                    <h1>Assignments</h1>
                    <div id="assignments" v-for="assign in assignments">
                        <b-button v-b-toggle="'collapse'+assign.id"collapse-1 variant="primary">{{assign.name}}</b-button>
                        <br/>
                        <b-collapse :id="'collapse'+assign.id" class="mt-2">
                            <div v-for="problem in assign.math_problems">
                                <b-card>
                                    <p class="card-text"> {{problem.num1}} {{problem.operator}} {{problem.num2}}= </p>
                                    <b-input type="number"> </b-input>
                                </b-card>
                            </div>
                        </b-collapse>
                    </div>


























                    <!--                    <div v-if="showTeacher" id="Teacher side">-->
<!--                        <b-dropdown class="m-md-2" text="Choose an operation">-->
<!--                            <b-dropdown-item @click="setSign('+')">Addition</b-dropdown-item>-->
<!--                            <b-dropdown-item @click="setSign('-')">Subtraction</b-dropdown-item>-->
<!--                            <b-dropdown-item @click="setSign('*')">Multiplication</b-dropdown-item>-->
<!--                        </b-dropdown>-->
<!--                    </div>-->
<!--                    <div id="student side" v-else>-->
<!--                        <p> Solve the equation and press submit to check your answers</p>-->
<!--                        <p> {{num1}} {{sign}} {{num2}} =</p>-->
<!--                        <b-input v-model="result" type="number"></b-input>-->
<!--                        <br/>-->
<!--                        <b-button @click="correct = checkPair(num1,num2,sign)">Check answer</b-button>-->
<!--                        <div v-if="showResults">-->
<!--                            <p style="margin: 0; display: inline;">Your answer is</p>-->
<!--                            <p v-if="correct" style="margin: 0; display: inline;" align="right">correct</p>-->
<!--                            <p v-else style="margin: 0; display: inline;" align="right">incorrect</p>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!--                    GAME ENDS HERE-->
                </div>
            </vs-col>
        </vs-row>
    </div>
</template>

<script>
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";
import axios from "axios";

export default {
  name: "MathClass",
    components: {
        Header,
        NavBar,
        SideNav
    },
    data() {
        return {
            course_id: this.$route.params.classId,
            assignment: null,
            result: null,
            num1: Math.floor(Math.random()*100)+1,
            num2: Math.floor(Math.random()*100)+1,
            correct: false,
            showResults: false,
            showTeacher: true,
            sign: '',
            assignments: [],

        }
    },
    created(){
        let self = this;
        axios.get('/api/courses/'+ this.course_id).then(function (response) {
            self.assignments = response.data.data.assignments
        },);
    },
    methods:{
        checkPair(num1, num2, sign) {
            this.showResults = true;
            if (sign == '+') {
                return (Number(num1) + Number(num2)) == this.result;
            }
            if (sign == '-')
                return (Number(num1) - Number(num2)) == this.result;
            if (sign == '*')
                return (Number(num1) * Number(num2)) == this.result;
            else
                return false;
        },
        setSign(userInput) {
          this.sign=userInput;
          this.showTeacher = false;
        },
    },
};



</script>

<style scoped></style>
