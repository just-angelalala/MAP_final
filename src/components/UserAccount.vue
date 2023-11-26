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
            <v-card class="elevation-6 mt-5" height="auto">
              <v-row>
                <v-col cols="" md="6">
                  <v-card-text class="mt-4">
                    <!-- Placeholder for an image or logo tagline -->
                  </v-card-text>
                </v-col>
                <v-col cols="12" md="6">
                  <v-card-text class="mt-2">
                    <v-form @submit.prevent="registerUser" dense>
                      <v-text-field
                        v-model="formData.Name"
                        label="Name"
                        outlined
                        color="blue"
                        autocomplete="false"
                        class="mt-1"
                        dense
                      />
                      <v-text-field
                        v-model="formData.Position"
                        label="Position"
                        outlined
                        color="blue"
                        autocomplete="false"
                        class="mt-1"
                        dense
                      />
                      <v-text-field
                        v-model="formData.ContactNumber"
                        label="Contact Number"
                        outlined
                        color="blue"
                        autocomplete="false"
                        class="mt-1"
                        dense
                        :rules="contactNumberRules"
                      />
                      <v-text-field
                        v-model="formData.Address"
                        label="Address"
                        outlined
                        color="blue"
                        autocomplete="false"
                        type="text"
                        class="mt-1"
                        dense
                      />
                      <v-text-field
                        v-model="formData.UserEmail"
                        label="User Email"
                        outlined
                        color="blue"
                        autocomplete="false"
                        class="mt-1"
                        dense
                      />
                      <v-text-field
                        v-model="formData.UserPassword"
                        label="Password"
                        outlined
                        color="blue"
                        autocomplete="false"
                        class="mt-1"
                        type="password"
                        dense
                      />
                      <v-btn color="blue" dark block type="submit">Register</v-btn>
                    </v-form>
                  </v-card-text>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <v-alert
        v-if="showErrorAlert"
        type="error"
        title="Registration Unsuccessful"
        dismissible
        transition="scale-transition"
      >
        <v-row align="center" justify="center">
          <v-col>
            <v-icon color="error">mdi-alert</v-icon>
            <span class="ml-2">Registration Unsuccessful. Please check your information.</span>
          </v-col>
        </v-row>
      </v-alert>

      <!-- Success Alert -->
      <v-alert
        v-if="showSuccessAlert"
        type="success"
        title="Registration Successful"
        dismissible
        transition="scale-transition"
      >
        <v-row align="center" justify="center">
          <v-col>
            <v-icon color="success">mdi-check-circle</v-icon>
            <span class="ml-2">Registration Successful. Welcome!</span>
          </v-col>
        </v-row>
      </v-alert>
    </v-main>
  </v-app>
</template>

<script>
import axios from "axios";
import Sidebar from "@/views/Sidebar";

export default {
  components: {
    Sidebar,
  },
  data() {
    return {
      drawer: null,
      mobileView: false,
      showErrorAlert: false,
      showSuccessAlert: false,
      formData: {
        Name: "",
        Position: "",
        ContactNumber: "",
        Address: "",
        UserEmail: "",
        UserPassword: "",
      },
    };
  },
  computed: {
    contactNumberRules() {
      return [
        (v) => !!v || "Contact Number is required",
        (v) => (v && v.length === 11) || "Contact Number must be 11 characters",
        // You can add more rules as needed
      ];
    },
  },
  methods: {
    async registerUser() {
      try {
        const response = await axios.post("api/register", this.formData);

        console.log(response.data.message);
        // Handle success, e.g., show a success message to the user

        this.showSuccessAlert = true;

        setTimeout(() => {
          this.showSuccessAlert = false;
        }, 3000);
      } catch (error) {
        console.error("Registration failed:", error);
        // Handle errors, e.g., show error messages to the user

        this.showErrorAlert = true;

        setTimeout(() => {
          this.showErrorAlert = false;
        }, 3000); // Set the timeout to 3 seconds (adjust as needed)
      }
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
