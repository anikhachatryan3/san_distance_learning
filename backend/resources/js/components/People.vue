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
          key: "name",
          sortable: true
        },
        { 
          key: "grade",
          sortable: true
        }, 
        {
          key: "comment",
          sortable: false
        }  
      ],
      
      items: [
        { name: 'Neli', grade: 'F', comment: 'fhdjkfs big dumb' },
        { name: 'Natkes', grade: 'A', comment: 'needs a wheelchair for carrying our entire project on his back' },
        { name: 'Ani', grade: 'A', comment: 'same as nati' },
        { name: 'Sally', grade: 'A', comment: 'a literal angel' },
        { name: 'Samoel', grade: 'A', comment: 'we literally dont deserve you' }
      ]
    }
  }
};

</script>

<style scoped>
</style>