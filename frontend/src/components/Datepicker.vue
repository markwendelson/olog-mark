<template>
    <v-container class="d-flex align-center justify-center fill-height">
      <v-card class="mx-auto pa-5" max-width="400">
        <v-card-title>Check Store Availability</v-card-title>
        <v-card-text>
          <v-menu v-model="menu" :close-on-content-click="false">
            <template v-slot:activator="{ props }">
              <v-text-field v-bind="props" v-model="selectedDate" label="Select a date"></v-text-field>
            </template>
            <v-date-picker v-model="selectedDate" @update:modelValue="checkAvailability"></v-date-picker>
          </v-menu>
    
          <div v-if="loading">Checking...</div>
          <div v-else-if="availability">
            <p v-if="availability.is_open">The store is open on this date.</p>
            <p v-else>Next opening: <strong>{{ availability.next_opening }}</strong></p>
          </div>
        </v-card-text>
      </v-card>
    </v-container>
  </template>
  
  <script>
  import { ref, computed } from "vue";
  import { useStoreStatus } from "../store/storeStatus";
  
  export default {
    setup() {
      const storeStatus = useStoreStatus();
      const selectedDate = ref(null);
      const menu = ref(false);
  
      const checkAvailability = () => {
        if (selectedDate.value) {
          storeStatus.checkAvailability(selectedDate.value);
        }
      };
  
      return {
        selectedDate,
        menu,
        checkAvailability,
        availability: computed(() => storeStatus.availability),
        loading: computed(() => storeStatus.loading),
      };
    },
  };
  </script>
  
  <style scoped>
  p {
    font-size: 16px;
  }
  </style>
  