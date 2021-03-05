<template>
  <div id="profile">
    <Header />
    <NavBar />
    <br/>
    <vs-row>
      <vs-col w="1">
        <div id="side">
          <SideNav />
        </div>
      </vs-col>
      <vs-col w="9">
        <div>
          <b-table striped hover :items="items" :fields="fields"></b-table>
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
      fields: [
        {
          key: "First Name",
          sortable: true
        },
        {
          key: "Last Name",
          sortable: true
        },
        {
          key: "Email",
          sortable: false
        }
      ],

      items: []
    }
  }
};

</script>

<style scoped>
</style>
