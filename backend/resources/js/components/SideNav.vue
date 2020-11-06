<template>
  <div class="hidden">
      <vs-sidebar
          background="success"
          text-white
        relative
        v-model="active"
        open
        >

        <vs-sidebar-item id="Dashboard" to="/Student">
<!--          <template #icon>-->
<!--            <i class='bx bx-home'></i>-->
<!--          </template>-->
          Dashboard
        </vs-sidebar-item>


        <vs-sidebar-item id="Grades">
<!--          <template #icon>-->
<!--            <i class='bx bx-grid-alt'></i>-->
<!--          </template>-->
          Grades
        </vs-sidebar-item>


        <vs-sidebar-item id="Calendar" to="/Calendar">
<!--          <template #icon>-->
<!--            <i class='bx bxs-music'></i>-->
<!--          </template>-->
          Calendar
        </vs-sidebar-item>


<!--        <vs-sidebar-item id="donate">-->
<!--          <template #icon>-->
<!--            <i class='bx bxs-donate-heart' ></i>-->
<!--          </template>-->
<!--          Donate-->
<!--        </vs-sidebar-item>-->


<!--        <vs-sidebar-item id="drink">-->
<!--          <template #icon>-->
<!--            <i class='bx bx-drink'></i>-->
<!--          </template>-->
<!--          Drink-->
<!--        </vs-sidebar-item>-->


<!--        <template #footer>-->
<!--          <vs-row justify="space-between">-->
<!--            <vs-avatar>-->
<!--              <img src="/avatars/avatar-5.png" alt="">-->
<!--            </vs-avatar>-->

<!--            <vs-avatar badge-color="danger" badge-position="top-right">-->
<!--              <i class='bx bx-bell' ></i>-->

<!--              <template #badge>-->
<!--                28-->
<!--              </template>-->
<!--            </vs-avatar>-->
<!--          </vs-row>-->
<!--        </template>-->
      </vs-sidebar>
    </div>
</template>

<style>
</style>
 <script>
    export default {
      name:"SideNav",
      data:() => ({
        active: 'home',
      })
    }
  </script>
