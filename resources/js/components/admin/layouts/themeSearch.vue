<template>
  <v-row>
    <v-text-field label="Search with Title"
        v-model= "title"
        name="title"
        type="text" >
      </v-text-field>
      <v-spacer></v-spacer>
      <v-btn
          text
          color="deep-purple accent-4"
          @click="submit"
          >
          Search
      </v-btn>
 </v-row>   
                
</template>

<script>
export default {
    name: 'filtre',
    data () {
    return {
      title:null,
      }
    },
     methods: {
        
        search(){
            this.$inertia.visit(this.route('list', this.form))
        }
        }
}
 
</script>