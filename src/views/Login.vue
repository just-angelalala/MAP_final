<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="2" md="6">
        <v-card>
          <v-card-title class="text-h5">Welcome to Mindoro Auto Parts</v-card-title>
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
              label="Email"
              :error-messages="validationErrors.userEmail"
              type="email"
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
                <v-btn type="submit" color="primary">Log In</v-btn>
            </router-link>
          </v-form>

          <v-divider></v-divider>

          <v-row justify="center">
            <v-col>
              <span>Don't have an account?</span>
              <router-link to="/signup" class="text-decoration-none">
              <v-btn @click="goToSignup" text>Sign Up</v-btn>
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
    async loginAuth() {
      try {
        const response = await axios.post("/login", {
          UserName:this.userEmail, // corrected from userName to userEmail
          Password:this.userPassword
        });

        // Assuming you have some logic to handle the response here
        console.log(response);


        switch (Position) {
                    case 'Admin':
                        this.$router.push('/admin/dashboard');
                        break;
                    case 'Staff':
                        this.$router.push('/staff/dashboard');
                        break;
                    // Handle other roles if needed
                    default:
                        this.$router.push('/login');
                }
        // After successful login, you may want to redirect to another page
        // Use router or other navigation methods
      } catch (error) {
        // Handle errors here
        console.error(error);
      }
    },
    goToSignup() {
      // Redirect to the registration page
      // Use router or other navigation methods
    }
  }
};
</script>


<style scoped>
  .v-card {
    margin-top: 30%;
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
