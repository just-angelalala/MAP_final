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
              v-model="formData.UserEmail"
              label="Email"
              :error-messages="validationErrors.UserEmail"
              type="email"
              required
            ></v-text-field>

            <v-text-field
              v-model="formData.UserPassword"
              label="Password"
              :error-messages="validationErrors.UserPassword"
              type="password"
              required
            ></v-text-field>
            <v-btn @click="login" color="primary">Log In</v-btn>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      UserEmail: '',
      UserPassword: '',
      validationErrors: {},
      flashMsg: '',
    };
  },
  methods: {
    async login() {
      this.validationErrors = {}; // Reset errors

      const requiredFields = ['UserEmail', 'UserPassword'];

      requiredFields.forEach((field) => {
        if (!this[field]) {
          this.validationErrors[field] = 'This field is required.';
        }
      });

      if (Object.keys(this.validationErrors).length === 0) {
        try {
          const response = await axios.post('/api/signin', {
            UserEmail: this.UserEmail,
            UserPassword: this.UserPassword,
          });

          if (response.data.redirect) {
            // Use Vue Router to navigate after successful login
            this.$router.push(response.data.redirect);
          } else if (response.data.error) {
            // Handle error messages
            this.flashMsg = response.data.error;
          }
        } catch (error) {
          console.error('Login failed:', error.message);
          // Handle errors or display an error message to the user
        }
      }
    },
  },
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
