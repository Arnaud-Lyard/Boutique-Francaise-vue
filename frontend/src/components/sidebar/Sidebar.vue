<template>
  <div class="sidebar" :style="{ width: sidebarWidth }">

        <span
      class="collapse-icon"
      :class="{ 'rotate-180': collapsed }"
      @click="toggleSidebar"
    ><svg class="openmenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.427 3.021h-7.427v-3.021l-6 5.39 6 5.61v-3h7.427c3.071 0 5.561 2.356 5.561 5.427 0 3.071-2.489 5.573-5.561 5.573h-7.427v5h7.427c5.84 0 10.573-4.734 10.573-10.573s-4.733-10.406-10.573-10.406z"/></svg>
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
    <SidebarLink to="/image" icon="user">Images</SidebarLink>
    <SidebarLink to="/actualites" icon="user">Actualités</SidebarLink>
<i class="fas fa-home"></i>

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

<style scoped>
.sidebar {
  color: white;
  background-color: var(--sidebar-bg-color);
  float: left;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  bottom: 0;
  transition: 0.3s ease;
  display: flex;
  flex-direction: column;
}
.sidebar h1 {
  height: 2.5em;
  margin-top: 100px;
}
.collapse-icon {
  position: relative;
  top: 0;
  color: rgba(255, 255, 255, 0.7);
  transition: 0.2s linear;
  cursor: pointer;
}
.rotate-180 {
  transform: rotate(180deg);
  transition: 0.2s linear;
}
.openmenu{
  height: 30px;
  width: 30px;
  fill: white;
}
.openmenu:hover{
  fill: black;
}
.logo{
  width: 30px;
  height: 30px;
  border-radius: 5px;
}
.navlink{
  display: flex;
}
</style>