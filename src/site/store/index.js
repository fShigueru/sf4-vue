import Vuex from 'vuex'
import vuexCache from 'vuex-cache'
import { News } from './../entity/News'
import newsjs from './../data/news.json'

const createStore = () => {
  //const authorsPromise = process.BROWSER_BUILD ? System.import('~/data/news.json') : Promise.resolve(require('~/data/news.json'))
  return new Vuex.Store({
    state: {
      news: [],
      error: ''
    },
    plugins: [vuexCache],
    mutations: {
      'set-news'(state, news){
        state.news = news;
      },
      'set-error'(state, error){
        state.error = error;
      }
    },
    actions: {
      'load-news'(context){
        const response = this.$axios.$get('http://localhost:8080/api/news', {headers: {'X-AUTH-TOKEN': 'FKf2oQBK85TOevtzP9UrgqXO6_SFZgAXzcIaxn8m8OA'}});
        response.then(response => {
          let path = response.path_image;
          let news = response.data.map(element =>
            new News(
              element.id,
              element.title,
              element.description,
              'http://localhost:8080' + path + element.capa
            )
          );
          context.commit('set-news', news);
        }).catch(error => {
          if (error.data == undefined) {
            let path = newsjs.path_image;
            let news = newsjs.data.map(element =>
              new News(
                element.id,
                element.title,
                element.description,
                'http://localhost:8080' + path + element.capa
              )
            );
            context.commit('set-news', news);
          }
        });
      }
    }
  })
};

export default createStore