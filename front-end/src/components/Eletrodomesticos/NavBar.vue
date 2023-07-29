<template>
  <v-app-bar title="Teste Grupo Plan Marketing " class="bg-primary">
    <v-tabs  v-model="tab">
      <router-link class="tabs" to="/">
        <v-tab value="1">Eletrodomésticos</v-tab>
      </router-link>
      <router-link  class="tabs" to="/marcas">
        <v-tab value="2">Marcas</v-tab>
      </router-link>
    </v-tabs>
  </v-app-bar>
</template>
  
<script>
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'NavBar',
  data() {
    return {
      tab: null
    }
  }

});
</script>
<style>
  .tabs {
    text-decoration: none;
    color: white;
  }
</style>
  