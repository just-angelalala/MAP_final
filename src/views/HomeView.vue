<template>
  <div class="row justify-left">
    <div class="col-3 ">
      <Sidebar />
    </div>
    <div class="col-9">
      <HelloWorld />
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

// Components
import HelloWorld from "../components/HelloWorld.vue";
import Sidebar from "../components/Sidebar.vue";

export default defineComponent({
  name: "HomeView",

  components: {
    HelloWorld,
    Sidebar,
  },
});
</script>
