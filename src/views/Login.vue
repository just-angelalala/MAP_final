<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="8" md="6">
        <v-card>
          <v-card-title class="text-h5">Sign In</v-card-title>
          <v-alert
            v-if="flashMsg"
            type="error"
            dismissible
            border="top"
          >
            {{ flashMsg }}
          </v-alert>

          <v-form @submit.prevent="login">
            <v-text-field
              v-model="userEmail"
              label="Username"
              :error-messages="validationErrors.userEmail"
              required
            ></v-text-field>

            <v-text-field
              v-model="userPassword"
              label="Password"
              :error-messages="validationErrors.userPassword"
              type="password"
              required
            ></v-text-field>
            <router-link to="/dashboard" class="text-decoration-none">
                <v-btn type="submit" color="primary">Sign In</v-btn>
            </router-link>
          </v-form>

          <v-divider></v-divider>

          <v-row justify="center">
            <v-col>
              <span>Don't have an account?</span>
              <router-link to="/signup" class="text-decoration-none">
              <v-btn @click="goToSignup" text>Sign up</v-btn>
            </router-link>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      userEmail: '',
      userPassword: '',
      validationErrors: {},
      flashMsg: ''
    };
  },
  methods: {
    login() {
      // Your login logic here
      // Access the form data using this.userEmail and this.userPassword
      // Validate the form and handle errors

      // After successful login, you may want to redirect to another page
      // Use router or other navigation methods
    },
    goToSignup() {
      // Redirect to the registration page
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
                                <v-btn color="#5D1E87"  style="min-width: 100px; margin: 0 auto; display: block;">Sign in</v-btn>
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>