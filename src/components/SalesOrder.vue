<template>
    <v-app>
    <!-- Sidebar.vue component goes here -->
    <v-navigation-drawer v-model="drawer" app mobile-break-point="sm">
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


  <v-main style="padding-top: 64px;">
      <v-container fluid style="background-color: blueviolet; height: calc(100vh - 64px); display: flex; flex-direction: column;">
          <v-table>
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

      