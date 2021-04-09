<template>
    <div id="teacherEnglishClass">
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
                    <b-button active>Private Messages</b-button>
                </b-nav>
            </vs-col>
            <vs-col w="10">
                <div id="data">
                    <h1>Assignments</h1>
                    <div id="assignments" v-for="assign in assignments">
                        <b-button v-b-toggle="'collapse'+assign.id" collapse-1 variant="primary">{{assign.name}}</b-button>
                        <br/>
                        <b-collapse :id="'collapse'+assign.id" class="mt-2">
                            <b-card>
                                <div v-for="problem in assign.english_problems">
                                    <p class="card-text"> {{problem.word}} </p>
                                </div>
                            </b-card>
                        </b-collapse>
                    </div>
                    <vs-button active id="create" @click="show">
                        Add Assignment
                    </vs-button>
                    <br/>
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
                                <th><b-select v-model="assignment.wordscramble" :options="scramble_options" required></b-select></th>
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
            pop: false,
            course_id: this.$route.params.classId,
            assignment:{
                name:"",
                num_problems: "",
                wordscramble: "",
            },
        assignments: [],
        }
    },
    created(){
        let self = this;
        axios.get('/api/courses/'+ this.course_id).then(function (response) {
            self.assignments = response.data.data.assignments
        },);
    }
};
</script>

<style scoped>
#data {
    text-align: center;
    align-content: center;
}
</style>
