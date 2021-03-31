<template>
    <div id="teacherMathClass">
        <Header />
        <NavBar />
        <br/>
        <vs-row>
            <vs-col w="1">
                <div id="side">
                    <SideNav/>
                </div>
            </vs-col>
            <vs-col w="1">
                <b-nav vertical class="w-25" align="left" justified>
                    <b-button active to="#">Assignments</b-button>
                    <br />
                    <b-button active :to="'/people/' + $route.params.classId">People</b-button>
                    <br />
                    <b-button active :to="'/Announcement/' + $route.params.classId">Announcements</b-button>
                    <br />
                    <b-button active to="PrivateMessages">Private Messages</b-button>
                </b-nav>
            </vs-col>
            <vs-col w="10">
                <div id="data">
                    <h1>Assignments</h1>
                    <div id="assignments" v-for="assign in assignments">
                        <b-button v-b-toggle="'collapse'+assign.id"collapse-1 variant="primary">{{assign.name}}</b-button>
                        <br/>
                        <b-collapse :id="'collapse'+assign.id" class="mt-2">
                            <b-card>
                                <div v-for="problem in assign.math_problems">
                                    <p class="card-text"> {{problem.num1}} {{problem.operator}} {{problem.num2}}= </p>
                                </div>
                            </b-card>
                        </b-collapse>
                    </div>
                    <vs-button active id="create" @click="show">
                        Add Assignment
                    </vs-button>
                    <br />
                    <div id="add assignment" class="col-md-3 col-md-offset-2" v-if="showCreate">
                        <h5>Create an assignment:</h5>
                        <table>
                            <tr>
                                <th><p>Assignment name: </p></th>
                                <th><b-input required v-model="assignment.name" type="text"></b-input></th>
                            </tr>
                            <tr>
                                <th><p>Number of exercises:</p></th>
                                <th><b-input required v-model="assignment.num_problems" type="number"></b-input></th>
                            </tr>
                            <tr>
                                <th><p>Assignment Type:</p></th>
                                <th><b-select v-model="assignment.operator" :options="operator_options" required></b-select></th>
                            </tr>
                            <tr>
                                <th><p>Min value:</p></th>
                                <th><b-input required v-model="assignment.range_min" type="number"></b-input></th>
                            </tr>
                            <tr>
                                <th><p>Max value:</p></th>
                                <th><b-input required v-model="assignment.range_max" type="number"></b-input></th>
                            </tr>
                        </table>
                        <vs-button active id="post assignment" @click="postAssign">Add assignment</vs-button>
                    </div>

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
    name: "TeacherEnglishClass",
    components: {
        Header,
        NavBar,
        SideNav
    },
    data(){
        return {
            showCreate: false,
            course_id: this.$route.params.classId,
            assignment:{
                name: "",
                range_min: "",
                operator: "",
                range_max: "",
                num_problems: "",
            },
            operator_options: [{ text: 'Choose...', value: null }, { text: 'Addition', value: '+' }, { text: 'Subtraction', value: '-' }, { text: 'Multiplication', value: '*' }],

            assignments: [],
            submissions: [],
        }
    },
    created() {
        let self = this;
        axios.get('/api/courses/'+ this.course_id).then(function (response) {
            self.assignments = response.data.data.assignments
        },);
        axios.get('/api/assignments/1/submissions').then(function (response) {
            self.submissions = response.data.data.assignments
        },);
    },
    methods:{
        onSubmit(){
            this.showCreate = false;
            this.postAssign().then(done=> console.log(done));
            this.assignment.name="";
            this.assignment.range_min="";
            this.assignment.operator="";
            this.assignment.range_max="";
            this.assignment.num_problems="";
        },
        async postAssign(){
            let timer = 0;
            let done = false;
            this.showCreate = false;
            await axios.post('/api/courses/' + this.course_id + '/math-assignment',this.assignment).then(function (response){
                done=true;
            });
            while(!done)
            {
                timer++;
            }
            console.log(timer);
            let self = this;
            axios.get('/api/courses/'+ this.course_id).then(function (response) {
                self.assignments = response.data.data.assignments
            },);
            this.assignment.name="";
            this.assignment.range_min="";
            this.assignment.operator="";
            this.assignment.range_max="";
            this.assignment.num_problems="";
        },
        onReset(){
            this.showCreate = false;
            this.assignment.name="";
            this.assignment.range_min="";
            this.assignment.operator="";
            this.assignment.range_max="";
            this.assignment.num_problems="";
        },
        show(){
            this.showCreate=true;
        },
        setSign(sign)
        {
          this.assignment.op=sign;
        }
    }

};
</script>

<style scoped>
#data {
    text-align: center;
    align-content: center;
}
</style>
