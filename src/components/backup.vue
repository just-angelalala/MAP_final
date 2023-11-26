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
        <v-btn icon><v-icon>mdi-magnify</v-icon></v-btn>
        <v-btn icon><v-icon>mdi-bell</v-icon></v-btn>
        <v-btn icon><v-icon>mdi-dots-vertical</v-icon></v-btn>
      </v-app-bar>
  
      <v-main style="padding-top: 64px;">
        <v-container fluid>
          <!-- Customer Information -->
          <v-card class="customer-card">
            <v-card-title class="headline">Customer Information</v-card-title>
            <v-card-text>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field v-model="customerName" label="Customer Name" outlined dense></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="customerAddress" label="Customer Address" outlined dense></v-text-field>
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
  
          <!-- Sales Information -->
          <v-card class="sales-card elevation-2">
            <v-card-title class="headline mb-4">Sales Information</v-card-title>
            <v-card-text>
              <v-row>
                <!-- Left Side: User Input and Add Button -->
                <v-col cols="12" md="6" class="px-4">
                  <v-form @submit.prevent="addProduct">
                    <v-select
                      v-model="newProduct.productName"
                      :items="productNames"
                      label="Product Name"
                      outlined
                      dense
                      @change="updateProductDetails"
                    ></v-select>
  
                    <!-- Text fields for other product details -->
                    <v-text-field v-model="newProduct.productID" label="Product ID" outlined dense readonly></v-text-field>
                    <v-text-field v-model="newProduct.quantity" label="Quantity" type="number" outlined dense></v-text-field>
                    <v-text-field v-model="newProduct.price" label="Price" type="number" outlined dense readonly></v-text-field>
                    <v-btn color="primary" @click="addOrUpdateProduct" class="mt-3">
                      {{ updateIndex !== null ? 'Update' : 'Add' }}
                    </v-btn>
                  </v-form>
                </v-col>
  
                <!-- Right Side: List of Sales Information -->
                <v-col cols="12" md="6" class="px-4">
                  <v-data-table :headers="salesHeaders" :items="salesInformation" item-key="productID" class="elevation-1">
                    <template v-slot:item="{ item, index }">
                      <v-row align="center">
                        <v-col cols="8">
                          <v-list-item class="py-1">
                            <v-list-item-content>
                              <v-list-item-title class="font-weight-bold">{{ item.productID }} - {{ item.productName }}</v-list-item-title>
                              <v-list-item-subtitle>
                                Price: {{ item.price }} | Quantity: {{ item.quantity }}
                              </v-list-item-subtitle>
                            </v-list-item-content>
                          </v-list-item>
                        </v-col>
                        <v-col cols="4">
                          <v-list-item-action>
                            <v-btn color="primary" @click="updateProduct(index)" class="mr-1">Update</v-btn>
                            <!-- Inside the v-btn in the v-data-table template -->
                            <v-btn color="secondary" @click="cancelProduct(index)">Cancel</v-btn>
  
                          </v-list-item-action>
                        </v-col>
                      </v-row>
                    </template>
                  </v-data-table>
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
  
          <!-- Cart Details -->
          <v-card class="checkout-card">
            <v-card-actions>
              <v-btn color="success" @click="">Complete Transaction</v-btn>
            </v-card-actions>
          </v-card>
  
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
  
  
        </v-container>
      </v-main>
    </v-app>
  </template>
  
  <script>
  import axios from 'axios'
  import Sidebar from "@/views/Sidebar";
  
  export default {
    components: {
      Sidebar,
    },
    mounted() {
          // Call the fetchProducts method when the component is mounted
          this.fetchProducts();
      },
    data() {
      return {
        drawer: null,
        mobileView: false,
        customerName: '',
        customerAddress: '',
        newProduct: {
          productName: '',
          productID: '',
          quantity: 1,
          price: 0,
        },
        products: [], // Your product data from the fetch
        salesInformation: [],
        updateIndex: null, 
      };
    },
  
    watch: {
      'newProduct.productName': 'updateProductDetails',
      'newProduct.quantity': 'updateProductDetails', // Add this line
    },
  
    computed: {
      // Extracting unique product names for the dropdown
      productNames() {
        return this.products.map((product) => product.ProductName);
      },
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
  
    updateProductDetails() {
      const selectedProduct = this.products.find(
        (product) => product.ProductName === this.newProduct.productName
      );
  
      if (selectedProduct) {
        this.newProduct.productID = selectedProduct.ProductID;
        this.newProduct.price = selectedProduct.Price * this.newProduct.quantity;
      }
    },
  
    addOrUpdateProduct() {
      if (this.updateIndex !== null) {
        // If updateIndex is not null, it means an item is being updated
        // Update the existing item in salesInformation array
        this.salesInformation.splice(this.updateIndex, 1, { ...this.newProduct });
  
        // Reset newProduct and updateIndex for the next entry
        this.newProduct.productName = '';
        this.newProduct.productID = '';
        this.newProduct.quantity = 1;
        this.newProduct.price = 0;
        this.updateIndex = null;
      } else {
        // If updateIndex is null, it means a new item is being added
        // Check if productName is not null and not just whitespace before adding the new product
        if (this.newProduct.productName !== null && this.newProduct.productName.trim() !== '') {
          // Add the newProduct to salesInformation
          this.salesInformation.push({ ...this.newProduct });
  
          // Optionally, you can clear the newProduct values for the next entry
          this.newProduct.productName = '';
          this.newProduct.productID = '';
          this.newProduct.quantity = 1;
          this.newProduct.price = 0;
        } else {
          // Handle the case when productName is null or contains only whitespace
          console.error("Product Name cannot be null or whitespace. Please enter a valid product name.");
        }
      }
    },
  
    updateProduct(index) {
      // Set the updateIndex to the selected index
      this.updateIndex = index;
  
      // Get the selected product from the salesInformation array
      const selectedProduct = this.salesInformation[index];
  
      // Update the newProduct data property with the selected product's information
      this.newProduct.productName = selectedProduct.productName;
      this.newProduct.productID = selectedProduct.productID;
      this.newProduct.quantity = selectedProduct.quantity;
      this.newProduct.price = selectedProduct.price;
  
      // Optionally, you can remove the selected product from the salesInformation array
      // if you don't want it to appear in the sales list after updating
      // this.salesInformation.splice(index, 1);
    },
  
    cancelProduct(index) {
        // Remove the product at the specified index from the salesInformation array
        this.salesInformation.splice(index, 1);
  
        // Reset newProduct and updateIndex for the next entry
        this.newProduct.productName = '';
        this.newProduct.productID = '';
        this.newProduct.quantity = 1;
        this.newProduct.price = 0;
        this.updateIndex = null;
      },
  
  },
  
  };
  </script>
  
  
  <style scoped>
  .customer-card,
  .checkout-card {
    margin-bottom: 20px;
  }
  </style>
    