<template>
    <div id="profile">
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
<!--                    SHOW ASSIGNMENTS HERE-->
                    <vs-button active id="create" @click="show">
                        Add Assignment
                    </vs-button>
                    <div id="add assignment" class="col-md-3 col-md-offset-2" v-if="showCreate">
                        <h5>Assignment info:</h5>
                        <p>Assignment name:</p>
                        <b-input v-model="this.assignment.name" type="text"></b-input>
                        <p>Number of exercises:</p>
                        <b-input v-model="this.assignment.numberOfEX" type="number"></b-input>
<!--                        <b-dropdown class="m-md-2" text="Choose an operation">-->
<!--                            <b-dropdown-item @click="setSign('+')">Addition</b-dropdown-item>-->
<!--                            <b-dropdown-item @click="setSign('-')">Subtraction</b-dropdown-item>-->
<!--                            <b-dropdown-item @click="setSign('*')">Multiplication</b-dropdown-item>-->
<!--                        </b-dropdown>-->
                        <b-radio v-model="this.assignment.op" name="operator" value="+">Addition</b-radio>
                        <b-radio v-model="this.assignment.op" name="operator" value="-">Subtraction</b-radio>
                        <b-radio v-model="this.assignment.op" name="operator" value="*">Multiplication</b-radio>
                        <p>Min value:</p>
                        <b-input v-model="this.assignment.min" type="number"></b-input>
                        <p>Max value:</p>
                        <b-input v-model="this.assignment.max" type="number"></b-input>
                        <vs-button active id="post assignment" @click="this.postAssign"></vs-button>
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
            assignment:{
                name: null,
                numberOfEX: null,
                op: null,
                min: null,
                max: null,
            }

        }
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
