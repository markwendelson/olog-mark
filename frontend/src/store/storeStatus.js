import { defineStore } from "pinia";
import axios from "axios";
import dayjs from "dayjs";

export const useStoreStatus = defineStore("storeStatus", {
  state: () => ({
    isOpen: false,
    nextOpening: null,
    availability: null,
    loading: false,
  }),

  actions: {
    async fetchStoreStatus() {
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/store-status");
        this.isOpen = response.data.status === "open";
        this.nextOpening = response.data.next_opening;
      } catch (error) {
        console.error("Error fetching store status:", error);
      }
    },
    async checkAvailability(date) {
      this.loading = true;
      try {
        const formattedDate = dayjs(date).format("YYYY-MM-DD"); // ✅ Format date correctly
        const response = await axios.get(`http://127.0.0.1:8000/api/check-availability?date=${formattedDate}`);
        this.availability = response.data;
      } catch (error) {
        console.error("Error checking availability:", error);
      } finally {
        this.loading = false;
      }
    },
  },
});
