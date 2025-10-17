import { defineStore } from 'pinia';
import axios from 'axios';

export const useUserStore = defineStore('user', {
  state: () => ({
    users: [],
    loading: false,
    currentUser:null,
    error: null,
  }),
  getters: {
    getUserById: (state) => (id) => state.users.find((user) => user.id === id),
  },
  actions: {
    async createUser(userData) {
      this.loading = true;
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/users', userData);
        this.users.push(response.data);
        this.error = null;
      } catch (err) {
        this.error = err.message;
      } 
    },

    async fetchUsers(Credentials) {
      this.loading = true;
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/users',Credentials);
        this.users = response.data;
        this.error = null;
      } catch (err) {
        this.error = err.message;
      }
    },


    async fetchUser(id) {
      this.loading = true;
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/users/${id}`);
        this.currentUser = response.data;
        this.error = null;
      } catch (err) {
        this.error = err.message;
      }
    },


    async updateUser(id, userData) {
      this.loading = true;
      try {
        const response = await axios.put(`http://127.0.0.1:8000/api/users/${id}`, userData);
        const index = this.users.findIndex((user) => user.id === id);
        if (index !== -1) {
          this.users[index] = response.data;
        if (this.currentUser && this.currentUser.id === id) {
          this.currentUser = response.data;
        }
        this.error = null;
      } } catch (err) {
        this.error = err.message;
      }
    },

    async deleteUser(id) {
      this.loading = true;
      try {
        await axios.delete(`http://127.0.0.1:8000/api/users/${id}`);
        this.users = this.users.filter((user) => user.id !== id);
        if (this.currentUser && this.currentUser.id === id) {
          this.currentUser = null;
        this.error = null;
      } } catch (err) {
        this.error = err.message;
      }

  },
}
});
