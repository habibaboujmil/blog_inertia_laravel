<template>
<v-app id="inspire">
    <div>
        <toolbar/>
    </div>
        <v-form
        ref="form"
        enctype="multipart/form-data"
        name="article"
        id="article"
        >
            <v-card
            width="90%"
            class="mx-auto"
            >
            <v-list-item>
            <v-list-item-content>
                <v-list-item-title class="headline">
                    <v-text-field
                    label="Title"
                    v-model= "form.title"
                    name="title"
                    type="text" >
                    </v-text-field>
                </v-list-item-title>
                <v-list-item-subtitle></v-list-item-subtitle>
            </v-list-item-content>
            </v-list-item>
            <v-list-item>
            <v-list-item-content>
                <v-list-item-title class="headline">
                    <v-textarea
                    v-model= "form.content"
                    :label="`please tape the article content here !!`"
                    name="content"
                    type="text"
                    hide-input>
                    </v-textarea>
                </v-list-item-title>
            </v-list-item-content>
            </v-list-item>
            <v-list-item>
            <v-list-item-content>
                <v-list-item-title class="headline">
                <v-img
                :src=article.img_url
                height="194"
                max-width="100%"
                position="center"
                >
                </v-img>
                </v-list-item-title>
            </v-list-item-content>
            </v-list-item>
            <v-list-item>
            <v-list-item-content>
                <v-list-item-title class="headline">
                    <v-file-input
                    v-model= "form.image"
                    label="change photo"
                    accept="image/png, image/jpeg, image/bmp"
                    right
                >
                </v-file-input>
                </v-list-item-title>
            </v-list-item-content>
            </v-list-item>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                    text
                    color="deep-purple accent-4"
                    @click="submit">
                    Save
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-form>
</v-app>
</template>


<script>
  
  export default {
      name: 'app_cards',
    components:{
     toolbar: ()  => import('./layouts/toolbar'),
  } ,
    data: () => ({
        form: { 
            title:null,
            content:null,
            image: null,
        },
  }),
      props:['article'],

      methods: {
        submit() {
            this.$inertia.put(this.route('update', this.article.id), this.form)
                
            },
        }
  }
</script>