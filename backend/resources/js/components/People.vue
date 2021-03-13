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
      <vs-col w="9">
        <div>
          <b-table striped hover :items="people" :fields="fields"></b-table>
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
  name: "People",
  components: {
    Header,
    NavBar,
    SideNav
  },

  data() {
    return {
        course_id: this.$route.params.classId,
      fields: [
        {
          key: "first_name",
          sortable: true
        },
        {
          key: "last_name",
          sortable: true
        },
        {
          key: "email",
          sortable: false
        }
      ],

      people: [],
    }
  },
    created() {
        let self = this;
        axios.get('/api/courses/'+ this.course_id +'/students').then(function (response) {
            self.people = response.data.data
        },);
    },
};

</script>

<style scoped>
</style>
