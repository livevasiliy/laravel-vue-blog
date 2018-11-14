import axios from 'axios'

export default {
  state: {
    articles: []
  },
  getters: {
    async getAllNews (state) {
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
      try {
        let data = await axios({
          method: 'get',
          url: 'http://127.0.0.1:8000/api/articles',
          headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json'
          }
        }).then(response => {
          return response.data
        }).catch(error => {
          console.log(error)
        });
        commit('loadArticles', data)
      } catch (error) {
        throw error
      }
    }
  }
}
