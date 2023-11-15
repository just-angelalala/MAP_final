<template>
    <v-app>
    <!-- Sidebar.vue component goes here -->
    <v-navigation-drawer v-model="drawer" app mobile-break-point="sm">
        <Sidebar />
    </v-navigation-drawer>

    <v-app-bar app :dense="mobileView">
        <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title style="font-weight: bolder;">Mindoro Auto Parts</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
        </v-btn>

        <v-btn icon>
        <v-icon>mdi-bell</v-icon>
        </v-btn>

        <v-btn icon>
        <v-icon>mdi-account</v-icon>
        </v-btn>

        <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
    </v-app-bar>


  <v-main style="padding-top: 64px;">
      <v-container fluid style="background-color: #c6c6c6; height: calc(100vh - 64px); display: flex; flex-direction: column;">
        <container style="position: left; max-width: 750px; height: 100vh;">
        <v-label style="font-size: larger; margin-left: 10px; color:black; font-weight: bold;">Products</v-label>
        <v-form >
                        <v-text-field
                          label="Search"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                      </v-form>
          <v-table style="background-color: #801623;" width="100px" margin-bottom="10px">
              <thead>
              <tr>
                  <th class="text-left">
                  ID
                  </th>
                  <th class="text-left">
                  Product
                  </th>
                  <th class="text-left">
                  Quantity
                  </th>
                  <th class="text-left">
                  Total Price
                  </th>
              </tr>
              </thead>
              <!-- <tbody>
              <tr
                  v-for="item in desserts"
                  :key="item.name"
              >
                  <td>{{ item.name }}</td>
                  <td>{{ item.calories }}</td>
              </tr>
              </tbody> -->
            </v-table>
        </container>
        <container style="position: left; max-width: 750px; height: 100vh;">
          <h2 class="text-leftnpm">Sales Information</h2>
                      <v-form @submit="registerUser">
                        <v-text-field
                          label="Product ID"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Product Name"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Price"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          type="password"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Quantity"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-text-field
                          label="Total Price"
                          outlined
                          dense
                          color="blue"
                          autocomplete="false"
                          class="mt-2"
                        />
                        <v-container >
                          <v-row justify="center" >
                            <v-col cols="auto">
                              <v-btn
                              height="50"
                              min-width="164"
                              style="background-color: #007355; border-radius: 10px; color:white"
                              >
                            Add
                          </v-btn>
                            </v-col>

                            <v-col cols="auto">
                          <v-btn
                      :ripple="false"
                      height="50"
                      min-width="164"
                      style="background-color: #124E72; border-radius: 10px; color:white"
                        >
                      Update
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
                        <v-btn color="#5D1E87" dark block @click="Order">Add Item</v-btn>
          </v-form>
        </container>
      </v-container>
  </v-main>
  </v-app>
</template>

<script>
import Sidebar from "@/views/Sidebar";

export default {
    components: {
    Sidebar
    },
    data() {
    return {
        drawer: null,
        mobileView: false,
    }
    }}
    </script>

      