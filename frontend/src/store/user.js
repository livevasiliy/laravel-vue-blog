import axios from 'axios'

export default {
  state: {
    user: null
  },
  getters: {
    user(state) {
      return state.user
    },
    isUserLoggedIn(state) {
      return state.user !== null
    }
  },
  mutations: {
    setUser(state, payload) {
      state.user = payload
    }
  },
  actions: {
    async registerUser({commit}, {name, email, password}) {
      commit('clearError');
      commit('setLoading', true);
      try {
        let token = await axios({
          method: 'post',
          url: 'http://127.0.0.1:8000/api/register',
          headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json'
          },
          data: {
            name,
            email,
            password
          }
        }).then(response => {
          return response.data;
        }).catch(error => {
          commit('setError', error.message);
          commit('setLoading', false);
          throw error;
        });
        commit('setUser', token);
        commit('setLoading', false);
      } catch (error) {
        commit('setError', error.message);
        commit('setLoading', false);
        throw error;
      }
    },
    async loginUser({commit}, {email, password}) {
      commit('clearError', false);
      commit('setLoading', true);
      try {
        let token = await axios({
          method: 'post',
          url: 'http://127.0.0.1:8000/api/login',
          headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json'
          },
          data: {
            email,
            password
          }
        }).then(response => {
          return response.data
        }).catch(error => {
          commit('setError', error.message);
          commit('setLoading', false);
          throw error;
        });
        commit('setUser', token);
        commit('setLoading', false);
      } catch (error) {
        commit('setError', error.message);
        commit('setLoading', false);
        throw error;
      }
    },
    async detailsUser({commit}, {token}) {
      commit('clearError');
      commit('setLoading', true);
      try {
        let data = await axios({
          method: 'get',
          url: 'http://127.0.0.1:8000/api/user',
          headers: {
            'Access-Control-Allow-Origin': '*',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + token,
          }
        }).then(response => {
          return response.data
        }).catch(error => {
          commit('setError', error.message);
          commit('setLoading', false);
          throw error;
        });
        commit('setUser', data);
        commit('setLoading', false);
      } catch (error) {
        commit('setError', error.message);
        commit('setLoading', false);
        throw error;
      }
    }
  }
}
