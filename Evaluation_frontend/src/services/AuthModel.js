import axios from "axios";

export default class Auth {

  /**
   * Login
   * @param {Object} ids
   * @returns {Object}
   */
  async login(ids) {
    try {
      const loginIds = {
        email: ids.email.trim(),
        password: ids.password,
      };
      const response = await axios.post("http://127.0.0.1:8000/login", loginIds);
      const data = response.data;
      console.log(data);
      return data;
    } catch (e) {
      console.error(e);
      this.error = "Failed to login";
    }
  }

  /**
   * Logout
   * @returns {Object}
   */
  async logout() {
    try {
      const response = await axios.post("http://127.0.0.1:8000/logout");
      const data = response.data;
      console.log(data);
      return data;
    } catch (e) {
      console.error(e);
      this.error = "Failed to logout";
    }
  }
}
