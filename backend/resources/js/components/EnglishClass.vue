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
            <vs-col w="1">
                    <b-nav vertical class="w-25" align="left" justified>
                        <b-button active>Assignments</b-button>
                        <br />
                        <b-button active>People</b-button>
                        <br />
                        <b-button active>Announcements</b-button>
                        <br />
                        <b-button active>Private Messages</b-button>
                    </b-nav>
            </vs-col>
            <vs-col w="10">
                <div id="data">
                    <h1>Assignments</h1>
                    <h5>No assignments due</h5>
                    <iframe src="https://i.simmer.io/@natkes/wordsearch" style="width:960px;height:600px"></iframe>
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
