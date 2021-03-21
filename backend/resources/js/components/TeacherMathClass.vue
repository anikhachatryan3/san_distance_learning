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
                        <b-button v-b-toggle.collapse-1 variant="primary">{{assign.name}}</b-button>
                        <b-collapse id="collapse-1" class="mt-2">
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
                    <div id="add assignment" class="col-md-3 col-md-offset-2" v-if="showCreate">
                        <h5>Assignment info:</h5>
                        <p>Assignment name:</p>
                        <b-input v-model="this.assignment.name" type="text"></b-input>
                        <p>Number of exercises:</p>
                        <b-input v-model="this.assignment.num_problems" type="number"></b-input>
                        <b-radio v-model="this.assignment.operator" name="operator" value="+">Addition</b-radio>
                        <b-radio v-model="this.assignment.operator" name="operator" value="-">Subtraction</b-radio>
                        <b-radio v-model="this.assignment.operator" name="operator" value="*">Multiplication</b-radio>
                        <p>Min value:</p>
                        <b-input v-model="this.assignment.range_min" type="number"></b-input>
                        <p>Max value:</p>
                        <b-input v-model="this.assignment.range_max" type="number"></b-input>
                        <vs-button active id="post assignment" @click="this.postAssign">Add assignment</vs-button>
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
                name: null,
                range_min: null,
                operator: null,
                range_max: null,
                num_problems: null,
            },

            assignments: []
        }
    },
    created() {
        let self = this;
        axios.get('/api/courses/'+ this.course_id).then(function (response) {
            self.assignments = response.data.data.assignments
        },);
    },
    methods:{
        postAssign(){
            this.showCreate = false;
        //    MAKE POST OP
            this.assignment.name=null;
            this.assignment.numberOfEX=null;
            this.assignment.op=null;
            this.assignment.min=null;
            this.assignment.max=null;
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
