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
        <v-btn icon @click="openSearchDialog"><v-icon>mdi-magnify</v-icon></v-btn>
        <v-btn icon @click="openNotificationDialog"><v-icon>mdi-bell</v-icon></v-btn>
        <v-btn icon @click="openOptionsMenu"><v-icon>mdi-dots-vertical</v-icon></v-btn>
      </v-app-bar>
  
      <v-main style="padding-top: 64px;">
        <v-container fluid>
          <!-- Customer Information -->
          <v-card class="customer-card">
            <v-card-title class="headline">Customer Information</v-card-title>
            <v-card-text>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field v-model="formData.customerName" label="Customer Name" outlined dense></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="formData.customerAddress" label="Customer Address" outlined dense></v-text-field>
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
                    <v-text-field v-model="formData.newProduct.productID" label="Product ID" outlined dense></v-text-field>
                    <v-text-field v-model="formData.newProduct.productName" label="Product Name" outlined dense></v-text-field>
                    <v-text-field v-model="formData.newProduct.quantity" label="Quantity" type="number" outlined dense></v-text-field>
                    <v-text-field v-model="formData.newProduct.price" label="Price" type="number" outlined dense></v-text-field>
                    <v-btn color="primary" type="submit" class="mt-3">Add</v-btn>
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
                                Price: {{ item.price }} | Quantity: {{ item.totalQuantity }}
                              </v-list-item-subtitle>
                            </v-list-item-content>
                          </v-list-item>
                        </v-col>
                        <v-col cols="4">
                          <v-list-item-action>
                            <v-btn color="primary" @click="updateProduct(index)" class="mr-1">Update</v-btn>
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
              <v-btn color="success" @click="completeTransaction">Complete Transaction</v-btn>
            </v-card-actions>
          </v-card>
        </v-container>
      </v-main>
    </v-app>
  </template>
  
  <script>
  import Sidebar from "@/views/Sidebar";
  
  export default {
    components: {
      Sidebar,
    },
    data() {
      return {
        drawer: null,
        mobileView: false,
        formData: {
          customerName: "",
          customerAddress: "",
          scannedProduct: "",
          cart: [],
          salesHeaders: [
            { text: "Product ID", value: "productID" },
            { text: "Product Name", value: "productName" },
            { text: "Price", value: "price" },
            { text: "Quantity", value: "totalQuantity" },
            { text: "Total Price", value: "totalPrice" },
            { text: "Actions", value: "actions", sortable: false },
          ],
          salesInformation: [
            // Your initial sales information data here
          ],
          newProduct: {
            productName: "",
            productID: "",
            quantity: 0,
            price: 0,
          },
        },
      };
    },
    computed: {
      totalItems() {
        return this.formData.cart.reduce((total, item) => total + item.quantity, 0);
      },
      totalPrice() {
        return this.formData.cart.reduce((total, item) => total + item.quantity * item.price, 0);
      },
    },
    methods: {
      addToCart() {
        // Assuming you have products data available
        const product = this.products.find((p) => p.name === this.formData.scannedProduct);
        if (product) {
          const cartItem = this.formData.cart.find((item) => item.name === this.formData.scannedProduct);
          if (cartItem) {
            cartItem.quantity++;
          } else {
            this.formData.cart.push({ ...product, quantity: 1 });
          }
        }
        this.formData.scannedProduct = "";
      },
      removeFromCart(index) {
        this.formData.cart.splice(index, 1);
      },
      completeTransaction() {
        // Add logic for completing the transaction (e.g., send data to the backend)
        const transactionData = {
          customer: { name: this.formData.customerName, address: this.formData.customerAddress },
          products: this.formData.cart,
        };
        console.log("Transaction completed:", transactionData);
  
        // Reset the cart and customer information
        this.formData.cart = [];
        this.formData.customerName = "";
        this.formData.customerAddress = "";
      },
      addProduct() {
        // Add logic to add a new product to the salesInformation array
        // Ensure that you calculate the total price based on quantity
        this.formData.newProduct.totalPrice = this.calculateTotalPrice(this.formData.newProduct);
  
        // Insert the new product at the beginning of the salesInformation array
        this.formData.salesInformation.unshift({ ...this.formData.newProduct });
  
        // Reset newProduct for the next entry
        this.formData.newProduct = {
          productName: "",
          productID: "",
          quantity: 0,
          price: 0,
        };
      },
      updateProduct(index) {
        // Add logic to update the existing product in the salesInformation array
        // Ensure that you calculate the total price based on quantity
        this.formData.salesInformation[index].totalPrice = this.calculateTotalPrice(this.formData.salesInformation[index]);
      },
      calculateTotalPrice(product) {
        // Add logic to calculate the total price based on quantity
        return product.quantity * product.price;
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
  


  
  // async completeTransaction() {
    //   try {
    //     // Make a POST request to your server endpoint with the salesInformation data
    //     const response = await axios.post('api/addTransaction', {
    //       customerName: this.customerName,
    //       customerAddress: this.customerAddress,
    //       salesInformation: this.salesInformation,
    //     });

    //     // Handle the response if needed
    //     console.log('Transaction completed successfully:', response.data);

    //     // Optionally, you can reset the form or perform any other actions
    //     this.resetForm();
    //   } catch (error) {
    //     // Handle errors here
    //     console.error('Error completing transaction:', error);
    //   }
    // },

    // resetForm() {
    //   // Reset form-related properties
    //   this.customerName = '';
    //   this.customerAddress = '';
    //   this.salesInformation = [];
    //   this.newProduct.productName = '';
    //   this.newProduct.productID = '';
    //   this.newProduct.quantity = 1;
    //   this.newProduct.price = 0;
    //   this.updateIndex = null;
    // },