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
            <vs-col w="1"></vs-col>
            <vs-col w="9">
                <div id="data" class="leftPadding">
                    <h1>Calendar</h1>
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
            from: '2020-11-30T09:00:00Z',
            to: '2020-11-30T11:00:00Z',
            data: 'English Class',
        }, // eng class mon
        {
            from: '2020-12-02T09:00:00Z',
            to: '2020-12-02T11:00:00Z',
            data: 'English Class',
        }, // eng class wed
        {
            from: '2020-12-01T10:00:00Z',
            to: '2020-12-01T13:00:00Z',
            data: 'Math Class',
        }, // math class tues
        {
            from: '2020-12-03T09:00:00Z',
            to: '2020-12-03T15:00:00Z',
            data: 'Study',
        } // study
        ],
    })

}
</script>


<style scoped>
    .leftPadding {
        padding-left: 2%;
    }
</style>
