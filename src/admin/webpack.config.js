var Encore = require('@symfony/webpack-encore');
const CopyWebpackPlugin = require('copy-webpack-plugin');
Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .cleanupOutputBeforeBuild()
  .enableSourceMaps(!Encore.isProduction())
  .configureUglifyJsPlugin()
  .addEntry('js/app', './assets/js/app.js')
  .addEntry('js/admin', './assets/js/admin/sb-admin.js')
  .addEntry('js/page_list', './assets/js/page_list.js')
  .addStyleEntry('css/app', './assets/css/app.scss')
  .addStyleEntry('css/global', './assets/css/global.scss')
  .addStyleEntry('css/admin', './assets/css/admin/sb-admin.min.css')
  .addStyleEntry('css/login', './assets/css/login.scss')
  .addStyleEntry('css/page_list', './assets/css/page_list.scss')
  .addStyleEntry('css/news', './assets/css/news/app.scss')
  .enableSassLoader(function(sassOptions) {}, {
      resolveUrlLoader: false
  })
  .addPlugin(new CopyWebpackPlugin([
    // copies to {output}/static
    { from: './assets/static', to: 'static' }
  ]))
  .autoProvidejQuery()
  // Enable Vue loader
  .enableVueLoader()
  .configureLoaderOptionsPlugin((options) => {
      options.minimize = true;
  })
  .enableVersioning()
;

module.exports = Encore.getWebpackConfig();