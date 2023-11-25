<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" app mobile-break-point="sm">
      <Sidebar />
    </v-navigation-drawer>

    <v-app-bar app :dense="mobileView">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Mindoro Auto Parts</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon><v-icon>mdi-magnify</v-icon></v-btn>
      <v-btn icon><v-icon>mdi-bell</v-icon></v-btn>
      <v-btn icon><v-icon>mdi-account</v-icon></v-btn>
      <v-btn icon><v-icon>mdi-dots-vertical</v-icon></v-btn>
    </v-app-bar>

    <v-app-bar app color="primary">
      <v-container>
        <v-app-bar-title class="white--text">Admin Interface</v-app-bar-title>
        <v-spacer></v-spacer>
      </v-container>
    </v-app-bar>

    <v-main class="custom-main">
      <v-container>
        <v-row>
          <v-col cols="10" lg="3">
            <v-card class="pa-md-4 mx-lg-auto"   elevation="12" color="#F44336" width="300">
              <v-card-title>Products</v-card-title>
              <v-card-text> <p>Total Sales: {{ totalSales }}</p>

                <ul>
                  <li v-for="product in products" :key="product.id">{{ product.name }}</li>
                </ul>
              </v-card-text>
            </v-card>
          </v-col>
          <v-spacer></v-spacer>
  
          <v-col cols="10" lg="3">
            <v-card class="pa-md-4 mx-lg-auto"  elevation="12"  color="#E91E63" width="300">
              <v-card-title>Total Sales</v-card-title>
              <v-card-text>
                <p>Total Sales: {{ totalSales }}</p>
              </v-card-text>
            </v-card>
          </v-col>
          <v-spacer></v-spacer>

          <v-col cols="10" lg="3">
            <v-card class="pa-md-4 mx-lg-auto"   elevation="12" color="#9C27B0" width="300px">
              <v-card-title>Total Customers</v-card-title>
              <v-card-text>
                <p>Total Customers: {{ totalCustomers }}</p>
              </v-card-text>
            </v-card>
          </v-col>
         <v-spacer  d-flex justify-space-between align-center></v-spacer> 

          <v-col cols="12" lg="12">
            <v-card class="pa-md-4 mx-lg-auto"  elevation="12" height="350" color="secondary" width="1015px">
              <v-card-title>D A T A</v-card-title>
              <v-card-text>
                <p>DATA: {{ totalCustomers }}</p>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axios from 'axios';
import Sidebar from "@/views/Sidebar";

export default {
  components: {
    Sidebar
  },
  data() {
    return {
      drawer: null,
      mobileView: false,
      // Initialize or fetch data for products, totalSales, and totalCustomers here
      products: [],
      totalSales: 0,
      totalCustomers: 0
    };
  },
  // Add methods or lifecycle hooks if needed
  // methods: {},
  // mounted() {},
};
</script>

<style>
/* Add your custom styles here */
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  background-color: #c6c6c6;
  /* background-size: cover; */
  height: 100vh;
  max-width: none;
}
</style>
