<template>
    <div id="profile">
        <Header />
        <NavBar />
        <br/>
        <vs-row>
            <vs-col w="1">
                <div id="side">
                    <SideNav dashboard="StudentDashboard"/>
                </div>
            </vs-col>
            <vs-col w="1">
                    <b-nav vertical class="w-25" align="left" justified>
                        <b-button active to="#">Assignments</b-button>
                        <br />
                        <b-button active to="/People">People</b-button>
                        <br />
                        <b-button active to="/Announcement">Announcements</b-button>
                        <br />
                        <b-button active to="PrivateMessages">Private Messages</b-button>
                    </b-nav>
            </vs-col>
            <vs-col w="9" v-if="assignment">
                <div id="data">
                    <h1>Assignments</h1>
                    <br />
                    <iframe src="https://i.simmer.io/@natkes/wordsearch" style="width:960px;height:600px"></iframe>
                    <br/>
                    <vs-button id="submit" @click="assignEnglish()">
                        Submit Assignment
                    </vs-button>
                </div>
            </vs-col>
            <vs-col w="9" v-else>
                <div id="NoAssign">
                    <h1>Assignments</h1>
                    <h2>No assignments due!</h2>
                </div>
            </vs-col>
        </vs-row>
    </div>
</template>

<script>
import axios from 'axios';
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";

export default {
  name: "StudentEnglishClass",
  components: {
    Header,
    NavBar,
    SideNav
  },
  data() {
    return {
      assignment: null
    }
  },
  created() {
    let self = this;
    axios.get('/api/assignments/1').then(function(response) {
        self.assignment = response.data.data
    },);
  },
    methods:{
        assignEnglish() {
            let self = this;
            axios.put('/api/assignments/1')
                .then(function(response) {
                    alert('assignment submitted');
                    self.$session.set('published', false);
                })
                .catch(function(error) {
                    alert('error submitting assignment');
                });
            this.assignment=false;
        }
    }

};
</script>

<style scoped>
#data {
  text-align: center;
}
</style>
