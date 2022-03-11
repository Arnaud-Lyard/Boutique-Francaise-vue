<template>
  <div class="sidebar" :style="{ width: sidebarWidth }">

        <span
      class="collapse-icon"
      :class="{ 'rotate-180': collapsed }"
      @click="toggleSidebar"
    ><font-awesome-icon :icon="['fas', 'bars']" />
    </span>

    <h1>
      <span v-if="collapsed">
        <img class="logo" src="../../assets/logo.png" alt="">
      </span>
      <span v-else>Boutique Française</span>
    </h1>
    <SidebarLink to="/home" icon="house">Accueil</SidebarLink>
    <SidebarLink to="/contact" icon="user">Contact</SidebarLink>
    <SidebarLink to="/dashboard" icon="user">Dashboard</SidebarLink>
    <SidebarLink to="/analytics" icon="user">Analytics</SidebarLink>
    <SidebarLink to="/friends" icon="user">Friends</SidebarLink>
    <SidebarLink to="/boutique" icon="shop">Boutique</SidebarLink>
    <SidebarLink to="/actualites" icon="book-open">Actualités</SidebarLink>

  </div>
</template>


<script>
import SidebarLink from './SidebarLink'
import { collapsed, toggleSidebar, sidebarWidth } from './state'
export default {
  props: {},
  components: { SidebarLink },
  watch: {
    $route: {
      immediate: true,
      handler(to) {
        document.title = to.meta.title || "Some Default Title";
      },
    },
  },
  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },
    showAdminBoard() {
      if (this.currentUser && this.currentUser['roles']) {
        return this.currentUser['roles'].includes('ROLE_ADMIN');
      }
      return false;
    },
    showModeratorBoard() {
      if (this.currentUser && this.currentUser['roles']) {
        return this.currentUser['roles'].includes('ROLE_MODERATOR');
      }
      return false;
    }
  },
  methods: {
    logOut() {
      this.$store.dispatch('auth/logout');
      this.$router.push('/login');
    }
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth }
  }
}
</script>



<style>
:root {
  --sidebar-bg-color: #2f44a5;
  --sidebar-item-hover: #3850a1;
  --sidebar-item-active: #182d86;
}
</style>

<style scoped src="./Sidebar.css">


</style>