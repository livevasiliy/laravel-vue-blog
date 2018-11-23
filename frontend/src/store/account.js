export default {
  state: {
    isLoggedIn: !!localStorage.getItem('token')
  },
  mutations: {
    loginUser(state) {
      state.isLoggedIn = true;
    },
    logoutUser(state) {
      state.isLoggedIn = false;
    }
  }
}
