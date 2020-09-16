<template>
      <v-footer
        dark
        padless
      >
        <v-card
          class="flex"
          flat
          tile
        >
          <v-card-title class="justify-center">
            Connect us
            <v-btn
              v-for="icon in icons"
              :key="icon"
              class="mx-4"
              dark
              icon
              link
            >
              <v-icon size="24px">{{ icon }}</v-icon>
            </v-btn>
          </v-card-title>
    
          <v-card-text class="py-2 white--text text-center">
            {{ new Date().getFullYear() }} — <strong>Habiba BOUJMIL</strong>
          </v-card-text>
        </v-card>
      </v-footer>
</template>

<script>
  export default {
    name: 'app_footer',
    data: () => ({
          icons: [
            {icon:'mdi-facebook',link:''},
            {icon:'mdi-github',link:''},
            {icon:'mdi-linkedin',link:'https://www.linkedin.com/in/habiba-boujmil-121774139/'},
          ],
        }),
      }
</script>