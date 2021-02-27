<template>
    <div id="profile">
        <Header />
        <NavBar />
        <br/>
        <vs-row>
            <vs-col w="1">
                <div id="side">
                    <SideNav/>
                </div>
            </vs-col>
            <vs-col w="1">
                <b-nav vertical class="w-25" align="left" justified>
                    <b-button active to="#">Assignments</b-button>
                    <br />
                    <b-button active to="/People">People</b-button>
                    <br />
                    <b-button active to="/Announcement/english">Announcements</b-button>
                    <br />
                    <b-button active to="PrivateMessages">Private Messages</b-button>
                </b-nav>
            </vs-col>
            <vs-col w="10">
                <div id="data">
                    <h1>Assignments</h1>
                    <vs-button active id="create" to="TeacherEnglishClass/CreateEnglishAssignment">
                        Create Assignment
                    </vs-button>
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
    name: "TeacherEnglishClass",
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
    align-content: center;
}
</style>
