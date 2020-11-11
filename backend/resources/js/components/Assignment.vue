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
<script>
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";

export default {
  name: "Assignment",
  components: {
    Header,
    NavBar,
    SideNav
  }
};
</script>