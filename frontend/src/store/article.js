/* eslint-disable camelcase */
import axios from 'axios'
import _ from 'lodash'
class Article {
// eslint-disable-next-line camelcase
  constructor (body, created_at, id, title, updated_at, userId) {
    this.body = body
    this.created_at = created_at
    this.id = id
    this.title = title
    this.updated_at = updated_at
    this.userId = userId
  }
}

export default {
  state: {
    articles: []
  },
  getters: {
    async allArticles (state) {
      console.log(`getters ${state.articles}`)
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
      const result = []
      try {
        const data = await axios({
          method: 'get',
          url: 'http://127.0.0.1:8000/api/articles'
        }).then(response => {
          console.log(response.data)
          return response.data
        }).catch(error => {
          console.log(error)
        })
        let article = _.forEach(data, function (value) {
          return new Article(value.title, value.created_at, value.id, value.title, value.updated_at, value.userId)
        })
        result.push(article)
        console.log(`result array ${result}`)
        commit('loadArticles', result)
      } catch (e) {
        console.log(e.message())
        throw e
      }
    }
  }
}
