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

            <v-container fluid style="height: calc(100vh - 64px); display: flex; flex-direction: row;">

                
                <div style="flex: 1; margin-right: 20px;">
                    <h1>Add Product</h1>
                    <v-form>
                        <v-row no-gutters>
                            <v-col cols="12">
                                <v-text-field label="Product Name" density="compact" variant="outlined" v-model="newProduct.ProductName"></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field label="Product Description" density="compact" variant="outlined" v-model="newProduct.ProductDescription"></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-select label="Category" density="compact" variant="outlined" v-model="newProduct.CategoryName" :items="category"></v-select>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field label="Quantity" density="compact" variant="outlined" v-model="newProduct.Quantity"></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field label="Price" density="compact" variant="outlined" v-model="newProduct.Price"></v-text-field>
                            </v-col>
                            <v-col>
                                <v-btn @click="addProduct">Add Product</v-btn>
                            </v-col>
                        </v-row>
                    </v-form>
                </div>
                <div style="flex: 1; border: 1px solid #ccc; border-radius: 8px; overflow: hidden;">
                    <v-data-table-virtual
                        :headers="headers"
                        :items="products"
                        height="600"
                    ></v-data-table-virtual>
                       </div>
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
                headers:[
                  {
                    title: "Product Name",
                    key: "ProductName",
                  },
                  {
                    title: "Quantity",
                    key: "Quantity",
                  },
                  {
                    title: "Price",
                    key: "Price",
                  } ,
                  {
                    title: "Status",
                    key: "Status",
                  } ,
                  
                ],
            newProduct: {
                ProductName: '',
                ProductDescription: '',
                CategoryName: '',
                Quantity: 0,
                Price: 0,
                categoryID: null,
            },
            category: [],
        };
    },
    mounted() {// function laman neto
        // Fetch categories when the component is mounted
        this.fetchCategories();
        this.displayProducts();
    },
    methods: {
        async fetchCategories() {
            try {
                const response = await axios.get('/api/getAllCategories'); // Replace 'your_controller' with the actual controller name
                // Update the categories data property with the fetched data
                this.category = response.data;
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        },
        async addProduct(){
            try {
                const formData = new FormData();
                formData.append('ProductName', this.newProduct.ProductName)
                formData.append('ProductDescription', this.newProduct.ProductDescription)
                formData.append('CategoryName', this.newProduct.CategoryName)
                formData.append('Price',this.newProduct.Price)
                formData.append('Quantity',Number(this.newProduct.Quantity))

                const response = await axios.post('api/addProduct', formData)
                console.log(response);
            } catch (error) {
                console.log(error);
            }
        },
        async displayProducts(){
            try {
                const response = await axios.get('/api/displayProducts'); // Replace 'your_controller' with the actual controller name
                // Update the categories data property with the fetched data
                this.products = response.data;
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }
    },



// async addProduct() {
//     try {
//         const response = await axios.post('/api/addProduct', {
//             upc: this.newProduct.ProductName,
//             name: this.newProduct.ProductName,
//             description: this.newProduct.ProductDescription,
//             quantity: this.newProduct.Quantity,
//             price: this.newProduct.Price,
//             categoryID: this.newProduct.CategoryID, // Adjust property name
//             status: this.newProduct.Status,
//         });

//         // Handle the response from the backend
//         console.log(response.data.message);

//         // Reset the form after successful submission
//         this.newProduct = {
//             ProductName: '',
//             ProductDescription: '',
//             CategoryName: '',
//             Quantity: 0,
//             Price: 0,
//             Status: '',
//             categoryID: null, // Adjust property name
//         };
//     } catch (error) {
//         console.error('Error adding product:', error.response.data.message);
//     }
// },

}
</script>

<style>










.peso-input input::before {
  content: "₱ ";
  position: absolute;
  left: 10px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 1rem;
  color: grey; /* Adjust the color as needed */
}
</style>
