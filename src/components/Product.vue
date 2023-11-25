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
            <v-container fluid style="background-color: aquamarine; height: calc(100vh - 64px); display: flex; flex-direction: column;">
                <v-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">ID</th>
                                <th class="text-left">Product</th>
                                <th class="text-left">Description</th>
                                <th class="text-left">Category</th>
                                <th class="text-left">Quantity</th>
                                <th class="text-left">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.ID">
                                <td class="text-left">{{ product.ProductID }}</td>
                                <td class="text-left">{{ product.ProductName }}</td>
                                <td class="text-left">{{ product.ProductDescription }}</td>
                                <td class="text-left">{{ product.CategoryName }}</td>
                                <td class="text-left">{{ product.Quantity }}</td>
                                <td class="text-left">{{ product.Price }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-table>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import axios from 'axios'; // Import axios library
import Sidebar from "@/views/Sidebar";

export default {
    components: {
        Sidebar,
    },
    data() {
        return {
            drawer: null,
            mobileView: false,
            products: [],
        };
    },
    mounted() {
        // Call the fetchProducts method when the component is mounted
        this.fetchProducts();
    },
    methods: {
        async fetchProducts() {
            try {
                // Make a POST request to your CodeIgniter API endpoint using axios
                const response = await axios.post('api/getProductsAndCategories');
                
                // Axios will throw an error for non-2xx status codes, so no need to manually check
                // Parse the JSON data from the response
                const data = response.data;

                // Update the products data property with the fetched data
                this.products = data;
            } catch (error) {
                // Handle errors here
                console.error('Error fetching data:', error);
            }
        },
    },
};
</script>
