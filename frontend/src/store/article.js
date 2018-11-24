import axios from 'axios'
// import _ from 'lodash'
export default {
  state: {
    articles: []
  },
  getters: {
    articles (state) {
      return state.articles
    }
  },
  mutations: {
    loadArticles (state, payload) {
      state.articles = payload
    }
  },
  actions: {
    async fetchArticles ({commit}) {
      commit('clearError');
      commit('setLoading', true);
      try {
        let data = await axios({
          method: 'get',
          url: '/api/articles',
          headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json'
          }
        }).then(response => {
          console.log(response.data);
          return response.data
        }).catch(error => {
          console.log(error)
        });
        commit('loadArticles', data);
        commit('setLoading', false)
      } catch (error) {
        commit('setError', error.message);
        commit('setLoading', false);
        throw error
      }
    },
    async getSingleArticle({commit}, {id}) {
      commit('clearError');
      commit('setLoading', true);
      try {
        let data = await axios.get('/api/article/' + id)
          .then(response => {
          return response.data;
        }).catch(error => {
          throw error.message
          });
        commit('loadArticles', data);
        commit('setLoading', false);
      } catch (error) {
        commit('setError', error.message);
        commit('setLoading', false);
        throw error.message
      }
    }
  }
}
