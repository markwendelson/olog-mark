<template>
  <v-container class="store-status">
    <v-card class="status-card">
      <v-card-title class="text-h5">
        <v-icon size="28" class="mr-2">mdi-storefront</v-icon>
        Store Status
      </v-card-title>

      <v-card-text>
        <v-alert 
          class="status-alert" style="background-color: #b12723; color:#fff"
          density="comfortable"
        >
          <v-icon size="24" class="mr-2">
            {{ isOpen ? "mdi-door-open" : "mdi-door-closed" }}
          </v-icon>
          {{ isOpen ? "Open" : "Closed" }}
        </v-alert>

        <div v-if="!isOpen" class="next-opening">
          <v-icon size="20" class="mr-2">mdi-clock-outline</v-icon>
          Next opening: 
          <strong>{{ nextOpening || "Unknown" }}</strong>
        </div>
      </v-card-text>

      <v-card-actions class="card-actions">
        <v-btn 
          @click="fetchStoreStatus" 
          color="primary" 
          variant="elevated"
        >
          <v-icon class="mr-2">mdi-refresh</v-icon>
          Refresh
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script setup>
import { onMounted } from "vue";
import { storeToRefs } from "pinia";
import { useStoreStatus } from "../store/storeStatus";

const store = useStoreStatus();
const { isOpen, nextOpening } = storeToRefs(store);

onMounted(async() => {
  await store.fetchStoreStatus();
});
</script>

<style scoped>
.store-status {
  display: flex;
  justify-content: center;
  align-items: center;
}

.status-card {
  max-width: 400px;
  width: 100%;
  padding: 20px;
  text-align: center;
  border-radius: 16px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.status-alert {
  font-size: 18px;
  font-weight: bold;
}

.next-opening {
  font-size: 16px;
  color: #555;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 10px;
}

.card-actions {
  display: flex;
  justify-content: center;
}
</style>
