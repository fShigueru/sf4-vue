<template>
    <div id="news">
        <section class="hero is-primary is-medium intro">
            <div class="div clasy">
                <div class="container">
                    <div class="intro-columns">
                        <div class="intro-content animated flipInX">
                            <h1 class="title" >
                                {{ title }}
                            </h1>
                            <h2 class="subtitle">
                                Primary subtitle
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <progress class="progress is-danger" value="78" max="100">90%</progress>
        </section>
        <div class="container">
            <section class="section">
                <div class="columns is-custom">
                    <div v-for="n in news" class="column coluna">
                        <h2 class="is-size-2.5">
                            {{ n.title }}
                            <span class="tag is-danger is-small">
                                World
                                <button class="delete"></button>
                            </span>
                        </h2>
                        <figure class="image is-128x128">
                            <img :src="n.capa" alt="">
                        </figure>
                        <a class="button is-info hvr-grow">
                            Button
                            <i class="material-icons">3d_rotation</i>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'news',
    data () {
      return {
        title: 'Notícias'
      }
    },
    computed: {
      news(){
        return this.$store.state.news
      }
    },
    created(){
      this.$store.dispatch('load-news');
    }
  }
</script>