<template>
  <div id="Dashboard">
    <Header />
    <NavBar />
    <br />
    <b-container fluid="">
      <b-row>
        <b-col sm="">
          <div id="side">
            <SideNav />
          </div>
        </b-col>
        <b-col lg="*">
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";

export default {
  name: "Dashboard",
  components: {
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
</style>
