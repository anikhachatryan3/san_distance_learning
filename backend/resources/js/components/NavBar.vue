<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand>School_Name</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown right>
            <template v-slot:button-content>
              <em>{{ user }}</em>
            </template>
            <b-dropdown-item href="/Profile">Profile</b-dropdown-item>
            <b-dropdown-item href="#" @click="logout()">Sign Out</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>

export default {
  name: "NavBar",
  computed: {
    user() {
      let u = this.$session.get('user');
      return u.first_name + ' ' + u.last_name;
    }
  },
  methods: {
    logout() {
      this.$session.destroy();
      this.$router.push('/');
    }
  }
};
</script>
