<template>
  <v-container>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="10">
        <v-card class="elevation-6 mt-10">
          <v-row>
            <v-col cols="12" md="6">
              <v-card-text class="mt-12">
                <!-- Placeholder for an image or logo tagline-->
              </v-card-text>
            </v-col>
            <v-col cols="12" md="6">
              <v-card-text class="mt-12">
                <h4 class="text-center">Login in to Your Account</h4> <br>
                <h6 class="text-center grey--text ">
                  The only way to do great work is to love what you do.
                </h6>
                <v-row align="center" justify="center">
                  <v-col cols="12" sm="8">
                    <v-text-field
                      label="Email"
                      outlined
                      dense
                      color="blue"
                      autocomplete="false"
                      class="mt-16"
                      v-model="UserEmail"
                    />
                    <v-text-field
                      label="Password"
                      outlined
                      dense
                      color="blue"
                      autocomplete="false"
                      type="password"
                      v-model="UserPassword"
                    />
                    <v-btn
                      color="blue"
                      style="min-width: 100px; margin: 0 auto; display: block;"
                      @click="handleLogin"
                    >
                      Log in
                    </v-btn>
                  </v-col>
                </v-row>
              </v-card-text>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
    <v-alert
        v-if="showAlert"
        type="error"
        title="Login Unsuccessful"
        dismissible
        transition="scale-transition"
      >
        <v-row align="center" justify="center">
            <v-col>
              <!-- You can customize the content of the alert here -->
              <v-icon color="error">mdi-alert</v-icon>
              <span class="ml-2">Login Unsuccessful. Please check your credentials.</span>
            </v-col>
        </v-row>
      </v-alert>
  </v-container>


   
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    UserEmail: "",
    UserPassword: "",
    showAlert: false, 
  }),
  methods: {
    async handleLogin() {
      try {
        const response = await axios.post(
          "api/login",
          {
            UserEmail: this.UserEmail,
            UserPassword: this.UserPassword,
          }
        );

        // Assuming the backend returns a token
        const token = response.data.token;

        // Store the token or handle it as needed (e.g., set it in a Vuex store)
        console.log("Received token:", token);
        

        // Redirect to the dashboard or perform other actions
        this.$router.push("/dashboard");
      } catch (error) {
        

        this.showAlert = true;
        console.error("Login failed:", error.response.data.error);
        // Handle the error, show a message to the user, etc.

        setTimeout(() => {
            this.showAlert = false;
         }, 1000);
      }
    },
  },
};
</script>

<style scoped>
.v-application .rounded-bl-xl {
  border-bottom-left-radius: 300px !important;
}
.v-application .rounded-br-xl {
  border-bottom-right-radius: 300px !important;
}
</style>
