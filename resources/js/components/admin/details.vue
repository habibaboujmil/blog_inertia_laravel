<template>
<v-app id="inspire">
  <toolbar />
  <v-container>
 <v-card>
        <v-img
            :src= article.img_url
            class="white--text align-end"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="200px"
        >
        
        </v-img>
        <v-card-subtitle class="pb-0" v-text="'Theme:' +article.theme.name">
        </v-card-subtitle>
        <v-card-title v-text="article.title"></v-card-title>
        <v-card-text class="text--primary">
            <div >{{ article.content }}</div>
            
        </v-card-text>
        
        <v-card-subtitle class="pb-0" v-text="'Author: '+article.author.name"></v-card-subtitle>

        <v-card-actions>
        
              
        </v-card-actions>
    </v-card>
  </v-container>
</v-app>
</template>


<script>
  
  export default {
      name: 'details',
    components:{
     toolbar: ()  => import('./layouts/toolbar'),
  } ,
    data: () => ({

  }),
      props:['article'],

  }
</script>