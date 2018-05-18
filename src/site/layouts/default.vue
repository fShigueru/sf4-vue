<template>
    <section id="app">
        <nav class="navbar navbar-header is-warning is-spaced has-shadow" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <nuxt-link to="/" class="navbar-item m-l-md">
                        <img :src="logo.menu" alt="Template fshigueru">
                    </nuxt-link>
                    <div class="navbar-burger" v-on:click="showNav = !showNav" v-bind:class="{ 'is-active' : showNav }">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </div>
                </div>
                <div class="navbar-menu" id="navMenu" v-bind:class="{ 'is-active' : showNav }">
                    <div class="navbar-start">
                        <nuxt-link to="/" class="navbar-item m-r-md index" v-bind:class="[{'is-active': navmenu.index}]">Home</nuxt-link>
                        <nuxt-link to="/news" class="navbar-item m-r-md" v-bind:class="[{'is-active': navmenu.news}]">Notícias</nuxt-link>
                        <nuxt-link to="/about" class="navbar-item m-r-md" v-bind:class="[{'is-active': navmenu.about}]">Quem somos</nuxt-link>
                        <nuxt-link to="/address" class="navbar-item m-r-md" v-bind:class="[{'is-active': navmenu.address}]">Localização</nuxt-link>
                        <QuickViewButton />
                    </div>
                </div>
            </div>
        </nav>
        <nuxt/>
        <div class="footer">
            <div class="container">
                <div class="columns">
                    <div class="column is-5 is-4-widescreen">
                        <div class="summary">
                            <img :src="logo.footer" class="is-centered logo"  alt="">
                            <br />
                            <br />
                            <div class="content">
                                <p>
                                    <strong>Fshigueru</strong> Soluções para web.
                                    <br />
                                    © copyright todos os direitos reservados - 2018
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="column is-7 is-6-widescreen is-offset-2-widescreen">
                        <div class="columns">
                            <div class="column is-5">
                                <aside class="menu">
                                    <ul class="menu-list">
                                        <li><nuxt-link to="/">Home</nuxt-link></li>
                                        <li><nuxt-link to="/news">Notícias</nuxt-link></li>
                                        <li><nuxt-link to="/about">Quem somos</nuxt-link></li>
                                        <li><nuxt-link to="/address">Localização</nuxt-link></li>
                                        <li><a href="javascript://Contato" data-show="quickview" data-target="quickviewDefault" id="btn-contact" class="navbar-item m-r-md">Contato</a></li>
                                    </ul>
                                </aside>
                            </div>
                            <div class="column is-6">
                                <aside class="menu">
                                    <ul class="menu-list">
                                        <li>
                                            <a href="/">
                                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                                /facebook/fshigueru
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                                @fshigueru
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/">
                                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                                youtube.com/fshigueru
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                                /instagram/fshigueru
                                            </a>
                                        </li>
                                    </ul>
                                </aside>
                            </div>
                            <div class="column is-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <QuickView />
    </section>
</template>

<script>
  import QuickView from '~/components/QuickView.vue'
  import QuickViewButton from '~/components/QuickViewButton.vue'

  if (process.browser) {
    const AOS = require('aos')
    AOS.init();
    setTimeout(function(){
      AOS.refreshHard();
    }, 700);
  }
  export default {
    name: 'app',
    quickActive: true,
    data () {
      return {
        showNav: false,
        logo: {
          menu: 'logo_menu.png',
          footer: 'logo_footer.png'
        },
        navmenu: {'index': false, 'news': false, 'about': false, 'address': false}
      }
    },
    watch: {
      '$route' (to, from) {
        this.navmenu[from.name] = false;
        this.navmenu[to.name] = true;
      }
    },
    components: {
      QuickView,
      QuickViewButton
    },
    created () {
      this.navmenu[this.$route.name] = true;
      if (process.browser) {
        window.addEventListener('load', function () {
          let navMenu = document.getElementsByClassName('navbar-start');
          let navEl = navMenu[0].children;
          for (let key in navEl) {
            if (Number.isInteger(navEl[key]) === false) {
              if (navEl[key] && {}.toString.call(navEl[key]) !== '[object Function]') {
                navEl[key].addEventListener("click", function(){
                  document.getElementsByClassName("navbar-menu")[0].classList.remove("is-active");
                  document.getElementsByClassName("navbar-burger")[0].classList.remove("is-active");
                })
              }
            }
          }
        })
      }
    },
    metaInfo: {
      title: 'Fshigueru base',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' }
      ]
    }
  };
</script>

