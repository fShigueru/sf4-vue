<template>
    <section id="app">
        <nav class="navbar navbar-header is-warning is-spaced has-shadow" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item m-l-md" href="https://bulma.io">
                        <img src="https://bulma.io/images/bulma-type.png" alt="" style="height: 30px;">
                    </a>
                    <div class="navbar-burger" v-on:click="showNav = !showNav" v-bind:class="{ 'is-active' : showNav }">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </div>
                </div>
                <div class="navbar-menu" id="navMenu" v-bind:class="{ 'is-active' : showNav }">
                    <div class="navbar-start">
                        <nuxt-link to="/" class="navbar-item m-r-md is-active">Home</nuxt-link>
                        <nuxt-link to="/news" class="navbar-item m-r-md">News</nuxt-link>
                        <nuxt-link to="/about" class="navbar-item m-r-md">About</nuxt-link>
                        <a href="javascript://Contato" data-show="quickview" data-target="quickviewDefault" id="btn-contact" class="navbar-item m-r-md">Contact</a>
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
                            <img src="https://bulma.io/images/bulma-type.png" class="is-centered logo"  alt="">
                            <br />
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
                            <div class="column is-4">
                                <aside class="menu">
                                    <ul class="menu-list">
                                        <li><nuxt-link to="/">Home</nuxt-link></li>
                                        <li><nuxt-link to="/news">News</nuxt-link></li>
                                        <li><nuxt-link to="/about">About</nuxt-link></li>
                                        <li><a href="javascript://Contato" data-show="quickview" data-target="quickviewDefault" id="btn-contact" class="navbar-item m-r-md">Contact</a></li>
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
                            <div class="column is-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
  export default {
    name: 'app',
    data () {
      return {
        showNav: false
      }
    }
  };
</script>