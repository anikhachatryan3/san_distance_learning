<template>
  <div id="StudentDashboard">
    <Header />
    <NavBar />
    <br />
    <b-container fluid="">
      <b-row>
        <b-col sm="">
          <div id="side">
            <SideNav dashboard="StudentDashboard"/>
          </div>
        </b-col>
        <b-col lg="*">
          <div id="classCard">
            <ClassCard />
          </div>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";
import ClassCard from "./ClassCard.vue";

export default {
  name: "StudentDashboard",
  components: {
    ClassCard,
    Header,
    NavBar,
    SideNav
  }
};
</script>

<style scoped>
#side {
  border-width: 1px;
  border-color: black;
  text-align: left;
}
#classCard {
  align-content: center;
}
</style>
