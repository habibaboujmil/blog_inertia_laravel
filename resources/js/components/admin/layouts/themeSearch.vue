<template>
    <v-autocomplete
          v-model="model"
          :items="themes"
          :label="`search with theme`"
          prepend-icon="mdi-search"
        >
          <template v-slot:append-outer>
            <v-slide-x-reverse-transition
              mode="out-in"
            >
              <v-icon
                :key="`icon-${searching}`"
                :color="searching ? 'success' : 'info'"
                @click="searching = !searching"
                v-text="searching ? 'mdi-check-outline' : 'mdi-circle-edit-outline'"
              ></v-icon>
            </v-slide-x-reverse-transition>
          </template>
        </v-autocomplete>
</template>

<script>
export default {
    name: 'filtre',
    data () {
    return {
      searching: false,
      model: null,
      }
    },
    props:['themes']
}
 
</script>