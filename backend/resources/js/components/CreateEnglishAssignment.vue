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
                    <b-button active to="/Announcement">Announcements</b-button>
                    <br />
                    <b-button active to="PrivateMessages">Private Messages</b-button>
                </b-nav>
            </vs-col>
            <vs-col w="10">
                <div id="data">
                    <h1>Create Assignment</h1>
                    <vs-button id="create" @click="assignEnglish()">
                        Create Default Assignment
                    </vs-button>

                </div>
            </vs-col>
        </vs-row>
    </div>
</template>

<script>
import axios from 'axios';
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";

export default {
name: "CreateEnglishAssignment",
    components: {
        Header,
        NavBar,
        SideNav
    },
    methods: {
        assignEnglish() {
            let self = this;
            axios.put('/api/assignments/1')
            .then(function(response) {
                alert('assignment published');
                self.$session.set('published', true);
            })
            .catch(function(error) {
                alert('error publishing assignment');
            });
        }
    }
}
</script>

<style scoped>

</style>
