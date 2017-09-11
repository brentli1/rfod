<template>
  <v-app id="example-1" toolbar footer dark>
    <v-navigation-drawer
      persistent
      v-model="drawer"
      light
      enable-resize-watcher
      absolute
      dark
    >
      <v-list dense>
        <v-list-tile v-for="item in navItems" :key="item.text" @click="">
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>
              {{ item.text }}
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar dark fixed>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>RFOD Admin</v-toolbar-title>
    </v-toolbar>
    <main>
      <v-container fluid>
        <!--v-router-->
      </v-container>
    </main>
    <v-footer dark>
      <span class="white--text">© 2017</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    data () {
      return {
        drawer: true,
        navItems: [
            { icon: 'home', text: 'Dashbaord' },
            { icon: 'class', text: 'Tags' },
            { icon: 'movie', text: 'Movies' },
            { icon: 'rate_review', text: 'Reviews' }
        ]
      }
    }
  }
</script>

