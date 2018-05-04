import Vuex from 'vuex'
import vuexCache from 'vuex-cache'
import { News } from './../entity/News'


const createStore = () => {
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
            context.commit('set-error', 'Aguarde...');
          }
        });
      }
    }
  })
};

export default createStore