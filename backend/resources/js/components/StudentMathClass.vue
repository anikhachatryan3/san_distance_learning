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
                    <b-button>Assignments</b-button>
                    <br />
                    <b-button active :to="'/people/' + $route.params.classId">People</b-button>
                    <br />
                    <b-button active to="/Announcement/math">Announcements</b-button>
                    <br />
                    <b-button active >Private Messages</b-button>
                </b-nav>
            </vs-col>
            <vs-col w="9">
                <div id="data">
                   <!-- GAME STARTS HERE-->
                    <h1>Assignments</h1>
                    <br />
<!--                    <vs-button @click="doThis">DOOO</vs-button>-->
                    <div id="assignments" v-for="(assign, j) in assignments">
                        <b-button v-b-toggle="'collapse'+assign.id"collapse-1 variant="primary">{{assign.name}}</b-button>
                        <br/>
                        <b-collapse :id="'collapse'+assign.id" class="mt-2">
                            <div v-for="(problem, index) in assign.math_problems">
                                <b-card>
                                    <table>
                                        <tr>
                                            <th><p class="card-text"> {{problem.num1}} {{problem.operator}} {{problem.num2}} = </p></th>
                                            <th><b-input type="number" v-model="submissions[j].answers[index].answer"> </b-input></th>
                                        </tr>
                                    </table>
                                </b-card>
                            </div>
                            <vs-button @click="submitAssign(j,assign.id)">Submit Assignment</vs-button>
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

            submissions: [],

            getter: {
                user_id: this.$session.get('user').id,
                completed: "0",
                is_published: "1"
            }

        }
    },
    async created(){
        let self = this;
        console.log(self.getter);
        await axios.get('/api/courses/'+ this.course_id +'/assignments', { params: self.getter }).then(function (response) {
            self.assignments = response.data.data;
            let i=0;
            let dummySub={};
            dummySub.answers = [];
            let dummyAns={};
            dummyAns.answer='';
            self.assignments.forEach(function(assign){
                self.submissions.push(dummySub);
                assign.math_problems.forEach(function (prob){
                    dummyAns.math_problem_id = prob.id;
                    self.submissions[i].answers.push(dummyAns)
                    dummyAns={};
                    dummyAns.answer='';
                })
                dummySub={};
                dummySub.answers = [];
                i++;
            });
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
            self.submissions.forEach(sub=>{
                console.log(sub);
            })
        },

        submitAssign(assignIndex,assignID)
        {
            let self = this;
            let submitItem = self.submissions[assignIndex];
            axios.post('/api/assignments/' + assignID + '/submit-math/' + this.$session.get('user').id, submitItem);
        }
    },
};



</script>

<style scoped></style>
