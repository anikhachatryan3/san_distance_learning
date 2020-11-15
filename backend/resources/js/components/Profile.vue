<template>
    <div id="profile">
        <Header />
        <NavBar />
        <br/>
        <vs-row>
            <vs-col w="2">
                <div id="side">
                    <SideNav />
                </div>
            </vs-col>
            <vs-col w="9">
                <div id="data">
                    <h1>User Profile</h1>
                    <br/>
                    <h5>Name:</h5>
                    <br/>
                    <h5>Phone Number:</h5>
                    <br/>
                    <h5>Email:</h5>
                    <br/>
                    <h5>Address:</h5>
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
  name: "Profile",
  components: {
    Header,
    NavBar,
    SideNav
  }
};
</script>

<style>
.left{
        margin-left: auto;
    }
</style>
