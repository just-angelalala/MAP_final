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
        <v-card class="sales-card">
          <v-card-title class="headline">Sales Information</v-card-title>
          <v-card-text>
            <v-data-table :headers="salesHeaders" :items="salesInformation" item-key="productID">
              <template v-slot:top>
                <v-toolbar flat>
                  <v-divider class="mx-4" inset vertical></v-divider>
                  <!-- Separate Input Fields -->
                  <v-text-field v-model="newProduct.productID" label="Product ID"></v-text-field>
                  <v-text-field v-model="newProduct.productName" label="Product Name"></v-text-field>
                  <v-text-field v-model="newProduct.quantity" label="Quantity" type="number"></v-text-field>
                  <v-text-field v-model="newProduct.price" label="Price" type="number"></v-text-field>
                  <v-btn color="primary" @click="addProduct">Add</v-btn>
                </v-toolbar>
              </template>
              <template v-slot:item="{ item, index }">
                <v-list-item>
                  <!-- Display each item as a list -->
                  <v-list-item-content>
                    <v-list-item-title>{{ item.productName }}</v-list-item-title>
                    <v-list-item-subtitle>
                      Product ID: {{ item.productID }} | Price: {{ item.price }} | Quantity: {{ item.totalQuantity }}
                    </v-list-item-subtitle>
                  </v-list-item-content>
                  <v-list-item-action>
                    <!-- Automatic Price Calculation -->
                    <div>{{ calculateTotalPrice(item) }}</div>
                    <v-btn color="primary" @click="updateProduct(index)">Update</v-btn>
                    <v-btn color="secondary" @click="cancelProduct(index)">Cancel</v-btn>
                  </v-list-item-action>
                </v-list-item>
              </template>
            </v-data-table>
          </v-card-text>
        </v-card>

        <!-- Cart Details -->
        <v-card class="checkout-card">
          <v-card-title class="headline">Cart Details</v-card-title>
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
    };
  },
  computed: {
    totalItems() {
      return this.cart.reduce((total, item) => total + item.quantity, 0);
    },
    totalPrice() {
      return this.cart.reduce((total, item) => total + item.quantity * item.price, 0);
    },
  },
  methods: {
    addToCart() {
      const product = this.products.find((p) => p.name === this.scannedProduct);
      if (product) {
        const cartItem = this.cart.find((item) => item.name === this.scannedProduct);
        if (cartItem) {
          cartItem.quantity++;
        } else {
          this.cart.push({ ...product, quantity: 1 });
        }
      }
      this.scannedProduct = "";
    },
    removeFromCart(index) {
      this.cart.splice(index, 1);
    },
    completeTransaction() {
      // Add logic for completing the transaction (e.g., send data to the backend)
      const transactionData = {
        customer: { name: this.customerName, address: this.customerAddress },
        products: this.cart,
      };
      console.log("Transaction completed:", transactionData);
      // Reset the cart and customer information
      this.cart = [];
      this.customerName = "";
      this.customerAddress = "";
    },
    addProduct() {
      // Add logic to add a new product to the salesInformation array
      // Ensure that you calculate the total price based on quantity
      this.newProduct.totalPrice = this.calculateTotalPrice(this.newProduct);

      // Add the new product to the salesInformation array
      this.salesInformation.push({ ...this.newProduct });

      // Reset newProduct for the next entry
      this.newProduct = {
        productName: "",
        productID: "",
        quantity: 0,
        price: 0,
      };
    },
    updateProduct(index) {
      // Add logic to update the existing product in the salesInformation array
      // Ensure that you calculate the total price based on quantity
      this.salesInformation[index].totalPrice = this.calculateTotalPrice(this.salesInformation[index]);
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
