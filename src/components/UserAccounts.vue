<template>
    <v-app>
      <v-navigation-drawer v-model="drawer" app mobile-break-point="sm">
        <!-- Sidebar.vue component goes here -->
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
  
      <v-main>
        <v-container fluid>
          <v-row align="center" justify="center">
            <v-col >
              <v-card class="elevation-6 mt-10" >
                <v-row>
                  <v-col cols="" md="6">
                    <v-card-text class="mt-12">
                      <!-- Placeholder for an image or logo tagline -->
                    </v-card-text>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-card-text class="mt-12">
                      <h2 class="text-center">Register New Account</h2>
                      <h4 class="text-center grey--text">Do it with passion.</h4>
                      <v-form @submit="registerUser">
                        <v-text-field
                          label="Name"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Contact Number"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Address"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          type="password"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Username"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Password"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-btn color="blue" dark block @click="registerUser">Register</v-btn>
                      </v-form>
                    </v-card-text>
                  </v-col>
                </v-row>
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
        // Your data properties here
      };
    },
    methods: {
      registerUser() {
        // Handle user registration logic here
      },
    },
  };
  </script>
  
  <style scoped>
  @media (max-width: 768px) {
    /* styles for mobile */
  }
  
  @media (min-width: 768px) {
    /* styles for desktop */
  }
  </style>
  