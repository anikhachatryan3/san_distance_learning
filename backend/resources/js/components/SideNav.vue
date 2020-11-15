<template>
  <div class="hidden">
      <vs-sidebar
          background="success"
          text-white
        relative
        v-model="active"
        open
        >
        <vs-sidebar-item v-if="dashboard=='Teacher'" to="Teacher_Dashboard">
          Dashboard
        </vs-sidebar-item>
          <vs-sidebar-item v-if="dashboard=='Student'" to="StudentDashboard">
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
 // console.log(this.$session.get('user').role_name);

    export default {
      name:"SideNav",
      data:() => ({
        active: 'home',
        dashboard: '',
      }),
      created() {
        this.dashboard = this.$session.get('user').role_name;
      }
    }
  </script>
