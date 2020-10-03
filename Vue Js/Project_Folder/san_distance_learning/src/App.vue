<template>
  <div id="app">
   <Header/>
    <NavBar/>
    <br/>
  <div id="Side">
    <SideNav/>
  </div>
    <ClassCard/>
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import NavBar from "./components/NavBar.vue";
import SideNav from "./components/SideNav.vue";
import ClassCard from "@/components/ClassCard";

export default {
  name: "App",
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
#Side {
  text-align: left;
}
</style>
