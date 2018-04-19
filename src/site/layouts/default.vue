<template>
    <section id="app">
        <nav class="navbar is-warning is-spaced has-shadow" role="navigation" aria-label="main navigation">
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
                        <a href="/" class="navbar-item m-r-md is-active">Home</a>
                        <a href="/news" class="navbar-item m-r-md">News</a>
                        <a href="/about" class="navbar-item m-r-md">About</a>
                        <a href="/contact" class="navbar-item m-r-md">Contact</a>
                    </div>
                </div>
            </div>
        </nav>
        <nuxt/>
        <div class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <p>
                        <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                        <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                        is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
  import './../assets/scss/style.scss'
  export default {
    name: 'app',
    data () {
      return {
        showNav: false
      }
    }
  };

</script>
<style>
    nav.navbar { position: fixed !important; top: 0; left: 0; right: 0; z-index: 9;}
</style>