const pkg = require('./package')

module.exports = {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: pkg.name,
    /*
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: pkg.description }
    ],
    */
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/static/favicon.ico' }
    ]
  },

  /*
  ** Customize the progress-bar color
  */
  //loading: '~/components/loading.vue',
  loading: false,
  transition: {
    name: 'page',
    mode: 'out-in'
  },

  manifest: {
    name: 'My Nuxt App Fshigueru',
    lang: 'en',
    theme_color: '#3B8070'
  },
  /*
  ** Global CSS
  */
  css: [
    '@/assets/scss/style.scss'
  ],

  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    { src: '~/plugins/vue-gallery', ssr: false },
    { src: '~/plugins/vue-parallaxy', ssr: false },
    { src: '~/plugins/vue-quick-menu', ssr: false },
    { src: '~/plugins/vue2-google-maps', ssr: false },
    { src: '~/plugins/vue-meta', ssr: false }
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [,
    // Doc: https://bootstrap-vue.js.org/docs/
    //'bootstrap-vue/nuxt',
    '@nuxtjs/font-awesome',
    '@nuxtjs/axios',
    ['xui-module', {}],
    ['nuxt-material-design-icons'],
    ['@nuxtjs/component-cache', { maxAge: 1000 * 60 * 60 }],
  ],

  axios: {
    // proxyHeaders: false
  },

  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    },
    postcss: {
      plugins: {
        'postcss-custom-properties': false
      }
    },
    vendor: ['vue-gallery', 'vue-parallaxy', 'aos', 'vue-quick-menu', 'vue2-google-maps']
  },

  proxy: {
    '/api': 'http://localhost:8080/api'
  }
}
