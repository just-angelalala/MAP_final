<template>
    <v-app>
      <v-navigation-drawer v-model="drawer" app mobile-break-point="sm" :mini-variant="mobileView" class="mt-16 position-fixed" >
        <v-list dense>
          <!-- Your sidebar content here -->
          <v-list-item link to="/dashboard" class="mt-16">
            <v-list-item-content>
              <v-list-item-title>
                <v-icon>mdi-view-dashboard</v-icon> Dashboard
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
  
          <v-list-item link to="/product">
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-icon>mdi-engine</v-icon> Product
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
        
                  <v-list-item link to="/sales-order">
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-icon>mdi-cart</v-icon> Sales Order
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
        
                  <v-list-item link to="/sales-history">
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-icon>mdi-history</v-icon> Sales History
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
        
                  <v-list-item link to="/user-account">
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-icon>mdi-account-circle</v-icon> User Account
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
    
                  <v-list-item link to="/logout">
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-icon>mdi-logout</v-icon> Logout
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
              </v-list>
            </v-navigation-drawer>
  
  
      <v-app-bar app :dense="mobileView">
        <v-app-bar-nav-icon @click="drawer = !drawer" class="position-fixed"></v-app-bar-nav-icon>
      </v-app-bar>
    </v-app>  
  </template>
  
  <script>
  export default {
    data() {
      return {
        drawer: true,
        mobileView: false,
      };
    },
    created() {
      this.handleResize();
      window.addEventListener("resize", this.handleResize);
    },
    destroyed() {
      window.removeEventListener("resize", this.handleResize);
    },
    methods: {
      handleResize() {
        this.mobileView = window.innerWidth < 768;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Define styles for the sidebar in mini-variant mode */
  .v-navigation-drawer.mini-variant .v-list-item {
    width: 40px; /* Adjust the width to your liking */
    text-align: center; /* Center the content in mini-variant mode */
  }
  
  /* Define styles for desktop view */
  @media (min-width: 768px) {
    .v-navigation-drawer .v-list-item {
      width: auto;
    }
    
    /* Custom class to set position: fixed for the hamburger icon */
    .position-fixed {
      position: fixed;
      top: 0;
      left: 0;
    }
  }
  </style>