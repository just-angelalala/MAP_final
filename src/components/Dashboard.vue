<template>
    <v-app>
         
        <v-navigation-drawer v-model="drawer" app mobile-break-point="sm">
    <Sidebar />
</v-navigation-drawer>

<v-app-bar app :dense="mobileView">
    <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

    <v-toolbar-title>Mindoro Auto Parts</v-toolbar-title>

    <v-spacer></v-spacer>

    <v-btn icon>
    <v-icon>mdi-magnify</v-icon>
    </v-btn>

    <v-btn icon>
    <v-icon>mdi-bell</v-icon>
    </v-btn>

    <v-btn icon>
    <v-icon>mdi-account</v-icon>
    </v-btn>

    <v-btn icon>
    <v-icon>mdi-dots-vertical</v-icon>
    </v-btn>
</v-app-bar>
      <v-app-bar app color="primary">
        <v-container >
          <v-app-bar-title class="white--text">Admin Interface</v-app-bar-title>
          <v-spacer></v-spacer>
        </v-container>
      </v-app-bar>
    </v-app>
  </template>
  
  <script>
  import axios from 'axios'
  import Sidebar from "@/views/Sidebar";

export default {
components: {
Sidebar
},
data() {
return {
    drawer: null,
    mobileView: false,
}
}}
  </script>
  
  <style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    background-color: #c6c6c6;
    background-color: cover;
    height: 100vh;
    max-width: none;
  }
  
  /* Add your custom styles here */
  </style>
  