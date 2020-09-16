<template>
    <v-app id="inspire">
        <v-card  class="mx-auto"  max-width="90%"  style="margin-bottom:20px" >
                <v-container fluid>
                    <v-row dense>
                        <v-col
                            v-for="article in articles.data"
                            :key="article.id"
                            :cols= 4
                        >
                        <v-card>
                            <v-img
                                :src=article.img_url
                                class="white--text align-end"
                                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                                height="200px"
                            >
                            <v-card-title v-text="article.title"></v-card-title>
                            </v-img>
                            <v-card-subtitle class="pb-0">Number 10</v-card-subtitle>
                            <v-card-text class="text--primary">
                                <div v-if="article.content.length<100">Welcome, {{ article.content }}</div>
                                <div v-else> 
                                    {{ article.content.substring(0,100)+"..." }}
                                </div>
                            </v-card-text>

                            <v-card-actions>
                                <v-btn color="orange" text @click="show(article.id)">Read more... </v-btn>
                                <v-spacer></v-spacer>
            
                                <v-btn icon>
                                    <v-icon>mdi-heart</v-icon>
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
                <pagination  :articles='articles'></pagination>
            </v-container>
        </v-card>

  </v-app>
</template>

<script>

  export default {
    name: 'app_cards',
       components:{
     pagination: ()  => import('./pagination'),
    } ,
   props:['articles'],
     methods: {
        show(id) {
            this.$inertia.visit(this.route('details', id))
        }}
        
  }
</script>
