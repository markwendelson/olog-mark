<template>
  <v-app>
    <v-container>
      <StoreStatus />
      <Datepicker />
    </v-container>
  </v-app>
</template>

<script setup>
import StoreStatus from "./components/StoreStatus.vue";
import Datepicker from "../src/components/Datepicker.vue";
</script>
