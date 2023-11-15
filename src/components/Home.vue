<template>
   <v-container class="landing">
     <v-row  justify="center" style="font-size: 25px; color:white">
       <v-col cols="12" md="8">
         <v-card class="pa-5 text-center" color="transparent">
           <h2 class="display-2">Your Partner in Auto Parts Supply</h2>
         </v-card>
       </v-col>
     </v-row>
 
     <!-- Description for Employees -->
     <v-row style="font-size: 25px; margin-left: 20px;">
       <v-col cols="12" md="5">
         <v-card class="pa-3" color="transparent">
           <p>Your success, our commitment. We're not just a supplier; we're your unwavering partner in delivering auto parts swiftly and efficiently.</p>
         </v-card>
       </v-col>
     </v-row>
 
     <!-- Business Contact Requests and Shop Supply Services -->
     <v-row justify="center" style="font-size: 25px; margin-bottom: 10px;">
       <v-col cols="12" md="5">
         <v-card class="pa-3" color="transparent">
           <p>Our robust supply network and unwavering commitment ensure your shop always has the right parts precisely when you need them, powering your business to new heights of excellence.</p>
         </v-card>
       </v-col>
     </v-row>
       
     <!-- Use router-link to navigate to the login page -->
     <div class="auth-links">
        <router-link to="/signup" class="text-decoration-none">
          <nav>
            <a href="<?php echo base_url('Signup'); ?>" class="btn">Sign up</a>
          </nav>
        </router-link>
        <router-link to="/login" class="text-decoration-none">
          <nav>
            <a href="<?php echo base_url('Login'); ?>" class="btn btn-login">Log In</a>
          </nav>
        </router-link>
      </div>

   </v-container>
 </template>
 
 <script>
 // Import the Login component from the views directory
 import axios from 'axios'
 import Login from '../views/Login.vue' // Adjust the path based on your project structure
 
 export default {
   components: {
     Login // Register the Login component
   },
   // Your component's script
 };
 </script>
  <style scoped>
  .landing{
    background: url('../assets/last.png');
    background-size: cover;
    height: 100vh;
    max-width: max-content;
    text-align: center;
    color:antiquewhite;
}
header {
           background-color: #333;
           padding: 10px;
           text-align: center;
           color: white;
       }

       .auth-links {
          display: flex;
          justify-content: center;
          align-items: center;
        }

        nav {
          margin-right: 10px; /* Adjust as needed for spacing */
        }
       .btn {
           display: inline-block;
           padding: 10px 20px;
           font-size: 16px;
           text-decoration: none;
           background-color: #3498db;
           color: #fff;
           border-radius: 5px;
       }

       .btn-login {
           background-color: #2ecc71;
       }
</style>
 