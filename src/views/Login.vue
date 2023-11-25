<template>
  <v-container>
      <v-row align="center" justify="center" >
          <v-col cols="12" sm="10">
            <v-card class="elevation-6 mt-10"  >
                  <v-row>
                    <v-col cols="12" md="6">
                      <v-card-text class="mt-12">
                         <!-- Placeholder for an image or logo tagline-->
                      </v-card-text>
                    </v-col>
                    <v-col cols="12" md="6">
                      <v-card-text class="mt-12">
                        <h4
                          class="text-center"
                        >Login in to Your Account</h4> <br>
                        <h6
                          class="text-center  grey--text " 
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
                           v-model="Email"
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
                          <!-- <v-btn color="blue" dark block tile>Log in</v-btn>
                            <div class="d-flex  justify-space-between align-center mx-10 mb-16">
                            </div> -->
                            <router-link to="/dashboard" class="text-decoration-none">
                              <v-btn color="blue"  style="min-width: 100px; margin: 0 auto; display: block;">Log in</v-btn>
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
</script>

<style scoped>
.v-application .rounded-bl-xl {
    border-bottom-left-radius: 300px !important;
}
.v-application .rounded-br-xl {
    border-bottom-right-radius: 300px !important;
}
</style>