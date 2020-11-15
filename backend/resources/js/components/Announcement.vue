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
            </vs-row>
    </div>
</template>

<style scoped>
  #side {
    width: 200px;
  }
</style>
<script>
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";

export default {
  name: "Announcement",
  components: {
    Header,
    NavBar,
    SideNav
  }
};
</script>