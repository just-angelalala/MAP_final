<template>
    <v-container >
    <v-form @submit.prevent="register">
      <h2>Registration Form</h2>
  
      <v-text-field
        v-model="formData.name"
        label="Name"
        required
        :error-messages="validationErrors.name"
      ></v-text-field>
  
      <v-text-field
        v-model="formData.contactNumber"
        label="Contact Number"
        required
        :error-messages="validationErrors.contactNumber"
        type="number"
      ></v-text-field>
  
      <v-text-field
        v-model="formData.userEmail"
        label="Email"
        required
        :error-messages="validationErrors.userEmail"
        type="email"
      ></v-text-field>
  
      <v-text-field
        v-model="formData.userPassword"
        label="Password"
        required
        :error-messages="validationErrors.userPassword"
        type="password"
      ></v-text-field>
  
      <v-text-field
        v-model="formData.confirmPassword"
        label="Confirm Password"
        required
        :error-messages="validationErrors.confirmPassword"
        type="password"
      ></v-text-field>
  
      <v-select
        v-model="formData.position"
        label="Position"
        required
        :error-messages="validationErrors.position"
      >
        <v-list-item-group v-if="positions.length">
          <v-list-item v-for="position in positions" :key="position.value" :value="position.value">
            <v-list-item-title>{{ position.text }}</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-select>
  
      <v-textarea
        v-model="formData.address"
        label="Address"
        required
        :error-messages="validationErrors.address"
        rows="4"
      ></v-textarea>
      
          <v-btn type="submit" @click="register">Signup</v-btn>
     
      <v-row>
        <v-col>
          <span>Already have an account?</span>
          <router-link to="/login" class="text-decoration-none">
          <v-btn @click="goToLogin">Sign in</v-btn>
        </router-link>
        </v-col>
      </v-row>
    </v-form>
  </v-container>
  </template>
  
  <script>
  import axios from 'axios'
  
  export default {
    data() {
      return {
        formData: {
          name: '',
          contactNumber: '',
          userEmail: '',
          userPassword: '',
          confirmPassword: '',
          position: '',
          address: ''
        },
        validationErrors: {}
      };
    },
    methods: {
      register() {
        // Your registration logic here
        // Access form data using this.formData
        // Validate the form and handle errors
      },
      goToLogin() {
        // Redirect to the login page
        // Use router or other navigation methods
      }
    }
  };
  </script>
  
  <!-- <template>
      <v-container class="log">
          <v-row style="margin-top: 180px;" align="center" justify="center" >
              <v-col cols="16" sm="8">
                <v-card class="elevation-6 mt-10" style="color#801623; opacity:85%" >
                      <v-row>
                        <v-col cols="12" md="6">
                          <v-card-text class="mt-8">
                            
                          </v-card-text>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-card-text class="mt-12">
                            <h4
                              class="text-center" style="font-size: x-large;"
                            >Login in to Your Account</h4> <br>
                            <h6
                              class="text-center  grey--text " style="font-size: x-small;"
                            >The only way to do great work is to love what you do.</h6>
                            <v-row align="center" justify="center">
                              <v-col cols="12" sm="8">
                               
                              <v-text-field
                                label="Email"
                                outlined
                                dense
                                color="blue"
                                autocomplete="false"
                               class="mt-16"
                              />
                              <v-text-field
                                label="Password"
                                outlined
                                dense
                                color="blue"
                                autocomplete="false"
                               type="password"
                              />
                             
                                <router-link to="/dashboard" class="text-decoration-none">
                                  <v-btn color="#5D1E87"  style="min-width: 100px; margin: 0 auto; display: block;">Sign up</v-btn>
                                </router-link>
  
                              </v-col>
                            </v-row>
                          </v-card-text>
                        </v-col>
                      </v-row>
                </v-card>
              </v-col>
          </v-row>
      </v-container>
    </template>
    
    <script>
    export default {
      data: () => ({
        step: 1
      }),
      props: {
        source: String
      } 
    }
    </script> -->
    
    <!-- <style scoped>
    .v-application .rounded-bl-xl {
        border-bottom-left-radius: 300px !important;
    }
    .v-application .rounded-br-xl {
        border-bottom-right-radius: 300px !important;
    }
    .log{
        background: url('../assets/last.png');
        background-size: cover;
        height: 100vh;
        max-width:none;
  
    }
    #h4{
      color:#5D1E87;
    }
    </style> -->
    <style scoped>
         .v-container {
              font-family: Arial, sans-serif;
              background-color: #f4f4f4;
              /* margin: 0;
              padding: 0; */
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              width: 2000px ;
          }
  
          .v-form {
              background-color: #fff;
              padding: 20px;
              border-radius: 8px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              max-width: none;
              
          }
  
          h2 {
              text-align: center;
              color: #333;
          }
  
          label {
              display: block;
              margin: 10px 0 5px;
              color: #555;
          }
  
          .v-btn, select, textarea {
              width: 100%;
              padding: 8px;
              margin-bottom: 10px;
              box-sizing: border-box;
              border: 1px solid #ccc;
              border-radius: 4px;
          }
  
          .v-btn[type="submit"] {
              background-color: #4caf50;
              color: #fff;
              cursor: pointer;
          }
  
          .v-btn[type="submit"]:hover {
              background-color: #45a049;
          }
  
          .invalid-feedback {
              color: #ff0000;
              margin-top: 5px;
          }
      </style>