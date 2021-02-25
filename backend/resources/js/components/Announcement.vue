<template>
    <div id="profile">
        <Header />
        <NavBar />
        <br/>
        <b-container fluid="">
            <b-row>
                <!-- <b-col sm=""> -->
                <div id="side">
                    <SideNav />
                </div>
                <!-- </b-col> -->
                <b-col lg="*">
                    <form id="demo">
                        <h1>Create an Announcement:</h1>
                        <br />
                        <br />
                        <h2>Subject(s):</h2>
                        <!-- select multiple-->
                        <p>
                            <select v-model="selected" multiple>
                                <option>Math</option>
                                <option>English</option>
                                <option>Science</option>
                                <option>Geography</option>
                          </select>
                        </p>
                        <br />
                        <h2>Message: </h2>
                        <!-- text box -->
                        <p>
                            <div class="textbox">
                                <input v-model="message" placeholder="">
                            </div>
                        </p>
                        <button>Submit</button>
                    </form>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<style scoped>
  #side {
    width: 200px;
  }
  .textbox {
    width: 500px;
    height: 200px;
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