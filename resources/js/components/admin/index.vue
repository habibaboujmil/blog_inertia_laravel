<template>
    <v-app id="inspire">
        <div>
            <toolbar/>
            
        </div>
        <div style="float: right">
            
        </div>
        <v-card  class="mx-auto"  max-width="90%"  style="margin-bottom:20px" >
                <v-container fluid>
                    
                    <v-row class="my-2" style="margin:20px">
                            <v-text-field label="Search"
                                v-model= "filtre.title"
                                placeholder="Title"
                                outlined
                                append-icon= "search"
                                @click:append = "search"
                                >
                            </v-text-field>
                            <v-spacer></v-spacer>
                            <v-btn  color="deep-purple accent-4" dark
                                large
                                @click="add"
                                >Add Article
                            </v-btn>
                        
                    </v-row >
                    <v-row class="my-2" style="margin:20px">
                    </v-row>
                    <v-row dense>
                        <v-col
                            v-for="article in articles.data"
                            :key="article.id"
                            :cols= 4
                        >
                        <v-card>
                            <v-card-subtitle class="pb-0" v-text="'Theme:' +article.theme.name">
                            </v-card-subtitle>
                            <v-img
                                :src=article.img_url
                                class="white--text align-end"
                                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                                height="200px"
                            >
                            <v-card-title v-text="article.title"></v-card-title>
                            </v-img>
                            
                            <v-card-text class="text--primary">
                                <div v-if="article.content.length<100">{{ article.content }}</div>
                                <div v-else> 
                                    {{ article.content.substring(0,100)+"..." }}
                                </div>
                                <div>
                                    <v-btn color="blue" text @click="show(article.id)">Read more... </v-btn>
                                </div>
                                
                            </v-card-text>
                            <v-card-actions>
                                <v-card-subtitle class="pb-0" v-text="'Author: '+article.author.name"></v-card-subtitle>
                                <v-spacer></v-spacer>
                                <v-icon color="orange" @click="edite(article.id)">edite</v-icon>
                            
                                <v-icon color="red" @click="destroy(article.id)">delete</v-icon>
                                 
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row justify="center">
                    <v-col cols="8">
                        <v-container class="max-width">
                        <v-pagination
                            v-model="page"
                            class="my-4"
                            :length=articles.last_page
                        ></v-pagination>
                        </v-container>
                    </v-col>
                </v-row>
            </v-container>
        </v-card>

  </v-app>
</template>

<script>

  export default {
      name: 'app_cards',
    components:{
     toolbar: ()  => import('./layouts/toolbar'),
    filtre: ()  => import('./layouts/themeSearch'),
  } ,
    
   data () {
    return {
      page:null,
      filtre:{
          title:'',
      }
      
    }},
      props:['articles','themes'],
      methods: {
          edite(id) {
        this.$inertia.visit(this.route('show', id))
      } ,
        destroy(id) {
        this.$inertia.delete(this.route('delete', id))
      } , 
        add() {
            this.$inertia.visit(this.route('create'))
          },
        show(id) {
            this.$inertia.visit(this.route('details', id))
          },
        
        search(){
            this.$inertia.visit(this.route('list', this.filtre))
        }
          
  }
  }
</script>
