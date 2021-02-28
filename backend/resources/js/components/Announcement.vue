<template>
    <div>
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
                        <b-button active to="/Announcement/english">Announcements</b-button>
                        <br />
                        <b-button active to="PrivateMessages">Private Messages</b-button>
                    </b-nav>
                </vs-col>
                <vs-col w="9">
                    <h1>Announcements</h1>
<!--                    actual announcements here-->
                    <div v-for="item in announcements">
                        <div v-if="$route.params.classId==item.course_id">
                            <h5>Subject:</h5>
                            <p>{{item.title}}</p>
                            <h5>Announcement:</h5>
                            <p>{{item.announcement}}</p>
                            <br/>
                            <hr/>
                            <br/>
                        </div>
                    </div>
                    <b-button v-if="userRole=='Teacher'" @click="create=true">Create an Announcement</b-button>
                    <b-form id="demo" v-if="create">
                        <b-form-group id="input-group-1" label="Subject:" label-for="input-1">
                            <b-form-input
                                id="input-1"
                                v-model="form.title"
                                placeholder="Enter subject"
                                required
                            ></b-form-input>
                        </b-form-group>
                        <b-form-group id="input-group-2" label="Announcement:" label-for="input-2">
                             <b-form-input
                                 id="input-1"
                                 v-model="form.announcement"
                                 placeholder="Enter body of announcement"
                                 required
                             ></b-form-input>
                        </b-form-group>
                        <b-button @click="submit()" variant="primary">Submit</b-button>
                    </b-form>
                </vs-col>
            </vs-row>
    </div>
</template>

<style scoped>
  #side {
    width: 200px;
  }
  .textbox {
    width: 500px;
    height: 200px;
  }
</style>
<script>
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";
import axios from 'axios';

export default {
  name: "Announcement",
  components: {
    Header,
    NavBar,
    SideNav
  },
    data(){
      return {
          userRole: this.$session.get('user').role_name,
          create: false,
          form: {
              title: "",
              announcement: "",
              course_id: this.$route.params.classId,
              // user_id: this.$session.get('user').id,
              user_id: this.$session.get('user').id,
          },
          announcements: [],
      }
    },
    created(){
     let m = this;
        axios.get('/api/announcements')
            .then(function(response) {
                m.announcements = response.data.data;
            });
    },
    methods:{
        submit(){
            this.form.course_id = this.$route.params.classId;
            this.form.user_id = this.$session.get('user').id;
            axios.post('/api/announcements',this.form);
            let m = this;
            axios.get('/api/announcements')
                .then(function(response) {
                    m.announcements = response.data.data;
                });
            this.create=false;
        }
    },
};
</script>
