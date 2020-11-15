<template>
  <div class="hidden">
      <vs-sidebar
          background="success"
          text-white
        relative
        v-model="active"
        open
        >
        <vs-sidebar-item id="Dashboard" v-bind:to="dashboard">
          Dashboard
        </vs-sidebar-item>
        <vs-sidebar-item id="Grades">
          Grades
        </vs-sidebar-item>
        <vs-sidebar-item id="Calendar" to="/Calendar">
          Calendar
        </vs-sidebar-item>
      </vs-sidebar>
    </div>
</template>

<style></style>
 <script>
    export default {
      name:"SideNav",
      data:() => ({
        active: 'home',
          dashboard: "",
      })
    }
  </script>
