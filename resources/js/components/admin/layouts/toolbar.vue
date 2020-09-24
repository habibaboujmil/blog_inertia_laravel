<template>
    <div style="margin-bottom:20px">
      <v-app-bar
        color="deep-purple accent-4"
        dense
        dark
      >
  
        <v-toolbar-title>Blog name</v-toolbar-title>
  
        <v-spacer></v-spacer>
        <v-menu
          left
          bottom
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              icon
              v-bind="attrs"
              v-on="on"
            >
              <v-icon>home</v-icon>
            </v-btn>
          </template>
  
          <v-card style="margin-top:33px">
          <v-list>
            <v-list-item>
              <v-list-item-avatar>
                <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
              </v-list-item-avatar>
  
              <v-list-item-content>
                <v-list-item-title>John Leider</v-list-item-title>
                <v-list-item-subtitle>Founder of Vuetify.js</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-list>
  
          <v-divider></v-divider>
  
          <v-list>
            <v-list-item>
              <v-list-item-title>Profile</v-list-item-title>
            </v-list-item>
  
            <v-list-item>
              <InertiaLink :href="route('logout')" method ="post">
                Log out
              </InertiaLink>
            </v-list-item>
          </v-list>
        </v-card>
        </v-menu>
      </v-app-bar>
      
      
    </div>
</template>

<script>
export default {
     name: 'toolbar',

      methods: {
    submit() {
      this.$inertia.post(this.route('logout'))
    }
    }
}
</script>