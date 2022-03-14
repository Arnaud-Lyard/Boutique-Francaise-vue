<template>
        <section>
            <Sidebar />
            <div :style="{ 'margin-left': sidebarWidth }">
                <router-view />
            </div>
        </section>
</template>

<script>

import Sidebar from '@/components/Sidebar/Sidebar'
import { sidebarWidth } from '@/components/Sidebar/state'
export default {
  components: { Sidebar },
  setup() {
    return { sidebarWidth }
  }
}

</script>

<style>
* {
  margin: 0;
  padding: 0;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 30px;
}
#nav a {
  font-weight: bold;
  color: #2c3e50;
}
html {
  font-size: 62.5%; /* équivalence "10px" sur l'élément racine */
}
body {
  font-size: 1.4em; /* taille de base pour tous les éléments équivalent 14px */
}
</style>