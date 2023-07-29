<template>
  <v-app-bar  class="bg-primary">
    <v-app-bar-title class="no-responsive">Grupo Plan Marketing</v-app-bar-title>
    <v-tabs v-model="tab">
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
@media (max-width: 600px)
{
 
}
</style>
  