<template>
  <div id="app">
   <Header/>
    <NavBar/>
    <SideNav/>
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import NavBar from "./components/NavBar.vue";
import SideNav from "./components/SideNav.vue";

export default {
  name: "App",
  components: {
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
  margin-top: 60px;
}
</style>
