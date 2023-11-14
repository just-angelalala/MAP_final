<template>
    <!-- <table border="1">
      <tr>
          <th>
              Name
          </th>
          <th>
              Position
          </th>
          <th>
              Contact Number
          </th>
          <th>
              User Name
          </th>
          <th>
              Password
          </th>
          <th>
              Address
          </th>
      </tr>
      <tr v-for="info in info">
          <td>{{ info.Name }}</td>
          <td>{{ info.Position }}</td>
          <td>{{ info.ContactNumber }}</td>
          <td>{{ info.UserName }}</td>
          <td>{{ info.Password }}</td>
          <td>{{ info.Address }}</td>
      </tr>
      
    </table> -->
      <v-container>
        <!-- Hero Image for Employees -->
        <v-img src="https://files.porsche.com/filestore/image/multimedia/none/RD-2023-Homepage-Banner-WW-TaycanPush-KW20/normal/c68103e7-ef29-11ed-8103-005056bbdc38;sN;twebp/porsche-normal.webp" height="400">
        <!-- Content for the hero section for employees -->
        </v-img>
    
        <!-- Value Proposition for Employees -->
        <v-row justify="center">
          <v-col cols="12" md="8">
            <v-card class="pa-5 text-center">
              <h2 class="display-2">Your Partner in Auto Parts Supply</h2>
            </v-card>
          </v-col>
        </v-row>
    
        <!-- Description for Employees -->
        <v-row justify="center">
          <v-col cols="12" md="8">
            <v-card class="pa-3">
              <p>Your success, our commitment. We're not just a supplier; we're your unwavering partner in delivering auto parts swiftly and efficiently. Our robust supply network and unwavering commitment ensure your shop always has the right parts precisely when you need them, powering your business to new heights of excellence.</p>
            </v-card>
          </v-col>
        </v-row>
    
        <!-- Business Contact Requests and Shop Supply Services -->
        <v-row justify="center">
          <v-col cols="12" md="8">
            <v-card>
              <!-- Include sections for business contact requests and shop supply services using Vuetify components -->
            </v-card>
          </v-col>
        </v-row>
          
        <!-- Use router-link to navigate to the login page -->
        <router-link to="/login" class="text-decoration-none">
          <v-btn color="blue"  style="min-width: 100px; margin: 0 auto; display: block;">Log in</v-btn>
        </router-link>
      </v-container>
    </template>
    
    <script>
    // Import the Login component from the views directory
  import Login from '../views/Login.vue' // Adjust the path based on your project structure
  // import axios from 'axios';
  
    export default {
      components: {
        Login // Register the Login component
      },
  
  }
  </script>
    