
<template>
  <v-app>
    <v-responsive :aspect-ratio="16/9">
        <navBar :themes='themes'></navBar>

        <appCards  :articles='articles'> </appCards> 
      

        <appFooter />
    </v-responsive>
  </v-app>
  
</template>

<script>
// import cards from './layouts/cards'
// // import footer from './layouts/footer'

  export default {

  components:{
     navBar: ()  => import('./layouts/toolbar'),
     appCards: ()  => import('./layouts/cards'),
     appFooter: ()  => import('./layouts/footer'),
  } ,
        props:['articles','themes']
            
  }

  
</script>
