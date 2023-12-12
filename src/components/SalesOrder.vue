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
        <v-card class="customer-card" @click="insertCustomerInfo">
            <v-card-title class="headline">
              <v-btn text @click.stop="insertCustomerInfo">Customer Information</v-btn>
            </v-card-title>
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
              <v-row>
      <v-col>
        <div v-if="salesTransactionNumber">
              Sales Transaction Number: {{ salesTransactionNumber }}
        </div>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Product Name</th>
                <th class="text-left">Price</th>
                <th class="text-left">Quantity</th>
                <th class="text-left">Subtotal</th>
                

                <!-- Add more headers as needed -->
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in tableData" :key="index">
                <td>{{ item.name }}</td>
                <td>{{ item.price }}</td>
                <td>{{ item.quantity }}</td>
                <td>{{ item.quantity * item.price }}</td>
                <!-- Add more columns as needed -->
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-col>
    </v-row>

            
            </v-row>
          </v-card-text>
        </v-card>

        
       
      </v-container>

    </v-main>
  </v-app>
</template>

<script>
import axios from 'axios';
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
      showErrorAlert: false, // Added to control the visibility of the error alert
    };
  },
  watch: {
    'newProduct.productName': 'updateProductDetails',
    'newProduct.quantity': 'updateProductDetails',
  },
  computed: {
    // Extracting unique product names for the dropdown
    productNames() {
      return this.products.map((product) => product.ProductName);
    },
    salesHeaders() {
      // Define your sales table headers here
      return [
        { text: 'Product', value: 'productName' },
        { text: 'Price', value: 'price' },
        { text: 'Quantity', value: 'quantity' },
        { text: 'Actions', value: 'actions' },
      ];
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
        this.resetNewProduct();
      } else {
        // If updateIndex is null, it means a new item is being added
        // Check if productName is not null and not just whitespace before adding the new product
        if (this.newProduct.productName !== null && this.newProduct.productName.trim() !== '') {
          // Add the newProduct to salesInformation
          this.salesInformation.push({ ...this.newProduct });

          // Optionally, you can clear the newProduct values for the next entry
          this.resetNewProduct();
        } else {
          // Handle the case when productName is null or contains only whitespace
          this.showErrorAlert = true;
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
    },

    cancelProduct(index) {
      // Remove the product at the specified index from the salesInformation array
      this.salesInformation.splice(index, 1);

      // Reset newProduct and updateIndex for the next entry
      this.resetNewProduct();
    },

    resetNewProduct() {
      this.newProduct.productName = '';
      this.newProduct.productID = '';
      this.newProduct.quantity = 1;
      this.newProduct.price = 0;
      this.updateIndex = null;
      this.showErrorAlert = false; // Reset error alert when resetting new product
    },

    completeTransaction() {
      // Add your logic for completing the transaction here
      // You can use this.salesInformation to access the selected products
      this.showReceiptModal = true;
      console.log('Transaction completed:', this.salesInformation);
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
