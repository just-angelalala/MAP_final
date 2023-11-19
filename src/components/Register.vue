<template>
  <v-container >
    <v-form @submit.prevent="register">
      <h4>Registration Form</h4>
  
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
        hide-details="true"
        counter="false" 
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
        rows="2"
      ></v-textarea>
      
          <v-btn type="submit" @click="register">Sign up</v-btn>
     
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
    //   methods: {
    //     async loginAuth(){
    //         try {
    //             const response = await axios.post("/loginAuth",{
    //                 Username:this.username,
    //                 Password:this.password
    //             })

    //             const decodedToken = jwt_decode(response.data.token);
    //             const userRole = decodedToken.aud;

    //             // Use more secure storage like HttpOnly cookies instead of localStorage
    //             sessionStorage.setItem('token', response.data.token)
                
    //             switch (userRole) {
    //                 case 'Farmer':
    //                     this.$router.push('/farmer/home');
    //                     break;
    //                 case 'DAP':
    //                     this.$router.push('/admin/dashboard');
    //                     break;
    //                 // Handle other roles if needed
    //                 default:
    //                     this.$router.push('/login');
    //             }
    //         } catch (error) {
    //             console.error("Error during login:", error);
    //             // Handle errors more explicitly, show user-friendly messages if needed
    //         }
    //     }
    // },


      goToLogin() {
        // Redirect to the login page
        // Use router or other navigation methods
      }
    }
;
  </script>
  
    <style scoped>
         .v-container {
              font-family: Arial, sans-serif;
              background-color: #f4f4f4;
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              width: 2000px ;
          }
  
          .v-form {
              background-color: #fff;
              padding: 10px;
              border-radius: 8px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              max-width: none;
              
          }
  
          h4 {
              text-align: center;
              color: #333;
          }
  
          label {
              display: block;
              margin: 5px 0 5px;
              color: #555;
          }
  
          .v-btn, select, textarea {
              width: 100%;
              padding: 5px;
              margin-bottom: 5px;
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