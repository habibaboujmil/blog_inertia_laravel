<template>
    <v-row justify="center">
        <v-col cols="8">
            <v-container class="max-width">
            <v-pagination
                v-model="page"
                class="my-4"
                :length=articles.last_page
                @click= "paginate"
            ></v-pagination>
            </v-container>
        </v-col>
    </v-row>
</template>
<script>
export default {
    data () {
    return {
      
          page:1
        
    }},
    props:['articles'],

    methods(){
        paginate()
        {
            this.$inertia.visit(this.route('list', this.page))
        }
    }
}
</script>