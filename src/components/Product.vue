<template>
    <v-app>
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
            <v-table style="background-color: #801623;margin-bottom: 15px;">
                <thead>
                    <tr>
                        <v-btn icon style="background-color:#801623" background-color="transparent">
                    <v-icon>mdi-home</v-icon>
                </v-btn>
                    </tr>
                </thead>
           </v-table>
           <v-table >
                <thead>
                    <tr>
                        <th class="text-left">
                    All Products
                    </th>
                    </tr>
                </thead>
           </v-table>
            <v-table style="background-color: #801623;" margin-bottom="10px">
                <thead>
                <tr>
                    <th class="text-left">
                    ID
                    </th>
                    <th class="text-left">
                    Product
                    </th>
                    <th class="text-left">
                    Description
                    </th>
                    <th class="text-left">
                    Category
                    </th>
                    <th class="text-left">
                    Quantity
                    </th>
                    <th class="text-left">
                    Price
                    </th>
                </tr>
                </thead>
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

      