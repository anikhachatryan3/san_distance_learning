<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand>School_Name</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
<!--          <b-nav-item href="#">Link</b-nav-item>-->
<!--          <b-nav-item href="#" disabled>Disabled</b-nav-item>-->
          <b-nav-item-dropdown text="Classes" left>
            <b-dropdown-item href="#">English</b-dropdown-item>
            <b-dropdown-item href="#">Math</b-dropdown-item>
            <b-dropdown-item href="#">Geography</b-dropdown-item>
            <b-dropdown-item href="#">Science</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
<!--          <b-nav-form>-->
<!--            <b-form-input size="sm" class="mr-sm-2" placehol0der="Search"></b-form-input>-->
<!--            <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>-->
<!--          </b-nav-form>-->

          <b-nav-item-dropdown right>
            <!-- Using 'button-content' slot -->
            <template v-slot:button-content>
              <em>User</em>
            </template>
            <b-dropdown-item href="#">Profile</b-dropdown-item>
            <b-dropdown-item href="#">Sign Out</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>
