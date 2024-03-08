<template>
  <div id="belfolio-backend-app">
    <NavBar /> 
    <SideBar />
    <router-view />
  </div>
</template>

<script setup>
import {ref} from "vue" ;
import NavBar from './pages/components/navBar.vue';
import SideBar from './pages/components/sidebar.vue';
import Categorie from './pages/components/categorie.vue';
import Recap  from './pages/components/recap.vue';
import Doc from './pages/components/doc.vue'
</script>

<style>
</style>