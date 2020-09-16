<template>
    <div style="margin-bottom:20px">
      <v-app-bar
        color="deep-purple accent-4"
        dense
        dark
      >
      <v-toolbar-title>Blog name</v-toolbar-title>
            <v-spacer></v-spacer>
            <!-- <v-autocomplete
              v-model="theme"
              :items="themes"
              label="themes"
              style="margin:20px"
            ></v-autocomplete> -->
        <v-btn icon
        href="/login" 
        style="margin-right:20px"
        >
        login</v-btn>
          
      </v-app-bar>
      
      
    </div>
</template>

<script>
export default {
     name: 'toolbar',
         data () {
    return {
      searching: false,
      theme: null,
      }
    },
    props:['themes'],

    methods: {
    submit() {
      this.$inertia.get(this.route('list',this.theme))
    }
    }
}
</script>