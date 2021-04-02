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
                    <vs-button @click="doThis">DOOO</vs-button>
                    <div id="assignments" v-for="(assign, j) in assignments">
                        <b-button v-b-toggle="'collapse'+assign.id"collapse-1 variant="primary">{{assign.name}}</b-button>
                        <br/>
                        <b-collapse :id="'collapse'+assign.id" class="mt-2">
                            <div v-for="(problem, index) in assign.math_problems">
                                <b-card>
                                    <p class="card-text"> {{problem.num1}} {{problem.operator}} {{problem.num2}}= </p>
                                    <b-input type="number" v-model="submission[assign.id].answers[index].answer"> </b-input>
                                </b-card>
                            </div>
                        </b-collapse>
                    </div>
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
import {Answer} from "./TS/interfaces.ts"
import {Submission} from "./TS/interfaces.ts"


// interface Submission {
//     user_id: number;
//     answers: Answer[]
// }
// interface Answer {
//     answer: number;
//     math_problem_id: number;
// }

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


            submission: Array(Submission),

        }
    },
    async created(){
        let self = this;
        await axios.get('/api/courses/'+ this.course_id).then(function (response) {
            self.assignments = response.data.data.assignments
            self.assignments.forEach(function (assignment) {
                let answers = [];
                assignment.math_problems.forEach(function (mathProblem) {
                    let ans = new Answer;
                    ans.math_problem_id = mathProblem.id;
                    ans.answer = "";
                    answers.push(ans);
                })
                let sub = new Submission;
                sub.user_id = self.$session.get('user').id;
                sub.answers = answers;
                self.submission.push(sub);
            })
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

        doThis(){
            let self = this;
            console.log(self.submission);
        }
    },
};



</script>

<style scoped></style>
