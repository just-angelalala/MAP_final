<template>
    <v-app>
      <!-- Sidebar.vue component goes here -->
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
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
      </v-app-bar>
  
      <v-main style="padding-top: 64px;">
        <v-container>
          <v-row align="center" justify="center">
            <!-- 6 containers with different colors -->
            <v-col v-for="(variant, i) in variants" :key="i" cols="12" md="6" lg="4">
              <v-card class="mx-auto" :color="colors[i]">
                <v-card-item>
                  <div>
                    <div class="text-overline mb-1">{{ variant }}</div>
                    <div class="text-h6 mb-1">Headline</div>
                    <div class="text-caption">Greyhound divisely hello coldly fonwderfully</div>
                  </div>
                </v-card-item>
                <v-card-actions>
                  <v-btn>Button</v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-main>
    </v-app>
  </template>
  
  <script>
  import Sidebar from "@/views/Sidebar";
  
  export default {
    components: {
      Sidebar
    },
    data() {
      return {
        drawer: null,
        mobileView: false,
        variants: ['Variant 1', 'Variant 2', 'Variant 3', 'Variant 4', 'Variant 5', 'Variant 6'],
        colors: ['#FFD700', '#FF6347', '#00CED1', '#7B68EE', '#32CD32', '#FF4500'],
      };
    }
  };
  </script>
  