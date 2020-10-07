<template>
  <div id="app">
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
          <div id="classCard">
            <ClassCard />
          </div>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import NavBar from "./components/NavBar.vue";
import SideNav from "./components/SideNav.vue";
import ClassCard from "./components/ClassCard.vue";

export default {
  name: "app",
  components: {
    ClassCard,
    Header,
    NavBar,
    SideNav
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 10px;
}
#side {
  border-width: 1px;
  border-color: black;
  text-align: left;
}
#classCard {
  align-content: center;
}
</style>
