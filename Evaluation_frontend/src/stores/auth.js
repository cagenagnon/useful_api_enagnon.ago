import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
  persist: true,
  state: () => ({
    token: "",
    user_id: "",
  }),

  getters: {
    getToken: (state) => state.token,
    getLogUserId: (state) => state.user_id,
  },


});
