<template>
    <div id=Teacher_Dash>
        <Header />
        <NavBar />
        <br />
        <b-container fluid="">
            <b-row>
                <b-col sm="">
                    <div id="side">
                        <SideNav />
                    </div>
                </b-col>
                <b-col lg="*">
                    <div id="classCard">
                        <TeacherClassCard />
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>

import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";
import TeacherClassCard from "./TeacherClassCard";
export default {
name: "Teacher_Dashboard",
        components: {
            TeacherClassCard,
            Header,
            NavBar,
            SideNav
        }
    };
</script>
}

<style scoped>

</style>
