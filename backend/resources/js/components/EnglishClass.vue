<template>
    <div id="EnglishClass">
        <Header />
        <NavBar />
        <br/>
        <vs-row>
            <vs-col w="5">
                <div id="side">
                    <SideNav />
                </div>
            </vs-col>
            <vs-col w="7">
                <div id="data">
                    <h1>English Class Data</h1>
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
  name: "EnglishClass",
  components: {
    Header,
    NavBar,
    SideNav
  }
};
</script>

<style scoped>
#data {
  text-align: center;
}
</style>
