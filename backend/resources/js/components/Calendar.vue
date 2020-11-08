<template> 
    <div id="calendar">
        <Header />
        <NavBar />
        <br/>
        <vs-row vs-w="10" vs-type="flex">
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
                    <h1>Calendar</h1>
                    <br/>
                                             
                    <!-- <vue-google-calendar :data="calendarData"/> -->       
                    <kalendar :configuration="calendar_settings" :events.sync="events" />

                </div>
            </vs-col>
        </vs-row>
       </div>
</template>

<script>
import Header from "./Header.vue";
import NavBar from "./NavBar.vue";
import SideNav from "./SideNav.vue";
import { Kalendar } from 'kalendar-vue';
// import VueGoogleCalendar from "vue-google-calendar/src/vue-google-calendar"

export default {
    components: {
        Header,
        NavBar,
        SideNav,
	    Kalendar,
        // VueGoogleCalendar
    },

    data: () => ({
        calendar_settings: {
        style: 'material_design',
        view_type: 'week',
        cell_height: 20,
        scrollToNow: true,
        start_day: new Date().toISOString(),
        read_only: false,
        day_starts_at: 0,
        day_ends_at: 24,
        overlap: true,
        hide_dates: ['2019-10-31'], // Spooky
        hide_days: [6],
        past_event_creation: true
        },
        events: [
        {
            from: '2020-03-18T18:00:00Z',
            to: '2020-03-18T19:00:00Z',
            data: 'Event 1',
        },
        {
            from: '2020-03-18T19:00:00Z',
            to: '2020-03-18T21:00:00Z',
            data: 'Olive & Friends',
        },
        ],
    })

}
</script>


<style scoped>

</style>